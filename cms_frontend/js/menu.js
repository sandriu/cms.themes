/**
 * Created by dragos on 2/3/14.
 */

(function($){
    /**
     * function to position the submenu
     * @param $ul - the jQuery obj that represents the submenu
     */

    function position_menu($ul) {
        if ($ul.length > 0) {
            var $container = $('.global-menu-bar .container');
            var container_offset = $container.offset();
            var parent_li_offset = $ul.parent().offset();
            var margin_left = container_offset.left - parent_li_offset.left + parseInt($container.css('padding-left'));
            $ul.css(
                {
                    'position': 'absolute',
                    'margin-left': margin_left,
                    'width': $container.width()
                });
        }
        //return object for chainability
        return $ul;
    }

    $(document).ready(function() {
        //check if front_page
        var is_front_page = false;
        if (typeof Drupal.settings.cms_front_end.is_front_page != 'undefined') {
            is_front_page = Drupal.settings.cms_front_end.is_front_page;
        }

        var $global_menu = $('.global-menu');
        var $container = $('.global-menu-bar .container');
        //get li parents of the active link
        $li_parents = $('.global-menu a.active-trail').parents('li').addClass('active');

        //Set Homepage menu styles
        if (is_front_page) {
            $global_menu.children('li').each(function(index, value) {
            var $this = $(this);
            $this.children('ul').wrap('<div class="submenu-teaser"></div>');
            $div = $this.children('div');
            if (typeof $(this).data('image-url') != 'undefined') {
                $div.append('<img class="menu-teaser-img" src="' + $this.data('image-url') + '"/>');
            }
            });
        }

        //Add classes to the menu to give a margin-bottom to push all content under menu
        switch ($li_parents.length) {
            case 1:
                $global_menu.addClass('nav-show-level-2');
                break;
            case 2:
                if ($li_parents.eq(0).children('ul').length == 0) {
                    $global_menu.addClass('nav-show-level-2');
                } else {
                    $global_menu.addClass('nav-show-level-3');
                }
                break;
            case 3:
                $global_menu.addClass('nav-show-level-3');
                break;
            default:
                break;
        }

        //get active li
        var $first_level_li_active = $('.global-menu > li.active:first');
        var $second_level_li_active = $('.global-menu > li > ul > li.active:first');

        //position current menus - these menus are displayed until hover effect
        if ($first_level_li_active.length > 0) {
            position_menu($first_level_li_active.children('ul')).show();
        }
        if ($second_level_li_active.length > 0) {
            $second_level_li_active.children('ul').width($container.width()).show();
        }

        //Submenu hover effect (show/hide level2)
        $('.global-menu > li').not($first_level_li_active).hover(function() {
            $first_level_li_active.removeClass('active-trail').children('ul').hide();
            $(this).addClass('active-trail');
            position_menu($(this).children('ul')).show();

            //On Homepage, menu acts different
            if ($(this).children('div.submenu-teaser').length > 0) {
                $div = $(this).children('div.submenu-teaser');
                $div.show();
                //initial width
                width = $div.children('ul').width() + 40;
                if ($div.children('img').length > 0) {
                    //if image, enlarge width
                    width += 20;
                    width += parseInt($div.children('img').css('max-width').substr(
                        0, $div.children('img').css('max-width').length - 2)
                    );
                }
                $div.width(width);
            }
        }, function() {
            $first_level_li_active.addClass('active-trail').children('ul').show();
            $(this).removeClass('active-trail');
            if ($(this).children('ul').length > 0) {
                $(this).children('ul').hide();
            }
            if ($(this).children('div.submenu-teaser').length > 0) {
                $(this).children('div.submenu-teaser').hide();
            }
        });

        //Sub-submenu hover effect (show/hide level3)
        //On Homepage level 3 is not shown
        if (!is_front_page) {
            $('.global-menu > li > ul > li').not($second_level_li_active).hover(function() {
                $second_level_li_active.removeClass('active-trail').children('ul').hide();
                $(this).addClass('active-trail');
                if ($(this).children('ul').length > 0) {
                    $(this).children('ul').width($container.width()).show();
                }
            }, function() {
                $second_level_li_active.addClass('active-trail').children('ul').show();
                $(this).removeClass('active-trail');
                if ($(this).children('ul').length > 0) {
                    $(this).children('ul').hide();
                }
            });
        }
    });
})(jQuery);
