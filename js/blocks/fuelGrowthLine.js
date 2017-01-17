
var fuelGrowthLine;
$(document).ready(function () {
    fuelGrowthLine = echarts.init(document.getElementById('fuel_growth_linechart'), echart_theme);
    dashboardState.registerForFilterChange(['state'],'updateFuelGrowthLine');
})

function updateFuelGrowthLine() {
    var dateRange = {start: dashboardState.get('year'), end: dashboardState.get('yearend')};
    fuelGrowthLine.showLoading('default', {
        text: 'Lade Daten...',
        effect: 'bubble',
        textStyle: {
            fontSize: 20
        }
    });
    $.getJSON('/api/elec_gen.php', {
        "state[]":dashboardState.get('state'),
        "place": 'growthChart',
        "between[year]": dateRange,
        "order_by[year, fuel]": "ASC",
        "columns[]": ["year", "fuel"],
        "aggr[amount]": "SUM",
        "group_by[]": ["year", "fuel"],
        //"!fuel[]": ["All utility-scale solar","other","Other biomass","Other gases","All solar"],
    }).done(function (data) {
        var years = [];
        var fuels = {};
        var legend = [];
        for (var i = dateRange.start+1; i <= dateRange.end; i++) {
            years.push(i); // Just make sure we have an element for every year we want to show.
        }
        var lastItems = {};
        $.each(data, function (i, item) {
            if(typeof lastItems[item.fuel] == 'undefined') {
                lastItems[item.fuel] = item;
                return;
            }

            if (typeof fuels[item.fuel] == 'undefined') {
                fuels[item.fuel] = [];
                $.each(years, function (i, year) {
                    fuels[item.fuel][i] = 0
                })
            }
            if(legend.indexOf(item.fuel*1 == -1)) {
                legend.push(item.fuel);
            }

            fuels[item.fuel][years.indexOf(item.year*1)] = (item.SUM_amount/lastItems[item.fuel].SUM_amount)-1;
            lastItems[item.fuel] = item;
        });

        lineChartOptions.series = [];
        $.each(fuels, function (fuel, fuel_data) {
            lineChartOptions.series.push({
                name: fuel,
                type: 'line',
                smooth: true,
                itemStyle: {
                    normal: {
                        areaStyle: {
                            type: 'default'
                        }
                    }
                },

                data: fuel_data
            });
        });

        lineChartOptions.xAxis[0].data = years;

        lineChartOptions.legend.data = legend;
        fuelGrowthLine.setOption(lineChartOptions);
        fuelGrowthLine.hideLoading();
    });
    var greenFuels = dashboardState.getGreenFuels();

    var lineChartOptions = {
        title: {
            text: 'Line Graph',
            subtext: 'Subtitle'
        },
        tooltip: {
            trigger: 'axis',
        },
        legend: {
            x: 'center',
            y: 'bottom',
            data: [],
        },

        toolbox: {
            show: true,
            feature: {
                dataZoom: {show: true},
                magicType: {
                    show: true,
                    title: {
                        line: 'Line',
                        bar: 'Bar',
                        stack: 'Stack',
                        tiled: 'Tiled'
                    },
                    type: ['line', 'bar', 'stack', 'tiled']
                },
                restore: {
                    show: true,
                    title: "Restore"
                },
                saveAsImage: {
                    show: true,
                    title: "Save Image"
                },
            }
        },
        calculable: true,
        xAxis: [{
            type: 'category',
            boundaryGap: false,
            data: [],
        }],
        yAxis: [{
            type: 'value',
            boundaryGap: false,
        }],
        grid: {
            x: 50,
            y: 100,
            x2: 50,
            y2: 100,
        },
        dataZoom : {
            show : true,
            realtime : true,
            y: 40,
            height: 50,

            //backgroundColor: 'rgba(221,160,221,0.5)',
            //dataBackgroundColor: 'rgba(138,43,226,0.5)',
            //fillerColor: 'rgba(38,143,26,0.6)',
            //handleColor: 'rgba(128,43,16,0.8)',
            //xAxisIndex:[],
            //yAxisIndex:[],
        },
        series: []
    };


    //line_graph_query_params['debug'] = 1;

}

$(document).ready(updateFuelGrowthLine);


$('button[name^="fuel_growth_predef"]').click(function() {
    var btn_val = $(this).val();

    var selected = {}; // plantTypeFilter.val() || [];
    var fuel_keys = [];
    switch(btn_val) {
        case 'green':
            $.each(dashboardState.fuelType.green,function(i,item) {
                fuel_keys = fuel_keys.concat(item);
            });
            break;
        case 'brown':
            fuel_keys = dashboardState.fuelType.brown;
            break;
        case 'nuclear':
            fuel_keys = dashboardState.fuelType.nuclear;
            break;
        case '_all':
            plantTypeFilter.val(plantTypeFilterOptions).trigger("change");
            return;
            break;
        case '_none':
            plantTypeFilter.val(['_none']).trigger("change");
            return;
            break;
    }

    $.each(fuel_keys,function(i,item) {
        $.each(dashboardState.plantFuel[item],function(j,k) {
            selected[k] = false;
        })
    });

    var options = {
        legend: {
            selected: selected,
        }
    }

    fuelGrowthLine.setOption(options);
});