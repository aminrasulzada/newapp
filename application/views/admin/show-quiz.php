<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/include/header');
$this->load->view('admin/include/left-bar');
?>
<!-- header part -->

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2> Manage Quiz </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Quiz List
                            </h2>
                          
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                           
                                            <th>Quiz Name</th>
                                             <th>Number of Question</th>
                                            <th>Quiz Start Date</th>
                                            <th>Quiz End Date</th>
                                            <th>Quiz Time Duration</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            
                                             <th>Quiz Name</th>
                                             <th>Number of Question</th>
                                            <th>Quiz Start Date</th>
                                            <th>Quiz End Date</th>
                                            <th>Quiz Time Duration</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            if(count($quiz_details) > 0) {
                                                foreach ($quiz_details as $quiz_obj) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo ucfirst($quiz_obj->quiz_name); ?></td>
                                                        <td><?php echo $quiz_obj->counter; ?></td>
                                                        <td><?php echo $quiz_obj->start_date; ?></td>
                                                        <td><?php echo $quiz_obj->end_date; ?></td>
                                                        <td><?php echo $quiz_obj->quiz_duration; ?></td>
                                                        
                                                        <td><?php  if($quiz_obj->show_it == 1){ ?><span class="label label-info">Active</span> <?php } else { ?><span class="label label-warning">Deactive</span> <?php } ?> </td>
                                                        
                                                      
                                                       
                                             <td>  <a href="<?php echo base_url(); ?>admin/edit-quiz/<?php echo $quiz_obj->quiz_id; ?>"> 
                                                    <span class="badge bg-teal">Edit</span>
                                                </a>
                                                <a href="javascript:void(0);" rel="<?php echo $quiz_obj->quiz_id; ?>" onClick="delConfirm(this);"> 
                                                    <span class="badge bg-pink">Delete</span>
                                                </a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
</section>

<!-- footer part -->
<?php $this->load->view('admin/include/footer'); ?>
<script>
    
    function delConfirm(curObj) {
        swal({
                title: "Are you sure to delete ?",
                text: "You will not be able to recover this quiz!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                var delID = $(curObj).attr('rel');
                var request = $.ajax({
                                      url: hostUrl + "admin/quiz-del",
                                      type: "POST",
                                      data: {req_dept_id : delID}
                              });

                request.done(function(msg) {
                      //swal("Deleted!", "Department has been deleted.", "success");
                      swal({
                             title: "Deleted!",
                             text: "Quiz has been deleted.",
                             type: "success",
                             showCancelButton: false,
                             confirmButtonText: "OK",
                             closeOnConfirm: false
                          }, function () {
                                window.location = hostUrl + "admin/manage-quiz";
                      });
                });      

                request.fail(function(jqXHR, textStatus) {
                    alert( "Delete request failed." );
                });    
       });
    }
</script>