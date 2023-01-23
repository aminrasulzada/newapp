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


<h1>User Dashboard</h1>
<!-- footer part -->
<?php $this->load->view('admin/include/footer'); 

}else{?>

   <?php $this->load->view('include/header');
   
?>

<h1>User Dashboard</h1>

<div class="modal-footer"> <a href="<?php echo base_url();?>quiz"  class="btn btn-primary" >Join a quiz</a></div>
<html>
    <head>
        <title>Class Page Layout</title>
        <style type="text/css">
            body {
                font-family:'Courier New';
                font-size:1em;
                background-color:gray;
            }

            ul {
                margin:0px;
            }

            #container {
                width:800px;
                margin-left:auto;
                margin-right:auto;
            }

            #header {
                height:50px;
                padding:10px;
                margin:0px;
                background-color:#FFFF66;
            }

            #mainContent {
                height:400px;
            }

            #leftSection {
                background-color:#99FFFF;
                width:25%;
                float:left;
                height:100%;
            }

            #centreSection {
                background-color:#00FF00;
                width:50%;
                float:left;
                height:100%;
            }

            #rightSection {
                background-color:#99FFFF;
                width:25%;
                float:left;
                height:100%;
            }

            #footer {
                clear:both;
                height:50px;
                padding:10px;
                margin:0px;
                background-color:#FFFF66;
            }

            #footerLeft {
                float:left;
            }

            #footerRight  {
                float:right;
            }
        </style>
    </head>

    <body><?php if($check[0]!=''){
   echo  "Please select quiz to see answers.";
   }else{
    echo "You have not submitted any quiz, Please Join Quiz";
   } ?>
    <table>
    <tr>
    <td>Quiz name </td>
        <?php foreach($check as $id){
            ?>
              <td><a href="<?php echo base_url();?>answer_details/<?php echo $id->id; ?>"><?php echo $id->quiz_name; ?></a></td>
              <td><?php echo $id->entry_date ;?></td>
        </tr>
        <tr>
       <?php } ?>
                </table>  
                
            </div>            
            <div id="footer">
                <div id="footerLeft">Footer</div>
                
            </div>
        </div>
    </body>
</html>
<?php } ?>