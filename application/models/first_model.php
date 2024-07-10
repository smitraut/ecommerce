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
            return array(
                'status' => 'error',
                'message' => 'Duplicate entry, please login'
            );
        } else {
            // Insert into users table
            $user_insert = $this->db->insert('users', $users);
            
            // Insert into login table
            $login_insert = $this->db->insert('login', $login);
            
            if ($user_insert && $login_insert) {
                return array(
                    'status' => 'success',
                    'message' => 'User registered successfully'
                );
            } else {
                return array(
                    'status' => 'error',
                    'message' => 'Failed to register user'
                );
            }
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

    //detete user from db
    function deleteData($id) {
        $this->db->where("id", $id);
        $this->db->delete("users");
        return true;
    }

    //fetch user data from db
    public function getUserById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false; // Return false if user not found
        }
    }
      

    //update user data
    function updateUser($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }




}
