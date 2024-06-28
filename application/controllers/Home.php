<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
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
		$this->load->view('home');
	}



}