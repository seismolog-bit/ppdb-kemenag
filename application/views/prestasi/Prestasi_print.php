<!DOCTYPE html>
<html>
<head>
    <title>Tittle</title>
    <style type="text/css" media="print">
    @page {
        margin: 0;  /* this affects the margin in the printer settings */
    }
      table{
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
      }
      table th{
        -webkit-print-color-adjust:exact;
        border: 1px solid;
        padding-top: 11px;
        padding-bottom: 11px;
        background-color: #39CCCC;
      }
    table td{
        border: 1px solid;
    }
    </style>
</head>
<body>
    <h3 align="center">Data Prestasi</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
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
<script type="text/javascript">
    window.print()
</script>
</html>