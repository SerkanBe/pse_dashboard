var usMap;
function updateUsMap() {

    usMap.removeAllMarkers();
    if(dashboardState.get('plantFuel') == ['_none']) {
        return;
    }

    $.getJSON('/api/plant.php', {
        
        //"state[]": 'US-TX',
        "group_by[]": ["plant_lat, plant_lon"],
        //"range[limit]": 100,
        "columns[]": ["plant_name", "plant_lat", "plant_lon"],
        "year[]": dashboardState.get('year'),
        "state[]": dashboardState.get('state'),
        "fuel[]": dashboardState.get('plantFuel'),

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
        usMap.addMarkers(myMarkers);
    });

}
console.log(dashboardState.statedata.avgwindspeed);
$(document).ready(function () {
    $('#jvectormap_usa').vectorMap({
        map: 'us_aea',
        regionsSelectable: true,
        backgroundColor: 'white',
		
		series: {
			regions: [{
				scale: ['#DEEBF7', '#08519C'],
				attribute: 'fill',
				values: dashboardState.statedata.avgwindspeed,
				min: 12.91,
				max: 31.44 
			}]
		},
		
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
            //updateUsMap();
        }
    });
    usMap = $('#jvectormap_usa').vectorMap('get', 'mapObject');
    //updateUsMap();
    dashboardState.registerForFilterChange(['state','plantFuel'],'updateUsMap');
})