var usMap;
function updateUsMap() {
    $.getJSON('/api/plant.php', {
        //fuelinput,
        //TODO fix initialization of chart without specific fuelfilter
        //TODO do not reload full map after new markers are set
        //"state[]": 'US-TX',
        "group_by[]": ["plant_lat, plant_lon"],
        "range[limit]": 10,
        "columns[]": ["plant_name", "plant_lat", "plant_lon"],
        "year[]": dashboardState.getFilter('year'),
        "state[]": dashboardState.getFilter('state'),
        "fuel[]": dashboardState.getFilter('plantFuel'),

    }).done(function (data) {
        var myMarkers = [];
        var markerValues = {};
        $.each(data, function (i, item) {

            myMarkers[i] = {
                latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                name: item.name,
            };
            markerValues[i] = item.fuel;
        });
        usMap.removeAllMarkers();
        usMap.addMarkers(myMarkers);
    });
}

$(document).ready(function () {
    $('#jvectormap_usa').vectorMap({
        map: 'us_aea',
        regionsSelectable: true,
        backgroundColor: 'white',
        regionStyle: {
            initial: {
                fill: '#009688',
                "fill-opacity": 1,
                stroke: 'none',
                "stroke-width": 0,
                "stroke-opacity": 1
            },
            hover: {
                "fill-opacity": 0.8,
                cursor: 'pointer'
            },
            selected: {
                fill: 'yellow'
            },
            selectedHover: {}
        },
        markerStyle: {
            initial: {
                fill: '#2449f0',
                stroke: '#383f47',
                "fill-opacity": 0.75,
                r: 2,
            }
        },
        onRegionSelected: function (event, code, isSelected) {
            if (isSelected) {
//ADD FILTER
                dashboardState.addFilter('state', code);
            } else {
//REMOVE FILTER
                dashboardState.removeFilter('state', code);
            }
//UPDATEMAP
            updateUsMap();
        }
    });
    usMap = $('#jvectormap_usa').vectorMap('get', 'mapObject');
    updateUsMap();
})