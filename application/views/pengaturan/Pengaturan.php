<!-- Custom Tabs -->
<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-gear"></i>&nbsp; Pengaturan Umum</a></li>
    <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-database"></i>&nbsp; Backup & Restore</a></li>
    <li><a href="#tab_3" data-toggle="tab"><i class="fa fa-trash"></i>&nbsp; Hapus Data</a></li>
    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab_1">
      <div class="row">
          <div class="col-xs-12 col-md-12">
              <div class="box box-primary">
                  <div class="box-header">
                      <h3 class="box-title">Identitas</h3>
                      <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fa fa-minus"></i></button>
                          <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                          <i class="fa fa-refresh"></i></button>
                      </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                  <form action="pengaturan/update_action" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-xs-12 col-md-6">                    
                      <div class="form-group">
                        <label for="varchar">Nama Sekolah <span style="color:red;">*</span> <?php echo form_error('nama_sekolah') ?></label>
                        <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" placeholder="Nama Sekolah" value="<?php echo $pengaturan->nama_sekolah; ?>" required/>
                      </div>
                    </div>
                    <div class="col-xs-12 col-md-6">          
                      <div class="form-group">
                            <label for="varchar">Kode Sekolah <span style="color:red;">*</span> <?php echo form_error('kode_sekolah') ?></label>
                            <input type="text" class="form-control" name="kode_sekolah" id="kode_sekolah" placeholder="Kode Sekolah" value="<?php echo $pengaturan->kode_sekolah; ?>" required/>
                      </div>
                    </div>          
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-md-6"> 
                      <div class="form-group">
                        <label for="varchar">NPSN <span style="color:red;">*</span> <?php echo form_error('npsn') ?></label>
                        <input type="text" class="form-control" name="npsn" id="npsn" placeholder="NPSN" value="<?php echo $pengaturan->npsn; ?>" maxlength="8" onkeypress="return Angkasaja(event)" required/>
                      </div>
                    </div>
                    <div class="col-xs-12 col-md-6">                        
                      <div class="form-group">
                        <label for="varchar">Status <span style="color:red;">*</span> <?php echo form_error('status') ?></label>
                        <select type="text" class="form-control" name="status" id="status" placeholder="Status" value="" required/>
                          <option value="<?php echo $pengaturan->status; ?>"><?php echo $pengaturan->status; ?></option>
                          <option value="NEGERI">NEGERI</option>
                          <option value="SWASTA">SWASTA</option>
                        </select>                          
                      </div>
                    </div>          
                  </div>                      
                  <div class="row">
                    <div class="col-xs-12 col-md-6"> 
                      <div class="form-group">
                        <label for="varchar">Jenjang <span style="color:red;">*</span> <?php echo form_error('jenjang') ?></label>
                        <select type="text" class="form-control" name="jenjang" id="jenjang" placeholder="Jenjang" value="" required/>
                          <option value="<?php echo $pengaturan->jenjang; ?>"><?php echo $pengaturan->jenjang; ?></option>
                          <option value="SD/MI">SD/MI</option>
                          <option value="SMP/MTs">SMP/MTs</option>
                          <option value="SMA/MA">SMA/MA</option>
                          <option value="SMK">SMK</option>
                        </select>                             
                      </div>
                    </div>
                    <div class="col-xs-12 col-md-6">  
                      <div class="form-group">
                        <label for="varchar">Alamat <span style="color:red;">*</span> <?php echo form_error('alamat') ?></label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $pengaturan->alamat; ?>" required/>
                      </div>
                    </div>          
                  </div> 
                  <div class="row">
                    <div class="col-xs-12 col-md-6"> 
                      <div class="form-group">
                        <label for="varchar">Kepala Sekolah <span style="color:red;">*</span> <?php echo form_error('kepala_sekolah') ?></label>
                        <input type="text" class="form-control" name="kepala_sekolah" id="kepala_sekolah" placeholder="Kepala Sekolah" value="<?php echo $pengaturan->kepala_sekolah; ?>" required/>
                      </div>
                    </div>
                    <div class="col-xs-12 col-md-6">                          
                      <div class="form-group">
                        <label for="varchar">NIP <span style="color:red;">*</span> <?php echo form_error('nip') ?></label>
                        <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" value="<?php echo $pengaturan->nip; ?>" maxlength="18" onkeypress="return Angkasaja(event)" required/>
                      </div>
                    </div>          
                  </div> 
                  <div class="row">
                    <div class="col-xs-12 col-md-6"> 
                      <div class="form-group">
                        <label for="varchar">Kelurahan/Desa <span style="color:red;">*</span> <?php echo form_error('kelurahan') ?></label>
                        <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $pengaturan->kelurahan; ?>" required/>
                      </div>
                    </div>                    
                    <div class="col-xs-12 col-md-6"> 
                      <div class="form-group">
                        <label for="varchar">Kecamatan <span style="color:red;">*</span> <?php echo form_error('kecamatan') ?></label>
                        <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $pengaturan->kecamatan; ?>" required/>
                      </div>
                    </div>         
                  </div> 
                  <div class="row">
                    <div class="col-xs-12 col-md-6">                       
                      <div class="form-group">
                        <label for="varchar">Kabupaten/Kota <span style="color:red;">*</span> <?php echo form_error('kabupaten') ?></label>
                        <input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" value="<?php echo $pengaturan->kabupaten; ?>" required/>
                      </div>
                    </div>                     
                    <div class="col-xs-12 col-md-6">                   
                      <div class="form-group">
                        <label for="varchar">Kode Pos <span style="color:red;">*</span> <?php echo form_error('kode_pos') ?></label>
                        <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" value="<?php echo $pengaturan->kode_pos; ?>" onkeypress="return Angkasaja(event)" required/>
                      </div>
                    </div>          
                  </div>                       
                  <div class="row">
                    <div class="col-xs-12 col-md-6">                        
                      <div class="form-group">
                        <label for="varchar">No Telepon <span style="color:red;">*</span> <?php echo form_error('no_telepon') ?></label>
                        <input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="No Telepon" value="<?php echo $pengaturan->no_telepon; ?>" onkeypress="return Angkasaja(event)" required/>
                      </div>
                    </div>                    
                    <div class="col-xs-12 col-md-6">
                      <div class="form-group">
                        <label for="varchar">Website <?php echo form_error('website') ?></label>
                        <input type="text" class="form-control" name="website" id="website" placeholder="Website" value="<?php echo $pengaturan->website; ?>" />
                      </div>
                    </div>        
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-md-6">                        
                      <div class="form-group">
                        <label for="varchar">Email <span style="color:red;">*</span> <?php echo form_error('email') ?></label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $pengaturan->email; ?>" required/>
                      </div>
                    </div>                      
                    <div class="col-xs-12 col-md-6"> 
                      <div class="form-group">
                        <label for="varchar">apiKey Maps <span style="color:red;">*</span> <?php echo form_error('apikey') ?></label>
                        <input type="text" class="form-control" name="apikey" id="apikey" placeholder="apiKey" value="<?php echo $pengaturan->apikey; ?>" required/>
                      </div>
                    </div>
                  </div>
                  <div class="row">                      
                    <div class="col-xs-12 col-md-6">
                      <div class="form-group">
                        <label for="varchar">Latitude <span style="color:red;">*</span> <?php echo form_error('latitude') ?></label>
                        <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" value="<?php echo $pengaturan->latitude; ?>" required/>
                      </div>
                    </div>
                    <div class="col-xs-12 col-md-6">                        
                      <div class="form-group">
                        <label for="varchar">Longitude <span style="color:red;">*</span> <?php echo form_error('longitude') ?></label>
                        <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="<?php echo $pengaturan->longitude; ?>" required/>
                      </div>
                    </div>          
                  </div>
                  <div class="row">                      
                    <div class="col-xs-12 col-md-6">
                      <div class="form-group">
                        <!-- <label for="varchar">Koordinat Lokasi</label> -->
                        <button type="button" class="btn bg-green btn-flat" data-toggle="modal" data-target="#myModalLokasi">
                        <i class="fas fa-map-marker-alt"></i>&nbsp; Koordinat Lokasi Sekolah
                        </button>
                      </div>                   
                    </div>
                  </div>                      
                  <div class="row">
                    <div class="col-xs-12 col-md-6">
                      <div class="form-group">
                        <label for="varchar">Logo Sekolah <?php echo form_error('logo') ?></label>
                        <input type="file" id="logo" name="logo" class="form-control">
                        <input type="hidden" id="old_logo" name="old_logo" value="<?= $pengaturan->logo; ?>">
                        <p class="help-block">format image (*.png) max 500 kb.</p>
                        <img src="<?php echo base_url('assets/dist/img/'.$pengaturan->logo) ?>" height="100px">
                      </div>
                    </div>
                    <div class="col-xs-12 col-md-6">  
                      <div class="form-group">
                        <label for="varchar">Bglogin <?php echo form_error('bglogin') ?></label>
                        <input type="file" id="bglogin" name="bglogin" class="form-control">
                        <input type="hidden" id="old_bglogin" name="old_bglogin" value="<?= $pengaturan->bglogin; ?>">
                        <p class="help-block">format image (*.png) max 500 kb.</p>
                        <img src="<?php echo base_url('assets/dist/img/'.$pengaturan->bglogin) ?>" height="100px">
                      </div>
                    </div>          
                  </div>
