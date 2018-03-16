<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model_htmlData extends CI_Model {
    
    
    function successMsg($msg, $content="") {
        return '<div class="alert alert-info"><strong><i class=" icon-ok-4"></i> Success!</strong> ' . $msg . ' '.$content.'</div>';
    }

    function errorMsg($msg) {
        return '<div class="alert alert-danger"><strong><i class=" icon-mic"></i> Oops!</strong> ' . $msg . '.</div>';
    }
    
    function verifyMsg($msg) {
        return '<div class="alert alert-danger" style="margin-bottom:0px"><strong><i class=" icon-tag"></i></strong> ' . $msg . '.</div>';
    }

    function infoMsg($msg) {
        return '<div class="alert alert-info"><strong>Oops!</strong> ' . $msg . '.</div>';
    }
    
    
}