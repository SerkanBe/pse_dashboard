function createUsMap() {
    $.getJSON('/api/plant.php', {
        //fuelinput,
        //TODO fix initialization of chart without specific fuelfilter
        //TODO do not reload full map after new markers are set
        //"state[]": 'US-TX',
        "group_by[]": ["plant_lat, plant_lon"],
        "range[limit]": 1000,
        "columns[]": ["plant_name", "plant_lat", "plant_lon"],
        "year[]": (dashboardState.year || 2015)

    }).done(function (data) {
        var myMarkers = [];
        var markerValues = {};
        $.each(data, function (i, item) {

            myMarkers[i] = {
                latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                name: item.name,
            };
            markerValues[i] = item.fuel;

            //console.log(myMarkers[i]);
        });
console.log(markerValues);
        $(function () {
            $('#jvectormap_usa').vectorMap({
                map: 'us_aea',


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
                        fill: '#F06292',
                        stroke: '#383f47'
                    }
                },
                markers: myMarkers,
                series: {
                    markers: [{
                        attribute: 'fill',
                        scale: {
                            nuclear: '#212121',
                            solar: '#FFEB3B',
                            coal: '#4E343E',
                            'conventional hydroelectric': '#039BE5',
                            wind: '#039BE5',
                            'natural gas': '#BDBDBD',
                            default: '#F06292'
                        },
                        legend: {
                            vertical: true,
                            title: 'Kraftwerke'
                        },
                        values: markerValues
                    }]
                }
                /*
                 onRegionClick: function (event, code) {
                 //window.location.href = "yourpage?regionCode=" + code
                 createPieChart(code); // add parameter with region for sql query
                 },*/


            });
        });


    });
}
$(document).ready(createUsMap);