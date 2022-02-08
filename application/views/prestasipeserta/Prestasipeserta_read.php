<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Prestasi Peserta Detail</h3>
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
            	    <tr><td>No Pendaftaran</td><td><span class="label label-success"><?php echo $no_pendaftaran; ?></span></td></tr>
                    <tr><td>Nama Peserta</td><td><?php echo $nama_peserta; ?></td></tr>
                    <tr><td>Jenis</td><td><?php echo $jenis; ?></td></tr>
            	    <tr><td>Nama Prestasi</td><td><?php echo $nama_prestasi; ?></td></tr>
            	    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
            	    <tr><td>Penyelenggara</td><td><?php echo $penyelenggara; ?></td></tr>
            	    <tr><td>Tingkat</td><td><?php echo $tingkat; ?></td></tr>
            	    <tr><td>Kategori</td><td><?php echo $kategori; ?></td></tr>
                    <tr><td>Peringkat</td><td><?php echo $juara; ?></td></tr>
                    <tr><td>Poin Prestasi</td><td><?php echo $skor_prestasi; ?></td></tr>                    
            	    <tr><td><a href="<?php echo site_url('prestasipeserta') ?>" class="<?= $this->config->item('botton')?>">Kembali</a></td></tr>
            	</table>
            </div>
        </div>
    </div>
</div>