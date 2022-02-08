<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->layout->auth();

        //add
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));
        $this->load->model('Pengaturan_model');

        $this->lang->load('auth');
        //end add        
	}
	
	public function index()
	{
		$data['title'] = 'Profile';
		$data['subtitle'] = '';
        $data['crumb'] = [
            'Profile' => '',
        ];
        //$this->layout->set_privilege(1);
        $data['pengaturan'] = $this->Pengaturan_model->get_by_id_1();  
        $data['page'] = 'profile';
		$this->load->view('template/backend', $data);
	}
}