<?php

/*
 * (c) 2014 por Marcello Fontolan
 */

$projectPath = __DIR__ . '/';
$projectInc = array('control', 'control/dao', 'control/rb', 'model');

foreach ($projectInc as $vProjectInc) {
	set_include_path($projectPath . $vProjectInc . '/' . PATH_SEPARATOR . get_include_path());
}

function appAutoLoad($className) {
	global $projectPath, $projectInc;
	
	foreach ($projectInc as $vProjectInc) {
		if (file_exists($projectPath . $vProjectInc . '/' . $className . '.class.php')) {
			require_once $className . '.class.php';
		}
	}
}

spl_autoload_register('appAutoLoad');

function procResponse($result) {
	die(json_encode($result));
}

?>