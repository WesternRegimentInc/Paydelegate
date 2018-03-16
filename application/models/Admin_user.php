<?php

/**
 * Created by PhpStorm.
 * Author: Abiye Chris. I. Surulere
 * Author's Website: http://www.suruabiye.com
 * Project: PayDelegate
 * Time: 1/05/2017, 11:53 AM
 * Coy:
 */
class Admin_user extends CI_Model
{
    function __construct() {
        parent::__construct();
    }

    public function login($username, $password){
        // Data/Variables
        $condition = 'email = "'.$username.'" AND password="'.$password.'"';
        $this->db->select('*');
        $this->db->from('pd_users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->num_rows();
        //$query = $this->db->get_where('staff', array('username'=>$username, 'password'=>$password));
    }
    public function userData($username){
        $condition = 'username = "'.$username.'"';
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            return $query->row_array();
        }else{
            return false;
        }
    }
    

}