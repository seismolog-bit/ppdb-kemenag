<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jalur extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Jalur_model');
        $this->load->model('Pengaturan_model'); 
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('jalur/create_action'),
            'id_jalur' => set_value('id_jalur'),
            'jalur' => set_value('jalur'),
            'persentase' => set_value('persentase'),
            'status_jalur' => set_value('status_jalur'),
        );

        $data['title'] = 'Jalur';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Jalur' => '',
        ];

        $data['code_js'] = 'jalur/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();         
        $data['page'] = 'jalur/Jalur_list';
        $this->load->view('template/backend', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Jalur_model->json();
    }

    public function read($id)
    {
        $row = $this->Jalur_model->get_by_id($id);
        if ($row) {
        $data = array(
    		'id_jalur' => $row->id_jalur,
    		'jalur' => $row->jalur,
    		'persentase' => $row->persentase,
            'status_jalur' => $row->status_jalur,
	    );

        $data['title'] = 'Jalur';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'jalur/Jalur_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('jalur'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('jalur/create_action'),
    	    'id_jalur' => set_value('id_jalur'),
    	    'jalur' => set_value('jalur'),
    	    'persentase' => set_value('persentase'),
            'status_jalur' => set_value('status_jalur'),
	    );

        $data['title'] = 'Jalur';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'jalur/Jalur_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            // $this->create();
            $this->session->set_flashdata('message', 
                form_error('jalur').
                form_error('persentase').
                form_error('status_jalur')
            );
            redirect(site_url('jalur'));            
        } else {
        $data = array(
    		'jalur' => $this->input->post('jalur',TRUE),
    		'persentase' => $this->input->post('persentase',TRUE),
            'status_jalur' => $this->input->post('status_jalur',TRUE),
	    );

        $this->Jalur_model->insert($data);
        $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
        helper_log("add", "Menambah data jalur ".$data['jalur']); 
        redirect(site_url('jalur'));
        }
    }

    public function update($id)
    {
        $row = $this->Jalur_model->get_by_id($id);

        if ($row) {
        $data = array(
            'button' => 'Ubah',
            'action' => site_url('jalur/update_action'),
    		'id_jalur' => set_value('id_jalur', $row->id_jalur),
    		'jalur' => set_value('jalur', $row->jalur),
    		'persentase' => set_value('persentase', $row->persentase),
            'status_jalur' => set_value('persentase', $row->status_jalur),
	    );

        $data['title'] = 'Jalur';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'jalur/Jalur_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('jalur'));
        }
    }

    public function update_action()
    {
        // $this->_rules();
        $this->form_validation->set_rules('jalur', 'jalur', 'trim|required',
            array(
                    'required'      => 'Jalur Pendaftaran tidak boleh kosong '          
            ));
        $this->form_validation->set_rules('persentase', 'persentase', 'trim|required|numeric',
            array(
                    'required'      => 'Persentase tidak boleh kosong ',
                    'numeric'       => 'Persentase hanya angka '
            ));
        $this->form_validation->set_rules('status_jalur', 'status jalur', 'trim|required',
            array(
                    'required'      => 'Status Jalur tidak boleh kosong '          
            ));

        $this->form_validation->set_rules('id_jalur', 'id_jalur', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');  

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jalur', TRUE));
        } else {
        $data = array(
    		'jalur' => $this->input->post('jalur',TRUE),
    		'persentase' => $this->input->post('persentase',TRUE),
            'status_jalur' => $this->input->post('status_jalur',TRUE),
	    );

        $this->Jalur_model->update($this->input->post('id_jalur', TRUE), $data);
        $this->session->set_flashdata('message', 'Data Berhasil diubah');
        helper_log("edit", "Update data jalur ".$data['jalur']);         
        redirect(site_url('jalur'));
        }
    }

    public function delete($id)
    {
        $row = $this->Jalur_model->get_by_id($id);

        if ($row->id_jalur=='1' or $row->id_jalur=='2' or $row->id_jalur=='3' or $row->id_jalur=='4') {
            $this->session->set_flashdata('message', 'Data Gagal dihapus');
            redirect(site_url('jalur'));
        } else {   
            $this->Jalur_model->delete($id);
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus data jalur ".$row->jalur);             
            redirect(site_url('jalur'));
        }
    }

    public function deletebulk(){
        $delete = $this->Jalur_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus multi data jalur pendaftaran");             
        }else{
            $this->session->set_flashdata('message_error', 'Data Gagal dihapus');
        }
        echo $delete;
    }

    public function _rules()
    {
	$this->form_validation->set_rules('jalur', 'jalur', 'trim|required|is_unique[jalur.jalur]',
        array(
                'required'      => 'Jalur Pendaftaran tidak boleh kosong ',
                'is_unique'     => 'Jalur Pendaftaran sudah ada '                
        ));
	$this->form_validation->set_rules('persentase', 'persentase', 'trim|required|numeric',
        array(
                'required'      => 'Persentase tidak boleh kosong ',
                'numeric'       => 'Persentase hanya angka '
        ));
    $this->form_validation->set_rules('status_jalur', 'status jalur', 'trim|required',
        array(
                'required'      => 'Status Jalur tidak boleh kosong '          
        ));

	$this->form_validation->set_rules('id_jalur', 'id_jalur', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jalur.xls";
        $judul = "jalur";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Jalur");
    	xlsWriteLabel($tablehead, $kolomhead++, "Persentase");
        xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Jalur_model->get_all() as $data) {
        $kolombody = 0;

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jalur);
	    xlsWriteNumber($tablebody, $kolombody++, $data->persentase);
        xlsWriteLabel($tablebody, $kolombody++, $data->status_jalur);

	    $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jalur.doc");

        $data = array(
            'jalur_data' => $this->Jalur_model->get_all(),
            'start' => 0
        );
        $this->load->view('jalur/Jalur_doc',$data);
    }

    public function printdoc(){
        $data = array(
            'jalur_data' => $this->Jalur_model->get_all(),
            'start' => 0
        );
        $this->load->view('jalur/Jalur_print', $data);
    }
}

/* End of file Jalur.php */