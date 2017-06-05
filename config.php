<?php

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