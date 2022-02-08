<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Pengaturan_model');
        $this->load->model('Users_model');
        $this->load->model('Users_groups_model');
        $this->load->library('form_validation');       
    }

    public function index()
    {
        $data['title'] = 'Pengaturan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pengaturan' => '',
        ];

        $data['code_js'] = 'pengaturan/codejs';
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();   
        $data['page'] = 'pengaturan/Pengaturan';
        $this->load->view('template/backend', $data);
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            // $this->index($this->input->post('id_identitas', TRUE));
            $this->session->set_flashdata('message', 
                form_error('nama_sekolah').
                form_error('kode_sekolah').
                form_error('npsn').
                form_error('status').
                form_error('jenjang').
                form_error('alamat').
                form_error('kepala_sekolah').
                form_error('nip').
                form_error('kelurahan').
                form_error('kecamatan').
                form_error('kabupaten').
                form_error('kode_pos').
                form_error('no_telepon').
                form_error('website').
                form_error('email').
                form_error('latitude').
                form_error('longitude').
                form_error('gis').
                form_error('apikey').
                form_error('hstempel').
                form_error('httd')                
            );            
            redirect(site_url('pengaturan'));
        } else { 

            $data = array(
        		'nama_sekolah' => $this->input->post('nama_sekolah',TRUE),
        		'kode_sekolah' => $this->input->post('kode_sekolah',TRUE),
        		'npsn' => $this->input->post('npsn',TRUE),
        		'status' => $this->input->post('status',TRUE),
        		'jenjang' => $this->input->post('jenjang',TRUE),
        		'alamat' => $this->input->post('alamat',TRUE),
        		'kepala_sekolah' => $this->input->post('kepala_sekolah',TRUE),
        		'nip' => $this->input->post('nip',TRUE),
                'kelurahan' => $this->input->post('kelurahan',TRUE),                
        		'kecamatan' => $this->input->post('kecamatan',TRUE),
        		'kabupaten' => $this->input->post('kabupaten',TRUE),
        		'kode_pos' => $this->input->post('kode_pos',TRUE),
        		'no_telepon' => $this->input->post('no_telepon',TRUE),
        		'website' => $this->input->post('website',TRUE),
        		'email' => $this->input->post('email',TRUE),
                'latitude' => $this->input->post('latitude',TRUE),
                'longitude' => $this->input->post('longitude',TRUE),
                'gis' => $this->input->post('gis',TRUE), 
                'apikey' => $this->input->post('apikey',TRUE),                 
                'status_pendaftaran' => $this->input->post('status_pendaftaran',TRUE),
                'status_hasil' => $this->input->post('status_hasil',TRUE),
                'status_daftar_ulang' => $this->input->post('status_daftar_ulang',TRUE),
                'hstempel' => $this->input->post('hstempel',TRUE),
                'httd' => $this->input->post('httd',TRUE),  
                'sstempel' => $this->input->post('sstempel',TRUE),
                'sttd' => $this->input->post('sttd',TRUE),    
    	    );

            $this->Pengaturan_model->update($this->input->post('id_identitas', TRUE), $data);

            $config["upload_path"] = "./assets/dist/img/";
            $config["allowed_types"] = "png";
            $config['max_size'] = 500;

            $this->load->library("upload", $config);
            // upload logo
                if(!empty($_FILES["logo"]["name"])){
                    if($this->upload->do_upload("logo")){
                        $data = array(
                            'logo' => $_FILES["logo"]['name'],
                        );
                        $this->Pengaturan_model->update($this->input->post('id_identitas', TRUE), $data);
                    } else {
                        $this->input->post('old_logo');
                        $this->session->set_flashdata('message', 'Upload logo Gagal');
                        redirect(site_url('pengaturan'));
                    }                  
                } else {
                    $this->load->library("upload", $config);
                    if($this->upload->do_upload("old_logo")){
                        $data = array(
                            'logo' => $_FILES["old_logo"]['name'],
                        );
                        $this->Pengaturan_model->update($this->input->post('id_identitas', TRUE), $data);  
                    }                    
                }     
            // upload bglogin
                if(!empty($_FILES["bglogin"]["name"])){
                    if($this->upload->do_upload("bglogin")){
                        $data = array(
                            'bglogin' => $_FILES["bglogin"]['name'],
                        );
                        $this->Pengaturan_model->update($this->input->post('id_identitas', TRUE), $data);
                    } else {
                        $this->input->post('old_bglogin');
                        $this->session->set_flashdata('message', 'Upload bglogin Gagal');
                        redirect(site_url('pengaturan'));
                    }                  
                } else {
                    $this->load->library("upload", $config);
                    if($this->upload->do_upload("old_bglogin")){
                        $data = array(
                            'bglogin' => $_FILES["old_bglogin"]['name'],
                        );
                        $this->Pengaturan_model->update($this->input->post('id_identitas', TRUE), $data);  
                    }                    
                }                         
            // upload stempel
                if(!empty($_FILES["stempel"]["name"])){
                    if($this->upload->do_upload("stempel")){
                        $data = array(
                            'stempel' => $_FILES["stempel"]['name'],
                        );
                        $this->Pengaturan_model->update($this->input->post('id_identitas', TRUE), $data);
                    } else {
                        $this->input->post('old_stempel');
                        $this->session->set_flashdata('message', 'Upload Stempel Gagal');
                        redirect(site_url('pengaturan'));
                    }                  
                } else {
                    $this->load->library("upload", $config);
                    if($this->upload->do_upload("old_stempel")){
                        $data = array(
                            'stempel' => $_FILES["old_stempel"]['name'],
                        );
                        $this->Pengaturan_model->update($this->input->post('id_identitas', TRUE), $data);  
                    }                    
                }   
            // upload ttd    
                if(!empty($_FILES["ttd"]["name"])){        
                    if($this->upload->do_upload("ttd")){
                        $data = array(
                            'ttd' => $_FILES["ttd"]['name'],
                        );
                        $this->Pengaturan_model->update($this->input->post('id_identitas', TRUE), $data);
                    } else {
                        $this->input->post('old_ttd');
                        $this->session->set_flashdata('message', 'Upload ttd Gagal');
                        redirect(site_url('pengaturan'));
                    }
                } else {
                    $this->load->library("upload", $config);
                    if($this->upload->do_upload("old_ttd")){
                        $data = array(
                            'ttd' => $_FILES["old_ttd"]['name'],
                        );
                        $this->Pengaturan_model->update($this->input->post('id_identitas', TRUE), $data);  
                    }                    
                } 
            // upload header    
                if(!empty($_FILES["header"]["name"])){    
                    if($this->upload->do_upload("header")){ 
                        $data = array(
                            'header' => $_FILES["header"]['name'],
                        );
                        $this->Pengaturan_model->update($this->input->post('id_identitas', TRUE), $data);
                    } else {
                        $this->input->post('old_header');
                        $this->session->set_flashdata('message', 'Upload header Gagal');
                        redirect(site_url('pengaturan'));
                    } 
                } else {
                    $this->load->library("upload", $config);
                    if($this->upload->do_upload("old_header")){
                        $data = array(
                            'header' => $_FILES["old_header"]['name'],
                        );
                        $this->Pengaturan_model->update($this->input->post('id_identitas', TRUE), $data);  
                    }                                         
                }  
                
            $this->session->set_flashdata('message', 'Data Berhasil diubah');
            helper_log("edit", "Update data pengaturan");             
            redirect(site_url('pengaturan'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('nama_sekolah', 'nama sekolah', 'trim|required',
        array(
                'required'      => 'Nama Sekolah tidak boleh kosong '
        ));
    	$this->form_validation->set_rules('kode_sekolah', 'kode sekolah', 'trim|required',
        array(
                'required'      => 'Kode Sekolah tidak boleh kosong '
        ));
    	$this->form_validation->set_rules('npsn', 'npsn', 'trim|required|numeric|exact_length[8]',
        array(
                'required'      => 'NPSN Sekolah tidak boleh kosong ',
                'numeric'       => 'NPSN Sekolah hanya angka ',
                'exact_length[9]'     => 'NPSN Sekolah 8 karakter '
        ));
    	$this->form_validation->set_rules('status', 'status', 'trim|required',
        array(
                'required'      => 'Status Sekolah tidak boleh kosong '
        ));
    	$this->form_validation->set_rules('jenjang', 'jenjang', 'trim|required',
        array(
                'required'      => 'Jenjang Sekolah tidak boleh kosong '
        ));
    	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required',
        array(
                'required'      => 'Alamat Sekolah tidak boleh kosong '
        ));
    	$this->form_validation->set_rules('kepala_sekolah', 'kepala sekolah', 'trim|required',
        array(
                'required'      => 'Kepala Sekolah tidak boleh kosong '
        ));
    	$this->form_validation->set_rules('nip', 'nip', 'trim',
        array(
        ));
        $this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required',
        array(
                'required'      => 'Kelurahan tidak boleh kosong '
        ));        
    	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required',
        array(
                'required'      => 'Kecamatan tidak boleh kosong '
        ));
    	$this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required',
        array(
                'required'      => 'Kabupaten tidak boleh kosong '
        ));
    	$this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|required|numeric',
        array(
                'required'      => 'Kode Pos tidak boleh kosong ',
                'numeric'       => 'Kode Pos hanya angka '
        ));
    	$this->form_validation->set_rules('no_telepon', 'no telepon', 'trim|required|numeric',
        array(
                'required'      => 'No Telepon tidak boleh kosong ',
                'numeric'       => 'No Telepon hanya angka '
        ));
    	$this->form_validation->set_rules('website', 'website', 'trim');
    	$this->form_validation->set_rules('email', 'email', 'trim|valid_email|required');
        $this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
        $this->form_validation->set_rules('gis', 'gis', 'trim');
        $this->form_validation->set_rules('apikey', 'apikey', 'trim|required',
        array(
                'required'      => 'apiKey tidak boleh kosong '
        ));        
        $this->form_validation->set_rules('logo', 'logo', 'trim');
        $this->form_validation->set_rules('bglogin', 'bglogin', 'trim');
        $this->form_validation->set_rules('stempel', 'stempel', 'trim');
        $this->form_validation->set_rules('ttd', 'tanda tangan', 'trim');  
        $this->form_validation->set_rules('header', 'header', 'trim');  
        $this->form_validation->set_rules('hstempel', 'tinggi', 'trim|required|numeric',
        array(
                'required'      => 'Tinggi stempel tidak boleh kosong ',
                'numeric'       => 'Tinggi hanya angka '
        ));  
        $this->form_validation->set_rules('httd', 'tinggi', 'trim|required|numeric',
        array(
                'required'      => 'Tinggi tanda tangan tidak boleh kosong ',
                'numeric'       => 'Tinggi hanya angka '
        ));                            
        $this->form_validation->set_rules('status_pendaftaran', 'status pendaftaran', 'trim');
        $this->form_validation->set_rules('status_hasil', 'status_hasil', 'trim');
        $this->form_validation->set_rules('status_daftar_ulang', 'status_daftar_ulang', 'trim');
        $this->form_validation->set_rules('sstempel', 'status', 'trim');
        $this->form_validation->set_rules('sttd', 'status', 'trim');  

    	$this->form_validation->set_rules('id_identitas', 'id_identitas', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text">', '</span>');
    }

    public function backupdb()
    {
        $this->load->dbutil();

        $aturan = array(
                'tables'     => array('berkas','bobot','formulir','identitas','jalur','jarak','jurusan','log','pengumuman','peserta','prestasi','prestasipeserta','sekolah','tahunpelajaran','groups_menu','login_attempts','menu','menu_type','users_groups'),
                // Array table yang akan dibackup
                'ignore'     => array('groups','users'),
                // Daftar table yang tidak akan dibackup
                'format'     => 'zip',
                // gzip, zip, txt format filenya
                'filename'   => 'eppdbbackup.sql',
                // Nama file
                'add_drop'   => TRUE, 
                // Untuk menambahkan drop table di backup
                'add_insert' => TRUE,
                // Untuk menambahkan data insert di file backup
                'newline'    => "\n"
                // Baris baru yang digunakan dalam file backup
        );        
 
        $backup =& $this->dbutil->backup($aturan);
 
        $nama_database = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
        $simpan = '/backup'.$nama_database;
 
        $this->load->helper('file');
        write_file($simpan, $backup);
 
        helper_log("backup", "Backup database"); 
        $this->load->helper('download');
        force_download($nama_database, $backup);
    }    

    public function restoredb()
    {
        if ($this->ion_auth->is_admin()) {
            $this->load->helper('file');
            $config['upload_path']="./assets/uploads/files/database/";
            $config['allowed_types']="sql|x-sql";
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if(!$this->upload->do_upload("file")){
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', 'Data Gagal diupload');
                redirect(site_url('pengaturan'));         
                // echo "Gagal Upload";
                var_dump($error);
                exit();
            }

            $file = $this->upload->data();  //DIUPLOAD DULU KE DIREKTORI assets/uploads/files/database/
            $sqlupload=$file['file_name'];
                       
            $isi_file = file_get_contents('./assets/uploads/files/database/'.$sqlupload); //PANGGIL FILE YANG TERUPLOAD
            $string_query = rtrim( $isi_file, "\n;" );
            $array_query = explode(";", $string_query);   //JALANKAN QUERY MERESTORE KEDATABASE
            foreach($array_query as $query)
            {
                $this->db->query($query);
            }

            helper_log("restore", "Restore database"); 
            $path_to_file = './assets/uploads/files/database/'.$sqlupload;
            if(unlink($path_to_file)) {   // HAPUS FILE YANG TERUPLOAD
                $this->session->set_flashdata('message', 'Restore database berhasil');
                redirect(site_url('pengaturan'));  
            } else {
                echo 'errors occured';
            }  
        } else {
            $this->session->set_flashdata('message', 'Hanya admin yang dapat merestore database');
            redirect(site_url('pengaturan'));             
        }    
    }

    public function deletedata()
    {

            $user = $this->ion_auth->user()->row(); 
            $password = $_POST['password'];            
            if (!password_verify($password, $user->password)) {
                $this->session->set_flashdata('message', 'Password salah');
                redirect(site_url('pengaturan'));  
            } else {   
                if (!empty($_POST['data'])) {
                    $data = $_POST['data'];
                    if ($data <> '') {
                        foreach ($data as $table) {
                            if ($table) {
                                $this->db->TRUNCATE($table);
                                helper_log("delete", "Menghapus data tabel ".$table);
                            }
                        }
                            $this->session->set_flashdata('message', 'Data berhasil dikosongkan'); 
                            redirect(site_url('pengaturan'));   
                    }
                } else {
                    $this->session->set_flashdata('message', 'Tidak ada data terpilih');
                    redirect(site_url('pengaturan'));               
                }
            }    

    }      

}

/* End of file Pengaturan.php */