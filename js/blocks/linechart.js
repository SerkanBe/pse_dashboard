var echartLine;
$(document).ready(function() {
echartLine = echarts.init(document.getElementById('echart_line'), echart_theme);
})

function updateLinegraph() {
    $.getJSON('/api/elec_gen.php', {
		//"state[]": (dashboardState.filter.state),
		"place":'linechart',
		"year[]": [2001,2002,2003],
        "order_by[year, fuel]": "ASC",
        "columns[]": ["year", "fuel"],
        "aggr[amount]": "SUM",
        "group_by[]": ["year", "fuel"]
    }).done(function (data) {
        var years = [];
        var fuels = {};
		// 1: 
        $.each(data, function (i, item) {
            if (typeof fuels[item.fuel] == 'undefined') {
                fuels[item.fuel] = [];
            }
			if (years.indexOf(item.year) == -1) {
                years.push(item.year);
            }
            fuels[item.fuel][years.indexOf(item.year)] = item.SUM_amount;
        });
		console.log(years);
		console.log(fuels);
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
            x: 240,
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
			data: ['2001','2002']
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