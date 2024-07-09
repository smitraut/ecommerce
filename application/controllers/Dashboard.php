<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	// LOADS THE MODEL
	public function __construct() {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		
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

    public function displayUsersApp() {
        try {
            $users = $this->first_model->getUsers();
            
            if (empty($users)) {
                $response = array(
                    'status' => 'error',
                    'message' => 'No users found.',
                    'data' => array()
                );
            } else {
                $response = array(
                    'status' => 'success',
                    'message' => 'Users retrieved successfully.',
                    'data' => $users
                );
            }
        } catch (Exception $e) {
            $response = array(
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage(),
                'data' => array()
            );
        }
    
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function deleteUser($id) {
        $response=$this->first_model->deleteData($id);
        if($response==true){
            echo "User deleted successfully !";
            redirect('dashboard');
        }
        else{
            echo "Error !";
        }
    }

      // Method to fetch user data and load the edit view
      public function getUser($id) {
        try {
            $user = $this->first_model->getUserById($id);
            if ($user) {
                echo json_encode($user);
            } else {
                // Handle case when user is not found
                echo json_encode(['error' => 'User not found']);
            }
        } catch (Exception $e) {
            // Log the exception and return an error message
            log_message('error', $e->getMessage());
            echo json_encode(['error' => 'An error occurred']);
        }
    }
    

    // Method to update user data
    public function updateUser() {
        $id = $this->input->post('id');
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'phone_number' => $this->input->post('phone_number'),
            'password' => $this->input->post('password')
        );

        // Update the user data
        $this->first_model->updateUser($id, $data);

        // Redirect to a success page or back to the list
        redirect('dashboard');
    }



}
