<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Admin extends CI_Controller {
    public function index() {
        if ($this->input->post()) {
            $email = $this->input->post("email_id");
            $password = sha1($this->input->post("password")); // Convert password to sha1

            $result = $this->db->get_where("admin_user", [
                "email_id" => $email,
                "password" => $password,
                "account_status" => 1,
                "role" => "SSADMIN" // Use the correct role value
            ])->result_array();

            // SETTING LOGIN USER DATA IN SESSION
            if (!empty($result)) {
                $uid = $result[0]["id"];
                $first_name = $result[0]["first_name"];
                $last_name = $result[0]["last_name"];
                $email = $result[0]["email_id"];

                $this->session->set_userdata("admin_uid", $uid);
                $this->session->set_userdata("admin_first_name", $first_name);
                $this->session->set_userdata("admin_last_name", $last_name);
                $this->session->set_userdata("admin_email_id", $email);
            } else {
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('admin');
            }
        }

        // Check if session is exist or not
        if (@$this->session->userdata('admin_uid')) {
            $page_data["page_title"] = "Dashboard";
            $this->load->view("admin/section/boilerplate_start", $page_data);
            $this->load->view("admin/section/header");
            $this->load->view("admin/section/sidebar");
            $this->load->view("admin/dashboard/admin-dashboard");
            $this->load->view("admin/section/footer");
            $this->load->view("admin/section/boilerplate_end");
        } else {
            $page_data["page_title"] = "Login Admin";
            $page_data['error'] = $this->session->flashdata('error'); // Pass flash data to view
            $this->load->view('admin/section/boilerplate_start', $page_data);
            $this->load->view("admin/login-admin");
            $this->load->view('admin/section/boilerplate_end');
        }
    }

    // HANDLE LOGOUT
    public function logout()
    {
        $this->session->sess_destroy();
        redirect("admin");
    }
}
?>
