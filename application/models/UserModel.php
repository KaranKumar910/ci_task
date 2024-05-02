<?php
class UserModel extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }

    public function register_user($data){
        // Insert data into the 'register_user' table
        $res = $this->db->insert('register_user', $data);
        // Check if insertion was successful
        if($res){
            return true; // Return true if insertion was successful
        } else {
            return false; // Return false if insertion failed
        }
    }

    public function get_user(){
        return $this->db->get('register_user');
    }

    public function delete_user($userId) {
        // Delete the user record from the 'register_user' table
        $this->db->where('id', $userId);
        $res = $this->db->delete('register_user');
    }
}
?>