<!-- ------------------------------------------------------ -->                  
                   <div class="row">
                    <div class="col-xs-7 col-md-4">
                      <div class="form-group">
                        <label for="varchar">Stempel <?php echo form_error('stempel') ?></label>
                        <input type="file" id="stempel" name="stempel" class="form-control">
                        <input type="hidden" id="old_stempel" name="old_stempel" value="<?= $pengaturan->stempel; ?>">
                        <p class="help-block">format image (*.png) max 500 kb.</p>
                        <img src="<?php echo base_url('assets/dist/img/'.$pengaturan->stempel) ?>" height="100px">
                      </div>
                    </div>
                    <div class="col-xs-3 col-md-1">
                      <div class="form-group">
                        <label for="varchar">Tinggi <?php echo form_error('hstempel') ?></label>
                        <input type="text" class="form-control" name="hstempel" id="hstempel" placeholder="Tinggi" value="<?php echo $pengaturan->hstempel; ?>" maxlength="3" onkeypress="return Angkasaja(event)" required/>      
                      </div>
                    </div>
                    <div class="col-xs-2 col-md-1">
                      <div class="form-group">
                        <label for="varchar">Status <?php echo form_error('sstempel') ?></label><br>
                        <input type="checkbox" name="sstempel" id="sstempel" value="Ya" <?php if ($pengaturan->sstempel=='Ya') { echo 'checked'; } ?>>                       
                      </div>
                    </div>
                    <div class="col-xs-7 col-md-4">  
                      <div class="form-group">
                        <label for="varchar">Ttd Kepala Sekolah<?php echo form_error('ttd') ?></label>
                        <input type="file" id="ttd" name="ttd" class="form-control">
                        <input type="hidden" id="old_ttd" name="old_ttd" value="<?= $pengaturan->ttd; ?>">
                        <p class="help-block">format image (*.png) max 500 kb.</p>
                        <img src="<?php echo base_url('assets/dist/img/'.$pengaturan->ttd) ?>" height="100px">
                      </div>   
                    </div> 
                    <div class="col-xs-3 col-md-1">
                      <div class="form-group">
                        <label for="varchar">Tinggi <?php echo form_error('httd') ?></label>
                        <input type="text" class="form-control" name="httd" id="httd" placeholder="Tinggi" value="<?php echo $pengaturan->httd; ?>" maxlength="3" onkeypress="return Angkasaja(event)" required/>
                      </div>
                    </div>
                    <div class="col-xs-2 col-md-1">
                      <div class="form-group">
                        <label for="varchar">Status <?php echo form_error('sttd') ?></label><br>
                        <input type="checkbox" name="sttd" id="sttd" value="Ya" <?php if ($pengaturan->sttd=='Ya') { echo 'checked'; } ?>>                       
                      </div>
                    </div>                                                  
                  </div>    
                  <div class="row">
                    <div class="col-xs-12 col-md-6">
                      <div class="form-group">
                        <label for="varchar">Header <?php echo form_error('header') ?></label>
                        <input type="file" id="header" name="header" class="form-control">
                        <input type="hidden" id="old_header" name="old_header" value="<?= $pengaturan->header; ?>">
                        <p class="help-block">format image (*.png) max 500 kb.</p>
                      </div>
                    </div> 
                    <div class="col-xs-12 col-md-6">
                      <div class="form-group">
                        <img src="<?php echo base_url('assets/dist/img/'.$pengaturan->header) ?>" width="100%" >
                      </div>
                    </div>                             
                  </div> 
