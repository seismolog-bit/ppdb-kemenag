<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Berkas_model extends CI_Model
{

    public $table = 'berkas';
    public $id = 'id_berkas';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_berkas,nama_berkas,keterangan_berkas,tipe_berkas,ukuran_berkas,peserta.id_peserta,nisn,no_pendaftaran,nama_peserta');
        $this->datatables->from('berkas');
        //add this line for join
        //$this->datatables->join('table2', 'berkas.field = table2.field');
        $this->datatables->join('peserta', 'berkas.id_peserta = peserta.id_peserta');
        $this->datatables->add_column('action', 
            anchor(site_url('berkas/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary btn-flat"  data-toggle="tooltip" title="Detail"')."  ".
            anchor(site_url('berkas/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'berkas/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_berkas');
        return $this->datatables->generate();
    }
   
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all by id peserta
    function get_id($id)
    {
        $this->db->select('id_berkas,nama_berkas,keterangan_berkas,tipe_berkas,ukuran_berkas,peserta.id_peserta,nisn,no_pendaftaran,nama_peserta');
        $this->db->join('peserta', 'berkas.id_peserta = peserta.id_peserta');           
        $this->db->where('peserta.id_peserta', $id);
        return $this->db->get($this->table)->result();
    }

    // get all by id peserta
    function get_berkas($id)
    {
        $this->db->select('id_berkas,nama_berkas,keterangan_berkas,tipe_berkas,ukuran_berkas,peserta.id_peserta,nisn,no_pendaftaran,nama_peserta');
        $this->db->join('peserta', 'berkas.id_peserta = peserta.id_peserta');           
        $this->db->where('peserta.id_peserta', $id);
        $this->db->limit(3);
        return $this->db->get($this->table)->result();
    }    

    // get foto by id peserta
    function get_foto($id_peserta)
    {     
        $this->db->where('id_peserta', $id_peserta);
        $this->db->where('keterangan_berkas', 'Foto 3x4');
        $this->db->limit(1);
        $this->db->order_by($this->id, 'asc');        
        return $this->db->get($this->table)->row();
    }           

    // get data by id berkas
    function get_by_id($id)
    {
        $this->db->select('id_berkas,nama_berkas,keterangan_berkas,tipe_berkas,ukuran_berkas,peserta.id_peserta,nisn,no_pendaftaran,nama_peserta');
        $this->db->join('peserta', 'berkas.id_peserta = peserta.id_peserta');       
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }           

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_berkas', $q);
    	$this->db->or_like('nama_berkas', $q);
    	$this->db->or_like('keterangan_berkas', $q);
    	$this->db->or_like('tipe_berkas', $q);
    	$this->db->or_like('ukuran_berkas', $q);
    	$this->db->or_like('id_peserta', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_berkas', $q);
    	$this->db->or_like('nama_berkas', $q);
    	$this->db->or_like('keterangan_berkas', $q);
    	$this->db->or_like('tipe_berkas', $q);
    	$this->db->or_like('ukuran_berkas', $q);
    	$this->db->or_like('id_peserta', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $query = $this->db->get($this->table);
        $row = $query->row();
        unlink("./assets/uploads/attachment/$row->nama_berkas");
        $this->db->delete($this->table, array($this->id => $id));
    }    

    // delete bulkdata
    function deletebulk()
    {
        $data = $this->input->post('msg_', TRUE);
        $arr_id = explode(",", $data);
        $this->db->where_in($this->id, $arr_id);
        return $this->db->delete($this->table);
    }
}