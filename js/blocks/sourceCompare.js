var sourceCompareBar;
$(document).ready(function () {
    sourceCompareBar = echarts.init(document.getElementById('source_compare'), echart_theme);
    dashboardState.registerForFilterChange(['state'], 'updateSourceCompareBar');
})

function updateSourceCompareBar() {
    var dateRange = {start: dashboardState.get('year'), end: dashboardState.get('yearend')};
    sourceCompareBar.showLoading('default', {
        text: 'Lade Daten...',
        effect: 'bubble',
        textStyle: {
            fontSize: 20
        }
    });
    $.getJSON('/api/elec_gen.php', {
        "place": 'sourceCompare',
        "state[]": dashboardState.get('state'),
        "year[]": [dateRange.start, dateRange.end],
        "order_by[fuel]": "ASC",
        "order_by[year]": "ASC",
        "columns[]": ["year", "fuel"],
        "aggr[amount]": "SUM",
        "group_by[]": ["year", "fuel"],
        //"!fuel[]": ["All utility-scale solar","other","Other biomass","Other gases","All solar"],
    }).done(function (data) {
        var years = [dateRange.start, dateRange.end];
        var fuels = {};
        var legend = [];

        var firsts = {}, lasts = {};

        $.each(data, function (i, item) {
            if (typeof fuels[item.fuel] == 'undefined') {
                fuels[item.fuel] = 0;
                firsts[item.fuel] = 0;
                lasts[item.fuel] = 0;
            }

            if (legend.indexOf(item.fuel * 1 == -1)) {
                legend.push(item.fuel);
            }

            switch (item.year+'') {
                case dateRange.start+'':
                    firsts[item.fuel] = item.SUM_amount;
                    break;
                case dateRange.end+'':
                    lasts[item.fuel] = item.SUM_amount;
                    break;
            }

            fuels[item.fuel] = lasts[item.fuel] - firsts[item.fuel]

        });
        

        lineChartOptions.series = [];
        $.each(fuels, function (fuel, fuel_data) {
            lineChartOptions.series.push({
                name: fuel,
                type: 'bar',
                smooth: true,
                itemStyle: {
                    normal: {
                        areaStyle: {
                            type: 'default'
                        }
                    }
                },

                data: [fuel_data]
            });
        });

        lineChartOptions.xAxis.data = legend;

        lineChartOptions.legend.data = legend;
        sourceCompareBar.setOption(lineChartOptions);
        sourceCompareBar.hideLoading();
    });

    var lineChartOptions = {
        title: {
            text: '',
            subtext: ''
        },
        tooltip: {
            trigger: 'item',
            formatter: function (params, ticket, callback) {
                unit = 'GW/h';
                params.value *= 1;
                if (Math.abs(params.value) > 100000) {
                    params.value = params.value / 1000;
                    unit = 'TW/h';
                }
                return res = '<span style="float:right">' + params.seriesName + ' : ' + numberFormatter.format(params.value.toFixed(2)) + ' ' + unit + '</span>';
            }
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
                        stack: 'Stack',
                        tiled: 'Tiled'
                    },
                    type: ['stack', 'tiled']
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
$(document).ready(updateSourceCompareBar);


$('button[name="source_compare_predef"]').click(function () {
    var btn_val = $(this).val();

    var fuel_keys = [];
    var selections = {};

    $.each(sourceCompareBar.getOption().series, function (i, item) {
        selections[item.name] = false;
    });

    switch (btn_val) {
        case 'green':
            $.each(dashboardState.fuelType.green, function (i, item) {
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
            $.each(selections, function (i, item) {
                selections[i] = true
            })
            fuel_keys = [];
            break;
        case '_none':
            fuel_keys = [];
            break;
    }

    $.each(fuel_keys, function (i, item) {
        selections[dashboardState.fuels[item]] = true;
    });
    var options = {
        legend: {
            selected: selections,
        }
    }

    sourceCompareBar.setOption(options);
});