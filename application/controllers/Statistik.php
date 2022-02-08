<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
        $this->load->model('Peserta_model');
        $this->load->model('Pengaturan_model');  
	}
	
	public function index()
	{
		$data['title'] = 'Statistik';
		$data['subtitle'] = '';
        $data['crumb'] = [
            'Statistik' => '',
        ];
        
        // $data['code_js'] = 'Statistik/codejs'; 
        $data['count_jk']=$this->Peserta_model->get_chart_jk();
        $data['count_agama']=$this->Peserta_model->get_chart_agama(); 
        $data['count_sekolah']=$this->Peserta_model->get_chart_sekolah();         
        
        $data['page'] = 'statistik/Statistik_list';
    	$this->load->view('template/backend', $data);
	}

}