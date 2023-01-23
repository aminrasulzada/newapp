<?php 



 ?>

<?php
 $name = $this->session->userdata('first_name');
 $title = $this->session->userdata('name_title');
 $id=$this->session->userdata('user_role');
 if($id == 1){

defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/include/header');
$this->load->view('admin/include/left-bar');
?>
<!-- header part -->



<!-- footer part -->
<?php $this->load->view('admin/include/footer'); 

}else{?>
	<img class="brand-logo" src="<?php echo base_url(); ?>assets-frontend/img/quiz.jpg" alt="quiz" >
   <?php $this->load->view('include/header');
   
?>

<form name="quiz"  method="post" action="<?php echo base_url();?>question-paper">
<div id="myModal" class="modal fade">

<div class="modal-footer"> <a href="<?php echo base_url();?>dashboard"  class="btn btn-primary" >View Past Grades</a></div>
    <div class="modal-dialog">
        <div class="modal-content quiz">
            <div class="modal-body">


                <center><h3>OnLine Quiz</h3></center>
                <br>

                <p>Welcome <?php echo ucfirst($title);?>  <?php echo  ucfirst($name); ?> in online quiz, select your quiz and then click on start quiz link.</p>
                
				<div class="form-row">

				<div class="col">
	    <label for="quiz">Select Quiz<span style="color: red;">*</span> :</label>
	    <select  name="quiz" id="quiz" class="form-control " required>
			
	       
	       
	       <?php
	       if(count($quiz_name) > 0)
	      { ?>
	           <option value="">Please Select Quiz</option>
	           <?php
	          foreach($quiz_name as $quiz)
	      {
	         
	             
	       ?>
	        <option value="<?php echo $quiz->quiz_id; ?>"><?php echo ucfirst($quiz->quiz_name); ?></option>
	      
	        <?php } 
	           
	     
	      } else
	      { ?>
	           <option class="col">Quiz not available</style></option>
			   </select>
	    
			   <a href="start-quiz1.php">Do you want to rejoin the same quiz?
	     <?php }
	       ?>
	    
	  </div>
	 
	  </div>
            </div>
            <!-- dialog buttons -->
            <div class="modal-footer"><?php if(!empty($quiz_name)){ ?><input type="submit"  class="btn btn-primary" value="Start Quiz"><?php } ?> </div>
            
            
        </div>
    </div>
</div>
</form>
</body>
        


<script>
    $("#myModal").modal({                    
        "backdrop"  : "static",
        "keyboard"  : true,
        "show"      : true          
    });
    
</script>
<?php } ?>