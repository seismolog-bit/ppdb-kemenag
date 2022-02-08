<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Bobot</h3>
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
                    <label for="int">Jalur Pendaftaran <span style="color:red;">*</span> <?php echo form_error('id_jalur') ?></label>
                    <?php
                    if ($button=="Tambah") { ?>
                    <select type="text" class="form-control" name="id_jalur" id="id_jalur" placeholder="Jalur" value="" />
                        <option value="">Pilih Jalur</option>
                        <?php foreach ($jalur as $key => $value) { ?>
                            <option value="<?= $value->id_jalur;?>">
                                <?= $value->jalur;?>
                            </option>
                        <?php }?>
                    </select>
                    <?php } else if ($button=="Ubah") { ?>
                        <input type="text" class="form-control" name="id_jalur" id="id_jalur" placeholder="Jalur" value="<?php echo $jalur; ?>" readonly/>
                    <?php } ?>                    
                </div>
        	    <div class="form-group">
                    <label for="int">Bobot Jarak <span style="color:red;">*</span> <?php echo form_error('bobot_jarak') ?></label>
                    <input type="text" class="form-control" name="bobot_jarak" id="bobot_jarak" placeholder="Bobot Jarak" value="<?php echo $bobot_jarak; ?>" required/>
                </div>
        	    <div class="form-group">
                    <label for="int">Bobot Nilai <span style="color:red;">*</span> <?php echo form_error('bobot_nilai') ?></label>
                    <input type="text" class="form-control" name="bobot_nilai" id="bobot_nilai" placeholder="Bobot Nilai" value="<?php echo $bobot_nilai; ?>" required/>
                </div>
        	    <div class="form-group">
                    <label for="int">Bobot Prestasi <span style="color:red;">*</span> <?php echo form_error('bobot_prestasi') ?></label>
                    <input type="text" class="form-control" name="bobot_prestasi" id="bobot_prestasi" placeholder="Bobot Prestasi" value="<?php echo $bobot_prestasi; ?>" required/>
                </div>
        	    <input type="hidden" name="id_bobot" value="<?php echo $id_bobot; ?>" /> 
        	    <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button>
        	    <a href="<?php echo site_url('bobot') ?>" class="btn btn-default btn-flat">Batal</a>
            </form>
            </div>
        </div>
    </div>
</div>