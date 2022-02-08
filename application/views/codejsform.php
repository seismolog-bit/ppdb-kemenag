<script src="<?= base_url('assets/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<script src="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<?= base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>

<script type="text/javascript">
//select2
    $('.select2').select2();
//Date picker
    $('#fieldtanggal').datepicker({
      autoclose: true
    })
</script>
