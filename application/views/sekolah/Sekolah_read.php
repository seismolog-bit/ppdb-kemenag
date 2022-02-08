<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Sekolah Detail</h3>
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
                    <tr><td>NPSN Sekolah</td><td><?php echo $npsn_sekolah; ?></td></tr>
                    <tr><td>Nama Asal Sekolah</td><td><?php echo $asal_sekolah; ?></td></tr>
                    <tr><td>Alamat Sekolah</td><td><?php echo $alamat_sekolah; ?></td></tr>
                    <tr><td>Kelurahan</td><td><?php echo $kelurahan; ?></td></tr>
                    <tr><td>Status Sekolah</td><td><?php echo $status_sekolah; ?></td></tr>
                    <tr><td>Kecamatan</td><td><?php echo $kecamatan; ?></td></tr>
                    <tr><td><a href="<?php echo site_url('sekolah') ?>" class="<?= $this->config->item('botton')?>">Kembali</a></td></tr>
               </table>
            </div>
        </div>
    </div>
</div>