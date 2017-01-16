


var echartLinetotal;
$(document).ready(function() {
echartLinetotal = echarts.init(document.getElementById('echart_line_total'), echart_theme);
})


function updateLinegraphtotal() {
	//function data not being properly read
	function aggregateYears(v){
			var year = dashboardState.getFilter('year');
			var yearend = dashboardState.getFilter('yearend');
			var y = "";
			var z = "";
			for (i = year;i<=yearend;i++){
			 y +=" '"+ ~~i+"'" + ",";
			 z += ~~i + ",";
			}
			y = y.slice(0, -1);
			z = z.slice(0, -1);
			if (v==1)
				{return z;}
			if (v==2)
				{return y;}
		}
console.log(aggregateYears(1));
console.log("---------");
console.log(aggregateYears(2));
	

    $.getJSON('/api/elec_gen.php', {
		"state[]": (dashboardState.filter.state),
	"year[]": [aggregateYears(1)],
        "order_by[year]": "ASC",
        "columns[]": ["year", "fuel"],
        "aggr[amount]": "SUM",
        "group_by[]": ["state", "year", "fuel"]
    }).done(function (data) {
        //console.log(data);
        var fuels = {};
        $.each(data, function (i, item) {
            if (typeof fuels[item.fuel] == 'undefined') {
                fuels[item.fuel] = [];
            }
            fuels[item.fuel][item.year - 1] = item.SUM_amount;
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
        echartLinetotal.setOption(lineChartOptions);
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
            //data: ['2001','2002','2003']
			data:[aggregateYears()]
        }],
        yAxis: [{
            type: 'value'
        }],
        series: []
    };


    //line_graph_query_params['debug'] = 1;

}
$(document).ready(updateLinegraphtotal);