<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Log_model');
        $this->load->model('Pengaturan_model');          
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Log Aktifitas';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Log' => '',
        ];

        $data['code_js'] = 'log/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();     
        $data['page'] = 'log/Log_list';
        $this->load->view('template/backend', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Log_model->json();
    }

    public function delete($id)
    {
        $row = $this->Log_model->get_by_id($id);

        if ($row) {
            $this->Log_model->delete($id);
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus log ");  
            redirect(site_url('log'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('log'));
        }
    }     

    public function deletebulk(){
        $delete = $this->Log_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
        }else{
            $this->session->set_flashdata('message_error', 'Data Gagal dihapus');
        }
        echo $delete;
    }

}

/* End of file Log.php */