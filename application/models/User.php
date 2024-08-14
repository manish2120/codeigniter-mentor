<?php

class User extends CI_Model {

    // STARTS - GETS THE MATCHING USER DATA THROUGH EMAIL ID
    public function getUserByEmail($email) {
        $this->db->where('email_id', $email);
        $this->db->limit(1); // setting limit of one
        $query = $this->db->get('register_form');

        // Checks if number of matching row is one
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    // STARTS - INSERTS THE REGISTERED USER DATA
    public function registerUser($data) {
        return $this->db->insert('register_form', $data);
    }

    // STARTS - GET ALL THE REGISTERED USERS
    public function getAllRegisteredUsers() {
        $query = $this->db->get('register_form');
       return $query->result_array();
    }
}
?>
