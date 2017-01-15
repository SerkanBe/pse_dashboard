/**
 * Collection of functions to work with the dashboard-state
 */

var dashboardState = {
        filter: {
            // Some default-values
            year: [2001],
            state: ['*'],
            fuel: ['*'],
            plant_fuel: ['*']
        },

        addFilter: function (filter, value) {
            if (typeof dashboardState.filter[filter] == 'undefined') {
                dashboardState.filter[filter] = [];
            }

            dashboardState.filter[filter].push(value);
        },

        removeFilter: function (filter, value) {
            // If 'filter' is not set we can't remove anything from it.
            if (typeof dashboardState.filter[filter] == 'undefined') {
                console.log("no filter found for " + filter);
                return;
            }

            index = dashboardState.filter[filter].indexOf(value);
            if (index < 0) {
                console.log("no filter-index found for " + value);
                return;
            }

            dashboardState.filter[filter].splice(index, 1);
            if (dashboardState.filter[filter].length == 0) {
                dashboardState.addFilter(filter, '*');
            }

        },

        getFilter: function (filter) {
            if (typeof dashboardState.filter[filter] == 'undefined') {
                return [];
            }

            return dashboardState.filter[filter];
        }
    }
    ;