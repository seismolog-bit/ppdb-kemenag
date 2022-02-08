<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">

<div class="row">
<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Nilai Peserta</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                <i class="fa fa-refresh"></i></button>
            </div>
        </div>
        <div class="box-body">
            <form id="myform" method="post" onsubmit="return false">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-xs-6 col-md-6">                      
						<?php echo anchor(site_url('peserta/rekap_nilai'), '<i class="fa fa-download"></i><span class="hidden-xs">&nbsp;&nbsp;Unduh Rekap Nilai</span>', 'class="btn bg-yellow btn-flat"'); ?>	
                    </div>
                    <div class="col-xs-6 col-md-6 text-right">

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
							    <th>No Pendaftaran</th>
								<th>Nama Peserta</th>
							    <th>Jurusan</th>
							    <th>Jalur</th>
<!-- 							    <th>Rapor</th>
 								<th>USBN</th>
 								<th>UN</th> -->
 								<th>Jumlah Nilai</th>
 								<th>Poin Jarak</th>
 								<th>Poin Prestasi</th>
 								<th>Nilai Akhir</th>
							    <th>Usia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($peserta as $data):
						        $id=$data->id_peserta;
						        $id_peserta=$data->id_peserta;
						        // total nilai
						        $totalnilai=$data->nilai_rapor+$data->nilai_usbn+$data->nilai_unbk_unkp;
						        // total poin
						        foreach ($this->Prestasipeserta_model->sumpoin($id_peserta) as $poin) {
						        	$totalpoin=$poin->totalpoin;
						        }
						        // bobot by id_peserta
						        foreach ($this->Peserta_model->bobot($id) as $bobot) {
						        	$bobotjarak=($bobot->bobot_jarak!=0)?($bobot->bobot_jarak*$data->skor_jarak)/100:0;
						        	$bobotnilai=($bobot->bobot_nilai!=0)?($bobot->bobot_nilai*$totalnilai)/100:0;
						        	$bobotprestasi=($bobot->bobot_prestasi!=0)?($bobot->bobot_prestasi*$totalpoin)/100:0;
						        }
						        // nilai akhir        
                                if ($this->Peserta_model->bobot($id)) {        
                                  $nilaiakhir=$bobotjarak+$bobotnilai+$bobotprestasi;
                                } else {
                                  $nilaiakhir='bobot jalur blm ada';  
                                }  

						        // umur by id_peserta
						        foreach ($this->Peserta_model->tgl_lhr($id) as $tgl) {
						        	$tanggal_lahir=new DateTime($tgl->tanggal_lahir);
						        }        
								$today = new DateTime('today');
								$y = $today->diff($tanggal_lahir)->y;
								$m = $today->diff($tanggal_lahir)->m;
								$d = $today->diff($tanggal_lahir)->d;
								$usia = $y . " tahun " . $m . " bulan " . $d . " hari";  
                            ?>
                            <tr>
                                <td style="text-align: center"><?php echo $no++;?></td>
                                <td><?php echo $data->no_pendaftaran;?></td>
                                <td><?php echo $data->nama_peserta;?></td>        
                                <td><?php echo $data->nama_jurusan;?></td>
                                <td><?php echo $data->jalur;?></td>
<!--                                 <td style="text-align: center"><?php echo $data->nilai_rapor;?></td>
                                <td style="text-align: center"><?php echo $data->nilai_usbn;?></td>
                                <td style="text-align: center"><?php echo $data->nilai_unbk_unkp;?></td> -->
                                <td style="text-align: center"><?php echo $totalnilai;?></td>
                                <td style="text-align: center"><?php echo $data->skor_jarak;?></td>
                                <td style="text-align: center"><?php echo $totalpoin;?></td>
                                <td style="text-align: center"><?php echo $nilaiakhir;?></td>
                                <td><?php echo $usia;?></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<!-- DataTables -->
<script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>  
<script src="<?= base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?= base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>  

<script type="text/javascript">
  $(document).ready(function() {
    $('#mytable').DataTable();
  });
</script>