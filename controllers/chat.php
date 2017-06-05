<?php
require 'functions.php';
if(isset($_POST['pv']) && !empty($_POST['pv']))
{
	$chat_text = htmlspecialchars($_POST['pv']);
	$session = new Session();
	$group_id = $session->get('group_id');
	$user_id = $session->get('user_id');

		App::get('database')->insert('group_user_chats', [
		'group_id' => $group_id,
		'user_id' => $user_id,
		'chat_text' => $chat_text
		]);
}