var echartPieCollapse;
var generatingSectorsPie;

$(document).ready(function () {
    echartPieCollapse = echarts.init(document.getElementById('echart_mini_pie'), echart_theme);
    generatingSectorsPie = echarts.init(document.getElementById('generating_secotrs_pie'), echart_theme);
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
		var y = "[";
		for (i = year;i<=yearend;i++){
		 y += i + ",";
		 
		}
		y = y.slice(0, -1);
		y+= "]";
		return y;
	}
	
	
    $.getJSON('/api/elec_gen.php', {
//GET FILTER
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
                type: 'pie',
                radius: [30, 110],
                center: ['50%', 170],
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
                radius: ['50%', '60%'],
                center: ['50%', '35%'],
                startAngle: 0,
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
                radius: ['0%','40%'],
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