<?php

/* 
 * Controller for Accounts Mgt
 * Copyright padelegate.com
 * Developer Abiye Chris. I. Surulere
 * All rights Reserved
 */
class Request extends CI_Controller {
    
    public $table;

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->helper('form');
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
    
    public function index(){
        $data['nR'] = $this->Model_getvalues->getRequestCount('pd_requests');
        $data['dR'] = $this->Model_getvalues->getRequestCount('pd_dollar_requests');
        $data['gR'] = $this->Model_getvalues->getRequestCount('pd_gift');

        $this->load->view('admin/temps/header', $data);
        $this->load->view('admin/request');
        $this->load->view('admin/temps/footer');
    }
    
    public function dollar($stat = "", $id=""){
        // Passing these empty array incase they are not declared to view, to avoid undefined error..
        $data["msg"] = "";
        $data["i"] = 0;
        $data["edit"] = "";
        
        if ($stat === "success") {
            $data["msg"] = $this->model_htmldata->successMsg("Dollar Request Edited Successfully");
        } elseif ($stat === "deleted") {
            $data["msg"] = $this->model_htmldata->successMsg("Dollar Request Deleted Successfully");
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
                $data["msg"] = $this->model_htmldata->successMsg("New Naira Request Added");
            }
        }

        $this->table = "pd_dollar_requests";
        $data['dR'] = $this->Model_getvalues->getTableRowJoin4($this->table,"pd_status", "pd_users", "pd_dollar_requests.status=pd_status.id","pd_dollar_requests.pdu_id=pd_users.pdu_id", "left", "req_id", "desc");
        $data['st'] =  $this->model_getvalues->getTableRow("pd_status", "id", "desc");
        
