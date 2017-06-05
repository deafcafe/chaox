<?php

require 'functions.php';

$user_name = htmlspecialchars($_POST['yname']);
$key = $_POST['g_key'];

$row = App::get('database')->select('groups')
		->values('*')
		->where('group_key', '=', $key)->get();

$group_id = $row['group_id'];

if(!$row) header('Location: http://localhost/chatox/');

else
{
	$options = ['cost' => 11];
	$user_key = generate_hash($key, $options);
	$parameters = [
		'user_name' => $user_name,
		'user_key' => $user_key
	];

	if(App::get('database')->insert('users', $parameters))
	{
		$row_user = App::get('database')->select('users')->values('user_id')->where('user_key', '=', $user_key)->get();

		if(!$row_user) die('Error: User_key doesnt exists!');

		else
		{
			$group_id = $row['group_id'];
			$user_id = $row_user['user_id'];
			$status = 1;
			$parameters = [
				'uid' => $user_id,
				'gid' => $group_id,
				'status' => $status
			];
			if(App::get('database')->insert('user_group', $parameters)) {
				$session = new Session();

				if($session->set('group_id', $group_id) && $session->set('user_id', $user_id))

				header('Location: http://localhost/chatox/');

				else die('error');

			}
		}
	}

	else die('Something went wrong!');
}