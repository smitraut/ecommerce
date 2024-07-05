<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// LOADS THE MODEL
	public function __construct() {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		
		//loads the model
        $this->load->model('first_model'); 

    }
	
	// LOADS THE VIEW
	public function index()
	{
		$this->load->view('dashboard');
	}


   
    public function displayUsers() {
        try {
            $data['users'] = $this->first_model->getUsers();
            if (empty($data['users'])) {
                $data['error'] = 'No users found.';
            }
            
            $this->load->view('dashboard', $data);
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'An error occurred: ' . $e->getMessage());
            redirect('dashboard');
        }
    }

    public function displayUsersApp() {
        try {
            $users = $this->first_model->getUsers();
            
            if (empty($users)) {
                $response = array(
                    'status' => 'error',
                    'message' => 'No users found.',
                    'data' => array()
                );
            } else {
                $response = array(
                    'status' => 'success',
                    'message' => 'Users retrieved successfully.',
                    'data' => $users
                );
            }
        } catch (Exception $e) {
            $response = array(
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage(),
                'data' => array()
            );
        }
    
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }


}
