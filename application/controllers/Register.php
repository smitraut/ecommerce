<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	
    public function __construct() {
        parent::__construct();
        
		//loads the model
        $this->load->model('first_model'); 

		// Load session library
		$this->load->library('session');

		// Load other necessary libraries or helpers
		$this->load->helper('url');
    }

	// LOADS THE VIEW
	public function index()
	{
		$this->load->view('register');
	}


	// USER REGISTRATION IN DATABASE IN BOTH TABLES REGISTER AND LOGIN (ERP)
	public function registerUsersErp()
	{	
		//insert into register table
		    $users['first_name']=$this->input->post('first_name');
			$users['last_name']=$this->input->post('last_name');
			$users['phone_number']=$this->input->post('phone_number');
			$users['email']=$this->input->post('email');
			$users['password']=$this->input->post('password');
			
		//insert into login table
			$login['email']=$this->input->post('email');
			$login['password']=$this->input->post('password');

			$response = $this->first_model->saveUsers($users, $login);

			if ($response == true) {
				$this->session->set_flashdata('success', 'User registered successfully');
        		redirect('login');
			} else {
				redirect('register');
			}
	}

	// // USER REGISTRATION IN DATABASE IN BOTH TABLES REGISTER AND LOGIN (APP)
	// public function registerUsersApp() 
	// {
	// 	//register
	// 	$request_data = $this->json_data();
	// 	$users['first_name'] = $request_data['first_name'];
	// 	$users['last_name'] = $request_data['last_name'];
	// 	$users['phone_number'] = $request_data['phone_number'];
	// 	$users['email'] = $request_data['email'];
	// 	$users['password'] = $request_data['password'];

	// 	//login
	// 	$login['email'] = $request_data['email'];
	// 	$login['password'] = $request_data['password'];

	// 	$response = $this->first_model->saveUsers($users, $login);

	// 	if ($response == true) {
	// 		$response = array(
	// 			'status' => 'success',
	// 			'message' => 'User registered successfully'
	// 		);
	// 	} else {
	// 		$response = array(
	// 			'status' => 'error',
	// 			'message' => 'User registration failed'
	// 		);
	// 	}
	// 	echo json_encode($response);
	// }
}
