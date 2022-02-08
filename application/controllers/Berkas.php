<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Berkas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Berkas_model');
        $this->load->model('Pengaturan_model');  
        $this->load->library('form_validation');        
	    $this->load->library('datatables');   
    }

    public function index()
    {
        $data['title'] = 'Berkas';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Berkas' => '',
        ];

        $data['code_js'] = 'berkas/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'berkas/Berkas_list';
        $this->load->view('template/backend', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Berkas_model->json();
    }

    public function read($id)
    {
        $row = $this->Berkas_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_berkas' => $row->id_berkas,
        		'nama_berkas' => $row->nama_berkas,
        		'keterangan_berkas' => $row->keterangan_berkas,
        		'tipe_berkas' => $row->tipe_berkas,
        		'ukuran_berkas' => $row->ukuran_berkas,
        		'id_peserta' => $row->id_peserta,
                'nama_peserta' => $row->nama_peserta,
	        );

        $data['title'] = 'Berkas';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'berkas/Berkas_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('berkas'));
        }
    }

    public function delete($id)
    {
        $row = $this->Berkas_model->get_by_id($id);

        if ($row) {
            $this->Berkas_model->delete($id);
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus berkas ".$row->keterangan_berkas." ".$row->nama_peserta);  
            redirect(site_url('berkas'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('berkas'));
        }
    }     

    public function deletebulk(){
        $delete = $this->Berkas_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
        }else{
            $this->session->set_flashdata('message_error', 'Data Gagal dihapus');
        }
        echo $delete;
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_berkas', 'nama berkas', 'trim|required');
	$this->form_validation->set_rules('keterangan_berkas', 'keterangan berkas', 'trim|required');
	$this->form_validation->set_rules('tipe_berkas', 'tipe berkas', 'trim|required');
	$this->form_validation->set_rules('ukuran_berkas', 'ukuran berkas', 'trim|required');
	$this->form_validation->set_rules('id_peserta', 'id peserta', 'trim|required');

	$this->form_validation->set_rules('id_berkas', 'id_berkas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Berkas.php */
