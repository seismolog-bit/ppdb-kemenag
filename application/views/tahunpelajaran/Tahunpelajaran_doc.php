<!doctype html>
<html>
    <head>
        <title>codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tahun Pelajaran List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>Tahun Pelajaran</th>
        		<th>Kuota</th>
        		<th>Tanggal Mulai Pendaftaran</th>
        		<th>Tanggal Selesai Pendaftaran</th>
        		<th>Tanggal Mulai Seleksi</th>
        		<th>Tanggal Selesai Seleksi</th>
        		<th>Tanggal Pengumuman</th>
        		<th>Tanggal Mulai Daftar Ulang</th>
        		<th>Tanggal Selesai Daftar Ulang</th>
        		<th>Status Tahun</th>
		    </tr>
            <?php
            foreach ($tahunpelajaran_data as $tahunpelajaran)
            { ?>
            <tr>
    		    <td><?php echo ++$start ?></td>
    		    <td><?php echo $tahunpelajaran->tahun_pelajaran ?></td>
    		    <td><?php echo $tahunpelajaran->kuota ?></td>
    		    <td><?php echo $tahunpelajaran->tanggal_mulai_pendaftaran ?></td>
    		    <td><?php echo $tahunpelajaran->tanggal_selesai_pendaftaran ?></td>
    		    <td><?php echo $tahunpelajaran->tanggal_mulai_seleksi ?></td>
    		    <td><?php echo $tahunpelajaran->tanggal_selesai_seleksi ?></td>
    		    <td><?php echo $tahunpelajaran->tanggal_pengumuman ?></td>
    		    <td><?php echo $tahunpelajaran->tanggal_mulai_daftar_ulang ?></td>
    		    <td><?php echo $tahunpelajaran->tanggal_selesai_daftar_ulang ?></td>
    		    <td><?php echo $tahunpelajaran->status_tahun ?></td>	
            </tr>
            <?php } ?>
        </table>
    </body>
</html>