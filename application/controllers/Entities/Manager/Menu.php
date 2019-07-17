<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	
	public function index()
	{
		$data_get = $this->menu_model->get_list();
		$data = array(
			'info' => $data_get,
			'activeMenu' => 'menu',
            'title' => 'Menu'
        );
		$this->slice->view('entities.manager.pages.menu.index', $data);
	}

	public function create() {
		$data = array(
            'title' => 'Create Menu'
        );
		$this->slice->view('entities.manager.pages.menu.form', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
		$this->form_validation->set_rules('stok', 'Stok', 'required|numeric');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('manager/menu/create');
		} else {
			$this->menu_model->store();
			$this->session->set_flashdata('success', 'Menu baru telah ditambahkan');
			redirect('manager/menu');
		}
	}

	public function show($id) {
		$data_get = $this->menu_model->get_data($id);
		$data = array(
			'info' => $data_get,
            'title' => 'Show Menu'
        );
		$this->slice->view('entities.manager.pages.menu.show', $data);
	}

	public function edit($id) {
		$data_get = $this->menu_model->get_data($id);
		$data = array(
			'info' => $data_get,
            'title' => 'Edit Menu'
        );
		$this->slice->view('entities.manager.pages.menu.form', $data);
	}

	public function update($id)
	{
		$this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
		$this->form_validation->set_rules('stok', 'Stok', 'required|numeric');

		if($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('manager/menu/edit/'.$id);
		} else {
			$this->menu_model->update($id);
			$this->session->set_flashdata('success', 'Menu '.$id.' telah diperbaharui');
			redirect('manager/menu');
		}
	}

	public function destroy($id)
	{
		$this->menu_model->destroy($id);
		$this->session->set_flashdata('success', 'Menu '.$id.' telah dihapus');
		redirect('manager/kupon');
	}

	/*
	public function index($offset = 0){	
		// Pagination Config	
		$config['base_url'] = base_url() . 'posts/index/';
		$config['total_rows'] = $this->db->count_all('posts');
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;
		$config['attributes'] = array('class' => 'pagination-link');

		// Init Pagination
		$this->pagination->initialize($config);

		$data['title'] = 'Latest Posts';

		$data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);

		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}

	public function create(){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['title'] = 'Create Post';

		$data['categories'] = $this->post_model->get_categories();

		$this->load->view('templates/header');
		$this->load->view('posts/create', $data);
		$this->load->view('templates/footer');
	}

	public function store(){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['title'] = 'Create Post';

		$data['categories'] = $this->post_model->get_categories();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');

		// Upload Image
		$config['upload_path'] = './assets/images/posts';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2048';
		$config['max_width'] = '2000';
		$config['max_height'] = '2000';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload()){
			$errors = array('error' => $this->upload->display_errors());
			$post_image = 'noimage.jpg';
		} else {
			$data = array('upload_data' => $this->upload->data());
			$post_image = $_FILES['userfile']['name'];
		}

		$this->post_model->create_post($post_image);

		// Set message
		$this->session->set_flashdata('post_created', 'Your post has been created');

		redirect('posts');
	}

	public function show($slug = NULL){
		$data['post'] = $this->post_model->get_posts($slug);
		$post_id = $data['post']['id'];
		$data['comments'] = $this->comment_model->get_comments($post_id);

		if(empty($data['post'])){
			show_404();
		}

		$data['title'] = $data['post']['title'];

		$this->load->view('templates/header');
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');
	}

	public function edit($slug){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['post'] = $this->post_model->get_posts($slug);

		// Check user
		if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']){
			redirect('posts');

		}

		$data['categories'] = $this->post_model->get_categories();

		if(empty($data['post'])){
			show_404();
		}

		$data['title'] = 'Edit Post';

		$this->load->view('templates/header');
		$this->load->view('posts/edit', $data);
		$this->load->view('templates/footer');
	}

	public function update(){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$this->post_model->update_post();

		// Set message
		$this->session->set_flashdata('post_updated', 'Your post has been updated');

		redirect('posts');
	}

	public function destroy($id){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$this->post_model->delete_post($id);

		// Set message
		$this->session->set_flashdata('post_deleted', 'Your post has been deleted');

		redirect('posts');
	}
	*/
}
