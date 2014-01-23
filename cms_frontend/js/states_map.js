AmCharts.ready(function() {
    // create AmMap object
    var map = new AmCharts.AmMap();

    // set path to images
    map.pathToImages = Drupal.settings.cms_country.ammapPath + '/images/';

    //define range of colors because no of statuses is variable
    var range_colors = ['rgb(0,56,113)', '#e8d173', '#ac31d1', '#87a391', '#dcfa23', '#122fe4'];
    //index by status name an array of colors
    var status_colors = new Array();
    jQuery.each(Drupal.settings.cms_country.status_types, function (index, type){
        status_colors[type] = range_colors[index];
    });

    var rollOverOutlineColor = '#555555';
    var selectedColor = '#555555';

    // Add countries data to Area Obj
    var areas = new Array();
    jQuery.each(Drupal.settings.cms_country.ammapData, function(index, country){
        areas.push(
            {
                id: country.iso2,
                color: status_colors[country.type],
                title: country.title,
                customData: country.type + ((country.year != "") ? " since " + country.year : "" ),
                url: country.url,
                selectable: false,
                autoZoom: false
            }
        );
    });
    var amdataProvider = {
        mapVar: AmCharts.maps.worldLow,
        areas: areas
    };

    // pass data provider to the map object
    map.dataProvider = amdataProvider;

    map.areasSettings = {
        autoZoom: true,
        selectedColor: selectedColor,
        //unlistedAreasColor: "#DDDDDD",
        //rollOverColor: "#CC0000",
        rollOverOutlineColor: rollOverOutlineColor,
        balloonText: "<strong>[[title]]</strong><br/>[[customData]]",
        showDescriptionOnHover: "true"
    };

    /*Enlarge the title balloon*/
    map.balloon.fontSize = '14px';
    map.balloon.fillAlpha = '0.9';

    /*Change zoom control colors*/
    map.zoomControl.buttonFillColor = "rgb(102, 135, 168)";
    map.zoomControl.buttonRollOverColor= "rgb(102, 135, 168)";

    var legend = {
        width: 110 * Drupal.settings.cms_country.status_types.length,
        backgroundAlpha: 0.9,
        backgroundColor: "#FFFFFF",
        borderColor: "#666666",
        borderAlpha: 1,
        bottom: 15,
        left: 15,
        horizontalGap: 10,
        data: (function () {
            var legend_data = new Array();
            jQuery.each(Drupal.settings.cms_country.status_types, function (index, type){
                legend_data.push({
                    title: type,
                    color: status_colors[type]
                });
            });
            return legend_data;
        })()
    };

    // write the map to container div
    map.addLegend(legend);
    map.write("states_ammap");
    map.zoomIn();

});
