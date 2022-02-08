<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">List Prestasi Peserta</h3>
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
                        <button class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModalPrestasi"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Prestasi</button>
                    </div>
                    <div class="col-xs-8 col-md-8 text-right">

                    </div>
                </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th style="text-align: center">Jenis</th>    
                                    <th style="text-align: center">Nama Prestasi</th>
                                    <th style="text-align: center">Tahun</th>           
                                    <th style="text-align: center">Tingkat</th>
                                    <th style="text-align: center">Kategori</th>
                                    <th style="text-align: center">Peringkat</th>
                                    <th width="80px" style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach ($prestasipeserta as $value):?>
                                    <tr>
                                        <td style="text-align: center"><?php echo $no++;?></td>
                                        <td><?php echo $value->jenis;?></td>
                                        <td><?php echo $value->nama_prestasi;?></td>    
                                        <td style="text-align: center"><?php echo $value->tahun;?></td>
                                        <td><?php echo $value->tingkat;?></td>
                                        <td><?php echo $value->kategori;?></td>
                                        <td style="text-align: center"><?php echo $value->juara;?>
                                        </td>
                                        <td class="text-center"><?php echo anchor('member/del_prestasipeserta/'.$value->id_prestasipeserta, '<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'member/del_prestasipeserta/'.$value->id_prestasipeserta.'\')" data-toggle="tooltip" title="Delete"');
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
                Pendaftaran sudah diverifikasi Panitia, tidak dapat input prestasi lagi
              </div>  
            </div>
          <?php } else { ?>             
            <form action="multiprestasi" method="post">
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

<!-- DataTables -->
<script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>  
<script src="<?= base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?= base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>  

<script type="text/javascript">
  $(document).ready(function() {
    $('#mytable').DataTable();
  });
</script>