<?php

(isset($_GET['group_by'])) ?: $_GET['group_by'] = NULL;
(isset($_GET['order_by'])) ?: $_GET['order_by'] = NULL;
(isset($_GET['columns'])) ?: $_GET['columns'] = NULL;
(isset($_GET['aggr'])) ?: $_GET['aggr'] = NULL;
(isset($_GET['range']['offset'])) ?: $_GET['range']['offset'] = NULL;
(isset($_GET['range']['limit'])) ?: $_GET['range']['limit'] = NULL;
function do_where($get_values = NULL, $available_fields = array(), $where_clause = '')
{
	global $db;
  if ($get_values !== NULL) {
    $filters = array();
    foreach($available_fields as $field => $col) {
      if (isset($get_values[$field])) {
        $filters[$field] = $col . ' IN (' . implode(',', array_map(array(
          $db,
          'quote'
        ) , $get_values[$field])) . ')';
      }
    }

    if (!empty($filters)) {
      $where_clause = ' WHERE ' . implode(' AND ', $filters);
    }
  }

  return $where_clause;
}

function do_group_by($group_by = NULL, $available_fields = array(), $group_clause = '')
{
	global $db;
  if ($group_by !== NULL) {
    if (column_exists($group_by)) {
      echo json_encode('invalid group column');
      return FALSE;
    }

    $fields = array();
    foreach($available_fields as $field => $col) {
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

function do_order_by($order_by = NULL, $available_fields = array(), $order_clause = '')
{
	global $db;
  if ($order_by !== NULL) {    
    $fields = array();
    foreach($order_by as $field => $order) {
		$fields[] = $field.' '.$order;
	}

    if (!empty($fields)) {
      $order_clause = ' ORDER BY ' . implode(', ', $fields);
    }
  }

  return $order_clause;
}

function do_select($columns = NULL, $aggregations = array(), $available_fields = array(), $select_clause = '')
{
	global $db;	
  if ($columns !== NULL) {
    $fields = array();
    foreach($available_fields as $field => $col) {
      if (in_array($field, $columns)) {
        $fields[$field] = $col . ' as ' . $field;
      }
    }
	
    // We want to aggregate fields?!

    if (isset($aggregations)) {
      foreach($aggregations as $field => $func) {
        if ($field === '*') {
          $fields[$field] = $func . '(*) as count';
        }
        else {
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

function do_limit($offset=NULL,$limit=NULL) {
	if($offset === NULL && $limit === NULL) {
		return NULL; // Nothing to do, get all rows
	}
	
	if($offset === NULL && $limit !== NULL) {
		return ' LIMIT 0,'.$limit	;
	}
	
	if($offset !== 0 && $limit == NULL) {
		// Get all rows from an offset... http://dev.mysql.com/doc/refman/5.7/en/select.html#id4651990
		$get_all_rows_limit = '18446744073709551615';
		return ' LIMIT '.$offset.','.$get_all_rows_limit;
	}
	
	return ' LIMIT '.$offset.','.$limit;
	
}

function create_query($q_tables, $available_fields, $select_clause) {
	$where_clause = do_where($_GET,$available_fields);
$group_clause = do_group_by($_GET['group_by'],$available_fields);
$order_clause = do_order_by($_GET['order_by'],$available_fields);
$select_clause = do_select($_GET['columns'],$_GET['aggr'],$available_fields,$select_clause);
$limit_clause = do_limit($_GET['range']['offset'],$_GET['range']['limit']);

$q_str = 'SELECT '.$select_clause.'
'.$q_tables;

(empty($where_clause)) ?: $q_str.= $where_clause;
(empty($group_clause)) ?: $q_str.= $group_clause;
(empty($order_clause)) ?: $q_str.= $order_clause;
(empty($limit_clause)) ?: $q_str.= $limit_clause;

	if(isset($_GET['debug'])) {
	echo $q_str;
	}

return $q_str;
}