<?php if ($nomer) { ?>
<div class="row">
  <div class="col-md-12 col-xs-12">
    <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Formulir Pendaftaran</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>

      <div class="box-body">  
        <div class="col-md-12 col-xs-12">
          <div class="small-box btn-info">
            <div class="inner">
                <h3><?php echo $nomer->no_pendaftaran ?></h3>
                <p>Nomer Pendaftaran Anda - Pengisian Formulir hanya dapat dilakukan satu kali, jika ada kesalahan data hubungi PANITIA untuk perbaikan.</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-signature"></i>
            </div>          
          </div>
        </div> 

        <div class="col-md-12 col-xs-12">
        <?php if ($nomer) { ?>  
        <?php if ($nomer->status=='Belum diverifikasi') { ?>
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fas fa-file-signature"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><?php echo $nomer->status ?></span>
              <span class="info-box-number">Panitia</span>               
              <div class="progress">
                <div class="progress-bar" style="width : 100% "></div>
              </div>
              <span class="progress-description">
                Status Pendaftaran
              </span>
            </div>
          </div>
        <?php } else if ($nomer->status=='Sudah diverifikasi') { ?> 
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fas fa-clipboard-check"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><?php echo $nomer->status ?></span>
              <span class="info-box-number">Panitia</span>                
              <div class="progress">
                <div class="progress-bar" style="width : 100% "></div>
              </div>
              <span class="progress-description">
                Status Pendaftaran
              </span>
            </div>
          </div>
        <?php } else if ($nomer->status=='Berkas Kurang') { ?> 
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fas fa-minus"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Berkas</span>
              <span class="info-box-number">Kurang/tidak sesuai</span>              
              <div class="progress">
                <div class="progress-bar" style="width : 100% "></div>
              </div>
              <span class="progress-description">
                Status Pendaftaran
              </span>
            </div>
          </div>
        <?php } ?>   
        <?php } else { ?>  
          <div class="info-box bg-purple">
            <span class="info-box-icon"><i class="fas fa-user-times"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Belum</span>
              <span class="info-box-number">Terdaftar</span>              
              <div class="progress">
                <div class="progress-bar" style="width : 100% "></div>
              </div>
              <span class="progress-description">
                Status Pendaftaran
              </span>
            </div>
          </div>
        <?php } ?> 
        </div> 
      </div> 
    </div> 
  </div> 
</div>         

<?php } else { ?>

<div class="row">
  <div class="col-md-12 col-xs-12">
    <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Formulir Pendaftaran</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <style>
            .select2{width:100% !important};
          </style>
          <div class="box-body">
            <form action="<?php echo $action; ?>" role="form" method="post" accept-charset="utf-8">
<!-- awal collapse -->
        <div class="col-md-12 col-xs-12">
          <div class="box box-solid">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Formulir Pendaftaran</h3> -->
            </div>
            <div class="box-body">
              <div class="box-group" id="accordion">
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Ketentuan PPDB
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                      <div class="callout callout-info">
                        <p><?php echo $formulir->ketentuan ?></p>
                      </div> 
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        Data Registrasi
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                          <div class="callout callout-info">
                                <p>CATATAN : isian dengan tanda <span style="color:red;"><strong>* wajib diisi.</strong></span></p>
                          </div>                          
                        
                          <?php if ($formulir->tahun_pelajaran=='Ya'){ ?>
                          <div class="form-group">
                                <label for="int">Tahun Pelajaran <?php echo form_error('id_tahun') ?></label>
                                <input type="hidden" class="form-control" name="id_tahun" id="id_tahun" value="<?php echo $tahunpelajaran->id_tahun; ?>" />
                                <input type="text" class="form-control" name="tahun_pelajaran" id="tahun_pelajaran" value="<?php echo $tahunpelajaran->tahun_pelajaran; ?>" readonly/>                                  
                          </div>
                          <?php } ?>
                          <?php if ($formulir->jalur_pendaftaran=='Ya'){ ?>
                          <div class="form-group">
                                <label for="int">Jalur Pendaftaran <span style="color:red;">*</span> <?php echo form_error('id_jalur') ?></label>
                                <select type="text" class="select2 form-control" name="id_jalur" id="id_jalur" placeholder="Jalur Pendaftaran" value="" required/>
                                    <option value="">Pilih Jalur Pendaftaran</option>
                                    <?php foreach ($jalur as $key => $value) { ?>
                                        <option value="<?= $value->id_jalur;?>">
                                            <?= $value->jalur;?>
                                        </option>
                                    <?php }?>
                                </select>
                          </div>
                          <?php } ?>

<!-- pilihan sekolah lainnya -->
                          <?php if ($pengaturan->jenjang=='SMP/MTs'){ ?>
                          <div class="form-group">
                              <label for="varchar">Sekolah Pilihan kedua <?php echo form_error('pilihan_sekolah_lain') ?></label>
                              <input type="text" class="form-control" name="pilihan_sekolah_lain" id="pilihan_sekolah_lain" placeholder="Sekolah Pilihan kedua jika ada tuliskan" value="<?php echo $pilihan_sekolah_lain; ?>" />
                          </div>
                          <?php } else { ?>
                              <input type="hidden" class="form-control" name="pilihan_sekolah_lain" id="pilihan_sekolah_lain" />
                          <?php } ?>
<!-- end pilihan sekolah lainnya -->
<!-- pilihan jurusan -->                                                    
                          <?php if ($formulir->jurusan=='Ya'){ ?>
                          <div class="form-group">
                                <label for="int">Jurusan Pilihan Satu <span style="color:red;">*</span> <?php echo form_error('id_jurusan') ?></label>
                                <select type="text" class="select2 form-control" name="id_jurusan" id="id_jurusan" placeholder="Jurusan Pilihan Satu" value="" required/>
                                    <option value="1">Pilih Jurusan Satu</option>
                                    <?php foreach ($jurusan as $key => $value) { ?>
                                        <option value="<?= $value->id_jurusan;?>">
                                            Bidang <?= $value->bidang_keahlian;?> | <?= $value->nama_jurusan;?>
                                        </option>
                                    <?php }?>
                                </select>
                          </div>
                          <div class="form-group">
                                <label for="int">Jurusan Pilihan Dua <span style="color:red;"><i>* tidak dapat memilih bidang yang sama dengan pilihan satu</i></span><?php echo form_error('pilihan_dua') ?></label>
                                <select type="text" class="select2 form-control" name="pilihan_dua" id="pilihan_dua" placeholder="Jurusan Pilihan Dua" value="" />
                                    <option value="">Pilih Jurusan Dua</option>
                                    <?php foreach ($jurusan as $key => $value) { ?>
                                        <option value="<?= $value->nama_jurusan;?>">
                                            Bidang <?= $value->bidang_keahlian;?> | <?= $value->nama_jurusan;?>
                                        </option>
                                    <?php }?>
                                </select>
                          </div>                          
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="id_jurusan" id="id_jurusan" value="1"/>
                                <input type="hidden" class="form-control" name="pilihan_dua" id="pilihan_dua"/>
                          <?php } ?>
<!-- end pilihan jurusan -->                                                     
                          <?php if ($formulir->asal_sekolah=='Ya'){ ?>
                          <div class="form-group">
                                <label for="int">Asal Sekolah <span style="color:red;">*</span> <?php echo form_error('id_sekolah') ?> <i class="fas fa-plus-circle" data-toggle="modal" data-target="#myModalInfo"></i></label>
                                <select type="text" class="select2 form-control" name="id_sekolah" id="id_sekolah" placeholder="Asal Sekolah" value="" required/>
                                    <option value="">Pilih Asal Sekolah</option>
                                    <?php foreach ($sekolah as $key => $value) { ?>
                                        <option value="<?= $value->id_sekolah;?>">
                                            <?= $value->npsn_sekolah;?> | <?= $value->asal_sekolah;?> | <?= $value->kecamatan;?>
                                        </option>
                                    <?php }?>
                                </select>
                          </div>
                          <?php } ?>
                          <?php if ($formulir->no_peserta_ujian=='Ya'){ ?>
                            <div class="form-group">
                                  <label for="varchar">No Peserta Ujian Nasional <span style="color:red;">*</span> <?php echo form_error('no_un') ?></label>
                                  <input type="text" class="form-control" name="no_un" id="no_un" placeholder="No Peserta Ujian Nasional" value="<?php echo $no_un; ?>" required/>
                            </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="no_un" id="no_un" />
                          <?php } ?>
                          <?php if ($formulir->no_seri_ijazah=='Ya'){ ?>
                            <div class="form-group">
                                  <label for="varchar">No Seri Ijazah <?php echo form_error('no_seri_ijazah') ?></label>
                                  <input type="text" class="form-control" name="no_seri_ijazah" id="no_seri_ijazah" placeholder="No Seri Ijazah" value="<?php echo $no_seri_ijazah; ?>" />
                            </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="no_seri_ijazah" id="no_seri_ijazah" />
                          <?php } ?>                          
                          <?php if ($formulir->no_seri_skhu=='Ya'){ ?>
                            <div class="form-group">
                                  <label for="varchar">No Seri SKHU <?php echo form_error('no_seri_skhu') ?></label>
                                  <input type="text" class="form-control" name="no_seri_skhu" id="no_seri_skhu" placeholder="No Seri SKHU" value="<?php echo $no_seri_skhu; ?>" />
                            </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="no_seri_skhu" id="no_seri_skhu" />
                          <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        Data Pribadi
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                          <div class="callout callout-info">
                                <p>CATATAN : isian dengan tanda <span style="color:red;"><strong>* wajib diisi.</strong></span></p>
                          </div>                          
                          <?php if ($formulir->nama_peserta=='Ya'){ ?>
                            <div class="form-group">
                                  <label for="varchar">Nama Peserta <span style="color:red;">*</span> <?php echo form_error('nama_peserta') ?></label>
                                  <input type="text" class="form-control" name="nama_peserta" id="nama_peserta" placeholder="Nama Peserta" required/>
                            </div>
                          <?php } ?>
                          <?php if ($formulir->jenis_kelamin=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Jenis Kelamin <span style="color:red;">*</span> <?php echo form_error('jenis_kelamin') ?></label>   
                                <select type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="" required/>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                </select>    
                          </div>
                          <?php } ?>
                          <?php if ($formulir->nisn=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">NISN <span style="color:red;">*</span> <?php echo form_error('nisn') ?></label>
                                <input type="text" class="form-control" name="nisn" id="nisn" placeholder="NISN harus tepat 10 karakter" value="<?php echo $user->username; ?>" readonly/>
                          </div>
                          <?php } ?>
                          <?php if ($formulir->nik=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">NIK <span style="color:red;">*</span> <?php echo form_error('nik') ?></label>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK harus tepat 16 karakter" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="nik" id="nik" />
                          <?php } ?>
                          <?php if ($formulir->tempat_lahir=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Tempat Lahir <span style="color:red;">*</span> <?php echo form_error('tempat_lahir') ?></label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" required/>
                          </div>
                          <?php } ?>
                          <?php if ($formulir->tanggal_lahir=='Ya'){ ?>
                          <div class="form-group">
                                <label for="date">Tanggal Lahir <span style="color:red;">*</span> <?php echo form_error('tanggal_lahir') ?></label>
                                <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" required/>
                          </div>
                          <?php } ?>
                          <?php if ($formulir->no_registrasi_akta_lahir=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">No Registrasi Akta Lahir <?php echo form_error('no_registrasi_akta_lahir') ?></label>
                                <input type="text" class="form-control" name="no_registrasi_akta_lahir" id="no_registrasi_akta_lahir" placeholder="No Registrasi Akta Lahir" />
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="no_registrasi_akta_lahir" id="no_registrasi_akta_lahir" />
                          <?php } ?>                          
                          <?php if ($formulir->agama=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Agama <span style="color:red;">*</span> <?php echo form_error('agama') ?></label>
                                <select type="text" class="form-control" name="agama" id="agama" placeholder="Agama" value="" required/>
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Khatolik">Khatolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghuchu</option>
                                </select>
                          </div>
                          <?php } ?>
                          <?php if ($formulir->kewarganegaraan=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Kewarganegaraan <span style="color:red;">*</span> <?php echo form_error('kewarganegaraan') ?></label>
                                <select type="text" class="form-control" name="kewarganegaraan" id="kewarganegaraan" placeholder="Kewarganegaraan" value="" required/>
                                        <option value="">Pilih Kewarganegaraan</option>
                                        <option value="Indonesia (WNI)">Indonesia (WNI)</option>
                                        <option value="Asing (WNA)">Asing (WNA)</option>
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="kewarganegaraan" id="kewarganegaraan" />
                          <?php } ?>                          
                          <?php if ($formulir->berkebutuhan_khusus=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Berkebutuhan Khusus <span style="color:red;">*</span> <?php echo form_error('berkebutuhan_khusus') ?></label>
                                <select type="text" class="form-control" name="berkebutuhan_khusus" id="berkebutuhan_khusus" placeholder="Berkebutuhan Khusus" value="" required/>
                                        <option value="">Pilih</option>
                                        <option value="Tidak">Tidak</option>
                                        <option value="Netra">Netra</option>
                                        <option value="Rungu">Rungu</option>
                                        <option value="Grahita Ringan">Grahita Ringan</option>
                                        <option value="Grahita Sedang">Grahita Sedang</option>
                                        <option value="Daksa Ringan">Daksa Ringan</option>
                                        <option value="Daksa Sedang">Daksa Sedang</option>
                                        <option value="Laras">Laras</option>
                                        <option value="Wicara">Wicara</option>
                                        <option value="Tuna Ganda">Tuna Ganda</option>
                                        <option value="Hiper Aktif">Hiper Aktif</option>
                                        <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                                        <option value="Bakat Istimewa">Bakat Istimewa</option>
                                        <option value="Kesulitan belajar">Kesulitan belajar</option>
                                        <option value="Narkoba">Narkoba</option>
                                        <option value="Indigo">Indigo</option>
                                        <option value="Down Sindrome">Down Sindrome</option>
                                        <option value="Autis">Autis</option>                 
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="berkebutuhan_khusus" id="berkebutuhan_khusus" />
                          <?php } ?>                                                                          
                          <?php if ($formulir->alamat=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Alamat <span style="color:red;">*</span> <?php echo form_error('alamat') ?></label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required/>
                          </div>
                          <?php } ?>
                          <?php if ($formulir->rt=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">RT <span style="color:red;">*</span> <?php echo form_error('rt') ?></label>
                                <input type="text" class="form-control" name="rt" id="rt" placeholder="RT" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="rt" id="rt" />
                          <?php } ?>                          
                          <?php if ($formulir->rw=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">RW <span style="color:red;">*</span> <?php echo form_error('rw') ?></label>
                                <input type="text" class="form-control" name="rw" id="rw" placeholder="RW" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="rw" id="rw" />
                          <?php } ?>                          
                          <?php if ($formulir->nama_dusun=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Nama Dusun <span style="color:red;">*</span> <?php echo form_error('nama_dusun') ?></label>
                                <input type="text" class="form-control" name="nama_dusun" id="nama_dusun" placeholder="Nama Dusun" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="nama_dusun" id="nama_dusun" />
                          <?php } ?>                          
                          <?php if ($formulir->nama_kelurahan=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Nama Kelurahan <span style="color:red;">*</span> <?php echo form_error('nama_kelurahan') ?></label>
                                <input type="text" class="form-control" name="nama_kelurahan" id="nama_kelurahan" placeholder="Nama Kelurahan" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="nama_kelurahan" id="nama_kelurahan" />
                          <?php } ?>                          
                          <?php if ($formulir->kecamatan=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Kecamatan <span style="color:red;">*</span> <?php echo form_error('kecamatan') ?></label>
                                <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="kecamatan" id="kecamatan" />
                          <?php } ?>                          
                          <?php if ($formulir->kode_pos=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Kode Pos <span style="color:red;">*</span> <?php echo form_error('kode_pos') ?></label>
                                <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="kode_pos" id="kode_pos" />
                          <?php } ?>                          
                          <?php if ($formulir->latitude=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar"></label>
                                <button type="button" class="btn bg-green btn-flat" data-toggle="modal" data-target="#myModalLokasi">
                                <i class="fas fa-map-marker-alt"></i>&nbsp; Koordinat Lokasi Rumah
                                </button>
                          </div>
                          <div class="form-group">
                                <label for="varchar">Latitude <?php echo form_error('latitude') ?></label>
                                <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" />
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="latitude" id="latitude" />
                          <?php } ?>                          
                          <?php if ($formulir->longitude=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Longitude <?php echo form_error('longitude') ?></label>
                                <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" />
                          </div>                        
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="longitude" id="longitude" />
                          <?php } ?>                          
                          <?php if ($formulir->tempat_tinggal=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Tempat Tinggal <span style="color:red;">*</span> <?php echo form_error('tempat_tinggal') ?></label>
                                <select type="text" class="form-control" name="tempat_tinggal" id="tempat_tinggal" placeholder="Tempat Tinggal" value="" required/>
                                        <option value="">Pilih Tempat Tinggal</option>
                                        <option value="Bersama orangtua">Bersama orangtua</option>
                                        <option value="Wali">Wali</option>
                                        <option value="Kos">Kos</option>
                                        <option value="Asrama">Asrama</option>
                                        <option value="Panti Asuhan">Panti Asuhan</option>
                                        <option value="Pesantren">Pesantren</option>
                                        <option value="Lainnya">Lainnya</option>
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="tempat_tinggal" id="tempat_tinggal" />
                          <?php } ?>                          
                          <?php if ($formulir->moda_transportasi=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Moda Transportasi <span style="color:red;">*</span> <?php echo form_error('moda_transportasi') ?></label>
                                <select type="text" class="form-control" name="moda_transportasi" id="moda_transportasi" placeholder="Moda Transportasi" value="" required/>
                                        <option value="">Pilih Moda Transportasi</option>
                                        <option value="Jalan kaki">Jalan kaki</option>
                                        <option value="Kendaraan pribadi">Kendaraan pribadi</option>
                                        <option value="Kendaraan umum">Kendaraan umum</option>
                                        <option value="Jemputan sekolah">Jemputan sekolah</option>
                                        <option value="Kereta Api">Kereta Api</option>
                                        <option value="Lainnya">Lainnya</option>
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="moda_transportasi" id="moda_transportasi" />
                          <?php } ?>                          
                          <?php if ($formulir->no_kks=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">No KKS <?php echo form_error('no_kks') ?></label>
                                <input type="text" class="form-control" name="no_kks" id="no_kks" placeholder="No KKS harus tepat 6 karakter" />
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="no_kks" id="no_kks" />
                          <?php } ?>                          
                          <?php if ($formulir->anak_ke=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Anak ke <span style="color:red;">*</span> <?php echo form_error('anak_ke') ?></label>
                                <input type="text" class="form-control" name="anak_ke" id="anak_ke" placeholder="Anak ke" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="anak_ke" id="anak_ke" />
                          <?php } ?>                          
                          <?php if ($formulir->penerima_kps_pkh=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Penerima KPS/PKH <span style="color:red;">*</span> <?php echo form_error('penerima_kps_pkh') ?></label>
                                <select type="text" class="form-control" name="penerima_kps_pkh" id="penerima_kps_pkh" placeholder="Penerima KPS/PKH" value="" required/>
                                        <option value="">Pilih Penerima</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="penerima_kps_pkh" id="penerima_kps_pkh" />
                          <?php } ?>                          
                          <?php if ($formulir->no_kps_pkh=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">No KPS/PKH <?php echo form_error('no_kps_pkh') ?></label>
                                <input type="text" class="form-control" name="no_kps_pkh" id="no_kps_pkh" placeholder="No KPS/PKH" />
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="no_kps_pkh" id="no_kps_pkh" />
                          <?php } ?>                          
                          <?php if ($formulir->penerima_kip=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Penerima KIP <span style="color:red;">*</span> <?php echo form_error('penerima_kip') ?></label>
                                <select type="text" class="form-control" name="penerima_kip" id="penerima_kip" placeholder="Penerima KIP" value="" required/>
                                        <option value="">Pilih Penerima</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="penerima_kip" id="penerima_kip" />
                          <?php } ?>                          
                          <?php if ($formulir->no_kip=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">No KIP <?php echo form_error('no_kip') ?></label>
                                <input type="text" class="form-control" name="no_kip" id="no_kip" placeholder="No KIP harus tepat 6 karakter" />
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="no_kip" id="no_kip" />
                          <?php } ?>                          
                          <?php if ($formulir->nama_tertera_di_kip=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Nama tertera di KIP <span style="color:red;">*</span> <?php echo form_error('nama_tertera_di_kip') ?></label>
                                <input type="text" class="form-control" name="nama_tertera_di_kip" id="nama_tertera_di_kip" placeholder="Nama tertera di KIP" />
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="nama_tertera_di_kip" id="nama_tertera_di_kip" />
                          <?php } ?>                          
                          <?php if ($formulir->terima_fisik_kartu_kip=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Terima fisik kartu KIP <span style="color:red;">*</span> <?php echo form_error('terima_fisik_kartu_kip') ?></label>
                                <select type="text" class="form-control" name="terima_fisik_kartu_kip" id="terima_fisik_kartu_kip" placeholder="Terima fisik kartu KIP" value="" required/>
                                        <option value="">Pilih Penerima Fisik</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="terima_fisik_kartu_kip" id="terima_fisik_kartu_kip" />
                          <?php } ?>                          
                          <?php if ($formulir->jenis_ekstrakurikuler=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Hobi <span style="color:red;">*</span> <?php echo form_error('jenis_ekstrakurikuler') ?></label>
                                <input type="text" class="form-control" name="jenis_ekstrakurikuler" id="jenis_ekstrakurikuler" placeholder="Hobi" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="jenis_ekstrakurikuler" id="jenis_ekstrakurikuler" />
                          <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="panel box box-warning">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        Data Orangtua/Wali
                      </a>
                    </h4>
                  </div>
                  <div id="collapseFour" class="panel-collapse collapse">
                    <div class="box-body">
                          <div class="callout callout-info">
                                <p>CATATAN : isian dengan tanda <span style="color:red;"><strong>* wajib diisi.</strong></span></p>
                          </div>                          
                          <?php if ($formulir->nama_ayah=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Nama Ayah <span style="color:red;">*</span> <?php echo form_error('nama_ayah') ?></label>
                                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah" required/>
                          </div>
                          <?php } ?>
                          <?php if ($formulir->nik_ayah=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">NIK Ayah <?php echo form_error('nik_ayah') ?></label>
                                <input type="text" class="form-control" name="nik_ayah" id="nik_ayah" placeholder="NIK Ayah harus tepat 16 karakter" />
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="nik_ayah" id="nik_ayah" />
                          <?php } ?>                          
                          <?php if ($formulir->tahun_lahir_ayah=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Tahun lahir Ayah <span style="color:red;">*</span> <?php echo form_error('tahun_lahir_ayah') ?></label>
                                <input type="text" class="form-control" name="tahun_lahir_ayah" id="tahun_lahir_ayah" placeholder="Tahun lahir Ayah harus tepat 4 karakter" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="tahun_lahir_ayah" id="tahun_lahir_ayah" />
                          <?php } ?>                          
                          <?php if ($formulir->pendidikan_ayah=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Pendidikan Ayah <span style="color:red;">*</span> <?php echo form_error('pendidikan_ayah') ?></label>
                                <select type="text" class="form-control" name="pendidikan_ayah" id="pendidikan_ayah" placeholder="Pendidikan Ayah" value="" required/>
                                        <option value="">Pilih Pendidikan</option>
                                        <option value="Tidak sekolah">Tidak sekolah</option>
                                        <option value="Putus SD">Putus SD</option>
                                        <option value="SD Sederajat">SD Sederajat</option>
                                        <option value="SMP Sederajat">SMP Sederajat</option>
                                        <option value="SMA Sederajat">SMA Sederajat</option>
                                        <option value="D1">D1</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                        <option value="D4/S1">D4/S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="pendidikan_ayah" id="pendidikan_ayah" />
                          <?php } ?>                          
                          <?php if ($formulir->pekerjaan_ayah=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Pekerjaan Ayah <span style="color:red;">*</span> <?php echo form_error('pekerjaan_ayah') ?></label>
                                <select type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Pekerjaan Ayah" value="" required/>
                                        <option value="">Pilih Pekerjaan</option>
                                        <option value="Tidak bekerja">Tidak bekerja</option>
                                        <option value="Nelayan">Nelayan</option>
                                        <option value="Petani">Petani</option>
                                        <option value="Peternak">Peternak</option>
                                        <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                        <option value="Karyawan Swasta">Karyawan Swasta</option>
                                        <option value="Pedagang Kecil">Pedagang Kecil</option>
                                        <option value="Pedagang Besar">Pedagang Besar</option>
                                        <option value="Wiraswasta">Wiraswasta</option>
                                        <option value="Wirausaha">Wirausaha</option>
                                        <option value="Buruh">Buruh</option>
                                        <option value="Pensiunan">Pensiunan</option>
                                        <option value="Meninggal Dunia">Meninggal Dunia</option>
                                        <option value="Lainnya">Lainnya</option>
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" />
                          <?php } ?>                          
                          <?php if ($formulir->penghasilan_bulanan_ayah=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Penghasilan bulanan Ayah <span style="color:red;">*</span> <?php echo form_error('penghasilan_bulanan_ayah') ?></label>
                                <select type="text" class="form-control" name="penghasilan_bulanan_ayah" id="penghasilan_bulanan_ayah" placeholder="Penghasilan bulanan Ayah" value="" required/>
                                        <option value="">Pilih Penghasilan</option>
                                        <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                                        <option value="500.000 - 999.999">500.000 - 999.999</option>
                                        <option value="1 juta - 1.999.999">1 juta - 1.999.999 </option>
                                        <option value="2 juta - 4.999.999">2 juta - 4.999.999</option>
                                        <option value="5 juta - 20 juta">5 juta - 20 juta</option>
                                        <option value="Lebih dari 20 juta">Lebih dari 20 juta</option>
                                        <option value="Tidak berpenghasilan">Tidak berpenghasilan</option>
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="penghasilan_bulanan_ayah" id="penghasilan_bulanan_ayah" />
                          <?php } ?>                          
                          <?php if ($formulir->berkebutuhan_khusus_ayah=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Berkebutuhan khusus Ayah <span style="color:red;">*</span> <?php echo form_error('berkebutuhan_khusus_ayah') ?></label>
                                <select type="text" class="form-control" name="berkebutuhan_khusus_ayah" id="berkebutuhan_khusus_ayah" placeholder="Berkebutuhan Khusus Ayah" value="" required/>
                                        <option value="">Pilih</option>
                                        <option value="Tidak">Tidak</option>
                                        <option value="Netra">Netra</option>
                                        <option value="Rungu">Rungu</option>
                                        <option value="Grahita Ringan">Grahita Ringan</option>
                                        <option value="Grahita Sedang">Grahita Sedang</option>
                                        <option value="Daksa Ringan">Daksa Ringan</option>
                                        <option value="Daksa Sedang">Daksa Sedang</option>
                                        <option value="Laras">Laras</option>
                                        <option value="Wicara">Wicara</option>
                                        <option value="Tuna Ganda">Tuna Ganda</option>
                                        <option value="Hiper Aktif">Hiper Aktif</option>
                                        <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                                        <option value="Bakat Istimewa">Bakat Istimewa</option>
                                        <option value="Kesulitan belajar">Kesulitan belajar</option>
                                        <option value="Narkoba">Narkoba</option>
                                        <option value="Indigo">Indigo</option>
                                        <option value="Down Sindrome">Down Sindrome</option>
                                        <option value="Autis">Autis</option>                 
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="berkebutuhan_khusus_ayah" id="berkebutuhan_khusus_ayah" />
                          <?php } ?>                          
                          <?php if ($formulir->nama_ibu=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Nama Ibu <span style="color:red;">*</span> <?php echo form_error('nama_ibu') ?></label>
                                <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" required/>
                          </div>
                          <?php } ?>
                          <?php if ($formulir->nik_ibu=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">NIK Ibu <?php echo form_error('nik_ibu') ?></label>
                                <input type="text" class="form-control" name="nik_ibu" id="nik_ibu" placeholder="NIK Ibu harus tepat 16 karakter" />
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="nik_ibu" id="nik_ibu" />
                          <?php } ?>                          
                          <?php if ($formulir->tahun_lahir_ibu=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Tahun lahir Ibu <span style="color:red;">*</span> <?php echo form_error('tahun_lahir_ibu') ?></label>
                                <input type="text" class="form-control" name="tahun_lahir_ibu" id="tahun_lahir_ibu" placeholder="Tahun lahir Ibu harus tepat 4 karakter" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="tahun_lahir_ibu" id="tahun_lahir_ibu" />
                          <?php } ?>                          
                          <?php if ($formulir->pendidikan_ibu=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Pendidikan Ibu <span style="color:red;">*</span> <?php echo form_error('pendidikan_ibu') ?></label>
                                <select type="text" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu" placeholder="Pendidikan Ibu" value="" required/>
                                        <option value="">Pilih Pendidikan</option>
                                        <option value="Tidak sekolah">Tidak sekolah</option>
                                        <option value="Putus SD">Putus SD</option>
                                        <option value="SD Sederajat">SD Sederajat</option>
                                        <option value="SMP Sederajat">SMP Sederajat</option>
                                        <option value="SMA Sederajat">SMA Sederajat</option>
                                        <option value="D1">D1</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                        <option value="D4/S1">D4/S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu" />
                          <?php } ?>                          
                          <?php if ($formulir->pekerjaan_ibu=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Pekerjaan Ibu <span style="color:red;">*</span> <?php echo form_error('pekerjaan_ibu') ?></label>
                                <select type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu" value="" required/>
                                        <option value="">Pilih Pekerjaan</option>
                                        <option value="Tidak bekerja">Tidak bekerja</option>
                                        <option value="Nelayan">Nelayan</option>
                                        <option value="Petani">Petani</option>
                                        <option value="Peternak">Peternak</option>
                                        <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                        <option value="Karyawan Swasta">Karyawan Swasta</option>
                                        <option value="Pedagang Kecil">Pedagang Kecil</option>
                                        <option value="Pedagang Besar">Pedagang Besar</option>
                                        <option value="Wiraswasta">Wiraswasta</option>
                                        <option value="Wirausaha">Wirausaha</option>
                                        <option value="Buruh">Buruh</option>
                                        <option value="Pensiunan">Pensiunan</option>
                                        <option value="Meninggal Dunia">Meninggal Dunia</option>
                                        <option value="Lainnya">Lainnya</option>
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" />
                          <?php } ?>                          
                          <?php if ($formulir->penghasilan_bulanan_ibu=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Penghasilan bulanan Ibu <span style="color:red;">*</span> <?php echo form_error('penghasilan_bulanan_ibu') ?></label>
                                <select type="text" class="form-control" name="penghasilan_bulanan_ibu" id="penghasilan_bulanan_ibu" placeholder="Penghasilan bulanan Ibu" value="" required/>
                                        <option value="">Pilih Penghasilan</option>
                                        <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                                        <option value="500.000 - 999.999">500.000 - 999.999</option>
                                        <option value="1 juta - 1.999.999">1 juta - 1.999.999 </option>
                                        <option value="2 juta - 4.999.999">2 juta - 4.999.999</option>
                                        <option value="5 juta - 20 juta">5 juta - 20 juta</option>
                                        <option value="Lebih dari 20 juta">Lebih dari 20 juta</option>
                                        <option value="Tidak berpenghasilan">Tidak berpenghasilan</option>
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="penghasilan_bulanan_ibu" id="penghasilan_bulanan_ibu" />
                          <?php } ?>                          
                          <?php if ($formulir->berkebutuhan_khusus_ibu=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Berkebutuhan khusus Ibu <span style="color:red;">*</span> <?php echo form_error('berkebutuhan_khusus_ibu') ?></label>
                                <select type="text" class="form-control" name="berkebutuhan_khusus_ibu" id="berkebutuhan_khusus_ibu" placeholder="Berkebutuhan Khusus Ibu" value="" required/>
                                        <option value="">Pilih</option>
                                        <option value="Tidak">Tidak</option>
                                        <option value="Netra">Netra</option>
                                        <option value="Rungu">Rungu</option>
                                        <option value="Grahita Ringan">Grahita Ringan</option>
                                        <option value="Grahita Sedang">Grahita Sedang</option>
                                        <option value="Daksa Ringan">Daksa Ringan</option>
                                        <option value="Daksa Sedang">Daksa Sedang</option>
                                        <option value="Laras">Laras</option>
                                        <option value="Wicara">Wicara</option>
                                        <option value="Tuna Ganda">Tuna Ganda</option>
                                        <option value="Hiper Aktif">Hiper Aktif</option>
                                        <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                                        <option value="Bakat Istimewa">Bakat Istimewa</option>
                                        <option value="Kesulitan belajar">Kesulitan belajar</option>
                                        <option value="Narkoba">Narkoba</option>
                                        <option value="Indigo">Indigo</option>
                                        <option value="Down Sindrome">Down Sindrome</option>
                                        <option value="Autis">Autis</option>                 
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="berkebutuhan_khusus_ibu" id="berkebutuhan_khusus_ibu" />
                          <?php } ?>                          
                          <?php if ($formulir->nama_wali=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Nama Wali <?php echo form_error('nama_wali') ?></label>
                                <input type="text" class="form-control" name="nama_wali" id="nama_wali" placeholder="Nama Wali" />
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="nama_wali" id="nama_wali" />
                          <?php } ?>                          
                          <?php if ($formulir->nik_wali=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">NIK Wali <?php echo form_error('nik_wali') ?></label>
                                <input type="text" class="form-control" name="nik_wali" id="nik_wali" placeholder="NIK Wali harus tepat 16 karakter" />
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="nik_wali" id="nik_wali" />
                          <?php } ?>                          
                          <?php if ($formulir->tahun_lahir_wali=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Tahun lahir Wali <?php echo form_error('tahun_lahir_wali') ?></label>
                                <input type="text" class="form-control" name="tahun_lahir_wali" id="tahun_lahir_wali" placeholder="Tahun lahir Wali harus tepat 4 karakter" />
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="tahun_lahir_wali" id="tahun_lahir_wali" />
                          <?php } ?>                          
                          <?php if ($formulir->pendidikan_wali=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Pendidikan Wali <?php echo form_error('pendidikan_wali') ?></label>
                                <select type="text" class="form-control" name="pendidikan_wali" id="pendidikan_wali" placeholder="Pendidikan wali" value="" />
                                        <option value="">Pilih Pendidikan</option>
                                        <option value="Tidak sekolah">Tidak sekolah</option>
                                        <option value="Putus SD">Putus SD</option>
                                        <option value="SD Sederajat">SD Sederajat</option>
                                        <option value="SMP Sederajat">SMP Sederajat</option>
                                        <option value="SMA Sederajat">SMA Sederajat</option>
                                        <option value="D1">D1</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                        <option value="D4/S1">D4/S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="pendidikan_wali" id="pendidikan_wali" />
                          <?php } ?>                          
                          <?php if ($formulir->pekerjaan_wali=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Pekerjaan Wali <?php echo form_error('pekerjaan_wali') ?></label>
                                <select type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" placeholder="Pekerjaan Wali" value="" />
                                        <option value="">Pilih Pekerjaan</option>
                                        <option value="Tidak bekerja">Tidak bekerja</option>
                                        <option value="Nelayan">Nelayan</option>
                                        <option value="Petani">Petani</option>
                                        <option value="Peternak">Peternak</option>
                                        <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                        <option value="Karyawan Swasta">Karyawan Swasta</option>
                                        <option value="Pedagang Kecil">Pedagang Kecil</option>
                                        <option value="Pedagang Besar">Pedagang Besar</option>
                                        <option value="Wiraswasta">Wiraswasta</option>
                                        <option value="Wirausaha">Wirausaha</option>
                                        <option value="Buruh">Buruh</option>
                                        <option value="Pensiunan">Pensiunan</option>
                                        <option value="Meninggal Dunia">Meninggal Dunia</option>
                                        <option value="Lainnya">Lainnya</option>
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" />
                          <?php } ?>                          
                          <?php if ($formulir->penghasilan_bulanan_wali=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Penghasilan bulanan Wali <?php echo form_error('penghasilan_bulanan_wali') ?></label>
                                <select type="text" class="form-control" name="penghasilan_bulanan_wali" id="penghasilan_bulanan_wali" placeholder="Penghasilan bulanan Wali" value="" />
                                        <option value="">Pilih Penghasilan</option>
                                        <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                                        <option value="500.000 - 999.999">500.000 - 999.999</option>
                                        <option value="1 juta - 1.999.999">1 juta - 1.999.999 </option>
                                        <option value="2 juta - 4.999.999">2 juta - 4.999.999</option>
                                        <option value="5 juta - 20 juta">5 juta - 20 juta</option>
                                        <option value="Lebih dari 20 juta">Lebih dari 20 juta</option>
                                        <option value="Tidak berpenghasilan">Tidak berpenghasilan</option>
                                </select>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="penghasilan_bulanan_wali" id="penghasilan_bulanan_wali" />
                          <?php } ?>                          
                          <?php if ($formulir->no_telepon_rumah=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">No Telepon Rumah <?php echo form_error('no_telepon_rumah') ?></label>
                                <input type="text" class="form-control" name="no_telepon_rumah" id="no_telepon_rumah" placeholder="No Telepon Rumah" />
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="no_telepon_rumah" id="no_telepon_rumah" />
                          <?php } ?>                          
                          <?php if ($formulir->nomor_hp=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">No Handphone <?php echo form_error('nomor_hp') ?></label>
                                <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="No Handphone" />
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="nomor_hp" id="nomor_hp" />
                          <?php } ?>                          
                          <?php if ($formulir->email=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Email <?php echo form_error('email') ?></label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" />
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="email" id="email" />
                          <?php } ?>                          
                    </div>
                  </div>
                </div>
                <div class="panel box box-info">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                        Data Priodik
                      </a>
                    </h4>
                  </div>
                  <div id="collapseFive" class="panel-collapse collapse">
                    <div class="box-body">
                          <div class="callout callout-info">
                                <p>CATATAN : isian dengan tanda <span style="color:red;"><strong>* wajib diisi.</strong></span></p>
                          </div>                          
                          <!-- isi dengan form sesuai kebutuhan -->
                          <?php if ($formulir->tinggi_badan=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Tinggi Badan <span style="color:red;">*</span> <?php echo form_error('tinggi_badan') ?></label>
                                <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="tinggi_badan" id="tinggi_badan" />
                          <?php } ?>                          
                          <?php if ($formulir->berat_badan=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Berat Badan <span style="color:red;">*</span> <?php echo form_error('berat_badan') ?></label>
                                <input type="text" class="form-control" name="berat_badan" id="berat_badan" placeholder="Berat Badan" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="berat_badan" id="berat_badan" />
                          <?php } ?>                          
                          <?php if ($formulir->jarak_ke_sekolah=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Jarak ke sekolah <span style="color:red;">*</span> <?php echo form_error('id_jarak') ?></label>
                                <select type="text" class="select2 form-control" name="id_jarak" id="id_jarak" placeholder="Jarak ke sekolah" value="" required/>
                                    <option value="">Pilih Jarak</option>
                                    <?php foreach ($jarak as $key => $value) { ?>
                                        <option value="<?= $value->id_jarak;?>">
                                            <?= $value->jarak;?>
                                        </option>
                                    <?php }?>
                                </select>
                          </div>
                          <?php } ?>
                          <?php if ($formulir->jumlah_saudara_kandung=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Jumlah saudara kandung <span style="color:red;">*</span> <?php echo form_error('jumlah_saudara_kandung') ?></label>
                                <input type="text" class="form-control" name="jumlah_saudara_kandung" id="jumlah_saudara_kandung" placeholder="Jumlah saudara kandung" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="jumlah_saudara_kandung" id="jumlah_saudara_kandung" />
                          <?php } ?>
                    </div>
                  </div>
                </div>
                <!-- star nilai -->
<?php if ($formulir->nilai_usbn=='Ya' || $formulir->nilai_rapor=='Ya' || $formulir->nilai_unbk_unkp=='Ya'){ ?>                
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                        Data Nilai
                      </a>
                    </h4>
                  </div>
                  <div id="collapseSix" class="panel-collapse collapse">
                    <div class="box-body">
                          <div class="callout callout-info">
                                <p>CATATAN : isian dengan tanda <span style="color:red;"><strong>* wajib diisi.</strong></span></p>
                          </div>                          
                          <?php if ($formulir->nilai_rapor=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Nilai Rata-rata Rapor <span style="color:red;">*</span> <?php echo form_error('nilai_rapor') ?></label>
                                <input type="text" class="form-control" name="nilai_rapor" id="nilai_rapor" placeholder="Nilai Rata-rata Rapor yang terdapat pada SKL/SKHU/Ijazah" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="nilai_rapor" id="nilai_rapor" value="0"/>
                          <?php } ?>
                          <?php if ($formulir->nilai_usbn=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Nilai Rata-rata USBN <span style="color:red;">*</span> <?php echo form_error('nilai_usbn') ?></label>
                                <input type="text" class="form-control" name="nilai_usbn" id="nilai_usbn" placeholder="Nilai Rata-rata USBN yang terdapat pada SKL/SKHU/Ijazah" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="nilai_usbn" id="nilai_usbn" value="0"/>
                          <?php } ?>                          
                          <?php if ($formulir->nilai_unbk_unkp=='Ya'){ ?>
                          <div class="form-group">
                                <label for="varchar">Nilai Rata-rata UN <span style="color:red;">*</span> <?php echo form_error('nilai_unbk_unkp') ?></label>
                                <input type="text" class="form-control" name="nilai_unbk_unkp" id="nilai_unbk_unkp" placeholder="Nilai Rata-rata UN yang terdapat pada SKL/SKHU/Ijazah" required/>
                          </div>
                          <?php } else { ?>
                                <input type="hidden" class="form-control" name="nilai_unbk_unkp" id="nilai_unbk_unkp" value="0"/>
                          <?php } ?>
                    </div>
                  </div>
                </div> 
<?php } ?>                  
                <!-- end nilai -->
                <div class="panel box box-warning">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                        Konfirmasi Data
                      </a>
                    </h4>
                  </div>
                  <div id="collapseSeven" class="panel-collapse collapse">
                    <div class="box-body">
                          <div class="callout callout-info">
                              <p>
                                <ul>
                                  <li>Proses pengisian formulir pendaftaran hampir selesai. Silahkan periksa kembali data-data yang sudah anda masukkan.</li>
                                  <li>Pastikan semua data sudah diisi dan lengkap.</li>
                                  <li>Data yang sudah dikirimkan tidak dapat diperbaiki lagi.</li>
                                </ul> 
                              </p>                                
                          </div>
                          <div class="form-group">
                                <label>Apakah data sudah sesuai dan lengkap? <span style="color:red;">*</label><br/>
                                <input type="checkbox" name="konfirmasi" id="konfirmasi" value="Ya" required>&nbsp; Ya, data sudah sesuai dan lengkap
                          </div>       
                          <input type="hidden" class="form-control" name="status" id="status" value="Belum diverifikasi" />  
                          <input type="hidden" class="form-control" name="status_hasil" id="status_hasil" value="Belum ada" />
                          <input type="hidden" class="form-control" name="status_daftar_ulang" id="status_daftar_ulang" value="Menunggu" />                          
                          <input type="hidden" class="form-control" name="id_users" id="id_users" value="<?= $user->id; ?>" />
                    </div>
                  </div>
                </div>                                              
                <!-- <input type="hidden" name="id_sekolah" value="<?php echo $id_sekolah; ?>" />  -->
                <button type="submit" class="<?= $this->config->item('botton')?>">Simpan Formulir Pendaftaran</button>

              </div>
            </div>
          </div>
        </div>
<!-- awal collapse -->
            </form>
          </div>
        <!-- div class="box-footer"></div -->
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
                        <p>    
                            <ul>
                                <li>Aktifkan koneksi internet untuk menampilkan MAPS</li>
                                <li>Entry manual latitude dan longitude jika memang tidak ada koneksi internet</li>
                            </ul>
                        </p>  
                    </div>
                </div>    
              </div>      
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal Asal Sekolah-->
<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header <?= $this->config->item('header')?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fas fa-school"></i>&nbsp; Asal sekolah</h4>
      </div>
      <div class="modal-body">
        <div class="callout callout-info">
            <p>Tambah data asal sekolah jika asal sekolah tidak terdaftar pada pilihan</p>
        </div>
            <form action="tambah_sekolah" method="post">
                <div class="form-group">
                    <label for="varchar">NPSN Sekolah <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="npsn_sekolah" id="npsn_sekolah" placeholder="NPSN Sekolah" required/>
                </div>
                <div class="form-group">
                    <label for="varchar">Nama Asal Sekolah <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" placeholder="Nama Asal Sekolah" required/>
                </div>
                <div class="form-group">
                    <label for="varchar">Alamat Sekolah <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="alamat_sekolah" id="alamat_sekolah" placeholder="Alamat Sekolah" required/>
                </div>
                <div class="form-group">
                    <label for="varchar">Kelurahan <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" required/>
                </div>
                <div class="form-group">
                    <label for="varchar">Status Sekolah <span style="color:red;">*</span></label>
                    <select type="text" class="form-control" name="status_sekolah" id="status_sekolah" placeholder="Status Sekolah" required/>
                        <option value="">Pilih Status Sekolah</option>
                        <option value="NEGERI">NEGERI</option>
                        <option value="SWASTA">SWASTA</option>
                    </select>
                </div>                
                <div class="form-group">
                    <label for="varchar">Kecamatan <span style="color:red;">*</span></label>
                    <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" required/>
                </div>
                <input type="hidden" name="id_sekolah" value="<?php echo $id_sekolah; ?>" /> 
                <button type="submit" class="<?= $this->config->item('botton')?>">Tambah Sekolah</button>
            </form>               
      </div>
    </div>
  </div>
</div>

<?php } ?>