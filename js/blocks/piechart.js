var echartPieCollapse;
var generatingSectorsPie;
var echartPieTopRenewable;

$(document).ready(function () {
    echartPieCollapse = echarts.init(document.getElementById('echart_mini_pie'), echart_theme);
    generatingSectorsPie = echarts.init(document.getElementById('generating_secotrs_pie'), echart_theme);
	echartPieTopRenewable = echarts.init(document.getElementById('echart_mini_pie_top_renewable'), echart_theme);

	dashboardState.registerForFilterChange(['year','yearend'],'updatePieChart');
	dashboardState.registerForFilterChange(['year','yearend'],'updatePieChartTopRenewable');
	dashboardState.registerForFilterChange(['year','yearend'],'updateLinegraph');
});
function updatePieChart() {
    echartPieCollapse.showLoading('default', {
        text: 'Lade Daten...',
        effect: 'bubble',
        textStyle: {
            fontSize: 20
        }
    });
	
		function aggregateYears(){
			var year = dashboardState.getFilter('year');
			var yearend = dashboardState.getFilter('yearend');
			var y = [];
			for (i = year;i<=yearend;i++){
			 y.push(i);
			}
			
			return y;
		}
		//console.log(aggregateYears());
    $.getJSON('/api/elec_gen.php', {
		"year[]": aggregateYears(),
        "group_by[]": ["fuel"],
        "order_by[SUM_amount]": "DESC",
        "aggr[amount]": "SUM",
        "range[limit]": 5,
        "columns[]": ["fuel"]
    }).done(function (data) {
        var values = [];
        var columns = [];
        $.each(data, function (i, item) {
            columns[i] = item.fuel;
            values[i] = {name: item.fuel, value: item.SUM_amount};
//ADD FILTER
            dashboardState.addFilter('fuel', item.fuel);
        });

        echartPieCollapse.setOption({
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
				
            },
            legend: {
                orient: 'vertical',
                x: 'right',
                y: 'bottom',
                data: columns
            },
            toolbox: {
                show: true,
                feature: {
                    magicType: {
                        show: true,
                        type: ['pie', 'funnel']
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
            series: [{
                name: 'Area Mode',
				itemStyle: {
                    normal: {
                        label: {
                            show: false
                        },

                    },
                },
                type: 'pie',
                radius: [80, 160],
                center: ['40%', 170],
                roseType: 'area',
                x: 'center',
                max: 40,
                sort: 'ascending',
                data: values
            }]
        });
        echartPieCollapse.hideLoading();
        //render_line_graph();

    });
}
$(document).ready(updatePieChart);
$(document).ready(createGeneratingSectorsPie);
$(document).ready(updatePieChartTopRenewable);


function updateGeneratingSectorsPie() {

}

function createGeneratingSectorsPie() {
    generatingSectorsPie.showLoading('default', {
        text: 'Lade Daten...',
        effect: 'bubble',
        textStyle: {
            fontSize: 20
        }
    });
    $.getJSON('/api/elec_gen.php', {
        "year[]": dashboardState.getFilter('year'),
        "group_by[]": ["sector"],
        "order_by[SUM_amount]": "DESC",
        "aggr[amount]": "SUM",
        //"range[limit]": 5,
        "columns[]": ["sector"]
    }).done(function (data) {
        var parentValues = [];
        var parentColumns = ['Electric utility', 'Commercial', 'Industrial', 'Residential'];

        var childValues = [];
        var childColumns = [];
        $.each(data, function (i, item) {

            parentSector = item.sector.replace('non-cogen', '').replace('cogen', '').trim();
            topIndex = parentColumns.indexOf(parentSector);
            if (topIndex >= 0) {
                if (typeof parentValues[topIndex] == 'undefined') {
                    parentValues[topIndex] = {name: parentSector, value: 0};
                }
                parentValues[topIndex].value = parentValues[topIndex].value + (item.SUM_amount * 1);
            }
            if(item.sector == 'Electric utility') item.sector = 'Electric utility n/a';

            childColumns[i] = item.sector;
            childValues[i] = {name: item.sector, value: item.SUM_amount*1};

            //dashboardState.addFilter('sector', item.sector);
        });

        generatingSectorsPie.setOption({
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                orient: 'horizontal',
                x: 'center',
                y: 'bottom',
                data:  parentColumns.concat(childColumns),
            },
            toolbox: {
                show: true,
                feature: {
                    restore: {
                        show: true,
                        title: "Restore"
                    },
                }
            },
            calculable: true,
            series: [{
                name: 'Parent sectors',
                type: 'pie',
                radius: ['72%', '80%'],
                center: ['50%', '35%'],
                itemStyle: {
                    normal: {
                        label: {
                            show: false
                        },

                    },
                },
                //sort: 'ascending',
                data: parentValues
            }, {
                name: 'Child sectors',
                type: 'pie',
                radius: ['48%','60%'],
                center: ['50%', '35%'],
                itemStyle: {
                    normal: {
                        label: {
                            show: false
                        },

                    },
                },
                //sort: 'ascending',
                data: childValues
            }]
        });
        generatingSectorsPie.hideLoading();
    });
}

function updatePieChartTopRenewable() {
    echartPieTopRenewable.showLoading('default', {
        text: 'Lade Daten...',
        effect: 'bubble',
        textStyle: {
            fontSize: 20
        }
    });
	
		function aggregateYears(){
			var year = dashboardState.getFilter('year');
			var yearend = dashboardState.getFilter('yearend');
			var y = [];
			for (i = year;i<=yearend;i++){
			 y.push(i);
			}
			
			return y;
		}
		//console.log(aggregateYears());
    $.getJSON('/api/elec_gen.php', {
		"year[]": aggregateYears(),
        "group_by[]": ["fuel"],
        "order_by[SUM_amount]": "DESC",
        "aggr[amount]": "SUM",
        //"range[limit]": 5,
        "columns[]": ["fuel"]
    }).done(function (data) {
        var values = [];
        var columns = [];
        $.each(data, function (i, item) {
			//console.log(data[i].fuel);
			
			if(['wind','All solar','conventional hydroelectric','geothermal'].indexOf(item.fuel) > -1){
				columns.push(item.fuel);
				values.push({name: item.fuel, value: item.SUM_amount});
				dashboardState.addFilter('fuel', item.fuel);
			}
        });
//console.log(values);
        echartPieTopRenewable.setOption({
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
				
            },
            legend: {
                orient: 'vertical',
                x: 'right',
                y: 'bottom',
                data: columns
            },
            toolbox: {
                show: true,
                feature: {
                    magicType: {
                        show: true,
                        type: ['pie', 'funnel']
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
            series: [{
                name: 'Area Mode',
				itemStyle: {
                    normal: {
                        label: {
                            show: false
                        },

                    },
                },
                type: 'pie',
                radius: [80, 160],
                center: ['40%', 170],
                roseType: 'area',
                x: 'center',
                max: 40,
                sort: 'ascending',
                data: values
            }]
        });
        echartPieTopRenewable.hideLoading();
    });
}