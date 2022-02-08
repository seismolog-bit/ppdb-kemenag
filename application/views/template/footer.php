  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <img src="<?php echo base_url('assets/dist/img/nenemoblack.png') ?>" width="55px" height="25px">
      <strong>Version <?= $this->config->item('version')?> <?= $this->config->item('codename')?></strong>
    </div>
    <strong>Copyright &copy; <?= $this->config->item('tahun')?> <a href="" data-toggle="modal" data-target="#myModalDev"><?= $this->config->item('copyright')?></a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

  <script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
  <script src="<?= base_url('assets/bower_components/PACE/pace.min.js');?>"></script>

  <!-- SlimScroll -->
  <script src="<?= base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
  <!-- FastClick -->
  <script src="<?= base_url('assets/bower_components/fastclick/lib/fastclick.js');?>"></script>
  <script src="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
  <script src="<?= base_url('assets/plugins/iCheck/icheck.min.js');?>"></script>


  <!-- AdminLTE App -->
  <!-- DataTables -->
  <script src="<?= base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
  <script src="<?= base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
  <script src="<?= base_url('assets/bower_components/datatables/dataTables.checkboxes.js');?>"></script>
  <script src="<?= base_url('assets/dist/js/adminlte.min.js');?>"></script>
  <script src="<?= base_url('assets/plugins/jquery-nestable/jquery.nestable.js');?>"></script>
  <script src="<?= base_url('assets/plugins/alertify/alertify.js');?>"></script>
  <script src="<?= base_url('assets/plugins/bootstrap-show-password/bootstrap-show-password.min.js');?>"></script>

  <!-- Select2 -->
  <script src="<?= base_url('assets/bower_components/bootstrap-select/js/bootstrap-select.js');?>"></script>
  <!-- menu funct -->
  <script src="<?= base_url('assets/dist/js/menu.js');?>"></script>
  <script type="text/javascript">
      // To make Pace works on Ajax calls
    $(document).ajaxStart(function () {
      Pace.restart()
    });
    <?php
      if(isset($this->session->message)){ ?>
        alertify.set('notifier','position', 'top-right');
        alertify.success('<a style="color:white"><?= $this->session->message;?></a>');

    <?php } ?>
  </script>
  <?php (isset($code_js)?$this->load->view($code_js):""); ?>
</body>
</html>

<!-- Modal Dev -->
<div class="modal fade" id="myModalDev" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header <?= $this->config->item('header')?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fas fa-user-secret"></i>&nbsp; <?= $this->config->item('copyright')?></h4>
      </div>
      <div class="modal-body">
        <div class="row">            
          <div class="col-md-12">
            <div class="box box-widget widget-user-2">
              <div class="widget-user-header bg-yellow">
                <div class="widget-user-image">
                  <?php if (file_exists('assets/dist/img/dev/dev.jpg')) { ?>
                    <img class="img-circle" src="<?php echo base_url('assets/dist/img/dev/dev.jpg') ?>">
                  <?php } else { ?> 
                    <img class="img-circle" src="<?php echo base_url('assets/dist/img/black.png') ?>">
                  <?php } ?>  
                </div>
                <h3 class="widget-user-username"><?= $this->config->item('developer')?></h3>
                <h5 class="widget-user-desc">Developer</h5>
              </div>
              <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                  <li><a href="#">Email <span class="pull-right badge bg-blue"><?= $this->config->item('email')?></span></a></li>
                  <li><a href="#">Contact <span class="pull-right badge bg-aqua"><?= $this->config->item('contact')?></span></a></li>
                  <li><a href="#">Workplace <span class="pull-right badge bg-red"><?= $this->config->item('workplace')?></span></a></li>
                  <li><a href="#">Project Name <span class="pull-right badge bg-green"><?= $this->config->item('project')?></span></a></li>
                  <li><a href="#">Version <span class="pull-right badge bg-maroon"><?= $this->config->item('version')?></span></a></li>
                  <li><a href="#">Code Name <span class="pull-right badge bg-purple"><?= $this->config->item('codename')?></span></a></li>
                  <li><a href="#">License <span class="pull-right badge bg-yellow"><?= $this->config->item('license')?></span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>     
      </div>
      <div class="modal-footer <?= $this->config->item('header')?>">

      </div>      
    </div>
  </div>
</div>
<!-- end Modal Dev -->