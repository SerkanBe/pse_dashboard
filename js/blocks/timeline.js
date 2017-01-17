var slider;
$(document).ready(function () {
    slider = document.getElementById('slider');

    noUiSlider.create(slider, {
        start: [2001, 2015],
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
        dashboardState.setFilter('year', slider.noUiSlider.get()[0] * 1);
        dashboardState.setFilter('yearend', slider.noUiSlider.get()[1] * 1);

        $("#top_gen_fuels > .range").html("(" + ~~slider.noUiSlider.get()[0] + " - " + ~~slider.noUiSlider.get()[1]+")");
        $("#top_ren_fuels > .range").html("(" + ~~slider.noUiSlider.get()[0] + " - " + ~~slider.noUiSlider.get()[1]+")");
        $("#gen_sectors > .range").html("(" + ~~slider.noUiSlider.get()[0] + " - " + ~~slider.noUiSlider.get()[1]+")");
    });
})