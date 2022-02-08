<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Sekolah</h3>
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
                    <label for="varchar">NPSN Sekolah <span style="color:red;">*</span> <?php echo form_error('npsn_sekolah') ?></label>
                    <?php
                    if ($button=="Tambah") { ?>                    
                        <input type="text" class="form-control" name="npsn_sekolah" id="npsn_sekolah" placeholder="NPSN Sekolah" value="<?php echo $npsn_sekolah; ?>" />
                    <?php } else if ($button=="Ubah") { ?>                    
                        <input type="text" class="form-control" name="npsn_sekolah" id="npsn_sekolah" placeholder="NPSN Sekolah" value="<?php echo $npsn_sekolah; ?>" readonly/>
                    <?php } ?>                    
                </div>
        	    <div class="form-group">
                    <label for="varchar">Nama Asal Sekolah <span style="color:red;">*</span> <?php echo form_error('asal_sekolah') ?></label>
                    <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" placeholder="Nama Asal Sekolah" value="<?php echo $asal_sekolah; ?>" required/>
                </div>
        	    <div class="form-group">
                    <label for="varchar">Alamat Sekolah <?php echo form_error('alamat_sekolah') ?></label>
                    <input type="text" class="form-control" name="alamat_sekolah" id="alamat_sekolah" placeholder="Alamat Sekolah" value="<?php echo $alamat_sekolah; ?>" />
                </div>
        	    <div class="form-group">
                    <label for="varchar">Kelurahan <?php echo form_error('kelurahan') ?></label>
                    <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Status Sekolah <span style="color:red;">*</span> <?php echo form_error('status_sekolah') ?></label>
                    <select type="text" class="form-control" name="status_sekolah" id="status_sekolah" placeholder="Status Sekolah" value="" required/>
                        <option value="<?php echo $status_sekolah; ?>"><?php echo $status_sekolah; ?></option>
                        <option value="NEGERI">NEGERI</option>
                        <option value="SWASTA">SWASTA</option>
                    </select>
                </div>                
        	    <div class="form-group">
                    <label for="varchar">Kecamatan <span style="color:red;">*</span> <?php echo form_error('kecamatan') ?></label>
                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" required/>
                </div>
        	    <input type="hidden" name="id_sekolah" value="<?php echo $id_sekolah; ?>" /> 
        	    <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button>
        	    <a href="<?php echo site_url('sekolah') ?>" class="btn btn-default btn-flat">Batal</a>
	        </form>
            </div>
        </div>
    </div>
</div>