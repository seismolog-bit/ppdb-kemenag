<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Berkas View</h3>
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
                <div class="col-xs-12 col-md-6">    
                    <table class="table">
                        <tr><td>Nama Peserta</td><td><?php echo $nama_peserta; ?></td></tr>
                	    <tr><td>Nama Berkas</td><td><?php echo $nama_berkas; ?></td></tr>
                	    <tr><td>Keterangan</td><td><?php echo $keterangan_berkas; ?></td></tr>
                	    <tr><td>Tipe</td><td><?php echo $tipe_berkas; ?></td></tr>
                	    <tr><td>Ukuran</td><td><?php echo $ukuran_berkas; ?></td></tr>
                	    <tr><td><a href="<?php echo site_url('berkas') ?>" class="<?= $this->config->item('botton')?>">Kembali</a></td></tr>
                	</table>
                </div> 
                <div class="col-xs-12 col-md-6">     
                    <?php if ($tipe_berkas==".gif" || $tipe_berkas==".jpg" || $tipe_berkas==".png" || $tipe_berkas==".PNG" || $tipe_berkas==".JPG" || $tipe_berkas==".GIF" ) { ?>
                        <img src="<?php echo base_url('assets/uploads/attachment/'.$nama_berkas) ?>" width="100%">
                    <?php } else if ($tipe_berkas==".pdf") { ?>
                        <embed src="<?php echo base_url('assets/uploads/attachment/'.$nama_berkas) ?>" width="100%" height="500px" type="application/pdf">
                    <?php } ?>  
                </div>
            </div>
        </div>
    </div>
</div>