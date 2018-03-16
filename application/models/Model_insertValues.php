<?php

/**
 * Model_insertValues
 * 
 * @package hrapp
 * @author Ayodeji Adesola
 * @copyright 2014
 * @version 1.0
 * @access public
 */
class Model_insertValues extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function addItem($array, $table) {
        //echo 'ins';
        $query = $this->db->insert($table, $array);
        if ($query) {
            return true;
        } 
    }
    
    public function insert_csv($data, $table) {
        $this->db->insert($table, $data);
    }
    
}

?>