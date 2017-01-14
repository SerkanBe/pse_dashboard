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

        $.each(data, function (i, item) {

            if (item.fuel == "nuclear") {
                myMarkers[i] = {
                    latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                    name: item.name,
                    style: {"fill": "#212121"}
                };
            }
            else if (item.fuel == "solar") {
                myMarkers[i] = {
                    latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                    name: item.name,
                    style: {"fill": "#FFEB3B"}
                };
            }
            else if (item.fuel == "Coal") {
                myMarkers[i] = {
                    latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                    name: item.name,
                    style: {"fill": "#4E342E"}
                };
            }
            else if (item.fuel == "conventional hydroelectric") {
                myMarkers[i] = {
                    latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                    name: item.name,
                    style: {"fill": "#039BE5"}
                };
            }
            else if (item.fuel == "wind") {
                myMarkers[i] = {
                    latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                    name: item.name,
                    style: {"fill": "#E0F7FA"}
                };
            }
            else if (item.fuel == "natural gas") {
                myMarkers[i] = {
                    latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                    name: item.name,
                    style: {"fill": "#BDBDBD"}
                };
            }
            else {
                myMarkers[i] = {
                    latLng: [parseFloat(item.lat), parseFloat(item.lon)],
                    name: item.name,
                    style: {"fill": "#F06292"}
                };
            }

            //console.log(myMarkers[i]);
        });

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
                        fill: '#F8E23B',
                        stroke: '#383f47'
                    }
                },
                markers: myMarkers,
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