<?php
/* Functions */
function frl_get_tasks(){

	$path = dirname(__FILE__).'/data/tasks.csv';
	$csv = array();
	$file = file($path);
	foreach ($file as $l) {
		if($l == 0)
			continue;

	    $csv[] = str_getcsv($l);
	}

	return $csv;
}

function frl_get_log(){

	$path = dirname(__FILE__).'/data/log-out.csv';
	$csv = array();
	$file = file($path);
	foreach ($file as $l) {
		if($l == 0)
			continue;

	    $csv[] = str_getcsv($l);
	}

	return $csv;
}

function frl_get_actions($tasks, $log) {
	$actions = array();

	return $actions;
}

function frl_count_metrics($tasks, $log){

	$metricks = array('open' => 0, 'offers' => 0, 'response' => 0, 'wait' => 0);

	foreach ($log as $l) {
		if($l[2] == 'Отклик на задачу'){
			$metricks['response']++;
		}
	}

	foreach ($tasks as $t) {
		
		if($t[4] == 'Ждет уточнения'){
			$metricks['wait']++;
		}

		if($t[4] != 'Подтверждено'){
			$metricks['open']++;
		}
	}

	$metricks['offers'] = ($metricks['open']-2)*3;

	return $metricks;
}







