<?php
defined("BASEPATH") or exit("No direct script access allowed");

class User_registered_data extends CI_Controller
{
  public function __construct() {
    parent::__construct();
    $this->load->model('User');
    $this->load->model('Backend/Userdata_model');
    $this->load->model('Dropdown_model');
  }

  // STARTS - GET REGISTERED AND LOGIN USER DATA TO DISPLAY ON DATATABLES
  public function index() {
    $data['users'] = $this->User->getAllRegisteredUsers(); //gets user data from database.
    
    $profiles = []; // An empty array to store user profiles

    // starts - loop on retrieved data to get the matching email id
    foreach ($data['users'] as $user) {
    $email_id = $user['email_id'];
    $profile_data = $this->Userdata_model->getUserProfileDataByEmail($email_id); // gets matching email id data from database.

    // Check if profile data exists for the given email
    if ($profile_data) {
      $profiles[$email_id] = $profile_data; // Stores the matching email id data
    }
  }
  // ends - loop on retrieved data to get the matching email id

  $data['profiles'] = $profiles;

  // Starts - Get the user selected dropdown data
  $data['countries'] = $this->Dropdown_model->fetch_user_selected_countries($profiles[$email_id]['country']);
  
  if (isset($data['countries'])) {
    $data['states'] = $this->Dropdown_model->fetch_user_selected_states($profiles[$email_id]['state']);
  }

  if (isset($profiles[$email_id]['state'])) {
    $data['districts'] = $this->Dropdown_model->fetch_user_selected_districts($profiles[$email_id]['district']);
  }
  // Ends - Get the user selected dropdown data

  $page_data['page_title'] = 'List of Registered Users';
  $this->load->view('admin/section/boilerplate_start', $page_data);
  $this->load->view('admin/section/header');
  $this->load->view('admin/section/sidebar');
  $this->load->view('admin/pages/registered_users', $data);
  $this->load->view('admin/section/footer');
  // $this->load->view('admin/section/boilerplate_end');
}
  // ENDS - GETS REGISTERED USER DATA TO DISPLAY ON DATATABLES

   // STARTS - ADD NEW USER FROM BACKEND
  public function add_user() {
  $this->form_validation->set_rules('user_name', 'Username', 'required');
  $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email');

  $page_data = []; // Initializing page data array.

    if ($this->form_validation->run() == FALSE) {
        echo validation_errors();

        $page_data['page_title'] = 'Add User';
        $this->load->view('admin/section/boilerplate_start', $page_data);
        $this->load->view('admin/section/header');
        $this->load->view('admin/section/sidebar');
        $this->load->view('admin/pages/add_users', $page_data);
        $this->load->view('admin/section/footer');
        $this->load->view('admin/section/boilerplate_end');

        $page_data['status_message'] = 'Failed to add a user!';
    } else {
        $userdata = [
            'user_name' => $this->input->post('user_name'),
            'email_id' => $this->input->post('email_id'),
            'created_at' => date("Y-m-d H:i:s")
            // 'updated_at' => date("Y-m-d H:i:s")
        ];

        if ($this->User->registerUser($userdata)) {
          $page_data['status_message'] = 'New User Added Successfully!';
          $page_data['page_title'] = 'Add User';
          $this->load->view('admin/section/boilerplate_start', $page_data);
          $this->load->view('admin/section/header');
          $this->load->view('admin/section/sidebar');
          $this->load->view('admin/pages/add_users', $page_data);
          $this->load->view('admin/section/footer');
          $this->load->view('admin/section/boilerplate_end');
        }
    }
  }
   // ENDS - ADD NEW USER FROM BACKEND

}