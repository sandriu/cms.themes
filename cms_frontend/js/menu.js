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

        var $global_menu = $('#navbar .global-menu');
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

        //Remove a duplicate menu container in CMS (source unknown)
        $('#navbar .global-menu.menu.nav.navbar-nav').eq(1).closest('.container').remove();
        //Add classes to the menu to give a margin-bottom to push all content under menu
        switch ($li_parents.length) {
            case 0:
                break;
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
            default:
                $global_menu.addClass('nav-show-level-3');
                break;
        }

        //get active li
        var $first_level_li_active = $('.global-menu > li.active-trail:first');
        var $second_level_li_active = $('.global-menu > li > ul > li.active-trail:first');

        //position current menus - these menus are displayed until hover effect
            if ($first_level_li_active.length > 0) {
                position_menu($first_level_li_active.children('ul')).show();
            }
            if ($second_level_li_active.length > 0) {
                $second_level_li_active.children('ul').width($container.width()).show();
            }

        $('.global-menu > li').has('ul').children('h2').children('a').on('click', function(e) {
            e.preventDefault();
            if (!is_front_page) {
                $this_li = $(this).closest('li');
                if (!$this_li.hasClass('active-trail')) {
                    $('.global-menu > li').removeClass('active-trail').children('ul').hide();
                    $this_li.addClass('active-trail');
                    position_menu($this_li.children('ul')).show();
                } else {
                    $first_level_li_active.addClass('active-trail').children('ul').show();
                    $this_li.removeClass('active-trail');
                    $this_li.children('ul').hide();
                }
            }
        });

        if (is_front_page) {
            $('.global-menu > li').hover(function() {
                //On Homepage, menu acts different
                if ($(this).children('div.submenu-teaser').length > 0) {

                    $('.global-menu > li').removeClass('active-trail').children('ul').hide();
                    $(this).addClass('active-trail');

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
                $(this).removeClass('active-trail');
                $(this).children('ul').hide();
                $(this).children('div.submenu-teaser').hide();
            });
        }

        //Sub-submenu hover effect (show/hide level3)
        //On Homepage level 3 is not shown
        if (!is_front_page) {
            //$('.global-menu > li > ul > li').not($second_level_li_active).hover(function() {
            $('.global-menu > li > ul > li').hover(function() {
                $('.global-menu > li > ul > li').removeClass('active-trail').children('ul').hide();
                $(this).addClass('active-trail');
                if ($(this).children('ul').length > 0) {
                    $(this).children('ul').width($container.width()).show();
                }
            }, function() {
                $(this).removeClass('active-trail');
                $(this).children('ul').hide();
                $second_level_li_active.addClass('active-trail').children('ul').show();
            });
        }

        //Mobile menu
        $('.navbar-toggle-main-menu').click(function() {
            $('.row-offcanvas').toggleClass('active');
            $('.sidebar-offcanvas').toggle();
        });

        $(window).resize(function(e){
            if ($(window).width() > 800) {
                $('.row-offcanvas').removeClass('active');
                $('.sidebar-offcanvas').hide();
            }

            copy_mobile_menu(is_front_page);

        });

        copy_mobile_menu(is_front_page);

    });

    function copy_mobile_menu(is_front_page) {
        if($(window).width() <= 800){
            if ($('#mobile-main-menu li').length == 0) {
                $('.global-menu > li').clone().appendTo('#mobile-main-menu').find('ul, li, a').removeAttr('style').removeClass('dropdown-menu');
                if (is_front_page) {
                    $('#mobile-main-menu > li > div > ul').unwrap();
                    $('#mobile-main-menu .menu-teaser-img').remove();
                }

                $('#mobile-main-menu li').has('ul').children('h2').prepend('<span class="glyphicon glyphicon-expand"></span>');
                $('#mobile-main-menu li').has('ul').children('h2').children('.glyphicon-expand').on('click', function(e){
                    e.preventDefault();
                    var $current_li = $(this).closest('li');

                    //Animation
                    $current_li.toggleClass('opened');
                    if($current_li.hasClass('opened')) {
                        $current_li.children('h2').children('span.glyphicon').removeClass('glyphicon-expand').addClass('glyphicon-collapse-down');
                    } else {
                        $current_li.children('h2').children('span.glyphicon').removeClass('glyphicon-collapse-down').addClass('glyphicon-expand');
                    }
                    var $current_ul = $current_li.children('ul').stop(true, true).slideToggle();
                    $(this).closest('ul').find('ul').not($current_ul).slideUp();

                    //remove opened classes of other li
                    $current_ul.children('li').removeClass('opened');
                    $current_li.siblings('li').removeClass('opened').find('li').removeClass('opened');
                });
            }
        } else {
            $('#mobile-main-menu > li').remove();
        }

    }
})(jQuery);
