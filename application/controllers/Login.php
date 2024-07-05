<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function __construct() {
        parent::__construct();
		//CORS middleware
		header('Access-Control-Allow-Origin: http://localhost:8100'); 
		header('Access-Control-Allow-Origin: http://192.168.0.27:8100');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        header('Access-Control-Allow-Credentials: true');

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
		$this->load->view('login');
	}



	public function checkLoginErp()
	{
		//checks if credentials match with that of database
		$login['email']=$this->input->post('email');
		$login['password']=$this->input->post('password');

		$response=$this->first_model->checkUsers($login);

		//if matches then dashboard else login again
		if ($response == true) {
			$this->session->set_userdata('logged_in', true);
			$this->session->set_flashdata('success', 'Login successfull');
        	redirect('dashboard');
		} else {
			echo 'invalid credentials';
			redirect('login');
		}
	}

	
	// CHECKS IF USER IS REGISTERED IN DATABASE (APP)
    public function checkLoginApp() {
        $json_data = $this->json_data();

        $login['email'] = $json_data['email'];
        $login['password'] = $json_data['password'];

        $result = $this->first_model->checkUsers($login);

        if ($result) {
            $response["response"] = "success";
            $response["data"] = $result;
        } else {
            $response["response"] = "error";
        }

        echo json_encode($response);
    }

    // Utility function to parse JSON data from the request body
    private function json_data() {
        header('Content-type: application/json');
        $json_request_data = file_get_contents("php://input");
        return json_decode($json_request_data, true);
	}
}