<?php

if(isset($_POST['set']) && !empty($_POST['set']))
{
	$session = new Session();
	$session->set('chat_id', '-1');
}