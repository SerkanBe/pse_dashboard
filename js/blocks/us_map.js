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


function updateUsMap2() {
	
		if (dashboardState.filter.mapclear == 'on'){
			
			usMap.series.regions[0].clear();
			//usMap.series.regions[0].params.min = undefined;
			//usMap.series.regions[0].params.max = undefined;
			//usMap.series.regions[0].params.min = 2120;
			//usMap.series.regions[0].params.max = 3806;
			//usMap.series.regions[0].setScale(['#009688', '#009688']);
			//usMap.series.regions[0].setValues(dashboardState.statedata.sunlighttotalhrs);
			dashboardState.filter.mapclear = 'off';
			//dashboardState.setFilter('mapclear', 'off');
			
			return;
		}
	
		if (dashboardState.filter.windspeed == 'on'){
		console.log("in windspeed: "+dashboardState.filter.windspeed);
		console.log("in windspeed: showtemp: "+dashboardState.filter.showtemp);
		dashboardState.filter.showtemp = 'off';
		usMap.series.regions[0].clear();
		usMap.series.regions[0].params.min = undefined;
		usMap.series.regions[0].params.max = undefined;
		usMap.series.regions[0].params.min = 12.91;
		usMap.series.regions[0].params.max = 31.44;
		usMap.series.regions[0].setScale(['#DEEBF7', '#08519C']);
		usMap.series.regions[0].setValues(dashboardState.statedata.avgwindspeed);
		return;
	}

	if (dashboardState.filter.showtemp == 'on'){
		console.log("in showtemp: "+dashboardState.filter.showtemp);
		console.log("in showtemp: widspeed: "+dashboardState.filter.windspeed);
		dashboardState.filter.windspeed = 'off';
		usMap.series.regions[0].clear();
		usMap.series.regions[0].params.min = undefined;
		usMap.series.regions[0].params.max = undefined;
		usMap.series.regions[0].params.min = 2120;
		usMap.series.regions[0].params.max = 3806;
		usMap.series.regions[0].setScale(['#feeee5', '#f95800']);
		usMap.series.regions[0].setValues(dashboardState.statedata.sunlighttotalhrs);
		return;
	}
}
	
	
	
	
$(document).ready(function () {
    $('#jvectormap_usa').vectorMap({
        map: 'us_aea',
        regionsSelectable: true,
        backgroundColor: 'white',
		
		series: {
			regions: [{
				scale: [],
				attribute: 'fill',
				values: [],
				min: [],
				max: [] 
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
	dashboardState.registerForFilterChange(['windspeed','showtemp'],'updateUsMap2');
})