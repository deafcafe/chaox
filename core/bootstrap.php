<?php

// require 'Router.php';
// require 'Request.php';
// require 'Session.php';
// require 'database/Connection.php';
// require 'database/QueryBuilder.php';
// require 'App.php';

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
	Connection::make(App::get('config')['database'])
));