<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jalur_model extends CI_Model
{

    public $table = 'jalur';
    public $id = 'id_jalur';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_jalur,jalur,persentase,status_jalur');
        $this->datatables->from('jalur');
        //add this line for join
        //$this->datatables->join('table2', 'jalur.field = table2.field');
        $this->datatables->add_column('action', 
            // anchor(site_url('jalur/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary btn-flat"  data-toggle="tooltip" title="Detail"')."  ".
            anchor(site_url('jalur/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning btn-flat" data-toggle="tooltip" title="Edit"')."  ".
            anchor(site_url('jalur/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'jalur/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_jalur');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->where('status_jalur', 'Aktif');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }        

    // get kuota zonasi
    function KuotaJalur1()
    {
        $this->db->where('id_jalur','1');
        return $this->db->get($this->table)->row();
    }

    // get kuota prestasi
    function KuotaJalur2()
    {
        $this->db->where('id_jalur','2');
        return $this->db->get($this->table)->row();
    }

    // get kuota afirmasi
    function KuotaJalur3()
    {
        $this->db->where('id_jalur','3');
        return $this->db->get($this->table)->row();
    }    

    // get kuota mutasi
    function KuotaJalur4()
    {
        $this->db->where('id_jalur','4');
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
        $this->db->like('id_jalur', $q);
    	$this->db->or_like('jalur', $q);
    	$this->db->or_like('persentase', $q);
        $this->db->or_like('status_jalur', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_jalur', $q);
    	$this->db->or_like('jalur', $q);
    	$this->db->or_like('persentase', $q);
        $this->db->or_like('status_jalur', $q);
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