<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Tahun Pelajaran Detail</h3>
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
        	    <tr><td>Tahun Pelajaran</td><td><?php echo $tahun_pelajaran; ?></td></tr>
        	    <tr><td>Kuota</td><td><?php echo $kuota; ?></td></tr>
        	    <tr><td>Tanggal Mulai Pendaftaran</td><td><?php echo date('d F Y', strtotime($tanggal_mulai_pendaftaran)); ?></td></tr>
        	    <tr><td>Tanggal Selesai Pendaftaran</td><td><?php echo date('d F Y', strtotime($tanggal_selesai_pendaftaran)); ?></td></tr>
        	    <tr><td>Tanggal Mulai Seleksi</td><td><?php echo date('d F Y', strtotime($tanggal_mulai_seleksi)); ?></td></tr>
        	    <tr><td>Tanggal Selesai Seleksi</td><td><?php echo date('d F Y', strtotime($tanggal_selesai_seleksi)); ?></td></tr>
        	    <tr><td>Tanggal Pengumuman</td><td><?php echo date('d F Y', strtotime($tanggal_pengumuman)); ?></td></tr>
        	    <tr><td>Tanggal Mulai Daftar Ulang</td><td><?php echo date('d F Y', strtotime($tanggal_mulai_daftar_ulang)); ?></td></tr>
        	    <tr><td>Tanggal Selesai Daftar Ulang</td><td><?php echo date('d F Y', strtotime($tanggal_selesai_daftar_ulang)); ?></td></tr>
        	    <tr><td>Status Tahun</td>
                    <td>
                        <?php if ($status_tahun=="Aktif"){?>
                            <span class="label label-success"><?php echo $status_tahun; ?></span>
                        <?php } else if ($status_tahun=="Tidak Aktif") {?>
                            <span class="label label-danger"><?php echo $status_tahun; ?></span>
                        <?php } ?>                          
                    </td>
                </tr>
        	    <tr><td><a href="<?php echo site_url('tahunpelajaran') ?>" class="<?= $this->config->item('botton')?>">Kembali</a></td></tr>
    	    </table>
            </div>
        </div>
    </div>
</div>