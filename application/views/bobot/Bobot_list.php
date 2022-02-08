<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Bobot</h3>
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
                    <select type="text" class="form-control" name="id_jalur" id="id_jalur" placeholder="Jalur" value="" required/>
                        <option value="">Pilih Jalur</option>
                        <!-- <option value="<?= $value->id_jalur;?>"><?= $value->jalur;?></option> -->
                        <?php foreach ($jalur as $key => $value) { ?>
                            <option value="<?= $value->id_jalur;?>">
                                <?= $value->jalur;?>
                            </option>
                        <?php }?>
                    </select>
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

    <div class="col-xs-12  col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">List Bobot</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                    <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <div class="box-body">
                <form id="myform" method="post" onsubmit="return false">
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-xs-6 col-md-6">
                            <!-- tambah 
                            <?php echo anchor(site_url('bobot/create'), '<i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;Tambah</span>', 'class="'.$this->config->item('botton').'"'); ?>
                            -->
                            <!-- hapus
                            <button class="btn btn-danger btn-flat" type="submit"><i class="fa fa-trash"></i><span class="hidden-xs">&nbsp;&nbsp;Hapus Data Terpilih</span></button>
                            -->
                        </div>
                        <div class="col-xs-6 col-md-6 text-right">
                    		<!-- print
                            <?php echo anchor(site_url('bobot/printdoc'), '<i class="fa fa-print"></i><span class="hidden-xs">&nbsp;&nbsp;Print</span>', 'class="btn bg-maroon btn-flat"'); ?>
                            -->
                    		<?php echo anchor(site_url('bobot/excel'), '<i class="fa fa-file-excel"></i><span class="hidden-xs">&nbsp;&nbsp;Excel</span>', 'class="btn btn-success btn-flat"'); ?>
                            <!-- word 
                    		<?php echo anchor(site_url('bobot/word'), '<i class="fa fa-file-word"></i><span class="hidden-xs">&nbsp;&nbsp;Word</span>', 'class="btn btn-primary btn-flat"'); ?>
                            -->
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                            <thead>
                                <tr>
                                    <th width=""></th>
                                    <th width="10px">No</th>
                        		    <th>Jalur Pendaftaran</th>
                        		    <th>Bobot Jarak</th>
                        		    <th>Bobot Nilai</th>
                        		    <th>Bobot Prestasi</th>		
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