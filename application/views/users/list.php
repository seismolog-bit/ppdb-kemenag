<style type="text/css">
	.table>thead>tr>td, .table>tbody>tr>td{
		padding-left: 8px;
	}
</style>
<div class="row">
<div class="col-xs-12">
    <div class="box box-primary">
      	<div class="box-header">
	        <h3 class="box-title">List Users</h3>
	        <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	            <i class="fa fa-minus"></i></button>
	            <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
	            <i class="fa fa-refresh"></i></button>
	        </div>
      	</div>

      	<div class="box-body">
        <form id="myform1" method="post" onsubmit="return false">
        	<div class="row" style="margin-bottom: 10px">
	            <div class="col-xs-12 col-md-12">	
					<?php echo anchor('auth/create_user', '<i class="fa fa-plus"></i> &nbsp;'.lang('index_create_user_link'), 'class="'.$this->config->item('botton').'"'  )?>
                    <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#myModalHapus">
                    <i class="fas fa-trash"></i><span class="hidden-xs">&nbsp; Hapus User Member</span>
                    </button>
	            </div>
        	</div>
        	<div class="table-responsive">
	        <table cellpadding="0" cellspacing="10" id="listuser" class="table table-bordered table-striped">
				<thead>
					<tr>
						<!-- <th width=""><input type="checkbox" id="check-all"></th> -->
						<th width="10px">No</th>
						<th><?php echo lang('index_fname_th');?></th>
						<th><?php echo lang('index_lname_th');?></th>
						<th><?php echo lang('index_email_th');?></th>
						<th nowrap="nowrap"><?php echo lang('index_groups_th');?></th>
						<th><?php echo lang('index_status_th');?></th>
						<th width="80px"><?php echo lang('index_action_th');?></th>
					</tr>
				</thead>
				<tbody>
					
				<?php 
				$no = 1;
				foreach ($users as $user):?>
					<tr>
						<!-- <td><input type="checkbox" class="check-item" name="id[]" value="<?php echo $user->id; ?>"></td> -->
						<td><?php echo $no++;?></td>
			            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
			            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
			            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			            <td nowrap="nowrap">
							<?php $myArray = array();?>
							<?php foreach ($user->groups as $group):?>
								<?php $myArray[] = htmlspecialchars($group->name,ENT_QUOTES,'UTF-8') ;?>
			                <?php endforeach?>
								<?= implode( ', ', $myArray );?>
						</td>
						<!-- link edit group
			            <td nowrap="nowrap">
							<?php $myArray = array();?>
							<?php foreach ($user->groups as $group):?>
								<?php $myArray[] = anchor("groups/update/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?>
			                <?php endforeach?>
								<?= implode( ', ', $myArray );?>
						</td>
						-->
						<td class="text-center"><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link'), 'class="btn btn-success btn-flat btn-xs"') : anchor("auth/activate/". $user->id, lang('index_inactive_link'), 'class="btn btn-danger btn-flat btn-xs"');?></td>
						<td class="text-center"><?php echo anchor("auth/edit_user/".$user->id, '<i class="fa fa-user-edit"></i>', 'class="btn btn-warning btn-flat btn-xs" data-toogle="tooltip" title="Edit User"') ;
						echo " ";
						echo anchor('users/delete/'.$user->id, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'users/delete/'.$user->id.'\')" data-toggle="tooltip" title="Delete"');?></td>
					</tr>
				<?php endforeach;?>
				</tbody>
			</table>
         	</div>      	
        </form>
        </div>
    </div>
  </div>
</div>

<!-- Modal Hapus Member -->
<div class="modal fade" id="myModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fas fa-user"></i>&nbsp; Hapus User Member</h4>
      </div>
      <div class="modal-body">
        <form id="myform" method="post" onsubmit="return false">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-xs-6 col-md-6">
                    <button class="btn btn-danger btn-flat" type="submit"><i class="fa fa-trash"></i><span class="hidden-xs">&nbsp;&nbsp;Hapus Data Terpilih</span></button>
					<?php echo anchor(site_url('users/delete_all'), '<i class="fa fa-trash"></i><span class="hidden-xs">&nbsp;&nbsp;Hapus semua</span>', 'class="btn btn-success btn-flat"'); ?>                    
                </div>              
                <!-- <div class="col-xs-6 col-md-6 text-right">
                    <?php echo anchor(site_url('users/printdoc'), '<i class="fas fa-print"></i><span class="hidden-xs">&nbsp;&nbsp;Print</span>', 'class="btn bg-maroon btn-flat"'); ?>
                </div> -->
            </div>
            <div class="table-responsive">
            <table class="table table-bordered table-striped" id="mytable1" style="width:100%">
                <thead>
                    <tr>
                        <th width=""></th>
                        <th width="10px">No</th>
            		    <!-- <th>IP Address</th> -->
            		    <th>Nama</th>
            		    <!-- <th>Nama Belakang</th> -->
            		    <th>Username</th>
            		    <!-- <th>Password</th> -->
            		    <!-- <th>Salt</th> -->
            		    <th>Email</th>
            		    <!-- <th>Activation Code</th> -->
            		    <!-- <th>Forgotten Password Code</th> -->
            		    <!-- <th>Forgotten Password Time</th> -->
            		    <!-- <th>Remember Code</th> -->
            		    <!-- <th>Created On</th> -->
            		    <!-- <th>Last Login</th> -->
            		    <!-- <th>Active</th> -->
            		    <!-- <th>Company</th> -->
            		    <!-- <th>Phone</th> -->
                        <th width="80px">Action</th>
                    </tr>
                </thead>
            </table>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>