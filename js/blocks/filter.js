
$(document).ready(function () {

    // Set the plant-type-options
    var plantTypeFilter = $('select[name="plant_type"]');
    plantTypeFilter.select2({
        placeholder: "Select the fuel of the plants to filter",
        allowClear: true
    });
    $.getJSON('/api/plant.php', {
        "columns[]": ["fuel"],
        "aggr[*]": "COUNT",
        "group_by[]": ["fuel"],
        "order_by[COUNT]": "DESC"
    }, function (json) {
        $.each(json, function (i, item) {
            if(item.fuel == null) {
                return;
            }
            option = new Option(item.fuel,item.fuel)
            plantTypeFilter.append(option);
        })
    });

    plantTypeFilter.change(function() {
        dashboardState.setFilter('plantFuel', $(this).val());
        updateUsMap();
    });

});