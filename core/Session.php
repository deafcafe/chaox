<?php

// class Session {

// 	public function __construct() {
// 		session_start();
// 	}

// 	public function set_session($sid, $session_value) {
// 		$_SESSION[$sid] = $session_value;
// 		return true;
// 	}

// 	public function get_session($sid) {
// 		return $_SESSION[$sid];
// 	}

// 	public function isSessionExist($sid) {
// 		if(isset($_SESSION[$sid]) && !empty($_SESSION[$sid]))
// 			return true;
// 		return false;
// 	}

// 	public function sessionKill($sid) {
// 		$_SESSION[$sid] = '';
// 		unset($_SESSION[$sid]);
// 	}

// 	public function sessionKillAll() {
// 		$_SESSION = array();
// 		session_destroy();
// 	}

// }


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