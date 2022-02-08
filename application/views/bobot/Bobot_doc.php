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
        <h2>Bobot List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>Jalur</th>
        		<th>Bobot Jarak</th>
        		<th>Bobot Nilai</th>
        		<th>Bobot Prestasi</th>
		
            </tr>
            <?php
                foreach ($bobot_data as $bobot)
            { ?>
            <tr>
		        <td><?php echo ++$start ?></td>
		        <td><?php echo $bobot->jalur ?></td>
		        <td><?php echo $bobot->bobot_jarak ?></td>
		        <td><?php echo $bobot->bobot_nilai ?></td>
		        <td><?php echo $bobot->bobot_prestasi ?></td>	
            </tr>
            <?php } ?>
        </table>
    </body>
</html>