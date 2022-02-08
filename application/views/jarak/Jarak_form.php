<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Jarak</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                    <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="<?php echo $action; ?>" method="post">
        	    <div class="form-group">
                    <label for="varchar">Jarak ke sekolah <span style="color:red;">*</span> <?php echo form_error('jarak') ?></label>
                    <?php
                    if ($button=="Tambah") { ?>
                        <input type="text" class="form-control" name="jarak" id="jarak" placeholder="Jarak" value="<?php echo $jarak; ?>" />
                    <?php } else if ($button=="Ubah") { ?>
                        <input type="text" class="form-control" name="jarak" id="jarak" placeholder="Jarak" value="<?php echo $jarak; ?>" readonly/>
                    <?php } ?>
                </div>
        	    <div class="form-group">
                    <label for="int">Poin Jarak <span style="color:red;">*</span> <?php echo form_error('skor_jarak') ?></label>
                    <input type="text" class="form-control" name="skor_jarak" id="skor_jarak" placeholder="Poin Jarak" value="<?php echo $skor_jarak; ?>" required/>
                </div>
        	    <input type="hidden" name="id_jarak" value="<?php echo $id_jarak; ?>" /> 
        	    <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button>
        	    <a href="<?php echo site_url('jarak') ?>" class="btn btn-default btn-flat">Batal</a>
	        </form>
            </div>
        </div>
    </div>
</div>