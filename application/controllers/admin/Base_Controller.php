<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Base_Controller extends CI_Controller {
	//constructor
	function __construct() {
        parent::__construct();
        
       }

    public function convert_to_md5($string) {
    	return md5($string);
    }

    public function convert_to_sha1($string) {
        return sha1($string);
    }

    public function clear_posted_data() {
	    unset($_POST);
	}

    public function get_message_string($msg_class, $msg) {

      return '<div class="alert alert-'. $msg_class .' alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                '. $msg .'
              </div>';
    }
    
    public function isAdminLogin() {
        if(!empty($this->session->userdata('user_id'))) {
           return true; 
        } else {
            return false;
        }
    }
}
