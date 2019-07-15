<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planning extends CI_Controller {
	
	public function index()
	{
		$data = array(
			'activeMenu' => 'entities',
			'activeSubMenu' => 'planning',
            'title' => 'Planning'
        );
		$this->slice->view('entities.manager.pages.planning.index', $data);
	}

	public function create() {
		$data = array(
            'title' => 'Create Planning'
        );
		$this->slice->view('entities.manager.pages.planning.form', $data);
	}

	public function show($id) {
		$data = array(
            'title' => 'Show Planning'
        );
		$this->slice->view('entities.manager.pages.planning.show', $data);
	}

	public function edit($id) {
		$data = array(
			'info' => 'edit',
            'title' => 'Edit Planning'
        );
		$this->slice->view('entities.manager.pages.planning.form', $data);
	}
}
