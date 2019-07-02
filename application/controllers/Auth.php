<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function login()
	{
		$data = array(
            'title' => 'Login'
        );
		$this->slice->view('pages.auth.login', $data);
	}

	public function do_login()
	{
		// Redirect
	}
}
