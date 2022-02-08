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
    <h3 align="center">Data Jalur</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
      <tr>
        <th>No</th>
        <th>Jalur Pendaftaran</th>
        <th>Persentase</th>	
        <th>Status</th> 	
      </tr>
      <?php
        foreach ($jalur_data as $jalur)
      { ?>
      <tr>
    		<td><?php echo ++$start ?></td>
    		<td><?php echo $jalur->jalur ?></td>
    		<td><?php echo $jalur->persentase ?></td>	
        <td><?php echo $jalur->status_jalur ?></td> 
      </tr>
      <?php } ?>
    </table>
</body>
<script type="text/javascript">
  window.print()
</script>
</html>