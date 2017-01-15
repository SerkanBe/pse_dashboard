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
    setFilter: function(filter,values) {
        if (dashboardState.filter[filter] == null || typeof dashboardState.filter[filter] == 'undefined') {
            dashboardState.filter[filter] = [];
        }

        dashboardState.filter[filter] = values;
        this.fixEmptyFilter(filter);
    },
    addFilter: function (filter, value) {
        if (dashboardState.filter[filter] == null || typeof dashboardState.filter[filter] == 'undefined') {
            dashboardState.filter[filter] = [];
        }
        console.log(filter);
        console.log(value);
        dashboardState.filter[filter].push(value);
    },

    removeFilter: function (filter, value) {
        // If 'filter' is not set we can't remove anything from it.
        if (dashboardState.filter[filter] == null || typeof dashboardState.filter[filter] == 'undefined') {
            console.log("no filter found for " + filter);
            return;
        }

        index = dashboardState.filter[filter].indexOf(value);
        if (index < 0) {
            console.log("no filter-index found for " + value);
            return;
        }

        dashboardState.filter[filter].splice(index, 1);
        this.fixEmptyFilter(filter);
    },
    fixEmptyFilter: function(filter) {
        if (dashboardState.filter[filter] == null || dashboardState.filter[filter].length == 0) {
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