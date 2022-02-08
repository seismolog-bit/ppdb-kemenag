<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prestasipeserta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Prestasipeserta_model');
        $this->load->model('Pengaturan_model'); 
        $this->load->model('Peserta_model');
        $this->load->model('Prestasi_model');
        $this->load->model('Tahunpelajaran_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Prestasi Peserta';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Prestasipeserta' => '',
        ];

        $data['code_js'] = 'prestasipeserta/codejs';  
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();          
        $data['peserta'] =$this->Peserta_model->get_all();  
        $data['prestasi'] =$this->Prestasi_model->get_all();         

        $data['page'] = 'prestasipeserta/Prestasipeserta_list';
        $this->load->view('template/backend', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Prestasipeserta_model->json();
    }

    public function read($id)
    {
        $row = $this->Prestasipeserta_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_prestasipeserta' => $row->id_prestasipeserta,
                'no_pendaftaran' => $row->no_pendaftaran,
                'nama_peserta' => $row->nama_peserta,
        		'jenis' => $row->jenis,
        		'nama_prestasi' => $row->nama_prestasi,
        		'tahun' => $row->tahun,
        		'penyelenggara' => $row->penyelenggara,
        		'tingkat' => $row->tingkat,
        		'kategori' => $row->kategori,
                'juara' => $row->juara,
                'skor_prestasi' => $row->skor_prestasi,                
        	);

        $data['title'] = 'Prestasi Peserta';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];  

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();  
        $data['page'] = 'prestasipeserta/Prestasipeserta_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('prestasipeserta'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('prestasipeserta/create_action'),
    	    'id_prestasipeserta' => set_value('id_prestasipeserta'),
    	    'jenis' => set_value('jenis'),
    	    'nama_prestasi' => set_value('nama_prestasi'),
    	    'tahun' => set_value('tahun'),
    	    'penyelenggara' => set_value('penyelenggara'),
    	    'id_peserta' => set_value('id_peserta'),
    	    'id_prestasi' => set_value('id_prestasi'),
    	);

        $data['title'] = 'Prestasi Peserta';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'prestasipeserta/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();          
        $data['peserta'] =$this->Peserta_model->get_all();  
        $data['prestasi'] =$this->Prestasi_model->get_all();       

        $data['page'] = 'prestasipeserta/Prestasipeserta_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'jenis' => $this->input->post('jenis',TRUE),
        		'nama_prestasi' => $this->input->post('nama_prestasi',TRUE),
        		'tahun' => $this->input->post('tahun',TRUE),
        		'penyelenggara' => $this->input->post('penyelenggara',TRUE),
        		'id_peserta' => $this->input->post('id_peserta',TRUE),
        		'id_prestasi' => $this->input->post('id_prestasi',TRUE),
        	);
            $this->Prestasipeserta_model->insert($data);
            $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
            helper_log("add", "Menambah data prestasi ".$data['jenis']);            
            redirect(site_url('prestasipeserta'));}
    }

    public function update($id)
    {
        $row = $this->Prestasipeserta_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('prestasipeserta/update_action'),
        		'id_prestasipeserta' => set_value('id_prestasipeserta', $row->id_prestasipeserta),
        		'jenis' => set_value('jenis', $row->jenis),
        		'nama_prestasi' => set_value('nama_prestasi', $row->nama_prestasi),
        		'tahun' => set_value('tahun', $row->tahun),
        		'penyelenggara' => set_value('penyelenggara', $row->penyelenggara),
        		'id_peserta' => set_value('id_peserta', $row->id_peserta),
        		'id_prestasi' => set_value('id_prestasi', $row->id_prestasi),
    	    );
        
        $data['title'] = 'Prestasi Peserta';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'prestasipeserta/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();          
        $data['peserta'] =$this->Peserta_model->get_all();  
        $data['prestasi'] =$this->Prestasi_model->get_all();  
        $data['prestasipeserta'] =$this->Prestasipeserta_model->get_by_id($id);        

        $data['page'] = 'prestasipeserta/Prestasipeserta_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('prestasipeserta'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_prestasipeserta', TRUE));
        } else {
            $data = array(
        		'jenis' => $this->input->post('jenis',TRUE),
        		'nama_prestasi' => $this->input->post('nama_prestasi',TRUE),
        		'tahun' => $this->input->post('tahun',TRUE),
        		'penyelenggara' => $this->input->post('penyelenggara',TRUE),
        		'id_peserta' => $this->input->post('id_peserta',TRUE),
        		'id_prestasi' => $this->input->post('id_prestasi',TRUE),
    	    );
            $this->Prestasipeserta_model->update($this->input->post('id_prestasipeserta', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Berhasil diubah');
            helper_log("edit", "Update data prestasi ".$data['jenis']);             
            redirect(site_url('prestasipeserta'));
        }
    }

    public function delete($id)
    {
        $row = $this->Prestasipeserta_model->get_by_id($id);

        if ($row) {
            $this->Prestasipeserta_model->delete($id);
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus data prestasi ".$row->nama_peserta);             
            redirect(site_url('prestasipeserta'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('prestasipeserta'));
        }
    }

    public function deletebulk() {
        $delete = $this->Prestasipeserta_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus multi data prestasi");             
        }else{
            $this->session->set_flashdata('message_error', 'Data Gagal dihapus');
        }
        echo $delete;
    }

    public function _rules()
    {
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
	$this->form_validation->set_rules('nama_prestasi', 'nama prestasi', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required|numeric|exact_length[4]');
	$this->form_validation->set_rules('penyelenggara', 'penyelenggara', 'trim|required');
	$this->form_validation->set_rules('id_peserta', 'id peserta', 'trim|required');
	$this->form_validation->set_rules('id_prestasi', 'id prestasi', 'trim|required');

	$this->form_validation->set_rules('id_prestasipeserta', 'id_prestasipeserta', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "prestasipeserta.xls";
        $judul = "prestasipeserta";
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
        xlsWriteLabel($tablehead, $kolomhead++, "No Pendaftaran");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Peserta");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama Prestasi");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
    	xlsWriteLabel($tablehead, $kolomhead++, "Penyelenggara");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tingkat");
    	xlsWriteLabel($tablehead, $kolomhead++, "Kategori");
        xlsWriteLabel($tablehead, $kolomhead++, "Peringkat");
        xlsWriteLabel($tablehead, $kolomhead++, "Poin");        

	foreach ($this->Prestasipeserta_model->get_all() as $data) {
        $kolombody = 0;

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteNumber($tablebody, $kolombody++, $data->no_pendaftaran);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_peserta);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_prestasi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tahun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penyelenggara);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tingkat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kategori);
        xlsWriteNumber($tablebody, $kolombody++, $data->juara);
        xlsWriteNumber($tablebody, $kolombody++, $data->skor_prestasi);        

	    $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=prestasipeserta.doc");

        $data = array(
            'prestasipeserta_data' => $this->Prestasipeserta_model->get_all(),
            'start' => 0
        );
        $this->load->view('prestasipeserta/Prestasipeserta_doc',$data);
    }

    public function printdoc() {
        $data = array(
            'prestasipeserta_data' => $this->Prestasipeserta_model->get_all(),
            'start' => 0
        );
        $this->load->view('prestasipeserta/Prestasipeserta_print', $data);
    }

}

/* End of file Prestasipeserta.php */