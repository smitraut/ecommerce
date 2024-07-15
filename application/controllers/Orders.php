<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	
	public function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('first_model');
        $this->load->library(array('form_validation', 'upload'));
        $this->load->helper(array('url', 'form'));
	}
    
	
	// LOADS THE VIEW
	public function index()
	{
		$this->load->view('orders');
	}




}
    





	
