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
    <h3 align="center">Data Jurusan</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
            <th>Bidang Keahlian</th>
		    <th>Nama Jurusan</th>
            <th>Kuota</th>
		</tr>
        <?php
            foreach ($jurusan_data as $jurusan)
        { ?>
        <tr>
		    <td><?php echo ++$start ?></td>
            <td><?php echo $jurusan->bidang_keahlian ?></td>   
		    <td><?php echo $jurusan->nama_jurusan ?></td>	
            <td><?php echo $jurusan->kuota_jurusan ?></td>   
        </tr>
        <?php } ?>
    </table>
</body>
<script type="text/javascript">
    window.print()
</script>
</html>