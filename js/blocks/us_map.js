var usMap;
var consumptionRange;
var consumption;
function updateUsMap() {

    usMap.removeAllMarkers();
    if (dashboardState.get('plantFuel') == ['_none']) {
        return;
    }

    $.getJSON('/api/plant.php', {
        "group_by[]": ["plant_lat", "plant_lon"],
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
    usMap.series.regions[0].clear();
    switch (dashboardState.plantMapType) {
        case 'windspeed':
            usMap.series.regions[0].params.min = 12.91;
            usMap.series.regions[0].params.max = 31.44;
            usMap.series.regions[0].setScale(['#DEEBF7', '#08519C']);
            usMap.series.regions[0].setValues(dashboardState.statedata.avgwindspeed);
            break;
        case 'temp':
            usMap.series.regions[0].params.min = 2120;
            usMap.series.regions[0].params.max = 3806;
            usMap.series.regions[0].setScale(['#feeee5', '#f95800']);
            usMap.series.regions[0].setValues(dashboardState.statedata.sunlighttotalhrs);
            break;
        case 'consumption':

            if (typeof consumptionRange == 'undefined') {
                consumptionRange = {};
                consumption = {};
                $.getJSON('/api/elec_retail.php', {
                    "group_by[]": ["state"],
                    "columns[]": ["state",],
                    "aggr[amount]": "SUM",
                }).done(function (data) {
                    $.each(data, function (i, item) {
                        item.SUM_amount*=1;
                        if (typeof consumptionRange.min == 'undefined') {
                            consumptionRange.min = item.SUM_amount;
                        }
                        if (typeof consumptionRange.max == 'undefined') {
                            consumptionRange.max = item.SUM_amount;
                        }

                        if (consumptionRange.min > item.SUM_amount) {
                            consumptionRange.min = item.SUM_amount;
                        }
                        if (consumptionRange.max < item.SUM_amount) {
                            consumptionRange.max = item.SUM_amount;
                        }

                        consumption[item.state] = item.SUM_amount;
                    });

                    $(data).promise().done(function () {
                        usMap.series.regions[0].params.min = consumptionRange.min;
                        usMap.series.regions[0].params.max = consumptionRange.max;
                        usMap.series.regions[0].setScale(['#DEEBF7', '#08519C']);
                        usMap.series.regions[0].setValues(consumption);
                    });
                });
            }
            else {
                usMap.series.regions[0].params.min = consumptionRange.min;
                usMap.series.regions[0].params.max = consumptionRange.max;
                usMap.series.regions[0].setScale(['#DEEBF7', '#08519C']);
                usMap.series.regions[0].setValues(consumption);
            }
            break;
        case 'clear':
            break;

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
        }
    });
    usMap = $('#jvectormap_usa').vectorMap('get', 'mapObject');

    dashboardState.registerForFilterChange(['state', 'plantFuel'], 'updateUsMap');
    dashboardState.registerForFilterChange(['windspeed', 'showtemp'], 'updateUsMap2');


    $('button[name="plant_map_type"]').click(function () {
        var btn_val = $(this).val();
        dashboardState.plantMapType = btn_val;
        updateUsMap2();
    });
})