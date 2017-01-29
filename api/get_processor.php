<?php

(isset($_GET['group_by'])) ?: $_GET['group_by'] = NULL;
(isset($_GET['order_by'])) ?: $_GET['order_by'] = NULL;
(isset($_GET['columns'])) ?: $_GET['columns'] = NULL;
(isset($_GET['aggr'])) ?: $_GET['aggr'] = NULL;
(isset($_GET['range']['offset'])) ?: $_GET['range']['offset'] = NULL;
(isset($_GET['range']['limit'])) ?: $_GET['range']['limit'] = NULL;

/**
 * Creates the where-clause for a query using the filters set in the $_GET-array.
 * It iterates through the available-fields and checks if there is a value set in $_GET[$field].
 * If so add it to the filter.
 *
 *  ==>> This means you shouldn't use any of the keys set above (group_by,order_by,columns,aggr,range), as they will be
 * filtered by here AND the other functions will interpret them as input and process them as such, resulting in unwanted
 * queries.
 *
 *
 * Usage:
 * Filter for one or more values (OR):
 * $_GET['fuel'] = array('Coal') => WHERE fuel IN ('Coal');
 * $_GET['fuel'] = array('Coal','Oil') => WHERE fuel IN ('Coal','Oil');
 *
 * Ignore row/get all values for a column:
 * $_GET['fuel'] = '*'
 *
 * Get rows where values are not in:
 * $_GET['!fuel'] = array('Coal','Oil') => WHERE fuel NOT IN ('Coal','Oil')
 *
 * Use Between for ranges
 *
 * $_GET['between']['year'] = array('start'=>2001,'end'=>2015) => WHERE year BETWEEN 2001 AND 2015
 *
 * @param array $get_values The $_GET-array
 * @param array $available_fields An array of available fields we can filter in form of: alias => a.col
 * @param string $where_clause The default where-clause
 * @return string The resulting where-clause
 */

function do_where($get_values = NULL, $available_fields = array(), $where_clause = '') {
    global $db;
    if ($get_values !== NULL) {
        $filters = array();
        foreach ($available_fields as $field => $col) {
            if (isset($get_values[$field])) {
                $get_values[$field] = array_filter($get_values[$field], function ($v) {
                    return $v !== '*';
                });
                if (!empty($get_values[$field])) {
                    $filters[$field] = $col . ' IN (' . implode(',', array_map(array(
                            $db,
                            'quote'
                        ), $get_values[$field])) . ')';
                }
            }
            $neg_field = '!'.$field;
            if (isset($get_values[$neg_field])) {
                $get_values[$neg_field] = array_filter($get_values[$neg_field], function ($v) {
                    return $v !== '*';
                });
                if (!empty($get_values[$neg_field])) {
                    $filters[$neg_field] = $col . ' NOT IN (' . implode(',', array_map(array(
                            $db,
                            'quote'
                        ), $get_values[$neg_field])) . ')';
                }
            }
            if(isset($get_values['between'][$field])) {
                $between = $get_values['between'][$field];
                if(isset($between['start']) && isset($between['end'])) {
                    $filters['between_'.$field] = $col.' BETWEEN '.$between['start'].' AND '.$between['end'];
                }
            }
        }

        if (!empty($filters)) {
            $where_clause = ' WHERE ' . implode(' AND ', $filters);
        }
    }

    return $where_clause;
}

/**
 * Creates the group-by clause to group the results of the query.
 *
 * Usage:
 * $group_by = array('fuel','state','year');
 *
 * @param array $group_by Array of fields to group by
 * @param array $available_fields An array of available fields we can group by in form of: alias => a.col
 * @param string $group_clause Default group-by-clause
 * @return bool|string The resulting clause, or FALSE in case an invalid columns was given
 */
function do_group_by($group_by = NULL, $available_fields = array(), $group_clause = '') {
    global $db;
    if ($group_by !== NULL) {
        if (column_exists($group_by)) {
            echo json_encode('invalid group column');
            return FALSE;
        }

        $fields = array();
        foreach ($available_fields as $field => $col) {
            if (in_array($field, $group_by)) {
                $fields[$field] = $col;
            }
        }

        if (!empty($fields)) {
            $group_clause = ' GROUP BY ' . implode(', ', $fields);
        }
    }

    return $group_clause;
}

