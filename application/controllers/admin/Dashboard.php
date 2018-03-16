<?php

/* 
 * Controller for Accounts Mgt
 * Copyright padelegate.com
 * Developer Abiye Chris. I. Surulere
 * All rights Reserved
 */
class Dashboard extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->model('Model_insertvalues');
        $this->load->model('Model_getvalues');
        $this->load->model('Model_htmldata');
        $this->load->model('Model_updatevalues');
        $this->load->model('Model_deleteValues');
        $this->load->model('Model_user');
        
        $sess['logged_in'] = $this->session->userdata('logged_in');
        if($this->session->userdata() && $sess['logged_in'] == FALSE){
            redirect('admin/');
        }
    }
    
    public function index(){
        $data['nR'] = $this->Model_getvalues->getRequestCount('pd_requests');
        $data['dR'] = $this->Model_getvalues->getRequestCount('pd_dollar_requests');
        $data['gR'] = $this->Model_getvalues->getRequestCount('pd_gift');

        $this->load->view('admin/temps/header', $data);
        $this->load->view('admin/request');
        $this->load->view('admin/temps/footer');
    }
}
