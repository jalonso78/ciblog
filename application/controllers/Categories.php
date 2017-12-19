<?php
	class Categories extends CI_Controller{
		public function index(){
			$data['title'] = 'Categorias';
			
			$data['categories'] = $this->category_model->get_categories();
			$header=$this->load->view('templates/header','',TRUE);
			$this->load->view('categories/index', $data);
			$footer=$this->load->view('templates/footer','',TRUE);
		}

		public function create(){
			// comprobar login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
			
			$data['title'] = 'Crear Categoria';

			$this->form_validation->set_rules('name', 'Name', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('categories/create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->category_model->create_category();
				// mensage
				$this->session->set_flashdata('category_created', 'La categoria has sido creada');

				redirect('categories');
			}
		}

		public function posts($id){
			$data['title'] = $this->category_model->get_category($id)->name;

			$data['posts'] = $this->post_model->get_posts_by_category($id);

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function delete($id){
			// comprobar login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->category_model->delete_category($id);
			$this->category_model->delete_category_post($id);

			// Set message
			$this->session->set_flashdata('category_deleted', 'La categoria has sido borrada');

			redirect('categories');
		}
	}