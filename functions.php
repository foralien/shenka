<?php /* Functions for demo*/

/* Update */
function frl_perform_update(){

	$task_for_out = frl_get_tasks();
	$log_for_out = frl_get_log();
	$log_queue = frl_get_log_queue();

	$step = count($log_for_out);
	if($step > $log_queue){
		frl_perform_reset();
		return;
	}

	//add action into log
	$new_line = $log_queue[$step]; 
	array_unshift($log_for_out, $new_line);

	$file = dirname(__FILE__).'/data/log-out.csv'; 
    $csv_handler = fopen($file,'w');
    foreach ($log_for_out as $l) {
    	fputcsv($csv_handler, $l, ",");
    }
    fclose($csv_handler);

    //change status of task
    if($new_line[2] == 'Запрос уточнения'){
    	//change status to Ждет уточнения
    	$task_for_out = frl_change_task_status($task_for_out, $new_line[4], 'Ждет уточнения');
    }

    if($new_line[2] == 'Отклик на задачу'){
    	//change status to Подтверждено
    	$task_for_out = frl_change_task_status($task_for_out, $new_line[4], 'Подтверждено');
    }

    $file = dirname(__FILE__).'/data/tasks-out.csv';
    $csv_handler = fopen($file,'w');
    foreach ($task_for_out as $t) {
    	fputcsv($csv_handler, $t, ",");
    }
    fclose($csv_handler);

}

function frl_perform_reset(){

	$path = dirname(__FILE__).'/data/'; 
	copy($path.'log-init.csv', $path.'log-out.csv');
	copy($path.'tasks.csv', $path.'tasks-out.csv');
}

function frl_change_task_status($task_for_out, $task_id, $status){
var_dump($task_id);
	foreach ($task_for_out as $i => $t) {
		if((int)$t[0] === (int)$task_id){
			$task_for_out[$i][4] = $status;
			break;
		}
	}

	return $task_for_out;
}



/* Display */
function frl_get_tasks(){

	$path = dirname(__FILE__).'/data/tasks-out.csv';
	$csv = array();
	$file = file($path);
	foreach ($file as $l) {

	    $csv[] = str_getcsv($l);
	}

	return $csv;
}

function frl_get_log(){

	$path = dirname(__FILE__).'/data/log-out.csv';
	$csv = array();
	$file = file($path);
	foreach ($file as $l) {

	    $csv[] = str_getcsv($l);
	}

	return $csv;
}

function frl_get_log_queue(){

	$path = dirname(__FILE__).'/data/log.csv';
	$csv = array();
	$file = file($path);
	foreach ($file as $l) {

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
