<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_groups_model extends CI_Model
{

    public $table = 'users_groups';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get data by id
    function get_id()
    {
        $user = $this->ion_auth->user()->row();  
        $this->db->select('user_id,group_id');      
        $this->db->where('user_id', $user->id);
        return $this->db->get($this->table)->row();
    }    

}