/**
 * Creates the order-by clause to order the results of the query
 *
 * Usage:
 * $order_by = array('year'=>'ASC','state'=>'DESC')
 *
 * @param array $order_by Array of fields to order by
 * @param array $available_fields An array of available fields we can order by in form of: alias => a.col
 * @param string $order_clause Default order-clause
 * @return string The resulting clause
 */
function do_order_by($order_by = NULL, $available_fields = array(), $order_clause = '') {
    global $db;
    if ($order_by !== NULL) {
        $fields = array();
        foreach ($order_by as $field => $order) {
            $fields[] = $field . ' ' . $order;
        }

        if (!empty($fields)) {
            $order_clause = ' ORDER BY ' . implode(', ', $fields);
        }
    }

    return $order_clause;
}

/**
 * This creates the select-clause including aggregations (COUNT(),SUM(),AVG(), etc...)
 *
 * Usage:
 *  columns:
 *  $columns = array('state','fuel','year');
 *
 *  aggregations:
 *  $aggregations = array('amount'=>'SUM'); // Will sum the amounts... if that wasn't clear.
 *
 * @param array $columns Array of columns to show
 * @param array $aggregations Array of aggregations to make
 * @param array $available_fields Array of available fields in form of: alias => a.col
 * @param string $select_clause Default select-clause
 * @return string The resulting clause
 */
function do_select($columns = NULL, $aggregations = array(), $available_fields = array(), $select_clause = '') {
    global $db;
    if ($columns !== NULL) {
        $fields = array();
        foreach ($available_fields as $field => $col) {
            if (in_array($field, $columns)) {
                $fields[$field] = $col . ' as ' . $field;
            }
        }

        // We want to aggregate fields?!

        if (isset($aggregations)) {
            foreach ($aggregations as $field => $func) {
                if ($field === '*') {
                    $fields[$field] = $func . '(*) as count';
                } else {
                    $fields[$field] = $func . '(' . $field . ') as ' . $func . '_' . $field;
                }
            }
        }

        if (!empty($fields)) {
            $select_clause = implode(', ', $fields);
        }
    }

    return $select_clause;
}


/**
 * Creates a limit clause to limit the number of results
 *
 * To get all items:
 * $offset = NULL; $limit = NULL;
 *
 * To get first 10 items:
 * $offset = NULL; $limit = 10; // You could set $offset to 0, but you don't have to.
 *
 * To get all items starting from 10 (so the 11th will be the first)
 * $offset = 10; $limit = NULL;
 *
 * To get 10 items starting from 20
 * $offset = 20; $limit = 10;
 *
 * @param null|int $offset The offset to start
 * @param null|int $limit The number of items to show
 * @return string The resulting clause, or empty string
 */
function do_limit($offset = NULL, $limit = NULL) {
    if ($offset === NULL && $limit === NULL) {
        return ''; // Nothing to do, get all rows
    }

    if ($offset === NULL && $limit !== NULL) {
        return ' LIMIT 0,' . $limit;
    }

    if ($offset !== 0 && $limit == NULL) {
        // Get all rows from an offset... http://dev.mysql.com/doc/refman/5.7/en/select.html#id4651990
        $get_all_rows_limit = '18446744073709551615';
        return ' LIMIT ' . $offset . ',' . $get_all_rows_limit;
    }

    return ' LIMIT ' . $offset . ',' . $limit;

}


/**
 * @param string $q_tables The join-clauses (including the table itself)
 * @param array $available_fields Array of available fields in form of: alias => a.col
 * @param string $select_clause Default Select-clause
 * @return string Resulting select-clause
 */
function create_query($q_tables, $available_fields, $select_clause) {
    $where_clause = do_where($_GET, $available_fields);
    $group_clause = do_group_by($_GET['group_by'], $available_fields);
    $order_clause = do_order_by($_GET['order_by'], $available_fields);
    $select_clause = do_select($_GET['columns'], $_GET['aggr'], $available_fields, $select_clause);
    $limit_clause = do_limit($_GET['range']['offset'], $_GET['range']['limit']);

    $q_str = 'SELECT ' . $select_clause . '
' . $q_tables;

    (empty($where_clause)) ?: $q_str .= $where_clause;
    (empty($group_clause)) ?: $q_str .= $group_clause;
    (empty($order_clause)) ?: $q_str .= $order_clause;
    (empty($limit_clause)) ?: $q_str .= $limit_clause;

    if (isset($_GET['debug'])) {
        echo $q_str;
    }

    return $q_str;
}