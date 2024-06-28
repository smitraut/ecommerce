<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// LOADS THE MODEL
	public function __construct() {
        parent::__construct();
		
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
}
