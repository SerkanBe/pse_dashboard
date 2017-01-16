
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

    });



    $('button[name^="plant_type_predef"]').click(function() {
        var btn_val = $(this).val();

        var fuel_names = []; // plantTypeFilter.val() || [];
        var fuel_keys = [];
        switch(btn_val) {
            case 'green':
                $.each(dashboardState.fuelType.green,function(i,item) {
                    fuel_keys = fuel_keys.concat(item);
                });
                break;
            case 'brown':
                fuel_keys = dashboardState.fuelType.brown;
                break;
            case 'nuclear':
                fuel_keys = dashboardState.fuelType.nuclear;
                break;
        }

        $.each(fuel_keys,function(i,item) {
           fuel_names = fuel_names.concat(dashboardState.plantFuel[item]);
        });

        plantTypeFilter.val(fuel_names).trigger("change");
    });
});