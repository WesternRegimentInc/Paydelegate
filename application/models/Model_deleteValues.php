<?php

class Model_deleteValues extends CI_Model{
    
    public function deleteVal($table, $field_where, $field_equal) {

        $this->db->where($field_where, $field_equal);
        $this->db->delete($table);
        return true;
        
    }
    
}