<!-- ------------------------------------------------------ -->                  
                  <div class="row">
                    <div class="col-xs-12 col-md-12">
                    <fieldset>
                    <legend>Dashboard</legend> 
                    <div class="col-xs-12 col-md-3">                       
                      <div class="form-group">                      
                        <input type="checkbox" name="gis" id="gis" value="Ya" <?php if ($pengaturan->gis=='Ya') { echo 'checked'; } ?>>&nbsp; <label for="varchar">GIS Calon Peserta Didik + Log</label>
                      </div> 
                    </div>
                    <div class="col-xs-12 col-md-3">    
                      <div class="form-group">                      
                        <input type="checkbox" name="status_pendaftaran" id="status_pendaftaran" value="Ya" <?php if ($pengaturan->status_pendaftaran=='Ya') { echo 'checked'; } ?>>&nbsp; <label for="varchar">Status Pendaftaran</label>
                      </div>
                    </div>
                    <div class="col-xs-12 col-md-3">                        
                      <div class="form-group">                      
                        <input type="checkbox" name="status_hasil" id="status_hasil" value="Ya" <?php if ($pengaturan->status_hasil=='Ya') { echo 'checked'; } ?>>&nbsp; <label for="varchar">Status Hasil</label>
                      </div> 
                    </div>
                    <div class="col-xs-12 col-md-3">                         
                      <div class="form-group">                      
                        <input type="checkbox" name="status_daftar_ulang" id="status_daftar_ulang" value="Ya" <?php if ($pengaturan->status_daftar_ulang=='Ya') { echo 'checked'; } ?>>&nbsp; <label for="varchar">Status Daftar Ulang</label>
                      </div>
                    </div>                                            
                    </fieldset>                        
                    </div>                             
                  </div>                  
                  <input type="hidden" name="id_identitas" value="<?php echo $pengaturan->id_identitas; ?>" /> 
                  <button type="submit" class="<?= $this->config->item('botton')?>">Simpan Pengaturan</button> 
                  <a href="<?php echo site_url('pengaturan') ?>" class="btn btn-default btn-flat">Batal</a>
                  </form>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <div class="tab-pane" id="tab_2">
      <div class="row">
          <div class="col-xs-12 col-md-6">
              <div class="box box-primary">
                  <div class="box-header">
                      <h3 class="box-title">Backup Data</h3>
                      <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fa fa-minus"></i></button>
                          <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                          <i class="fa fa-refresh"></i></button>
                      </div>
                  </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="varchar">Klik Tombol dibawah ini untuk membackup database</label>
                    </div> 
                    <div class="form-group">
                      <a href="<?php echo base_url();?>pengaturan/backupdb"><button class="<?= $this->config->item('botton')?>"><span class="fa fa-database"></span>&nbsp; Backup Database</button></a>
                    </div>                                       
                  </div> 
              </div>
          </div>

          <div class="col-xs-12 col-md-6">
              <div class="box box-primary">
                  <div class="box-header">
                      <h3 class="box-title">Restore Data</h3>
                      <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fa fa-minus"></i></button>
                          <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                          <i class="fa fa-refresh"></i></button>
                      </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                  <form action="pengaturan/restoredb" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="varchar">Klik Tombol dibawah ini untuk merestore database</label>
                    </div> 
                    <div class="form-group">   
                      <input type="file" id="file" name="file" class="form-control">
                    </div> 
                    <div class="form-group">                       
                      <button type="submit" class="<?= $this->config->item('botton')?>"><span class="fa fa-database"></span>&nbsp; Restore Database</button>
                    </div>
                  </form>                                                           
                  </div>
              </div>
          </div>          
      </div>    
    </div>
    
    <div class="tab-pane" id="tab_3">
      <div class="row">
          <div class="col-xs-12 col-md-12">
              <div class="box box-primary">
                  <div class="box-header">
                      <h3 class="box-title">Pilih Data</h3>
                      <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fa fa-minus"></i></button>
                          <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                          <i class="fa fa-refresh"></i></button>
                      </div>
                  </div>
                  <div class="box-body">
                    <div class="row">
                    <form action="pengaturan/deletedata" method="post">                      
                      <div class="col-xs-12 col-md-3">                    
                        <div class="form-group">
                          <label for="varchar"><span class="label bg-purple">Pilih Data Referensi</span></label>
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="data[]" id="sekolah" value="sekolah"> Asal Sekolah
                        </div>                        
                        <div class="form-group">                      
                          <input type="checkbox" name="data[]" id="pengumuman" value="pengumuman"> Pengumuman
                        </div>                   
                      </div> 
                      <div class="col-xs-12 col-md-3">                    
                        <div class="form-group">
                          <label for="varchar"><span class="label bg-green">Pilih Data Peserta</span></label>
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="data[]" id="peserta" value="peserta"> Data Peserta
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="data[]" id="prestasipeserta" value="prestasipeserta"> Prestasi Peserta
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="data[]" id="berkas" value="berkas"> Berkas Pendukung
                        </div>                        
                        <?php if ($this->ion_auth->is_admin()) { ?>
                          <div class="form-group">
                            <label for="varchar"><span class="label bg-blue">Pilih Data Log</span></label>
                          </div>
                          <div class="form-group">                      
                            <input type="checkbox" name="data[]" id="log" value="log"> Log Aktivitas
                          </div>
                        <?php } ?>
                      </div>                                      
                      <div class="col-xs-12 col-md-6">                    
                        <div class="form-group">
                          <label for="varchar"><span class="label bg-yellow">Kosongkan Data</span></label>
                        </div>
                        <div class="form-group">   
                          <label for="varchar">Password <span style="color:red;">*</span> <?php echo form_error('password') ?></label>                   
                          <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required />
                        </div>                         
                        <div class="form-group">                       
                          <button type="submit" class="<?= $this->config->item('botton')?>"><span class="glyphicon glyphicon-trash"></span>&nbsp; Kosongkan</button>                          
                        </div>                         
                        <div class="form-group">                      
                          <label for="varchar" class='text-danger'>Mohon di ingat! Data yang telah dikosongkan tidak dapat dikembalikan.</label> 
                        </div>                                                             
                      </div> 
                    </form>
                    </div>                    
                  </div> 
              </div>
          </div>        
      </div>                    
    </div>
  </div>
</div>

<!-- Modal Lokasi-->
<div class="modal fade" id="myModalLokasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header <?= $this->config->item('header')?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fas fa-map-marker-alt"></i>&nbsp; Koordinat Lokasi</h4>
      </div>
      <div class="modal-body">
        <?php
        //buat fungsi untuk cek internet
        function cek_internet(){
           $connected = @fsockopen("www.google.com", 80);
           if ($connected){
              $is_conn = true; //jika koneksi tersambung
              fclose($connected);
           }else{
              $is_conn = false; //jika koneksi gagal
           }
           return $is_conn;
        }
        
        if (cek_internet() == true) {

        ?>    
            <div id="googleMap" style="width:100%;height:450px;"></div>
        <?php } else { ?>
              <div class="row">
                <div class="col-md-12 col-xs-12">
                   <div class="callout callout-info">
                        <h4>GIS Sekolah</h4>
                        <p>Aktifkan koneksi internet untuk menampilkan PETA</p>
                    </div>
                </div>    
              </div>      
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function Angkasaja(evt) 
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }
</script>