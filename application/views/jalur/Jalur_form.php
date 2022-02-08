<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Jalur</h3>
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
                    <label for="varchar">Jalur Pendaftaran <span style="color:red;">*</span> <?php echo form_error('jalur') ?></label>
                    <input type="text" class="form-control" name="jalur" id="jalur" placeholder="Jalur" value="<?php echo $jalur; ?>" required/>
                </div>
        	    <div class="form-group">
                    <label for="int">Persentase <span style="color:red;">*</span> <?php echo form_error('persentase') ?></label>
                    <input type="text" class="form-control" name="persentase" id="persentase" placeholder="Persentase" value="<?php echo $persentase; ?>" required/>
                </div>
                <div class="form-group">
                    <label for="enum">Status Jalur <span style="color:red;">*</span></label>
                    <select type="text" class="form-control" name="status_jalur" id="status_jalur" placeholder="Status Jalur" value="" required/>
                        <option value="<?php echo $status_jalur; ?>"><?php echo $status_jalur; ?></option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>                 
        	    <input type="hidden" name="id_jalur" value="<?php echo $id_jalur; ?>" /> 
        	    <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button>
        	    <a href="<?php echo site_url('jalur') ?>" class="btn btn-default btn-flat">Batal</a>
	        </form>
            </div>
        </div>
    </div>
</div>