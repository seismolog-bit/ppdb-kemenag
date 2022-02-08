<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Prestasi</h3>
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
                    <label for="varchar">Tingkat <span style="color:red;">*</span> <?php echo form_error('tingkat') ?></label>
                    <select type="text" class="form-control" name="tingkat" id="tingkat" placeholder="Tingkat" value="" required/>
                        <option value="<?php echo $tingkat; ?>"><?php echo $tingkat; ?></option>
                        <option value="Sekolah">Sekolah</option>
                        <option value="Kecamatan">Kecamatan</option>
                        <option value="Kabupaten">Kabupaten</option>
                        <option value="Propinsi">Propinsi</option>
                        <option value="Nasional">Nasional</option>
                        <option value="Internasional">Internasional</option>
                        <option value="Hafiz Al Quran">Hafiz Al Quran</option>
                    </select>                    
                </div>
        	    <div class="form-group">
                    <label for="varchar">Kategori <span style="color:red;">*</span> <?php echo form_error('kategori') ?></label>
                    <select type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori" value="" required/>
                        <option value="<?php echo $kategori; ?>"><?php echo $kategori; ?></option>
                        <option value="Perorangan">Perorangan</option>
                        <option value="Beregu">Beregu</option>
                    </select>   
                </div>
        	    <div class="form-group">
                    <label for="varchar">Peringkat <span style="color:red;">*</span> <?php echo form_error('juara') ?></label>
                    <select type="text" class="form-control" name="juara" id="juara" placeholder="Peringkat" value="" required/>
                        <option value="<?php echo $juara; ?>"><?php echo $juara; ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>  
                </div>
        	    <div class="form-group">
                    <label for="int">Poin Prestasi <span style="color:red;">*</span> <?php echo form_error('skor_prestasi') ?></label>
                    <input type="text" class="form-control" name="skor_prestasi" id="skor_prestasi" placeholder="Poin Prestasi" value="<?php echo $skor_prestasi; ?>" required/>
                </div>
        	    <input type="hidden" name="id_prestasi" value="<?php echo $id_prestasi; ?>" /> 
        	    <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button> 
        	    <a href="<?php echo site_url('prestasi') ?>" class="btn btn-default btn-flat">Batal</a>
	        </form>
            </div>
        </div>
    </div>
</div>