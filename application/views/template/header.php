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
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- select2 -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/select2/dist/css/select2.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/font-awesome/css/font-awesome.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/fontawesome/css/all.css'); ?>">
  <!-- Smart wizard -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/smart-wizard/css/bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/smart-wizard/css/smart_wizard.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/smart-wizard/css/smart_wizard_theme_dots.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables/dataTables.checkboxes.css'); ?>">  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/AdminLTE.css'); ?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
  <!-- bootstrap daterangpicker -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css'); ?>">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">

  <link rel="stylesheet" href="<?= base_url('assets/plugins/pace/pace.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/jquery-nestable/jquery.nestable.css'); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
  
  <link rel="stylesheet" href="<?= base_url('assets/plugins/alertify/css/alertify.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap-select/css/bootstrap-select.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/tamacms/custom.css'); ?>">
  <!-- jQuery 3 -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/iCheck/square/purple.css'); ?>">
  
  <style type="text/css">
    .pagination>li>a,
    .pagination>li>span {
      padding: 3px 10px !important;
    }
  </style>
</head>

<body class="sidebar-mini hold-transition fixed skin-purple sidebar-collapse"> <!-- open atau collapse -->
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url(); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <center>
          <span class="logo-mini"><?= $this->config->item('sitename_mini') ?></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><strong><?= $this->config->item('sitename') ?></strong></span>
        </center>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <?php
            $user = $this->ion_auth->user()->row();
            ?>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php 
                if (file_exists('assets/uploads/image/user/'.$user->image)) { ?>  
                  <img class="user-image" src="<?php echo base_url('assets/uploads/image/user/'.$user->image) ?>">
                  <span class="hidden-xs"><?= $user->first_name; ?> <?= $user->last_name; ?></span>
                <?php } else { ?>
                  <img class="user-image" src="<?php echo base_url('assets/uploads/image/user/avatar.jpg') ?>">                  
                  <span class="hidden-xs"><?= $user->first_name; ?> <?= $user->last_name; ?></span>
                <?php } ?>  
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <?php 
                    if (file_exists('assets/uploads/image/user/'.$user->image)) { ?>                   
                      <img class="img-circle" src="<?php echo base_url('assets/uploads/image/user/'.$user->image) ?>">    
                      <p>
                        <?= $user->first_name; ?> <?= $user->last_name; ?>
                      </p>
                  <?php } else { ?>
                      <img class="img-circle" src="<?php echo base_url('assets/uploads/image/user/avatar.jpg') ?>">                     
                      <p>
                        <?= $user->first_name; ?> <?= $user->last_name; ?>
                      </p>
                  <?php } ?>  
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= base_url(); ?>profile" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url(); ?>auth/logout" class="btn btn-default btn-flat">Logout</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>

          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <?php 
            if (file_exists('assets/uploads/image/user/'.$user->image)) { ?> 
            <div class="pull-left image">
              <img class="img-circle" src="<?php echo base_url('assets/uploads/image/user/'.$user->image) ?>">
            </div>
            <div class="pull-left info">
              <p><?= $user->first_name; ?> <?= $user->last_name; ?></p>
              <a href="<?= base_url(); ?>profile"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          <?php } else { ?>
            <div class="pull-left image">
              <img class="img-circle" src="<?php echo base_url('assets/uploads/image/user/avatar.jpg') ?>">
            </div>
            <div class="pull-left info">
              <p><?= $user->first_name; ?> <?= $user->last_name; ?></p>
              <a href="<?= base_url(); ?>profile"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          <?php } ?>  
        </div>
        <!-- search form -->
        <form method="get" class="sidebar-form" id="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search" id="search-input">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <ul class="sidebar-menu list" id="menuList">
        </ul>
        <ul class="sidebar-menu list" id="menuSub">
          <?php $menus = $this->layout->get_menu() ?>
          <?php if (is_array($menus)) :
            foreach ($menus as $menu) : ?>
              <li class="header"><?php echo $menu['label'] ?></li>
              <?php if (is_array($menu['children'])) : ?>
                <?php foreach ($menu['children'] as $menu2) : ?>
                  <li <?php echo $menu2['attr'] != '' ? ' id="' . $menu2['attr'] . '" ' : '' ?> <?php echo is_array($menu2['children']) ? ' class="treeview" ' : '' ?>>
                    <?php if (is_array($menu2['children'])) : ?>
                      <a href="<?php echo $menu2['link'] != '#' ? base_url($menu2['link']) : '#' ?>" class="name">
                        <i class="<?php echo $menu2['icon'] ?>"></i> &nbsp;<span><?php echo $menu2['label'] ?></span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                      </a>
                      <ul class="treeview-menu">
                        <?php foreach ($menu2['children'] as $menu3) : ?>
                          <li <?php echo $menu3['attr'] != '' ? ' id="' . $menu3['attr'] . '" ' : '' ?>>
                            <?php if (is_array($menu3['children'])) : ?>
                              <a href="<?php echo $menu3['link'] != '#' ? base_url($menu3['link']) : '#' ?>" class="name">
                                <i class="<?php echo $menu3['icon'] ?>"></i> &nbsp;<span><?php echo $menu3['label'] ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                              </a>
                              <ul class="treeview-menu">
                                <?php foreach ($menu3['children'] as $menu4) : ?>
                                  <li <?php echo $menu4['attr'] != '' ? ' id="' . $menu4['attr'] . '" ' : '' ?>>
                                    <a href="<?php echo $menu4['link'] != '#' ? base_url($menu4['link']) : '#' ?>" class="name">
                                      <i class="<?php echo $menu4['icon'] ?>"></i> &nbsp;<span><?php echo $menu4['label'] ?></span>
                                    </a>
                                  </li>
                                <?php endforeach ?>
                              </ul>
                            <?php else : ?>
                              <a href="<?php echo $menu3['link'] != '#' ? base_url($menu3['link']) : '#' ?>" class="name">
                                <i class="<?php echo $menu3['icon'] ?>"></i> &nbsp;<span><?php echo $menu3['label'] ?></span>
                              </a>
                            <?php endif ?>
                          </li>
                        <?php endforeach ?>
                      </ul>
                    <?php else : ?>
                      <a href="<?php echo $menu2['link'] != '#' ? base_url($menu2['link']) : '#' ?>" class="name">
                        <i class="<?php echo $menu2['icon'] ?>"></i> &nbsp;<span><?php echo $menu2['label'] ?>
                      </a>
                    <?php endif ?>
                  </li>
                <?php endforeach ?>
              <?php endif ?>
            <?php endforeach ?>
          <?php endif ?>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?= $title; ?>
          <small><?= $subtitle; ?></small>
        </h1>
        <?php $this->layout->breadcrumb($crumb) ?>
      </section>

      <!-- Main content -->
      <section class="content">
        <?php $this->load->view($page); ?>
      </section>
    </div>    

<!-- iCheck -->
<script src="<?= base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- <script src="<?= base_url();?>assets/plugins/bootstrap-show-password/bootstrap-show-password.min.js"></script> -->

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-purple',
      radioClass: 'icheckbox_flat-green',
      increaseArea: '20%' /* optional */
    });
  });
</script>