<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bobot_model extends CI_Model
{

    public $table = 'bobot';
    public $id = 'id_bobot';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_bobot,jalur.id_jalur,bobot_jarak,bobot_nilai,bobot_prestasi,jalur');
        $this->datatables->from('bobot');
        //add this line for join
        $this->datatables->join('jalur', 'bobot.id_jalur = jalur.id_jalur');
        $this->datatables->add_column('action', 
            // anchor(site_url('bobot/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary btn-flat"  data-toggle="tooltip" title="Detail"')."  ".
            anchor(site_url('bobot/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning btn-flat" data-toggle="tooltip" title="Edit"')."  ".
            anchor(site_url('bobot/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'bobot/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_bobot');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->select('id_bobot,jalur.id_jalur,bobot_jarak,bobot_nilai,bobot_prestasi,jalur');
        $this->db->join('jalur', $this->table.".id_jalur = jalur.id_jalur");           
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('id_bobot,jalur.id_jalur,bobot_jarak,bobot_nilai,bobot_prestasi,jalur');
        $this->db->join('jalur', $this->table.".id_jalur = jalur.id_jalur");    
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_bobot', $q);
    	$this->db->or_like('id_jalur', $q);
    	$this->db->or_like('bobot_jarak', $q);
    	$this->db->or_like('bobot_nilai', $q);
    	$this->db->or_like('bobot_prestasi', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_bobot', $q);
    	$this->db->or_like('id_jalur', $q);
    	$this->db->or_like('bobot_jarak', $q);
    	$this->db->or_like('bobot_nilai', $q);
    	$this->db->or_like('bobot_prestasi', $q);
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