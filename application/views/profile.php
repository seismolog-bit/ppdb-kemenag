<?php
  $user = $this->ion_auth->user()->row();
?>

<!-- Default box -->
<div class="row">
  <div class="col-md-4 col-xs-12">
    <!-- Profile Image -->
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url(<?php echo base_url('assets/dist/img/'.$pengaturan->bglogin) ?>) center;">
            </div>            
            <div class="widget-user-image">
            <?php 
              if (file_exists('assets/uploads/image/user/'.$user->image)) { ?>               
                <img class="img-circle" src="<?php echo base_url('assets/uploads/image/user/'.$user->image) ?>">
            <?php } else { ?>
                <img class="img-circle" src="<?php echo base_url('assets/uploads/image/user/avatar.jpg') ?>">
            <?php } ?>                
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12">
                  <div class="description-block">
                    <h5 class="description-header"><?= $user->first_name; ?> <?= $user->last_name; ?></h5>
                    <span><?= $user->company; ?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-sm-12">
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Username</b> <a class="pull-right"><?= $user->username; ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="pull-right"><?= $user->email; ?></a>
                    </li>
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                <div class="col-sm-12">
                  <!-- upload foto -->
                  <?php echo form_open_multipart("auth/uploadimage");?>
                      <div class="form-group">
                        <label>Image input</label>
                        <input type="file" id="image" name="image" class="form-control">
                        <input type="hidden" id="old_image" name="old_image" value="<?= $user->image; ?>">
                        <p class="help-block">format image (*.jpg) dengan ukuran max 100 kb.</p>
                      </div>
                      <div>
                        <input type="hidden" class="form-control" id="username" name="username" value="<?= $user->username; ?>">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $user->id; ?>">
                        <input type="hidden" class="form-control" id="images" name="images" value="<?= $user->image; ?>">
                        <p><?php echo form_submit('submit', 'Upload Image', 'class="'.$this->config->item('botton').' btn-block clearfix" style="clear:both"');?></p>
                      </div>
                  <?php echo form_close();?>
                  <!-- end upload -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
  </div>
  <!--  box edit-->
  <div class="col-md-8 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo lang('edit_user_heading');?></h3>
      </div>
        <!-- /.box-header -->
        <!-- form start -->          
        <div class="box-body">

          <?php
            if(validation_errors() != ""){
          ?>      
            <div id="infoMessage" class="callout callout-danger"><?php echo validation_errors();?></div>
          <?php } ?>  

          <?php echo form_open_multipart("auth/edit_profile");?>
            <div class="form-group">
              <label><?php echo lang('edit_user_fname_label') ?> <span style="color:red;">*</span></label>
              <input type="text" class="form-control" id="first_name" name="first_name" placeholder="<?php echo lang('edit_user_fname_label') ?>" value="<?= $user->first_name; ?>">
            </div> 
            <div class="form-group">
              <label><?php echo lang('edit_user_lname_label') ?></label>
              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="<?php echo lang('edit_user_lname_label') ?>" value="<?= $user->last_name; ?>">
            </div>          
            <div class="form-group">
              <label><?php echo lang('edit_user_company_label') ?></label>
              <input type="text" class="form-control" id="company" name="company" placeholder="<?php echo lang('edit_user_company_label') ?>" value="<?= $user->company; ?>">
            </div>
            <div class="form-group">
              <label><?php echo lang('edit_user_phone_label') ?></label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo lang('edit_user_phone_label') ?>" value="<?= $user->phone; ?>">
            </div>
            <div class="form-group">
              <label><?php echo lang('edit_user_password_label') ?></label>
              <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo lang('edit_user_password_label') ?>" >
            </div>
            <div class="form-group">
              <label><?php echo lang('edit_user_password_confirm_label') ?></label>
              <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="<?php echo lang('edit_user_password_confirm_label') ?>" >
            </div>
            <!--
            <?php echo form_hidden('id', $user->id);?>
            <?php echo form_hidden($csrf); ?>
            -->
            <div>
              <input type="hidden" class="form-control" id="username" name="username" value="<?= $user->username; ?>">
              <input type="hidden" class="form-control" id="id" name="id" value="<?= $user->id; ?>">
              <input type="hidden" class="form-control" id="images" name="images" value="<?= $user->image; ?>">
              <p><?php echo form_submit('submit', lang('edit_user_submit_btn'), 'class="'.$this->config->item('botton').' clearfix" style="clear:both"');?></p>
            </div>
          <?php echo form_close();?>
        </div>
        <!-- /.box-body -->
    </div>
  </div>
  <!--  / box edit-->
</div>