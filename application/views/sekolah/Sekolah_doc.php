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
        <h2>Sekolah List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>NPSN Sekolah</th>
        		<th>Nama Asal Sekolah</th>
        		<th>Alamat Sekolah</th>
        		<th>Kelurahan</th>
        		<th>Status Sekolah</th>
        		<th>Kecamatan</th>
		    </tr>
            <?php
            foreach ($sekolah_data as $sekolah)
            { ?>
            <tr>
		        <td><?php echo ++$start ?></td>
		        <td><?php echo $sekolah->npsn_sekolah ?></td>
		        <td><?php echo $sekolah->asal_sekolah ?></td>
		        <td><?php echo $sekolah->alamat_sekolah ?></td>
		        <td><?php echo $sekolah->kelurahan ?></td>
		        <td><?php echo $sekolah->status_sekolah ?></td>
		        <td><?php echo $sekolah->kecamatan ?></td>	
            </tr>
            <?php } ?>
        </table>
    </body>
</html>