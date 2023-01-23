 <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/momentjs/moment.js"></script>
   
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/forms/form-validation.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/jquery-steps/jquery.steps.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/forms/form-wizard.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/pages/tables/jquery-datatable.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/pages/forms/basic-form-elements.js"></script>

    <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- <script src="<?php //echo base_url(); ?>assets/js/pages/ui/dialogs.js"></script> -->
     
    <!--
    <script src="<?php //echo base_url(); ?>assets/plugins/tinymce/tinymce.js"></script>
    <script src="<?php //echo base_url(); ?>assets/js/pages/forms/editors.js"></script>
    -->
   
    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
    <script type="text/javascript"> var hostUrl = "<?php echo base_url(); ?>"; </script>
    
    <script>
        
         //show current time
         $(document).ready(function() {
         var interval = setInterval(function() {
        var momentNow = moment();
        $('#date-div').html( momentNow.format('dddd').substring(0,3).toUpperCase() + ',  ' + momentNow.format('DD MMMM YYYY') );
        $('#time-div').html(momentNow.format('hh:mm:ss A'));
    }, 100);
         });
    </script>
    
</body>
</html>