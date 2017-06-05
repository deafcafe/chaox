<?php

class Router {

	protected $routes = [
		'GET' => [],
		'POST' => []
	]; 

	public static function load($file) {

		$router = new static;
		require $file;
		return $router;
	}

	public function get($uri, $end_point) {
		$this->routes['GET'][$uri] = $end_point;
	}

	public function post($uri, $end_point) {
		$this->routes['POST'][$uri] = $end_point;
	}

	public function direct($uri, $request_type) {
		if(array_key_exists($uri, $this->routes[$request_type])) {
			return $this->routes[$request_type][$uri];
		}
		else die('404');
	}
}