<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Inputan Formulir Calon Peserta Didik</h3>
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
                <form action="formulir/update_action" method="post">   
                <div class="form-group">
                    <label for="longtext">Ketentuan</label>
                    <textarea id="ketentuan" name="ketentuan" style="height: 180px;"><?php echo $formulir->ketentuan; ?></textarea>
                </div>

                <div class="callout callout-info">
                    Untuk Kode awal Nomer Pendaftaran Daring atau Kode awal Nomer Pendaftaran Luring tidak disarankan mengandung <strong><span style="color:red;">HURUF</span></strong>.
                </div>                

                <div class="row">     
                  <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                        <label for="varchar">Tipe Formulir</label>
                        <select type="text" class="form-control" name="tipe" id="tipe" value="" />
                            <option value="<?php echo $formulir->tipe; ?>">
                                <?php if ($formulir->tipe=='1') {
                                  echo "Smart Wizard";
                                } else if ($formulir->tipe=='2'){
                                  echo "Collapsible";  
                                } else {
                                  echo "General Form";  
                                }
                                ?>
                            </option>
                            <option value="1">Smart Wizard</option>
                            <option value="2">Collapsible</option>
                            <option value="3">General Form</option>
                        </select>                    
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                        <label for="varchar">Kode Awal Pendaftaran Daring</label>
                        <input type="text" class="form-control" name="kode_daring" id="kode_daring" placeholder="Kode No. Pendaftaran Daring" value="<?php echo $formulir->kode_daring; ?>" required/>                  
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                        <label for="varchar">Kode Awal Pendaftaran Luring</label>
                        <input type="text" class="form-control" name="kode_luring" id="kode_luring" placeholder="Kode No. Pendaftaran Luring" value="<?php echo $formulir->kode_luring; ?>" required/>                  
                    </div>
                  </div>
                </div>

                    <div class="row">                     
                      <div class="col-xs-12 col-md-3"> 
                        <div class="form-group">                      
                          <input type="checkbox" name="kode_formulir" id="kode_formulir" value="Ya" <?php if ($formulir->kode_formulir=='Ya') { echo 'checked'; } ?>>&nbsp; Kode Akhir Daring/Luring
                        </div>                                          
                        <div class="form-group">
                          <label for="varchar"><span class="label bg-yellow">Data Registrasi</span></label>
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="tahun_pelajaran" id="tahun_pelajaran" value="Ya" checked required>&nbsp; Tahun Pelajaran
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="jalur_pendaftaran" id="jalur_pendaftaran" value="Ya" checked required>&nbsp; Jalur Pendaftaran 
                        </div>   
                        <div class="form-group">                      
                          <input type="checkbox" name="asal_sekolah" id="asal_sekolah" value="Ya" checked required>&nbsp; Asal Sekolah
                        </div>                                     
                        <div class="form-group">                      
                          <input type="checkbox" name="no_peserta_ujian" id="no_peserta_ujian" value="Ya" <?php if ($formulir->no_peserta_ujian=='Ya') { echo 'checked'; } ?>>&nbsp; No Peserta UN 
                        </div>     
                        <div class="form-group">                      
                          <input type="checkbox" name="no_seri_ijazah" id="no_seri_ijazah" value="Ya" <?php if ($formulir->no_seri_ijazah=='Ya') { echo 'checked'; } ?>>&nbsp; No Seri Ijazah
                        </div>                                   
                        <div class="form-group">                      
                          <input type="checkbox" name="no_seri_skhu" id="no_seri_skhu" value="Ya" <?php if ($formulir->no_seri_skhu=='Ya') { echo 'checked'; } ?>>&nbsp; No Seri SKHU
                        </div>                    
                        <div class="form-group">                      
                          <input type="checkbox" name="jurusan" id="jurusan" value="Ya" <?php if ($formulir->jurusan=='Ya') { echo 'checked'; } ?>>&nbsp; Jurusan 
                        </div>                    
                      </div> 

                      <div class="col-xs-12 col-md-3">                    
                        <div class="form-group">
                          <label for="varchar"><span class="label bg-green">Data Pribadi</span></label>
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="nama_peserta" id="nama_peserta" value="Ya" checked required>&nbsp; Nama Peserta
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="jenis_kelamin" id="jenis_kelamin" value="Ya" checked required>&nbsp; Jenis Kelamin
                        </div>                                         
                        <div class="form-group">                      
                          <input type="checkbox" name="nisn" id="nisn" value="Ya" checked required>&nbsp; NISN 
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="nik" id="nik" value="Ya" <?php if ($formulir->nik=='Ya') { echo 'checked'; } ?>>&nbsp; NIK
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="tempat_lahir" id="tempat_lahir" value="Ya" checked required>&nbsp; Tempat Lahir 
                        </div>                                         
                        <div class="form-group">                      
                          <input type="checkbox" name="tanggal_lahir" id="tanggal_lahir" value="Ya" checked required>&nbsp; Tanggal Lahir 
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="no_registrasi_akta_lahir" id="no_registrasi_akta_lahir" value="Ya" <?php if ($formulir->no_registrasi_akta_lahir=='Ya') { echo 'checked'; } ?>>&nbsp; No Registrasi Akta Lahir
                        </div>                                         
                        <div class="form-group">                      
                          <input type="checkbox" name="agama" id="agama" value="Ya" checked required>&nbsp; Agama  
                        </div>                         
                        <div class="form-group">                      
                          <input type="checkbox" name="kewarganegaraan" id="kewarganegaraan" value="Ya" <?php if ($formulir->kewarganegaraan=='Ya') { echo 'checked'; } ?>>&nbsp; Kewarganegaraan
                        </div>                                         
                        <div class="form-group">                      
                          <input type="checkbox" name="berkebutuhan_khusus" id="berkebutuhan_khusus" value="Ya" <?php if ($formulir->berkebutuhan_khusus=='Ya') { echo 'checked'; } ?>>&nbsp; Berkebutuhan Khusus  
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="alamat" id="alamat" value="Ya" checked required>&nbsp; Alamat 
                        </div>                                         
                        <div class="form-group">                      
                          <input type="checkbox" name="rt" id="rt" value="Ya" <?php if ($formulir->rt=='Ya') { echo 'checked'; } ?>>&nbsp; RT   
                        </div>                         
                        <div class="form-group">                      
                          <input type="checkbox" name="rw" id="rw" value="Ya" <?php if ($formulir->rw=='Ya') { echo 'checked'; } ?>>&nbsp; RW 
                        </div>                                         
                        <div class="form-group">                      
                          <input type="checkbox" name="nama_dusun" id="nama_dusun" value="Ya" <?php if ($formulir->nama_dusun=='Ya') { echo 'checked'; } ?>>&nbsp; Nama Dusun  
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="nama_kelurahan" id="nama_kelurahan" value="Ya" <?php if ($formulir->nama_kelurahan=='Ya') { echo 'checked'; } ?>>&nbsp; Nama Kelurahan  
                        </div>                                         
                        <div class="form-group">                      
                          <input type="checkbox" name="kecamatan" id="kecamatan" value="Ya" <?php if ($formulir->kecamatan=='Ya') { echo 'checked'; } ?>>&nbsp; Kecamatan  
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="kode_pos" id="kode_pos" value="Ya" <?php if ($formulir->kode_pos=='Ya') { echo 'checked'; } ?>>&nbsp; Kode Pos  
                        </div>                                         
                        <div class="form-group">                      
                          <input type="checkbox" name="latitude" id="latitude" value="Ya" <?php if ($formulir->latitude=='Ya') { echo 'checked'; } ?>>&nbsp; Latitude  
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="longitude" id="longitude" value="Ya" <?php if ($formulir->longitude=='Ya') { echo 'checked'; } ?>>&nbsp; Longitude  
                        </div>                                         
                        <div class="form-group">                      
                          <input type="checkbox" name="tempat_tinggal" id="tempat_tinggal" value="Ya" <?php if ($formulir->tempat_tinggal=='Ya') { echo 'checked'; } ?>>&nbsp; Tempat Tinggal  
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="moda_transportasi" id="moda_transportasi" value="Ya" <?php if ($formulir->moda_transportasi=='Ya') { echo 'checked'; } ?>>&nbsp; Moda Transportasi  
                        </div>                                         
                        <div class="form-group">                      
                          <input type="checkbox" name="no_kks" id="no_kks" value="Ya" <?php if ($formulir->no_kks=='Ya') { echo 'checked'; } ?>>&nbsp; No KKS  
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="anak_ke" id="anak_ke" value="Ya" <?php if ($formulir->anak_ke=='Ya') { echo 'checked'; } ?>>&nbsp; Anak ke   
                        </div>                                         
                        <div class="form-group">                      
                          <input type="checkbox" name="penerima_kps_pkh" id="penerima_kps_pkh" value="Ya" <?php if ($formulir->penerima_kps_pkh=='Ya') { echo 'checked'; } ?>>&nbsp; Penerima KPS/PKH  
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="no_kps_pkh" id="no_kps_pkh" value="Ya" <?php if ($formulir->no_kps_pkh=='Ya') { echo 'checked'; } ?>>&nbsp; No KPS/PKH  
                        </div>                                         
                        <div class="form-group">                      
                          <input type="checkbox" name="penerima_kip" id="penerima_kip" value="Ya" <?php if ($formulir->penerima_kip=='Ya') { echo 'checked'; } ?>>&nbsp; Penerima KIP  
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="no_kip" id="no_kip" value="Ya" <?php if ($formulir->no_kip=='Ya') { echo 'checked'; } ?>>&nbsp; No KIP   
                        </div>                                         
                        <div class="form-group">                      
                          <input type="checkbox" name="nama_tertera_di_kip" id="nama_tertera_di_kip" value="Ya" <?php if ($formulir->nama_tertera_di_kip=='Ya') { echo 'checked'; } ?>>&nbsp; Nama tertera di KIP  
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="terima_fisik_kartu_kip" id="terima_fisik_kartu_kip" value="Ya" <?php if ($formulir->terima_fisik_kartu_kip=='Ya') { echo 'checked'; } ?>>&nbsp; Terima fisik kartu KIP   
                        </div>                                         
                        <div class="form-group">                      
                          <input type="checkbox" name="jenis_ekstrakurikuler" id="jenis_ekstrakurikuler" value="Ya" <?php if ($formulir->jenis_ekstrakurikuler=='Ya') { echo 'checked'; } ?>>&nbsp; Hobi
                        </div>
                      </div> 

                      <div class="col-xs-12 col-md-3">                    
                        <div class="form-group">
                          <label for="varchar"><span class="label bg-purple">Data Ayah</span></label>
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="nama_ayah" id="nama_ayah" value="Ya" checked required>&nbsp; Nama Ayah
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="nik_ayah" id="nik_ayah" value="Ya" <?php if ($formulir->nik_ayah=='Ya') { echo 'checked'; } ?>>&nbsp; NIK Ayah
                        </div>   
                        <div class="form-group">                      
                          <input type="checkbox" name="tahun_lahir_ayah" id="tahun_lahir_ayah" value="Ya" <?php if ($formulir->tahun_lahir_ayah=='Ya') { echo 'checked'; } ?>>&nbsp; Tahun Lahir Ayah
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="pendidikan_ayah" id="pendidikan_ayah" value="Ya" <?php if ($formulir->pendidikan_ayah=='Ya') { echo 'checked'; } ?>>&nbsp; Pendidikan Ayah 
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="pekerjaan_ayah" id="pekerjaan_ayah" value="Ya" <?php if ($formulir->pekerjaan_ayah=='Ya') { echo 'checked'; } ?>>&nbsp; Pekerjaan Ayah
                        </div>   
                        <div class="form-group">                      
                          <input type="checkbox" name="penghasilan_bulanan_ayah" id="penghasilan_bulanan_ayah" value="Ya" <?php if ($formulir->penghasilan_bulanan_ayah=='Ya') { echo 'checked'; } ?>>&nbsp; Penghasilan bulanan Ayah 
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="berkebutuhan_khusus_ayah" id="berkebutuhan_khusus_ayah" value="Ya" <?php if ($formulir->berkebutuhan_khusus_ayah=='Ya') { echo 'checked'; } ?>>&nbsp; Berkebutuhan khusus Ayah
                        </div>               

                        <div class="form-group">
                          <label for="varchar"><span class="label bg-purple">Data Ibu</span></label>
                        </div>                                                             
                        <div class="form-group">                      
                          <input type="checkbox" name="nama_ibu" id="nama_ibu" value="Ya" checked required>&nbsp; Nama Ibu 
                        </div>     
                        <div class="form-group">                      
                          <input type="checkbox" name="nik_ibu" id="nik_ibu" value="Ya" <?php if ($formulir->nik_ibu=='Ya') { echo 'checked'; } ?>>&nbsp; NIK Ibu 
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="tahun_lahir_ibu" id="tahun_lahir_ibu" value="Ya" <?php if ($formulir->tahun_lahir_ibu=='Ya') { echo 'checked'; } ?>>&nbsp; Tahun Lahir Ibu 
                        </div>     
                        <div class="form-group">                      
                          <input type="checkbox" name="pendidikan_ibu" id="pendidikan_ibu" value="Ya" <?php if ($formulir->pendidikan_ibu=='Ya') { echo 'checked'; } ?>>&nbsp; Pendidikan Ibu
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="pekerjaan_ibu" id="pekerjaan_ibu" value="Ya" <?php if ($formulir->pekerjaan_ibu=='Ya') { echo 'checked'; } ?>>&nbsp; Pekerjaan Ibu 
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="penghasilan_bulanan_ibu" id="penghasilan_bulanan_ibu" value="Ya" <?php if ($formulir->penghasilan_bulanan_ibu=='Ya') { echo 'checked'; } ?>>&nbsp; Penghasilan bulanan Ibu 
                        </div>     
                        <div class="form-group">                      
                          <input type="checkbox" name="berkebutuhan_khusus_ibu" id="berkebutuhan_khusus_ibu" value="Ya" <?php if ($formulir->berkebutuhan_khusus_ibu=='Ya') { echo 'checked'; } ?>>&nbsp; Berkebutuhan khusus Ibu
                        </div> 

                        <div class="form-group">
                          <label for="varchar"><span class="label bg-purple">Data Wali</span></label>
                        </div>                                                          
                        <div class="form-group">                      
                          <input type="checkbox" name="nama_wali" id="nama_wali" value="Ya" <?php if ($formulir->nama_wali=='Ya') { echo 'checked'; } ?>>&nbsp; Nama Wali 
                        </div>                    
                        <div class="form-group">                      
                          <input type="checkbox" name="nik_wali" id="nik_wali" value="Ya" <?php if ($formulir->nik_wali=='Ya') { echo 'checked'; } ?>>&nbsp; NIK Wali   
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="tahun_lahir_wali" id="tahun_lahir_wali" value="Ya" <?php if ($formulir->tahun_lahir_wali=='Ya') { echo 'checked'; } ?>>&nbsp; Tahun Lahir Wali 
                        </div>                    
                        <div class="form-group">                      
                          <input type="checkbox" name="pendidikan_wali" id="pendidikan_wali" value="Ya" <?php if ($formulir->pendidikan_wali=='Ya') { echo 'checked'; } ?>>&nbsp; Pendidikan Wali
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="pekerjaan_wali" id="pekerjaan_wali" value="Ya" <?php if ($formulir->pekerjaan_wali=='Ya') { echo 'checked'; } ?>>&nbsp; Pekerjaan Wali   
                        </div>                    
                        <div class="form-group">                      
                          <input type="checkbox" name="penghasilan_bulanan_wali" id="penghasilan_bulanan_wali" value="Ya" <?php if ($formulir->penghasilan_bulanan_wali=='Ya') { echo 'checked'; } ?>>&nbsp; Penghasilan bulanan Wali 
                        </div> 
                      </div> 

                      <div class="col-xs-12 col-md-3">                    
                        <div class="form-group">
                          <label for="varchar"><span class="label bg-red">Data Kontak</span></label>
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="no_telepon_rumah" id="no_telepon_rumah" value="Ya" <?php if ($formulir->no_telepon_rumah=='Ya') { echo 'checked'; } ?>>&nbsp; No Telepon Rumah
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="nomor_hp" id="nomor_hp" value="Ya" checked required>&nbsp; No Handphone
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="email" id="email" value="Ya" <?php if ($formulir->email=='Ya') { echo 'checked'; } ?>>&nbsp; Email
                        </div> 

                        <div class="form-group">
                          <label for="varchar"><span class="label bg-blue">Data Priodik</span></label>
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="tinggi_badan" id="tinggi_badan" value="Ya" <?php if ($formulir->tinggi_badan=='Ya') { echo 'checked'; } ?>>&nbsp; Tinggi Badan
                        </div>  
                        <div class="form-group">                      
                          <input type="checkbox" name="berat_badan" id="berat_badan" value="Ya" <?php if ($formulir->berat_badan=='Ya') { echo 'checked'; } ?>>&nbsp; Berat Badan
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="jarak_ke_sekolah" id="jarak_ke_sekolah" value="Ya" checked required>&nbsp; Jarak ke Sekolah
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="jumlah_saudara_kandung" id="jumlah_saudara_kandung" value="Ya" <?php if ($formulir->jumlah_saudara_kandung=='Ya') { echo 'checked'; } ?>>&nbsp; Jumlah saudara kandung 
                        </div> 

                        <div class="form-group">
                          <label for="varchar"><span class="label bg-aqua">Data Nilai</span></label>
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="nilai_rapor" id="nilai_rapor" value="Ya" <?php if ($formulir->nilai_rapor=='Ya') { echo 'checked'; } ?>>&nbsp; Nilai Rapor
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="nilai_usbn" id="nilai_usbn" value="Ya" <?php if ($formulir->nilai_usbn=='Ya') { echo 'checked'; } ?>>&nbsp; Nilai USBN
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="nilai_unbk_unkp" id="nilai_unbk_unkp" value="Ya" <?php if ($formulir->nilai_unbk_unkp=='Ya') { echo 'checked'; } ?>>&nbsp; Nilai UN 
                        </div> 

                        <div class="form-group">
                          <label for="varchar"><span class="label bg-maroon">Data Pendukung</span></label>
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="foto" id="foto" value="Ya" <?php if ($formulir->foto=='Ya') { echo 'checked'; } ?>>&nbsp; Foto berwarna 3x4
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="foto_full" id="foto_full" value="Ya" <?php if ($formulir->foto_full=='Ya') { echo 'checked'; } ?>>&nbsp; Foto Seluruh Badan
                        </div>  
                        <div class="form-group">                      
                          <input type="checkbox" name="skl_skhu" id="skl_skhu" value="Ya" <?php if ($formulir->skl_skhu=='Ya') { echo 'checked'; } ?>>&nbsp; SKL/SKHU/Ijazah
                        </div>                         
                        <div class="form-group">                      
                          <input type="checkbox" name="rapor" id="rapor" value="Ya" <?php if ($formulir->rapor=='Ya') { echo 'checked'; } ?>>&nbsp; Nilai Rapor Semester 1-5
                        </div>                                                
                        <div class="form-group">                      
                          <input type="checkbox" name="akte_kelahiran" id="akte_kelahiran" value="Ya" <?php if ($formulir->akte_kelahiran=='Ya') { echo 'checked'; } ?>>&nbsp; Akta Kelahiran
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="kartu_keluarga" id="kartu_keluarga" value="Ya" <?php if ($formulir->kartu_keluarga=='Ya') { echo 'checked'; } ?>>&nbsp; Kartu Keluarga
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="ktp_ortu" id="ktp_ortu" value="Ya" <?php if ($formulir->ktp_ortu=='Ya') { echo 'checked'; } ?>>&nbsp; KTP Orangtua
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="sptjm" id="sptjm" value="Ya" <?php if ($formulir->sptjm=='Ya') { echo 'checked'; } ?>>&nbsp; SPTJM Orangtua
                        </div>
                        <div class="form-group">                      
                          <input type="checkbox" name="sp" id="sp" value="Ya" <?php if ($formulir->sp=='Ya') { echo 'checked'; } ?>>&nbsp; Surat Penugasan dari Instansi
                        </div>                                                                               
                        <div class="form-group">                      
                          <input type="checkbox" name="skd" id="skd" value="Ya" <?php if ($formulir->skd=='Ya') { echo 'checked'; } ?>>&nbsp; Surat Keterangan Domisili
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="sktm" id="sktm" value="Ya" <?php if ($formulir->sktm=='Ya') { echo 'checked'; } ?>>&nbsp; Surat Keterangan Tidak Mampu
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="kartu_bantuan" id="kartu_bantuan" value="Ya" <?php if ($formulir->kartu_bantuan=='Ya') { echo 'checked'; } ?>>&nbsp; Kartu PKH/KPS/KIP
                        </div> 
                        <div class="form-group">                      
                          <input type="checkbox" name="berkaslain" id="berkaslain" value="Ya" <?php if ($formulir->berkaslain=='Ya') { echo 'checked'; } ?>>&nbsp; Berkas lainnya
                        </div>                         

                      </div>
                    </div> 
                    <input type="hidden" name="id_formulir" value="<?php echo $formulir->id_formulir; ?>" /> 
                    <button type="submit" class="<?= $this->config->item('botton')?>">Simpan <span class="hidden-xs">Inputan Formulir</span></button> 
                    <a href="<?php echo site_url('dashboard') ?>" class="btn btn-default btn-flat">Batal</a>
                    <a href="formulir/cetak" class="btn bg-purple btn-flat" target="blank"><i class="fa fa-print"></i><span class="hidden-xs">&nbsp;&nbsp;Cetak Formulir</span></a>
                </form>
            </div>
        </div>
    </div>
</div>