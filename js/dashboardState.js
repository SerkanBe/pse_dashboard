/**
 * Collection of functions to work with the dashboard-state
 */

var dashboardState = {
    filter: {
        // Some default-values
        year: 2001,
        yearend: 2015,
        state: ['*'],
        fuel: ['*'],
        plant_fuel: [''],
		windspeed: ['off'],
		showtemp: ['off']
    },
    setFilter: function (filter, values) {
        if (dashboardState.filter[filter] == null || typeof dashboardState.filter[filter] == 'undefined') {
            dashboardState.filter[filter] = [];
        }

        dashboardState.filter[filter] = values;
        this.fixEmptyFilter(filter);

        this.triggerChartUpdates(filter);
    },
    addFilter: function (filter, value) {
        if (dashboardState.filter[filter] == null || typeof dashboardState.filter[filter] == 'undefined') {
            dashboardState.filter[filter] = [];
        }
        dashboardState.filter[filter].push(value);

        this.triggerChartUpdates(filter);
    },

    removeFilter: function (filter, value) {
        // If 'filter' is not set we can't remove anything from it.
        if (dashboardState.filter[filter] == null || typeof dashboardState.filter[filter] == 'undefined') {
            //console.log("no filter found for " + filter);
            return;
        }

        index = dashboardState.filter[filter].indexOf(value);
        if (index < 0) {
            //console.log("no filter-index found for " + value);
            return;
        }

        dashboardState.filter[filter].splice(index, 1);
        this.fixEmptyFilter(filter);

        this.triggerChartUpdates(filter);
    },
    fixEmptyFilter: function (filter) {
        if (dashboardState.filter[filter] == null || dashboardState.filter[filter].length == 0) {
            dashboardState.addFilter(filter, '*');
        }
    },
    get: function (filter) {
        if (typeof dashboardState.filter[filter] == 'undefined') {
            return [];
        }

        return dashboardState.filter[filter];
    },

    filterCallbacks: {
        '_all': [], // callbacks which should be called on every filter change
    },
    registerForFilterChange: function(filters,callback) {
        $.each(filters, function(i,filter) {
            if (typeof dashboardState.filterCallbacks[filter] == 'undefined') {
                dashboardState.filterCallbacks[filter] = [];
            }
            dashboardState.filterCallbacks[filter].push(callback);
        });
    },

    triggerChartUpdates: function(filter) {
        if(typeof this.filterCallbacks[filter] != 'undefined') {
            $.each(this.filterCallbacks[filter].concat(this.filterCallbacks['_all']), function (i, item) {
                window[item]();
            });
        }
    },

    fuelType: {
        green: {
            solar: [
                'all_soll',
                'all_util_sol',
                'util_sol_photo',
                'dist_photovolt',
            ],
            thermal: [
                'geotherm',
                'util_therm',
            ],
            hydro: [
                'con_hydro',
                'hydro_pump',
            ],
            wind: [
                'wind',
            ],
            other: [
                'other_ren',
            ]
        },
        brown: [
            'nat_gas',
            'pet_coke',
            'coal',
            'pet_liq',
            'other_gas',
            'wood',
            'other_bio',
            'waste',
        ],
        nuclear: ['nuclear']
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
        con_hydro: [
            'conventional hydroelectric',
        ],
        pet_liq: [
            'distillate fuel oil',
            'residual fuel oil',
            'kerosene',
            'jet fuel',
            'waste/other oil',
        ],
        nat_gas: [
            'natural gas',
            'gaseous propane',
        ],
        coal: [
            'bituminous coal',
            'lignite coal',
            'subbituminous coal',
            'waste/other coal',
        ],
        pet_coke: [
            'petroleum coke',
        ],
        wind: [
            'wind',
        ],
        other_gas: [
            'landfill gas',
            'coal-derived synthetic gas',
            'other gas',
            'blast furnace gas',
        ],
        geotherm: [
            'geothermal',
        ],
        nuclear: [
            'nuclear'
        ],
        all_soll: [
            'solar'
        ],
        wood: [
            'wood/wood waste solids',
        ],
        other_bio: [
            'other biomass gas',
            'other biomass solids',
            'agricultural by-products',
            'other biomass liquids',
            'black liquour',
        ],
        other: [
            'other',
        ],
        waste: [
            'non-biogenic municipal solid waste',
            'biogenic municipal solid waste',
            'municipal solid waste',
            'waste heat',
            'sludge waste',
            'tire-derived fuels',
        ],
        purch_steam: [
            'purchased steam'
        ]
    },
	
	statedata: 	{
		sunlightpercent: [
			{'US-AL': 58},
			{'US-AK': 41},
			{'US-AZ': 85},
			{'US-AR': 61},
			{'US-CA': 68},
			{'US-CO': 71},
			{'US-CT': 56},
			{'US-DC': 0}, 
			{'US-DE': 0},
			{'US-FL': 66},
			{'US-GA': 66},
			{'US-HI': 71},
			{'US-ID': 64},
			{'US-IL': 56},
			{'US-IN': 55},
			{'US-IA': 59},
			{'US-KY': 65},
			{'US-KS': 56},
			{'US-LA': 57},
			{'US-MA': 57},
			{'US-MD': 57},
			{'US-ME': 58},
			{'US-MI': 51},
			{'US-MN': 58},
			{'US-MS': 61},
			{'US-MO': 60},
			{'US-MT': 59},
			{'US-NE': 61},
			{'US-NV': 79},
			{'US-NH': 54},
			{'US-NJ': 56},
			{'US-NM': 76},
			{'US-NY': 46},
			{'US-NC': 60},
			{'US-ND': 59},
			{'US-OH': 50},
			{'US-OK': 68},
			{'US-OR': 48},
			{'US-PA': 58},
			{'US-RI': 58},
			{'US-SC': 64},
			{'US-SD': 63},
			{'US-TN': 56},
			{'US-TX': 61},
			{'US-UT': 66},
			{'US-VT': 49},
			{'US-VA': 63},
			{'US-WA': 47},
			{'US-WV': 0}, 
			{'US-WI': 54},
			{'US-WY': 68}
		],
		sunlighttotalhrs: {
			'US-AL': 2641,
			'US-AK': 2061,
			'US-AZ': 3806,
			'US-AR': 2771,
			'US-CA': 3055,
			'US-CO': 3204,
			'US-CT': 2585,
			'US-DC': 2250,
			'US-DE': 2600,
			'US-FL': 2927,
			'US-GA': 2986,
			'US-HI': 2600,
			'US-ID': 2993,
			'US-IL': 2567,
			'US-IN': 2440,
			'US-IA': 2691,
			'US-KY': 2922,
			'US-KS': 2514,
			'US-LA': 2649,
			'US-MA': 2513,
			'US-MD': 2582,
			'US-ME': 2634,
			'US-MI': 2392,
			'US-MN': 2711,
			'US-MS': 2720,
			'US-MO': 2690,
			'US-MT': 2698,
			'US-NE': 2762,
			'US-NV': 3646,
			'US-NH': 2519,
			'US-NJ': 2499,
			'US-NM': 3415,
			'US-NY': 2120,
			'US-NC': 2651,
			'US-ND': 2738,
			'US-OH': 2183,
			'US-OK': 3089,
			'US-OR': 2341,
			'US-PA': 2614,
			'US-RI': 2606,
			'US-SC': 2826,
			'US-SD': 2947,
			'US-TN': 2510,
			'US-TX': 2850,
			'US-UT': 3029,
			'US-VT': 2295,
			'US-VA': 2829,
			'US-WA': 2170,
			'US-WV': 2600,
			'US-WI': 2428,
			'US-WY': 3073
		},
		meantempc:[	
			{'US-AL':	17.1 },
			{'US-AK':	-3.0 },
			{'US-AZ':	15.7 },
			{'US-AR':	15.8 },
			{'US-CA':	15.2 },
			{'US-CO':	7.3  },
			{'US-CT':	9.4  },
			{'US-DC':	0    },
			{'US-DE':	0    },
			{'US-FL':	21.5 },
			{'US-GA':	17.5 },
			{'US-HI':	0    },
			{'US-ID':	6.9  },
			{'US-IL':	11.0 },
			{'US-IN':	10.9 },
			{'US-IA':	8.8  },
			{'US-KY':	12.4 },
			{'US-KS':	13.1 },
			{'US-LA':	19.1 },
			{'US-MA':	5.0  },
			{'US-MD':	12.3 },
			{'US-ME':	8.8  },
			{'US-MI':	6.9  },
			{'US-MN':	5.1  },
			{'US-MS':	17.4 },
			{'US-MO':	12.5 },
			{'US-MT':	5.9  },
			{'US-NE':	9.3  },
			{'US-NV':	9.9  },
			{'US-NH':	6.6  },
			{'US-NJ':	11.5 },
			{'US-NM':	11.9 },
			{'US-NY':	7.4  },
			{'US-NC':	15.0 },
			{'US-ND':	4.7  },
			{'US-OH':	10.4 },
			{'US-OK':	15.3 },
			{'US-OR':	9.1  },
			{'US-PA':	9.3  },
			{'US-RI':	10.1 },
			{'US-SC':	16.9 },
			{'US-SD':	7.3  },
			{'US-TN':	14.2 },
			{'US-TX':	18.2 },
			{'US-UT':	9.2  },
			{'US-VT':	6.1  },
			{'US-VA':	12.8 },
			{'US-WA':	9.1  },
			{'US-WV':	0    },
			{'US-WI':	6.2  },
			{'US-WY':	5.6  }
		],
		avgwindspeed: {
		
			'US-AL':                       14.70   ,
			'US-AK':                       16.35   ,
			'US-AZ':                       15.92   ,
			'US-AR':                       16.44   ,
			'US-CA':                       13.54   ,
			'US-CO':                       20.16   ,
			'US-CT':                       13.97   ,
			'US-DC':           				31.44   ,
			'US-DE':                  	 	12.91   ,
			'US-FL':                       14.63   ,
			'US-GA':                       15.34   ,
			'US-HI':                   		14.03   ,
			'US-ID':                       20.59   ,
			'US-IL':                       18.28   ,
			'US-IN':                       17.84   ,
			'US-IA':                       18.09   ,
			'US-KY':                       19.30   ,
			'US-KS':                       16.26   ,
			'US-LA':                       13.60   ,
			'US-MA':                       16.95   ,
			'US-MD':                       19.74   ,
			'US-ME':                       15.76   ,
			'US-MI':                       17.50   ,
			'US-MN':                       18.51   ,
			'US-MS':                       15.19   ,
			'US-MO':                       19.31   ,
			'US-MT':                       21.03   ,
			'US-NE':                       18.51   ,
			'US-NV':                       17.43   ,
			'US-NH':                       17.13   ,
			'US-NJ':                       14.33   ,
			'US-NM':                       17.82   ,
			'US-NY':                       15.57   ,
			'US-NC':                       17.99   ,
			'US-ND':                       18.80   ,
			'US-OH':                       16.16   ,
			'US-OK':                       16.46   ,
			'US-OR':                       16.38   ,
			'US-PA':                       17.42   ,
			'US-RI':                       14.91   ,
			'US-SC':                       15.88   ,
			'US-SD':                       21.32   ,
			'US-TN':                       17.43   ,
			'US-TX':                       15.55   ,
			'US-UT':                       18.26   ,
			'US-VT':                       18.07   ,
			'US-VA':                       19.32   ,
			'US-WA':                       15.03   ,
			'US-WV':                  	 	18.72   ,
			'US-WI':                       18.40   ,
			'US-WY':                       20.88   
		}
	}
}