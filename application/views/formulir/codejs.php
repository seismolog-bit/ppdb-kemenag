<!-- iCheck -->
<link rel="stylesheet" href="<?= base_url('assets/plugins/iCheck/square/red.css'); ?>">
<!-- iCheck -->
<script src="<?= base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- ckeditor -->
<script src='<?= base_url();?>assets/plugins/ckeditor/ckeditor.js'></script>

<script>
// iCheck	
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-red',
      radioClass: 'icheckbox_square-red',
      increaseArea: '20%' /* optional */
    });
  });
// --------- 

// ckeditor
var ckeditor = CKEDITOR.replace('ketentuan',{
            height:'180px'
});

CKEDITOR.disableAutoInline = true;
CKEDITOR.inline('editable');
// --------- 

</script> 