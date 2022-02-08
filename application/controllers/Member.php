<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Users_model');
        $this->load->model('Pengaturan_model');
        $this->load->model('Pengumuman_model');        
        $this->load->model('Peserta_model');
        $this->load->model('Prestasipeserta_model');
        $this->load->model('Prestasi_model');
        $this->load->model('Sekolah_model');
        $this->load->model('Jalur_model');
        $this->load->model('Jarak_model');
        $this->load->model('Jurusan_model');
        $this->load->model('Tahunpelajaran_model');
        $this->load->model('Formulir_model');    
        $this->load->model('Berkas_model');    
        $this->load->library('form_validation');
	    $this->load->library('datatables');		
    } 

    public function formcreate()
    {
        $data = array(
            'action' => site_url('member/create_form'),
		    'id_peserta' => set_value('id_peserta'),
		    'tanggal_daftar' => set_value('tanggal_daftar'),
		    'id_tahun' => set_value('id_tahun'),
		    'id_jalur' => set_value('id_jalur'),
		    'nama_peserta' => set_value('nama_peserta'),
		    'jenis_kelamin' => set_value('jenis_kelamin'),
		    'nisn' => set_value('nisn'),
		    'nik' => set_value('nik'),
		    'tempat_lahir' => set_value('tempat_lahir'),
		    'tanggal_lahir' => set_value('tanggal_lahir'),
		    'no_registrasi_akta_lahir' => set_value('no_registrasi_akta_lahir'),
		    'agama' => set_value('agama'),
		    'kewarganegaraan' => set_value('kewarganegaraan'),
		    'berkebutuhan_khusus' => set_value('berkebutuhan_khusus'),
		    'alamat' => set_value('alamat'),
		    'rt' => set_value('rt'),
		    'rw' => set_value('rw'),
		    'nama_dusun' => set_value('nama_dusun'),
		    'nama_kelurahan' => set_value('nama_kelurahan'),
		    'kecamatan' => set_value('kecamatan'),
		    'kode_pos' => set_value('kode_pos'),
		    'latitude' => set_value('latitude'),
		    'longitude' => set_value('longitude'),
		    'tempat_tinggal' => set_value('tempat_tinggal'),
		    'moda_transportasi' => set_value('moda_transportasi'),
		    'no_kks' => set_value('no_kks'),
		    'anak_ke' => set_value('anak_ke'),
		    'penerima_kps_pkh' => set_value('penerima_kps_pkh'),
		    'no_kps_pkh' => set_value('no_kps_pkh'),
		    'penerima_kip' => set_value('penerima_kip'),
		    'no_kip' => set_value('no_kip'),
		    'nama_tertera_di_kip' => set_value('nama_tertera_di_kip'),
		    'terima_fisik_kartu_kip' => set_value('terima_fisik_kartu_kip'),
		    'nama_ayah' => set_value('nama_ayah'),
		    'nik_ayah' => set_value('nik_ayah'),
		    'tahun_lahir_ayah' => set_value('tahun_lahir_ayah'),
		    'pendidikan_ayah' => set_value('pendidikan_ayah'),
		    'pekerjaan_ayah' => set_value('pekerjaan_ayah'),
		    'penghasilan_bulanan_ayah' => set_value('penghasilan_bulanan_ayah'),
		    'berkebutuhan_khusus_ayah' => set_value('berkebutuhan_khusus_ayah'),
		    'nama_ibu' => set_value('nama_ibu'),
		    'nik_ibu' => set_value('nik_ibu'),
		    'tahun_lahir_ibu' => set_value('tahun_lahir_ibu'),
		    'pendidikan_ibu' => set_value('pendidikan_ibu'),
		    'pekerjaan_ibu' => set_value('pekerjaan_ibu'),
		    'penghasilan_bulanan_ibu' => set_value('penghasilan_bulanan_ibu'),
		    'berkebutuhan_khusus_ibu' => set_value('berkebutuhan_khusus_ibu'),
		    'nama_wali' => set_value('nama_wali'),
		    'nik_wali' => set_value('nik_wali'),
		    'tahun_lahir_wali' => set_value('tahun_lahir_wali'),
		    'pendidikan_wali' => set_value('pendidikan_wali'),
		    'pekerjaan_wali' => set_value('pekerjaan_wali'),
		    'penghasilan_bulanan_wali' => set_value('penghasilan_bulanan_wali'),
		    'no_telepon_rumah' => set_value('no_telepon_rumah'),
		    'nomor_hp' => set_value('nomor_hp'),
		    'email' => set_value('email'),
		    'jenis_ekstrakurikuler' => set_value('jenis_ekstrakurikuler'),
		    'tinggi_badan' => set_value('tinggi_badan'),
		    'berat_badan' => set_value('berat_badan'),
		    'id_jarak' => set_value('id_jarak'),
		    'jumlah_saudara_kandung' => set_value('jumlah_saudara_kandung'),
		    'id_jurusan' => set_value('id_jurusan'),
		    'pilihan_dua' => set_value('pilihan_dua'),
		    'id_sekolah' => set_value('id_sekolah'),
		    'no_un' => set_value('no_un'),
		    'no_seri_ijazah' => set_value('no_seri_ijazah'),
		    'no_seri_skhu' => set_value('no_seri_skhu'),
		    'nilai_rapor' => set_value('nilai_rapor'),
		    'nilai_usbn' => set_value('nilai_usbn'),
			'nilai_unbk_unkp' => set_value('nilai_unbk_unkp'),
		    'status' => set_value('status'),
		    'status_hasil' => set_value('status_hasil'),
		    'status_daftar_ulang' => set_value('status_daftar_ulang'),
		    'id_users' => set_value('id_users'),
		    'pilihan_sekolah_lain' => set_value('pilihan_sekolah_lain'),
		);

        $data['title'] = 'Formulir Peserta';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'peserta/codejs';
        $data['sekolah'] =$this->Sekolah_model->get_all();
        $data['jalur'] =$this->Jalur_model->get_all();
        $data['jarak'] =$this->Jarak_model->get_all();
        $data['jurusan'] =$this->Jurusan_model->get_all();
        $data['tahunpelajaran'] =$this->Tahunpelajaran_model->get_tahun_aktif();
        $data['formulir'] =  $this->Formulir_model->get_by_id_1();
        $data['panitia'] = $this->Users_model->get_panitia();
        $data['user'] = $this->ion_auth->user()->row();  
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1(); 
	    $data['nomer'] = $this->Peserta_model->nodaftar();            

        if ($data['formulir']->tipe=="1") {
        	$data['page'] = 'peserta/Form_peserta_wizard';
        } else if ($data['formulir']->tipe=="2") {
        	$data['page'] = 'peserta/Form_peserta';
        } else if ($data['formulir']->tipe=="3") {
        	$data['page'] = 'peserta/Form_peserta_general';
        }		
        $this->load->view('template/backend', $data);
    }

    public function create_form()
    {
        // no pendaftaran
		$data['formulir'] =  $this->Formulir_model->get_by_id_1();
		if ($data['formulir']->kode_formulir=="Ya") {  
			$data['no_pendaftaran'] = $this->Peserta_model->no_pendaftaran_daring(); 
			$data['nodaftar'] = $data['formulir']->kode_daring."-".$data['no_pendaftaran']."-D";  		
	    	$no_pendaftaran=$data['nodaftar'];
	    } else {
			$data['no_pendaftaran'] = $this->Peserta_model->no_pendaftaran(); 
			$data['nodaftar'] = $data['formulir']->kode_daring."-".$data['no_pendaftaran'];  		
	    	$no_pendaftaran=$data['nodaftar'];	    	
	    }
    	
    	$nama_peserta=$this->input->post('nama_peserta',TRUE);
        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/uploads/image/grcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
 
        $qrcode=$no_pendaftaran.'.png'; //buat name dari qr code sesuai dengan no pendaftaran
 
        $params['data'] = $no_pendaftaran.'-'.$nama_peserta; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/uploads/image/grcode/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', 
                form_error('no_pendaftaran').
                form_error('nisn')
            );
            redirect(site_url('formcreate'));                 
        } else {
            $data = array(
				'no_pendaftaran' => $no_pendaftaran,
        		'tanggal_daftar' => date('Y-m-d'),
				'id_tahun' => $this->input->post('id_tahun',TRUE),
				'id_jalur' => $this->input->post('id_jalur',TRUE),
				'nama_peserta' => $this->input->post('nama_peserta',TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
				'nisn' => $this->input->post('nisn',TRUE),
				'nik' => $this->input->post('nik',TRUE),
				'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
        		'tanggal_lahir' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir',TRUE))),
				'no_registrasi_akta_lahir' => $this->input->post('no_registrasi_akta_lahir',TRUE),
				'agama' => $this->input->post('agama',TRUE),
				'kewarganegaraan' => $this->input->post('kewarganegaraan',TRUE),
				'berkebutuhan_khusus' => $this->input->post('berkebutuhan_khusus',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
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
				'nama_ayah' => $this->input->post('nama_ayah',TRUE),
				'nik_ayah' => $this->input->post('nik_ayah',TRUE),
				'tahun_lahir_ayah' => $this->input->post('tahun_lahir_ayah',TRUE),
				'pendidikan_ayah' => $this->input->post('pendidikan_ayah',TRUE),
				'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah',TRUE),
				'penghasilan_bulanan_ayah' => $this->input->post('penghasilan_bulanan_ayah',TRUE),
				'berkebutuhan_khusus_ayah' => $this->input->post('berkebutuhan_khusus_ayah',TRUE),
				'nama_ibu' => $this->input->post('nama_ibu',TRUE),
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
				'nomor_hp' => $this->input->post('nomor_hp',TRUE),
				'email' => $this->input->post('email',TRUE),
				'jenis_ekstrakurikuler' => $this->input->post('jenis_ekstrakurikuler',TRUE),
				'tinggi_badan' => $this->input->post('tinggi_badan',TRUE),
				'berat_badan' => $this->input->post('berat_badan',TRUE),
				'id_jarak' => $this->input->post('id_jarak',TRUE),
				'jumlah_saudara_kandung' => $this->input->post('jumlah_saudara_kandung',TRUE),
				'id_jurusan' => $this->input->post('id_jurusan',TRUE),
				'pilihan_dua' => $this->input->post('pilihan_dua',TRUE),
				'id_sekolah' => $this->input->post('id_sekolah',TRUE),
				'no_un' => $this->input->post('no_un',TRUE),
				'no_seri_ijazah' => $this->input->post('no_seri_ijazah',TRUE),
				'no_seri_skhu' => $this->input->post('no_seri_skhu',TRUE),
				'nilai_rapor' => $this->input->post('nilai_rapor',TRUE),
				'nilai_usbn' => $this->input->post('nilai_usbn',TRUE),
				'nilai_unbk_unkp' => $this->input->post('nilai_unbk_unkp',TRUE),
				'status' => $this->input->post('status',TRUE),
				'status_hasil' => $this->input->post('status_hasil',TRUE),
				'status_daftar_ulang' => $this->input->post('status_daftar_ulang',TRUE),
				'id_users' => $this->input->post('id_users',TRUE),
				'qrcode' => $qrcode,
				'pilihan_sekolah_lain' => $this->input->post('pilihan_sekolah_lain',TRUE),
		    );

			$cekno = $this->Peserta_model->get_cek($no_pendaftaran);

			if ($cekno) {
	            $this->session->set_flashdata('message', 'Terjadi kesalahan sistem, silahkan ulangi');           
	            redirect(site_url('member/formcreate'));
			} else {
	            $this->Peserta_model->insert($data);
	            $this->session->set_flashdata('message', 'Formulir Berhasil dikirim');
            	helper_log("add", "Mengisi formulir pendaftaran");	            
	            redirect(site_url('dashboard'));
	        } 
	    }
	}

    public function _rules()
    {
		$this->form_validation->set_rules('no_pendaftaran', 'no pendaftaran', 'trim|is_unique[peserta.no_pendaftaran]',
        array(
                'is_unique'     => 'Terjadi kesalahan sistem, silahkan ulangi '                
        ));
		$this->form_validation->set_rules('tanggal_daftar', 'tanggal daftar', 'trim');
		$this->form_validation->set_rules('id_tahun', 'tahun', 'trim');
		$this->form_validation->set_rules('id_jalur', 'jalur', 'trim|required');
		$this->form_validation->set_rules('nama_peserta', 'nama peserta', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('nisn', 'nisn', 'trim|required|numeric|exact_length[10]|is_unique[peserta.nisn]',
        array(
                'is_unique'     => 'NISN Peserta sudah terdaftar '                
        ));
		$this->form_validation->set_rules('nik', 'nik', 'trim|numeric|exact_length[16]');
		$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
		$this->form_validation->set_rules('no_registrasi_akta_lahir', 'no registrasi akta lahir', 'trim');
		$this->form_validation->set_rules('agama', 'agama', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'trim');
		$this->form_validation->set_rules('berkebutuhan_khusus', 'berkebutuhan khusus', 'trim');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('rt', 'rt', 'trim|numeric');
		$this->form_validation->set_rules('rw', 'rw', 'trim|numeric');
		$this->form_validation->set_rules('nama_dusun', 'nama dusun', 'trim');
		$this->form_validation->set_rules('nama_kelurahan', 'nama kelurahan', 'trim');
		$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim');
		$this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|numeric');
		$this->form_validation->set_rules('latitude', 'latitude', 'trim');
		$this->form_validation->set_rules('longitude', 'longitude', 'trim');
		$this->form_validation->set_rules('tempat_tinggal', 'tempat tinggal', 'trim');
		$this->form_validation->set_rules('moda_transportasi', 'moda transportasi', 'trim');
		$this->form_validation->set_rules('no_kks', 'no kks', 'trim|exact_length[6]');
		$this->form_validation->set_rules('anak_ke', 'anak ke', 'trim|numeric');
		$this->form_validation->set_rules('penerima_kps_pkh', 'penerima kps pkh', 'trim');
		$this->form_validation->set_rules('no_kps_pkh', 'no kps pkh', 'trim');
		$this->form_validation->set_rules('penerima_kip', 'penerima kip', 'trim');
		$this->form_validation->set_rules('no_kip', 'no kip', 'trim|exact_length[6]');
		$this->form_validation->set_rules('nama_tertera_di_kip', 'nama tertera di kip', 'trim');
		$this->form_validation->set_rules('terima_fisik_kartu_kip', 'terima fisik kartu kip', 'trim');
		$this->form_validation->set_rules('nama_ayah', 'nama ayah', 'trim|required');
		$this->form_validation->set_rules('nik_ayah', 'nik ayah', 'trim|numeric|exact_length[16]');
		$this->form_validation->set_rules('tahun_lahir_ayah', 'tahun lahir ayah', 'trim|numeric|exact_length[4]');
		$this->form_validation->set_rules('pendidikan_ayah', 'pendidikan ayah', 'trim');
		$this->form_validation->set_rules('pekerjaan_ayah', 'pekerjaan ayah', 'trim');
		$this->form_validation->set_rules('penghasilan_bulanan_ayah', 'penghasilan bulanan ayah', 'trim');
		$this->form_validation->set_rules('berkebutuhan_khusus_ayah', 'berkebutuhan khusus ayah', 'trim');
		$this->form_validation->set_rules('nama_ibu', 'nama ibu', 'trim|required');
		$this->form_validation->set_rules('nik_ibu', 'nik ibu', 'trim|numeric|exact_length[16]');
		$this->form_validation->set_rules('tahun_lahir_ibu', 'tahun lahir ibu', 'trim|numeric|exact_length[4]');
		$this->form_validation->set_rules('pendidikan_ibu', 'pendidikan ibu', 'trim');
		$this->form_validation->set_rules('pekerjaan_ibu', 'pekerjaan ibu', 'trim');
		$this->form_validation->set_rules('penghasilan_bulanan_ibu', 'penghasilan bulanan ibu', 'trim');
		$this->form_validation->set_rules('berkebutuhan_khusus_ibu', 'berkebutuhan khusus ibu', 'trim');
		$this->form_validation->set_rules('nama_wali', 'nama wali', 'trim');
		$this->form_validation->set_rules('nik_wali', 'nik wali', 'trim|numeric|exact_length[16]');
		$this->form_validation->set_rules('tahun_lahir_wali', 'tahun lahir wali', 'trim|numeric|exact_length[4]');
		$this->form_validation->set_rules('pendidikan_wali', 'pendidikan wali', 'trim');
		$this->form_validation->set_rules('pekerjaan_wali', 'pekerjaan wali', 'trim');
		$this->form_validation->set_rules('penghasilan_bulanan_wali', 'penghasilan bulanan wali', 'trim');
		$this->form_validation->set_rules('no_telepon_rumah', 'no telepon rumah', 'trim|numeric');
		$this->form_validation->set_rules('nomor_hp', 'nomor hp', 'trim|numeric');
		$this->form_validation->set_rules('email', 'email', 'trim|valid_email');
		$this->form_validation->set_rules('jenis_ekstrakurikuler', 'jenis ekstrakurikuler', 'trim');
		$this->form_validation->set_rules('tinggi_badan', 'tinggi badan', 'trim|numeric');
		$this->form_validation->set_rules('berat_badan', 'berat badan', 'trim|numeric');
		$this->form_validation->set_rules('id_jarak', 'jarak', 'trim|required');
		$this->form_validation->set_rules('jumlah_saudara_kandung', 'jumlah saudara kandung', 'trim|numeric');
		$this->form_validation->set_rules('id_jurusan', 'jurusan pilihan satu', 'trim');
		$this->form_validation->set_rules('pilihan_dua', 'jurusan pilihan dua', 'trim');
		$this->form_validation->set_rules('id_sekolah', 'sekolah', 'trim|required');
		$this->form_validation->set_rules('no_un', 'no peserta un', 'trim');
		$this->form_validation->set_rules('no_seri_ijazah', 'no seri ijazah', 'trim');
		$this->form_validation->set_rules('no_seri_skhu', 'no seri skhu', 'trim');
		$this->form_validation->set_rules('nilai_rapor', 'nilai rapor', 'trim|numeric');
		$this->form_validation->set_rules('nilai_usbn', 'nilai usbn', 'trim|numeric');
		$this->form_validation->set_rules('nilai_unbk_unkp', 'nilai un', 'trim|numeric');
		$this->form_validation->set_rules('status', 'status', 'trim');
		$this->form_validation->set_rules('status_hasil', 'status hasil', 'trim');
		$this->form_validation->set_rules('status_daftar_ulang', 'status daftar ulang', 'trim');
		$this->form_validation->set_rules('id_users', 'id users', 'trim');
		$this->form_validation->set_rules('pilihan_sekolah_lain', 'pilihan sekolah lain', 'trim');

		$this->form_validation->set_rules('id_peserta', 'id_peserta', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

  	public function printformulir(){
  		$id = $this->input->post('id_peserta');
  		
        $data = array(
            'peserta' => $this->Peserta_model->get_by_id($id),
            'start' => 0
        );

        $id_peserta=$id;
        $data['berkas']=$this->Berkas_model->get_foto($id_peserta);         
        $data['prestasipeserta']=$this->Prestasipeserta_model->get_all_prestasi($id_peserta);
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();   
        $data['pengumuman'] = $this->Pengumuman_model->get_by_formulir();                

        $data['formulir'] =  $this->Formulir_model->get_by_id_1();
        helper_log("print", "Cetak bukti pendaftaran");
        
		$mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
		$html = $this->load->view('peserta/Print_formulir', $data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('formulir.pdf','I');    

    } 

  	public function printSKL()
  	{
		$id = $this->input->post('id_peserta');
		  		
  		$data = array(
            'peserta' => $this->Peserta_model->get_by_id($id),
            'start' => 0
        );    

        $id_peserta = $id;              
        $data['prestasipeserta']=$this->Prestasipeserta_model->get_all_prestasi($id_peserta);
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1(); 
        $data['pengumuman'] = $this->Pengumuman_model->get_by_skl(); 

        $data['formulir'] =  $this->Formulir_model->get_by_id_1();
        helper_log("print", "Cetak bukti SKL ".$data['peserta']->nama_peserta);

		$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
		$html = $this->load->view('peserta/Print_SKL', $data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('SKL.pdf','I');        

    }          

    public function _rulespres()
    {
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
	$this->form_validation->set_rules('nama_prestasi', 'nama prestasi', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required|numeric|exact_length[4]');
	$this->form_validation->set_rules('penyelenggara', 'penyelenggara', 'trim|required');
	$this->form_validation->set_rules('id_peserta', 'nama peserta', 'trim|required');
	$this->form_validation->set_rules('id_prestasi', 'detail prestasi', 'trim|required');

	$this->form_validation->set_rules('id_prestasipeserta', 'id_prestasipeserta', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }      

// 	start multi add prestasi ---------------------------------------
    public function multiprestasi()
    {
    	$data['title'] = 'Prestasi Peserta';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

    	$banyak_data = $this->input->post('banyak_data',TRUE);
    	$data['nomer'] = $this->Peserta_model->nodaftar();  
        if ($data['nomer'] == FALSE) {
            $this->formcreate();
        } else if ($banyak_data==NULL) {
            redirect(site_url('dashboard'));
        } else {
	        $data['code_js'] = 'prestasipeserta/codejs';
	        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();         
	        $data['peserta'] =$this->Peserta_model->get_all();  
	        $data['prestasi'] =$this->Prestasi_model->get_all();
	        $data['nomer'] = $this->Peserta_model->nodaftar();       
	                  
            $data['banyak_data'] = $this->input->post('banyak_data',TRUE);
            $data['page'] = 'prestasipeserta/Multi_prestasipeserta';
	        $this->load->view('template/backend', $data);  
        }
    }

    public function add_multiprestasi() 
    { 	
		$j = $this->input->post('jenis',TRUE);
		$result = array();
		foreach ($j AS $key => $val)
		{
			$result[] = array(
				"jenis" => $_POST['jenis'][$key],
				"nama_prestasi" => $_POST['nama_prestasi'][$key],
				"tahun" => $_POST['tahun'][$key],
				"penyelenggara" => $_POST['penyelenggara'][$key],
				"id_prestasi" => $_POST['id_prestasi'][$key],
				"id_peserta" => $_POST['id_peserta'][$key]	
			);
		}            
		    
		$this->db->insert_batch('prestasipeserta', $result); 
	    $this->session->set_flashdata('message', 'Data Prestasi Peserta berhasil ditambahkan');
	    helper_log("add", "Menambah data prestasi");	                    
	    redirect(site_url('member/prestasipeserta'));
    }    
// 	end multi add prestasi ---------------------------------------

// upload berkas pendukung
	public function uploadberkas()
	{
		$config['upload_path']          = './assets/uploads/attachment/';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$config['max_size']             = 500;
		// $config['max_width']            = 2048;
		// $config['max_height']           = 1000;
		$config['encrypt_name'] 		= true;
		$this->load->library('upload',$config);
		$id_peserta = $this->input->post('id_peserta');
		$keterangan_berkas = $this->input->post('keterangan_berkas');
		$jumlah_berkas = count($_FILES['berkas']['name']);
		for($i = 0; $i < $jumlah_berkas;$i++)
		{
            if(!empty($_FILES['berkas']['name'][$i]) || !empty($_POST['keterangan_berkas']['name'][$i]))
            {
				$_FILES['file']['name'] = $_FILES['berkas']['name'][$i];
				$_FILES['file']['type'] = $_FILES['berkas']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['berkas']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['berkas']['error'][$i];
				$_FILES['file']['size'] = $_FILES['berkas']['size'][$i];
	   
				if($this->upload->do_upload('file')){
					
					$uploadData = $this->upload->data();
					$data['nama_berkas'] = $uploadData['file_name'];
					$data['keterangan_berkas'] = $keterangan_berkas[$i];
					$data['tipe_berkas'] = $uploadData['file_ext'];
					$data['ukuran_berkas'] = $uploadData['file_size'];
					$data['id_peserta'] = $id_peserta[$i];
					$this->db->insert('berkas',$data);
					$this->session->set_flashdata('message', 'Berkas berhasil terupload'); 
					helper_log("add", "Upload berkas ".$data['keterangan_berkas']);  						
				}
			} 
		}
		redirect(site_url('member/berkas'));	
	}

// list prestasipeserta
    public function prestasipeserta()
    {
    	$data['nomer'] = $this->Peserta_model->nodaftar();  
        if ($data['nomer'] == FALSE) {
            $this->formcreate();
        } else {    	
	        $data['title'] = 'Prestasi Peserta';
	        $data['subtitle'] = '';
	        $data['crumb'] = [
	            'Dashboard' => '',
	        ];    

		    $peserta = $this->Peserta_model->nodaftar(); 
		    $id=$peserta->id_peserta;
		    $data['prestasipeserta'] = $this->Prestasipeserta_model->get_id($id);                

	        $data['page'] = 'prestasipeserta/Member_prestasipeserta';
	        $this->load->view('template/backend', $data);
	    }    
    }

// delete prestasipeserta
    public function del_prestasipeserta($id)
    {
		$status_hasil = $this->Peserta_model->nodaftar();    
		$status = $status_hasil->status;
		if ($status=='Sudah diverifikasi') {
            $this->session->set_flashdata('message', 'Prestasi sudah diverifikasi tidak dapat dihapus');
            redirect(site_url('member/prestasipeserta'));
		} else {
	        $row = $this->Prestasipeserta_model->get_by_id($id);
	        if ($row) {
	            $this->Prestasipeserta_model->delete($id);
	            $this->session->set_flashdata('message', 'Prestasi Peserta Berhasil dihapus');
	            helper_log("delete", "Menghapus Jenis Prestasi ".$row->jenis);  
	            redirect(site_url('member/prestasipeserta'));
	        } else {
	            $this->session->set_flashdata('message', 'Prestasi Peserta tidak ditemukan');
	            redirect(site_url('dashboard'));
	        }
	    }    			        
    }     		

// list berkas
    public function berkas()
    {
    	$data['nomer'] = $this->Peserta_model->nodaftar();  
        if ($data['nomer'] == FALSE) {
            $this->formcreate();
        } else {    	
	        $data['title'] = 'Berkas Pendukung';
	        $data['subtitle'] = '';
	        $data['crumb'] = [
	            'Dashboard' => '',
	        ];    

		    $peserta = $this->Peserta_model->nodaftar(); 
		    $id=$peserta->id_peserta;
		    $data['berkas'] = $this->Berkas_model->get_id($id);    
	        $data['formulir'] =  $this->Formulir_model->get_by_id_1();  
	        $data['nomer'] = $this->Peserta_model->nodaftar();  		                

	        $data['page'] = 'berkas/Berkas_member';
	        $this->load->view('template/backend', $data);
	    }    
    }	 

// delete berkas
    public function del_berkas($id)
    {
		$status_hasil = $this->Peserta_model->nodaftar();    
		$status = $status_hasil->status;
		if ($status=='Sudah diverifikasi') {
            $this->session->set_flashdata('message', 'Berkas sudah diverifikasi tidak dapat dihapus');
            redirect(site_url('member/berkas'));
		} else {
	        $row = $this->Berkas_model->get_by_id($id);
	        if ($row) {
	            $this->Berkas_model->delete($id);
	            $this->session->set_flashdata('message', 'Berkas Berhasil dihapus');
	            helper_log("delete", "Menghapus berkas ".$row->keterangan_berkas);  
	            redirect(site_url('member/berkas'));
	        } else {
	            $this->session->set_flashdata('message', 'Berkas tidak ditemukan');
	            redirect(site_url('dashboard'));
	        }			
		}        
    }  

    public function tambah_sekolah()
    {
        $this->_rules_sekolah();

        if ($this->form_validation->run() == FALSE) {
            // $this->create();
            $this->session->set_flashdata('message', 
                form_error('npsn_sekolah').
                form_error('asal_sekolah').
                form_error('status_sekolah').
                form_error('kecamatan')
            );
            redirect(site_url('member/formcreate'));            
        } else {
        $data = array(
    		'npsn_sekolah' => $this->input->post('npsn_sekolah',TRUE),
    		'asal_sekolah' => $this->input->post('asal_sekolah',TRUE),
    		'alamat_sekolah' => $this->input->post('alamat_sekolah',TRUE),
    		'kelurahan' => $this->input->post('kelurahan',TRUE),
    		'status_sekolah' => $this->input->post('status_sekolah',TRUE),
    		'kecamatan' => $this->input->post('kecamatan',TRUE),
	    );
        
        $this->Sekolah_model->insert($data);
        $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
        helper_log("add", "Menambah data sekolah ".$data['asal_sekolah']);        
        redirect(site_url('member/formcreate'));
        }
    } 

    public function _rules_sekolah()
    {
    	$this->form_validation->set_rules('npsn_sekolah', 'npsn sekolah', 'trim|required|numeric|exact_length[8]|is_unique[sekolah.npsn_sekolah]',
        array(
                'required'      => 'NPSN Sekolah tidak boleh kosong ',
                'numeric'       => 'NPSN Sekolah hanya angka ',
                'is_unique'     => 'Sekolah sudah terdaftar '
        ));
    	$this->form_validation->set_rules('id_sekolah', 'id_sekolah', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text">', '</span>');
    }         

}    
/* End of file Member.php */