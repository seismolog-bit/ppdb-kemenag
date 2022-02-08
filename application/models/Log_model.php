<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Log_model extends CI_Model 
{
    public $table = 'log';
    public $id = 'id_log';
    public $order = 'DESC';	

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_log,log_time,log_user,log_tipe,log_ket');
        $this->datatables->from('log');
        //add this line for join
        //$this->datatables->join('table2', 'berkas.field = table2.field');
        $this->datatables->add_column('action', 
            anchor(site_url('log/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'log/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_log');
        return $this->datatables->generate();
    }    

// -------------------------------------------------- 
    public function save_log($param)
    {
        $sql        = $this->db->insert_string('log',$param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    // get log all
    public function get_log()
    {
        $this->db->select('id_log,log_time,log_user,log_tipe,log_ket,username,email,image,groups.id');
        // $this->db->join('users',$this->table.".log_user = users.email"); 
        $this->db->join('users',$this->table.".log_user = users.username");     
        $this->db->join('users_groups','users.id = users_groups.user_id');
        $this->db->join('groups','users_groups.group_id=groups.id');    
        $this->db->like('groups.id','1'); 
        $this->db->or_like('groups.id','2');          
        $this->db->or_like('groups.id','3');               
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    } 
// --------------------------------------------------      

    // get data by id log
    function get_by_id($id)
    {    
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    } 

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }    

    // delete bulkdata
    function deletebulk()
    {
        $data = $this->input->post('msg_', TRUE);
        $arr_id = explode(",", $data);
        $this->db->where_in($this->id, $arr_id);
        return $this->db->delete($this->table);
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_log', $q);
        $this->db->or_like('log_time', $q);
        $this->db->or_like('log_user', $q);
        $this->db->or_like('log_tipe', $q);
        $this->db->or_like('log_ket', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_log', $q);
        $this->db->or_like('log_time', $q);
        $this->db->or_like('log_user', $q);
        $this->db->or_like('log_tipe', $q);
        $this->db->or_like('log_ket', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }                

}