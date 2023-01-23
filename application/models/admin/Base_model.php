<?php
class Base_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	public function selectRecord($query) {
		$result = array();
		$query_res = $this->db->query($query);
		if($query_res) {
			foreach ($query_res->result() as $row) {
				$result[] = $row;
	        }
	    }
	    return $result;    
	}

    public function updateRecord($table, $data_ar, $where_ar) {
		$this->db->where($where_ar);
		$this->db->update($table, $data_ar); 
		return true;
	}
	
	public function deleteRecord($table, $where_ar)
	{
	    $this->db->where($where_ar);
	    $this->db->delete($table);
	    return true;
	}

   
	public function insertRecord($table, $data_ar) {
		$this->db->insert($table, $data_ar);
    	return $this->db->insert_id(); 
	}

	public function insertMultiRecord($table, $data_multi_ar) {
		foreach ($data_multi_ar as $dma) {
			$this->db->insert($table, $dma);
		}
	}

	public function executeQuery($query) {
		$this->db->query($query);
	}

	//table extra info data
	public function set_created_info($record, $user_id) {
    	$record['created_by'] = $user_id;
    	$record['created_date'] = date('Y-m-d H:i:s');
    	return $record;
    }

	public function set_modified_info($record, $user_id) {
    	$record['modified_by'] = $user_id;
    	$record['modified_date'] = date('Y-m-d H:i:s');
    	return $record;
    }
    public function select_admin_user()
    {
      $cond = DEFAULT_ACTIVE_MODE;
      $query = "select user_id, user_name, user_role from users where user_role IN(3,4) and is_active = $cond";
      $res = $this->db->query($query);
      return $res->result();
    }

}
