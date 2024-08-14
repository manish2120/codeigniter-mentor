<?php
defined("BASEPATH") or exit("No direct script access allowed");

class User_profile_data extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Backend/Userdata_model');
        $this->load->model('Dropdown_model');
    }

    public function view_profile($user_id) {
        // Fetch the user profile data
        $profile = $this->Userdata_model->getUserData($user_id);

        // Check if profile data exists
        if (!$profile) {
            // If the profile does not exist, pass an error message to the view
            $userdata = [
                'profile' => null
            ];
        } else {
            // Fetch country, state, and district names to get the selected user dropdown data
            $country = $this->Dropdown_model->fetch_user_selected_countries($profile['country']);
            $state = $this->Dropdown_model->fetch_user_selected_states($profile['state']);
            $district = $this->Dropdown_model->fetch_user_selected_districts($profile['district']);

            // isset to handle possible null values
            $country_name = isset($country[0]['country_name']) ? $country[0]['country_name'] : 'N/A';
            $state_name = isset($state[0]['state_name']) ? $state[0]['state_name'] : 'N/A';
            $district_name = isset($district[0]['district_name']) ? $district[0]['district_name'] : 'N/A';

            // Prepare data for the view
            $userdata = [
                'profile' => $profile,
                'country_name' => $country_name,
                'state_name' => $state_name,
                'district_name' => $district_name,
                'profile_error' => null, // No error, as profile exists
            ];
        }

        // Page title
        $page_data['page_title'] = 'User Profile:';

        // Load the views with the prepared data
        $this->load->view('admin/section/boilerplate_start', $page_data);
        $this->load->view('admin/section/header', $page_data);
        $this->load->view('admin/section/sidebar');
        $this->load->view('admin/pages/view_profile', $userdata);
        $this->load->view('admin/section/footer');
        $this->load->view('admin/section/boilerplate_start');
    }
}
?>
