<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Peserta</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                    <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
            <style>
              .select2{width:100% !important};
            </style>
            <form action="<?php echo $action; ?>" method="post">                
                <div class="box-header <?= $this->config->item('header')?>">
                    <h3 class="box-title">Data Status</h3>              
                </div><br>
                <div class="form-group">
                    <label for="varchar">Status Pendaftaran</label>
                    <select type="text" class="form-control" name="status" id="status" placeholder="Status" value="" />
                        <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                        <option value="Belum diverifikasi">Belum diverifikasi</option>
                        <option value="Sudah diverifikasi">Sudah diverifikasi</option>
                        <option value="Berkas Kurang">Berkas tidak lengkap</option>
                    </select>                    
                </div>
                <div class="form-group">
                    <label for="varchar">Status Hasil</label>
                    <select type="text" class="form-control" name="status_hasil" id="status_hasil" placeholder="Status Hasil" value="" />
                        <option value="<?php echo $status_hasil; ?>"><?php echo $status_hasil; ?></option>
                        <option value="Belum ada">Belum ada</option>
                        <option value="Di Terima">Di Terima</option>
                        <option value="Tidak di terima">Tidak di terima</option>
                        <option value="Cadangan">Cadangan</option>
                    </select>                      
                </div>
                <div class="form-group">
                    <label for="varchar">Status Daftar Ulang</label>
                    <select type="text" class="form-control" name="status_daftar_ulang" id="status_daftar_ulang" placeholder="Status Hasil" value="" />
                        <option value="<?php echo $status_daftar_ulang; ?>"><?php echo $status_daftar_ulang; ?></option>
                        <option value="Menunggu">Menunggu</option>
                        <option value="Belum daftar ulang">Belum daftar ulang</option>
                        <option value="Sudah daftar ulang">Sudah daftar ulang</option>
                        <option value="Tidak daftar ulang">Tidak daftar ulang</option>
                    </select>                      
                </div>
                <div class="form-group">
                    <label for="longtext">Catatan <?php echo form_error('catatan') ?></label>
                    <textarea id="catatan" class="form-control" name="catatan" style="height: 50px;"><?php echo $catatan; ?></textarea>
                </div>                
                <input type="hidden" class="form-control" name="nama_peserta" id="nama_peserta" value="<?= $nama_peserta; ?>" />
                <input type="hidden" class="form-control" name="id_users" id="id_users" value="<?= $id_users; ?>" />
                <input type="hidden" name="id_peserta" value="<?php echo $id_peserta; ?>" /> 
                <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button>
                <a href="<?php echo site_url('peserta') ?>" class="btn btn-default btn-flat">Batal</a>  
            </form>
            </div>
        </div>
    </div>
</div>