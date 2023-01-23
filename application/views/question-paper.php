<?php
session_start(); 

defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>step-assets/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>step-assets/css/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>step-assets/css/style.css">
<?php $this->load->view('include/header'); ?>

<body>
    
 
    <form id="msform" name="question-form" method="POST" action="<?php echo base_url(); ?>save-answer">
        
    <p style="position:absolute; bottom: 542px;left: 330px;color: red;">Time left : <span id="timer"></span></p>
       <?php
       
       if(count($question) > 0)
       {
        $counter = 1;
        foreach($question as $quest ) {
            
            ?>
            
     <fieldset style="bottom:90px";> 
      <hr/>
         <p style="text-align: left;">Question <?php echo $counter; ?> of <?php echo count($question); ?></p>
     
         <!--<p style="right: 29px;top: 52px;color: red;">Time left : <span id="timer"></span></p>-->
     <?php
    
    
     ?>
         <hr/>
         <div class="text-left">
             <h4 class="quiz-heading"><?php echo $quest->question; ?></h4>
             <div class="quiz-row">
                <?php $x = $quest->id; 
                
                foreach($wrong as $answer){
                    if($answer->question_id==$x){?>
                 <div class="q-tab">
                     <label class="radio">
                         <input type="<?php echo $quest->type; ?>"  value="<?php echo $answer->answer; ?>"  name="question_<?php echo $quest->id; ?>" class="ans-opt">
                         <span class="outer"><span class="inner"></span></span>
                          <?php echo $answer->answer; ?>
                     </label>
                 </div>
            <?php }}
        if($quest->open_answer=='1'){
            ?><div class="q-tab">   
            <input type="text"  value=""  name="question_<?php echo $quest->id; ?>"placeholder="Other" class="ans-opt">
  </div><?php
            
        
        
        }
            ?>
        
           

                


                          
               <!-- <php }$x++; ?>
                 <div class="q-tab">
                     <label class="radio">
                         <input type="<php echo $quest->type; ?>" value="<php echo $right->answer; ?>" name="question_<php echo $quest->id; ?>" class="ans-opt">
                         <span class="outer"><span class="inner"></span></span>
                         <php if($wrong->question_id == $x){
                           echo $wrong->answer;} ?>
                     </label>
                 </div>
                 
                 <div class="q-tab">
                     <label class="radio">
                         <input type="<php echo $quest->type; ?>" value="<php echo $correct->option; ?>" name="question_<php echo $quest->id; ?>" class="ans-opt">
                         <span class="outer"><span class="inner"></span></span>
                          <  if($wrong->question_id == $x){
                           echo $wrong->answer;} ?>
                     </label>
                 </div>

                 <div class="q-tab">
                     <label class="radio">
                         <input type="<php echo $quest->type; ?>"   value="<php echo $correct->option; ?>" name="question_<?php echo $quest->id; ?>" class="ans-opt">
                         <span class="outer"><span class="inner"></span></span>
                          <  if($wrong->question_id == $x){
                           echo $wrong->answer;} ?>
                     </label>
                 </div>
                          -->
             </div>
         </div>
                    <hr/>
        <?php
        if($counter != 1)
        {
        ?>
         
      <?php } 
      
     if($counter == count($question))
     { ?>
        <input type="button" name="previous" id="defaultbtnprvs" class="previous action-button" value="Previous"/>
        <input type="submit" name="submit" id="sbmtbtn" onclick="return submitAnswer();" class="action-button" value="Submit" />
      
        <?php } elseif($counter != 1){ ?>
<input type="button" name="previous" id="defaultbtnprvs" class="previous action-button" value="Previous"/>
<input type="button" name="next" id="defaultbtnnxt" class="next action-button" value="Next" />
        
        
        <?php }else {  ?> 
        
         <input type="button" name="next" id="defaultbtnnxt" class="next action-button" value="Next" />
         
         
       <?php } ?>
     </fieldset>
   <?php  ?>
</fieldset>
<?php  $counter ++;}
       } ?>
        <input type="hidden" name="quizid" value="<?php echo $question[0]->quiz_id; ?>">
        
    </form>





<script type="text/javascript">
    function submitAnswer() {
	
    let attempt = 0;
    $(".ans-opt").each( function(){
        if( $(this).prop("checked") ) {
            attempt++;
        }
    });
    if( confirm('Total question attempted : ' + attempt + '\n Are you sure to submit your answer ?' ) )
    
        return true;
      
    else
        return false;
}
$attempt =$_SESSION ['attempt'];

</script>

</body>
</html>

<?php 
$count_down= $time[0]->quiz_duration; 
$duration = trim($count_down, 'min'); 
?>
<script>

document.getElementById('timer').innerHTML = <?php echo $duration;?> + ":" + 59;
startTimer();
//var timerId = setInterval(startTimer, 1000);
 function startTimer() {
	
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  
  var second = checkSecond((timeArray[1] - 1));
  
  if(second==59){m=m-1}
  document.getElementById('timer').innerHTML = m + ":" + second;
 
  if(second==00 && m==00){ 
  
    
   //clearInterval(timerId);
   //alert("Click Next");
   $("#sbmtbtn").click();
   //timerId = setInterval(startTimer, 1000);
  
   
 
    }

 
  setTimeout(startTimer, 1000);
}



function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  
  return sec;
}


</script>

<script type="text/javascript" src="<?php echo base_url(); ?>step-assets/js/index.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>step-assets/js/slick.js"></script>	
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

