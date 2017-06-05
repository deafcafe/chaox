<?php

$session = new Session();
$gid = $session->get('group_id');
$data = App::get('database')->select('user_group')
	->values('users.user_name')
	->join('users', 'ON', 'user_group.uid', '=', 'users.user_id')
	->where('user_group.gid', '=', $gid)
	->getAll();
	
echo  json_encode($data);