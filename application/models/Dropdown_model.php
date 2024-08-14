<?php
class Dropdown_model extends CI_Model {
    // STARTS - FETCH THE DROPDOWN DATA FROM DATABASE
    // Country Dropdown
    public function fetch_countries() {
        $this->db->order_by("country_name", "ASC");
        $query = $this->db->get("tbl_countries");
        return $query->result();
    }

    // State Dropdown
    public function fetch_states($country_id) {
        $this->db->select('state_id, state_name');
        $this->db->where('country_id', $country_id);
        $query = $this->db->get('tbl_states');
        return $query->result_array();
    }

    // Districts Dropdown
    public function fetch_districts($state_id) {
        $this->db->select('district_id, district_name');
        $this->db->where('state_id', $state_id);
        $query = $this->db->get('tbl_district');
        return $query->result_array();
    }
    // ENDS - FETCH THE DROPDOWN DATA FROM DATABASE

    // STARTS - GET THE USERS SELECTED DROPDOWN DATA
    // Country Dropdown
    public function fetch_user_selected_countries($country_id) {
        $this->db->select('country_id, country_name');
        $this->db->where('country_id', $country_id);
        $query = $this->db->get('tbl_countries');
        return $query->result_array();
    }

    // State Dropdown
    public function fetch_user_selected_states($state_id) {
        $this->db->select('state_id, state_name');
        $this->db->where('state_id', $state_id);
        $query = $this->db->get('tbl_states');
        return $query->result_array();
    }

    // Districts Dropdown
    public function fetch_user_selected_districts($district_id) {
        $this->db->select('district_id, district_name');
        $this->db->where('district_id', $district_id);
        $query = $this->db->get('tbl_district');
        return $query->result_array();
    }
    // ENDS - GET THE USERS SELECTED DROPDOWN DATA
}
?>
