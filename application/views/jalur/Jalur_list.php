<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Jalur Pendaftaran</h3>
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
                    <label for="varchar">Jalur Pendaftaran <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="jalur" id="jalur" placeholder="Jalur Pendaftaran" value="<?php echo $jalur; ?>" required/>
                </div>
                <div class="form-group">
                    <label for="int">Persentase <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="persentase" id="persentase" placeholder="Persentase" value="<?php echo $persentase; ?>" required/>
                </div>
                <div class="form-group">
                    <label for="enum">Status Jalur <span style="color:red;">*</span></label>
                    <select type="text" class="form-control" name="status_jalur" id="status_jalur" placeholder="Status Jalur" value="" required/>
                        <option value="">Pilih Status Jalur</option>
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

    <div class="col-xs-12 col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">List Jalur Pendaftaran</h3>
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
                            <?php echo anchor(site_url('jalur/create'), '<i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;Tambah</span>', 'class="'.$this->config->item('botton').'"'); ?>
                            -->
                            <!-- hapus
                            <button class="btn btn-danger btn-flat" type="submit"><i class="fa fa-trash"></i><span class="hidden-xs">&nbsp;&nbsp;Hapus Data Terpilih</span></button>
                            -->
                        </div>
                        <div class="col-xs-6 col-md-6 text-right">
                            <!-- 
                    		<?php echo anchor(site_url('jalur/printdoc'), '<i class="fa fa-print"></i><span class="hidden-xs">&nbsp;&nbsp;Print</span>', 'class="btn bg-maroon btn-flat"'); ?>
                            -->
                    		<?php echo anchor(site_url('jalur/excel'), '<i class="fa fa-file-excel"></i><span class="hidden-xs">&nbsp;&nbsp;Excel</span>', 'class="btn btn-success btn-flat"'); ?>
                            <!-- 
                    		<?php echo anchor(site_url('jalur/word'), '<i class="fa fa-file-word"></i><span class="hidden-xs">&nbsp;&nbsp;Word</span>', 'class="btn btn-primary btn-flat"'); ?>
                            -->
    	               </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                            <thead>
                                <tr>
                                    <th width=""></th>
                                    <th width="10px">No</th>
                                    <!-- <th>ID Jalur</th> -->
                        		    <th>Jalur Pendafataran</th>
                        		    <th>Persentase</th>
                                    <th>Status</th>		
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