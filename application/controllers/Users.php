<?php
	class Users extends CI_Controller{
		// registro de usuario
		public function register(){
			$data['title'] = 'Registro';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				// Encriptar password
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				// mensaje
				$this->session->set_flashdata('user_registered', 'Ahora ya estas registrado');

				redirect('posts');
			}
		}

		// Log in user
		public function login(){
			$data['title'] = 'Registro';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {
				
				// guardamos el usuario
				$username = $this->input->post('username');
				// Get and encrypt the password
				$password = md5($this->input->post('password'));

				// registramos usuario
				$user_id = $this->user_model->login($username, $password);

				if($user_id){
					// Creamos la sesion
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					// mensaje
					$this->session->set_flashdata('user_loggedin', 'Estas registrado');

					redirect('posts');
				} else {
					// mensaje
					$this->session->set_flashdata('login_failed', 'Usuario no valido');

					redirect('users/login');
				}		
			}
		}

		// desconexion usuario
		public function logout(){
			// desconectar al usuario
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			// mensaje
			$this->session->set_flashdata('user_loggedout', 'Estas desconectado');

			redirect('users/login');
		}

		// comprobar si existe el usuario
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'El usuario ya existe. Elije otro usuario');
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

		// comprobar si existe el email
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'El email ya existe. Elije otro email');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
	}