This is Footer
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center">
    All Rights Reserved .
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?php echo ADMIN_PATH; ?>Assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo ADMIN_PATH; ?>Assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo ADMIN_PATH; ?>Assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo ADMIN_PATH; ?>Assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo ADMIN_PATH; ?>Assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="<?php echo ADMIN_PATH; ?>Dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?php echo ADMIN_PATH; ?>Dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?php echo ADMIN_PATH; ?>Dist/js/custom.min.js"></script>
<!-- This Page JS -->
<script src="<?php echo ADMIN_PATH; ?>Assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<script src="<?php echo ADMIN_PATH; ?>Assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo ADMIN_PATH; ?>Assets/libs/select2/dist/js/select2.min.js"></script>
<script src="<?php echo ADMIN_PATH; ?>Assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
//***********************************//
// For select 2
//***********************************//
$(".select2").select2();
/*datwpicker*/
jQuery('.mydatepicker').datepicker();
jQuery('#datepicker-autoclose').datepicker({
autoclose: true,
todayHighlight: true
});

</script>
<script src="<?php echo ADMIN_PATH; ?>Assets/extra-libs/DataTables/datatables.min.js"></script>
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
</script>
</body>

</html>
