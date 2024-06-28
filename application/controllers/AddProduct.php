<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddProduct extends CI_Controller {

	
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
		$this->load->view('addProduct');
	}



    public function addProduct() {
        // Configuration for file upload
        $config['upload_path'] = FCPATH . 'application/assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB max
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        // Check if file upload is successful
        if ($this->upload->do_upload('product_image')) {
            // File uploaded successfully, retrieve file data
            $upload_data = $this->upload->data();
            $products['product_image'] = $upload_data['file_name']; // Save file name to database
        } else {
            // File upload failed, show error
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('addProduct'); // Redirect back to form with error message
            return;
        }

        // Get other form data
        $products['product_name'] = $this->input->post('product_name');
        $products['product_price'] = $this->input->post('product_price');
        $products['product_description'] = $this->input->post('product_description');

        // Save product data to database
        $response = $this->first_model->saveProduct($products);

        if ($response) {
            // Product saved successfully
            $this->session->set_flashdata('success', 'Product added successfully');
            redirect('products'); // Redirect to products list or dashboard
            
        } else {
            // Failed to save product
            $this->session->set_flashdata('error', 'Failed to add product');
            redirect('addProduct'); // Redirect back to form with error message
        }
    }



}
    





	
