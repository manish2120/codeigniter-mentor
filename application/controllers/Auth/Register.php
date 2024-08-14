<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

  public function __construct() {
    parent::__construct();
    // Added this to check again
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->model('User');
  }

  // Load register form
  public function index() {
    $page_data['page_title'] = 'Login - Mentor'; // sets the page title
    $this->load->view('register-form', $page_data);
  }

  // Handle register form page
  public function register() {
    // Starts - Form Validations for register form
    $this->form_validation->set_rules('user_name', 'Username', 'trim|required|alpha');
    $this->form_validation->set_rules('email_id', 'Email Id', 'trim|required|valid_email[is_unique[register.email_id]');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
    // Ends - Form Validations for register form

    if($this->form_validation->run() == FALSE) {
      // If fails - load form again
      $this->index();
    } else {
      // If passed - store data in database
      $password = $this->input->post('password');
      $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // converts password into hash.
      $data = array(
      'user_name' => $this->input->post('user_name'),
      'email_id' => $this->input->post('email_id'),
      'password' => $hashedPassword, // store hashed password
      "created_at" => date("Y-m-d H:i:s")
      );

      //passing data to the model to get the matching email Id and password.
      $checkUser = $this->User->registerUser($data);
      
      // check if user is logged in or not
      if($checkUser) {
        // If passed - sets the success message in flashdata
        $this->session->set_flashdata('status', 'Registered Successfully!');
        $this->session->set_flashdata('alert_class', 'alert-success');
        redirect(base_url('Auth/Login/loginUser')); // redirects to the login form page
      } else {
        // If failed - sets the failed message flashdata
        $this->session->set_flashdata('status', 'Registration Failed!');
        $this->session->set_flashdata('alert_class', 'alert-danger');
        redirect(base_url('Auth/register')); // redirects to the register form page
      }
    }
  }

  // Backend - Gets the registered users data for datatables
  public function display_registered_users() {
    $data['users'] = $this->User->getAllRegisteredUsers();
    $this->load->view('admin/pages/registered_users', $data);
  }
}
?>