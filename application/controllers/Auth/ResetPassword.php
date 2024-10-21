<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResetPassword extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User');
        $this->load->model('ResetPassModel');
        $this->load->library('form_validation');
    }

    public function reset() {
        // Form Validations Starts
        $this->form_validation->set_rules('current_password', 'Current Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
        // Form Validations Ends

        if ($this->form_validation->run() == FALSE) {
            // Load the view with error messages
            $this->load->view('change_password');
        } else {
            $email = $this->session->userdata('auth_user')['email_id']; // get the current login active session email id
            $currentPassword = $this->input->post('current_password');
            $newPassword = $this->input->post('new_password');

            $user = $this->User->getUserByEmail($email);
            
            // Update the password
            if ($user && password_verify($currentPassword, $user->password)) {
                // Current password is correct, update the password
                if ($this->ResetPassModel->updatePassword($email, $newPassword)) {
                    $this->session->set_flashdata('status', 'Password changed successfully.');
                    redirect(base_url('change-password'));
                } else {
                    $this->session->set_flashdata('status', 'Failed to update password.');
                    redirect(base_url('change-password'));
                }
            } else {
                // Current password does not match
                $this->session->set_flashdata('status', 'Current password is incorrect.');
                redirect(base_url('change-password'));
            }
        }
    }
}
?>
