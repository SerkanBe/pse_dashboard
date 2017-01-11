<?php

$dsn = 'mysql:dbname=pse;host=127.0.0.1;charset=UTF8';
$db = new PDO($dsn,'root');

$filter = array();
$group_by = array();

function column_exists($cols) {
	global $db;
	$tcols = $db->prepare('select COLUMN_NAME
from INFORMATION_SCHEMA.COLUMNS
where TABLE_NAME=plant_gen');

	$tcols->execute();
	$tcols = $tcols->fetchAll(PDO::FETCH_COLUMN);
	if(count(array_diff($cols,$tcols)) > 0) {	
		return FALSE;
	}
	
	return TRUE;
}

$where_clause = '';
$group_clause = '';
$order_clause = '';
$select_clause = 'pl.name as plant ,pl.lat,pl.lon,plf.name as pl_fuel, plst.name as pl_state,plty.name as pl_type,p.month, p.quarter, p.year, f.name as fuel, amount,st.name as state,unit';

$available_fields = array('year' => 'p.year',
'month'=>'p.month',
'quarter'=>'p.quarter',
'fuel'=>'f.name',
'state'=>'st.name',
'plant_id' => 't.plant',
'plant_name' => 'pl.name',
'plant_fuel' => 'plf.name',
'plant_type' => 'plty.name'
);

$q_tables = '
FROM plant_gen t
LEFT JOIN plant pl ON (pl.id = t.plant)
LEFT JOIN fuel f ON (f.id = t.fuel)
LEFT JOIN period p ON (p.id = t.period)
LEFT JOIN state st ON (st.id = t.state)
LEFT JOIN plant_type plty ON (plty.id = pl.type)
LEFT JOIN state plst ON (plst.id = pl.state)
LEFT JOIN fuel plf ON (plf.id = pl.fuel)';

require_once('get_processor.php');
$q_str = create_query($q_tables, $available_fields,$select_clause);

$query = $db->prepare($q_str);
$query->execute(array('fuel'));

$result = $query->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(array_values($result));