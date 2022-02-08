<div class="row">
<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">List Peserta</h3>
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
                    <div class="col-xs-4 col-md-4">                      
                        <?php echo anchor(site_url('peserta/create'), '<i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;Tambah</span>', 'class="'.$this->config->item('botton').'"'); ?>
                        <button class="btn btn-danger btn-flat" type="submit"><i class="fa fa-trash"></i><span class="hidden-xs">&nbsp;&nbsp;Hapus Data Terpilih</span></button>
                    </div>
                    <div class="col-xs-8 col-md-8 text-right">
						<?php echo anchor(site_url('peserta/reset_all'), '<i class="fa fa-user-check"></i><span class="hidden-xs">&nbsp;&nbsp;Reset Hasil</span>', 'class="btn btn-warning btn-flat"'); ?>
						<?php echo anchor(site_url('peserta/terima_all'), '<i class="fa fa-user-check"></i><span class="hidden-xs">&nbsp;&nbsp;Terima semua</span>', 'class="btn btn-success btn-flat"'); ?>
						<!-- print
						<?php echo anchor(site_url('peserta/printdoc'), '<i class="fa fa-print"></i><span class="hidden-xs">&nbsp;&nbsp;Print</span>', 'class="btn bg-maroon btn-flat"'); ?>
						-->
						<?php echo anchor(site_url('peserta/rekap_nilai'), '<i class="fa fa-download"></i><span class="hidden-xs">&nbsp;&nbsp;Unduh Rekap Nilai</span>', 'class="btn bg-yellow btn-flat"'); ?>						
						<?php echo anchor(site_url('peserta/excel'), '<i class="fa fa-download"></i><span class="hidden-xs">&nbsp;&nbsp;Unduh Rekap Peserta Excel</span>', 'class="btn bg-purple btn-flat"'); ?>
						<!-- word 
						<?php echo anchor(site_url('peserta/word'), '<i class="fa fa-file-word"></i><span class="hidden-xs">&nbsp;&nbsp;Word</span>', 'class="btn btn-primary btn-flat"'); ?>
						-->
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="mytable" style="width:100%">
                        <thead>
                            <tr>
                                <th width=""></th>
                                <th width="10px">No</th>
							    <th>No Pendaftaran</th>
<!-- 							    <th>Tanggal Daftar</th>
							    <th>Tahun</th>
							    <th>Jalur</th>
 -->							<th>Nama Peserta</th>
<!-- 							    <th>Jenis Kelamin</th>
							    <th>NISN</th>
							    <th>NIK</th>
							    <th>Tempat Lahir</th>
							    <th>Tanggal Lahir</th>
							    <th>No Registrasi Akta Lahir</th>
							    <th>Agama</th>
							    <th>Kewarganegaraan</th>
							    <th>Berkebutuhan Khusus</th>
							    <th>Alamat</th>
							    <th>RT</th>
							    <th>RW</th>
							    <th>Nama Dusun</th>
							    <th>Nama Kelurahan</th>
							    <th>Kecamatan</th>
							    <th>Kode Pos</th>
							    <th>Latitude</th>
							    <th>Longitude</th>
							    <th>Tempat Tinggal</th>
							    <th>Moda Transportasi</th>
							    <th>No KKS</th>
							    <th>Anak Ke</th>
							    <th>Penerima KPS/PKH</th>
							    <th>No KPS/PKH</th>
							    <th>Penerima KIP</th>
							    <th>No KIP</th>
							    <th>Nama Tertera Di KIP</th>
							    <th>Terima Fisik Kartu KIP</th>
							    <th>Nama Ayah</th>
							    <th>NIK Ayah</th>
							    <th>Tahun Lahir Ayah</th>
							    <th>Pendidikan Ayah</th>
							    <th>Pekerjaan Ayah</th>
							    <th>Penghasilan Bulanan Ayah</th>
							    <th>Berkebutuhan Khusus Ayah</th>
							    <th>Nama Ibu</th>
							    <th>NIK Ibu</th>
							    <th>Tahun Lahir Ibu</th>
							    <th>Pendidikan Ibu</th>
							    <th>Pekerjaan Ibu</th>
							    <th>Penghasilan Bulanan Ibu</th>
							    <th>Berkebutuhan Khusus Ibu</th>
							    <th>Nama Wali</th>
							    <th>NIK Wali</th>
							    <th>Tahun Lahir Wali</th>
							    <th>Pendidikan Wali</th>
							    <th>Pekerjaan Wali</th>
							    <th>Penghasilan Bulanan Wali</th>
							    <th>No Telepon Rumah</th>
							    <th>Nomor HP</th>
							    <th>Email</th>
							    <th>Jenis Ekstrakurikuler</th>
							    <th>Tinggi Badan</th>
							    <th>Berat Badan</th>
							    <th>Jarak</th>
							    <th>Jumlah Saudara Kandung</th> -->
							    <th>Jurusan</th>
<!-- 							    <th>Jurusan Pilihan 2</th>
								<th>Sekolah Pilihan 2</th>
							    <th>Asal Sekolah</th>
							    <th>No UN</th>
							    <th>No Seri Ijazah</th>
							    <th>No Seri Skhu</th>
							    <th>Nilai Rapor</th>
 								<th>Nilai USBN</th>
 								<th>Nilai UN</th>
 								<th>Poin Jarak</th> -->
 								<th>Jalur</th>
							    <th>Status</th>
							    <th>Hasil</th>
							    <th>Daftar Ulang</th>
							    <!-- <th>Id Users</th>		 -->
                                <th width="140px">Action</th>
                            </tr>
                        </thead>	
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
</div>