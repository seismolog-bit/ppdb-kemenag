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
    <h3 align="center">Data Prestasi Peserta</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
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
<script type="text/javascript">
    window.print()
</script>
</html>