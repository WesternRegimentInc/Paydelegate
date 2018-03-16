<?php
/* 
 * Controller for Accounts Mgt
 * Copyright padelegate.com
 * Developer Abiye Chris. I. Surulere
 * All rights Reserved
 */

class Admin extends CI_Controller {

    public $table;

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
    }
    
    public function index(){
        $this->form_validation->set_rules('email', 'Email/Username', 'required|valid_email');
    	$this->form_validation->set_rules('password', 'Password', 'required');
    
    	if($this->form_validation->run() == FALSE) {
    		$this->load->view('admin/user/login');
    	}else{
    
    		$post = $this->input->post();
    		$clean = $this->security->xss_clean($post);
    
    		$userInfo = $this->Model_user->checkLogin3($clean);
    
    		if(!$userInfo){
    			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Login was unsuccessful, try again</div>');
    			redirect(site_url().'/admin');
    		}
    		foreach($userInfo as $key=>$val){
    			$this->session->set_userdata($key, $val);
    		}
    		redirect(site_url().'/admin/');
    	}
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
                redirect('admin/request/status/success');
            }
        }else{
            $this->session->set_flashdata('errors', validation_errors('<div class="alert alert-danger">', '</div>'));
            redirect($this->input->post('redirect'));
        }
    }  
    public function disable($id){
        $this->table = 'pd_status';
        $checkoffer = $this->model_getvalues->getTableRows3($this->table, "id =", $id, "id", "desc", 1);
        if ($checkoffer !== FALSE) {
            redirect('admin/request/status/cannot');
        }
        
        if ($this->Model_deleteValues->deleteVal($this->table, "id", $id)) {
            redirect('admin/request/status/deleted');
        }
    }
    
    public function login(){
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['success_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('name', 'Password', 'required');
        
        $data = [
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        ];
        
        var_dump($data);
      
        //$this->load->view('admin/user/login', $data);
    }
    
    public function account(){
        //
    }
    
    public function email_check(){
        //
    }
    
}