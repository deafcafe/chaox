<?php
/*
* This file will contain all the configurations needed to bootstrap the Application.
* This file will return an Associative array containing configurations.
*/
return [
	'database' => [
		'ddsn' => 'mysql:host=127.0.0.1',
		'name' => 'achsys',
		'username' => 'root',
		'password' => '',
		'flags' => [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		]
	]
];
