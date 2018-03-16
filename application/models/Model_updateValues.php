<?php

class Model_updateValues extends CI_Model{
    
    public function updateVal($table, $data, $field_where, $field_equal) {
        $this->db->where($field_where, $field_equal);
        $query = $this->db->update($table, $data);
        return true;       
    }
    
}