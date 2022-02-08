<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-header <?= $this->config->item('header')?>">
        <img src="<?php echo base_url('assets/dist/img/nenemowhite.png') ?>" width="55" height="25">
          <h3 class="box-title"><?= $this->config->item('sitename')?> <?php echo strtoupper($pengaturan->nama_sekolah) ?></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
      </div>
    </div>
  </div>
</div>

      <div class="row">
        <div class="col-xs-12">
          <div class="callout callout-info">
          <?php if ($kuotax) { ?>  
            Jadwal PPDB : <?php echo date('d F Y', strtotime($kuotax->tanggal_mulai_pendaftaran)) ?> s.d. <?php echo date('d F Y', strtotime($kuotax->tanggal_selesai_pendaftaran)) ?>
          <?php } else { ?>
            Tahun Penerimaan belum diaktifkan
          <?php } ?>  
          </div>
        </div>
      </div> 

<?php
if ($this->ion_auth->is_admin() || $group->group_id=="3"){ ?>    
<!-- dashboard admin -->    
<!-- Default box -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fas fa-map-marked-alt"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><?php echo $jalur1->jalur ?></span>
              <span class="info-box-number"><?php echo $totaljalur1 ?></span>
              <div class="progress">
                <div class="progress-bar" style="width : <?php echo $barjalur1.'%' ?>"></div>
              </div>
              <span class="progress-description">
                Kuota <?php echo round($KuotaJalur1) ?>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fas fa-user-graduate"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><?php echo $jalur2->jalur ?></span>
              <span class="info-box-number"><?php echo $totaljalur2 ?></span>
              <div class="progress">
                <div class="progress-bar" style="width : <?php echo $barjalur2.'%' ?>"></div>
              </div>
              <span class="progress-description">
                Kuota <?php echo round($KuotaJalur2) ?>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fas fa-id-card"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><?php echo $jalur3->jalur ?></span>
              <span class="info-box-number"><?php echo $totaljalur3 ?></span>
              <div class="progress">
                <div class="progress-bar" style="width : <?php echo $barjalur3.'%' ?>"></div>
              </div>
              <span class="progress-description">
                Kuota <?php echo round($KuotaJalur3) ?>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fas fa-exchange-alt"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><?php echo $jalur4->jalur ?></span>
              <span class="info-box-number"><?php echo $totaljalur4 ?></span>
              <div class="progress">
                <div class="progress-bar" style="width : <?php echo $barjalur4.'%' ?>"></div>
              </div>
              <span class="progress-description">
                Kuota <?php echo round($KuotaJalur4) ?>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-teal">
            <div class="inner">
              <h3><?php echo $totalpeserta ?></h3>
              <p>Total Pendaftar</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="<?= base_url();?>peserta" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>            
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo $totalbaru ?></h3>
              <p>Pendaftar Baru</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-plus"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $totaldiverifikasi ?></h3>
              <p>Pendaftar sudah diverifikasi</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-check"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo $totalberkaskurang ?></h3>
              <p>Berkas kurang/tidak sesuai</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-alt"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>

<!-- progress bar -->  
<?php if ($pengaturan->jenjang=='SMK') { ?>   
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Progress Bar Pendaftar</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">  
              <?php foreach ($countjurusan as $value) { 
                $kuota_jalur = ($value->kuota_jurusan * $value->persentase)/100; ?>           
                <div class="col-md-6 col-xs-12">                                 
                    <div class="progress-group">
                      <span class="progress-text"><?= $value->nama_jurusan ?></span>
                      <span class="progress-number">Pendaftar <span class="label label-success"><?= $value->countjurusan ?></span> / Kuota <span class="label label-primary"><?= $value->kuota_jurusan ?></span></span>
                      <div class="progress sm">
                        <div class="progress-bar progress-bar-red progress-bar-striped" style="width: <?php echo ($value->countjurusan/$value->kuota_jurusan*100).'%' ?>">
                        </div>
                      </div>
                    </div>                
                </div>
                <div class="col-md-6 col-xs-12">           
                    <div class="progress-group">
                      <span class="progress-text"><?= $value->jalur ?></span>
                      <span class="progress-number">Pendaftar <span class="label label-success"><?= $value->countjalur ?></span> / Kuota <span class="label label-primary"><?= round($kuota_jalur) ?></span></span>
                      <div class="progress sm">
                        <div class="progress-bar progress-bar-yellow progress-bar-striped" style="width: <?php echo ($value->countjalur/$kuota_jalur*100).'%' ?>">
                        </div>
                      </div>
                    </div>
                </div>
              <?php } ?>                  
            </div>
          </div>
        </div>   
      </div>    
<?php } ?>      
<!-- end progress bar -->                  

<!-- start GIS Peserta + log aktivitas -->  
<?php if ($pengaturan->gis=='Ya') { ?>
      <div class="row">
<!-- start GIS Peserta -->     
        <div class="col-md-8 col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">GIS Calon Peserta Didik</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
              </div>
            </div>
            <?php
            function cek_internet(){
               $connected = @fsockopen("www.google.com", 80);
               if ($connected){
                  $is_conn = true;
                  fclose($connected);
               } else {
                  $is_conn = false;
               }
               return $is_conn;
            }
            
            if (cek_internet() == true) { ?>  
                <div class="box-body">
                  <?php 
                    $this->load->library('googlemaps');
                    $config['apiKey']="$pengaturan->apikey";          
                    $config['center']="$pengaturan->latitude,$pengaturan->longitude";
                    $config['zoom']='15';
                    $this->googlemaps->initialize($config);

                    foreach ($peserta as $key => $value) {
                        $marker=array();
                        $marker['animation']='DROP';
                        $marker['position']="$value->latitude,$value->longitude";
                        $marker['infowindow_content']='<div class="media" style="width:150px;">';
                        $marker['infowindow_content'].='<div class="media-left">';
                        $marker['infowindow_content'].='</div>';
                        $marker['infowindow_content'].='<div class="media-body">';
                        $marker['infowindow_content'].='<h5 class="media-heading">'.$value->nama_peserta.'</h5>';
                        $marker['infowindow_content'].='<a>No. '.$value->no_pendaftaran.'</a>';
                        $marker['infowindow_content'].='</div>';
                        $marker['infowindow_content'].='</div>';
                        $marker['icon']=base_url('assets/icon/person.png');

                    $this->googlemaps->add_marker($marker);
                    }
                    $this->googlemaps->initialize($config);
                    $map = $this->googlemaps->create_map();

                    echo $map['js'];
                    echo $map['html'];
                  ?>  
                </div>
            <?php } else { ?>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12 col-xs-12">            
                    <div class="callout callout-info">
                      <p>Aktifkan koneksi internet untuk menampilkan GIS Calon Peserta Didik</p>
                    </div>
                  </div>
                </div>  
              </div>               
            <?php } ?>
          </div>
        </div>
<!-- end GIS --> 
<!-- start log aktivitas --> 
        <div class="col-md-4 col-xs-12">
          <div class="box box-warning direct-chat direct-chat-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Aktivitas Pengguna</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>                   </button>
              </div>
            </div>
            <div class="box-body">
              <div class="direct-chat-messages" style="min-height: 500px">
                <?php foreach ($log as $value) { ?> 
                  <?php if ($value->id=="1" || $value->id=="3") { ?> 
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?php echo $value->log_user ?></span>
                        <span class="direct-chat-timestamp pull-right"><?php echo $value->log_time ?></span>
                      </div>
                        <?php 
                        if (file_exists('assets/uploads/image/user/'.$value->image)) { ?>  
                          <img class="direct-chat-img" src="<?php echo base_url('assets/uploads/image/user/'.$value->image) ?>">
                        <?php } else { ?>
                          <img class="direct-chat-img" src="<?php echo base_url('assets/uploads/image/user/avatar.jpg') ?>">
                        <?php } ?>
                      <div class="direct-chat-text">
                          <?php echo $value->log_ket ?>
                      </div>
                    </div>
                  <?php } else if ($value->id=="2") { ?>   
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?php echo $value->log_time ?></span>
                        <span class="direct-chat-timestamp pull-right"><?php echo $value->log_user ?></span>
                      </div>
                        <?php 
                        if (file_exists('assets/uploads/image/user/'.$value->image)) { ?>  
                          <img class="direct-chat-img" src="<?php echo base_url('assets/uploads/image/user/'.$value->image) ?>">
                        <?php } else { ?>
                          <img class="direct-chat-img" src="<?php echo base_url('assets/uploads/image/user/avatar.jpg') ?>">
                        <?php } ?>
                      <div class="direct-chat-text">
                          <?php echo $value->log_ket ?>
                      </div>
                    </div>
                  <?php } ?>   
                <?php } ?>
              </div>  
            </div> 
            <div class="box-footer">
            </div>             
          </div>
        </div> 
<!-- end aktivitas --> 
      </div>
<?php } ?>      
<!-- end GIS Peserta + log aktivitas -->       

<?php } else { ?>

<!-- dashboard member -->
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="small-box bg-teal">
            <div class="inner">
              <h3>Formulir</h3>
              <p>Pendaftaran</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-signature"></i>
            </div>
            <a href="<?= base_url();?>member/formcreate" class="small-box-footer">
              Pengisian Formulir&nbsp; <i class="fa fa-arrow-circle-right"></i>
            </a>                     
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>Prestasi</h3>
              <p>Peserta</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-graduate"></i>
            </div>
<!--             <div class="small-box-footer" data-toggle="modal" data-target="#myModalPrestasi">Tambah Prestasi&nbsp; <i class="fa fa-arrow-circle-right"></i></div> -->
            <a href="<?= base_url();?>member/prestasipeserta" class="small-box-footer">
              Tambah Prestasi&nbsp; <i class="fa fa-arrow-circle-right"></i>
            </a>              
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Berkas</h3>
              <p>Pendukung</p>
            </div>
            <div class="icon">
              <i class="fas fa-copy"></i>
            </div>
<!--             <div class="small-box-footer" data-toggle="modal" data-target="#myModalBerkas">Upload Berkas&nbsp; <i class="fa fa-arrow-circle-right"></i></div>   -->
            <a href="<?= base_url();?>member/berkas" class="small-box-footer">
              Upload Berkas&nbsp; <i class="fa fa-arrow-circle-right"></i>  
            </a>                       
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <div class="small-box bg-primary">
            <div class="inner">
              <?php if ($nomer) { ?>
                <h3>Cetak</h3>
                <p>Bukti Pendaftaran</p>
              <?php } else { ?>
                <h3>Belum bisa</h3>
                <p>Cetak Bukti Pendaftaran</p>
              <?php } ?>
            </div>
            <div class="icon">
              <i class="fas fa-print"></i>
            </div>
            <?php if ($nomer) { ?>
                <?php if ($formulir->foto=='Ya' || $formulir->foto_full=='Ya' || $formulir->rapor=='Ya' || $formulir->akte_kelahiran=='Ya' || $formulir->kartu_keluarga=='Ya' || $formulir->skl_skhu=='Ya' || $formulir->skd=='Ya' || $formulir->sktm=='Ya' || $formulir->ktp_ortu=='Ya' || $formulir->sptjm=='Ya' || $formulir->sp=='Ya' || $formulir->kartu_bantuan=='Ya' || $formulir->berkaslain=='Ya') { ?>
                    <?php if ($berkas) { ?>
                          <form action="member/printformulir" method="post" target="blank">
                            <input type="hidden" class="form-control" name="id_peserta" value="<?php echo $nomer->id_peserta; ?>" /> 
                            <button type="submit" class="btn bg-blue btn-flat btn-block btn-lg">Cetak Bukti Pendaftaran&nbsp; <i class="fa fa-print"></i></button>
                          </form>
                    <?php } else { ?>      
                          <a href="<?= base_url();?>member/berkas" class="small-box-footer">
                            Upload Berkas dulu&nbsp; <i class="fa fa-arrow-circle-right"></i>  
                          </a>
                    <?php } ?>       
                <?php } else { ?>
                  <form action="member/printformulir" method="post" target="blank">
                    <input type="hidden" class="form-control" name="id_peserta" value="<?php echo $nomer->id_peserta; ?>" /> 
                    <button type="submit" class="btn bg-blue btn-flat btn-block btn-lg">Cetak Bukti Pendaftaran&nbsp; <i class="fa fa-print"></i></button>
                  </form>
                <?php } ?>  
            <?php } else { ?>
                <a href="<?= base_url();?>member/formcreate" class="small-box-footer">
                    Cetak Bukti Pendaftaran&nbsp; <i class="fa fa-print"></i>
                </a>              
            <?php } ?>   
          </div>
        </div>         
      </div>    

      <div class="row">
        <div class="col-md-8 col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="glyphicon glyphicon-bullhorn"></i> Pengumuman</h3>
            </div>
            <div class="box-body">
              <ul class="timeline">
                <?php foreach ($infomember as $pengumuman) { ?>
                <li class="time-label">
                  <span class="bg-green">
                    <?= date('d F Y', strtotime($pengumuman->date)); ?>
                  </span>
                </li>
                <li>
                  <i class="fa fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?= date('H:i:s a', strtotime($pengumuman->date)); ?></span>
                      <h3 class="timeline-header"><a href="#"><?= $pengumuman->judul ?></h3>
                      <div class="timeline-body">
                        <?= $pengumuman->text ?>
                      </div>
                    <div class="timeline-footer">
                      <a class="btn btn-primary btn-xs">Panitia PPDB</a>
                    </div>
                  </div>
                </li>
                <?php } ?>                 
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>    
                </li> 
              </ul>
            </div>
            <div class="box-footer">
            </div>
          </div>
        </div> 

      <?php if ($pengaturan->status_hasil) { ?>        
        <div class="col-md-4 col-xs-12">       
        <?php if ($nomer) { ?>    
        <?php if ($nomer->status_hasil=='Cadangan') { ?> 
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fas fa-user-check"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Status anda</span>
              <span class="info-box-number"><?php echo $nomer->status_hasil ?></span>          
              <div class="progress">
                <div class="progress-bar" style="width : 100% "></div>
              </div>
              <span class="progress-description">
                Status Hasil
              </span>
            </div>
          </div>  
        <?php } else if ($nomer->status_hasil=='Di Terima') { ?> 
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fas fa-user-check"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Selamat anda</span>
              <span class="info-box-number"><?php echo $nomer->status_hasil ?></span>          
              <div class="progress">
                <div class="progress-bar" style="width : 100% "></div>
              </div>
              <span class="progress-description">
                Status Hasil
              </span>
            </div>
          </div>
        <?php } else if ($nomer->status_hasil=='Tidak di terima') { ?> 
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fas fa-user-slash"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Mohon Maaf Anda</span>
              <span class="info-box-number"><?php echo $nomer->status_hasil ?></span>          
              <div class="progress">
                <div class="progress-bar" style="width : 100% "></div>
              </div>
              <span class="progress-description">
                Status Hasil
              </span>
            </div>
          </div>
        <?php } else if ($nomer->status_hasil=='Belum ada') { ?> 
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Status anda</span>
              <span class="info-box-number"><?php echo $nomer->status_hasil ?></span>          
              <div class="progress">
                <div class="progress-bar" style="width : 100% "></div>
              </div>
              <span class="progress-description">
                Status Hasil
              </span>
            </div>
          </div>           
        <?php } ?>

        <?php if ($nomer->status_hasil=='Di Terima'||$nomer->status_hasil=='Tidak di terima'||$nomer->status_hasil=='Cadangan') { ?>
          <div class="small-box bg-primary">
            <div class="inner">
                <h3>Cetak</h3>
                <p>Bukti <?php echo $nomer->status_hasil ?></p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-bullhorn"></i>
            </div>     
              <form action="member/printSKL" method="post" target="blank">
                <input type="hidden" class="form-control" name="id_peserta" value="<?php echo $nomer->id_peserta; ?>" /> 
                <button type="submit" class="btn bg-blue btn-flat btn-block">Cetak Bukti <?php echo $nomer->status_hasil ?>&nbsp; <i class="fa fa-print"></i></button>
              </form>               
          </div>         
        <?php } ?>       
        
        <?php } else { ?>
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Status anda</span>
              <span class="info-box-number">Belum ada</span>          
              <div class="progress">
                <div class="progress-bar" style="width : 100% "></div>
              </div>
              <span class="progress-description">
                Status Hasil
              </span>
            </div>
          </div>           
        <?php } ?>
        </div>
      <?php } ?>                  

        <div class="col-md-4 col-xs-12">
          <div class="small-box bg-maroon">
            <div class="inner">
              <?php if ($nomer) { ?>
                <h3><?php echo $nomer->no_pendaftaran ?></h3>
                <p>Nomer Pendaftaran</p>
              <?php } else { ?>
                <h3>Belum ada</h3>
                <p>Nomer Pendaftaran</p>
              <?php } ?>
            </div>
            <div class="icon">
              <i class="fas fa-barcode"></i>
            </div>                      
          </div>
        </div>           

      <?php if ($pengaturan->status_pendaftaran) { ?>             
        <div class="col-md-4 col-xs-12">
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
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fas fa-user"></i></span>
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
      <?php } ?>

      <?php if ($pengaturan->status_daftar_ulang) { ?>        
        <div class="col-md-4 col-xs-12">
        <?php if ($nomer) { ?>    
        <?php if ($nomer->status_daftar_ulang=='Belum daftar ulang') { ?> 
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Status anda</span>
              <span class="info-box-number"><?php echo $nomer->status_daftar_ulang ?></span>          
              <div class="progress">
                <div class="progress-bar" style="width : 100% "></div>
              </div>
              <span class="progress-description">
                Status Daftar Ulang
              </span>
            </div>
          </div>  
        <?php } else if ($nomer->status_daftar_ulang=='Sudah daftar ulang') { ?> 
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fas fa-user-check"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Selamat anda</span>
              <span class="info-box-number"><?php echo $nomer->status_daftar_ulang ?></span>          
              <div class="progress">
                <div class="progress-bar" style="width : 100% "></div>
              </div>
              <span class="progress-description">
                Status Daftar Ulang
              </span>
            </div>
          </div>                  
        <?php } else if ($nomer->status_daftar_ulang=='Tidak daftar ulang') { ?> 
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fas fa-user-slash"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Status anda</span>
              <span class="info-box-number"><?php echo $nomer->status_daftar_ulang ?></span>          
              <div class="progress">
                <div class="progress-bar" style="width : 100% "></div>
              </div>
              <span class="progress-description">
                Status Daftar Ulang
              </span>
            </div>
          </div>
        <?php } else if ($nomer->status_daftar_ulang=='Menunggu') { ?> 
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Status anda</span>
              <span class="info-box-number"><?php echo $nomer->status_daftar_ulang ?></span>          
              <div class="progress">
                <div class="progress-bar" style="width : 100% "></div>
              </div>
              <span class="progress-description">
                Status Daftar Ulang
              </span>
            </div>
          </div>           
        <?php } ?>
        <?php } else { ?>
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Status anda</span>
              <span class="info-box-number">Menunggu</span>          
              <div class="progress">
                <div class="progress-bar" style="width : 100% "></div>
              </div>
              <span class="progress-description">
                Status Daftar Ulang
              </span>
            </div>
          </div>           
        <?php } ?>   
        </div>
      <?php } ?> 

        <div class="col-md-4 col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fab fa-whatsapp"></i>  Contact Panitia PPDB</h3>
            </div>
            <div class="box-body">
              <div class="callout callout-info">
                  <?php foreach ($contact as $value) { ?>
                    <li><i class="fab fa-whatsapp"></i> <?= $value->phone ?> - <?= $value->first_name ?> <?= $value->last_name ?></li>
                  <?php } ?>
              </div>
            </div>
          </div>
        </div>             

      </div>  

<!-- Modal catatan -->
<?php if ($nomer) { ?> 
<?php if ($nomer->catatan) { ?>
<div class="modal fade" id="myModalInfoBerkas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header <?= $this->config->item('header')?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-bullhorn"></i>&nbsp; Pemberitahuan</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-12 col-md-12">  
            <div class="callout callout-info">
              <?php echo $nomer->catatan ?>
            </div> 
          </div>
        </div>                                   
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php } ?>
<!-- end Modal catatan -->   
<?php } ?>

<!-- Modal Prestasi -->
<div class="modal fade" id="myModalPrestasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header <?= $this->config->item('header')?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fas fa-user-graduate"></i>&nbsp; Jumlah Prestasi</h4>
      </div>
      <div class="modal-body">
        <div class="row">            
        <?php if ($nomer) { ?> 
          <?php if ($nomer->status=='Sudah diverifikasi') { ?> 
            <div class="col-xs-12 col-md-12">
              <div class="callout callout-info">
                Berkas sudah diverifikasi Panitia
              </div>  
            </div>
          <?php } else { ?>             
            <form action="member/multiprestasi" method="post">
                <div class="col-xs-12 col-md-12">
                    <div class="form-group">
                        <label>Banyak Prestasi yang akan ditambahkan</label>
                        <input type="text" class="form-control" name="banyak_data" id="banyak_data" placeholder="Banyak Prestasi"/>
                    </div>
                    <div class="form-group">    
                        <button type="submit" class="<?= $this->config->item('botton')?>">Lanjut</button>
                    </div>
                </div>
            </form>
          <?php } ?>
        <?php } else { ?>
          <div class="col-xs-12 col-md-12">  
            <div class="callout callout-info">
              Silahkan melakukan pengisian formulir pendaftaran terlebih dahulu
            </div> 
          </div> 
        <?php } ?> 
        </div>                    
      </div>
    </div>
  </div>
</div>
<!-- end Modal Prestasi -->

<!-- Modal Berkas -->
<div class="modal fade" id="myModalBerkas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header <?= $this->config->item('header')?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fas fa-copy"></i>&nbsp; Berkas Pendukung</h4>
      </div>
      <div class="modal-body">    
        <div class="row"> 
      <?php if ($nomer) {
        if ($nomer->status=='Sudah diverifikasi') { ?>
          <div class="col-xs-12 col-md-12">
            <div class="callout callout-info">
              Berkas sudah diverifikasi Panitia
            </div>  
          </div>   
        <?php } else {         
          if ($formulir->foto=='Ya' || $formulir->foto_full=='Ya' || $formulir->rapor=='Ya' || $formulir->akte_kelahiran=='Ya' || $formulir->kartu_keluarga=='Ya' || $formulir->skl_skhu=='Ya' || $formulir->skd=='Ya' || $formulir->sktm=='Ya' || $formulir->ktp_ortu=='Ya' || $formulir->sptjm=='Ya' || $formulir->sp=='Ya' || $formulir->kartu_bantuan=='Ya' || $formulir->berkaslain=='Ya') { ?>            
            <form action="member/uploadberkas" method="post" enctype="multipart/form-data">
                <div class="col-xs-12 col-md-12">
                  <?php if ($formulir->foto=='Ya'){ ?>
                      <div class="form-group">
                        <label for="varchar">Foto Berwarna 3x4</label>
                        <input type="hidden" class="form-control" name="id_peserta[]" value="<?php echo $nomer->id_peserta; ?>"/>
                        <input type="file" class="form-control" name="berkas[]" />
                        <input type="hidden" class="form-control" name="keterangan_berkas[]" placeholder="Keterangan Berkas" value="Foto 3x4"/>
                      </div>             
                  <?php } ?>
                  <?php if ($formulir->foto_full=='Ya'){ ?>
                      <div class="form-group">
                        <label for="varchar">Foto Seluruh Badan</label>
                        <input type="hidden" class="form-control" name="id_peserta[]" value="<?php echo $nomer->id_peserta; ?>"/>
                        <input type="file" class="form-control" name="berkas[]" />
                        <input type="hidden" class="form-control" name="keterangan_berkas[]" placeholder="Keterangan Berkas" value="Foto Seluruh Badan"/>
                      </div>             
                  <?php } ?>
                  <?php if ($formulir->skl_skhu=='Ya'){ ?>  
                      <div class="form-group">
                        <label for="varchar">SKL/SKHU/Ijazah</label>
                        <input type="hidden" class="form-control" name="id_peserta[]" value="<?php echo $nomer->id_peserta; ?>"/>
                        <input type="file" class="form-control" name="berkas[]" />
                        <input type="hidden" class="form-control" name="keterangan_berkas[]" placeholder="Keterangan Berkas" value="SKL/SKHU/Ijazah" />
                      </div>      
                  <?php } ?>
                  <?php if ($formulir->rapor=='Ya'){ ?>
                      <div class="form-group">
                        <label for="varchar">Nilai Rapor Semester 1-5</label>
                        <input type="hidden" class="form-control" name="id_peserta[]" value="<?php echo $nomer->id_peserta; ?>"/>
                        <input type="file" class="form-control" name="berkas[]" />
                        <input type="hidden" class="form-control" name="keterangan_berkas[]" placeholder="Keterangan Berkas" value="Nilai Rapor/Semester"/>
                      </div>             
                  <?php } ?>
                  <?php if ($formulir->akte_kelahiran=='Ya'){ ?>
                      <div class="form-group">                      
                        <label for="varchar">Akta Kelahiran</label>
                        <input type="hidden" class="form-control" name="id_peserta[]" value="<?php echo $nomer->id_peserta; ?>"/>
                        <input type="file" class="form-control" name="berkas[]" />
                        <input type="hidden" class="form-control" name="keterangan_berkas[]" placeholder="Keterangan Berkas" value="Akta Kelahiran" />  
                      </div>
                  <?php } ?>
                  <?php if ($formulir->kartu_keluarga=='Ya'){ ?>
                      <div class="form-group">
                        <label for="varchar">Kartu Keluarga</label>
                        <input type="hidden" class="form-control" name="id_peserta[]" value="<?php echo $nomer->id_peserta; ?>"/>
                        <input type="file" class="form-control" name="berkas[]" />  
                        <input type="hidden" class="form-control" name="keterangan_berkas[]" placeholder="Keterangan Berkas" value="Kartu Keluarga" /> 
                      </div>
                  <?php } ?>  
                  <?php if ($formulir->ktp_ortu=='Ya'){ ?>
                      <div class="form-group">
                        <label for="varchar">KTP Orangtua</label>
                        <input type="hidden" class="form-control" name="id_peserta[]" value="<?php echo $nomer->id_peserta; ?>"/>
                        <input type="file" class="form-control" name="berkas[]" />  
                        <input type="hidden" class="form-control" name="keterangan_berkas[]" placeholder="Keterangan Berkas" value="KTP Orangtua" /> 
                      </div>
                  <?php } ?>
                  <?php if ($formulir->sptjm=='Ya'){ ?>
                      <div class="form-group">
                        <label for="varchar">Surat Pertanggungjawaban Mutlak Orangtua</label>
                        <input type="hidden" class="form-control" name="id_peserta[]" value="<?php echo $nomer->id_peserta; ?>"/>
                        <input type="file" class="form-control" name="berkas[]" />  
                        <input type="hidden" class="form-control" name="keterangan_berkas[]" placeholder="Keterangan Berkas" value="Surat Pertanggungjawaban Mutlak Orangtua" /> 
                      </div>
                  <?php } ?> 
                  <?php if ($formulir->sp=='Ya'){ ?>
                      <div class="form-group">
                        <label for="varchar">Surat Penugasan dari Instansi</label>
                        <input type="hidden" class="form-control" name="id_peserta[]" value="<?php echo $nomer->id_peserta; ?>"/>
                        <input type="file" class="form-control" name="berkas[]" />  
                        <input type="hidden" class="form-control" name="keterangan_berkas[]" placeholder="Keterangan Berkas" value="Surat Penugasan dari Instansi" /> 
                      </div>
                  <?php } ?>                                       
                  <?php if ($formulir->skd=='Ya'){ ?>
                      <div class="form-group">
                        <label for="varchar">Surat Keterangan Domisili</label>
                        <input type="hidden" class="form-control" name="id_peserta[]" value="<?php echo $nomer->id_peserta; ?>"/>
                        <input type="file" class="form-control" name="berkas[]" />  
                        <input type="hidden" class="form-control" name="keterangan_berkas[]" placeholder="Keterangan Berkas" value="Surat Keterangan Domisili" />                          
                      </div>                   
                  <?php } ?> 
                  <?php if ($formulir->sktm=='Ya'){ ?>
                      <div class="form-group">
                        <label for="varchar">Surat Keterangan Tidak Mampu</label>
                        <input type="hidden" class="form-control" name="id_peserta[]" value="<?php echo $nomer->id_peserta; ?>"/>
                        <input type="file" class="form-control" name="berkas[]" />  
                        <input type="hidden" class="form-control" name="keterangan_berkas[]" placeholder="Keterangan Berkas" value="Surat Keterangan Tidak Mampu" />                          
                      </div>                   
                  <?php } ?>    
                  <?php if ($formulir->kartu_bantuan=='Ya'){ ?>
                      <div class="form-group">
                        <label for="varchar">Kartu PKH/KPS/KIP</label>
                        <input type="hidden" class="form-control" name="id_peserta[]" value="<?php echo $nomer->id_peserta; ?>"/>
                        <input type="file" class="form-control" name="berkas[]" />  
                        <input type="hidden" class="form-control" name="keterangan_berkas[]" placeholder="Keterangan Berkas" value="Kartu PKH/KPS/KIP" />                          
                      </div>                   
                  <?php } ?>                                  
                </div>                    
                  <?php if ($formulir->berkaslain=='Ya'){ ?>
                    <div class="col-xs-12 col-md-6"> 
                      <div class="form-group">
                        <label for="varchar">Berkas lainnya</label>
                        <input type="hidden" class="form-control" name="id_peserta[]" value="<?php echo $nomer->id_peserta; ?>"/>
                        <input type="file" class="form-control" name="berkas[]" />
                      </div>
                    </div>                       
                    <div class="col-xs-12 col-md-6"> 
                      <div class="form-group">
                        <label for="varchar">Keterangan Berkas</label>                                            
                        <input type="text" class="form-control" name="keterangan_berkas[]" placeholder="Keterangan Berkas" />
                      </div> 
                    </div>   
                  <?php } ?> 
                  <div class="col-xs-12 col-md-6"> 
                    <div class="form-group">    
                        <button type="submit" class="<?= $this->config->item('botton')?>">Upload Berkas</button>
                    </div>
                  </div>              
            </form> 
            
        </div> 
              <div class="callout callout-info">
                Berkas yang akan diupload harus sesuai ketentuan
                <li>format berkas : gif/jpg/png/pdf</li>
                <li>ukuran max : 500 kb</li>
                <?php if ($formulir->berkaslain=='Ya'){ ?>
                  <li>ulangi proses upload berkas lainnya jika berkas lainnya lebih dari satu</li>
                <?php } ?>                 
              </div>  
          <?php } else { ?>
          <div class="col-xs-12 col-md-12">  
            <div class="callout callout-info">
              Berkas pendukung di serahkan langsung ke Panitia PPDB disertai bukti pendaftaran
            </div> 
          </div>             
          <?php } ?>
        <?php } ?>   
      <?php } else { ?>
        <div class="col-xs-12 col-md-12">  
          <div class="callout callout-info">
            Silahkan melakukan pengisian formulir pendaftaran terlebih dahulu
          </div> 
        </div> 
      <?php } ?>                                        
      </div>
    </div>
  </div>
</div>
<!-- end Modal Berkas -->