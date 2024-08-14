<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('Dropdown_model');
        $this->load->model("Backend/Userdata_model");
        $this->load->library(array('form_validation', 'upload', 'session'));
    }

    // STARTS - HANDLE EXISTING USER PROFILE DATA
    public function index() {
        // Check if user data in session is exist or not
        if ($this->session->userdata('authenticated')) {
            // if session exist
            $data['profile'] = $this->session->userdata('auth_user');
            $data['countries'] = $this->Dropdown_model->fetch_countries();

            // Fetch user profile data
            $user_profile_data = $this->Userdata_model->getUserProfileDataByEmail($this->session->userdata('auth_user')['email_id']);
            
            // Check if user profile data is available in the database
            if (!empty($user_profile_data)) {
                $data = array_merge($data, ['user_profile_data' => $user_profile_data]);
            } else {
                // If no profile data, initialize empty user profile array
                $data['user_profile_data'] = [
                    'first_name' => '',
                    'last_name' => '',
                    'phone_number' => '',
                    'country' => '',
                    'state' => '',
                    'district' => '',
                    'pin_code' => '',
                    'profile_image' => ''
                ];
            }

            // Fetch states and districts based on the user's selected country and state to show the prefilled data if it's exist.
            $data['states'] = [];
            $data['districts'] = [];
            if (isset($user_profile_data['country'])) {
                $data['states'] = $this->Dropdown_model->fetch_states($user_profile_data['country']);
            }
            if (isset($user_profile_data['state'])) {
                $data['districts'] = $this->Dropdown_model->fetch_districts($user_profile_data['state']);
            }

            // Set page title
            $page_data['page_title'] = 'User Profile';

            // Pass user profile data to the view
            $this->load->view('header', $page_data);
            $this->load->view('profile_form', $data);
            $this->load->view('footer');
        } else {
            // if session not exist
            redirect(base_url('Auth/Login/loginUser')); // redirect to the login page
        }
    }
    // ENDS - HANDLE EXISTING USER PROFILE DATA

    // STARTS - HANDLE USER PROFILE
    public function user_profile() {
        // Form validations
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('pin_code', 'Pin Code', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // If validation failed
            $this->index();
        } else {
            $uploaded_image = $this->session->userdata('uploaded_image');
            $user_email = $this->session->userdata('auth_user')['email_id'];
    
            // Fetch existing profile data
            $profile = $this->Userdata_model->getUserProfileDataByEmail($user_email);
            $profile_image = (!empty($uploaded_image)) ? $uploaded_image : (isset($profile['profile_image']) ? $profile['profile_image'] : '');
    
            // Store the input data in an array format
            $userdata = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone_number' => $this->input->post('phone_number'),
                'email_id' => $user_email,
                'country' => $this->input->post('country'),
                'state' => $this->input->post('state'),
                'district' => $this->input->post('district'),
                'pin_code' => $this->input->post('pin_code'),
                'profile_image' => $profile_image, // Use the uploaded image or existing one
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            );
    
            // Handle User Profile Update
            if (!empty($profile)) {
                // Update existing profile
                $this->Userdata_model->update_user_profile($user_email, $userdata); // Passing data for the update
            } else {
                // Insert new profile
                $this->Userdata_model->send($userdata);
            }
    
            // Store the uploaded image in the session
            $this->session->set_userdata('profile_image', $profile_image);
            $this->session->set_userdata('profile_data', $userdata);
    
            redirect('Profile/index'); // Redirects to the profile page
        }
    }
    // ENDS - HANDLE USER PROFILE

    // STARTS - HANDLE STATE NAMES FETCHING FROM DATABASE AS PER SELECTED COUNTRY ID
    public function fetch_states() {
        if ($this->input->post('country_id')) {
            $country_id = $this->input->post('country_id');
            $states = $this->Dropdown_model->fetch_states($country_id);
            
            header('Content-Type: application/json'); // setting header to specify JSON format data is sent to the client
            echo json_encode($states); // converts data into json
        } else {
            echo json_encode([]);
        }
    }
    // ENDS - HANDLE STATE NAMES FETCHING FROM DATABASE AS PER SELECTED COUNTRY ID
    
    // STARTS - HANDLE DISTRICT NAMES FETCHING FROM DATABASE AS PER SELECTED STATE ID
    public function fetch_districts() {
        if ($this->input->post('state_id')) {
            $state_id = $this->input->post('state_id');
            $districts = $this->Dropdown_model->fetch_districts($state_id);
    
            header('Content-Type: application/json');
            echo json_encode($districts);
        } else {
            echo json_encode([]);
        }
    }
    // ENDS - HANDLE DISTRICT NAMES FETCHING FROM DATABASE AS PER SELECTED STATE ID

    // HANDLE IMAGE UPLOAD
    public function upload() {
        // Config file
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048; // 2MB
        $config['max_width'] = 1024; // 1024 pixels
        $config['max_height'] = 768; // 768 pixels

        // initializing upload library with the above defined configuration setting 
        $this->upload->initialize($config);

        // Handle file upload
        if ($this->upload->do_upload('profile_image')) {
            // File upload successfully
            $data = $this->upload->data(); // retrieves detailed information about the uploaded file
            $file_name = $data['file_name']; // Extracts the name of the uploaded file from the $data array.

            // Store the image temporarily in session
            $this->session->set_userdata('uploaded_image', $file_name);

            // Convert data into JSON format and sends data to the client side (browser)
            echo json_encode(array('file_name' => $data['file_name']));
        } else {
            // File upload failed
            $error = $this->upload->display_errors(); // Store errors
            echo json_encode(array('error' => $error));
        }
    }

    // STARTS - HANDLE PROFILE IMAGE REMOVE BUTTON
    public function remove_image() {
    // Load model
    $this->load->model('Profile_model');

    // Get the user's current profile image
    $user_id = $this->session->userdata('profile_data')['id'];

    $user_profile = $this->Profile_model->get_user_profile($user_id);

    if (!empty($user_profile['profile_image'])) {
        $image_path = './uploads/' . $user_profile['profile_image'];

        if (file_exists($image_path)) {
            unlink($image_path); // Delete the file from the server

            // Update the database to clear the image path
            $this->Profile_model->update_profile_image($user_id, null);

            header('Content-Type: application/json');

            // Send response in json
            echo json_encode(['success' => true, 'message' => 'Image removed successfully']); // converts into json
        } else {
            echo json_encode(['error' => 'Image file does not exist on the server.']); // converts into json
        }
    } else {
        echo json_encode(['error' => 'No profile image found.']);
    }
}
    // ENDS - HANDLE PROFILE IMAGE REMOVE BUTTON

}
