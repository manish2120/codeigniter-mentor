<?php
class Profile_model extends CI_Model {
  // In Profile_model
  public function __construct() {
    parent::__construct();
      $this->load->database();
  }

  // GET USER PROFILE DATA BY USER ID
  public function get_user_profile($user_id) {
      $query = $this->db->get_where('user_profile_data', ['id' => $user_id]);
      return $query->row_array();
  }

  // UPDATE USER PROFILE
  public function update_user_profile($user_id) {
    $this->db->where('id', $user_id);
    $query = $this->db->update('user_profile_data');
    return $query;
  }

  // UPDATE PROFILE IMAGE TO A NEW FILE NAME
  public function update_profile_image($user_id, $image_name) {
      $data = ['profile_image' => $image_name];
      $this->db->where('id', $user_id);
      $this->db->update('user_profile_data', $data);
  }
}
?>
