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
    <body>
        
    <table>
        <?php   ?>
            <div >Quiz Name                       <?php echo $aname ?></div>           <p>
            
                    <ul>                  
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                
                <div id="centreSection">
                <tr>
                <td>Number of questions attempted</td>
                <td><?php echo $max ?></td>
               
              </tr>
             <tr>
             <td>Number of correct answer </td>
              <td><?php echo $correct; ?></td>
              <tr>
                <td>Total points earned</td>
                <td><?php  echo $point;?></td>
              </tr>
              <tr>
                <td>Out of </td>
                <td><?php echo $maxpoint; ?></td>
                <td><?php echo $entry; ?></td>
              </tr>
              <tr>
                <td> Submitted</td>
                <td>   <?php echo $time ?>   </td>
              </tr>
             </tr>
             <?php
             if($open > 0){
              ?><tr>
                <td>You have submitted <?php echo $open ?> open-ended questions.  </td>
                <td> You will get results when it will checked by admin<td>
             
              </tr><?php } ?>
              </table>  
                
            </div>            
            <div id="footer">
                <div id="footerLeft">Footer</div>
                
            </div>
        </div>
    </body>
</html>
<?php } ?>