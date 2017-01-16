var slider;
$(document).ready(function () {
    slider = document.getElementById('slider');

    noUiSlider.create(slider, {
        start: [2001,2015],
		connect: [false, true, false],
        step: 1,
        range: {
            'min': [2001],
            'max': [2015]
        },
        pips: {
            mode: 'values',
            values: [2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015],
            density: 5
        }
    });

    slider.noUiSlider.on('change', function () {
		// ADJUST piechart 
		dashboardState.setFilter('year',[slider.noUiSlider.get()[0]]);
		dashboardState.setFilter('yearend',[slider.noUiSlider.get()[1]]);
        updatePieChart();
		updatePieChartTopRenewable();
		updateLinegraph();
		//updateLinegraphtotal();
		$("#top5").innerHTML = "Top 5 gen. fuels "+ ~~slider.noUiSlider.get()[0] +" - "+ ~~slider.noUiSlider.get()[1] ;
		document.getElementById("linecharttotal").innerHTML = "Energy generation by fuel average "+ ~~slider.noUiSlider.get()[0] +" - "+ ~~slider.noUiSlider.get()[1] ;
    });
})