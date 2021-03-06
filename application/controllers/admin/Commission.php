<?php

/* 
 * Controller for Accounts Mgt
 * Copyright padelegate.com
 * Developer Abiye Chris. I. Surulere
 * All rights Reserved
 */
class Commission extends CI_Controller {
    
    public $table;

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->helper('form');
        $this->table = 'pd_commissions';
        $this->load->library('form_validation');
        $this->load->model('Model_insertvalues');
        $this->load->model('Model_getvalues');
        $this->load->model('Model_htmldata');
        $this->load->model('Model_updatevalues');
        $this->load->model('Model_deleteValues');
        
        $sess['logged_in'] = $this->session->userdata('logged_in');
        if($this->session->userdata() && $sess['logged_in'] == FALSE){
            redirect('admin/');
        }
    }
    
    public function index($stat = "", $id=""){
        // Passing these empty array incase they are not declared to view, to avoid undefined error..
        $data["msg"] = "";
        $data["i"] = 0;
        $data["edit"] = "";
        //$data['rate'] = 0;
        
        if ($stat === "success") {
            $data["msg"] = $this->model_htmldata->successMsg("Operation was Successfully");
        } elseif ($stat === "deleted") {
            $data["msg"] = $this->model_htmldata->successMsg("Deleted Successfully");
        }
        elseif ($stat === "cannot") {
            $data["msg"] = $this->model_htmldata->errorMsg("Cannot Delete");
        }elseif($stat === "edit")
        {
            $data["edit"] = $id;
        }
        
        $data['commission'] = $this->model_getvalues->getTableRow($this->table, "id", "desc");

        $this->load->view('admin/temps/header', $data);
        $this->load->view('admin/commission');
        $this->load->view('admin/temps/footer');
    }
    
    public function create(){
        
        $this->form_validation->set_rules('commission', 'Commission', 'required');
        
        if ($this->form_validation->run()) {
            
            $data = [
                'commission' => $this->input->post("commission"),
            ];
            
            if ($this->Model_insertvalues->addItem($data, $this->table)) {
                redirect('admin/commission/index/success');
            }
        }else{
            $this->session->set_flashdata('errors', validation_errors('<div class="alert alert-danger">', '</div>'));
           // redirect($this->input->post('redirect'));
            $this->load->view('admin/temps/header', $data);
           $this->load->view('admin/commission/create');
           $this->load->view('admin/temps/footer');
        }
    }  
    public function update($id){
        $this->form_validation->set_rules('commission', 'Commission', 'required');
        
        if ($this->form_validation->run()) {
            $data = [
                'commission' => $this->input->post("commission"),
            ];
            if ($this->Model_updatevalues->updateVal($this->table, $data, "id", $id)) {
                redirect('admin/commission/index/success');
            }
        }else{
            $this->session->set_flashdata('errors', validation_errors('<div class="alert alert-danger">', '</div>'));
            redirect($this->input->post('redirect'));
        }
    }  
    public function delete($id){
        $checkoffer = $this->model_getvalues->getTableRows3($this->table, "id =", $id, "id", "desc", 1);
        if ($checkoffer == FALSE) {
            redirect('admin/commission/index/cannot');
        }
        
        if ($this->Model_deleteValues->deleteVal($this->table, "id", $id)) {
            redirect('admin/commission/index/deleted');
        }
    }
}
