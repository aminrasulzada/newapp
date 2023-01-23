<?php
require('Base_model.php');

class Employee_model extends Base_model {

    function __construct() {
        parent::__construct();
    }

    public function get_employee($user_id = 0) {
            $cond = 'where user_role = 2';
            if($user_id > 0) {
                $cond = " where user_id = $user_id";
            }
            
    	$emp_query = "SELECT user_id, user_name, CONCAT(first_name, ' ', last_name) AS name, first_name, last_name, gender, is_active FROM `users` $cond";
        $query = $this->db->query($emp_query);
		return $query->result();
    }

    public function add_Employee($data_array) {
        

        //user table
        $user_data = array(
                            'user_name' => $data_array['user_name'],
                            'user_password' => $data_array['user_password'],
                            'user_role' => $data_array['user_role'],
                            'first_name' => $data_array['first_name'],
    				        'last_name' => $data_array['last_name'],
    				        'gender' => $data_array['gender'],
    				            
    				       // 'date_of_birth' =>$data_array['date_of_birth'],
                            
                            'is_active' => DEFAULT_ACTIVE_MODE
                     );
       
        $this->db->insert('users', $user_data);
        return $this->db->insert_id();
       
    }

      public function Update_Employee($data_array) {
        $this->db->trans_begin();

        $user_data = array(
                            
                            'user_name' => $data_array['user_name'],
                            'first_name' =>  $data_array['first_name'],
							'last_name' =>  $data_array['last_name'],
							'gender' => $data_array['gender'],
                            'is_active' => $data_array['is_active']
                     );
            
        $user_id = $data_array['user_id'];
        $this->db->where( array('user_id' => $user_id)  );
        $this->db->update('users', $user_data);
       
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
        
    }
    
   
    
}
