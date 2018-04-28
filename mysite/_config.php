<?php

//Heroku ClearDB support
if(isset($_ENV['CLEARDB_DATABASE_URL'])) {
	global $databaseConfig;
	$parts = parse_url($_ENV['CLEARDB_DATABASE_URL']);
	$databaseConfig['type'] = 'MySQLDatabase';
	$databaseConfig['server'] = $parts['host'];
	$databaseConfig['username'] = $parts['user'];
	$databaseConfig['password'] = $parts['pass'];
	$databaseConfig['database'] = trim($parts['path'], '/');
	Security::setDefaultAdmin('admin', 'password');
} else {
	//Default SilverStripe environement support
	require_once('conf/ConfigureFromEnv.php');
}
 