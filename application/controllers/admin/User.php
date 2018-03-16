<?php
/* 
 * Controller for Accounts Mgt
 * Copyright padelegate.com
 * Developer Abiye Chris. I. Surulere
 * All rights Reserved
 */
class User extends CI_Controller {
    public $table;

    public function __construct(){
        parent::__construct();
        $this->table = 'pd_admin';
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->helper('form');
        $this->table = "pd_users";
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
        $data['user'] = array();
        $data["msg"] = "";
        $data["i"] = 0;
        $data["edit"] = "";
        
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
        
        $data['user'] = $this->model_getvalues->getTableRow($this->table, "pdu_id", "desc");
        //$data['role'] =  $this->model_getvalues->getTableRow("pd_admin_roles", "id", "desc");
        
        $this->load->view('admin/temps/header');
        $this->load->view('admin/user/user', $data);
        $this->load->view('admin/temps/footer');
    }
    /*
    public function create($stat = "", $id="") {
        
        $data['role'] =  $this->model_getvalues->getTableRow("pd_admin_roles", "id", "desc");
        
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Amount', 'required');
        
        if ($this->form_validation->run()) {
            
            $encryptPassword = $this->encryption->encrypt($this->input->post('password'));
            $data = [
                'fullname' => $this->input->post("name"),
                'email' => $this->input->post("email"),
                'password' => $encryptPassword,
                'role' => $this->input->post("role"),
            ];
            
            if ($this->Model_insertvalues->addItem($data, $this->table)) {
                redirect('admin/user/index/success');
            }
        }else{
            $this->session->set_flashdata('errors', validation_errors('<div class="alert alert-danger">', '</div>'));
           // redirect($this->input->post('redirect'));
            $this->load->view('admin/temps/header', $data);
           $this->load->view('admin/user/create');
           $this->load->view('admin/temps/footer');
        }
    }
     * */
    
    public function update($id) {
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        //$this->form_validation->set_rules('status', 'status', 'required');
        
        if ($this->form_validation->run()) {
            
            $data = [
                'fullName' => $this->input->post("name"),
                'email' => $this->input->post("email"),
                'phone' => $this->input->post("phone"),
                //'status' => $this->input->post("status"),
            ];
            
            if ($this->Model_updatevalues->updateVal($this->table, $data, "pdu_id", $id)) {
                redirect('admin/user/index/success');
            }
        }else{
            $this->session->set_flashdata('errors', validation_errors('<div class="alert alert-danger">', '</div>'));
            redirect($this->input->post('redirect'));
        }
    }
    public function delete($id){
        $checkoffer = $this->model_getvalues->getTableRows3($this->table, "id =", $id, "id", "desc", 1);
        if ($checkoffer == FALSE) {
            redirect('admin/user/index/cannot');
        }
        
        if ($this->Model_deleteValues->deleteVal($this->table, "id", $id)) {
            redirect('admin/user/index/deleted');
        }
    }
    public function suspend($id){
        $data = [
            'status' => 0,
        ];
        if ($this->Model_updatevalues->updateVal($this->table, $data, "pdu_id", $id)) {
            redirect('admin/user/index/success');
        }
    }
    public function unsuspend($id){
        $data = [
            'status' => 1,
        ];
        if ($this->Model_updatevalues->updateVal($this->table, $data, "pdu_id", $id)) {
            redirect('admin/user/index/success');
        }
    }
    
    function signout(){     
        session_destroy();
        redirect('/admin');
    } 
}
