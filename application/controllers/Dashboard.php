<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
        $this->load->library(array('googlemaps'));
		$this->load->model('Users_model');
        $this->load->model('Users_groups_model');
        $this->load->model('Peserta_model');
        $this->load->model('Sekolah_model');
        $this->load->model('Jalur_model');
        $this->load->model('Jarak_model');
        $this->load->model('Jurusan_model');
        $this->load->model('Tahunpelajaran_model');
		$this->load->model('Formulir_model');  
        $this->load->model('Pengumuman_model'); 
        $this->load->model('Pengaturan_model');  
        $this->load->model('Jurusan_model');
        $this->load->model('Berkas_model');
        $this->load->model('Log_model'); 
	}
	
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        //$this->layout->set_privilege(1);
        $data['code_js'] = 'Dashboard/codejs';
        $data['log'] = $this->Log_model->get_log();  
        $data['peserta'] = $this->Peserta_model->get_all();
        $data['countjurusan'] = $this->Peserta_model->get_countjurusan();      
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();  
        $data['formulir'] =  $this->Formulir_model->get_by_id_1();        
        $data['nomer'] = $this->Peserta_model->nodaftar();  

        if ($data['nomer']) {   
            $id=$data['nomer']->id_peserta;
            $data['berkas'] = $this->Berkas_model->get_id($id);         
        }

        $data['group']=$this->Users_groups_model->get_id();
        $data['infomember']=$this->Pengumuman_model->get_by_member();
        $data['contact'] = $this->Users_model->get_panitia();        

        //total peserta tahun aktif
        $data['totalpeserta'] =  $this->Peserta_model->hitungDataPeserta();
        $data['totaljalur1'] =  $this->Peserta_model->hitungDataJalur1();
        $data['totaljalur2'] =  $this->Peserta_model->hitungDataJalur2();
        $data['totaljalur3'] =  $this->Peserta_model->hitungDataJalur3();  
        $data['totaljalur4'] =  $this->Peserta_model->hitungDataJalur4();  
        $data['totaldiverifikasi'] =  $this->Peserta_model->hitungDataVerifikasi();
        $data['totalbaru'] =  $this->Peserta_model->hitungDataBaru();
        $data['totalberkaskurang'] =  $this->Peserta_model->hitungDataKurang();

        $data['jalur'] =  $this->Jalur_model->get_all();

        //kuota peserta tahun aktif
        $data['kuotax'] =  $this->Tahunpelajaran_model->get_tahun_aktif();
        if (empty($data['kuotax'])) {
          $data['kuota']='0';
        } else {
          $data['kuota']=$data['kuotax']->kuota;
        }

        $data['jalur1'] =  $this->Jalur_model->KuotaJalur1();
        $data['jalur2'] =  $this->Jalur_model->KuotaJalur2();
        $data['jalur3'] =  $this->Jalur_model->KuotaJalur3();    
        $data['jalur4'] =  $this->Jalur_model->KuotaJalur4();
       
        $data['KuotaJalur1']=$data['kuota']*$data['jalur1']->persentase/100;
        $data['KuotaJalur2']=$data['kuota']*$data['jalur2']->persentase/100;
        $data['KuotaJalur3']=$data['kuota']*$data['jalur3']->persentase/100;
        $data['KuotaJalur4']=$data['kuota']*$data['jalur4']->persentase/100;

        // progress bar tahun aktif
        // bar jalur 1
        if (empty($data['KuotaJalur1'])) {   
            $data['barjalur1']='0';  
        } else {
            $data['barjalur1']=($data['totaljalur1']!=0)?($data['totaljalur1']/$data['KuotaJalur1'])*100:0;  
        }            
        // bar jalur 2
        if (empty($data['KuotaJalur2'])) {        
            $data['barjalur2']='0'; 
        } else {
            $data['barjalur2']=($data['totaljalur2']!=0)?($data['totaljalur2']/$data['KuotaJalur2'])*100:0; 
        }
        // bar jalur 3
        if (empty($data['KuotaJalur3'])) { 
            $data['barjalur3']='0';
        } else {
            $data['barjalur3']=($data['totaljalur3']!=0)?($data['totaljalur3']/$data['KuotaJalur3'])*100:0; 
        }            
        // bar jalur 4  
        if (empty($data['KuotaJalur4'])) {      
            $data['barjalur4']='0';
        } else {    
            $data['barjalur4']=($data['totaljalur4']!=0)?($data['totaljalur4']/$data['KuotaJalur4'])*100:0;
        }    
        
        $data['page'] = 'Dashboard/Index';
    	$this->load->view('template/backend', $data);
	}

}