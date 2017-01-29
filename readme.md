# Dashboard for the electricity data from the EIA

This is the dashboard for the transformation in of the
[PSE-Project](https://github.com/SerkanBe/PSE).
The base of the dashboard is
[genetellela](https://github.com/puikinsh/gentelella), a Bootstrap admin
 template.

We're using the
[EChart](https://ecomfe.github.io/echarts/doc/doc-en.html)-components in
that template and [jvectormap](http://jvectormap.com/).

In the Backend there is a simple MySQL-query-constructor, which creates
and runs the queries defined with GET-Parameters.
The frontend is mostly configuration of the charts and getting the data
using mentioned API. There is also an "DashboardState"-Object, which
does handle commonly used variables and implements the observer-pattern
to update charts on changes.


# Code-structure

We've used the gentelella template, without any
packet/dependency-manager. So we have all the sub-modules in vendor.

## Backend

The backend consists of one php-script for each fact and the
processor (get_processor.php), which creates and runs the queries and
returns the result as a json-string.

### Facts-script

Each one of those do the same:
- Instanciate the PDO-Object
- implement `column_exists`
- define the default selec_claus, which will be used if no columns are
 given via $_GET
- list all available fields in the form of
 `column_alias => table_alias.column_name`.
- Define the tables to join
- call the processor to create the query
- execute the query and return the resuls as a JSON-String


#### If there is a new table/dimension to join
 You have to join it in `$q_tables` and add the fields to
 `$available_fields` and `$select_clause`.
When joining the table make sure to use the correct join
(LEFT,RIGHT,INNER,OUTER), otherwise you might get wrong result sets but
 not notice it immediately.
If you do it just like the other scripts it should work with the
 processor immediately.



### Get-Processor
This is named "Get-Processor" because it processes the GET-Parameters.
 Should've named it "query_processor".

It starts with initializing the $_GET-arguments it's going to use, to
 avoid PHP-Notices about undefined indexes.

**NOTICE**
Right now we use the keys of the GET-array and compare them with the
 array of available fields to create the where-clause. So if you have a
  column named 'group_by', you will break this probably, as the key
   'group_by' is used by *do_group_by* to create the group-by-clause.
In that case you would filter for the given value for 'group_by' but
 also group by something you may not have wanted.

So either don't use the keys used in get_processor.php, or write some
 code to handle the 'where-clause' better.


There are six function which are named to tell what they do. They are
 documented in Code (doxygen-style)


## Frontend

The frontend consists of the index.php which is a stripped-down version
 of the original template, and javascript.

The JS-Files are:
 - /js/echart_theme.js
 - /js/dashboardState.js
 - All the js-files in /js/blocks/*

### echart_theme.js
This is the theme-config for the charts. Originaly contained in the
 index.html, like everything else.
If you don't like the colors of the charts you might have a look here,
 otherwise just ignore.

### dashboardState.js
This is a piece of custom-code. This holds the state of the dashboard.

Since we mostly filter all of the charts for the same values, meaning
 they share the same state of filters, this is a global object all
  charts know and use to communicate updates in the filters to each
   other.

You should use the functions `setFilter`,`addFilter` and `removeFilter`
 to manipulate the state instead of directly working with the
 filter-object. That way you can be sure the charts who registered
 to be updated
 on filter-changes get updated. For performance it might make sense to
 work with the filter-object, but than you should also do
 `this.triggerChartUpdates(filter)`, where filter is the filter you
 updated.

Did I say 'charts registered to be updated'?
Use `registerForFilterChange(filter,callback)` to register for changes
 on a filter. You don't have to worry about what DOM-Element changes for
 which filter, that's taken care of implicitly by using the mentioned
 methods.

Here are also some constants saved, like fuels, and also static-values
like sunlight-hours and wind-speeds.

- `fuels` contains all fuels mentioned in *elec_net_gen*, so the
generation-numbers use these fuel-types. For better handling in code
they got machine-names/keys.
- `plantFuel` maps the fuel-types used in the *plant_gen* and
*plant_cons* facts to the ones mentioned above. This is interesting for
 the map as we want to filter by fuel-type, but have to have a common
 group of fuels to use. So when we filter for 'other_bio' we get a bunch
 of plant-fuels but only one for *elec_net_gen* numbers, which are shown
 in the other charts we want to filter at the same time.
- `fuelType` is just grouping the values of `fuels` into 'green',
'brown' and 'nuclear'. We use that for the quick-filter-buttons.
- `statedata` has the mentioned static-values for sunlight and
windspeeds, used in the map but not given by the tables at hand.
One might use a API to get updated values.

