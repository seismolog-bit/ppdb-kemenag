<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jarak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Jarak_model');
        $this->load->model('Pengaturan_model'); 
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('jarak/create_action'),
            'id_jarak' => set_value('id_jarak'),
            'jarak' => set_value('jarak'),
            'skor_jarak' => set_value('skor_jarak'),
        );

        $data['title'] = 'Jarak';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Jarak' => '',
        ];

        $data['code_js'] = 'jarak/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();          
        $data['page'] = 'jarak/Jarak_list';
        $this->load->view('template/backend', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Jarak_model->json();
    }

    public function read($id)
    {
        $row = $this->Jarak_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_jarak' => $row->id_jarak,
        		'jarak' => $row->jarak,
        		'skor_jarak' => $row->skor_jarak,
	       );

        $data['title'] = 'Jarak';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();  
        $data['page'] = 'jarak/Jarak_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('jarak'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('jarak/create_action'),
    	    'id_jarak' => set_value('id_jarak'),
    	    'jarak' => set_value('jarak'),
    	    'skor_jarak' => set_value('skor_jarak'),
    	);

        $data['title'] = 'Jarak';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();  
        $data['page'] = 'jarak/Jarak_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            // $this->create();
            $this->session->set_flashdata('message', 
                form_error('jarak').
                form_error('skor_jarak')
            );
            redirect(site_url('jarak'));               
        } else {
            $data = array(
        		'jarak' => $this->input->post('jarak',TRUE),
        		'skor_jarak' => $this->input->post('skor_jarak',TRUE),
	        );

            $this->Jarak_model->insert($data);
            $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
            helper_log("add", "Menambah data jarak ".$data['jarak']);             
            redirect(site_url('jarak'));
        }
    }

    public function update($id)
    {
        $row = $this->Jarak_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('jarak/update_action'),
        		'id_jarak' => set_value('id_jarak', $row->id_jarak),
        		'jarak' => set_value('jarak', $row->jarak),
        		'skor_jarak' => set_value('skor_jarak', $row->skor_jarak),
	       );
        
        $data['title'] = 'Jarak';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();  
        $data['page'] = 'jarak/Jarak_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('jarak'));
        }
    }

    public function update_action()
    {
        // $this->_rules();
        $this->form_validation->set_rules('skor_jarak', 'skor jarak', 'trim|required|numeric',
            array(
                    'required'      => 'Poin Jarak tidak boleh kosong ',
                    'numeric'       => 'Poin Jarak hanya angka '
            ));

        $this->form_validation->set_rules('id_jarak', 'id_jarak', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');        

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jarak', TRUE));
        } else {
            $data = array(
    		'jarak' => $this->input->post('jarak',TRUE),
    		'skor_jarak' => $this->input->post('skor_jarak',TRUE),
    	    );

            $this->Jarak_model->update($this->input->post('id_jarak', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Berhasil diubah');
            helper_log("edit", "Update data poin jarak ".$data['jarak']);                
            redirect(site_url('jarak'));
        }
    }

    public function delete($id)
    {
        $row = $this->Jarak_model->get_by_id($id);

        if ($row) {
            $this->Jarak_model->delete($id);
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus data jarak ".$row->jarak);                
            redirect(site_url('jarak'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('jarak'));
        }
    }

    public function deletebulk(){
        $delete = $this->Jarak_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus multi data poin jarak");             
        }else{
            $this->session->set_flashdata('message_error', 'Data Gagal dihapus');
        }
        echo $delete;
    }

    public function _rules()
    {
	$this->form_validation->set_rules('jarak', 'jarak', 'trim|required|is_unique[jarak.jarak]',
        array(
                'required'      => 'Jarak ke sekolah tidak boleh kosong ',
                'is_unique'     => 'Jarak ke sekolah sudah ada '
        ));
	$this->form_validation->set_rules('skor_jarak', 'skor jarak', 'trim|required|numeric',
        array(
                'required'      => 'Poin Jarak tidak boleh kosong ',
                'numeric'       => 'Poin Jarak hanya angka '
        ));

	$this->form_validation->set_rules('id_jarak', 'id_jarak', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jarak.xls";
        $judul = "jarak";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Jarak");
    	xlsWriteLabel($tablehead, $kolomhead++, "Skor Jarak");

	foreach ($this->Jarak_model->get_all() as $data) {
        $kolombody = 0;

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jarak);
	    xlsWriteNumber($tablebody, $kolombody++, $data->skor_jarak);

	    $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jarak.doc");

        $data = array(
            'jarak_data' => $this->Jarak_model->get_all(),
            'start' => 0
        );
        $this->load->view('jarak/Jarak_doc',$data);
    }

    public function printdoc(){
        $data = array(
            'jarak_data' => $this->Jarak_model->get_all(),
            'start' => 0
        );
        $this->load->view('jarak/Jarak_print', $data);
    }

}

/* End of file Jarak.php */