        $this->load->view('admin/temps/header', $data);
        $this->load->view('admin/dollar');
        $this->load->view('admin/temps/footer');
    }
    public function adddollar(){
        
        
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
    public function updatedollar($id){
        $this->form_validation->set_rules('des', 'Description', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('amountExchange', 'Amount Exchange', 'required');
        $this->form_validation->set_rules('status', 'Payment Status', 'required');
        
        if ($this->form_validation->run() == true) {
            
            $data = [
                'des' => $this->input->post("des"),
                'country' => $this->input->post("country"),
                'amount' => $this->input->post("amount"),
                'amountExchange' => $this->input->post("amountExchange"),
                'status' => $this->input->post("status"),
            ];
            
            $this->table = 'pd_dollar_requests';
            if ($this->Model_updatevalues->updateVal($this->table, $data, "req_id", $id)) {
                redirect('admin/request/dollar/success');
            }
        }else{
            $this->session->set_flashdata('errors', validation_errors('<div class="alert alert-danger">', '</div>'));
            redirect($this->input->post('redirect'));
        }
    }  
    public function deletedollar($id){
        $this->table = 'pd_dollar_requests';
        $checkoffer = $this->model_getvalues->getTableRows3($this->table, "req_id =", $id, "req_id", "desc", 1);
        if ($checkoffer == FALSE) {
            redirect('admin/request/dollar/cannot');
        }
        if ($this->Model_deleteValues->deleteVal($this->table, "req_id", $id)) {
            redirect('admin/request/dollar/deleted');
        }
    }
    
    public function gift($stat = "", $id=""){
        // Passing these empty array incase they are not declared to view, to avoid undefined error..
        $data["msg"] = "";
        $data["i"] = 0;
        $data["edit"] = "";
        
        if ($stat === "success") {
            $data["msg"] = $this->model_htmldata->successMsg("Gift Edited Successfully");
        } elseif ($stat === "deleted") {
            $data["msg"] = $this->model_htmldata->successMsg("Gift Deleted Successfully");
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
                $data["msg"] = $this->model_htmldata->successMsg("New Project Added");
            }
        }
        
        $this->table = "pd_gift";
        $data['gR'] = $this->Model_getvalues->getTableRowJoin2($this->table,"pd_status", "pd_users", "pd_gift.status=pd_status.id","pd_gift.user_id=pd_users.pdu_id", "left", "pd_gift.id", "desc");
        $data['st'] =  $this->model_getvalues->getTableRow("pd_status", "id", "desc");
        
        $this->load->view('admin/temps/header', $data);
        $this->load->view('admin/gift');
        $this->load->view('admin/temps/footer');
    }
    public function addgift(){
        
        
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
    public function updategift($id){
        $this->form_validation->set_rules('des', 'Description', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('amountExchange', 'Amount Exchange', 'required');
        $this->form_validation->set_rules('status', 'Payment Status', 'required');
        
        if ($this->form_validation->run()) {
            
            $data = [
                'des' => $this->input->post("des"),
                'amount_usd' => $this->input->post("amount"),
                'amount_naira' => $this->input->post("amountExchange"),
                'status' => $this->input->post("status"),
            ];
            
            $this->table = 'pd_gift';
            if ($this->Model_updatevalues->updateVal($this->table, $data, "id", $id)) {
                redirect('admin/request/gift/success');
            }
        }else{
            $this->session->set_flashdata('errors', validation_errors('<div class="alert alert-danger">', '</div>'));
            redirect($this->input->post('redirect'));
        }
    }  
    public function deletegift($id){
        $checkoffer = $this->Model_getvalues->getTableRows3("pd_requests", "req_id =", $id, "req_id", "desc", 1);
        if ($checkoffer == false) {
            redirect('admin/request/naira/cannot');
        }
        $this->table = 'pd_requests';
        $data = array("name" => $this->input->post("name"));
        if ($this->Model_deleteValues->deleteVal($this->table, "req_id", $id)) {
            redirect('admin/request/naira/deleted');
        }
    }
    
    public function naira($stat = "", $id=""){
        // Passing these empty array incase they are not declared to view, to avoid undefined error..
        $data["msg"] = "";
        $data["i"] = 0;
        $data["edit"] = "";
        
        if ($stat === "success") {
            $data["msg"] = $this->model_htmldata->successMsg("Naira Request Edited Successfully");
        } elseif ($stat === "deleted") {
            $data["msg"] = $this->model_htmldata->successMsg("Naira Request Deleted Successfully");
        }
        elseif ($stat === "cannot") {
            $data["msg"] = $this->model_htmldata->errorMsg("Cannot Delete");
        }elseif($stat === "edit")
        {
            $data["edit"] = $id;
        }
        
        // Add New Naira Request....
        $this->form_validation->set_rules('name', 'Staus Name', 'required');
        
        if ($this->form_validation->run()) {
            $array = array("name" => $this->input->post("name"));
            if ($this->model_insertvalues->addItem($array, $this->table)) {
                $data["msg"] = $this->model_htmldata->successMsg("New Naira Request Added");
            }
        }
        
        $this->table = "pd_requests";
        $data['nR'] = $this->Model_getvalues->getTableRowJoin3($this->table,"pd_status","pd_users", "pd_requests.status=pd_status.id", "pd_requests.pdu_id=pd_users.pdu_id", "left", "req_id", "desc");
        $data['st'] =  $this->model_getvalues->getTableRow("pd_status", "id", "desc");

        $this->load->view('admin/temps/header', $data);
        $this->load->view('admin/naira');
        $this->load->view('admin/temps/footer');
    }
    public function addnaira(){
        
        
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
    public function updatenaira($id){
        $this->form_validation->set_rules('des', 'Description', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('amountExchange', 'Amount Exchange', 'required');
        $this->form_validation->set_rules('status', 'Payment Status', 'required');
        
        if ($this->form_validation->run()) {
            
            $data = [
                'des' => $this->input->post("des"),
                'country' => $this->input->post("country"),
                'amount' => $this->input->post("amount"),
                'amountExchange' => $this->input->post("amountExchange"),
                'status' => $this->input->post("status"),
            ];
            
            $this->table = 'pd_requests';
            if ($this->Model_updatevalues->updateVal($this->table, $data, "req_id", $id)) {
                redirect('admin/request/naira/success');
            }
        }else{
            $this->session->set_flashdata('errors', validation_errors('<div class="alert alert-danger">', '</div>'));
            redirect($this->input->post('redirect'));
        }
    }  
    public function deletenaira($id){
        $this->table = 'pd_requests';
        $checkoffer = $this->Model_getvalues->getTableRows3($this->table, "req_id =", $id, "req_id", "desc", 1);
        if ($checkoffer == false) {
            redirect('admin/request/naira/cannot');
        }
        
        if ($this->Model_deleteValues->deleteVal($this->table, "req_id", $id)) {
            redirect('admin/request/naira/deleted');
        }
    }
}
