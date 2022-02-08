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
        <h2>Prestasi Peserta List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Nomer</th>
                <th>Nama</th>
        		<th>Jenis</th>
        		<th>Nama Prestasi</th>
        		<th>Tahun</th>
        		<th>Penyelenggara</th>
        		<th>Tingkat</th>
        		<th>Kategori</th>
                <th>Peringkat</th>
                <th>Poin</th>
            </tr>
            <?php
                foreach ($prestasipeserta_data as $prestasipeserta)
            { ?>
            <tr>
		        <td><?php echo ++$start ?></td>
                <td><?php echo $prestasipeserta->no_pendaftaran ?></td>
                <td><?php echo $prestasipeserta->nama_peserta ?></td>
		        <td><?php echo $prestasipeserta->jenis ?></td>
		        <td><?php echo $prestasipeserta->nama_prestasi ?></td>
		        <td><?php echo $prestasipeserta->tahun ?></td>
		        <td><?php echo $prestasipeserta->penyelenggara ?></td>
		        <td><?php echo $prestasipeserta->tingkat ?></td>
		        <td><?php echo $prestasipeserta->kategori ?></td>	
                <td><?php echo $prestasipeserta->juara ?></td>
                <td><?php echo $prestasipeserta->skor_prestasi ?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>