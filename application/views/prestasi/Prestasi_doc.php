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
        <h2>Prestasi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>Tingkat</th>
        		<th>Kategori</th>
        		<th>Peringkat</th>
        		<th>Poin Prestasi</th>
		    </tr>
            <?php
                foreach ($prestasi_data as $prestasi)
            { ?>
            <tr>
		        <td><?php echo ++$start ?></td>
		        <td><?php echo $prestasi->tingkat ?></td>
		        <td><?php echo $prestasi->kategori ?></td>
		        <td><?php echo $prestasi->juara ?></td>
		        <td><?php echo $prestasi->skor_prestasi ?></td>	
            </tr>
            <?php } ?>
        </table>
    </body>
</html>