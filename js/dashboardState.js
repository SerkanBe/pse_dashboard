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
    },
    fuels: {
        con_hydro: 'conventional hydroelectric',
        nat_gas: 'natural gas',
        pet_coke: 'petroleum coke',
        wind: 'wind',
        geotherm: 'geothermal',
        nuclear: 'nuclear',
        other: 'other',
        coal: 'Coal',
        pet_liq: 'Petroleum liquids',
        other_gas: 'Other gases',
        other_ren: 'Other renewables (total)',
        all_util_sol: 'All utility-scale solar',
        wood: 'Wood and wood-derived fuels',
        other_bio: 'Other biomass',
        hydro_pump: 'Hydro-electric pumped storage',
        util_sol_photo: 'Utility-scale photovoltaic',
        util_therm: 'Utility-scale thermal',
        all_soll: 'All solar',
        dist_photovolt: 'Distributed photovoltaic',
    },
    plantFuel: {
        'conventional hydroelectric': '',
        'distillate fuel oil': '',
        'natural gas': '',
        'bituminous coal': '',
        'lignite coal': '',
        'subbituminous coal': '',
        'gaseous propane': '',
        'residual fuel oil': '',
        'petroleum coke': '',
        'kerosene': '',
        'wind': '',
        'landfill gas': '',
        'coal-derived synthetic gas': '',
        'jet fuel': '',
        'geothermal': '',
        'nuclear': '',
        'waste/other oil': '',
        'solar': '',
        'wood/wood waste solids': '',
        'other biomass gas': '',
        'purchased steam': '',
        'waste heat': '',
        'black liquour': '',
        'sludge waste': '',
        'waste/other coal': '',
        'other biomass solids': '',
        'agricultural by-products': '',
        'other gas': '',
        'tire-derived fuels': '',
        'other biomass liquids': '',
        'non-biogenic municipal solid waste': '',
        'biogenic municipal solid waste': '',
        'blast furnace gas': '',
        'other': '',
        'municipal solid waste': ''
    }
}