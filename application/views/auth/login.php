<?php      
  $pengaturan=$this->Pengaturan_model->get_by_id_1();
  $infopublik=$this->Pengumuman_model->get_by_publik();
  $infoppdb =  $this->Tahunpelajaran_model->get_tahun_aktif();  
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
  h4 {
    margin-bottom: 15px;
    font-size: 30px;
  }     
  .main {
    margin:auto 10%;
    /*padding-top: 8%;*/
    text-align: center;
    color: #696969;
  }
  #clock > div {
    border-radius: 5px;
    background: #ffa500;
    padding: 5px 5px 0px 5px;
    color: #fff;
    display: inline-block;
  }
  #clock > div > p {
    font-size: 12px;
  }
  #days, #hours, #minutes, #seconds {
    padding: 5px;
    font-size: 15px;
    background: #fb8e00;
    display: inline-block;
    width: 40px;
  }
  span.turn {
    animation: turn 0.7s ease;
  }
  @keyframes turn {
    0% {transform: rotateX(0deg)}
    100% {transform: rotateX(360deg)}
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
    <?php if ($this->config->item('identity', 'ion_auth') != 'email') { ?>  
      <p class="login-box-msg"><?php echo lang('login_subheading1');?></p>
    <?php } else { ?>
      <p class="login-box-msg"><?php echo lang('login_subheading');?></p>
    <?php } ?>   

      <?php
        if($message != ""){
      ?>
        <div id="infoMessage" class="callout callout-danger"><?php echo $message;?></div>
      <?php } else if ($this->session->flashdata('success')== TRUE){
      ?> 
        <div id="infoMessage" class="callout callout-success"><?php echo $this->session->flashdata('success'); ?></div>
      <?php } else if ($this->session->flashdata('successreset')== TRUE){
      ?> 
        <div id="infoMessage" class="callout callout-success"><?php echo $this->session->flashdata('successreset'); ?></div>
      <?php } else if ($this->session->flashdata('logout')== TRUE){
      ?> 
        <div id="infoMessage" class="callout callout-success"><?php echo $this->session->flashdata('logout'); ?></div>
      <?php } else if ($this->session->flashdata('register')== TRUE){
      ?> 
        <div id="infoMessage" class="callout callout-danger"><?php echo $this->session->flashdata('register'); ?></div>   
      <?php } else if ($this->session->flashdata('aktif')== TRUE){
      ?> 
        <div id="infoMessage" class="callout callout-danger"><?php echo $this->session->flashdata('aktif'); ?></div>
      <?php } ?>  

      <?php echo form_open("auth/login");?>
      <?php if ($this->config->item('identity', 'ion_auth') != 'email') { ?>
         <div class="form-group has-feedback">
          <label>Username/NISN</label>
          <input type="text" name="identity" class="form-control" placeholder="Username/NISN" autofocus required />
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
      <?php } else { ?>
         <div class="form-group has-feedback">
          <label>Email</label>
          <input type="text" name="identity" class="form-control" placeholder="Email" autofocus required />
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
      <?php } ?>  
        <div class="form-group has-feedback">
          <label><?php echo lang('login_password_label') ?></label>
          <input type="password" id="password" data-toggle="password" name="password" class="form-control" placeholder="<?php echo lang('login_password_label') ?>" required />
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input name="remember" type="checkbox" class="icheckbox_flat-green" value="1"> <?php echo lang('login_remember_label') ?>
              </label>
            </div>
          </div><!-- /.col -->
          <div class="col-xs-4">
            <input type="submit" class="<?= $this->config->item('botton')?> btn-block" id="loginBtn" value="<?php echo lang('login_submit_btn') ?>" />
          </div><!-- /.col -->
        </div>
        <?php echo form_close();?>
        <?php if ($this->config->item('identity', 'ion_auth') == 'email') { ?>
        <a href="forgot_password"><?php echo lang('login_forgot_password');?></a><br/>
        <?php } ?>
        <a href="registrasi"><?php echo lang('register_a_new_membership');?></a>
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
      radioClass: 'icheckbox_square-purple',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>  

<!-- Modal Pengumuman -->
<?php if ($infopublik){ ?>
<div class="modal fade" id="myModalPengumuman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header <?= $this->config->item('header')?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-bullhorn"></i>&nbsp; Informasi</h3>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <?php if ($infoppdb) { 
            date_default_timezone_set('Asia/Jakarta');
            $tanggal_mulai = date('d F Y 00:00:00',strtotime($infoppdb->tanggal_mulai_pendaftaran));
            $tanggal_selesai = date('d F Y 23:59:00',strtotime($infoppdb->tanggal_selesai_pendaftaran)); 
            $tanggal_sekarang = date('d F Y H:i:s');
            $mulai = new DateTime($tanggal_mulai);
            $selesai = new DateTime($tanggal_selesai);
            $today = new DateTime($tanggal_sekarang);
          ?> 
          
          <div class="callout callout-info">
            Jadwal PPDB, Pembukaan : <?php echo date('d F Y', strtotime($infoppdb->tanggal_mulai_pendaftaran)) ?> s.d. <?php echo date('d F Y', strtotime($infoppdb->tanggal_selesai_pendaftaran)) ?>, Pengumuman : <?php echo date('d F Y', strtotime($infoppdb->tanggal_pengumuman)) ?>, Daftar Ulang : <?php echo date('d F Y', strtotime($infoppdb->tanggal_mulai_daftar_ulang)) ?> s.d. <?php echo date('d F Y', strtotime($infoppdb->tanggal_selesai_daftar_ulang)) ?>
          </div>

          <?php if ($today < $mulai) { ?>
            <div class="main">
              <h4>PPDB dibuka dalam</h4>
              <div id="clock">
                <div><span id="days"></span><p>Hari</p></div>
                <div><span id="hours"></span><p>Jam</p></div>
                <div><span id="minutes"></span><p>Menit</p></div>
                <div><span id="seconds"></span><p>Detik</p></div>
              </div>
            </div><br>                            
            <?php if (file_exists('assets/dist/img/alur.png')) { ?>
              <img src="<?php echo base_url('assets/dist/img/alur.png') ?>" width="100%">
            <?php } ?>                                         
          <?php } else if ($today > $selesai) { ?>
            <h3 style="text-align: center">Pendaftaran sudah ditutup</h3>
          <?php } else { ?>
            <h3 style="text-align: center">Pendaftaran sudah dibuka</h3>
            <?php if (file_exists('assets/dist/img/alur.png')) { ?>
              <img src="<?php echo base_url('assets/dist/img/alur.png') ?>" width="100%">
            <?php } ?>                                    
          <?php } ?>  
          
          <?php } ?>
        </div>
      </div>
<!-- -------------------- -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Collapsible Accordion</h3> -->
            </div>
            <div class="box-body">
              <div class="box-group" id="accordion">
                <?php 
                $no = 1;
                foreach ($infopublik as $pengumuman) { ?>
                  <div class="panel box box-info">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $no++; ?>">
                          <?= $pengumuman->judul ?>
                        </a>
                      </h4>
                    </div>
                    <?php $id=$no++ - 1; ?>
                    <div id="<?php echo $id; ?>" class="panel-collapse collapse">
                      <div class="box-body">
                        <div>
                          <?= $pengumuman->text ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>        
<!-- -------------------- -->                               
      </div>
    </div>
  </div>
</div>
<?php } ?>  

<script>
  $('#myModalPengumuman').modal('show');
</script>

<script type="text/javascript">
     function animation(span) {
         span.className = "turn";
         setTimeout(function () {
             span.className = ""
         }, 700);
     }
 
     function Countdown() {
   
         setInterval(function () {
 
            var hari    = document.getElementById("days");
            var jam     = document.getElementById("hours");
            var menit   = document.getElementById("minutes");
            var detik   = document.getElementById("seconds");
               
            // var deadline    = new Date("june 29, 2020 00:00:00");
            var deadline    = new Date("<?php echo date('F d, Y 00:00:00', strtotime($infoppdb->tanggal_mulai_pendaftaran)) ?>");  
            var waktu       = new Date();
            var distance    = deadline - waktu;
               
            var days    = Math.floor((distance / (1000*60*60*24)));
            var hours   = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
               
            if (days < 10)
            {
               days = '0' + days;
            }
            if (hours < 10)
            {
               hours = '0' + hours;
            }
            if (minutes < 10)
            {
               minutes = '0' + minutes;
            }
            if (seconds < 10)
            {
               seconds = '0' + seconds;
            }
 
            hari.innerHTML    = days;
            jam.innerHTML     = hours;
            menit.innerHTML   = minutes;
            detik.innerHTML   = seconds;
            //animation
            animation(detik);
            if (seconds == 0) animation(menit);
            if (minutes == 0) animation(jam);
            if (hours == 0) animation(hari);
 
         }, 1000);
     }
 
     Countdown();
 
</script>