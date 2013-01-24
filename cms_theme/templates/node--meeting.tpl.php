<?php
    render_slot($node, 'node-buttons', 'general');
?>

<div class="row">
    <div class="span8">
        <table class="table table-condensed table-hover two-columns">
            <tbody>
            <?php
                echo render($content['field_meeting_start']);
                echo render($content['field_meeting_end']);
                echo render($content['field_meeting_reg_deadline']);
                echo render($content['field_meeting_organizer']);
                echo render($content['field_meeting_coorganizer']);
                echo render($content['field_meeting_instrument']);
                echo render($content['field_meeting_type']);
                echo render($content['field_meeting_kind']);
                echo render($content['field_meeting_access']);
                echo render($content['field_meeting_status']);
                echo render($content['field_meeting_languages']);
            ?>
            </tbody>
        </table>
    </div>

    <div class="span4">
        <?php
            //echo render($content['field_meeting_image']);
        ?>

        <div class="thumbnail">
            <div class="map" id="map_canvas" style="width: 100%; height: 300px;"></div>
            <div class="caption">
                <table class="table table-condensed table-hover two-columns">
                    <tbody>
                    <?php
                        echo render($content['field_meeting_country']);
                        echo render($content['field_meeting_city']);
                        echo render($content['field_meeting_address']);
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>

<?php
    hide($content['links']);
    hide($content['comments']);
?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<script type="text/javascript">
      var map;
      function initialize() {
        var mapOptions = {
          zoom: 8,
          center: new google.maps.LatLng(<?php echo $content['field_meeting_latitude']['#items'][0]['value']; ?>,
          <?php echo $content['field_meeting_longitude']['#items'][0]['value']; ?>),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map_canvas'),
            mapOptions);
      }

      google.maps.event.addDomListener(window, 'load', initialize);
</script>
