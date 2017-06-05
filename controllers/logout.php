<?php

$session = new Session();
$uid = $session->get('user_id');
$gid = $session->get('group_id');
$status = 0;
if(App::get('database')->update('user_group')->set('status', '=', $status)->where('uid', '=', $uid)->andWhere('gid', '=', $gid)->run())
{
	$session->killAll();
	header('Location: http://localhost/chatox/');
}