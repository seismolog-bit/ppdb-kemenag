<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Prestasi Peserta</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                    <i class="fa fa-refresh"></i></button>
                </div>
            </div>
<style>
  .select2{width:100% !important};
</style>            
            <!-- /.box-header -->
            <div class="box-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="int">Nama Peserta <span style="color:red;">*</span> <?php echo form_error('id_peserta') ?></label>
                    <?php
                    if ($button=="Tambah") { ?>
                    <select type="text" class="select2 form-control" name="id_peserta" id="id_peserta" placeholder="Peserta" value="" required/>
                        <option value="">Pilih Nama Peserta</option>
                        <?php foreach ($peserta as $key => $value) { ?>
                            <option value="<?= $value->id_peserta;?>">
                                <?= $value->nisn;?> | <?= $value->no_pendaftaran;?> | <?= $value->nama_peserta;?>
                            </option>
                        <?php }?>
                    </select>
                    <?php } else if ($button=="Ubah") { ?>  
                        <input type="hidden" class="form-control" name="id_peserta" id="id_peserta" placeholder="Peserta" value="<?php echo $prestasipeserta->id_peserta; ?>" /> 
                        <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" placeholder="Peserta" value="<?php echo $prestasipeserta->nisn; ?> | <?php echo $prestasipeserta->no_pendaftaran; ?> | <?php echo $prestasipeserta->nama_peserta; ?>" readonly/>
                    <?php } ?>                                  
                </div>
        	    <div class="form-group">
                    <label for="varchar">Jenis <span style="color:red;">*</span> <?php echo form_error('jenis') ?></label>
                    <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" required/>
                </div>
        	    <div class="form-group">
                    <label for="varchar">Nama Prestasi <span style="color:red;">*</span> <?php echo form_error('nama_prestasi') ?></label>
                    <input type="text" class="form-control" name="nama_prestasi" id="nama_prestasi" placeholder="Nama Prestasi" value="<?php echo $nama_prestasi; ?>" required/>
                </div>
        	    <div class="form-group">
                    <label for="varchar">Tahun <span style="color:red;">*</span> <?php echo form_error('tahun') ?></label>
                    <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" required/>
                </div>
        	    <div class="form-group">
                    <label for="varchar">Penyelenggara <span style="color:red;">*</span> <?php echo form_error('penyelenggara') ?></label>
                    <input type="text" class="form-control" name="penyelenggara" id="penyelenggara" placeholder="Penyelenggara" value="<?php echo $penyelenggara; ?>" required/>
                </div>
        	    <div class="form-group">
                    <label for="int">Detail Prestasi <span style="color:red;">*</span> <?php echo form_error('id_prestasi') ?></label>
                    <?php
                    if ($button=="Tambah") { ?>                    
                    <select type="text" class="select2 form-control" name="id_prestasi" id="id_prestasi" placeholder="Prestasi" value="" required/>
                        <option value="">Pilih Detail Prestasi</option>
                        <?php foreach ($prestasi as $key => $value) { ?>
                            <option value="<?= $value->id_prestasi;?>">
                                Tingkat <?= $value->tingkat;?> | Kategori <?= $value->kategori;?> | Peringkat <?= $value->juara;?>
                            </option>
                        <?php }?>
                    </select>
                    <?php } else if ($button=="Ubah") { ?>  
                    <select type="text" class="select2 form-control" name="id_prestasi" id="id_prestasi" placeholder="Prestasi" value="<?php echo $prestasipeserta->id_peserta; ?>" />
                        <option value="<?php echo $prestasipeserta->id_prestasi; ?>">Tingkat <?php echo $prestasipeserta->tingkat; ?> | Kategori <?php echo $prestasipeserta->kategori; ?> | Peringkat <?php echo $prestasipeserta->juara; ?>      
                        </option>
                        <?php foreach ($prestasi as $key => $value) { ?>
                            <option value="<?= $value->id_prestasi;?>">
                                Tingkat <?= $value->tingkat;?> | Kategori <?= $value->kategori;?> | Peringkat <?= $value->juara;?>
                            </option>
                        <?php }?>
                    </select>
                    <?php } ?>
                </div>
        	    <input type="hidden" name="id_prestasipeserta" value="<?php echo $id_prestasipeserta; ?>" /> 
        	    <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button>
        	    <a href="<?php echo site_url('prestasipeserta') ?>" class="btn btn-default btn-flat">Batal</a>
	        </form>
            </div>
        </div>
    </div>
</div>