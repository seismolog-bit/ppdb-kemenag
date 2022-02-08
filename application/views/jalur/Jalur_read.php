<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Jalur Detail</h3>
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
                <table class="table">
            	    <tr><td>Jalur Pendaftaran</td><td><?php echo $jalur; ?></td></tr>
            	    <tr><td>Persentase</td><td><?php echo $persentase; ?></td></tr>
                    <tr><td>Status</td><td><?php echo $status_jalur; ?></td></tr>
            	    <tr><td><a href="<?php echo site_url('jalur') ?>" class="<?= $this->config->item('botton')?>">Kembali</a></td></tr>
        	    </table>
            </div>
        </div>
    </div>
</div>