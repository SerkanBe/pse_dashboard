var echartLine;
$(document).ready(function() {
echartLine = echarts.init(document.getElementById('echart_line'), echart_theme);
})
function render_line_graph() {
    $.getJSON('/api/elec_gen.php', {
        "state[]": (dashboardState.state || '*'),
        "year[]": (dashboardState.year || 2001),
        "order_by[month]": "ASC",
        "columns[]": ["month", "fuel"],
        "aggr[amount]": "SUM",
        "group_by[]": ["state", "month", "fuel"]
    }).done(function (data) {
        //console.log(data);
        var fuels = {};
        $.each(data, function (i, item) {
            if (typeof fuels[item.fuel] == 'undefined') {
                fuels[item.fuel] = [];
            }
            fuels[item.fuel][item.month - 1] = item.SUM_amount;
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
        echartLine.setOption(lineChartOptions);
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
            x: 220,
            y: 40,
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
            data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec']
        }],
        yAxis: [{
            type: 'value'
        }],
        series: []
    };


    //line_graph_query_params['debug'] = 1;

}
$(document).ready(render_line_graph);