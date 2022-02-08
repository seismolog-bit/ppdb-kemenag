<!DOCTYPE html>
<html>
<head>
    <title>SKL PD</title>
    <style type="text/css" media="print">
    @page {
        margin-top: 30;  /* this affects the margin in the printer settings */
    	margin-bottom: 150;
    	margin-left: 50;
    	margin-right: 50;
    }
    table{
        border-collapse: collapse;
        border-spacing: 0;       
        width: 100%;
    }
    table th{
        -webkit-print-color-adjust:exact;
        border: 1px solid;
        padding-top: 5px;
        padding-bottom: 5px;
        background-color: #39CCCC;
        /*text-align: left;*/
    }
    table td{    
        /*border: 0px solid;*/
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
    .ttd {
        position: absolute;
        left: 490px;
        top: 580px;
    }  
    .stempel {
        position: absolute;
        left: 450px;
        top: 570px;
    }        	
    </style>
</head>
<body> 
<?php if ($pengaturan->sttd=="Ya") {
    if (file_exists('assets/dist/img/'.$pengaturan->ttd)) { ?>    
        <div class="ttd">
            <img src="<?php echo base_url('assets/dist/img/'.$pengaturan->ttd) ?>" height="<?php echo $pengaturan->httd ?>px">
        </div>
    <?php }
    } ?>
<?php if ($pengaturan->sstempel=="Ya") {
    if (file_exists('assets/dist/img/'.$pengaturan->stempel)) { ?>     
        <div class="stempel">
            <img src="<?php echo base_url('assets/dist/img/'.$pengaturan->stempel) ?>" height="<?php echo $pengaturan->hstempel ?>px">
        </div>
    <?php }
    } ?>
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
    <br>
    <br>
 	<table>    
		<tr>	
			<td colspan="3" style="text-align: center"><strong>PENGUMUMAN</strong></td>	    
        </tr> 
		<tr>	    
		    <td colspan="3" style="text-align: center"><strong>KEPALA <?php echo strtoupper($pengaturan->nama_sekolah) ?></strong></td>
        </tr> 
		<tr>	    
		    <td colspan="3" style="text-align: center">
                <strong>Nomor :
                <?php foreach ($pengumuman as $text) {             
                    echo $text->judul;
                } ?> 
                </strong>
            </td>
        </tr>  
		<tr>	    
		    <td colspan="3" style="text-align: center"><br><br></td>
        </tr>
		<tr>	
			<td colspan="3" style="text-align: center"><strong>TENTANG</strong></td>	    
        </tr> 
		<tr>	
			<td colspan="3" style="text-align: center"><strong>HASIL SELEKSI CALON PESERTA DIDIK BARU</strong></td>	    
        </tr>
        <?php $tp = $peserta->tahun_pelajaran + 1; ?>  
		<tr>	
			<td colspan="3" style="text-align: center"><strong>TAHUN PELAJARAN <?php echo $peserta->tahun_pelajaran ?>/<?php echo $tp ?></strong></td>	    
        </tr>
		<tr>	    
		    <td colspan="3" style="text-align: center"><br><br></td>
        </tr>        
    </table>
    <table class="word-table" style="margin-bottom: 10px">	
    	<tr>
            <td colspan="5">Diumumkan kepada para peserta seleksi masuk <?php echo strtoupper($pengaturan->nama_sekolah) ?> :</td>
        </tr> 
    	<tr>
            <td width="30px"></td>
            <td width="150px">Nama</td>
	        <td>: <strong><?php echo strtoupper($peserta->nama_peserta) ?></strong></td>
            <td></td>
            <td></td>
        </tr> 
    	<tr>
            <td></td>
            <td>No. Pendaftaran</td>
	        <td>: <?php echo $peserta->no_pendaftaran ?></td>
            <td></td>
            <td></td>
        </tr>                   	
    	<tr>
            <td></td>
            <td>Asal Sekolah</td>
	        <td>: <?php echo strtoupper($peserta->asal_sekolah) ?></td>
            <td></td>
            <td></td>
        </tr> 
        <?php $tp = $peserta->tahun_pelajaran + 1; ?>  
    	<tr>
            <td></td>
            <td>Dinyatakan</td>
	        <td>: <strong><?php echo strtoupper($peserta->status_hasil) ?></strong></td>
            <td></td>
            <td></td>
        </tr>
        <?php if ($pengaturan->jenjang=="SMA/MA" || $pengaturan->jenjang=="SMK") { ?>
    	<tr>
            <td></td>
            <td>Kompetensi Keahlian</td>
	        <td>: <?php echo strtoupper($peserta->nama_jurusan) ?></td>
            <td></td>
            <td></td>
        </tr>
        <?php } ?>          
    	<tr>
            <td colspan="5"><br>selanjutnya kepada para peserta yang dinyatakan <strong>DI TERIMA</strong> untuk melakukan <strong>REGISTRASI ULANG</strong> dengan ketentuan sebagai berikut :</td>
        </tr>
    	<tr>
            <td></td>
            <td>Tanggal</td>
	        <td>: <?php echo date('d F Y', strtotime($peserta->tanggal_mulai_daftar_ulang)) ?> s.d <?php echo date('d F Y', strtotime($peserta->tanggal_selesai_daftar_ulang)) ?></td>
            <td></td>
            <td></td>
        </tr>
    	<tr>
            <td></td>
            <td>Waktu</td>
	        <td>: Pukul 08.00 s.d 12.00 </td>
            <td></td>
            <td></td>
        </tr>                                                  
    </table>
	<br>

 	<table>    
		<tr>	
			<td rowspan="3" width="140px" style="text-align: center">
				<img src="<?php echo base_url('assets/uploads/image/grcode/'.$peserta->qrcode) ?>" width="100px" height="100px">
			</td> 
			<td width="150px"></td>
			<td rowspan="3" width="100px" style="text-align: center"></td>  
			<td width="40px"></td>	    
		    <td><?php echo ucwords($pengaturan->kecamatan) ?>, <?php echo date('d F Y', strtotime($peserta->tanggal_pengumuman)) ?></td>
        </tr> 
		<tr>	
			<td></td> 
			<td></td>   
		    <td>Kepala Sekolah,<br><br><br><br><br>
            </td>
        </tr>   
		<tr>
			<td></td>
			<td></td>  	    
		    <td><strong><?php echo $pengaturan->kepala_sekolah ?></strong></td>
        </tr> 
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>   	    
		    <td>NIP. <?php echo $pengaturan->nip ?></td>
        </tr>           
		<tr>
			<td colspan="5" style="font-size: 13px"><br><br>
			<?php foreach ($pengumuman as $text) { ?>				
				<?php echo $text->text ?>
			<?php } ?>				
			</td>	    
        </tr>                                     
    </table>
</body>
<script type="text/javascript">
    window.print()
</script>
</html>