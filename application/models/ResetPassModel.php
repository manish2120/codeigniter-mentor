<?php
class ResetPassModel extends CI_Model {
    // HANDLE PASSWORD UPDATE
    public function updatePassword($email, $newPassword) {
        // Hashing new password to store it securely
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT); // Converts password in hash

        $data = array(
            'password' => $hashedPassword
        );

        // Update password in database
        $this->db->where('email_id', $email);
        return $this->db->update('register_form', $data);
    }
}
?>
