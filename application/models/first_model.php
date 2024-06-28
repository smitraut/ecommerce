<?php
class first_model extends CI_Model {



    public function __construct() {
        parent::__construct();

		//database library is loaded
        $this->load->database(); 
    }



    // Check for duplicate email and phone_number
	function saveUsers($users, $login) {
		
    $this->db->where('email', $users['email']);
    $this->db->or_where('phone_number', $users['phone_number']);
    $query = $this->db->get('users');

    if ($query->num_rows() > 0) { 
         echo 'Duplicate entry, please login';
        return false;
    } else {
        // Insert into users table
        $this->db->insert('users', $users);
        // Insert into login table
        $this->db->insert('login', $login);
        return true;
    }
}


	// checks if user exist in database to login
    function checkUsers($login) {
		$this->db->select('*');
		$this->db->from('login');
		$this->db->where('email', $login['email']);
		$this->db->where('password', $login['password']);
		$query = $this->db->get();
		$result = $query->result();
		return $result;	
	}


	//save products in database
	public function saveProduct($products) {
        $this->db->insert('products', $products);
        return $this->db->affected_rows() > 0;
    }

	//retrive products from database 
	public function getProducts() {
        // Example: Retrieve products from 'products' table
        $query = $this->db->get('products');
        return $query->result_array(); // Return products as array
    }


	// GET ALL USERS FROM DATABASE
	function getUsers() {
		$query = $this->db->get('users');
		return $query->result_array();
	}
}
