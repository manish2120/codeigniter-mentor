<?php
class Userdata_model extends CI_Model {
    // STARTS - INSERT USER PROFILE DATA IN DATABASE
    public function send($userdata) {
        $this->db->insert('user_profile_data', $userdata);
    }

    // UPDATE EXISTING USER PROFILE DATA
    public function update_user_profile($email, $userdata) {
        $this->db->where('email_id', $email);
        return $this->db->update('user_profile_data', $userdata);
    }

    public function getUserProfileData($data) {
        $query = $this->db->get('user_profile_data', $data);
        return $query->result_array();
    }

    // STARTS - GETS MATCHING EMAIL ID ROW FROM DATABASE
    public function getUserProfileDataByEmail($logged_in_email) {
        $this->db->where('email_id', $logged_in_email);
        $query = $this->db->get('user_profile_data');
        return $query->row_array();
    }

    // GET USER PROFILE DATA WITH MATCHING ID
    public function getUserData($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('user_profile_data');
        return $query->row_array();
    }
}
?>
