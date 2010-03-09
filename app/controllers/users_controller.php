<?php

class UsersController extends AppController {

	var $name = 'Users';
	
	/**
	 * Users authentication page
	 *
	 * @return void
	 */
	function login()
	{
		$this->layout = "login";
		
		if ( isset($this->data) )
		{
			if (($this->data["User"]["username"] == "admin" && $this->data["User"]["password"] == "admin") || 
				($this->data["User"]["username"] == "user" && $this->data["User"]["password"] == "user")) 
			{
				$this->Session->write('username', $this->data["User"]["username"]);
				$this->redirect("/locations", null, true);
			}
			else {
				$this->set("error_login", true);
			}
		}
	}
	
	function logout()
	{
		$this->Session->destroy();
		$this->redirect("/users/login", null, true);
	}
}

?>