<?php
session_start();
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
            $csrf3 = $_SESSION['token'];
            if ($this->form_validation->run() !== FALSE and hash_equals($csrf3,$_POST['csrf1'])) {
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
		$refresh_user = $this->User_model->updateRecord('users', array('is_refresh' => 1), array('user_id' => $user_id));		
	    $query = "SELECT * from quiz_questions where is_active= ".DEFAULT_ACTIVE_MODE." and quiz_id= '$quizid' and difficulty='1' or difficulty='2' or difficulty='3'  ORDER BY rand() LIMIT 15  ";
        $query2="select * from quiz_questions where is_active= ".DEFAULT_ACTIVE_MODE." and quiz_id= '$quizid' and difficulty='3' ORDER BY Rand() LIMIT 5";
        $data['question'] = $this->User_model->selectRecord($query);
        $question_id = $data['question']->id;

        $query1="SELECT * from quiz_answers  ORDER BY question_id  ";
        $data['wrong']= $this->User_model->selectRecord($query1);
        $query2="SELECT * from quiz_answers where is_correct='1' ORDER BY question_id";
        $data['right']= $this->User_model->selectRecord($query2);
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
           $select_query = "select quiz_questions.difficulty, quiz_answers.answer, quiz_questions.open_answer, quiz_answers.question_id from quiz_questions LEFT JOIN quiz_answers ON quiz_answers.question_id = quiz_questions.id where is_correct='1'";
           $quiz_answers = $this->User_model->selectRecord($select_query);
           $select_query1="select * from quiz_questions where quiz_id =$quiz_id ";
           $quiz_question=$this->User_model->selectRecord($select_query1);

           // print_r($_POST); 
            foreach ($this->input->post() as $key => $answer)  
            {
               // echo strpos($key, 'question_'); die;
               
                $question = explode('_', $key)[1]; 
               
               //echo $question; die;
                $correct = '';
                $point= '';
               
                foreach($quiz_answers as $quiz_details)
            {
                   if($quiz_details->question_id == $question){
                    if($quiz_details->answer == $answer )
                    {
                        $correct = 1;
                        $point = $quiz_details->difficulty;                   
                    }elseif($quiz_details->open_answer == '1' && $answer !=''){
                        $correct=2;
                        
                    }
                    else{
                        $correct=0;
                    }
                                   
                
            }}
            
            $this->User_model->insertRecord('quiz_answer', array('user_id'=> $user_id, 'quiz_id'=>$quiz_id, 'question_id'=> $question, 'answer'=> $answer, 'point'=> $point, 'is_correct'=> $correct));
  
             }
            
       foreach ($this->input->post() as $key => $answer)
            {
           
                $question = explode('_', $key)[1]; 
               
               //echo $question; die;
                
                $correct = '0';
                $point= '0';
                $open = '0';
                   $max = '0';
                   $maxp='0';
                foreach($quiz_question as $quiz_details)
            { $answer1="SELECT quiz_1.is_correct, quiz_answer.point, quiz_1.difficulty FROM quiz_answer LEFT JOIN quiz_1 ON quiz_1.id=quiz_answer.id where quiz_1.quiz_id='$quiz_id' and quiz_1.user_id ='$user_id' and quiz_1.entry_date = CURRENT_TIMESTAMP ORDER BY quiz_1.id DESC ";
                $answer2=$this->User_model->selectRecord($answer1);
                
                   if($quiz_details->id == $question )
                {   
                    foreach($answer2 as $quiz_2 )
                    {
                        
                        if($quiz_2->is_correct == 1 ) 
                    {
                       $correct += 1;
                        $point += $quiz_2->point;
                    }
                    if($quiz_2->is_correct == 2 ) 
                    {
                        
                        $open += 1;
                    }
                        else{
                        $correct += 0;
                        $point += 0;
                    }
                
                }
                $answer1="SELECT quiz_1.is_correct, quiz_answer.point, quiz_1.difficulty FROM quiz_answer LEFT JOIN quiz_1 ON quiz_1.id=quiz_answer.id where quiz_1.quiz_id='$quiz_id' and quiz_1.user_id ='$user_id' and quiz_1.entry_date = CURRENT_TIMESTAMP ORDER BY quiz_1.id DESC Limi ";
                $answer2=$this->User_model->selectRecord($answer1);
                foreach($quiz_question as $quiz_details)
                    {
                        $max+=1; 
                        $maxp +=$quiz_details->difficulty;
                    }
                   
                    $data['point']=$point;
                    $data['correct']=$correct;
                    $data['open']=$open;
                    $data['max']=$max;
                    $data['maxpoint']=$maxp;
                    $data['answers']=$this->input->post(); 
                }}   

             
      $this->load->view('quiz-complete', $data);
     
        }}} 
    public function startQuiz()
    {
    $this->isUserLogin();
        $user_id = $this->session->userdata('user_id');
        $data = array();
        $query = "SELECT quiz_name, quiz_id FROM quiz_details WHERE  is_active= ".DEFAULT_ACTIVE_MODE." and show_it= 1 and counter >0   order by quiz_id desc ";
       
	    $data['quiz_name'] = $this->User_model->selectRecord($query);
	  
        $this->load->view('start-quiz', $data);
    }
    public function quizComplete()
    {
        
        $this->isUserLogin();
        $query = "SELECT quiz_id FROM quiz_answer ";
	    $data['question'] = $this->User_model->selectRecord($query);
	    $this->load->view('quiz-complete', $data);

    }
    public function dashboard()
    {
    $this->isUserLogin();
        $user_id = $this->session->userdata('user_id');
        $data = array();
        
        $sql = "SELECT DISTINCT quiz_details.quiz_name, quiz_1.entry_date, quiz_1.id FROM quiz_details LEFT JOIN quiz_1 ON quiz_1.quiz_id = quiz_details.quiz_id where quiz_1.user_id ='$user_id' Group By quiz_1.entry_date DESC ";
        $query1 = "SELECT quiz_details.quiz_name, quiz_1.is_correct, quiz_1.entry_date, quiz_answer.point, quiz_1.difficulty FROM quiz_1 LEFT JOIN quiz_answer ON quiz_1.id=quiz_answer.id LEFT JOIN quiz_details ON quiz_1.quiz_id = quiz_details.quiz_id where  quiz_1.user_id ='$user_id' ORDER BY quiz_1.id DESC LIMIT 8";
        $answer2=$this->User_model->selectRecord($query1);
        $data['check'] = $this->User_model->selectRecord($sql);
        $correct = '0';
                $point= '0';
                $open = '0';
                $max = '0';
                $maxp='0';
        foreach($answer2 as $quiz_2 )
                    {
                        
                        if($quiz_2->is_correct == 1 ) 
                    {
                        $correct += 1;
                        $point += $quiz_2->point;
                    }
                   elseif($quiz_2->is_correct == 2) 
                    {
                         $open += 1;
                         $correct += 0;
                         $point += 0;
                    }
                        else{
                        $correct += 0;
                        $point += 0;
                    }
                }
                foreach($answer2 as $quiz_2 )
                {
                    $max+=1; 
                    $maxp +=$quiz_2->difficulty;
                }
                
                $data['point']=$point;
                $data['correct']=$correct;
                $data['open']=$open;
                $data['max']=$max;
                $data['maxpoint']=$maxp;
                $data['time']=$answer2[0]->entry_date;
                $data['aname']=$answer2[0]->quiz_name;
               
        $this->load->view('dashboard', $data);
        
    }
    public function answer_details()
    {
    $this->isUserLogin();
        $user_id = $this->session->userdata('user_id');
        $data = array();
        $id = $this->uri->segment(2);
        
        $query= "SELECT entry_date FROM quiz_1 Where id =$id";
        $answer1=$this->User_model->selectRecord($query);
        $entry_date=$answer1[0]->entry_date;
        if($id!='0'){
        while($answer1=$this->User_model->selectRecord($query)){
            $entry_date=$answer1[0]->entry_date;
            break;
        }}
        
        $query1 = "SELECT quiz_details.quiz_name, quiz_1.is_correct, quiz_1.entry_date, quiz_answer.point, quiz_1.difficulty FROM quiz_1 LEFT JOIN quiz_answer ON quiz_1.id=quiz_answer.id LEFT JOIN quiz_details ON quiz_1.quiz_id = quiz_details.quiz_id where  quiz_1.user_id =$user_id and quiz_1.entry_date='$entry_date'";
        $answer2=$this->User_model->selectRecord($query1);
        $data['check']=$entry_date;
        $correct = '0';
        $point= '0';
        $open = '0';
        $max = '0';
        $maxp='0';
        foreach($answer2 as $quiz_2 )
                    {
                        
                        if($quiz_2->is_correct == 1 ) 
                    {
                       $correct += 1;
                        $point += $quiz_2->point;
                    }
                   elseif($quiz_2->is_correct == 2 ) 
                    {
                         $open += 1;
                         $correct += 0;
                         $point += 0;
                    }
                        else{
                        $correct += 0;
                        $point += 0;
                    }
                }
                foreach($answer2 as $quiz_2 )
                {
                    $max+=1; 
                    $maxp +=$quiz_2->difficulty;
                }
                
                $data['point']=$point;
                $data['correct']=$correct;
                $data['open']=$open;
                $data['max']=$max;
                $data['maxpoint']=$maxp;
                $data['time']=$answer2[0]->entry_date;
                $data['aname']=$answer2[0]->quiz_name;
               
        $this->load->view('answer_details', $data);
        
    }
   }
    



