var echartLine;
$(document).ready(function () {
    echartLine = echarts.init(document.getElementById('echart_line'), echart_theme);
    dashboardState.registerForFilterChange(['state'],['updateLinegraph']);
})

function updateLinegraph() {
    var dateRange = {start: dashboardState.get('year'), end: dashboardState.get('yearend')};
    $.getJSON('/api/elec_gen.php', {
        "state[]":dashboardState.get('state'),
        "place": 'linechart',
        "between[year]": dateRange,
        "order_by[year, fuel]": "ASC",
        "columns[]": ["year", "fuel"],
        "aggr[amount]": "SUM",
        "group_by[]": ["year", "fuel"]
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

        lineChartOptions.xAxis.data = years;
        lineChartOptions.legend.data = legend;
        echartLine.setOption(lineChartOptions,true);
    });

    var lineChartOptions = {
        title: {
            text: '',
            subtext: ''
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            x: 'center',
            y: 'bottom',
            padding: 15,
            data: []
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
            //data: ['2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', //'2015', '2016']
        }],
        yAxis: [{
            type: 'value'
        }],
        series: []
    };


    //line_graph_query_params['debug'] = 1;

}
$(document).ready(updateLinegraph);