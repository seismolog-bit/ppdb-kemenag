<?php      
  $pengaturan=$this->Pengaturan_model->get_by_id_1();
?>
<!DOCTYPE html>
<html>
<head>
  <link href='<?= base_url('assets/dist/img/'.$pengaturan->logo) ?>' rel='icon' type='image/png'/>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $this->config->item('title')?> <?php echo strtoupper($pengaturan->nama_sekolah) ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url();?>assets/bower_components/fontawesome/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url();?>assets/plugins/iCheck/square/purple.css">
  <style type="text/css">
  .kiri{
    background-image: url("<?= base_url('assets/dist/img/'.$pengaturan->bglogin) ?>");
    background-size: cover;
    height: 100%;
    margin: 0px;
    padding: 0px;
  }
  .kanan{
    background-color: white;
    height: 100%;
    padding-top: 4%;
  }
  .container-login{
    padding: 10%;
    padding-top: 0;
  }
  .login-logo{
    padding-top: 5%;
  }
  .logo {
    position: absolute;
    left: 20px;
    top: 20px;
    z-index: 2;
    color: #000;
    -webkit-filter: drop-shadow(5px 5px 5px #222);
    filter: drop-shadow(2px 2px 2px #222);
  }  
  </style>
</head>
<body class="hold-transition login-page" style="height: 100%;overflow: hidden;">

  <div class="col-md-8 hidden-xs hidden-sm kiri">
    <div class='logo hidden-xs'><img class='img img-responsive' style='max-width:200px;' src="<?= base_url('assets/dist/img/'.$pengaturan->logo) ?>" width='100px'>
    </div>     
  </div>
  <div class="col-md-4 col-xs-12 kanan">
    <div class="login-logo">
        <h1><strong><?= $this->config->item('sitename')?></strong></h1>
        <h5>version <?= $this->config->item('version')?></h>
    </div>
    <div class="container-login ">
      <p class="login-box-msg"><?php echo lang('create_user_subheading');?></p>
      <?php
        if(validation_errors() != ""){
      ?>      
        <div id="infoMessage" class="callout callout-danger"><?php echo validation_errors();?></div>
      <?php } ?>
      <?php echo form_open("auth/proses_registrasi");?>
        <!--
        <div class="form-group has-feedback">
          <label><?php echo lang('create_user_fname_label') ?></label>
          <input type="text" id="first_name" data-toggle="first_name" name="first_name"  class="form-control" placeholder="<?php echo lang('create_user_fname_label') ?>" value="<?php echo set_value('first_name');?>"  autofocus required />
        </div>               
        <div class="form-group has-feedback">
          <label><?php echo lang('create_user_lname_label') ?></label>
          <input type="text" id="last_name" data-toggle="last_name" name="last_name"  class="form-control" placeholder="<?php echo lang('create_user_lname_label') ?>" value="<?php echo set_value('last_name');?>" autofocus required />
        </div>
        -->        
        <div class="form-group has-feedback">
          <label><?php echo lang('create_user_username_label') ?> <span style="color:red;">*</span></label>
          <input type="text" id="username" data-toggle="username" name="username" class="form-control" placeholder="<?php echo lang('create_user_username_label') ?>" value="<?php echo set_value('username');?>" autofocus required />
        </div>
<!--  hapus tanda komentar untuk input email
        <div class="form-group has-feedback">
          <label><?php echo lang('create_user_email_label') ?> <span style="color:red;">*</span></label>
          <input type="email" id="email" data-toggle="email" name="email"  class="form-control" placeholder="<?php echo lang('create_user_email_label') ?>" value="<?php echo set_value('email');?>" autofocus required />
        </div>
ini jg di hapus -->
        <div class="form-group has-feedback">
          <label><?php echo lang('create_user_password_label') ?> <span style="color:red;">*</span></label>
          <input type="password" id="password" data-toggle="password" name="password" class="form-control" placeholder="<?php echo lang('create_user_password_label') ?>" value="<?php echo set_value('password');?>" required />
          <!-- <p class='small'>Mohon untuk mengingat kata sandi anda.</p> -->
        </div>
        <div class="form-group has-feedback">
          <label><?php echo lang('create_user_password_confirm_label') ?> <span style="color:red;">*</span></label>
          <input type="password" id="password_confirm" data-toggle="password_confirm" name="password_confirm" class="form-control" placeholder="<?php echo lang('create_user_password_confirm_label') ?>" value="<?php echo set_value('password_confirm');?>" required />
          <p class='small'>Mohon untuk mengingat kata sandi anda.</p>
        </div>

        <div class="row">
          <div class="col-xs-6">
           <a href="login" >Login Page</a><br/>
          </div><!-- /.col -->
          <div class="col-xs-6">
            <input type="submit" class="<?= $this->config->item('botton')?> btn-block" id="loginBtn" value="<?php echo lang('create_user_submit_btn') ?>" />
          </div><!-- /.col -->
        </div>
        <?php echo form_close();?>
    </div>
  </div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?= base_url();?>assets/plugins/bootstrap-show-password/bootstrap-show-password.min.js"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-purple',
      radioClass: 'icheckbox_flat-green',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>  