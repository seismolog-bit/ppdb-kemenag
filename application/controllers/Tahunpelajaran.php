<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tahunpelajaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Tahunpelajaran_model');
        $this->load->model('Pengaturan_model');  
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('tahunpelajaran/create_action'),
            'id_tahun' => set_value('id_tahun'),
            'tahun_pelajaran' => set_value('tahun_pelajaran'),
            'kuota' => set_value('kuota'),
            'tanggal_mulai_pendaftaran' => set_value('tanggal_mulai_pendaftaran'),
            'tanggal_selesai_pendaftaran' => set_value('tanggal_selesai_pendaftaran'),
            'tanggal_mulai_seleksi' => set_value('tanggal_mulai_seleksi'),
            'tanggal_selesai_seleksi' => set_value('tanggal_selesai_seleksi'),
            'tanggal_pengumuman' => set_value('tanggal_pengumuman'),
            'tanggal_mulai_daftar_ulang' => set_value('tanggal_mulai_daftar_ulang'),
            'tanggal_selesai_daftar_ulang' => set_value('tanggal_selesai_daftar_ulang'),
            'status_tahun' => set_value('status_tahun'),
        );

        $data['title'] = 'Tahun Pelajaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Tahunpelajaran' => '',
        ];
        
        $data['code_js'] = 'tahunpelajaran/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'tahunpelajaran/Tahunpelajaran_list';
        $this->load->view('template/backend', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Tahunpelajaran_model->json();
    }

    public function read($id)
    {
        $row = $this->Tahunpelajaran_model->get_by_id($id);
        if ($row) {
        $data = array(
    		'id_tahun' => $row->id_tahun,
    		'tahun_pelajaran' => $row->tahun_pelajaran,
    		'kuota' => $row->kuota,
    		'tanggal_mulai_pendaftaran' => $row->tanggal_mulai_pendaftaran,
    		'tanggal_selesai_pendaftaran' => $row->tanggal_selesai_pendaftaran,
    		'tanggal_mulai_seleksi' => $row->tanggal_mulai_seleksi,
    		'tanggal_selesai_seleksi' => $row->tanggal_selesai_seleksi,
    		'tanggal_pengumuman' => $row->tanggal_pengumuman,
    		'tanggal_mulai_daftar_ulang' => $row->tanggal_mulai_daftar_ulang,
    		'tanggal_selesai_daftar_ulang' => $row->tanggal_selesai_daftar_ulang,
    		'status_tahun' => $row->status_tahun,
	    );

        $data['title'] = 'Tahun Pelajaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'tahunpelajaran/Tahunpelajaran_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('tahunpelajaran'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('tahunpelajaran/create_action'),
    	    'id_tahun' => set_value('id_tahun'),
    	    'tahun_pelajaran' => set_value('tahun_pelajaran'),
    	    'kuota' => set_value('kuota'),
    	    'tanggal_mulai_pendaftaran' => set_value('tanggal_mulai_pendaftaran'),
    	    'tanggal_selesai_pendaftaran' => set_value('tanggal_selesai_pendaftaran'),
    	    'tanggal_mulai_seleksi' => set_value('tanggal_mulai_seleksi'),
    	    'tanggal_selesai_seleksi' => set_value('tanggal_selesai_seleksi'),
    	    'tanggal_pengumuman' => set_value('tanggal_pengumuman'),
    	    'tanggal_mulai_daftar_ulang' => set_value('tanggal_mulai_daftar_ulang'),
    	    'tanggal_selesai_daftar_ulang' => set_value('tanggal_selesai_daftar_ulang'),
    	    'status_tahun' => set_value('status_tahun'),
	    );
        
        $data['title'] = 'Tahun Pelajaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'tahunpelajaran/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'tahunpelajaran/Tahunpelajaran_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
            $this->session->set_flashdata('message', 
                form_error('tahun_pelajaran').
                form_error('kuota').
                form_error('tanggal_mulai_pendaftaran').
                form_error('tanggal_selesai_pendaftaran').
                form_error('tanggal_mulai_seleksi').
                form_error('tanggal_selesai_seleksi').
                form_error('pengumuman').
                form_error('tanggal_mulai_daftar_ulang').
                form_error('tanggal_selesai_daftar_ulang').
                form_error('status_tahun')
            );
            redirect(site_url('tahunpelajaran'));              
        } else {
        $data = array(
    		'tahun_pelajaran' => $this->input->post('tahun_pelajaran',TRUE),
    		'kuota' => $this->input->post('kuota',TRUE),
            'tanggal_mulai_pendaftaran' => date('Y-m-d', strtotime($this->input->post('tanggal_mulai_pendaftaran',TRUE))),
            'tanggal_selesai_pendaftaran' => date('Y-m-d', strtotime($this->input->post('tanggal_selesai_pendaftaran',TRUE))),
            'tanggal_mulai_seleksi' => date('Y-m-d', strtotime($this->input->post('tanggal_mulai_seleksi',TRUE))),
            'tanggal_selesai_seleksi' => date('Y-m-d', strtotime($this->input->post('tanggal_selesai_seleksi',TRUE))),
            'tanggal_pengumuman' => date('Y-m-d', strtotime($this->input->post('tanggal_pengumuman',TRUE))),
            'tanggal_mulai_daftar_ulang' => date('Y-m-d', strtotime($this->input->post('tanggal_mulai_daftar_ulang',TRUE))),
            'tanggal_selesai_daftar_ulang' => date('Y-m-d', strtotime($this->input->post('tanggal_selesai_daftar_ulang',TRUE))),
            'status_tahun' => $this->input->post('status_tahun',TRUE),
	    );

        $this->Tahunpelajaran_model->insert($data);
        $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
        helper_log("add", "Menambah data tahun pelajaran ".$data['tahun_pelajaran']);         
        redirect(site_url('tahunpelajaran'));
        }
    }

    public function update($id)
    {
        $row = $this->Tahunpelajaran_model->get_by_id($id);

        if ($row) {
        $data = array(
            'button' => 'Ubah',
            'action' => site_url('tahunpelajaran/update_action'),
            'id_tahun' => set_value('id_tahun', $row->id_tahun),
            'tahun_pelajaran' => set_value('tahun_pelajaran', $row->tahun_pelajaran),
            'kuota' => set_value('kuota', $row->kuota),
            'tanggal_mulai_pendaftaran' => set_value('tanggal_mulai_pendaftaran', $row->tanggal_mulai_pendaftaran),
            'tanggal_selesai_pendaftaran' => set_value('tanggal_selesai_pendaftaran', $row->tanggal_selesai_pendaftaran),
            'tanggal_mulai_seleksi' => set_value('tanggal_mulai_seleksi', $row->tanggal_mulai_seleksi),
            'tanggal_selesai_seleksi' => set_value('tanggal_selesai_seleksi', $row->tanggal_selesai_seleksi),
            'tanggal_pengumuman' => set_value('tanggal_pengumuman', $row->tanggal_pengumuman),
            'tanggal_mulai_daftar_ulang' => set_value('tanggal_mulai_daftar_ulang', $row->tanggal_mulai_daftar_ulang),
            'tanggal_selesai_daftar_ulang' => set_value('tanggal_selesai_daftar_ulang', $row->tanggal_selesai_daftar_ulang),
            'status_tahun' => set_value('status_tahun', $row->status_tahun),
        );
            
        $data['title'] = 'Tahun Pelajaran';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['code_js'] = 'tahunpelajaran/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'tahunpelajaran/Tahunpelajaran_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('tahunpelajaran'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tahun', TRUE));
        } else {
        $data = array(
    		'tahun_pelajaran' => $this->input->post('tahun_pelajaran',TRUE),
    		'kuota' => $this->input->post('kuota',TRUE),
            'tanggal_mulai_pendaftaran' => date('Y-m-d', strtotime($this->input->post('tanggal_mulai_pendaftaran',TRUE))),
            'tanggal_selesai_pendaftaran' => date('Y-m-d', strtotime($this->input->post('tanggal_selesai_pendaftaran',TRUE))),
            'tanggal_mulai_seleksi' => date('Y-m-d', strtotime($this->input->post('tanggal_mulai_seleksi',TRUE))),
            'tanggal_selesai_seleksi' => date('Y-m-d', strtotime($this->input->post('tanggal_selesai_seleksi',TRUE))),
            'tanggal_pengumuman' => date('Y-m-d', strtotime($this->input->post('tanggal_pengumuman',TRUE))),
            'tanggal_mulai_daftar_ulang' => date('Y-m-d', strtotime($this->input->post('tanggal_mulai_daftar_ulang',TRUE))),
            'tanggal_selesai_daftar_ulang' => date('Y-m-d', strtotime($this->input->post('tanggal_selesai_daftar_ulang',TRUE))),
            'status_tahun' => $this->input->post('status_tahun',TRUE),
	    );

            $this->Tahunpelajaran_model->update($this->input->post('id_tahun', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Berhasil diubah');
            helper_log("edit", "Update data tahun pelajaran ".$data['tahun_pelajaran']);             
            redirect(site_url('tahunpelajaran'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tahunpelajaran_model->get_by_id($id);

        if ($row) {
            $this->Tahunpelajaran_model->delete($id);
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus data tahun pelajaran ".$row->tahun_pelajaran);             
            redirect(site_url('tahunpelajaran'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('tahunpelajaran'));
        }
    }

    public function deletebulk(){
        $delete = $this->Tahunpelajaran_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus multi data tahun pelajaran");             
        }else{
            $this->session->set_flashdata('message_error', 'Data Gagal dihapus');
        }
        echo $delete;
    }

    public function _rules()
    {
	$this->form_validation->set_rules('tahun_pelajaran', 'tahun pelajaran', 'trim|required|numeric|exact_length[4]',
        array(
                'required'      => 'Tahun Pelajaran tidak boleh kosong ',
                'numeric'       => 'Tahun Pelajaran hanya angka ',
                'exact_length[4]' => 'Tahun Pelajaran '
        ));
	$this->form_validation->set_rules('kuota', 'kuota', 'trim|required|numeric',
        array(
                'required'      => 'Kuota tidak boleh kosong ',
                'numeric'       => 'Kuota hanya angka '
        ));
	$this->form_validation->set_rules('tanggal_mulai_pendaftaran', 'tanggal mulai pendaftaran', 'trim|required',
        array(
                'required'      => 'Mulai Pendafataran tidak boleh kosong '
        ));
	$this->form_validation->set_rules('tanggal_selesai_pendaftaran', 'tanggal selesai pendaftaran', 'trim|required',
        array(
                'required'      => 'Selesai Pendafataran tidak boleh kosong '
        ));
	$this->form_validation->set_rules('tanggal_mulai_seleksi', 'tanggal mulai seleksi', 'trim|required',
        array(
                'required'      => 'Mulai Seleksi tidak boleh kosong '
        ));
	$this->form_validation->set_rules('tanggal_selesai_seleksi', 'tanggal selesai seleksi', 'trim|required',
        array(
                'required'      => 'Selesai tidak boleh kosong '
        ));
	$this->form_validation->set_rules('tanggal_pengumuman', 'tanggal pengumuman', 'trim|required',
        array(
                'required'      => 'Tanggal Pengumuman tidak boleh kosong '
        ));
	$this->form_validation->set_rules('tanggal_mulai_daftar_ulang', 'tanggal mulai daftar ulang', 'trim|required',
        array(
                'required'      => 'Mulai Daftar Ulang tidak boleh kosong '
        ));
	$this->form_validation->set_rules('tanggal_selesai_daftar_ulang', 'tanggal selesai daftar ulang', 'trim|required',
        array(
                'required'      => 'Selesai Daftar Ulang tidak boleh kosong '
        ));
	$this->form_validation->set_rules('status_tahun', 'status tahun', 'trim|required',
        array(
                'required'      => 'Status Tahun tidak boleh kosong '
        ));

	$this->form_validation->set_rules('id_tahun', 'id_tahun', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tahunpelajaran.xls";
        $judul = "tahunpelajaran";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Tahun Pelajaran");
    	xlsWriteLabel($tablehead, $kolomhead++, "Kuota");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Mulai Pendaftaran");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Selesai Pendaftaran");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Mulai Seleksi");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Selesai Seleksi");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Pengumuman");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Mulai Daftar Ulang");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Selesai Daftar Ulang");
    	xlsWriteLabel($tablehead, $kolomhead++, "Status Tahun");

	foreach ($this->Tahunpelajaran_model->get_all() as $data) {
        $kolombody = 0;

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun_pelajaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kuota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_mulai_pendaftaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_selesai_pendaftaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_mulai_seleksi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_selesai_seleksi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_pengumuman);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_mulai_daftar_ulang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_selesai_daftar_ulang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_tahun);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tahunpelajaran.doc");

        $data = array(
            'tahunpelajaran_data' => $this->Tahunpelajaran_model->get_all(),
            'start' => 0
        );
        $this->load->view('tahunpelajaran/Tahunpelajaran_doc',$data);
    }

    public function printdoc(){
        $data = array(
            'tahunpelajaran_data' => $this->Tahunpelajaran_model->get_all(),
            'start' => 0
        );
        $this->load->view('tahunpelajaran/Tahunpelajaran_print', $data);
    }
}

/* End of file Tahunpelajaran.php */