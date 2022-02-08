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
        <h2>Peserta List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
				<th>No Pendaftaran</th>
				<th>Tanggal Daftar</th>
				<th>Tahun</th>
				<th>Jalur</th>
				<th>Nama Peserta</th>
				<th>Jenis Kelamin</th>
				<th>NISN</th>
				<th>NIK</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>No Registrasi Akta Lahir</th>
				<th>Agama</th>
				<th>Kewarganegaraan</th>
				<th>Berkebutuhan Khusus</th>
				<th>Alamat</th>
				<th>RT</th>
				<th>RW</th>
				<th>Nama Dusun</th>
				<th>Nama Kelurahan</th>
				<th>Kecamatan</th>
				<th>Kode Pos</th>
				<th>Latitude</th>
				<th>Longitude</th>
				<th>Tempat Tinggal</th>
				<th>Moda Transportasi</th>
				<th>No KKS</th>
				<th>Anak Ke</th>
				<th>Penerima KPS/PKH</th>
				<th>No KPS/PKH</th>
				<th>Penerima KIP</th>
				<th>No KIP</th>
				<th>Nama Tertera Di KIP</th>
				<th>Terima Fisik Kartu KIP</th>
				<th>Nama Ayah</th>
				<th>NIK Ayah</th>
				<th>Tahun Lahir Ayah</th>
				<th>Pendidikan Ayah</th>
				<th>Pekerjaan Ayah</th>
				<th>Penghasilan Bulanan Ayah</th>
				<th>Berkebutuhan Khusus Ayah</th>
				<th>Nama Ibu</th>
				<th>NIK Ibu</th>
				<th>Tahun Lahir Ibu</th>
				<th>Pendidikan Ibu</th>
				<th>Pekerjaan Ibu</th>
				<th>Penghasilan Bulanan Ibu</th>
				<th>Berkebutuhan Khusus Ibu</th>
				<th>Nama Wali</th>
				<th>NIK Wali</th>
				<th>Tahun Lahir Wali</th>
				<th>Pendidikan Wali</th>
				<th>Pekerjaan Wali</th>
				<th>Penghasilan Bulanan Wali</th>
				<th>No Telepon Rumah</th>
				<th>Nomor HP</th>
				<th>Email</th>
				<th>Jenis Ekstrakurikuler</th>
				<th>Tinggi Badan</th>
				<th>Berat Badan</th>
				<th>Jarak ke sekolah</th>
				<th>Jumlah Saudara Kandung</th>
				<th>Jurusan Pilihan 1</th>
				<th>Jurusan Pilihan 2</th>
				<th>Sekolah Pilihan 2</th>
				<th>Asal Sekolah</th>
				<th>No UN</th>
				<th>No Seri Ijazah</th>
				<th>No Seri SKHU</th>
				<th>Poin Jarak</th>
				<th>Nilai Rapor</th>
				<th>Nilai USBN</th>
				<th>Nilai UN</th>
				<th>Status</th>
				<th>Status Hasil</th>
				<th>Status Daftar Ulang</th>
            </tr>
            <?php
                foreach ($peserta_data as $peserta)
            { ?>
            <tr>
		        <td><?php echo ++$start ?></td>
		        <td><?php echo $peserta->no_pendaftaran ?></td>
		        <td><?php echo $peserta->tanggal_daftar ?></td>
		        <td><?php echo $peserta->tahun_pelajaran ?></td>
		        <td><?php echo $peserta->jalur ?></td>
		        <td><?php echo $peserta->nama_peserta ?></td>
		        <td><?php echo $peserta->jenis_kelamin ?></td>
		        <td><?php echo $peserta->nisn ?></td>
		        <td><?php echo $peserta->nik ?></td>
		        <td><?php echo $peserta->tempat_lahir ?></td>
		        <td><?php echo $peserta->tanggal_lahir ?></td>
		        <td><?php echo $peserta->no_registrasi_akta_lahir ?></td>
		        <td><?php echo $peserta->agama ?></td>
		        <td><?php echo $peserta->kewarganegaraan ?></td>
		        <td><?php echo $peserta->berkebutuhan_khusus ?></td>
		        <td><?php echo $peserta->alamat ?></td>
		        <td><?php echo $peserta->rt ?></td>
		        <td><?php echo $peserta->rw ?></td>
		        <td><?php echo $peserta->nama_dusun ?></td>
		        <td><?php echo $peserta->nama_kelurahan ?></td>
		        <td><?php echo $peserta->kecamatan ?></td>
		        <td><?php echo $peserta->kode_pos ?></td>
		        <td><?php echo $peserta->latitude ?></td>
		        <td><?php echo $peserta->longitude ?></td>
		        <td><?php echo $peserta->tempat_tinggal ?></td>
		        <td><?php echo $peserta->moda_transportasi ?></td>
		        <td><?php echo $peserta->no_kks ?></td>
		        <td><?php echo $peserta->anak_ke ?></td>
		        <td><?php echo $peserta->penerima_kps_pkh ?></td>
		        <td><?php echo $peserta->no_kps_pkh ?></td>
		        <td><?php echo $peserta->penerima_kip ?></td>
		        <td><?php echo $peserta->no_kip ?></td>
		        <td><?php echo $peserta->nama_tertera_di_kip ?></td>
		        <td><?php echo $peserta->terima_fisik_kartu_kip ?></td>
		        <td><?php echo $peserta->nama_ayah ?></td>
		        <td><?php echo $peserta->nik_ayah ?></td>
		        <td><?php echo $peserta->tahun_lahir_ayah ?></td>
		        <td><?php echo $peserta->pendidikan_ayah ?></td>
		        <td><?php echo $peserta->pekerjaan_ayah ?></td>
		        <td><?php echo $peserta->penghasilan_bulanan_ayah ?></td>
		        <td><?php echo $peserta->berkebutuhan_khusus_ayah ?></td>
		        <td><?php echo $peserta->nama_ibu ?></td>
		        <td><?php echo $peserta->nik_ibu ?></td>
		        <td><?php echo $peserta->tahun_lahir_ibu ?></td>
		        <td><?php echo $peserta->pendidikan_ibu ?></td>
		        <td><?php echo $peserta->pekerjaan_ibu ?></td>
		        <td><?php echo $peserta->penghasilan_bulanan_ibu ?></td>
		        <td><?php echo $peserta->berkebutuhan_khusus_ibu ?></td>
		        <td><?php echo $peserta->nama_wali ?></td>
		        <td><?php echo $peserta->nik_wali ?></td>
		        <td><?php echo $peserta->tahun_lahir_wali ?></td>
		        <td><?php echo $peserta->pendidikan_wali ?></td>
		        <td><?php echo $peserta->pekerjaan_wali ?></td>
		        <td><?php echo $peserta->penghasilan_bulanan_wali ?></td>
		        <td><?php echo $peserta->no_telepon_rumah ?></td>
		        <td><?php echo $peserta->nomor_hp ?></td>
		        <td><?php echo $peserta->email ?></td>
		        <td><?php echo $peserta->jenis_ekstrakurikuler ?></td>
		        <td><?php echo $peserta->tinggi_badan ?></td>
		        <td><?php echo $peserta->berat_badan ?></td>
		        <td><?php echo $peserta->jarak ?></td>
		        <td><?php echo $peserta->jumlah_saudara_kandung ?></td>
		        <td><?php echo $peserta->nama_jurusan ?></td>
		        <td><?php echo $peserta->pilihan_dua ?></td>
		        <td><?php echo $peserta->pilihan_sekolah_lain ?></td>
		        <td><?php echo $peserta->asal_sekolah ?></td>
		        <td><?php echo $peserta->no_un ?></td>
		        <td><?php echo $peserta->no_seri_ijazah ?></td>
		        <td><?php echo $peserta->no_seri_skhu ?></td>
		        <td><?php echo $peserta->skor_jarak ?></td>
		        <td><?php echo $peserta->nilai_rapor ?></td>
		        <td><?php echo $peserta->nilai_usbn ?></td>
		        <td><?php echo $peserta->nilai_unbk_unkp ?></td>
		        <td><?php echo $peserta->status ?></td>
		        <td><?php echo $peserta->status_hasil ?></td>
		        <td><?php echo $peserta->status_daftar_ulang ?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>