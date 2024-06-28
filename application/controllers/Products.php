<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	
	public function __construct() {
        parent::__construct();

		//loads the model
        $this->load->model('first_model'); 

		// Load session library
		$this->load->library('session');

		// Load other necessary libraries or helpers
		$this->load->helper('url');

		// Load database library
		$this->load->database();
    }
	
	// LOADS THE VIEW
	public function index()
	{
		$this->load->view('products');
	}


	//displays the products
    public function displayProducts() {
		try {
			$data['products'] = $this->first_model->getProducts();
			if (empty($data['products'])) {
				$data['error'] = 'No products found.';
			}
			
			// Add this line to set the image URL
			$data['image_url'] = base_url('application/assets/images/'); // Adjust path as per your directory structure
			
			$this->load->view('products', $data);
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}
	



	

}