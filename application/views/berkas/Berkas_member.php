<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">List Berkas</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                    <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <div class="box-body">
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-xs-4 col-md-4">                      
                            <button class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModalBerkas"><i class="fa fa-plus"></i>&nbsp;&nbsp;Upload Berkas</button>
                        </div>
                        <div class="col-xs-8 col-md-8 text-right">

                        </div>
                    </div>                
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>View</th>    
<!--                                     <th>No Pendaftaran</th>
                                    <th>Nama Peserta</th>     -->                              
                                    <th>Nama Berkas</th>
                                    <th>Keterangan</th>
                                    <th>Tipe</th>
                                    <th>Ukuran</th>
                                    <th width="80px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach ($berkas as $value):
                                    $id = $value->id_berkas; ?>
                                    <tr>
                                        <td style="text-align: center"><?php echo $no++;?></td>
                                        <td>
                                            <?php if ($value->tipe_berkas==".gif" || $value->tipe_berkas==".jpg" || $value->tipe_berkas==".png" || $value->tipe_berkas==".PNG" || $value->tipe_berkas==".JPG" || $value->tipe_berkas==".GIF" ) { ?>
                                                <img src="<?php echo base_url('assets/uploads/attachment/'.$value->nama_berkas) ?>" width="50px">
                                            <?php } else if ($value->tipe_berkas==".pdf") { ?>
                                                <a href="<?php echo base_url('assets/uploads/attachment/'.$value->nama_berkas) ?>" target="blank"><?php echo $value->keterangan_berkas;?></a>
                                            <?php } ?> 
                                        </td>
<!--                                         <td><?php echo $value->no_pendaftaran;?></td>
                                        <td><?php echo $value->nama_peserta;?></td>  -->                      
                                        <td><?php echo $value->nama_berkas;?></td>
                                        <td><?php echo $value->keterangan_berkas;?></td>
                                        <td><?php echo $value->tipe_berkas;?></td>
                                        <td><?php echo $value->ukuran_berkas;?>
                                        </td>
                                        <td class="text-center"><?php echo anchor('member/del_berkas/'.$id, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'member/del_berkas/'.$id.'\')" data-toggle="tooltip" title="Delete"');
                                            ?>
                                        </td>                                        
                                    </tr>
                                <?php endforeach;?>
                            </tbody>                                    
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>

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
              Pendaftaran sudah diverifikasi Panitia, tidak dapat upload atau hapus berkas lagi
            </div>  
          </div>   
        <?php } else {         
          if ($formulir->foto=='Ya' || $formulir->foto_full=='Ya' || $formulir->rapor=='Ya' || $formulir->akte_kelahiran=='Ya' || $formulir->kartu_keluarga=='Ya' || $formulir->skl_skhu=='Ya' || $formulir->skd=='Ya' || $formulir->sktm=='Ya' || $formulir->ktp_ortu=='Ya' || $formulir->sptjm=='Ya' || $formulir->sp=='Ya' || $formulir->kartu_bantuan=='Ya' || $formulir->berkaslain=='Ya') { ?>            
            <form action="uploadberkas" method="post" enctype="multipart/form-data">
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
                  <li>ulangi proses upload berkas lainnya jika masih ada berkas yang perlu di upload</li>
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

<!-- DataTables -->
<script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>  
<script src="<?= base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?= base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>  

<script type="text/javascript">
  $(document).ready(function() {
    $('#mytable').DataTable();
  });
</script>