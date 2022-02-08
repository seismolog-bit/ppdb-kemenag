<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jurusan_model extends CI_Model
{

    public $table = 'jurusan';
    public $id = 'id_jurusan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_jurusan,bidang_keahlian,nama_jurusan,kuota_jurusan');
        $this->datatables->from('jurusan');
        //add this line for join
        //$this->datatables->join('table2', 'jurusan.field = table2.field');
        $this->datatables->add_column('action', 
            // anchor(site_url('jurusan/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary btn-flat"  data-toggle="tooltip" title="Detail"')."  ".
            anchor(site_url('jurusan/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning btn-flat" data-toggle="tooltip" title="Edit"')."  ".
            anchor(site_url('jurusan/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'jurusan/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_jurusan');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->not_like('nama_jurusan','Umum');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_jurusan', $q);
        $this->db->or_like('bidang_keahlian', $q);
    	$this->db->or_like('nama_jurusan', $q);
        $this->db->or_like('kuota_jurusan', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_jurusan', $q);
        $this->db->or_like('bidang_keahlian', $q);
    	$this->db->or_like('nama_jurusan', $q);
        $this->db->or_like('kuota_jurusan', $q);
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