<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// LOADS THE MODEL
	public function __construct() {
        parent::__construct();
        $this->load->model('first_model'); 
    }
	
	// LOADS THE VIEW
	public function index()
	{
		$this->load->view('dashboard');
	}

}