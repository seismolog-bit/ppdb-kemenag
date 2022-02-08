<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Jurusan</h3>
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
                    <label for="varchar">Bidang Keahlian <span style="color:red;">*</span> <?php echo form_error('bidang_keahlian') ?></label>
                    <input type="text" class="form-control" name="bidang_keahlian" id="bidang_keahlian" placeholder="Bidang Keahlian" value="<?php echo $bidang_keahlian; ?>" required/>
                </div>                
        	    <div class="form-group">
                    <label for="varchar">Nama Jurusan <span style="color:red;">*</span> <?php echo form_error('nama_jurusan') ?></label>
                    <input type="text" class="form-control" name="nama_jurusan" id="nama_jurusan" placeholder="Nama Jurusan" value="<?php echo $nama_jurusan; ?>" required/>
                </div>
                <div class="form-group">
                    <label for="varchar">Kuota Jurusan <span style="color:red;">*</span> <?php echo form_error('kuota_jurusan') ?></label>
                    <input type="text" class="form-control" name="kuota_jurusan" id="kuota_jurusan" placeholder="Kuota Jurusan" value="<?php echo $kuota_jurusan; ?>" required/>
                </div>                
        	    <input type="hidden" name="id_jurusan" value="<?php echo $id_jurusan; ?>" /> 
        	    <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button>
        	    <a href="<?php echo site_url('jurusan') ?>" class="btn btn-default btn-flat">Batal</a>
	        </form>
            </div>
        </div>
    </div>
</div>