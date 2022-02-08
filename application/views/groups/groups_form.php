<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Groups</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                     <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                    <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="<?php echo $action; ?>" method="post">
        	    <div class="form-group">
                    <label for="varchar">Name <span style="color:red;">*</span> <?php echo form_error('name') ?></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" required/>
                </div>
        	    <div class="form-group">
                    <label for="varchar">Description <span style="color:red;">*</span> <?php echo form_error('description') ?></label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" required/>
                </div>
        	    <input type="hidden" name="id" value="<?php echo $id; ?>" />
        	    <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button>
        	    <a href="<?php echo site_url('groups') ?>" class="btn btn-default btn-flat">Batal</a>
	       </form>
            </div>
        </div>
    </div>
</div>