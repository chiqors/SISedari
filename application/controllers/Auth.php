<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		if ($this->session->jabatan == 'CEO') {
			redirect('ceo/beranda');
		} else if ($this->session->jabatan == 'Manager') {
			redirect('manager/beranda');
		} else if ($this->session->jabatan == 'Kasir') {
			redirect('kasir/beranda');
		}
		$data = array(
            'title' => 'Login'
        );
		$this->slice->view('entities.auth.pages.login', $data);
	}

	public function do_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$login = $this->pengguna_model->do_login();
		if ($login > 0) {
			$data_session = array(
				'nip' => $login->nip,
				'username' => $login->username,
				'jabatan' => $login->jabatan
			);
			$this->session->set_userdata($data_session);
			if ($this->session->jabatan == 'CEO') {
				redirect('ceo/beranda');
			} else if ($this->session->jabatan == 'Manager') {
				redirect('manager/beranda');
			} else if ($this->session->jabatan == 'Kasir') {
				redirect('kasir/beranda');
			}
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('auth/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}
