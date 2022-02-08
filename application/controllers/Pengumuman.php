<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Pengumuman_model');
        $this->load->model('Pengaturan_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Pengumuman';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pengumuman' => '',
        ];

        $data['code_js'] = 'pengumuman/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();            
        $data['page'] = 'pengumuman/Pengumuman_list';
        $this->load->view('template/backend', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Pengumuman_model->json();
    }

    public function read($id)
    {
        $row = $this->Pengumuman_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'id_pengumuman' => $row->id_pengumuman,
    		'type' => $row->type,
    		'judul' => $row->judul,
    		'text' => $row->text,
    		'date' => $row->date,
	    );

        $data['title'] = 'Pengumuman';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();    
        $data['page'] = 'pengumuman/Pengumuman_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('pengumuman'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('pengumuman/create_action'),
    	    'id_pengumuman' => set_value('id_pengumuman'),
    	    'type' => set_value('type'),
    	    'judul' => set_value('judul'),
    	    'text' => set_value('text'),
    	    'date' => set_value('date'),
    	);

        $data['title'] = 'Pengumuman';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'pengumuman/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();            
        $data['page'] = 'pengumuman/Pengumuman_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'type' => $this->input->post('type',TRUE),
        		'judul' => $this->input->post('judul',TRUE),
        		'text' => $this->input->post('text',TRUE),
        		// 'date' => date('Y-m-d H:i:s'),
    	    );
            $this->Pengumuman_model->insert($data);
            $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
            helper_log("add", "Menambah data pengumuman ".$data['type']);             
            redirect(site_url('pengumuman'));}
    }

    public function update($id)
    {
        $row = $this->Pengumuman_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('pengumuman/update_action'),
        		'id_pengumuman' => set_value('id_pengumuman', $row->id_pengumuman),
        		'type' => set_value('type', $row->type),
        		'judul' => set_value('judul', $row->judul),
        		'text' => set_value('text', $row->text),
        		'date' => set_value('date', $row->date),
    	    );
        
        $data['title'] = 'Pengumuman';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'pengumuman/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();            
        $data['page'] = 'pengumuman/Pengumuman_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('pengumuman'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pengumuman', TRUE));
        } else {
            $data = array(
        		'type' => $this->input->post('type',TRUE),
        		'judul' => $this->input->post('judul',TRUE),
        		'text' => $this->input->post('text',TRUE),
        		// 'date' => date('Y-m-d H:i:s'),
    	    );
            $this->Pengumuman_model->update($this->input->post('id_pengumuman', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Berhasil diubah');
            helper_log("edit", "Update data pengumuman ".$data['type']); 
            redirect(site_url('pengumuman'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pengumuman_model->get_by_id($id);

        if ($row) {
            $this->Pengumuman_model->delete($id);
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus data pengumuman ".$row->type);             
            redirect(site_url('pengumuman'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('pengumuman'));
        }
    }

    public function deletebulk(){
        $delete = $this->Pengumuman_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus multi data pengumuman");             
        }else{
            $this->session->set_flashdata('message_error', 'Data Gagal dihapus');
        }
        echo $delete;
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('type', 'type', 'trim|required');
    	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
    	$this->form_validation->set_rules('text', 'text', 'trim|required');
    	$this->form_validation->set_rules('date', 'date', 'trim');

    	$this->form_validation->set_rules('id_pengumuman', 'id_pengumuman', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pengumuman.xls";
        $judul = "pengumuman";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Type");
    	xlsWriteLabel($tablehead, $kolomhead++, "Judul");
    	// xlsWriteLabel($tablehead, $kolomhead++, "Informasi Pengumuman");
    	xlsWriteLabel($tablehead, $kolomhead++, "Date");

	foreach ($this->Pengumuman_model->get_all() as $data) {
        $kolombody = 0;

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->type);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul);
	    // xlsWriteLabel($tablebody, $kolombody++, $data->text);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date);

	    $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pengumuman.doc");

        $data = array(
            'pengumuman_data' => $this->Pengumuman_model->get_all(),
            'start' => 0
        );
        $this->load->view('pengumuman/Pengumuman_doc',$data);
    }

    public function printdoc(){
        $data = array(
            'pengumuman_data' => $this->Pengumuman_model->get_all(),
            'start' => 0
        );
        $this->load->view('pengumuman/Pengumuman_print', $data);
    }

}

/* End of file Pengumuman.php */