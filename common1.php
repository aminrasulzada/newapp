<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('Base_Controller.php');

class Common extends Base_Controller {
	//constructor
	function __construct() {
        parent::__construct();
        $this->load->model('User_model');
       
    }

    public function index() {
       
    	$data = array();
        //if form submitted
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            //setting validation rule
            $this->form_validation->set_rules('uname', 'Username', 'required');
            $this->form_validation->set_rules('upassword', 'Password', 'required');

            if ($this->form_validation->run() !== FALSE) {
                $username = $this->input->post('uname', true);
                $password = $this->input->post('upassword', true);
                $password = $this->convert_to_md5($password);
                $login_res = $this->User_model->validate_user($username, $password);

                if( count($login_res) > 0 ) {
                    if($login_res[0]->is_active == 1) {
                        $this->session->set_userdata( array('user_id'  => $login_res[0]->user_id) );
                        $this->session->set_userdata( array('first_name'  => $login_res[0]->first_name) );
                        
                        $this->session->set_userdata( array('user_name'  => $login_res[0]->user_name) );
                        $this->session->set_userdata( array('user_role'  => $login_res[0]->user_role) );
                        
                       
                        redirect('quiz');
                    } else {
                        $data['error_msg'] = $this->config->item('err_user_inactive');
                    }
                } else {
                    $data['error_msg'] = $this->config->item('err_login_invalid');
                }

            }   
        }
        //loading view
    	$this->load->view('index', $data);
    }

    public function logout() {
    	$this->session->sess_destroy();
		redirect('login', 'refresh');
    }


//////////////////////////////////////////////////////////////////////private function
    private function isUserLogin() {
    	$user_id = $this->session->userdata('user_id');
    	if(!empty($user_id)) {
    		//ok
        } else {
    		redirect('login');
        }
    }
    
    public function questionPaper()
	{   $user_id = $this->session->userdata('user_id');
	    $quizid = $this->input->post('quiz', true);
        $diff= $this ->input->post('difficulty',true);
	    $this->isUserLogin();
	    $data = array();
		//$where = "user_id = $user_id";
	    //$data_arr =({ 'is_refresh'=1 });
		$refresh_select_users = "select * from users where is_active= ".DEFAULT_ACTIVE_MODE." and user_id= $user_id";
		$query_res = $this->db->query($refresh_select_users);
		
		$res = $query_res->row();
		$row = $res->is_refresh;
		//$refresh_result = $this->User_model->selectRecord($refresh_select_users);
		if($row ==1)
		{ 
	     redirect('save-answer');
	    }
		else
		{
            $host = "localhost";  
            $user = "root";  
            $password = '';  
            $db_name = "web_quiz";  
  
$con = mysqli_connect($host, $user, $password, $db_name);  
        
		$refresh_user = $this->User_model->updateRecord('users', array('is_refresh' => 1), array('user_id' => $user_id));		
	    $query = "SELECT * from quiz_questions where is_active= ".DEFAULT_ACTIVE_MODE." and quiz_id= '$quizid' and (difficulty='1')or (difficulty='2')  or (difficulty='3') order by rand() LIMIT 30  ";
        $query1="select question from quiz_questions where is_active= ".DEFAULT_ACTIVE_MODE." and quiz_id= '$quizid' and difficulty='2' ORDER BY Rand() LIMIT 10";
        $query2="select question from quiz_questions where is_active= ".DEFAULT_ACTIVE_MODE." and quiz_id= '$quizid' and difficulty='3' ORDER BY Rand() LIMIT 5";
        $data['question'] = $this->User_model->selectRecord($query);
        

	    $time = "select quiz_duration from quiz_details where quiz_id = $quizid";
	    $data['time'] = $this->User_model->selectRecord($time);
	    $this->load->view('question-paper', $data);
		}
	}
    
    public function saveAnswer()
    {
       $this->isUserLogin();
       if ($this->input->server('REQUEST_METHOD') == 'POST')
       {
           $con = mysqli_connect('localhost','root','','web_quiz');
           $user_id = $this->session->userdata('user_id');
           $quiz_id = $this->input->post('quizid');
           $select_query = "select * from quiz_questions where quiz_id =$quiz_id ";
           $quiz_question = $this->User_model->selectRecord($select_query);
           

           //print_r($_POST); 
            foreach ($this->input->post() as $key => $answer) 
            {
               // echo strpos($key, 'question_'); die;
               
                $question = explode('_', $key)[1]; 
               
               //echo $question; die;
                $correct = '';
                $point= '';
                foreach($quiz_question as $quiz_details)
            {
                   if($quiz_details->id == $question)
                {  $diff="SELECT difficulty FROM quiz_questions WHERE id= '$question'  ";
                    $result= mysqli_fetch_array(mysqli_query($con,$diff));
                    $diff_question="".$result['difficulty']."";
                    if($quiz_details->answer == $answer)
                    {
                        $correct = 1;
                        $point= 1;
                        $point1= 1;
                    }
                    else
                    {
                        $correct = 0;
                        $point=0 ;
                        $point1= 0;
                    }
                }
                    
            }
                $this->User_model->insertRecord('quiz_answer', array('user_id'=> $user_id, 'quiz_id'=>$quiz_id, 'question_id'=> $question, 'answer'=> $answer, 'is_correct'=> $correct, 'difficulty' => $point));
              
            }
              $question = "select quiz_questions.question, quiz_answer.answer from quiz_questions inner join quiz_answer on quiz_answer.question_id=quiz_questions.id where quiz_answer.user_id= $user_id";
			  $data['result'] = $this->User_model->selectRecord($question);
              $correct = "select * from quiz_answer where quiz_id = $quiz_id and user_id= $user_id and is_correct=1";
              $data['correct'] = $this->User_model->selectRecord($correct);
              $point= "SELECT SUM(difficulty) as sum_diff FROM quiz where quiz_id = $quiz_id and user_id= $user_id and is_correct=1 ";
              $data['point']=$this->User_model->selectRecord($point);
              $point1= "SELECT SUM(difficulty) as sum1_diff FROM quiz where quiz_id = $quiz_id and user_id= $user_id  " ;
               $data['point1']= "50";
       }   
	    $this->load->view('quiz-complete', $data);
    }
    
    public function startQuiz()
    {
    $this->isUserLogin();
        $user_id = $this->session->userdata('user_id');
        $data = array();
        $query = "select quiz_name, quiz_id from quiz_details where CURRENT_DATE() between start_date AND end_date and is_active= ".DEFAULT_ACTIVE_MODE." and show_it= 1 and counter >0   order by quiz_id desc";
       
	    $data['quiz_name'] = $this->User_model->selectRecord($query);
	  
        $this->load->view('start-quiz1', $data);
    }
    public function quizComplete()
    {
        $this->isUserLogin();
        $query = "select quiz_id from quiz_answer";
	    $data['question'] = $this->User_model->selectRecord($query);
	    $this->load->view('quiz-complete', $data);
	}
}
    



