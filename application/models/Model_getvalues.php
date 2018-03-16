<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model_getvalues extends CI_Model {
    
    function getTableRows3($table, $where, $whereVal, $orderby, $orderVal = "desc", $limit = 0) {
        $this->db->select('*');
        $this->db->where($where, $whereVal);
        $this->db->from($table);
        $this->db->order_by($orderby, $orderVal);
        if ($limit != 0) {
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    
    function getTableRows($table, $where, $whereVal, $orderby, $orderVal = "desc", $limit = 0) {
        $this->db->select('*');
        $this->db->where($where, $whereVal);
        $this->db->from($table);
        $this->db->order_by($orderby, $orderVal);
        if ($limit != 0) {
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        return $query->result();
    }
    
    function getTableRowJoin($table,$table2, $table_compare_value, $join_type = "left", $orderby, $orderVal = "desc") {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2,  $table_compare_value, $join_type); 
        $this->db->order_by($orderby, $orderVal);
    	$query = $this->db->get();
    	return $query->result();
    }
    function getTableRowJoin1($table,$table2, $table_compare_value, $join_type = "left", $orderby, $orderVal = "desc") {
        $this->db->select('*');
        $this->db->select($table.'.name AS t1name,'.$table3.'.name AS t2name');
        $this->db->from($table);
        $this->db->join($table2,  $table_compare_value, $join_type); 
        $this->db->order_by($orderby, $orderVal);
    	$query = $this->db->get();
    	return $query->result();
    }
    
    function getTableRowJoin2($table,$table2,$table3, $table_compare_value, $table_compare_value2, $join_type = "left", $orderby, $orderVal = "desc") {
        $this->db->select('*');
        $this->db->select($table.'.id AS tid1,'.$table2.'.name AS tid2');
        $this->db->from($table);
        $this->db->join($table2,  $table_compare_value, $join_type);
        $this->db->join($table3,  $table_compare_value2, $join_type);
        $this->db->order_by($orderby, $orderVal);
    	$query = $this->db->get();
    	return $query->result();
    }
    function getTableRowJoin3($table,$table2,$table3, $table_compare_value, $table_compare_value2, $join_type = "left", $orderby, $orderVal = "desc") {
        $this->db->select('*');
        $this->db->select($table.'.pdu_id AS t1id,'.$table3.'.pdu_id AS t2id');
        $this->db->from($table);
        $this->db->join($table2,  $table_compare_value, $join_type);
        $this->db->join($table3,  $table_compare_value2, $join_type); 
        $this->db->order_by($orderby, $orderVal);
    	$query = $this->db->get();
    	return $query->result();
    }
    function getTableRowJoin4($table,$table2,$table3, $table_compare_value, $table_compare_value2, $join_type = "left", $orderby, $orderVal = "desc") {
        $this->db->select('*');
        $this->db->select($table.'.pdu_id AS t1id,'.$table3.'.pdu_id AS t2id');
        $this->db->from($table);
        $this->db->join($table2,  $table_compare_value, $join_type);
        $this->db->join($table3,  $table_compare_value2, $join_type); 
        $this->db->order_by($orderby, $orderVal);
    	$query = $this->db->get();
    	return $query->result();
    }

    function getTableRow($table, $orderby, $orderVal = "desc") {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($orderby, $orderVal);
    	$query = $this->db->get();
    	return $query->result();
    }
    function getTableRowWithLimit($table, $orderby, $orderVal = "desc", $limit) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($orderby, $orderVal);
        $this->db->limit($limit);
    	$query = $this->db->get();
    	return $query->result();
    }

    function getRequestCount($table){
        return $this->db->count_all($table);
    }
    
}