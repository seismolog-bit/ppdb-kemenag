<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tambah Jarak</h3>
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
                    <label for="varchar">Jarak ke sekolah <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="jarak" id="jarak" placeholder="Jarak" value="<?php echo $jarak; ?>" required/>
                </div>
                <div class="form-group">
                    <label for="int">Poin Jarak <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="skor_jarak" id="skor_jarak" placeholder="Poin Jarak" value="<?php echo $skor_jarak; ?>" required/>
                </div>
                <input type="hidden" name="id_jarak" value="<?php echo $id_jarak; ?>" /> 
                <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button>
                <a href="<?php echo site_url('jarak') ?>" class="btn btn-default btn-flat">Batal</a>
            </form>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">List Jarak</h3>
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
                            <?php echo anchor(site_url('jarak/create'), '<i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;Tambah</span>', 'class="'.$this->config->item('botton').'"'); ?>
                            -->
                            <button class="btn btn-danger btn-flat" type="submit"><i class="fa fa-trash"></i><span class="hidden-xs">&nbsp;&nbsp;Hapus Data Terpilih</span></button>
                        </div>
                        <div class="col-xs-6 col-md-6 text-right">
                            <!-- print 
                    		<?php echo anchor(site_url('jarak/printdoc'), '<i class="fa fa-print"></i><span class="hidden-xs">&nbsp;&nbsp;Print</span>', 'class="btn bg-maroon btn-flat"'); ?>
                            -->
                    		<?php echo anchor(site_url('jarak/excel'), '<i class="fa fa-file-excel"></i><span class="hidden-xs">&nbsp;&nbsp;Excel</span>', 'class="btn btn-success btn-flat"'); ?>
                            <!-- word 
                    		<?php echo anchor(site_url('jarak/word'), '<i class="fa fa-file-word"></i><span class="hidden-xs">&nbsp;&nbsp;Word</span>', 'class="btn btn-primary btn-flat"'); ?>	
                            -->
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                            <thead>
                                <tr>
                                    <th width=""></th>
                                    <th width="10px">No</th>
                        		    <th>Jarak ke sekolah</th>
                        		    <th>Poin Jarak</th>		
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