<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prestasipeserta_model extends CI_Model
{

    public $table = 'prestasipeserta';
    public $id = 'id_prestasipeserta';
    // public $id_peserta = 'id_peserta';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_prestasipeserta,jenis,nama_prestasi,tahun,penyelenggara,peserta.id_peserta,no_pendaftaran,nama_peserta,prestasi.id_prestasi,tingkat,kategori,juara,skor_prestasi');
        $this->datatables->from('prestasipeserta');
        //add this line for join
        //$this->datatables->join('table2', 'prestasipeserta.field = table2.field');
        $this->datatables->join('peserta', 'prestasipeserta.id_peserta = peserta.id_peserta');
        $this->datatables->join('prestasi', 'prestasipeserta.id_prestasi = prestasi.id_prestasi');        
        $this->datatables->add_column('action', 
            anchor(site_url('prestasipeserta/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary btn-flat"  data-toggle="tooltip" title="Detail"')."  ".
            anchor(site_url('prestasipeserta/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning btn-flat" data-toggle="tooltip" title="Edit"')."  ".
            anchor(site_url('prestasipeserta/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'prestasipeserta/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_prestasipeserta');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('id_prestasipeserta,jenis,nama_prestasi,tahun,penyelenggara,peserta.id_peserta,no_pendaftaran,nama_peserta,prestasi.id_prestasi,tingkat,kategori,juara,skor_prestasi');      
        $this->db->join('peserta', 'prestasipeserta.id_peserta = peserta.id_peserta');
        $this->db->join('prestasi', 'prestasipeserta.id_prestasi = prestasi.id_prestasi');         
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }  

    // get sum poin by id_peserta
    function sumpoin($id_peserta)
    {
        $this->db->select('sum(skor_prestasi) as totalpoin');
        $this->db->join('prestasi', 'prestasipeserta.id_prestasi = prestasi.id_prestasi');  
        $this->db->where('id_peserta', $id_peserta);
        return $this->db->get($this->table)->result();  
    }    

    // get all prestasi by id_peserta
    function get_all_prestasi($id_peserta)
    { 
        $this->db->select('id_prestasipeserta,jenis,nama_prestasi,tahun,penyelenggara,id_peserta,prestasi.id_prestasi,tingkat,kategori,juara,skor_prestasi');      
        $this->db->join('prestasi', 'prestasipeserta.id_prestasi = prestasi.id_prestasi');  
        $this->db->where('id_peserta', $id_peserta);       
        // $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id prestasipeserta
    function get_by_id($id)
    {
        $this->db->select('id_prestasipeserta,jenis,nama_prestasi,tahun,penyelenggara,peserta.id_peserta,nisn,no_pendaftaran,nama_peserta,prestasi.id_prestasi,tingkat,kategori,juara,skor_prestasi');      
        $this->db->join('peserta', 'prestasipeserta.id_peserta = peserta.id_peserta');
        $this->db->join('prestasi', 'prestasipeserta.id_prestasi = prestasi.id_prestasi');          
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by id peserta
    function get_id($id)
    {
        $this->db->select('id_prestasipeserta,jenis,nama_prestasi,tahun,penyelenggara,peserta.id_peserta,nisn,no_pendaftaran,nama_peserta,prestasi.id_prestasi,tingkat,kategori,juara,skor_prestasi');      
        $this->db->join('peserta', 'prestasipeserta.id_peserta = peserta.id_peserta');
        $this->db->join('prestasi', 'prestasipeserta.id_prestasi = prestasi.id_prestasi');          
        $this->db->where('peserta.id_peserta', $id);
        return $this->db->get($this->table)->result();
    }    

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_prestasipeserta', $q);
    	$this->db->or_like('jenis', $q);
    	$this->db->or_like('nama_prestasi', $q);
    	$this->db->or_like('tahun', $q);
    	$this->db->or_like('penyelenggara', $q);
    	$this->db->or_like('id_peserta', $q);
    	$this->db->or_like('id_prestasi', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_prestasipeserta', $q);
    	$this->db->or_like('jenis', $q);
    	$this->db->or_like('nama_prestasi', $q);
    	$this->db->or_like('tahun', $q);
    	$this->db->or_like('penyelenggara', $q);
    	$this->db->or_like('id_peserta', $q);
    	$this->db->or_like('id_prestasi', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // delete bulkdata
    function deletebulk() {
        $data = $this->input->post('msg_', TRUE);
        $arr_id = explode(",", $data);
        $this->db->where_in($this->id, $arr_id);
        return $this->db->delete($this->table);
    }

}