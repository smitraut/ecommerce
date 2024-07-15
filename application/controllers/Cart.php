<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	
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
		$this->load->view('cart');
	}


	//display cart
    public function displayCart() {
		try {
			$data['cart'] = $this->first_model->getCart();
			if (empty($data['cart'])) {
				$data['error'] = 'No products found.';
			}
			
			// Make sure each item in the cart has a 'product_image' key
			foreach ($data['cart'] as &$item) {
				if (!isset($item['product_image'])) {
					$item['product_image'] = 'default.jpg'; // Use a default image if none is set
				}
			}
			
			$data['image_url'] = base_url('application/assets/images/');
			
			$this->load->view('cart', $data);
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}

	//delete cart items
	public function deleteCartItem($itemId) {
		// Load cart model
		$this->load->model('first_model');
	
		// Call model function to delete the item
		$result = $this->first_model->deleteItem($itemId);
	
		if ($result) {
			$this->session->set_flashdata('success', 'Item deleted successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete the item.');
		}
	
		// Redirect back to the cart page
		redirect('Cart');
	}

	//cart quantity change
	public function updateQuantity($itemId, $newQuantity) {
		$this->load->model('first_model');
	
		$itemId = intval($itemId);
		$newQuantity = intval($newQuantity);
	
		if ($itemId <= 0 || $newQuantity < 0) {
			echo json_encode(['success' => false, 'message' => 'Invalid input']);
			return;
		}
	
		$success = $this->first_model->updateQuantity($itemId, $newQuantity);
	
		if ($success) {
			$updatedItem = $this->first_model->getCartItem($itemId);
	
			if ($updatedItem) {
				$price = floatval($updatedItem['price']);
				$subtotal = $price * $newQuantity;
	
				echo json_encode([
					'success' => true,
					'message' => 'Quantity updated successfully',
					'newQuantity' => $newQuantity,
					'price' => $price,
					'subtotal' => number_format($subtotal, 2)
				]);
			} else {
				echo json_encode(['success' => false, 'message' => 'Failed to retrieve updated item']);
			}
		} else {
			echo json_encode(['success' => false, 'message' => 'Failed to update quantity']);
		}
	}	



	
}