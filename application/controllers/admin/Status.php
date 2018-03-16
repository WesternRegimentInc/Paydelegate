<?php

/* 
 * Controller for Accounts Mgt
 * Copyright padelegate.com
 * Developer Abiye Chris. I. Surulere
 * All rights Reserved
 */
class Status extends CI_Controller {
    
    public $table;

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->helper('form');
        $this->table = 'pd_rate';
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
        
        if ($stat === "success") {
            $data["msg"] = $this->model_htmldata->successMsg("Status Edited Successfully");
        } elseif ($stat === "deleted") {
            $data["msg"] = $this->model_htmldata->successMsg("Status Deleted Successfully");
        }
        elseif ($stat === "cannot") {
            $data["msg"] = $this->model_htmldata->errorMsg("Cannot Delete");
        }elseif($stat === "edit")
        {
            $data["edit"] = $id;
        }
        $this->form_validation->set_rules('name', 'Staus Name', 'required');
        
        if ($this->form_validation->run()) {
            $array = array("name" => $this->input->post("name"));
            if ($this->model_insertvalues->addItem($array, $this->table)) {
                $data["msg"] = $this->model_htmldata->successMsg("New Status Added");
            }
        }
        
        $data['status'] = $this->model_getvalues->getTableRow("pd_status", "id", "desc");

        $this->load->view('admin/temps/header', $data);
        $this->load->view('admin/status');
        $this->load->view('admin/temps/footer');
    }
    
    public function add(){
        $name = $_POST['name'];
        $data = [
            'name' => $name,
        ];
        // Get values
        $validator = array(
            'success' => false,
            'messages' => [],
        );
        $ins = $this->model_insertValues->addItem($data, 'pd_status');
        if($ins == true){
            $validator['success'] = true;
            $validator['messages'] = "Status added successfully";
        }else{
            $validator['success'] = false;
            $validator['messages'] = "Error while adding status";
        }
        
        echo  json_encode($validator);
    }  
    public function update($id){
        $this->form_validation->set_rules('name', 'Staus Name', 'required');
        $this->table = 'pd_status';
        if ($this->form_validation->run()) {
            $data = array("name" => $this->input->post("name"));
            if ($this->Model_updatevalues->updateVal($this->table, $data, "id", $id)) {
                redirect('admin/status/index/success');
            }
        }else{
            $this->session->set_flashdata('errors', validation_errors('<div class="alert alert-danger">', '</div>'));
            redirect($this->input->post('redirect'));
        }
    }  
    public function delete($id){
        $this->table = 'pd_status';
        $checkoffer = $this->model_getvalues->getTableRows3($this->table, "id =", $id, "id", "desc", 1);
        if ($checkoffer !== FALSE) {
            redirect('admin/status/index/cannot');
        }
        
        if ($this->Model_deleteValues->deleteVal($this->table, "id", $id)) {
            redirect('admin/status/index/deleted');
        }
    }
}
