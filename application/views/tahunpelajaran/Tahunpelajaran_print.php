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
    <h3 align="center">Data Tahun Pelajaran</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
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
<script type="text/javascript">
  window.print()
</script>
</html>