<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Jurusan</h3>
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
                    <label for="varchar">Bidang <span style="color:red;">*</span> <?php echo form_error('bidang_keahlian') ?></label>
                    <input type="text" class="form-control" name="bidang_keahlian" id="bidang_keahlian" placeholder="Bidang Keahlian" value="<?php echo $bidang_keahlian; ?>" required/>
                </div>
                <div class="form-group">
                    <label for="varchar">Nama Jurusan <span style="color:red;">*</span> <?php echo form_error('nama_jurusan') ?></label>
                    <input type="text" class="form-control" name="nama_jurusan" id="nama_jurusan" placeholder="Nama Jurusan" value="<?php echo $nama_jurusan; ?>" required/>
                </div>
                <div class="form-group">
                    <label for="varchar">kuota Jurusan <span style="color:red;">*</span> <?php echo form_error('kuota_jurusan') ?></label>
                    <input type="text" class="form-control" name="kuota_jurusan" id="kuota_jurusan" placeholder="Kuota Jurusan" value="<?php echo $kuota_jurusan; ?>" required/>
                </div>                
                <input type="hidden" name="id_jurusan" value="<?php echo $id_jurusan; ?>" /> 
                <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button>
                <a href="<?php echo site_url('jurusan') ?>" class="btn btn-default btn-flat">Batal</a>
            </form>
            </div>
        </div>
    </div>  

    <div class="col-xs-12 col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">List Jurusan</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                            <?php echo anchor(site_url('jurusan/create'), '<i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;Tambah</span>', 'class="'.$this->config->item('botton').'"'); ?>
                            -->
                            <!-- hapus                             
                            <button class="btn btn-danger btn-flat" type="submit"><i class="fa fa-trash"></i><span class="hidden-xs">&nbsp;&nbsp;Hapus Data Terpilih</span></button>
                            -->
                        </div>
                        <div class="col-xs-6 col-md-6 text-right">
                            <!-- print                             
                    		<?php echo anchor(site_url('jurusan/printdoc'), '<i class="fa fa-print"></i><span class="hidden-xs">&nbsp;&nbsp;Print</span>', 'class="btn bg-maroon btn-flat"'); ?>
                            -->
                    		<?php echo anchor(site_url('jurusan/excel'), '<i class="fa fa-file-excel"></i><span class="hidden-xs">&nbsp;&nbsp;Excel</span>', 'class="btn btn-success btn-flat"'); ?>
                            <!-- word
                    		<?php echo anchor(site_url('jurusan/word'), '<i class="fa fa-file-word"></i><span class="hidden-xs">&nbsp;&nbsp;Word</span>', 'class="btn btn-primary btn-flat"'); ?>	-->
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                            <thead>
                                <tr>
                                    <th width=""></th>
                                    <th width="10px">No</th>
                                    <th>Bidang</th>
    		                        <th>Nama Jurusan</th>
                                    <th>Kuota</th>
    		                        <th width="80px">Action</th>
                                </tr>
                            </thead>	
                        </table>
                    </div>
                </form>
              <div class="callout callout-info">
                <li>Jurusan umum jangan dirubah</li>
                <li>Jurusan umum digunakan untuk jenjang yang tidak memiliki jurusan</li>
                <li>Kuota jurusan umum diisi sama dengan kuota pada tahun penerimaan aktif</li>
              </div> 
            </div>
        </div>
    </div>
</div>