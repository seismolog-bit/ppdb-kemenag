<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public $table = 'users';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('users.id,ip_address,username,password,salt,email,activation_code,forgotten_password_code,forgotten_password_time,remember_code,created_on,last_login,active,first_name,last_name,company,phone,group_id');
        $this->datatables->from('users');
        //add this line for join
        // $this->datatables->join('table2', 'users.field = table2.field');
        $this->datatables->join('users_groups', 'users.id = users_groups.user_id');
        $this->datatables->where('group_id','2');   
        $this->datatables->add_column('action', 
            // anchor(site_url('users/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary btn-flat"  data-toggle="tooltip" title="Detail"')."  ".
            // anchor(site_url('auth/edit_user/$1'), '<i class="fa fa-user-edit"></i>', 'class="btn btn-warning btn-flat btn-xs" data-toogle="tooltip" title="Edit User"')."  ".
            anchor(site_url('users/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger btn-flat" onclick="return confirmdelete(\'users/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id');
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

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
    	$this->db->or_like('ip_address', $q);
    	$this->db->or_like('username', $q);
    	$this->db->or_like('password', $q);
    	$this->db->or_like('salt', $q);
    	$this->db->or_like('email', $q);
    	$this->db->or_like('activation_code', $q);
    	$this->db->or_like('forgotten_password_code', $q);
    	$this->db->or_like('forgotten_password_time', $q);
    	$this->db->or_like('remember_code', $q);
    	$this->db->or_like('created_on', $q);
    	$this->db->or_like('last_login', $q);
    	$this->db->or_like('active', $q);
    	$this->db->or_like('first_name', $q);
    	$this->db->or_like('last_name', $q);
    	$this->db->or_like('company', $q);
    	$this->db->or_like('phone', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
    	$this->db->or_like('ip_address', $q);
    	$this->db->or_like('username', $q);
    	$this->db->or_like('password', $q);
    	$this->db->or_like('salt', $q);
    	$this->db->or_like('email', $q);
    	$this->db->or_like('activation_code', $q);
    	$this->db->or_like('forgotten_password_code', $q);
    	$this->db->or_like('forgotten_password_time', $q);
    	$this->db->or_like('remember_code', $q);
    	$this->db->or_like('created_on', $q);
    	$this->db->or_like('last_login', $q);
    	$this->db->or_like('active', $q);
    	$this->db->or_like('first_name', $q);
    	$this->db->or_like('last_name', $q);
    	$this->db->or_like('company', $q);
    	$this->db->or_like('phone', $q);
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

    // delete semua data member
    function delete_allmember()
    {
        $hasil=$this->db->query("DELETE a.*, b.* from users a JOIN users_groups b ON a.id=b.user_id where group_id='2'"); 
        return $hasil;
    } 

    // get panitia
    function get_panitia() {
        $this->db->select('users.id,username,first_name,last_name,phone,image,group_id');
        $this->db->join('users_groups', 'users.id = users_groups.user_id');
        $this->db->where('group_id','3'); 
        $this->db->limit(5);  
        return $this->db->get($this->table)->result();
    }      

    // get member
    function get_member() {
        $this->db->select('users.id,username,first_name,last_name,image,group_id');
        $this->db->from('users');
        $this->db->join('users_groups', 'users.id = users_groups.user_id');
        $this->db->where('group_id','2');  
        $query = $this->db->get();
        $r=$query->result_array();
        return $r;        
    }  

    // get operator
    function get_operator() {
        $this->db->select('users.id,username,first_name,last_name,image,group_id');
        $this->db->from('users');
        $this->db->join('users_groups', 'users.id = users_groups.user_id');
        $this->db->where('group_id','3');  
        $query = $this->db->get();
        $r=$query->result_array();
        return $r;
    }  

    public function PictureUrl()
    {  
        $user = $this->ion_auth->user()->row();  
        $this->db->select('id,image');
        $this->db->from('users');
        $this->db->where('id',$user->id);
        $this->db->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        if(!empty($res['image'])){
            return base_url('assets/uploads/image/user/'.$res['image']);
        } else {
            return base_url('assets/uploads/image/user/avatar.jpg');
        }
    }

    public function GetUserData()
    {  
        $user = $this->ion_auth->user()->row();  
        $this->db->select('id,username,first_name,last_name,email,image');
        $this->db->from('users');
        $this->db->where('id',$user->id);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query) {
            return $query->row_array();
        } else {
            return false;
        }
    }
   
}

/* End of file Users_model.php */