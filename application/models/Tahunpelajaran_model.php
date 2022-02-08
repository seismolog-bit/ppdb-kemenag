<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tahunpelajaran_model extends CI_Model
{

    public $table = 'tahunpelajaran';
    public $id = 'id_tahun';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_tahun,tahun_pelajaran,kuota,tanggal_mulai_pendaftaran,tanggal_selesai_pendaftaran,tanggal_mulai_seleksi,tanggal_selesai_seleksi,tanggal_pengumuman,tanggal_mulai_daftar_ulang,tanggal_selesai_daftar_ulang,status_tahun');
        $this->datatables->from('tahunpelajaran');
        //add this line for join
        //$this->datatables->join('table2', 'tahunpelajaran.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('tahunpelajaran/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary btn-flat"  data-toggle="tooltip" title="Detail"')."  ".anchor(site_url('tahunpelajaran/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning btn-flat" data-toggle="tooltip" title="Edit"')."  ".anchor(site_url('tahunpelajaran/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'tahunpelajaran/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_tahun');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get tahun aktif
    function get_tahun_aktif()
    {
        $this->db->where('status_tahun','Aktif');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->row();
    }    

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_tahun', $q);
    	$this->db->or_like('tahun_pelajaran', $q);
    	$this->db->or_like('kuota', $q);
    	$this->db->or_like('tanggal_mulai_pendaftaran', $q);
    	$this->db->or_like('tanggal_selesai_pendaftaran', $q);
    	$this->db->or_like('tanggal_mulai_seleksi', $q);
    	$this->db->or_like('tanggal_selesai_seleksi', $q);
    	$this->db->or_like('tanggal_pengumuman', $q);
    	$this->db->or_like('tanggal_mulai_daftar_ulang', $q);
    	$this->db->or_like('tanggal_selesai_daftar_ulang', $q);
    	$this->db->or_like('status_tahun', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_tahun', $q);
    	$this->db->or_like('tahun_pelajaran', $q);
    	$this->db->or_like('kuota', $q);
    	$this->db->or_like('tanggal_mulai_pendaftaran', $q);
    	$this->db->or_like('tanggal_selesai_pendaftaran', $q);
    	$this->db->or_like('tanggal_mulai_seleksi', $q);
    	$this->db->or_like('tanggal_selesai_seleksi', $q);
    	$this->db->or_like('tanggal_pengumuman', $q);
    	$this->db->or_like('tanggal_mulai_daftar_ulang', $q);
    	$this->db->or_like('tanggal_selesai_daftar_ulang', $q);
    	$this->db->or_like('status_tahun', $q);
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
    function deletebulk(){
        $data = $this->input->post('msg_', TRUE);
        $arr_id = explode(",", $data);
        $this->db->where_in($this->id, $arr_id);
        return $this->db->delete($this->table);
    }
}