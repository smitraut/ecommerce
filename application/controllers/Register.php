<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
		parent::__construct();
	
		// Load necessary libraries and helpers
		$this->load->model('first_model'); 
		$this->load->library('session');
		$this->load->helper('url');
	
		// Allow CORS for specific origin
		header('Access-Control-Allow-Origin: http://localhost:8100');
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
		header('Access-Control-Allow-Headers: Content-Type, Authorization');
		header('Access-Control-Allow-Credentials: true');
	
		// Respond to preflight requests
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
			header('HTTP/1.1 200 OK');
			exit();
		}
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

	// USER REGISTRATION IN DATABASE IN BOTH TABLES REGISTER AND LOGIN (APP)
	public function registerUsersApp() 
{
    $request_data = $this->json_data();
    
    $users = array(
        'first_name' => $request_data['first_name'],
        'last_name' => $request_data['last_name'],
        'phone_number' => $request_data['phone_number'],
        'email' => $request_data['email'],
        'password' => $request_data['password']
    );

    $login = array(
        'email' => $request_data['email'],
        'password' => $request_data['password']
    );

    log_message('debug', 'Request data: ' . json_encode($request_data));

    $response = $this->first_model->saveUsers($users, $login);

    log_message('debug', 'Response data: ' . json_encode($response));

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
}

	 // Utility function to parse JSON data from the request body
	 private function json_data() {
        header('Content-type: application/json');
        $json_request_data = file_get_contents("php://input");
        return json_decode($json_request_data, true);
	}

}
