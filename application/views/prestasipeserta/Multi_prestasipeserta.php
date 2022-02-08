<div class="row">
<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
        <h3 class="box-title">Tambah Prestasi</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                <i class="fa fa-refresh"></i></button>
            </div>
        </div>
        <div class="box-body">     
            <div class="table-responsive">
			<form action="add_multiprestasi" method="post">            	
                <table class="table table-bordered table-striped" id="mytablexx" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                    		<th width="100px">Jenis</th>
                    		<th>Nama Prestasi</th>
                    		<th width="70px">Tahun</th>
                    		<th>Penyelenggara</th>
                    		<th width="390px">Detail</th>
                        </tr>
                    </thead>
					<tbody>						
						<?php 
						$no = 1;
						for($i=0; $i < $banyak_data; $i++) { ?>
							<tr>  
								<td style="text-align: center"><?= $no++ ?></td>
					            <td>
					            	<input type="hidden" class="form-control" name="id_peserta[]" id="id_peserta" value="<?php echo $nomer->id_peserta; ?>" />
					            	<input type="text" class="form-control" name="jenis[]" id="jenis" required />
                                </td>
					            <td><input type="text" class="form-control" name="nama_prestasi[]" id="nama_prestasi" required/></td>
					            <td><input type="text" class="form-control" name="tahun[]" id="tahun" maxlength="4" onkeypress="return Angkasaja(event)" required/></td>
					            <td><input type="text" class="form-control" name="penyelenggara[]" id="penyelenggara" required/></td>
					            <td>
				                    <select type="text" class="select2 form-control" name="id_prestasi[]" id="id_prestasi" value="" required/>
				                        <option value="">Pilih Detail Prestasi</option>
				                        <?php foreach ($prestasi as $key => $value) { ?>
				                            <option value="<?= $value->id_prestasi;?>">
				                                Tingkat <?= $value->tingkat;?> | Kategori <?= $value->kategori;?> | Peringkat <?= $value->juara;?>
				                            </option>
				                        <?php } ?>
				                    </select>
					            </td>
							</tr>
						<?php } ?>
					</tbody>						                  
                </table>
                <div class="form-group">
                    <button type="submit" class="<?= $this->config->item('botton')?>">Simpan Prestasi</button>
                    <a href="<?php echo site_url('dashboard') ?>" class="btn btn-default btn-flat">Batal</a>
                </div>
            </form>
            </div>
            <div class="callout callout-info">
            <p>    
                <ul>    
                    <li>Jenis Prestasi : Jenis prestasi yang pernah diraih oleh peserta didik (OSN, O2SN, FLS2N, lain-lain).</li>
                    <li>Nama Prestasi : Nama kegiatan/acara dari prestasi yang pernah diraih oleh peserta didik. Contoh: Lomba Cerdas Cermat Bahasa Indonesia Tingkat SD. Sesuaikan menurut piagam yang diperoleh.</li>
                    <li>Tahun Prestasi : Tahun prestasi yang pernah diraih oleh peserta didik.</li>
                    <li>Penyelenggara : Nama penyelenggara/panitia kegiatan dari prestasi yang pernah diraih oleh peserta didik. Contoh: Panitia O2SN dan FLS2N Kab. TUBABA. Sesuaikan menurut piagam yang diperoleh.</li>
                </ul></p>    
            </div>            
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    function Angkasaja(evt) 
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }
</script>