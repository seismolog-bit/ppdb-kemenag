<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Tahun Pelajaran</h3>
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
            <form action="<?php echo $action; ?>" method="post">
                <div class="row">
                    <div class="col-xs-12 col-md-6">                   
                        <div class="form-group">
                            <label for="varchar">Tahun Pelajaran <span style="color:red;">*</span> <?php echo form_error('tahun_pelajaran') ?></label>
                            <input type="text" class="form-control" name="tahun_pelajaran" id="tahun_pelajaran" placeholder="Contoh : 2020" value="<?php echo $tahun_pelajaran; ?>" required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">                         
                        <div class="form-group">
                            <label for="varchar">Kuota <span style="color:red;">*</span> <?php echo form_error('kuota') ?></label>
                            <input type="text" class="form-control" name="kuota" id="kuota" placeholder="Kuota" value="<?php echo $kuota; ?>" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6">                   
                        <div class="form-group">
                            <label for="date">Tanggal Mulai Pendaftaran <span style="color:red;">*</span> <?php echo form_error('tanggal_mulai_pendaftaran') ?></label>
                            <input type="text" class="form-control" name="tanggal_mulai_pendaftaran" id="tanggal_mulai_pendaftaran" placeholder="Tanggal Mulai Pendaftaran" value="<?php echo $tanggal_mulai_pendaftaran; ?>" required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6"> 
                        <div class="form-group">
                            <label for="date">Tanggal Selesai Pendaftaran <span style="color:red;">*</span> <?php echo form_error('tanggal_selesai_pendaftaran') ?></label>
                            <input type="text" class="form-control" name="tanggal_selesai_pendaftaran" id="tanggal_selesai_pendaftaran" placeholder="Tanggal Selesai Pendaftaran" value="<?php echo $tanggal_selesai_pendaftaran; ?>" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6">                                           
                        <div class="form-group">
                            <label for="date">Tanggal Mulai Seleksi <span style="color:red;">*</span> <?php echo form_error('tanggal_mulai_seleksi') ?></label>
                            <input type="text" class="form-control" name="tanggal_mulai_seleksi" id="tanggal_mulai_seleksi" placeholder="Tanggal Mulai Seleksi" value="<?php echo $tanggal_mulai_seleksi; ?>" required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">                         
                        <div class="form-group">
                            <label for="date">Tanggal Selesai Seleksi <span style="color:red;">*</span> <?php echo form_error('tanggal_selesai_seleksi') ?></label>
                            <input type="text" class="form-control" name="tanggal_selesai_seleksi" id="tanggal_selesai_seleksi" placeholder="Tanggal Selesai Seleksi" value="<?php echo $tanggal_selesai_seleksi; ?>" required/>
                        </div>
                    </div>
                </div>                         
                <div class="form-group">
                    <label for="date">Tanggal Pengumuman <span style="color:red;">*</span> <?php echo form_error('tanggal_pengumuman') ?></label>
                    <input type="text" class="form-control" name="tanggal_pengumuman" id="tanggal_pengumuman" placeholder="Tanggal Pengumuman" value="<?php echo $tanggal_pengumuman; ?>" required/>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6">                   
                        <div class="form-group">
                            <label for="date">Tanggal Mulai Daftar Ulang <span style="color:red;">*</span> <?php echo form_error('tanggal_mulai_daftar_ulang') ?></label>
                            <input type="text" class="form-control" name="tanggal_mulai_daftar_ulang" id="tanggal_mulai_daftar_ulang" placeholder="Tanggal Mulai Daftar Ulang" value="<?php echo $tanggal_mulai_daftar_ulang; ?>" required/>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">                          
                        <div class="form-group">
                            <label for="date">Tanggal Selesai Daftar Ulang <span style="color:red;">*</span> <?php echo form_error('tanggal_selesai_daftar_ulang') ?></label>
                            <input type="text" class="form-control" name="tanggal_selesai_daftar_ulang" id="tanggal_selesai_daftar_ulang" placeholder="Tanggal Selesai Daftar Ulang" value="<?php echo $tanggal_selesai_daftar_ulang; ?>" required/>
                        </div>
                    </div>
                </div>  
                <div class="form-group">
                    <label for="enum">Status Tahun <span style="color:red;">*</span> <?php echo form_error('status_tahun') ?></label>
                    <select type="text" class="form-control" name="status_tahun" id="status_tahun" placeholder="Status Tahun" value="" required/>
                        <option value="<?php echo $status_tahun; ?>"><?php echo $status_tahun; ?></option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
                <input type="hidden" name="id_tahun" value="<?php echo $id_tahun; ?>" />
                <button type="submit" class="<?= $this->config->item('botton')?>"><?php echo $button ?></button>
                <a href="<?php echo site_url('tahunpelajaran') ?>" class="btn btn-default btn-flat">Batal</a>
            </form>
            </div>
        </div>
    </div>
</div>