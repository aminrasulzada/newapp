<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/include/header');
$this->load->view('admin/include/left-bar');
?>
<!-- header part -->

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Edit User
            </h2>
        </div>
        <?php
        if(count($emp_list) > 0)
        {
            foreach($emp_list as $list)
            {
           
        
        ?>
            <!-- Advanced Form Example With Validation -->
            <form action="" method="post" name="add-emp" id="eddEmp" enctype="multipart/form-data">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <h2 class="card-inside-title">User Information</h2>
                             <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="emp_code" value="<?php echo $list->user_name; ?>" required />
                                            <label class="form-label">User Name </label>
                                             
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        Gender :
                                        <input type="radio" name="gender" value="male" id="male" class="with-gap" <?php if ($list->gender == 'male') echo 'checked="checked"'; ?>>
                                        <label for="male">Male</label>
    
                                        <input type="radio" name="gender" value="female" id="female" class="with-gap" <?php if ($list->gender == 'female') echo 'checked="checked"'; ?>>
                                        <label for="female" class="m-l-20" >Female</label>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="f_name" value="<?php echo $list->first_name; ?>" required  pattern=".*[^ ].*[a-zA-Z ]+" />
                                            <label class="form-label">First Name </label>
                                             
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="l_name" value="<?php echo $list->last_name; ?>"  />
                                            <label class="form-label">Last Name </label>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                                <div class="row clearfix">
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        Status :
                                        <input type="radio" name="status" value="1" id="status" <?php if($list->is_active == 1){ echo "checked"; } ?> class="with-gap" >
                                        <label for="status">Active</label>
    
                                        <input type="radio" name="status" value="0" id="status2" <?php if($list->is_active == 0){ echo "checked"; } ?> class="with-gap" >
                                        <label for="status2" class="m-l-20" >Inactive</label>
                                    </div>
                                </div>
                                </div>
                             
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                            <input type="reset" class="btn btn-danger m-t-15 waves-effect" name="reset" value="Reset" />
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <?php
               
            }
        }
            ?>
            <!-- #END# Advanced Form Example With Validation -->
    </div>
</section>

<!-- footer part -->
<?php $this->load->view('admin/include/footer'); ?>


<script type="text/javascript">
     <?php
        if(isset($error_msg)) {
            echo 'swal("' . $error_msg . '");';
        }
    ?>
</script>