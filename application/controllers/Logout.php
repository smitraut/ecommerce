<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Load necessary libraries and models
        $this->load->model('first_model'); // Replace with your actual model name

        // Load session library
        $this->load->library('session');

        // Load other necessary libraries or helpers
        $this->load->helper('url');
    }

  

    public function logout() {
        // Unset logged_in session variable
        $this->session->unset_userdata('logged_in');
        
        // Redirect to home page or any other page after logout
        redirect(base_url('home'));
    }

}
