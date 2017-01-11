<?php

$dsn = 'mysql:dbname=pse;host=127.0.0.1;charset=UTF8';
$db = new PDO($dsn,'root');

$filter = array();
$group_by = array();

function column_exists($cols) {
	global $db;
	$tcols = $db->prepare('select COLUMN_NAME
from INFORMATION_SCHEMA.COLUMNS
where TABLE_NAME=elec_retail');

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
$select_clause = 'p.month,p.quarter,p.year, se.name as sector, amount,st.name as state,unit';

$available_fields = array('year' => 'p.year','month'=>'p.month','quarter'=>'p.quarter','fuel'=>'f.name','sector'=>'se.name','state'=>'st.name');


$q_tables = '
FROM elec_retail t
LEFT JOIN period p ON (p.id = t.period)
LEFT JOIN gen_cons_sector se ON (se.id = t.sector)
LEFT JOIN state st ON (st.id = t.state)';

require_once('get_processor.php');
$q_str = create_query($q_tables, $available_fields,$select_clause);

$query = $db->prepare($q_str);
$query->execute(array('fuel'));

$result = $query->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(array_values($result));