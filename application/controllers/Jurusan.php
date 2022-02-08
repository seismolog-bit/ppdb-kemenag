<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jurusan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Jurusan_model');
        $this->load->model('Pengaturan_model'); 
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('jurusan/create_action'),
            'id_jurusan' => set_value('id_jurusan'),
            'bidang_keahlian' => set_value('bidang_keahlian'),
            'nama_jurusan' => set_value('nama_jurusan'),
            'kuota_jurusan' => set_value('kuota_jurusan'),
        );

        $data['title'] = 'Jurusan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Jurusan' => '',
        ];

        $data['code_js'] = 'jurusan/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();         
        $data['page'] = 'jurusan/Jurusan_list';
        $this->load->view('template/backend', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Jurusan_model->json();
    }

    public function read($id)
    {
        $row = $this->Jurusan_model->get_by_id($id);
        if ($row) {
        $data = array(
        	'id_jurusan' => $row->id_jurusan,
            'bidang_keahlian' => $row->bidang_keahlian,
        	'nama_jurusan' => $row->nama_jurusan,
            'kuota_jurusan' => $row->kuota_jurusan,
    	);

        $data['title'] = 'Jurusan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'jurusan/Jurusan_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('jurusan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('jurusan/create_action'),
    	    'id_jurusan' => set_value('id_jurusan'),
            'bidang_keahlian' => set_value('bidang_keahlian'),
    	    'nama_jurusan' => set_value('nama_jurusan'),
            'kuota_jurusan' => set_value('kuota_jurusan'),
    	);

        $data['title'] = 'Jurusan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'jurusan/Jurusan_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            // $this->create();
            $this->session->set_flashdata('message', 
                form_error('bidang_keahlian').
                form_error('nama_jurusan').
                form_error('kuota_jurusan')
            );
            redirect(site_url('jurusan'));               
        } else {
            $data = array(
        		'bidang_keahlian' => $this->input->post('bidang_keahlian',TRUE),
                'nama_jurusan' => $this->input->post('nama_jurusan',TRUE),
                'kuota_jurusan' => $this->input->post('kuota_jurusan',TRUE),
    	    );
        
            $this->Jurusan_model->insert($data);
            $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
            helper_log("add", "Menambah data jurusan ".$data['nama_jurusan']);                
            redirect(site_url('jurusan'));}
    }

    public function update($id)
    {
        $row = $this->Jurusan_model->get_by_id($id);

        if ($row) {
        $data = array(
            'button' => 'Ubah',
            'action' => site_url('jurusan/update_action'),
        	'id_jurusan' => set_value('id_jurusan', $row->id_jurusan),
        	'bidang_keahlian' => set_value('bidang_keahlian', $row->bidang_keahlian),
            'nama_jurusan' => set_value('nama_jurusan', $row->nama_jurusan),
            'kuota_jurusan' => set_value('kuota_jurusan', $row->kuota_jurusan),
    	);
        
        $data['title'] = 'Jurusan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'jurusan/Jurusan_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('jurusan'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jurusan', TRUE));
        } else {
        $data = array(
		    'bidang_keahlian' => $this->input->post('bidang_keahlian',TRUE),
            'nama_jurusan' => $this->input->post('nama_jurusan',TRUE),
            'kuota_jurusan' => $this->input->post('kuota_jurusan',TRUE),
	    );
            $this->Jurusan_model->update($this->input->post('id_jurusan', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Berhasil diubah');
            helper_log("edit", "Update data jurusan ".$data['nama_jurusan']);            
            redirect(site_url('jurusan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Jurusan_model->get_by_id($id);

        if ($row->id_jurusan=='1') {
            $this->session->set_flashdata('message', 'Data Gagal dihapus');
            redirect(site_url('jurusan'));
        } else {
            $this->Jurusan_model->delete($id);
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus data jurusan ".$row->nama_jurusan);
            redirect(site_url('jurusan'));
        }
    }

    public function deletebulk(){
        $delete = $this->Jurusan_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus multi data jurusan");            
        }else{
            $this->session->set_flashdata('message_error', 'Data Gagal dihapus');
        }
        echo $delete;
    }

    public function _rules()
    {
    $this->form_validation->set_rules('bidang_keahlian', 'bidang keahlian', 'trim|required',
        array(
                'required'      => 'Bidang Keahlian tidak boleh kosong '    
        ));        
	$this->form_validation->set_rules('nama_jurusan', 'nama jurusan', 'trim|required',
        array(
                'required'      => 'Nama Jurusan tidak boleh kosong '    
        ));
    $this->form_validation->set_rules('kuota_jurusan', 'kuota jurusan', 'trim|required|numeric',
        array(
                'required'      => 'Kuota Jurusan tidak boleh kosong ',
                'numeric'     => 'Kuota hanya angka '                
        ));

	$this->form_validation->set_rules('id_jurusan', 'id_jurusan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jurusan.xls";
        $judul = "jurusan";
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
	    xlsWriteLabel($tablehead, $kolomhead++, "Bidang");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Jurusan");
        xlsWriteLabel($tablehead, $kolomhead++, "Kuota Jurusan");

	foreach ($this->Jurusan_model->get_all() as $data) {
        $kolombody = 0;

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->bidang_keahlian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_jurusan);
        xlsWriteNumber($tablebody, $kolombody++, $data->kuota_jurusan);

	    $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jurusan.doc");

        $data = array(
            'jurusan_data' => $this->Jurusan_model->get_all(),
            'start' => 0
        );
        $this->load->view('jurusan/Jurusan_doc',$data);
    }

    public function printdoc(){
        $data = array(
            'jurusan_data' => $this->Jurusan_model->get_all(),
            'start' => 0
        );
        $this->load->view('jurusan/Jurusan_print', $data);
    }

}

/* End of file Jurusan.php */