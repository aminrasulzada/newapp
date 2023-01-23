<?php
require('Base_model.php');

class User_model extends Base_model {

    function __construct() {
        parent::__construct();
    }

    public function validate_user($username, $password) {
    	$query = $this->db->select('user_id, user_name,first_name,last_name,user_role,is_active' )
			        	  ->from('users')
			        	  
			        	  ->where( array('user_name' => $username, 'user_password' => $password))
			        	  
			        	  ->get();

		return $query->result();
    }

}