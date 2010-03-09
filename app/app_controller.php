<?php

class AppController extends Controller
{
	function beforeFilter()
	{
		$matches = preg_match("/(api\/).*/", $_SERVER['REQUEST_URI']);

		if (!$this->Session->read('username') && $_SERVER['REQUEST_URI'] != "/users/login" 
		&& $_SERVER['REQUEST_URI'] != "/" && $matches == 0) {
			$this->redirect("/users/login", null, true);
		}
		
		$this->set("username", $this->Session->read('username'));
	}
}

?>