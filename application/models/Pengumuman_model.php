<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengumuman_model extends CI_Model
{

    public $table = 'pengumuman';
    public $id = 'id_pengumuman';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_pengumuman,type,judul,text,date');
        $this->datatables->from('pengumuman');
        //add this line for join
        //$this->datatables->join('table2', 'pengumuman.field = table2.field');
        $this->datatables->add_column('action', 
            // anchor(site_url('pengumuman/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary btn-flat"  data-toggle="tooltip" title="Detail"')."  ".
            anchor(site_url('pengumuman/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning btn-flat" data-toggle="tooltip" title="Edit"')."  ".
            anchor(site_url('pengumuman/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'pengumuman/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_pengumuman');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by member
    function get_by_member()
    {
        $this->db->where('type', 'member');
        $this->db->order_by('date', $this->order);
        $this->db->limit(5);     
        return $this->db->get($this->table)->result();
    }

    // get data by publik
    function get_by_publik()
    {
        $this->db->where('type', 'publik');
        $this->db->order_by('date', 'asc');
        $this->db->limit(5);      
        return $this->db->get($this->table)->result();
    }    

    // get data by formulir
    function get_by_formulir()
    {
        $this->db->where('type', 'formulir');
        $this->db->order_by($this->id, $this->order);
        $this->db->limit(1);        
        return $this->db->get($this->table)->result();
    } 

    // get data by skl
    function get_by_skl()
    {
        $this->db->where('type', 'skl');
        $this->db->order_by($this->id, $this->order);
        $this->db->limit(1);        
        return $this->db->get($this->table)->result();
    }              

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pengumuman', $q);
    	$this->db->or_like('type', $q);
    	$this->db->or_like('judul', $q);
    	$this->db->or_like('text', $q);
    	$this->db->or_like('date', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pengumuman', $q);
    	$this->db->or_like('type', $q);
    	$this->db->or_like('judul', $q);
    	$this->db->or_like('text', $q);
    	$this->db->or_like('date', $q);
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