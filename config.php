<?php
require 'environment.php';
error_reporting(-1);
global $config;
$config = array();
if(ENVIRONMENT == 'development') {
	$config['dbname'] = 'control_a';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	$config['dbname'] = '';
	$config['host'] = '';
	$config['dbuser'] = '';
	$config['dbpass'] = '';
}
?>