<?php

class Session
{
	
	public function __construct()
	{
		session_start();
	}

	public function set($sid, $value)
	{
		$_SESSION[$sid] = $value;
		return true;
	}

	public function get($sid)
	{
		return $_SESSION[$sid];
	}

	public function exist($sid)
	{
		if(isset($_SESSION[$sid]) && !empty($_SESSION[$sid]))
			return true;
		return false;
	}

	public function kill($sid)
	{
		$_SESSION[$sid] = '';
		unset($_SESSION[$sid]);
	}

	public function killAll()
	{
		$_SESSION = array();
		session_destroy();
	}
	
}
