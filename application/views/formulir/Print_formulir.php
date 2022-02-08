<!DOCTYPE html>
<html>
<head>
    <title>Formulir PD</title>
    <style type="text/css" media="print">
    @page {
        margin-top: 30;  /* this affects the margin in the printer settings */
    	margin-bottom: 180;
    	margin-left: 50;
    	margin-right: 50;
    }
    table{
        border-collapse: collapse;
        border-spacing: 0;       
        width: 100%;
        font-size: 16px;
    }
    table th{
        -webkit-print-color-adjust:exact;
        border: 1px solid;
        padding-top: 5px;
        padding-bottom: 5px;
        /*background-color: #39CCCC;*/
        /*text-align: left;*/
    }
    table td{    
        /*border: 1px solid;*/
    }
    .satu {
   		font-size: 10px;
   	}
   	.dua {
   		font-size: 24px;
   	}
   	.tiga {
   		font-size: 20px;
   	}   	
    </style>
</head>
<body>
<?php if (file_exists('assets/dist/img/'.$pengaturan->header)) { ?>
    <img src="<?php echo base_url('assets/dist/img/'.$pengaturan->header) ?>" width="100%">  
<?php } else { ?> 		
	<table>    
		<tr>	
			<td rowspan="3" width="100">
				<img src="<?php echo base_url('assets/dist/img/'.$pengaturan->logo) ?>" height="70px">
			</td>	    
		    <td class="tiga"><strong>PENERIMAAN PESERTA DIDIK BARU (PPDB)</strong></td>
		    <td></td>
        </tr> 
		<tr>	    
		    <td class="dua"><strong><?php echo strtoupper($pengaturan->nama_sekolah) ?></strong></td>
		    <td></td>
        </tr> 
		<tr>	    
		    <td class="satu"><?php echo ucwords($pengaturan->alamat) ?> Kec.<?php echo ucwords($pengaturan->kecamatan) ?>, <?php echo ucwords($pengaturan->kabupaten) ?> Kode Pos <?php echo $pengaturan->kode_pos ?> </td>
		    <td></td>
        </tr>                                                             
    </table>
    <hr>
<?php } ?>        
    <br><br>
	<table>    
		<tr>	
			<td width="150">No. Pendaftaran</td>	    
		    <td width="10">: </td>
		    <?php if ($formulir->kode_formulir=="Ya") { ?>
			    <td width="200" style="border-bottom: 1px dotted"><strong><?php echo $formulir->kode_luring ?>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-L</strong></td>
			    <td width="200"></td>
			    <td style="text-align: center;border-top: solid;border-bottom: solid;border-left: solid;border-right: solid">FPD-L</td>
			<?php } else { ?>
			    <td width="200" style="border-bottom: 1px dotted"><strong><?php echo $formulir->kode_luring ?>-</strong></td>
			    <td width="200"></td>
			    <td style="text-align: center;border-top: solid;border-bottom: solid;border-left: solid;border-right: solid">FPD</td>
			<?php } ?>
        </tr>                                                            
    </table>
    <?php $th = $tp->tahun_pelajaran + 1; ?>
	<h3 style="text-align: center">FORMULIR PENERIMAAN PESERTA DIDIK BARU<br>
	TAHUN PELAJARAN <?php echo $tp->tahun_pelajaran ?>/<?php echo $th ?></h3>	
    <table class="word-table" style="margin-bottom: 10px">	 	 		   
		<tr>		    
		    <td style="width: 280px">Nama Peserta</td>
		    <td style="width: 10px">: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
		<tr>    
		    <td>Jenis Kelamin</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted">Laki-laki/Perempuan</td>
		</tr>
		<tr>    
		    <td>NISN</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php if ($formulir->nik=='Ya'){ ?>
		<tr>
		    <td>NIK</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>		
		<tr>
		    <td>Tempat Tanggal Lahir</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php if ($formulir->no_registrasi_akta_lahir=='Ya'){ ?>		
		<tr>
		    <td>No. Registrasi Akta Lahir</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
		<tr>
		    <td>Agama</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php if ($formulir->kewarganegaraan=='Ya'){ ?>		
		<tr>
		    <td>Kewarganegaraan</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted">WNI/WNA</td>
		</tr>
	<?php } ?>
	<?php if ($formulir->berkebutuhan_khusus=='Ya'){ ?>		
		<tr>
		    <td>Berkebutuhan khusus</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>		
		<tr>
		    <td>Alamat</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php if ($formulir->rt=='Ya'){ ?>		
		<tr>
		    <td>RT/RW</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>	
	<?php if ($formulir->nama_dusun=='Ya'){ ?>			
		<tr>
		    <td>Nama Dusun</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>		
	<?php if ($formulir->nama_kelurahan=='Ya'){ ?>		
		<tr>
		    <td>Nama Kelurahan/Desa</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->kecamatan=='Ya'){ ?>				
		<tr>
		    <td>Kecamatan</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>	
	<?php if ($formulir->kode_pos=='Ya'){ ?>			
		<tr>
		    <td>Kode Pos</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->latitude=='Ya'){ ?>				
		<tr>
		    <td>Latitude</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>	
	<?php if ($formulir->longitude=='Ya'){ ?>			
		<tr>		    
		    <td>Longitude</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>	
	<?php if ($formulir->tempat_tinggal=='Ya'){ ?>			
		<tr>
		    <td>Tempat Tinggal</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>		
	<?php } ?>
	<?php if ($formulir->moda_transportasi=='Ya'){ ?>				
		<tr>
		    <td>Moda Transportasi</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>		
	<?php } ?>
	<?php if ($formulir->no_kks=='Ya'){ ?>		
		<tr>
		    <td>No. KKS (Kartu Keluarga Sejahtera)</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>	
	<?php if ($formulir->anak_ke=='Ya'){ ?>			
		<tr>
		    <td>Anak keberapa</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->penerima_kps_pkh=='Ya'){ ?>		
		<tr>
		    <td>Penerima KPS/PKH</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted">Ya/Tidak
		    	<?php if ($formulir->no_kps_pkh=='Ya'){ ?>
		    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor :
		    	<?php } ?>
		    </td>
		</tr>
	<?php } ?>
<!-- 	<?php if ($formulir->no_kps_pkh=='Ya'){ ?>		
		<tr>    
			<td>No. KPS/PKH</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?> -->
	<?php if ($formulir->penerima_kip=='Ya'){ ?>		
		<tr>    
		    <td>Penerima KIP</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted">Ya/Tidak
		    	<?php if ($formulir->no_kip=='Ya'){ ?>
		    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor :
		    	<?php } ?>
		    </td>
		</tr>
	<?php } ?>	
<!-- 	<?php if ($formulir->no_kip=='Ya'){ ?>			
		<tr>    
		    <td>No. KIP (Kartu Indonesia Pintar)</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?> -->
	<?php if ($formulir->nama_tertera_di_kip=='Ya'){ ?>		
		<tr>    
		    <td>Nama tertera di KIP</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->terima_fisik_kartu_kip=='Ya'){ ?>		
		<tr>    
		    <td>Terima fisik kartu KIP</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted">Ya/Tidak</td>
		</tr>
	<?php } ?>
	<?php if ($formulir->jenis_ekstrakurikuler=='Ya'){ ?>		
		<tr>    
		    <td>Hobi</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
		
		<tr>   
		    <td>Nama Ayah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php if ($formulir->nik_ayah=='Ya'){ ?>		
		<tr>   
		    <td>NIK Ayah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>		
	<?php if ($formulir->tahun_lahir_ayah=='Ya'){ ?>		
		<tr>    
		    <td>Tahun lahir Ayah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->pendidikan_ayah=='Ya'){ ?>	
		<tr>    
		    <td>Pendidikan Ayah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>		
	<?php } ?>
	<?php if ($formulir->pekerjaan_ayah=='Ya'){ ?>		
		<tr>    
		    <td>Pekerjaan Ayah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->penghasilan_bulanan_ayah=='Ya'){ ?>		
		<tr>    
		    <td>Penghasilan bulanan Ayah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->berkebutuhan_khusus_ayah=='Ya'){ ?>		
		<tr>    
		    <td>Berkebutuhan khusus Ayah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
				
		<tr>    
		    <td>Nama Ibu</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php if ($formulir->nik_ibu=='Ya'){ ?>			
		<tr>    
		    <td>NIK Ibu</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->tahun_lahir_ibu=='Ya'){ ?>		
		<tr>    
		    <td>Tahun lahir Ibu</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->pendidikan_ibu=='Ya'){ ?>		
		<tr>   
		    <td>Pendidikan Ibu</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->pekerjaan_ibu=='Ya'){ ?>		
		<tr>   
		    <td>Pekerjaan Ibu</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->penghasilan_bulanan_ibu=='Ya'){ ?>		
		<tr>   
		    <td>Penghasilan bulanan Ibu</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->berkebutuhan_khusus_ibu=='Ya'){ ?>		
		<tr>    
		    <td>Berkebutuhan khusus Ibu</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->nama_wali=='Ya'){ ?>			
		<tr>
		    <td>Nama Wali</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->nik_wali=='Ya'){ ?>		
		<tr>   
		    <td>NIK Wali</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->tahun_lahir_wali=='Ya'){ ?>		
		<tr>
		    <td>Tahun lahir Wali</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->pendidikan_wali=='Ya'){ ?>		
		<tr> 
		    <td>Pendidikan Wali</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->pekerjaan_wali=='Ya'){ ?>		
		<tr>   
		    <td>Pekerjaan Wali</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->penghasilan_bulanan_wali=='Ya'){ ?>		
		<tr>   
		    <td>Penghasilan bulanan Wali</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>

	<?php if ($formulir->no_telepon_rumah=='Ya'){ ?>					
		<tr>   
		    <td>No. Telepon Rumah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->nomor_hp=='Ya'){ ?>
		<tr>    
		    <td>No. Handphone</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>	
	<?php if ($formulir->email=='Ya'){ ?>			
		<tr>    
		    <td>Email</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>

	<?php if ($formulir->tinggi_badan=='Ya'){ ?>					
		<tr> 	   
		    <td>Tinggi Badan</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->berat_badan=='Ya'){ ?>		
		<tr> 	   
		    <td>Berat Badan</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
		<tr> 		 
		    <td>Jarak ke sekolah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php if ($formulir->jumlah_saudara_kandung=='Ya'){ ?>			
		<tr> 	    
		    <td>Jumlah saudara kandung</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>	

		<tr>    
		    <td>Jalur Pendaftaran</td>
		    <td>: </td>
		    <!-- <td style="border-bottom: 1px dotted">Zonasi/Prestasi/Afirmasi/Perpindahan tugas orangtua</td> -->
			<td style="border-bottom: 1px dotted">
			<?php foreach ($jalur as $value)
				echo $value->jalur."/";
			?>	
			</td>				    
		</tr>

	<?php if ($pengaturan->jenjang=='SMP/MTs'){ ?>
		<tr>    
		    <td>Sekolah Pilihan 1</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"><?php echo $pengaturan->nama_sekolah ?></td>
		</tr>		
		<tr>    
		    <td>Sekolah Pilihan 2</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>

	<?php if ($formulir->jurusan=='Ya'){ ?>
		<tr>
		    <td>Jurusan Pilihan 1</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
		<tr>
		    <td>Jurusan Pilihan 2</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>		
	<?php } ?>
		<tr>		    
		    <td>Asal Sekolah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php if ($formulir->no_peserta_ujian=='Ya'){ ?>		
		<tr>		    
		    <td>No. Peserta Ujian Nasional</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>	
	<?php if ($formulir->no_seri_ijazah=='Ya'){ ?>		
		<tr>		    
		    <td>No. Seri Ijazah</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->no_seri_skhu=='Ya'){ ?>		
		<tr>		    
		    <td>No. Seri SKHU</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>	
		</tr>
	<?php } ?>	
			
	<?php if ($formulir->nilai_rapor=='Ya'){ ?>		
		<tr>		 
		    <td>Nilai Rata-rata Rapor</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>		
	<?php if ($formulir->nilai_usbn=='Ya'){ ?>		
		<tr>		 
		    <td>Nilai Rata-rata USBN</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>
	<?php if ($formulir->nilai_unbk_unkp=='Ya'){ ?>		
		<tr>		 
		    <td>Nilai Rata-rata UN</td>
		    <td>: </td>
		    <td style="border-bottom: 1px dotted"></td>
		</tr>
	<?php } ?>	
    </table>
 
    <table border="1">
    	<tr>
            <th>No</th>
            <th>Jenis</th>
	        <th>Nama Prestasi</th>
            <th>Tahun</th>
            <th>Penyelenggara</th>
            <th>Tingkat</th>
            <th>Juara</th>
        </tr>
    	<tr>
            <td><br></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr> 
    	<tr>
            <td><br></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr> 
    	<tr>
            <td><br></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>                 
    </table><br> 

 	<table>    
		<tr>
			<td style="width: 200px">Mengetahui</td>
			<td></td>  	    
			<td></td>
			<td></td> 
			<td colspan="2"><?php echo ucwords($pengaturan->kecamatan) ?>,....................</td>		
        </tr>  
		<tr>
			<td>Orang Tua/Wali</td>
			<td></td>  	    
			<td></td>
			<td></td> 
			<td style="width: 200px">Calon Siswa</td>
			<td></td>  			
        </tr> 
		<tr>
			<td><br><br><br></td>
			<td></td>  	    
			<td></td>
			<td></td> 
			<td></td>
			<td></td>  			
        </tr>   
		<tr>
			<td style="font-size: 12px;border-top: 1px solid">Nama Terang dan Tanda Tangan</td>
			<td></td>  	    
			<td></td>
			<td></td> 
			<td style="font-size: 12px;border-top: 1px solid">Nama Terang dan Tanda Tangan</td>
			<td></td>  			
        </tr>
		<tr>
			<td colspan="6" style="font-size: 12px;">
			<br>
			<?php foreach ($pengumuman as $text) { ?>				
				<?php echo $text->text ?>
			<?php } ?>
			<br><br>				
			</td>	    
        </tr>                                  		
		<tr>	
			<td rowspan="3" style="text-align: center">
				<!-- <img src="<?php echo base_url('assets/uploads/image/grcode/'.$peserta->qrcode) ?>" width="100px" height="100px"> -->
			</td> 
			<td></td>
			<td rowspan="3" style="text-align: center">
                  <img src="<?php echo base_url('assets/uploads/image/user/foto.jpg') ?>" width="60px" height="70px">
			</td>  
			<td></td>	    
		    <td colspan="2"><?php echo ucwords($pengaturan->kecamatan) ?>,....................</td>
        </tr> 
		<tr>	
			<td></td> 
			<td></td>   
		    <td style="border-bottom: 1px solid">Petugas Pendaftar<br><br><br><br><br></td>
		    <td></td> 
        </tr>  
		<tr>
			<td></td>
			<td></td>
			<td></td>   	    
		    <td><br></td>
        </tr>                                           
    </table>
</body>
<script type="text/javascript">
    window.print()
</script>
</html>