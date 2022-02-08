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
    <h3 align="center">Data Sekolah</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
              <th>No</th>
            	<th>NPSN</th>
            	<th>Nama Asal Sekolah</th>
            	<th>Alamat Sekolah</th>
            	<th>Kelurahan</th>
            	<th>Status Sekolah</th>
            	<th>Kecamatan</th>
		        </tr>
            <?php
            foreach ($sekolah_data as $sekolah)
            {?>
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
<script type="text/javascript">
  window.print()
</script>
</html>