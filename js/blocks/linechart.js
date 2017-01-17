var echartLine;
$(document).ready(function () {
    echartLine = echarts.init(document.getElementById('echart_line'), echart_theme);
    dashboardState.registerForFilterChange(['state'],'updateLinegraph');

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
        "order_by[year]": "ASC",
        "order_by[month]": "ASC",
        "order_by[fuel]": "ASC",
        "columns[]": ["year","month", "fuel"],
        "aggr[amount]": "SUM",
        "group_by[]": ["fuel","month","year"],
        //"!fuel[]": ["All utility-scale solar","other","Other biomass","Other gases","All solar"],
    }).done(function (data) {
        var monthlyXValues = [];
        var fuels = {};
        var legend = [];
        for (var i = dateRange.start; i <= dateRange.end; i++) {
            for(var month=1;month<=12;month++) {
                monthlyXValues.push(month*1+"-"+i*1); // Just make sure we have an element for every year we want to show.
            }
        }

        $.each(data, function (i, item) {
            if (typeof fuels[item.fuel] == 'undefined') {
                fuels[item.fuel] = [];
                $.each(monthlyXValues, function (i, xValue) {
                    fuels[item.fuel][i] = 0
                })
            }
            if(legend.indexOf(item.fuel*1 == -1)) {
                legend.push(item.fuel);
            }
            console.log(item.month*1+"-"+item.year*1);

            fuels[item.fuel][monthlyXValues.indexOf(item.month*1+'-'+item.year*1)] = item.SUM_amount;
        });

        lineChartOptions.series = [];
        $.each(fuels, function (fuel, fuel_data) {
            lineChartOptions.series.push({
                name: fuel,
                type: 'line',
                smooth: true,
                show:false,
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

        lineChartOptions.xAxis[0].data = monthlyXValues;

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
        dataZoom : {
            show : true,
            realtime : true,
            y: 36,
            height: 20,
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
$(document).ready(updateLinegraph);