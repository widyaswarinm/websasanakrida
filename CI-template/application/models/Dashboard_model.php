<?php


class Dashboard_model extends CI_Model

{

    function __construct()

    {
        parent::__construct();

    }

    

    public function login($username){

        return $this->db->get_where('admin',array('username'=>$username))->row_array();

    }

}

?>