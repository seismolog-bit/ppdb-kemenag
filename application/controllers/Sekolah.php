<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Sekolah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Sekolah_model');
        $this->load->model('Pengaturan_model'); 
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('sekolah/create_action'),
            'id_sekolah' => set_value('id_sekolah'),
            'npsn_sekolah' => set_value('npsn_sekolah'),
            'asal_sekolah' => set_value('asal_sekolah'),
            'alamat_sekolah' => set_value('alamat_sekolah'),
            'kelurahan' => set_value('kelurahan'),
            'status_sekolah' => set_value('status_sekolah'),
            'kecamatan' => set_value('kecamatan'),
        );

        $data['title'] = 'Sekolah';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Sekolah' => '',
        ];
       
        $data['code_js'] = 'sekolah/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'sekolah/Sekolah_list';
        $this->load->view('template/backend', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Sekolah_model->json();
    }

    public function read($id)
    {
        $row = $this->Sekolah_model->get_by_id($id);
        if ($row) {
        $data = array(
    		'id_sekolah' => $row->id_sekolah,
    		'npsn_sekolah' => $row->npsn_sekolah,
    		'asal_sekolah' => $row->asal_sekolah,
    		'alamat_sekolah' => $row->alamat_sekolah,
    		'kelurahan' => $row->kelurahan,
    		'status_sekolah' => $row->status_sekolah,
    		'kecamatan' => $row->kecamatan,
	    );
        
        $data['title'] = 'Sekolah';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'sekolah/Sekolah_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('sekolah'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('sekolah/create_action'),
    	    'id_sekolah' => set_value('id_sekolah'),
    	    'npsn_sekolah' => set_value('npsn_sekolah'),
    	    'asal_sekolah' => set_value('asal_sekolah'),
    	    'alamat_sekolah' => set_value('alamat_sekolah'),
    	    'kelurahan' => set_value('kelurahan'),
    	    'status_sekolah' => set_value('status_sekolah'),
    	    'kecamatan' => set_value('kecamatan'),
	    );
        
        $data['title'] = 'Sekolah';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'sekolah/Sekolah_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            // $this->create();
            $this->session->set_flashdata('message', 
                form_error('npsn_sekolah').
                form_error('asal_sekolah').
                form_error('status_sekolah').
                form_error('kecamatan')
            );
            redirect(site_url('sekolah'));            
        } else {
        $data = array(
    		'npsn_sekolah' => $this->input->post('npsn_sekolah',TRUE),
    		'asal_sekolah' => $this->input->post('asal_sekolah',TRUE),
    		'alamat_sekolah' => $this->input->post('alamat_sekolah',TRUE),
    		'kelurahan' => $this->input->post('kelurahan',TRUE),
    		'status_sekolah' => $this->input->post('status_sekolah',TRUE),
    		'kecamatan' => $this->input->post('kecamatan',TRUE),
	    );
        
        $this->Sekolah_model->insert($data);
        $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
        helper_log("add", "Menambah data sekolah ".$data['asal_sekolah']);         
        redirect(site_url('sekolah'));
        }
    }

    public function update($id)
    {
        $row = $this->Sekolah_model->get_by_id($id);

        if ($row) {
        $data = array(
            'button' => 'Ubah',
            'action' => site_url('sekolah/update_action'),
    		'id_sekolah' => set_value('id_sekolah', $row->id_sekolah),
    		'npsn_sekolah' => set_value('npsn_sekolah', $row->npsn_sekolah),
    		'asal_sekolah' => set_value('asal_sekolah', $row->asal_sekolah),
    		'alamat_sekolah' => set_value('alamat_sekolah', $row->alamat_sekolah),
    		'kelurahan' => set_value('kelurahan', $row->kelurahan),
    		'status_sekolah' => set_value('status_sekolah', $row->status_sekolah),
    		'kecamatan' => set_value('kecamatan', $row->kecamatan),
	    );
        
        $data['title'] = 'Sekolah';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1(); 
        $data['page'] = 'sekolah/Sekolah_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('sekolah'));
        }
    }

    public function update_action()
    {
        // $this->_rules();
        $this->form_validation->set_rules('asal_sekolah', 'asal sekolah', 'trim|required',
        array(
                'required'      => 'Nama Sekolah tidak boleh kosong ',
        ));
        $this->form_validation->set_rules('alamat_sekolah', 'alamat sekolah', 'trim');
        $this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim');
        $this->form_validation->set_rules('status_sekolah', 'status sekolah', 'trim|required',
        array(
                'required'      => 'Status Sekolah tidak boleh kosong ',
        ));
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required',
        array(
                'required'      => 'Nama Kecamatan tidak boleh kosong ',
        ));
        $this->form_validation->set_rules('id_sekolah', 'id_sekolah', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');        

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_sekolah', TRUE));
        } else {
        $data = array(
    		// 'npsn_sekolah' => $this->input->post('npsn_sekolah',TRUE),
    		'asal_sekolah' => $this->input->post('asal_sekolah',TRUE),
    		'alamat_sekolah' => $this->input->post('alamat_sekolah',TRUE),
    		'kelurahan' => $this->input->post('kelurahan',TRUE),
    		'status_sekolah' => $this->input->post('status_sekolah',TRUE),
    		'kecamatan' => $this->input->post('kecamatan',TRUE),
	    );

        $this->Sekolah_model->update($this->input->post('id_sekolah', TRUE), $data);
        $this->session->set_flashdata('message', 'Data Berhasil diubah');
        helper_log("edit", "Update data sekolah ".$data['asal_sekolah']);         
        redirect(site_url('sekolah'));
        }
    }

    public function delete($id)
    {
        $row = $this->Sekolah_model->get_by_id($id);

        if ($row) {
            $this->Sekolah_model->delete($id);
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus data sekolah ".$row->asal_sekolah);             
            redirect(site_url('sekolah'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('sekolah'));
        }
    }

    public function deletebulk(){
        $delete = $this->Sekolah_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus multi data sekolah");             
        }else{
            $this->session->set_flashdata('message_error', 'Data Gagal dihapus');
        }
        echo $delete;
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('npsn_sekolah', 'npsn sekolah', 'trim|required|numeric|exact_length[8]|is_unique[sekolah.npsn_sekolah]',
        array(
                'required'      => 'NPSN Sekolah tidak boleh kosong ',
                'numeric'       => 'NPSN Sekolah hanya angka ',
                'is_unique'     => 'NPSN Sekolah sudah ada '
        ));
    	$this->form_validation->set_rules('asal_sekolah', 'asal sekolah', 'trim|required',
        array(
                'required'      => 'Nama Sekolah tidak boleh kosong ',
        ));
    	$this->form_validation->set_rules('alamat_sekolah', 'alamat sekolah', 'trim');
    	$this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim');
    	$this->form_validation->set_rules('status_sekolah', 'status sekolah', 'trim|required',
        array(
                'required'      => 'Status Sekolah tidak boleh kosong ',
        ));
    	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required',
        array(
                'required'      => 'Nama Kecamatan tidak boleh kosong ',
        ));
    	$this->form_validation->set_rules('id_sekolah', 'id_sekolah', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sekolah.xls";
        $judul = "sekolah";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "NPSN");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama Asal Sekolah");
    	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Sekolah");
    	xlsWriteLabel($tablehead, $kolomhead++, "Kelurahan");
    	xlsWriteLabel($tablehead, $kolomhead++, "Status Sekolah");
    	xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan");

	foreach ($this->Sekolah_model->get_all() as $data) {
        $kolombody = 0;

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npsn_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->asal_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kelurahan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan);

	    $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=sekolah.doc");

        $data = array(
            'sekolah_data' => $this->Sekolah_model->get_all(),
            'start' => 0
        );
        $this->load->view('sekolah/Sekolah_doc',$data);
    }

    public function printdoc(){
        $data = array(
            'sekolah_data' => $this->Sekolah_model->get_all(),
            'start' => 0
        );
        $this->load->view('sekolah/Sekolah_print', $data);
    }

    public function upload()
    {

        $file_mimes = array('text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
         
            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);
         
            if('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
         
            $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
             
            $sheetData = $spreadsheet->getActiveSheet()->toArray();
            for($i = 1;$i < count($sheetData);$i++)
            {
                $npsn_sekolah = $sheetData[$i]['1'];
                $asal_sekolah = $sheetData[$i]['2'];
                $alamat_sekolah = $sheetData[$i]['3'];
                $kelurahan = $sheetData[$i]['4'];
                $status_sekolah = $sheetData[$i]['5'];
                $kecamatan = $sheetData[$i]['6'];

                $this->db->query("insert into sekolah (id_sekolah,npsn_sekolah,asal_sekolah,alamat_sekolah,kelurahan,status_sekolah,kecamatan) values ('','$npsn_sekolah','$asal_sekolah','$alamat_sekolah','$kelurahan','$status_sekolah','$kecamatan')");
            }
                $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
                helper_log("add", "Import data sekolah");                 
                redirect(site_url('sekolah'));
        }
    }

}

/* End of file Sekolah.php */