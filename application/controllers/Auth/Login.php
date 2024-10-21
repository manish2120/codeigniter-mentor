<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User');
    }

    // STARTS - LOAD LOGIN PAGE
    public function loginUser() {
        $this->load->view('login');
        // $this->load->model('User');
    }
    // ENDS - LOAD LOGIN PAGE

    // STARTS - HANDLES LOGIN PAGE
    public function login() {
        // Form Validations Starts
        $this->form_validation->set_rules('email_id', 'Email Id', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // Form Validations Ends

        if ($this->form_validation->run() == FALSE) {
            // If failed - load login page
            $this->loginUser();
        } else {
            // If passed - store data in variables
            $email = $this->input->post('email_id');
            $password = $this->input->post('password');

            // Get the current user email
            $this->load->model('User');
            $user = $this->User->getUserByEmail($email);

            // Check if password is matching or not
            if ($user && password_verify($password, $user->password)) {
                // Password is correct, set session data
                $user_details = array(
                    'email_id' => $user->email_id,
                    'password' => $user->password
                );

                // session to authenticate the login user with a boolean like value of 1
                $this->session->set_userdata('authenticated', '1'); 

                $this->session->set_userdata('auth_user', $user_details); // stores the email id and password

                $this->session->set_flashdata('status', 'You are Logged In Successfully!');
                $this->session->set_flashdata('alert_class', 'alert-success');
                redirect(base_url('home')); // redirects to the home page
            } else {
                // Password is incorrect - set the status then redirects to login page.
                $this->session->set_flashdata('status', 'Invalid Email ID or Password!');
                $this->session->set_flashdata('alert_class', 'alert-danger');
                redirect(base_url('Auth/Login/loginUser')); // redirects to the login page
            }
        }
    }
    // ENDS - HANDLES LOGIN PAGE

    // STARTS - HANDLE USER LOGOUT
    public function logout() {
        // unsets the currently login session
        $this->session->unset_userdata('authenticated');
        $this->session->unset_userdata('auth_user');
        $this->session->unset_userdata('uploaded_image'); // unsets the uploaded image which is currently in session

        $this->session->set_flashdata('status', 'You are Logged Out Successfully!');
        redirect(base_url('home')); // redirects to the home page
    }
    // ENDS - HANDLE USER LOGOUT

}
?>
