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
        <h2>Jarak List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        		<th>Jarak ke sekolah</th>
        		<th>Poin Jarak</th>
		    </tr>
            <?php
                foreach ($jarak_data as $jarak)
            { ?>
            <tr>
		        <td><?php echo ++$start ?></td>
		        <td><?php echo $jarak->jarak ?></td>
		        <td><?php echo $jarak->skor_jarak ?></td>	
            </tr>
            <?php } ?>
        </table>
    </body>
</html>