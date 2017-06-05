<?php

$session = new Session();

if($session->exist('group_id') && $session->exist('user_id'))
{
	require 'group_info.php';
	require 'views/chat.view.php';
}

else
{
	@$key = $session->get('key');
	require 'views/index.view.php';
}



