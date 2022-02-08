<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Pengaturan_model');
        $this->load->model('Pengumuman_model');
        $this->load->model('Peserta_model');
        $this->load->model('Prestasipeserta_model');
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

    public function index()
    {
	    $data['title'] = 'Peserta';
	    $data['subtitle'] = '';
	    $data['crumb'] = [
	    	'Peserta' => '',
	    	];  	

	    $data['code_js'] = 'peserta/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();     	    
	    $data['page'] = 'peserta/Peserta_list';
	    $this->load->view('template/backend', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Peserta_model->json();
    }

    public function read($id)
    {  	
	    $row = $this->Peserta_model->get_by_id($id);
	    if ($row) {
	        $data = array(
				'id_peserta' => $row->id_peserta,
				'no_pendaftaran' => $row->no_pendaftaran,
				'tanggal_daftar' => $row->tanggal_daftar,
				'tahun_pelajaran' => $row->tahun_pelajaran,
				'jalur' => $row->jalur,
				'nama_peserta' => $row->nama_peserta,
				'jenis_kelamin' => $row->jenis_kelamin,
				'nisn' => $row->nisn,
				'nik' => $row->nik,
				'tempat_lahir' => $row->tempat_lahir,
				'tanggal_lahir' => $row->tanggal_lahir,
				'no_registrasi_akta_lahir' => $row->no_registrasi_akta_lahir,
				'agama' => $row->agama,
				'kewarganegaraan' => $row->kewarganegaraan,
				'berkebutuhan_khusus' => $row->berkebutuhan_khusus,
				'alamat' => $row->alamat,
				'rt' => $row->rt,
				'rw' => $row->rw,
				'nama_dusun' => $row->nama_dusun,
				'nama_kelurahan' => $row->nama_kelurahan,
				'kecamatan' => $row->kecamatan,
				'kode_pos' => $row->kode_pos,
				'latitude' => $row->latitude,
				'longitude' => $row->longitude,
				'tempat_tinggal' => $row->tempat_tinggal,
				'moda_transportasi' => $row->moda_transportasi,
				'no_kks' => $row->no_kks,
				'anak_ke' => $row->anak_ke,
				'penerima_kps_pkh' => $row->penerima_kps_pkh,
				'no_kps_pkh' => $row->no_kps_pkh,
				'penerima_kip' => $row->penerima_kip,
				'no_kip' => $row->no_kip,
				'nama_tertera_di_kip' => $row->nama_tertera_di_kip,
				'terima_fisik_kartu_kip' => $row->terima_fisik_kartu_kip,
				'nama_ayah' => $row->nama_ayah,
				'nik_ayah' => $row->nik_ayah,
				'tahun_lahir_ayah' => $row->tahun_lahir_ayah,
				'pendidikan_ayah' => $row->pendidikan_ayah,
				'pekerjaan_ayah' => $row->pekerjaan_ayah,
				'penghasilan_bulanan_ayah' => $row->penghasilan_bulanan_ayah,
				'berkebutuhan_khusus_ayah' => $row->berkebutuhan_khusus_ayah,
				'nama_ibu' => $row->nama_ibu,
				'nik_ibu' => $row->nik_ibu,
				'tahun_lahir_ibu' => $row->tahun_lahir_ibu,
				'pendidikan_ibu' => $row->pendidikan_ibu,
				'pekerjaan_ibu' => $row->pekerjaan_ibu,
				'penghasilan_bulanan_ibu' => $row->penghasilan_bulanan_ibu,
				'berkebutuhan_khusus_ibu' => $row->berkebutuhan_khusus_ibu,
				'nama_wali' => $row->nama_wali,
				'nik_wali' => $row->nik_wali,
				'tahun_lahir_wali' => $row->tahun_lahir_wali,
				'pendidikan_wali' => $row->pendidikan_wali,
				'pekerjaan_wali' => $row->pekerjaan_wali,
				'penghasilan_bulanan_wali' => $row->penghasilan_bulanan_wali,
				'no_telepon_rumah' => $row->no_telepon_rumah,
				'nomor_hp' => $row->nomor_hp,
				'email' => $row->email,
				'jenis_ekstrakurikuler' => $row->jenis_ekstrakurikuler,
				'tinggi_badan' => $row->tinggi_badan,
				'berat_badan' => $row->berat_badan,
				'jarak' => $row->jarak,				
				'jumlah_saudara_kandung' => $row->jumlah_saudara_kandung,
				'nama_jurusan' => $row->nama_jurusan,
				'pilihan_dua' => $row->pilihan_dua,
				'asal_sekolah' => $row->asal_sekolah,
				'no_un' => $row->no_un,
				'no_seri_ijazah' => $row->no_seri_ijazah,
				'no_seri_skhu' => $row->no_seri_skhu,
				'nilai_rapor' => $row->nilai_rapor,
				'nilai_usbn' => $row->nilai_usbn,
				'nilai_unbk_unkp' => $row->nilai_unbk_unkp,
				// 'skor_jarak' => $row->skor_jarak,				
				'status' => $row->status,
				'status_hasil' => $row->status_hasil,
				'status_daftar_ulang' => $row->status_daftar_ulang,
				'id_users' => $row->id_users,
				'pilihan_sekolah_lain' => $row->pilihan_sekolah_lain,
				'catatan' => $row->catatan,
			);

	    $data['title'] = 'Peserta';
	    $data['subtitle'] = '';
	    $data['crumb'] = [
	    	 'Dashboard' => '',
	        ];
	        
	    $id=$row->id_peserta;    
        $data['berkas_limit']=$this->Berkas_model->get_berkas($id); 
        $data['berkas']=$this->Berkas_model->get_id($id);
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();  
	    $data['page'] = 'peserta/Peserta_read';
	    $this->load->view('template/backend', $data);
	    } else {
	        $this->session->set_flashdata('message', 'Data tidak ditemukan');
	        redirect(site_url('peserta'));
	    }
    }

    public function create()
    {
	    $data = array(
	        'button' => 'Tambah',
	        'action' => site_url('peserta/create_action'),
			'id_peserta' => set_value('id_peserta'),
			'no_pendaftaran' => set_value('no_pendaftaran'),
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

	    $data['title'] = 'Peserta';
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
	    $data['user'] = $this->ion_auth->user()->row();
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1(); 

	    $data['page'] = 'peserta/Peserta_form';
	    $this->load->view('template/backend', $data); 
    }

    public function create_action()
    {
        // no pendaftaran
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();
	    $data['formulir'] =  $this->Formulir_model->get_by_id_1(); 
	    if ($data['formulir']->kode_formulir=="Ya") {         
	        if ($data['pengaturan']->penomoran=="otomatis") {        
		        $data['no_pendaftaran'] = $this->Peserta_model->no_pendaftaran_luring();
				$data['nodaftar'] = $data['formulir']->kode_luring."-".$data['no_pendaftaran']."-L";  
		    	$no_pendaftaran = $data['nodaftar'];
		    } else if ($data['pengaturan']->penomoran=="manual") {
		        $data['no_pendaftaran'] = $this->input->post('no_pendaftaran',TRUE);
				$data['nodaftar'] = $data['formulir']->kode_luring."-".$data['no_pendaftaran']."-L";  
		    	$no_pendaftaran = $data['nodaftar'];
		    }
		} else {
	        if ($data['pengaturan']->penomoran=="otomatis") {        
		        $data['no_pendaftaran'] = $this->Peserta_model->no_pendaftaran();
				$data['nodaftar'] = $data['formulir']->kode_luring."-".$data['no_pendaftaran'];  
		    	$no_pendaftaran = $data['nodaftar'];
		    } else if ($data['pengaturan']->penomoran=="manual") {
		        $data['no_pendaftaran'] = $this->input->post('no_pendaftaran',TRUE);
				$data['nodaftar'] = $data['formulir']->kode_luring."-".$data['no_pendaftaran'];  
		    	$no_pendaftaran = $data['nodaftar'];
		    }			
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
            $this->create();
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
	            $this->session->set_flashdata('message', 'No Pendaftaran sudah ada');           
	            $this->create();
			} else {
	            $this->Peserta_model->insert($data);
	            $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
            	helper_log("add", "Menambah data peserta ".$data['nama_peserta']); 	            
	            redirect(site_url('peserta'));
	        } 
	    }
	}

    public function update($id)
    {
	    $row = $this->Peserta_model->get_by_id($id);
	    if ($row) {
	        $data = array(
	            'button' => 'Ubah',
	            'action' => site_url('peserta/update_action'),
				'id_peserta' => set_value('id_peserta', $row->id_peserta),
				// 'no_pendaftaran' => set_value('no_pendaftaran', $row->no_pendaftaran),
				// 'tanggal_daftar' => set_value('tanggal_daftar', $row->tanggal_daftar),
				// 'id_tahun' => set_value('id_tahun', $row->id_tahun),
				'id_jalur' => set_value('id_jalur', $row->id_jalur),
				'nama_peserta' => set_value('nama_peserta', $row->nama_peserta),
				'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
				'nisn' => set_value('nisn', $row->nisn),
				'nik' => set_value('nik', $row->nik),
				'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
				'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
				'no_registrasi_akta_lahir' => set_value('no_registrasi_akta_lahir', $row->no_registrasi_akta_lahir),
				'agama' => set_value('agama', $row->agama),
				'kewarganegaraan' => set_value('kewarganegaraan', $row->kewarganegaraan),
				'berkebutuhan_khusus' => set_value('berkebutuhan_khusus', $row->berkebutuhan_khusus),
				'alamat' => set_value('alamat', $row->alamat),
				'rt' => set_value('rt', $row->rt),
				'rw' => set_value('rw', $row->rw),
				'nama_dusun' => set_value('nama_dusun', $row->nama_dusun),
				'nama_kelurahan' => set_value('nama_kelurahan', $row->nama_kelurahan),
				'kecamatan' => set_value('kecamatan', $row->kecamatan),
				'kode_pos' => set_value('kode_pos', $row->kode_pos),
				'latitude' => set_value('latitude', $row->latitude),
				'longitude' => set_value('longitude', $row->longitude),
				'tempat_tinggal' => set_value('tempat_tinggal', $row->tempat_tinggal),
				'moda_transportasi' => set_value('moda_transportasi', $row->moda_transportasi),
				'no_kks' => set_value('no_kks', $row->no_kks),
				'anak_ke' => set_value('anak_ke', $row->anak_ke),
				'penerima_kps_pkh' => set_value('penerima_kps_pkh', $row->penerima_kps_pkh),
				'no_kps_pkh' => set_value('no_kps_pkh', $row->no_kps_pkh),
				'penerima_kip' => set_value('penerima_kip', $row->penerima_kip),
				'no_kip' => set_value('no_kip', $row->no_kip),
				'nama_tertera_di_kip' => set_value('nama_tertera_di_kip', $row->nama_tertera_di_kip),
				'terima_fisik_kartu_kip' => set_value('terima_fisik_kartu_kip', $row->terima_fisik_kartu_kip),
				'nama_ayah' => set_value('nama_ayah', $row->nama_ayah),
				'nik_ayah' => set_value('nik_ayah', $row->nik_ayah),
				'tahun_lahir_ayah' => set_value('tahun_lahir_ayah', $row->tahun_lahir_ayah),
				'pendidikan_ayah' => set_value('pendidikan_ayah', $row->pendidikan_ayah),
				'pekerjaan_ayah' => set_value('pekerjaan_ayah', $row->pekerjaan_ayah),
				'penghasilan_bulanan_ayah' => set_value('penghasilan_bulanan_ayah', $row->penghasilan_bulanan_ayah),
				'berkebutuhan_khusus_ayah' => set_value('berkebutuhan_khusus_ayah', $row->berkebutuhan_khusus_ayah),
				'nama_ibu' => set_value('nama_ibu', $row->nama_ibu),
				'nik_ibu' => set_value('nik_ibu', $row->nik_ibu),
				'tahun_lahir_ibu' => set_value('tahun_lahir_ibu', $row->tahun_lahir_ibu),
				'pendidikan_ibu' => set_value('pendidikan_ibu', $row->pendidikan_ibu),
				'pekerjaan_ibu' => set_value('pekerjaan_ibu', $row->pekerjaan_ibu),
				'penghasilan_bulanan_ibu' => set_value('penghasilan_bulanan_ibu', $row->penghasilan_bulanan_ibu),
				'berkebutuhan_khusus_ibu' => set_value('berkebutuhan_khusus_ibu', $row->berkebutuhan_khusus_ibu),
				'nama_wali' => set_value('nama_wali', $row->nama_wali),
				'nik_wali' => set_value('nik_wali', $row->nik_wali),
				'tahun_lahir_wali' => set_value('tahun_lahir_wali', $row->tahun_lahir_wali),
				'pendidikan_wali' => set_value('pendidikan_wali', $row->pendidikan_wali),
				'pekerjaan_wali' => set_value('pekerjaan_wali', $row->pekerjaan_wali),
				'penghasilan_bulanan_wali' => set_value('penghasilan_bulanan_wali', $row->penghasilan_bulanan_wali),
				'no_telepon_rumah' => set_value('no_telepon_rumah', $row->no_telepon_rumah),
				'nomor_hp' => set_value('nomor_hp', $row->nomor_hp),
				'email' => set_value('email', $row->email),
				'jenis_ekstrakurikuler' => set_value('jenis_ekstrakurikuler', $row->jenis_ekstrakurikuler),
				'tinggi_badan' => set_value('tinggi_badan', $row->tinggi_badan),
				'berat_badan' => set_value('berat_badan', $row->berat_badan),
				'id_jarak' => set_value('id_jarak', $row->id_jarak),
				'jumlah_saudara_kandung' => set_value('jumlah_saudara_kandung', $row->jumlah_saudara_kandung),
				'id_jurusan' => set_value('id_jurusan', $row->id_jurusan),
				'pilihan_dua' => set_value('pilihan_dua', $row->pilihan_dua),
				'id_sekolah' => set_value('id_sekolah', $row->id_sekolah),
				'no_un' => set_value('no_un', $row->no_un),
				'no_seri_ijazah' => set_value('no_seri_ijazah', $row->no_seri_ijazah),
				'no_seri_skhu' => set_value('no_seri_skhu', $row->no_seri_skhu),
				'nilai_rapor' => set_value('nilai_rapor', $row->nilai_rapor),
				'nilai_usbn' => set_value('nilai_usbn', $row->nilai_usbn),
				'nilai_unbk_unkp' => set_value('nilai_unbk_unkp', $row->nilai_unbk_unkp),
				'status' => set_value('status', $row->status),
				'status_hasil' => set_value('status_hasil', $row->status_hasil),
				'status_daftar_ulang' => set_value('status_daftar_ulang', $row->status_daftar_ulang),
				// 'id_users' => set_value('id_users', $row->id_users),
				'pilihan_sekolah_lain' => set_value('pilihan_sekolah_lain', $row->pilihan_sekolah_lain),
			);
	        
	    $data['title'] = 'Peserta';
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
	    $data['peserta'] = $this->Peserta_model->get_by_id($id);
	    $data['formulir'] =  $this->Formulir_model->get_by_id_1();
	    $data['user'] = $this->ion_auth->user()->row();
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();  	    

	    $data['page'] = 'peserta/Peserta_form';
	    $this->load->view('template/backend', $data);
	    } else {
	        $this->session->set_flashdata('message', 'Data tidak ditemukan');
	        redirect(site_url('peserta'));
	    }  
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_peserta', TRUE));
        } else {
            $data = array(
				// 'no_pendaftaran' => $this->input->post('no_pendaftaran',TRUE),
        		// 'tanggal_daftar' => date('Y-m-d'),
				// 'id_tahun' => $this->input->post('id_tahun',TRUE),
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
				'pilihan_sekolah_lain' => $this->input->post('pilihan_sekolah_lain',TRUE),
			);
            
            $this->Peserta_model->update($this->input->post('id_peserta', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Berhasil diubah');
            helper_log("edit", "Update data peserta ".$data['nama_peserta']);             
            redirect(site_url('peserta'));
        }
    }

    public function status($id)
    {

	    $row = $this->Peserta_model->get_id($id);

	    if ($row) {
	        $data = array(
	        	'button' => 'Ubah Status',
	            'action' => site_url('peserta/status_action'),
				'id_peserta' => set_value('id_peserta', $row->id_peserta),
				'nama_peserta' => set_value('nama_peserta', $row->nama_peserta),
				'status' => set_value('status', $row->status),
				'status_hasil' => set_value('status_hasil', $row->status_hasil),
				'status_daftar_ulang' => set_value('status_daftar_ulang', $row->status_daftar_ulang),
				'catatan' => set_value('catatan', $row->catatan),
				'id_users' => set_value('id_users', $row->id_users),
			);

	    $data['title'] = 'Peserta';
	    $data['subtitle'] = '';
	    $data['crumb'] = [
	        'Dashboard' => '',
	    ];			

	    $data['page'] = 'peserta/Peserta_status';
	    $this->load->view('template/backend', $data);
	    } else {
	        $this->session->set_flashdata('message', 'Data tidak ditemukan');
	        redirect(site_url('peserta'));
	    }  
    }

    public function status_action()
    {
        $data = array(
        	'nama_peserta' => $this->input->post('nama_peserta',TRUE),
			'status' => $this->input->post('status',TRUE),
			'status_hasil' => $this->input->post('status_hasil',TRUE),
			'status_daftar_ulang' => $this->input->post('status_daftar_ulang',TRUE),
			'catatan' => $this->input->post('catatan',TRUE),
		);
            
        $this->Peserta_model->update($this->input->post('id_peserta', TRUE), $data);
        $this->session->set_flashdata('message', 'Data Berhasil diubah');
        helper_log("edit", "Update data status peserta ".$data['nama_peserta']);         
        redirect(site_url('peserta'));
    }    


    public function delete($id)
    {
	    $row = $this->Peserta_model->get_by_id($id);

	    if ($row) {
	        $this->Peserta_model->delete($id);
	        $this->session->set_flashdata('message', 'Data Berhasil dihapus'); 
	    	helper_log("delete", "Menghapus data peserta ".$row->nama_peserta); 	             
	        redirect(site_url('peserta'));
	    } else {
	        $this->session->set_flashdata('message', 'Data tidak ditemukan');
	        redirect(site_url('peserta'));
	    }  
    }

    public function deletebulk(){  	
        $delete = $this->Peserta_model->deletebulk();
	    if($delete){
	        $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus multi data peserta"); 	        
	    }else{
	        $this->session->set_flashdata('message_error', 'Data Gagal dihapus');
	    }
	    echo $delete; 
    }

    public function _rules()
    {
	$this->form_validation->set_rules('no_pendaftaran', 'no pendaftaran', 'trim|exact_length[4]|is_unique[peserta.no_pendaftaran]');
	$this->form_validation->set_rules('tanggal_daftar', 'tanggal daftar', 'trim');
	$this->form_validation->set_rules('id_tahun', 'id tahun', 'trim');
	$this->form_validation->set_rules('id_jalur', 'id jalur', 'trim|required');
	$this->form_validation->set_rules('nama_peserta', 'nama peserta', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('nisn', 'nisn', 'trim|required|numeric|exact_length[10]');
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
	$this->form_validation->set_rules('id_jarak', 'id jarak', 'trim|required');
	$this->form_validation->set_rules('jumlah_saudara_kandung', 'jumlah saudara kandung', 'trim|numeric');
	$this->form_validation->set_rules('id_jurusan', 'jurusan pilihan satu', 'trim');
	$this->form_validation->set_rules('pilihan_dua', 'jurusan pilihan dua', 'trim');	
	$this->form_validation->set_rules('id_sekolah', 'id sekolah', 'trim|required');
	$this->form_validation->set_rules('no_un', 'no un', 'trim');
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

    public function excel()
    {
        $this->load->helper('exportexcel','date');
        $namaFile = "peserta.xls";
        $judul = "peserta";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "No Pendaftaran");
		xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Daftar");
		xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Peserta");
		xlsWriteLabel($tablehead, $kolomhead++, "JK");
		xlsWriteLabel($tablehead, $kolomhead++, "NISN");
		xlsWriteLabel($tablehead, $kolomhead++, "NIK");
		xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
		xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
		xlsWriteLabel($tablehead, $kolomhead++, "No Registrasi Akta Lahir");
		xlsWriteLabel($tablehead, $kolomhead++, "Agama");
		xlsWriteLabel($tablehead, $kolomhead++, "Kewarganegaraan");
		xlsWriteLabel($tablehead, $kolomhead++, "Berkebutuhan Khusus");
		xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
		xlsWriteLabel($tablehead, $kolomhead++, "RT");
		xlsWriteLabel($tablehead, $kolomhead++, "RW");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Dusun");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Kelurahan");
		xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan");
		xlsWriteLabel($tablehead, $kolomhead++, "Kode Pos");
		xlsWriteLabel($tablehead, $kolomhead++, "Latitude");
		xlsWriteLabel($tablehead, $kolomhead++, "Longitude");
		xlsWriteLabel($tablehead, $kolomhead++, "Tempat Tinggal");
		xlsWriteLabel($tablehead, $kolomhead++, "Moda Transportasi");
		xlsWriteLabel($tablehead, $kolomhead++, "No KKS");
		xlsWriteLabel($tablehead, $kolomhead++, "Anak Ke");
		xlsWriteLabel($tablehead, $kolomhead++, "Penerima KPS/PKH");
		xlsWriteLabel($tablehead, $kolomhead++, "No KPS/PKH");
		xlsWriteLabel($tablehead, $kolomhead++, "Penerima KIP`");
		xlsWriteLabel($tablehead, $kolomhead++, "No KIP");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Tertera Di KIP");
		xlsWriteLabel($tablehead, $kolomhead++, "Terima Fisik Kartu KIP");
		xlsWriteLabel($tablehead, $kolomhead++, "Hobi");		
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Ayah");
		xlsWriteLabel($tablehead, $kolomhead++, "NIK Ayah");
		xlsWriteLabel($tablehead, $kolomhead++, "Tahun Lahir Ayah");
		xlsWriteLabel($tablehead, $kolomhead++, "Pendidikan Ayah");
		xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan Ayah");
		xlsWriteLabel($tablehead, $kolomhead++, "Penghasilan Bulanan Ayah");
		xlsWriteLabel($tablehead, $kolomhead++, "Berkebutuhan Khusus Ayah");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Ibu");
		xlsWriteLabel($tablehead, $kolomhead++, "NIK Ibu");
		xlsWriteLabel($tablehead, $kolomhead++, "Tahun Lahir Ibu");
		xlsWriteLabel($tablehead, $kolomhead++, "Pendidikan Ibu");
		xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan Ibu");
		xlsWriteLabel($tablehead, $kolomhead++, "Penghasilan Bulanan Ibu");
		xlsWriteLabel($tablehead, $kolomhead++, "Berkebutuhan Khusus Ibu");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Wali");
		xlsWriteLabel($tablehead, $kolomhead++, "NIK Wali");
		xlsWriteLabel($tablehead, $kolomhead++, "Tahun Lahir Wali");
		xlsWriteLabel($tablehead, $kolomhead++, "Pendidikan Wali");
		xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan Wali");
		xlsWriteLabel($tablehead, $kolomhead++, "Penghasilan Bulanan Wali");
		xlsWriteLabel($tablehead, $kolomhead++, "No Telepon Rumah");
		xlsWriteLabel($tablehead, $kolomhead++, "Nomor HP");
		xlsWriteLabel($tablehead, $kolomhead++, "Email");
		xlsWriteLabel($tablehead, $kolomhead++, "Tinggi Badan");
		xlsWriteLabel($tablehead, $kolomhead++, "Berat Badan");
		xlsWriteLabel($tablehead, $kolomhead++, "Jarak ke sekolah");
		xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Saudara Kandung");
		xlsWriteLabel($tablehead, $kolomhead++, "Jurusan Pilihan 1");
		xlsWriteLabel($tablehead, $kolomhead++, "Jurusan Pilihan 2");
		xlsWriteLabel($tablehead, $kolomhead++, "Asal Sekolah");
		xlsWriteLabel($tablehead, $kolomhead++, "No UN");
		xlsWriteLabel($tablehead, $kolomhead++, "No Seri Ijazah");
		xlsWriteLabel($tablehead, $kolomhead++, "No Seri SKHU");
		xlsWriteLabel($tablehead, $kolomhead++, "Sekolah Pilihan 2");
		xlsWriteLabel($tablehead, $kolomhead++, "Jalur");		
		xlsWriteLabel($tablehead, $kolomhead++, "Nilai Rapor");
		xlsWriteLabel($tablehead, $kolomhead++, "Nilai USBN");
		xlsWriteLabel($tablehead, $kolomhead++, "Nilai UN");
		xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Nilai");
		xlsWriteLabel($tablehead, $kolomhead++, "Poin Jarak");
		xlsWriteLabel($tablehead, $kolomhead++, "Poin Prestasi");
		xlsWriteLabel($tablehead, $kolomhead++, "Nilai Akhir");
		xlsWriteLabel($tablehead, $kolomhead++, "Usia");
		xlsWriteLabel($tablehead, $kolomhead++, "Status");
		xlsWriteLabel($tablehead, $kolomhead++, "Status Hasil");
		xlsWriteLabel($tablehead, $kolomhead++, "Status Daftar Ulang");
		xlsWriteLabel($tablehead, $kolomhead++, "Catatan");
		// xlsWriteLabel($tablehead, $kolomhead++, "Id Users");

	foreach ($this->Peserta_model->get_all() as $data) {
        $kolombody = 0;
        $id=$data->id_peserta;
        $id_peserta=$data->id_peserta;
        // total nilai
        $totalnilai=$data->nilai_rapor+$data->nilai_usbn+$data->nilai_unbk_unkp;
        // total poin
        foreach ($this->Prestasipeserta_model->sumpoin($id_peserta) as $poin) {
        	$totalpoin=$poin->totalpoin;
        }
        // bobot by id_peserta
        foreach ($this->Peserta_model->bobot($id) as $bobot) {
        	$bobotjarak=($bobot->bobot_jarak!=0)?($bobot->bobot_jarak*$data->skor_jarak)/100:0;
        	$bobotnilai=($bobot->bobot_nilai!=0)?($bobot->bobot_nilai*$totalnilai)/100:0;
        	$bobotprestasi=($bobot->bobot_prestasi!=0)?($bobot->bobot_prestasi*$totalpoin)/100:0;
        }
        // nilai akhir        
        if ($this->Peserta_model->bobot($id)) {        
            $nilaiakhir=$bobotjarak+$bobotnilai+$bobotprestasi;
        } else {
            $nilaiakhir='bobot jalur blm ada';  
        } 

        // umur by id_peserta
        foreach ($this->Peserta_model->tgl_lhr($id) as $tgl) {
        	$tanggal_lahir=new DateTime($tgl->tanggal_lahir);
        }        
		$today = new DateTime('today');
		$y = $today->diff($tanggal_lahir)->y;
		$m = $today->diff($tanggal_lahir)->m;
		$d = $today->diff($tanggal_lahir)->d;
		$usia = $y . " tahun " . $m . " bulan " . $d . " hari";        

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_pendaftaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_daftar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun_pelajaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_peserta);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nisn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_registrasi_akta_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kewarganegaraan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->berkebutuhan_khusus);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rt);
	    xlsWriteLabel($tablebody, $kolombody++, $data->rw);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_dusun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kelurahan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_pos);
	    xlsWriteLabel($tablebody, $kolombody++, $data->latitude);
	    xlsWriteLabel($tablebody, $kolombody++, $data->longitude);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_tinggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->moda_transportasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_kks);
	    xlsWriteLabel($tablebody, $kolombody++, $data->anak_ke);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penerima_kps_pkh);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_kps_pkh);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penerima_kip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_kip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_tertera_di_kip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->terima_fisik_kartu_kip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_ekstrakurikuler);	    
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ayah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik_ayah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun_lahir_ayah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pendidikan_ayah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan_ayah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penghasilan_bulanan_ayah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->berkebutuhan_khusus_ayah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik_ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun_lahir_ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pendidikan_ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan_ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penghasilan_bulanan_ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->berkebutuhan_khusus_ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_wali);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik_wali);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun_lahir_wali);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pendidikan_wali);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan_wali);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penghasilan_bulanan_wali);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_telepon_rumah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_hp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tinggi_badan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->berat_badan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jarak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jumlah_saudara_kandung);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_jurusan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pilihan_dua);
	    xlsWriteLabel($tablebody, $kolombody++, $data->asal_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_un);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_seri_ijazah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_seri_skhu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pilihan_sekolah_lain);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jalur);	    	    
	    xlsWriteLabel($tablebody, $kolombody++, $data->nilai_rapor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nilai_usbn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nilai_unbk_unkp);
	    xlsWriteLabel($tablebody, $kolombody++, $totalnilai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->skor_jarak);
	    xlsWriteNumber($tablebody, $kolombody++, $totalpoin);
	    xlsWriteNumber($tablebody, $kolombody++, $nilaiakhir);
	    xlsWriteLabel($tablebody, $kolombody++, $usia);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_hasil);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_daftar_ulang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->catatan);
	    // xlsWriteNumber($tablebody, $kolombody++, $data->id_users);

	    $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=peserta.doc");

        $data = array(
            'peserta_data' => $this->Peserta_model->get_all(),
            'start' => 0
        );
        $this->load->view('peserta/Peserta_doc',$data);
    }

  	public function printdoc(){
        $data = array(
            'peserta_data' => $this->Peserta_model->get_all(),
            'start' => 0
        );
        $this->load->view('peserta/Peserta_print', $data);
    }   

  	public function printform($id){
  		$data = array(
            'peserta' => $this->Peserta_model->get_by_id($id),
            'start' => 0
        );    

        $id_peserta = $id;
        $data['berkas']=$this->Berkas_model->get_foto($id_peserta); 
        $data['prestasipeserta']=$this->Prestasipeserta_model->get_all_prestasi($id_peserta);
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1(); 
        $data['pengumuman'] = $this->Pengumuman_model->get_by_formulir(); 

        $data['formulir'] =  $this->Formulir_model->get_by_id_1();
        helper_log("print", "Cetak bukti pendaftaran ".$data['peserta']->nama_peserta);

		$mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
		$html = $this->load->view('peserta/Print_formulir', $data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('formulir.pdf','I');        

    }

  	public function printSKL($id)
  	{
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

  	public function terima_all(){
  		$hasil="Di Terima";
  		$this->Peserta_model->get_hasil($hasil);
  		helper_log("edit", "Update data status hasil semua peserta"); 
        redirect('peserta');
    }    

  	public function reset_all(){
  		$hasil="Belum ada";
  		$this->Peserta_model->get_reset($hasil);
  		helper_log("edit", "Update data status hasil semua peserta"); 
        redirect('peserta');
    }     

    public function nilai_peserta()
    {
	    $data['title'] = 'Nilai Peserta';
	    $data['subtitle'] = '';
	    $data['crumb'] = [
	    	'Peserta' => '',
	    	];  	

	    // $data['code_js'] = 'peserta/codejs';
	    $data['peserta']=$this->Peserta_model->get_all();  
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();     	    
	    $data['page'] = 'peserta/Peserta_nilai';
	    $this->load->view('template/backend', $data);
    }   

    public function rekap_nilai()
    {
        $this->load->helper('exportexcel','date');
        $namaFile = "rekap_nilai.xls";
        $judul = "rekap";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "No Pendaftaran");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Peserta");
		xlsWriteLabel($tablehead, $kolomhead++, "JK");
		xlsWriteLabel($tablehead, $kolomhead++, "NISN");
		xlsWriteLabel($tablehead, $kolomhead++, "Asal Sekolah");
		xlsWriteLabel($tablehead, $kolomhead++, "Sekolah Pilihan 2");		
		xlsWriteLabel($tablehead, $kolomhead++, "Jurusan Pil 1");
		xlsWriteLabel($tablehead, $kolomhead++, "Jurusan Pil 2");
		xlsWriteLabel($tablehead, $kolomhead++, "Jalur");		
		xlsWriteLabel($tablehead, $kolomhead++, "Nilai Rapor");
		xlsWriteLabel($tablehead, $kolomhead++, "Nilai USBN");
		xlsWriteLabel($tablehead, $kolomhead++, "Nilai UN");
		xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Nilai");
		xlsWriteLabel($tablehead, $kolomhead++, "Poin Jarak");
		xlsWriteLabel($tablehead, $kolomhead++, "Poin Prestasi");
		xlsWriteLabel($tablehead, $kolomhead++, "Nilai Akhir");
		xlsWriteLabel($tablehead, $kolomhead++, "Usia");

		foreach ($this->Peserta_model->get_all() as $data) {
        $kolombody = 0;
        $id=$data->id_peserta;
        $id_peserta=$data->id_peserta;
        // total nilai
        $totalnilai=$data->nilai_rapor+$data->nilai_usbn+$data->nilai_unbk_unkp;
        // total poin
        foreach ($this->Prestasipeserta_model->sumpoin($id_peserta) as $poin) {
        	$totalpoin=$poin->totalpoin;
        }
        // bobot by id_peserta
        foreach ($this->Peserta_model->bobot($id) as $bobot) {
        	$bobotjarak=($bobot->bobot_jarak!=0)?($bobot->bobot_jarak*$data->skor_jarak)/100:0;
        	$bobotnilai=($bobot->bobot_nilai!=0)?($bobot->bobot_nilai*$totalnilai)/100:0;
        	$bobotprestasi=($bobot->bobot_prestasi!=0)?($bobot->bobot_prestasi*$totalpoin)/100:0;
        }
        // nilai akhir        
        if ($this->Peserta_model->bobot($id)) {        
            $nilaiakhir=$bobotjarak+$bobotnilai+$bobotprestasi;
        } else {
            $nilaiakhir='bobot jalur blm ada';  
        } 

        // umur by id_peserta
        foreach ($this->Peserta_model->tgl_lhr($id) as $tgl) {
        	$tanggal_lahir=new DateTime($tgl->tanggal_lahir);
        }        
		$today = new DateTime('today');
		$y = $today->diff($tanggal_lahir)->y;
		$m = $today->diff($tanggal_lahir)->m;
		$d = $today->diff($tanggal_lahir)->d;
		$usia = $y . " tahun " . $m . " bulan " . $d . " hari";        

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_pendaftaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_peserta);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nisn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->asal_sekolah);	
	    xlsWriteLabel($tablebody, $kolombody++, $data->pilihan_sekolah_lain);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_jurusan);
		xlsWriteLabel($tablebody, $kolombody++, $data->pilihan_dua);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jalur);	    	    
	    xlsWriteLabel($tablebody, $kolombody++, $data->nilai_rapor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nilai_usbn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nilai_unbk_unkp);
	    xlsWriteLabel($tablebody, $kolombody++, $totalnilai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->skor_jarak);
	    xlsWriteNumber($tablebody, $kolombody++, $totalpoin);
	    xlsWriteNumber($tablebody, $kolombody++, $nilaiakhir);
	    xlsWriteLabel($tablebody, $kolombody++, $usia);

	    $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
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
            redirect(site_url('peserta/create'));            
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
        redirect(site_url('peserta/create'));
        }
    } 

    public function _rules_sekolah()
    {
    	$this->form_validation->set_rules('npsn_sekolah', 'npsn sekolah', 'trim|required|numeric|exact_length[8]|is_unique[sekolah.npsn_sekolah]',
        array(
                'required'      => 'NPSN Sekolah tidak boleh kosong ',
                'numeric'       => 'NPSN Sekolah hanya angka ',
                'is_unique'     => 'NPSN Sekolah sudah ada '
        ));
    	$this->form_validation->set_rules('id_sekolah', 'id_sekolah', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text">', '</span>');
    }

    public function update_penomoran()
    {
        $data = array(
                'penomoran' => $this->input->post('penomoran',TRUE),
            );
        $this->Peserta_model->update_penomoran($this->input->post('id_identitas', TRUE), $data);
        helper_log("edit", "Update data pengaturan");             
        redirect(site_url('peserta/create'));
    }             

}

/* End of file Peserta.php */