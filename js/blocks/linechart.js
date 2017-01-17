var echartLine;
$(document).ready(function () {
    echartLine = echarts.init(document.getElementById('echart_line'), echart_theme);
    dashboardState.registerForFilterChange(['state','year','yearend'],'updateLinegraph');
})

function updateLinegraph() {
    var dateRange = {start: dashboardState.get('year'), end: dashboardState.get('yearend')};
    echartLine.showLoading('default', {
        text: 'Lade Daten...',
        effect: 'bubble',
        textStyle: {
            fontSize: 20
        }
    });
    $.getJSON('/api/elec_gen.php', {
        "state[]":dashboardState.get('state'),
        "place": 'linechart',
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
        for (var i = dateRange.start; i <= dateRange.end; i++) {
            years.push(i); // Just make sure we have an element for every year we want to show.
        }

        $.each(data, function (i, item) {
            if (typeof fuels[item.fuel] == 'undefined') {
                fuels[item.fuel] = [];
                $.each(years, function (i, year) {
                    fuels[item.fuel][i] = 0
                })
            }
            if(legend.indexOf(item.fuel*1 == -1)) {
                legend.push(item.fuel);
            }

            fuels[item.fuel][years.indexOf(item.year*1)] = item.SUM_amount;
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
        echartLine.setOption(lineChartOptions);
        echartLine.hideLoading();
    });

    var lineChartOptions = {
        title: {
            text: 'Line Graph',
            subtext: 'Subtitle'
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            x: 'center',
            y: 'bottom',
            data: [],
        },

        toolbox: {
            show: true,
            feature: {
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
                }
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
            y2: 120,
        },
        series: []
    };


    //line_graph_query_params['debug'] = 1;

}
$(document).ready(updateLinegraph);