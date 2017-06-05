<?php

class Connection {

	public static function make($config) {
		try {
			return new PDO(
				$config['ddsn'] . ';dbname=' . $config['name'],
				$config['username'],
				$config['password'],
				$config['flags']
			);
		}
		catch(PDOException $e) {
			die($e->getMessage());
		}
	}


}