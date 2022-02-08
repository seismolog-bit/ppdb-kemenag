<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Formulir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Formulir_model');
        $this->load->model('Pengaturan_model'); 
        $this->load->model('Pengumuman_model');
        $this->load->model('Tahunpelajaran_model');
        $this->load->model('Jalur_model');
        $this->load->library('form_validation');        
    }

    public function index()
    {
        $data['title'] = 'Formulir';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Formulir' => '',
        ];
        
        $data['code_js'] = 'formulir/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();  
		$data['formulir'] =  $this->Formulir_model->get_by_id_1();        
        $data['page'] = 'formulir/Formulir_atur';
        $this->load->view('template/backend', $data);
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_formulir', TRUE));
        } else {
            $data = array(
				// 'tahun_pelajaran' => $this->input->post('tahun_pelajaran',TRUE),
				// 'jalur_pendaftaran' => $this->input->post('jalur_pendaftaran',TRUE),
				// 'nama_peserta' => $this->input->post('nama_peserta',TRUE),
				// 'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
				// 'nisn' => $this->input->post('nisn',TRUE),
				'nik' => $this->input->post('nik',TRUE),
				// 'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
				// 'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
				'no_registrasi_akta_lahir' => $this->input->post('no_registrasi_akta_lahir',TRUE),
				// 'agama' => $this->input->post('agama',TRUE),
				'kewarganegaraan' => $this->input->post('kewarganegaraan',TRUE),
				'berkebutuhan_khusus' => $this->input->post('berkebutuhan_khusus',TRUE),
				// 'alamat' => $this->input->post('alamat',TRUE),
				'rt' => $this->input->post('rt',TRUE),
				'rw' => $this->input->post('rw',TRUE),
				'nama_dusun' => $this->input->post('nama_dusun',TRUE),
				'nama_kelurahan' => $this->input->post('nama_kelurahan',TRUE),
				'kecamatan' => $this->input->post('kecamatan',TRUE),
				'kode_pos' => $this->input->post('kode_pos',TRUE),
				'latitude' => $this->input->post('latitude',TRUE),
				'longitude' => $this->input->post('longitude',TRUE),
				'tempat_tinggal' => $this->input->post('tempat_tinggal',TRUE),
				'moda_transportasi' => $this->input->post('moda_transportasi',TRUE),
				'no_kks' => $this->input->post('no_kks',TRUE),
				'anak_ke' => $this->input->post('anak_ke',TRUE),
				'penerima_kps_pkh' => $this->input->post('penerima_kps_pkh',TRUE),
				'no_kps_pkh' => $this->input->post('no_kps_pkh',TRUE),
				'penerima_kip' => $this->input->post('penerima_kip',TRUE),
				'no_kip' => $this->input->post('no_kip',TRUE),
				'nama_tertera_di_kip' => $this->input->post('nama_tertera_di_kip',TRUE),
				'terima_fisik_kartu_kip' => $this->input->post('terima_fisik_kartu_kip',TRUE),
				// 'nama_ayah' => $this->input->post('nama_ayah',TRUE),
				'nik_ayah' => $this->input->post('nik_ayah',TRUE),
				'tahun_lahir_ayah' => $this->input->post('tahun_lahir_ayah',TRUE),
				'pendidikan_ayah' => $this->input->post('pendidikan_ayah',TRUE),
				'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah',TRUE),
				'penghasilan_bulanan_ayah' => $this->input->post('penghasilan_bulanan_ayah',TRUE),
				'berkebutuhan_khusus_ayah' => $this->input->post('berkebutuhan_khusus_ayah',TRUE),
				// 'nama_ibu' => $this->input->post('nama_ibu',TRUE),
				'nik_ibu' => $this->input->post('nik_ibu',TRUE),
				'tahun_lahir_ibu' => $this->input->post('tahun_lahir_ibu',TRUE),
				'pendidikan_ibu' => $this->input->post('pendidikan_ibu',TRUE),
				'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu',TRUE),
				'penghasilan_bulanan_ibu' => $this->input->post('penghasilan_bulanan_ibu',TRUE),
				'berkebutuhan_khusus_ibu' => $this->input->post('berkebutuhan_khusus_ibu',TRUE),
				'nama_wali' => $this->input->post('nama_wali',TRUE),
				'nik_wali' => $this->input->post('nik_wali',TRUE),
				'tahun_lahir_wali' => $this->input->post('tahun_lahir_wali',TRUE),
				'pendidikan_wali' => $this->input->post('pendidikan_wali',TRUE),
				'pekerjaan_wali' => $this->input->post('pekerjaan_wali',TRUE),
				'penghasilan_bulanan_wali' => $this->input->post('penghasilan_bulanan_wali',TRUE),
				'no_telepon_rumah' => $this->input->post('no_telepon_rumah',TRUE),
				// 'nomor_hp' => $this->input->post('nomor_hp',TRUE),
				'email' => $this->input->post('email',TRUE),
				'jenis_ekstrakurikuler' => $this->input->post('jenis_ekstrakurikuler',TRUE),
				'tinggi_badan' => $this->input->post('tinggi_badan',TRUE),
				'berat_badan' => $this->input->post('berat_badan',TRUE),
				// 'jarak_ke_sekolah' => $this->input->post('jarak_ke_sekolah',TRUE),
				'jumlah_saudara_kandung' => $this->input->post('jumlah_saudara_kandung',TRUE),
				'jurusan' => $this->input->post('jurusan',TRUE),
				// 'asal_sekolah' => $this->input->post('asal_sekolah',TRUE),
				'no_peserta_ujian' => $this->input->post('no_peserta_ujian',TRUE),
				'no_seri_ijazah' => $this->input->post('no_seri_ijazah',TRUE),
				'no_seri_skhu' => $this->input->post('no_seri_skhu',TRUE),
				'nilai_usbn' => $this->input->post('nilai_usbn',TRUE),
				'nilai_rapor' => $this->input->post('nilai_rapor',TRUE),
				'nilai_unbk_unkp' => $this->input->post('nilai_unbk_unkp',TRUE),
				'ketentuan' => $this->input->post('ketentuan',TRUE),
				'foto' => $this->input->post('foto',TRUE),
				'akte_kelahiran' => $this->input->post('akte_kelahiran',TRUE),
				'kartu_keluarga' => $this->input->post('kartu_keluarga',TRUE),
				'skl_skhu' => $this->input->post('skl_skhu',TRUE),
				'skd' => $this->input->post('skd',TRUE),
				'berkaslain' => $this->input->post('berkaslain',TRUE),
				'tipe' => $this->input->post('tipe',TRUE),
				'kode_daring' => $this->input->post('kode_daring',TRUE),
				'kode_luring' => $this->input->post('kode_luring',TRUE),
				'kode_formulir' => $this->input->post('kode_formulir',TRUE),
				'foto_full' => $this->input->post('foto_full',TRUE),
				'rapor' => $this->input->post('rapor',TRUE),
				'sktm' => $this->input->post('sktm',TRUE),	
				'ktp_ortu' => $this->input->post('ktp_ortu',TRUE),	
				'kartu_bantuan' => $this->input->post('kartu_bantuan',TRUE),
				'sptjm' => $this->input->post('sptjm',TRUE),	
				'sp' => $this->input->post('sp',TRUE),									
	    	);

            $this->Formulir_model->update($this->input->post('id_formulir', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Berhasil diubah');
            helper_log("edit", "Update inputan formulir pendaftaran");             
            redirect(site_url('formulir'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('tahun_pelajaran', 'tahun pelajaran', 'trim');
	$this->form_validation->set_rules('jalur_pendaftaran', 'jalur pendaftaran', 'trim');
	$this->form_validation->set_rules('nama_peserta', 'nama peserta', 'trim');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim');
	$this->form_validation->set_rules('nisn', 'nisn', 'trim');
	$this->form_validation->set_rules('nik', 'nik', 'trim');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim');
	$this->form_validation->set_rules('no_registrasi_akta_lahir', 'no registrasi akta lahir', 'trim');
	$this->form_validation->set_rules('agama', 'agama', 'trim');
	$this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'trim');
	$this->form_validation->set_rules('berkebutuhan_khusus', 'berkebutuhan khusus', 'trim');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim');
	$this->form_validation->set_rules('rt', 'rt', 'trim');
	$this->form_validation->set_rules('rw', 'rw', 'trim');
	$this->form_validation->set_rules('nama_dusun', 'nama dusun', 'trim');
	$this->form_validation->set_rules('nama_kelurahan', 'nama kelurahan', 'trim');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim');
	$this->form_validation->set_rules('kode_pos', 'kode pos', 'trim');
	$this->form_validation->set_rules('latitude', 'latitude', 'trim');
	$this->form_validation->set_rules('longitude', 'longitude', 'trim');
	$this->form_validation->set_rules('tempat_tinggal', 'tempat tinggal', 'trim');
	$this->form_validation->set_rules('moda_transportasi', 'moda transportasi', 'trim');
	$this->form_validation->set_rules('no_kks', 'no kks', 'trim');
	$this->form_validation->set_rules('anak_ke', 'anak ke', 'trim');
	$this->form_validation->set_rules('penerima_kps_pkh', 'penerima kps pkh', 'trim');
	$this->form_validation->set_rules('no_kps_pkh', 'no kps pkh', 'trim');
	$this->form_validation->set_rules('penerima_kip', 'penerima kip', 'trim');
	$this->form_validation->set_rules('no_kip', 'no kip', 'trim');
	$this->form_validation->set_rules('nama_tertera_di_kip', 'nama tertera di kip', 'trim');
	$this->form_validation->set_rules('terima_fisik_kartu_kip', 'terima fisik kartu kip', 'trim');
	$this->form_validation->set_rules('nama_ayah', 'nama ayah', 'trim');
	$this->form_validation->set_rules('nik_ayah', 'nik ayah', 'trim');
	$this->form_validation->set_rules('tahun_lahir_ayah', 'tahun lahir ayah', 'trim');
	$this->form_validation->set_rules('pendidikan_ayah', 'pendidikan ayah', 'trim');
	$this->form_validation->set_rules('pekerjaan_ayah', 'pekerjaan ayah', 'trim');
	$this->form_validation->set_rules('penghasilan_bulanan_ayah', 'penghasilan bulanan ayah', 'trim');
	$this->form_validation->set_rules('berkebutuhan_khusus_ayah', 'berkebutuhan khusus ayah', 'trim');
	$this->form_validation->set_rules('nama_ibu', 'nama ibu', 'trim');
	$this->form_validation->set_rules('nik_ibu', 'nik ibu', 'trim');
	$this->form_validation->set_rules('tahun_lahir_ibu', 'tahun lahir ibu', 'trim');
	$this->form_validation->set_rules('pendidikan_ibu', 'pendidikan ibu', 'trim');
	$this->form_validation->set_rules('pekerjaan_ibu', 'pekerjaan ibu', 'trim');
	$this->form_validation->set_rules('penghasilan_bulanan_ibu', 'penghasilan bulanan ibu', 'trim');
	$this->form_validation->set_rules('berkebutuhan_khusus_ibu', 'berkebutuhan khusus ibu', 'trim');
	$this->form_validation->set_rules('nama_wali', 'nama wali', 'trim');
	$this->form_validation->set_rules('nik_wali', 'nik wali', 'trim');
	$this->form_validation->set_rules('tahun_lahir_wali', 'tahun lahir wali', 'trim');
	$this->form_validation->set_rules('pendidikan_wali', 'pendidikan wali', 'trim');
	$this->form_validation->set_rules('pekerjaan_wali', 'pekerjaan wali', 'trim');
	$this->form_validation->set_rules('penghasilan_bulanan_wali', 'penghasilan bulanan wali', 'trim');
	$this->form_validation->set_rules('no_telepon_rumah', 'no telepon rumah', 'trim');
	$this->form_validation->set_rules('nomor_hp', 'nomor hp', 'trim');
	$this->form_validation->set_rules('email', 'email', 'trim');
	$this->form_validation->set_rules('jenis_ekstrakurikuler', 'jenis ekstrakurikuler', 'trim');
	$this->form_validation->set_rules('tinggi_badan', 'tinggi badan', 'trim');
	$this->form_validation->set_rules('berat_badan', 'berat badan', 'trim');
	$this->form_validation->set_rules('jarak_ke_sekolah', 'jarak ke sekolah', 'trim');
	$this->form_validation->set_rules('jumlah_saudara_kandung', 'jumlah saudara kandung', 'trim');
	$this->form_validation->set_rules('jurusan', 'jurusan', 'trim');
	$this->form_validation->set_rules('asal_sekolah', 'asal sekolah', 'trim');
	$this->form_validation->set_rules('no_peserta_ujian', 'no peserta ujian', 'trim');
	$this->form_validation->set_rules('no_seri_ijazah', 'no seri ijazah', 'trim');
	$this->form_validation->set_rules('no_seri_skhu', 'no seri skhu', 'trim');
	$this->form_validation->set_rules('nilai_usbn', 'nilai usbn', 'trim');
	$this->form_validation->set_rules('nilai_rapor', 'nilai rapor', 'trim');
	$this->form_validation->set_rules('nilai_unbk_unkp', 'nilai unbk/unkp', 'trim');
	$this->form_validation->set_rules('ketentuan', 'ketentuan', 'trim');
	$this->form_validation->set_rules('foto', 'foto', 'trim');
	$this->form_validation->set_rules('akte_kelahiran', 'akte_kelahiran', 'trim');
	$this->form_validation->set_rules('kartu_keluarga', 'kartu_keluarga', 'trim');
	$this->form_validation->set_rules('skl_skhu', 'skl_skhu', 'trim');
	$this->form_validation->set_rules('skd', 'skd', 'trim');	
	$this->form_validation->set_rules('berkaslain', 'berkaslain', 'trim');
	$this->form_validation->set_rules('tipe', 'tipe', 'trim');
	$this->form_validation->set_rules('kode_daring', 'kode daring', 'trim');
	$this->form_validation->set_rules('kode_luring', 'kode luring', 'trim');
	$this->form_validation->set_rules('kode_formulir', 'kode formulir', 'trim');
	$this->form_validation->set_rules('foto_full', 'foto_full', 'trim');
	$this->form_validation->set_rules('rapor', 'rapor', 'trim');	
	$this->form_validation->set_rules('sktm', 'sktm', 'trim');
	$this->form_validation->set_rules('ktp_ortu', 'ktp_ortu', 'trim');
	$this->form_validation->set_rules('kartu_bantuan', 'kartu_bantuan', 'trim');
	$this->form_validation->set_rules('sptjm', 'sptjm', 'trim');
	$this->form_validation->set_rules('sp', 'sp', 'trim');	

	$this->form_validation->set_rules('id_formulir', 'id_formulir', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

  	public function cetak(){
        // $id_peserta = $id;
        // $data['berkas']=$this->Berkas_model->get_foto($id_peserta); 
        // $data['prestasipeserta']=$this->Prestasipeserta_model->get_all_prestasi($id_peserta);
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1(); 
        $data['pengumuman'] = $this->Pengumuman_model->get_by_formulir(); 
        $data['tp'] =  $this->Tahunpelajaran_model->get_tahun_aktif();
        $data['jalur'] =  $this->Jalur_model->get_all();

        $data['formulir'] =  $this->Formulir_model->get_by_id_1();
        helper_log("print", "Cetak Formulir Kosong ");

		$mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
		$html = $this->load->view('formulir/Print_formulir', $data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('formulir.pdf','I');        

    }

}

/* End of file Formulir.php */