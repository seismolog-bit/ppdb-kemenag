<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bobot extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Bobot_model');
        $this->load->model('Pengaturan_model'); 
        $this->load->model('Jalur_model');        
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('bobot/create_action'),
            'id_bobot' => set_value('id_bobot'),
            'id_jalur' => set_value('id_jalur'),
            'jalur' => set_value('jalur'),
            'bobot_jarak' => set_value('bobot_jarak'),
            'bobot_nilai' => set_value('bobot_nilai'),
            'bobot_prestasi' => set_value('bobot_prestasi'),
        );

        $data['title'] = 'Bobot';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Bobot' => '',
        ];
        
        $data['code_js'] = 'bobot/codejs';
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();           
        $data['jalur'] =$this->Jalur_model->get_all();
        $data['page'] = 'bobot/Bobot_list';
        $this->load->view('template/backend', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Bobot_model->json();
    }

    public function read($id)
    {
        $row = $this->Bobot_model->get_by_id($id);
        if ($row) {
        $data = array(
        	'id_bobot' => $row->id_bobot,
        	'id_jalur' => $row->id_jalur,
            'jalur' => $row->jalur,
        	'bobot_jarak' => $row->bobot_jarak,
        	'bobot_nilai' => $row->bobot_nilai,
        	'bobot_prestasi' => $row->bobot_prestasi,
        );

        $data['title'] = 'Bobot';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();   
        $data['page'] = 'bobot/Bobot_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('bobot'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('bobot/create_action'),
    	    'id_bobot' => set_value('id_bobot'),
    	    'id_jalur' => set_value('id_jalur'),
    	    'bobot_jarak' => set_value('bobot_jarak'),
    	    'bobot_nilai' => set_value('bobot_nilai'),
    	    'bobot_prestasi' => set_value('bobot_prestasi'),
    	);

        $data['title'] = 'Bobot';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();   
        $data['jalur'] =$this->Jalur_model->get_all();
        $data['page'] = 'bobot/Bobot_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            // $this->create();
            $this->session->set_flashdata('message', 
                form_error('id_jalur').
                form_error('bobot_jarak').
                form_error('bobot_nilai').
                form_error('bobot_prestasi')
            );
            redirect(site_url('bobot'));      
        } else {
            $data = array(
        		'id_jalur' => $this->input->post('id_jalur',TRUE),
        		'bobot_jarak' => $this->input->post('bobot_jarak',TRUE),
        		'bobot_nilai' => $this->input->post('bobot_nilai',TRUE),
        		'bobot_prestasi' => $this->input->post('bobot_prestasi',TRUE),
        	    );

            $this->Bobot_model->insert($data);
            $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
            helper_log("add", "Menambah data bobot jalur pendaftaran"); 
            redirect(site_url('bobot'));}
    }

    public function update($id)
    {
        $row = $this->Bobot_model->get_by_id($id);

        if ($row) {
        $data = array(
            'button' => 'Ubah',
            'action' => site_url('bobot/update_action'),
        	'id_bobot' => set_value('id_bobot', $row->id_bobot),
        	'id_jalur' => set_value('id_jalur', $row->id_jalur),
            'jalur' => set_value('jalur', $row->jalur),
        	'bobot_jarak' => set_value('bobot_jarak', $row->bobot_jarak),
        	'bobot_nilai' => set_value('bobot_nilai', $row->bobot_nilai),
        	'bobot_prestasi' => set_value('bobot_prestasi', $row->bobot_prestasi),
        );
        
        $data['title'] = 'Bobot';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        
        $data['pengaturan']=$this->Pengaturan_model->get_by_id_1();   
        $data['page'] = 'bobot/Bobot_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('bobot'));
        }
    }

    public function update_action()
    {
        // $this->_rules();
        $this->form_validation->set_rules('bobot_jarak', 'bobot jarak', 'trim|required|numeric',
            array(
                    'required'      => 'Bobot Jarak tidak boleh kosong ',
                    'numeric'       => 'Bobot Jarak hanya angka '
            ));
        $this->form_validation->set_rules('bobot_nilai', 'bobot nilai', 'trim|required|numeric',
            array(
                    'required'      => 'Bobot Nilai tidak boleh kosong ',
                    'numeric'       => 'Bobot Nilai hanya angka '
            ));
        $this->form_validation->set_rules('bobot_prestasi', 'bobot prestasi', 'trim|required|numeric',
            array(
                    'required'      => 'Bobot Prestasi tidak boleh kosong ',
                    'numeric'       => 'Bobot Prestasi hanya angka '
            ));

        $this->form_validation->set_rules('id_bobot', 'id_bobot', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');        

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_bobot', TRUE));
        } else {
            $data = array(
        		// 'id_jalur' => $this->input->post('id_jalur',TRUE),
        		'bobot_jarak' => $this->input->post('bobot_jarak',TRUE),
        		'bobot_nilai' => $this->input->post('bobot_nilai',TRUE),
        		'bobot_prestasi' => $this->input->post('bobot_prestasi',TRUE),
        	    );
            
            $this->Bobot_model->update($this->input->post('id_bobot', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Berhasil diubah');
            helper_log("edit", "Update data bobot jalur pendaftaran");             
            redirect(site_url('bobot'));
        }
    }

    public function delete($id)
    {
        $row = $this->Bobot_model->get_by_id($id);

        if ($row->id_bobot=='1' or $row->id_bobot=='2' or $row->id_bobot=='3' or $row->id_bobot=='4') {
            $this->session->set_flashdata('message', 'Data Gagal dihapus');
            redirect(site_url('bobot'));
        } else {   
            $this->Bobot_model->delete($id);
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Menghapus data bobot jalur ".$row->jalur);             
            redirect(site_url('bobot'));
        }
    }

    public function deletebulk(){
        $delete = $this->Bobot_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Data Berhasil dihapus');
            helper_log("delete", "Hapus multi data bobot jalur pendaftaran");            
        }else{
            $this->session->set_flashdata('message_error', 'Data Gagal dihapus');
        }
        echo $delete;
    }

    public function _rules()
    {
    $this->form_validation->set_rules('id_jalur', 'id jalur', 'trim|required|is_unique[bobot.id_jalur]',
        array(
                'required'      => 'Jalur Pendaftaran tidak boleh kosong ',
                'is_unique'     => 'Jalur Pendaftaran sudah ada '
        ));
    $this->form_validation->set_rules('bobot_jarak', 'bobot jarak', 'trim|required|numeric',
        array(
                'required'      => 'Bobot Jarak tidak boleh kosong ',
                'numeric'       => 'Bobot Jarak hanya angka '
        ));
    $this->form_validation->set_rules('bobot_nilai', 'bobot nilai', 'trim|required|numeric',
        array(
                'required'      => 'Bobot Nilai tidak boleh kosong ',
                'numeric'       => 'Bobot Nilai hanya angka '
        ));
    $this->form_validation->set_rules('bobot_prestasi', 'bobot prestasi', 'trim|required|numeric',
        array(
                'required'      => 'Bobot Prestasi tidak boleh kosong ',
                'numeric'       => 'Bobot Prestasi hanya angka '
        ));

	$this->form_validation->set_rules('id_bobot', 'id_bobot', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "bobot.xls";
        $judul = "bobot";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Bobot Jarak");
    	xlsWriteLabel($tablehead, $kolomhead++, "Bobot Nilai");
    	xlsWriteLabel($tablehead, $kolomhead++, "Bobot Prestasi");

	foreach ($this->Bobot_model->get_all() as $data) {
        $kolombody = 0;

        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jalur);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bobot_jarak);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bobot_nilai);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bobot_prestasi);

	    $tablebody++;
        $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=bobot.doc");

        $data = array(
            'bobot_data' => $this->Bobot_model->get_all(),
            'start' => 0
        );
        $this->load->view('bobot/Bobot_doc',$data);
    }

    public function printdoc(){
        $data = array(
            'bobot_data' => $this->Bobot_model->get_all(),
            'start' => 0
        );
        $this->load->view('bobot/Bobot_print', $data);
    }

}

/* End of file Bobot.php */