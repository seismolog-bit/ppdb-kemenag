<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Pengumuman</h3>
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
                    <label for="varchar">Type <?php echo form_error('type') ?></label>
                <?php if ($button=="Tambah") { ?>     
                    <select type="text" class="form-control" name="type" id="type" placeholder="Type" value="" required/>
                        <option value="">Pilih Type</option>
                        <option value="Member">Member</option>
                        <option value="Publik">Publik</option>
                        <option value="Formulir">Formulir</option>
                        <option value="SKL">SKL</option>
                    </select>   
                <?php } else { ?>
                    <select type="text" class="form-control" name="type" id="type" placeholder="Type" value="" />   
                        <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
                        <option value="Member">Member</option>
                        <option value="Publik">Publik</option>
                        <option value="Formulir">Formulir</option>
                        <option value="SKL">SKL</option>                        
                    </select>                     
                <?php } ?>                      
                </div>
        	    <div class="form-group">
                    <label for="varchar">Judul <?php echo form_error('judul') ?></label>
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" required/>
                </div>
        	    <div class="form-group">
                    <label for="longtext">Informasi Pengumuman <?php echo form_error('text') ?></label>
                    <textarea id="text" name="text" style="height: 180px;"><?php echo $text; ?></textarea>
                </div>          
        	    <input type="hidden" name="id_pengumuman" value="<?php echo $id_pengumuman; ?>" /> 
        	    <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button>
        	    <a href="<?php echo site_url('pengumuman') ?>" class="btn btn-default btn-flat">Batal</a>
            </form>
            </div>
        </div>
    </div>
</div>