<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crudbuilder extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->layout->auth();
        $c_url = $this->router->fetch_class();
        $this->layout->auth_privilege($c_url); 
        $this->load->model('Pengaturan_model');
	}
	
	public function index()
	{
		$data['title'] = 'Crudbuilder';
		$data['subtitle'] = '';
        $data['crumb'] = [
            'Crudbuilder' => '',
        ];
        
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'Crudbuilder/Index';
		$this->load->view('template/backend', $data);
	}
}