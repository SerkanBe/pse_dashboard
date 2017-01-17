
$(document).ready(function () {

    // Set the plant-type-options
    var plantTypeFilter = $('select[name="plant_type"]');
    plantTypeFilter.select2({
        placeholder: "Select the fuel of the plants to filter",
        allowClear: true
    });

    var plantTypeFilterOptions = [];
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

            plantTypeFilterOptions.push(item.fuel);
        })
    });

    plantTypeFilter.change(function() {
        if($(this).val() != null) {
            dashboardState.setFilter('plantFuel', $(this).val());
        } else {
            dashboardState.setFilter('plantFuel', '_none');
        }
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
            case '_all':
                plantTypeFilter.val(plantTypeFilterOptions).trigger("change");
                return;
                break;
            case '_none':
                plantTypeFilter.val(['_none']).trigger("change");
                return;
                break;
			
        }

        $.each(fuel_keys,function(i,item) {
           fuel_names = fuel_names.concat(dashboardState.plantFuel[item]);
        });

        plantTypeFilter.val(fuel_names).trigger("change");
    });
	
	
	   $('button[name="plant_map_type"]').click(function() {
		   var btn_val = $(this).val();
		    switch(btn_val) {
				case 'windspeed':
					dashboardState.filter.showtemp = 'off';
					dashboardState.setFilter('windspeed', 'on');
					
					return;
					break;
				case 'temp':
					dashboardState.filter.windspeed = 'off';
					dashboardState.setFilter('showtemp', 'on');
					return;
					break;
				case 'clear':
					dashboardState.filter.windspeed = 'off';
					dashboardState.filter.showtemp = 'off';
					dashboardState.setFilter('mapclear', 'on');
					return;
					break;
			}
	   });
});