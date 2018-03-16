<?php
/* 
 * Controller for Accounts Mgt
 * Copyright padelegate.com
 * Developer Afolabi Kehinde
 * All rights Reserved
 */

class Accounts extends CI_Controller {
    public $table;

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->library('email');
        $this->table = "pd_requests";
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Model_insertvalues');
        $this->load->model('Model_user');
    }
    
    public function index(){
        $sess['logged_in'] = $this->session->userdata('logged_in');
        if($this->session->userdata() && $sess['logged_in'] == FALSE){
            redirect('site/home');
        }
        
        $data['active'] = "requests";
        $data['username'] = $_SESSION['username'];
        $data["status"] = "";
        $data['active'] = 2;
        $data['formstat'] = '';
        if(isset($_SESSION['msgRequest'])){
            $data['active'] = 2;
        } else if(isset($_SESSION['msgRequest2'])){
            $data['active'] = 3;
        } else if(isset($_SESSION['msgRequest3'])){
            $data['active'] = 4;
        }
        //$this->form_validation->set_rules('payreq', 'Website or Receiver Option ', 'required|callback_check_req');
        $formsubmit = $this->input->post('makeRequest');
        if($formsubmit == 'create_pfm'){
            $this->form_validation->set_rules('currency', 'Currency', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required|callback_check_default');
            $this->form_validation->set_rules('des', 'Description', 'required');
            if ($this->form_validation->run() == FALSE){
            	echo 'validation is false';
            }
            else{
                    $userDet = $this->model_getvalues->getTableRows3("pd_users", "email =", $_SESSION['username'], "pdu_id", "desc", 1);
                    $rate = $this->model_getvalues->getTableRows3("pd_rate", "id =", 1, "id", "desc", 1);
                    $getRateVal = $this->input->post('amount') * $rate['sell_rate'];
                    $getCommVal = $this->input->post('amount') * 0.05;
                    $da = array(
                        "currency" => $this->input->post('currency'),
                        "amount" => $this->input->post('amount'),
                        "pdu_id" => $userDet['pdu_id'],
                        "country" => $this->input->post('country'),
                        "des" => $this->input->post('des'),
                        "amountExchange" => $getRateVal,
                        "date" => date('m/d/Y H:i:s'),
                        "commission" => $getCommVal,
                        "rate" => $this->input->post('rate')
                    );
                    if ($this->Model_insertvalues->addItem($da, $this->table)) {
                        $this->session->set_flashdata('msgRequest', '<div class="input-group" style="margin: 10px 10px; line-height: 1px;"><h3 style="color: blue;">Request Placed!</h3></div>'); 
                    }
            }
            
        }
        if($formsubmit == 'create_dr'){
            $data['active'] = 3;
            
            $rate = $this->model_getvalues->getTableRows3("pd_rate", "id =", 1, "id", "desc", 1);
            $getRateVal = $this->input->post('rdpayamount') * $rate['rate'];
            $getCommVal = $getRateVal * 0.05;
            
            $this->form_validation->set_rules('rdpayamount', 'Requested Amount', 'required');
            //$this->form_validation->set_rules('rdamountVal', 'Requested Amount', 'required');
            //$this->form_validation->set_rules('rdamountComm', 'Requested Amount', 'required');
            $this->form_validation->set_rules('rdcountry', 'Country', 'required|callback_check_default');
            $this->form_validation->set_rules('rddes', 'Description', 'required');
            $this->form_validation->set_rules('rdpayreq', 'Payment Option', 'required|callback_check_req');
            $rdpayreq = $this->input->post('rdpayreq');

            if($rdpayreq == 'website'){
                $this->form_validation->set_rules('rdurlz', 'URL field', 'trim|required');
                echo 'it is a great website or <br />';
            } else if(trim($rdpayreq) == 'bank'){
                $this->form_validation->set_rules('rdfullName', 'Fullname', 'required');
                $this->form_validation->set_rules('rdbankName', 'Bank', 'required');
                $this->form_validation->set_rules('rdabaSwift', 'Routing', 'required');
                $this->form_validation->set_rules('rdaccNumber', 'Account NUmber', 'required');
                $this->form_validation->set_rules('rdphoneNumber', 'Phone', 'required');
                $this->form_validation->set_rules('rdrecEmail', 'Email', 'required');
            } else{
                echo 'it is not website or bank';
            }
                
            if($this->form_validation->run() == FALSE){
                echo 'validation is false';
            }else {  
                $userDet = $this->model_getvalues->getTableRows3("pd_users", "email =", $_SESSION['username'], "pdu_id", "desc", 1);
                if($this->input->post('rdpayreq') == 'website'){
                    
                    $array = array(
                    "pdu_id" => $userDet['pdu_id'],
                    "amount" => $this->input->post('rdpayamount'),
                    "amountExchange" => $getRateVal,
                    "commission" => $getCommVal,
                    "country" => $this->input->post('rdcountry'),
                    "des" => $this->input->post('rddes'),
                    "payreq" => $this->input->post('rdpayreq'),
                    "url" => $this->input->post('rdurlz'),
                    "date" => date('m/d/Y H:i:s'),
                    "rate" => $this->input->post('rate')
                    );
                    if ($this->Model_insertvalues->addItem($array, 'pd_dollar_requests')) {
                        $this->session->set_flashdata('msgRequest2', '<div class="input-group" style="margin: 10px 10px; line-height: 1px;"><h3 style="color: blue;">Request Placed!</h3></div>'); 
                        //redirect(current_url());
                    }
                    
                } else if($this->input->post('rdpayreq') == 'bank'){
                    $array = array(
                            "pdu_id" => $userDet['pdu_id'],
                            "amount" => $this->input->post('rdpayamount'),
                            "amountExchange" => $getRateVal,
                            "commission" => $getCommVal,
                            "country" => $this->input->post('rdcountry'),
                            "des" => $this->input->post('rddes'),
                            "payreq" => $this->input->post('rdpayreq'),
                            "date" => date('m/d/Y H:i:s'),
                            "fullName" => $this->input->post('rdfullName'),
                            "bankName" => $this->input->post('rdbankName'),
                            "abaSwift" => $this->input->post('rdabaSwift'),
                            "accNumber" => $this->input->post('rdaccNumber'),
                            "phone" => $this->input->post('rdphoneNumber'),
                            "email" => $this->input->post('rdrecEmail'),
                            "rate" => $this->input->post('rate')
                        );
                        if ($this->model_insertvalues->addItem($array, 'pd_dollar_requests')) {
                            //$data["status"] = $this->model_htmldata->successMsg("New Agent Added");
                            //$data["status"] = $this->model_htmldata->successMsg("Employee Data Successfully Added");
                            $this->session->set_flashdata('msgRequest2', '<div class="input-group" style="margin: 10px 10px; line-height: 1px;"><h3 style="color: blue;">Request To Bank Placed!</h3></div>'); 
                        }
                }
            }
        }else if($formsubmit == 'create_gc'){
        	$data['active'] = 4;
        	// Check for validation..
        	$this->form_validation->set_rules('gcpayamount', 'Amount in USD', 'required');
            if ($this->form_validation->run() == FALSE){
            	echo 'validation is false';
            }else{
                $userDet = $this->model_getvalues->getTableRows3("pd_users", "email =", $_SESSION['username'], "pdu_id", "desc", 1);
                $rate = $this->model_getvalues->getTableRows3("pd_rate", "id =", 1, "id", "desc", 1);
                $getRateVal = $this->input->post('gcpayamount') * $rate['rate'];
                $getCommVal = $this->input->post('gcpayamount') * 0.05;
                echo $this->input->post('gcamountVal');
                $da = array(
                    "amount_usd" => $this->input->post('gcpayamount'),
                    "user_id" => $userDet['pdu_id'],
                    "amount_naira" => $getRateVal,
                    "date" => date('m/d/Y H:i:s'),
                    "commission" => $getCommVal,
                    "rate" => $this->input->post('rate')
                );
                if ($this->Model_insertvalues->addItem($da, 'pd_gift')) {
                    $this->session->set_flashdata('msgRequest3', '<div class="input-group" style="margin: 10px 10px; line-height: 1px;"><h3 style="color: blue;">Request For Gift Card Placed!</h3></div>');
                }
            }
        }else{
            //echo 'this is an error';
        }
        $data['rate'] = $this->model_getvalues->getTableRows3("pd_rate", "id !=", 0, "id", "desc", 1);
        $this->load->view('layouts/header', $data);
        $this->load->view('accounts/dashboard');
        $this->load->view('layouts/footer');
        
    }
    
    
    public function requests(){
        $sess['logged_in'] = $this->session->userdata('logged_in');
        if($this->session->userdata() && $sess['logged_in'] == FALSE){
            redirect('site/home');
        }
        $data['username'] = $_SESSION['username'];
        $data['active'] = "requests";
        $data["i"] = 0;
        $data["edit"] = "";
        $data['active'] = "requests";
        $userDet = $this->model_getvalues->getTableRows3("pd_users", "email =", $_SESSION['username'], "pdu_id", "desc", 1);
        $data['rate'] = $this->model_getvalues->getTableRows3("pd_rate", "id !=", 0, "id", "desc", 1);
        $data['nairar'] = $this->model_getvalues->getTableRows('pd_requests', "pdu_id =", $userDet['pdu_id'], "req_id","desc");
        $data['dollarr'] = $this->model_getvalues->getTableRows('pd_dollar_requests', "pdu_id=",$userDet['pdu_id'], "req_id","desc");
        $data["giftr"] = $this->model_getvalues->getTableRows("pd_gift", "user_id =", $userDet['pdu_id'], "id", "desc");

        $this->load->view('layouts/header', $data);
        $this->load->view('accounts/requests');
        $this->load->view('layouts/footer');
        
    }
    
    public function profile(){
        $sess['logged_in'] = $this->session->userdata('logged_in');
        if($this->session->userdata() && $sess['logged_in'] == FALSE){
            
            redirect('site/home');
        }
        $data['username'] = $_SESSION['username'];
        $data['active'] = "requests";
        $data["i"] = 0;
        $data["edit"] = "";
        $data['active'] = "requests";
        $data['rate'] = $this->model_getvalues->getTableRows3("pd_rate", "id =", 1, "id", "desc", 1);
        $data["usersDetails"] = $this->model_getvalues->getTableRows3("pd_users", "email =", $_SESSION['username'], "pdu_id", "desc", 1);
        
        $this->load->view('layouts/header', $data);
        $this->load->view('accounts/profile');
        $this->load->view('layouts/footer');
    }
    
    public function forgot() {
    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    	if($this->form_validation->run() == FALSE) {
    		$this->load->view('layouts/header');
    		$this->load->view('accounts/forgot');
    		$this->load->view('layouts/footer');
    	}else{
    		$email = $this->input->post('email');
    		$clean = $this->security->xss_clean($email);
    		$userInfo = $this->model_getvalues->getTableRows3("pd_users", "email =", $this->input->post('email'), "pdu_id", "desc", 1);
    		
    		if(!$userInfo){
    			$this->session->set_flashdata('fmsg', 'We cant find your email address');
    			redirect(site_url().'/accounts/forgot');
    		}
    		
    		//build token
    		$token = $this->Model_user->insertToken($userInfo['pdu_id']);
    		$qstring = $this->base64url_encode($token);
    		$url = site_url() . '/accounts/reset_password/token/' . $qstring;
    		$link = '<a href="' . $url . '">' . $url . '</a>';
    		
    		$message = '';
    		$message .= '<strong>A password reset has been requested for this email account</strong><br />';
    		$message .= '<strong>Please click the link below to recover your password:</strong><br />';
            $message .= $link;

            $this->sendRecoveryEmail($this->input->post('email'),$message);//send this through mail

            $this->session->set_flashdata('fmsg2', 'An Email has been sent to you, Please check your email.');
    		redirect(site_url().'/accounts/forgot');
    	}
    }
    
    public function reset_password()
    {
    	$token = $this->base64url_decode($this->uri->segment(4));
    	$cleanToken = $this->security->xss_clean($token);
    
    	$user_info = $this->Model_user->isTokenValid($cleanToken); //either false or array();
    
    	if(!$user_info){
    		$this->session->set_flashdata('flash_message', 'Token is invalid or expired');
    		redirect(site_url().'main/login');
    	}
    	$data = array(
    			'fullName'=> $user_info->fullName,
    			'email'=>$user_info->email,
    			//                'user_id'=>$user_info->id,
    			'token'=>$this->base64url_encode($token)
    	);
    	 
    	$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
    	$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
    
    	if ($this->form_validation->run() == FALSE) {
    		$this->load->view('layouts/header');
    		$this->load->view('accounts/reset_password', $data);
    		$this->load->view('layouts/footer');
    	}else{
    		$post = $this->input->post(NULL, TRUE);
    		$cleanPost = $this->security->xss_clean($post);
    		$hashed = $this->encryption->encrypt($cleanPost['password']);
    		$cleanPost['password'] = $hashed;
    		$cleanPost['user_id'] = $user_info->pdu_id;
    		unset($cleanPost['passconf']);
    		if(!$this->Model_user->updatePassword($cleanPost)){
    			$this->session->set_flashdata('rmsg', 'There was a problem updating your password');
    		}else{
    			$this->session->set_flashdata('rmsg', 'Your password has been updated. You may now login');
    		}
    		redirect(site_url().'/site/login');
    	}
    }
    
    public function base64url_encode($data) {
    	return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
    public function base64url_decode($data) {
    	return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
    
    function postAngForm(){
        //$this->table = "employee";
        $mydata = json_decode(file_get_contents('php://input'), true);
        
        $array = array(
            "empno" => $mydata['empno'],
            "fname" => $mydata['fname'],
            "lname" => $mydata['lname']
        );
        if ($this->model_insertvalues->addItem($array, $this->table)) {
            $data["status"] = $this->model_htmldata->successMsg("Employee Data Successfully Added");
        }
        //$empno = $this->input->post('empno');
        
    }

    public function getoptions($x="") {
        
        
                               
    }
    
    public function getCurrency(){
        //check if is an ajax request
        if ($this->input->is_ajax_request()) {
            //checks if the variable data exists on the posted data
            if ($this->input->post('data')) {
                $this->load->model('Model_getvalues');
                //query in your model you should verify if the data passed is legit before 
                //getTableRows($table, $where, $whereVal, $orderby, $orderVal = "desc", $limit = 0)
                $price = $this->model_getvalues->getTableRows3("pd_rate", "id =", $this->input->post('data'), "id", "desc", 1);
                echo $price['sell_rate'];
            }
        }
    }

    function check_default($post_string) {
        if($post_string == 1){
            $this->form_validation->set_message('check_default', 'You need to select a country option');
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    
    function check_curr($post_string) {
        if ($post_string == 1) {
            $this->form_validation->set_message('check_curr', 'You need to select a currency option');
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    
    function check_req($post_string) {
        if ($post_string == 1) {
            $this->form_validation->set_message('check_req', 'You need to select a Website or Receiver requirement option');
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    
    function sucmsg(){
    	$this->load->view('layouts/header');
    	$this->load->view('accounts/successpage');
    	$this->load->view('layouts/footer');
    }
    function signout(){     
        session_destroy();
        redirect('site/home');
    } 

    public function sendRecoveryEmail($email, $msg) {
        
        // Multiple recipients
        $to = $email; // note the comma

        // Subject
        $subject = 'Password Recovery for PayDelegate.com Account';

        // Message
        $message = '
        <html><head><style>

        body {
            padding: 0;
            margin: 0;
        }

        html { -webkit-text-size-adjust:none; -ms-text-size-adjust: none;}
        @media only screen and (max-device-width: 680px), only screen and (max-width: 680px) { 
            *[class="table_width_100"] {
                        width: 96% !important;
                }
                *[class="border-right_mob"] {
                        border-right: 1px solid #dddddd;
                }
                *[class="mob_100"] {
                        width: 100% !important;
                }
                *[class="mob_center"] {
                        text-align: center !important;
                }
                *[class="mob_center_bl"] {
                        float: none !important;
                        display: block !important;
                        margin: 0px auto;
                }	
                .iage_footer a {
                        text-decoration: none;
                        color: #929ca8;
                }
                img.mob_display_none {
                        width: 0px !important;
                        height: 0px !important;
                        display: none !important;
                }
                img.mob_width_50 {
                        width: 40% !important;
                        height: auto !important;
                }
        }
        .table_width_100 {
                width: 680px;
        }

        </style>

        </head><body><div id="mailsub" class="notification" align="center">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tbody><tr><td align="center" bgcolor="#eff3f8">
        <!--[if gte mso 10]>
        <table width="680" border="0" cellspacing="0" cellpadding="0">
        <tr><td>
        <![endif]-->
        <table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">
            <tbody>
                <!--header -->
                <tr><td align="center" bgcolor="#ffffff">
                        <!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div>
                        <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                <tbody><tr><td align="left"><!-- 

                                        Item --><div class="mob_center_bl" style="float: left; display: inline-block; width: 115px;">
                                                <table class="mob_center" width="115" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                        <tbody><tr><td align="left" valign="middle">
                                                                <!-- padding --><div style="height: 20px; line-height: 20px; font-size: 10px;">&nbsp;</div>
                                                                <table width="115" border="0" cellspacing="0" cellpadding="0">
                                                                        <tbody><tr><td align="left" valign="top" class="mob_center">
                                                                                <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
                                                                                <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
                                                                                <img src="paydelegate.com/asset/images/logo.png" alt="PayDelegate" border="0" style="display: block;"></font></a>
                                                                        </td></tr>
                                                                </tbody></table>						
                                                        </td></tr>
                                                </tbody></table></div><!-- Item END--><!--[if gte mso 10]>
                                                </td>
                                                <td align="right">
                                        <![endif]--><!-- 

                                        Item --><div class="mob_center_bl" style="float: right; display: inline-block; width: 88px;">
                                                <table width="88" border="0" cellspacing="0" cellpadding="0" align="right" style="border-collapse: collapse;">
                                                        <tbody><tr><td align="right" valign="middle">
                                                                <!-- padding --><div style="height: 20px; line-height: 20px; font-size: 10px;">&nbsp;</div>
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tbody><tr><td align="right">
                                                                                <!--social -->
                                                                                <div class="mob_center_bl" style="width: 88px;">
                                                                                <table border="0" cellspacing="0" cellpadding="0">
                                                                                        <tbody>
                                                                                        <tr>
                                                                                <td width="30"
                                                                                    align="center"
                                                                                    style="line-height: 19px;">
                                                                                    <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                                                        <font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
                                                                                        <img src="paydelegate.com/asset/images/facebook.png" alt="Facebook" />
                                                                                        </font>
                                                                                    </a>
                                                                                </td>
                                                                                <td
                                                                                    width="39"
                                                                                    align="center"
                                                                                    style="line-height: 19px;">
                                                                                    <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                                                        <font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
                                                                                        <img src="paydelegate.com/asset/images/twitter.png" alt="Twitter" />
                                                                                        </font>
                                                                                    </a>
                                                                                </td>
                                                                                <td width="29" align="right"
                                                                                    style="line-height: 19px;">
                                                                                    <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                                                        <font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
                                                                                        <img src="paydelegate.com/asset/images/instagram.png" alt="Instagram" />
                                                                                        </font>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                                </tbody></table>
                                                                                </div>
                                                                                <!--social END-->
                                                                        </td></tr>
                                                                </tbody></table>
                                                        </td></tr>
                                                </tbody></table></div><!-- Item END--></td>
                                </tr>
                        </tbody></table>
                        <!-- padding --><div style="height: 50px; line-height: 50px; font-size: 10px;">&nbsp;</div>
                </td></tr>
                <!--header END-->

                <!--content 1 -->
                <tr><td align="center" bgcolor="#fbfcfd">
                        <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                <tbody><tr><td align="center">
                                        <!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;">&nbsp;</div>
                                        <div style="line-height: 44px;">
                                                <font face="Arial, Helvetica, sans-serif" size="5" color="#57697e" style="font-size: 34px;">
                                                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
                                                        Password Recovery Request
                                                </span></font>
                                        </div>
                                        <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;">&nbsp;</div>
                                </td></tr>
                                <tr><td align="center">
                                        <div style="line-height: 24px;">
                                                <font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
                                                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
                                                        ' . $msg . '
                                                </span></font>
                                        </div>
                                        <!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;">&nbsp;</div>
                                </td></tr>
                                <tr><td align="center">
                                        <div style="line-height: 24px;">
                                                <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
                                                        <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
                                                                </font></a>
                                        </div>
                                        <!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;">&nbsp;</div>
                                </td></tr>
                        </tbody></table>		
                </td></tr>
                <!--content 1 END-->
                <!--footer -->
                <tr><td class="iage_footer" align="center" bgcolor="#ffffff">
                        <!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;">&nbsp;</div>	

                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody><tr><td align="center">
                                        <font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;">
                                        <span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
                                                2016 &copy; PayDelegate.com. ALL Rights Reserved.
                                        </span></font>				
                                </td></tr>			
                        </tbody></table>

                        <!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;">&nbsp;</div>	
                </td></tr>
                <!--footer END-->
                <tr><td>
                <!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;">&nbsp;</div>
                </td></tr>
        </tbody></table>
        <!--[if gte mso 10]>
        </td></tr>
        </table>
        <![endif]-->

        </td></tr>
        </tbody></table>

        </div></body></html>
        ';

        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Additional headers
        $headers[] = 'To '. $email;
        $headers[] = 'From: Sales <sales@paydelegate.com>';
        $headers[] = 'Cc: sales@paydelegate.com';
        $headers[] = 'Bcc: paydeledate@gmail.com';

        // Mail it
        mail($to, $subject, $message, implode("\r\n", $headers));
        
    }
    
    public function naira_request($stat = ""){
        $sess['logged_in'] = $this->session->userdata('logged_in');
        if($this->session->userdata() && $sess['logged_in'] == FALSE){
            redirect('site/home');
        }
        
        $data["msg"] = "";
        if ($stat === "success") {
            $data["msg"] = $this->model_htmldata->successMsg("Request Placed!");
        }
        
        $data['username'] = $_SESSION['username'];
        
        //$this->form_validation->set_rules('payreq', 'Website or Receiver Option ', 'required|callback_check_req');
        $formsubmit = $this->input->post('makeRequest');
        if($formsubmit == 'create_pfm'){
            $this->form_validation->set_rules('currency', 'Currency', 'required');
            $this->form_validation->set_rules('amount', 'Amount', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required|callback_check_default');
            $this->form_validation->set_rules('des', 'Description', 'required');
            if ($this->form_validation->run() == FALSE){
            	//redirect(current_url());
            }
            else{
                    $userDet = $this->model_getvalues->getTableRows3("pd_users", "email =", $_SESSION['username'], "pdu_id", "desc", 1);
                    $rate = $this->model_getvalues->getTableRows3("pd_rate", "id =", 1, "id", "desc", 1);
                    $getRateVal = $this->input->post('amount') * $rate['sell_rate'];
                    $getCommVal = $this->input->post('amount') * 0.05;
                    $da = array(
                        "currency" => $this->input->post('currency'),
                        "amount" => $this->input->post('amount'),
                        "pdu_id" => $userDet['pdu_id'],
                        "country" => $this->input->post('country'),
                        "des" => $this->input->post('des'),
                        "amountExchange" => $getRateVal,
                        "date" => date('m/d/Y H:i:s'),
                        "commission" => $getCommVal,
                        "rate" => $this->input->post('rate')
                    );
                    if ($this->Model_insertvalues->addItem($da, $this->table)) {
                        //$this->session->set_flashdata('msgRequest', '<div class="input-group" style="margin: 10px 10px; line-height: 1px;"><h3 style="color: blue;">Request Placed!</h3></div>'); 
                        redirect('accounts/naira_request/success');
                    }
            }
            
        }
        //$data['rate'] = $this->model_getvalues->getTableRows("pd_rate", "id !=", 0, "id", "desc", 1);
        $data['rate'] = $this->model_getvalues->getTableRow("pd_rate", "id", "asc");
        $this->load->view('layouts/header', $data);
        $this->load->view('accounts/request-naira');
        $this->load->view('layouts/footer');
    }
    
    public function dollar_request($stat=""){
        $sess['logged_in'] = $this->session->userdata('logged_in');
        if($this->session->userdata() && $sess['logged_in'] == FALSE){
            redirect('site/home');
        }
        
        $data["msg"] = "";
        $data['username'] = $_SESSION['username'];
        
        if ($stat === "success") {
            $data["msg"] = $this->model_htmldata->successMsg("Request Placed!");
        }
        
        //$this->form_validation->set_rules('payreq', 'Website or Receiver Option ', 'required|callback_check_req');
        $formsubmit = $this->input->post('makeRequest');
        if($formsubmit == 'create_dr'){
            $data['active'] = 3;
            
            $rate = $this->model_getvalues->getTableRows3("pd_rate", "id =", 1, "id", "desc", 1);
            $getRateVal = $this->input->post('rdpayamount') * $rate['sell_rate'];
            $getCommVal = $getRateVal * 0.05;
            
            $this->form_validation->set_rules('rdpayamount', 'Requested Amount', 'required');
            //$this->form_validation->set_rules('rdamountVal', 'Requested Amount', 'required');
            //$this->form_validation->set_rules('rdamountComm', 'Requested Amount', 'required');
            //$this->form_validation->set_rules('rdcountry', 'Country', 'required|callback_check_default');
            $this->form_validation->set_rules('rddes', 'Description', 'required');
            $this->form_validation->set_rules('rdpayreq', 'Payment Option', 'required|callback_check_req');
            $rdpayreq = $this->input->post('rdpayreq');

            if($rdpayreq == 'website'){
                $this->form_validation->set_rules('rdurlz', 'URL field', 'trim|required');
                //echo 'it is a great website or <br />';
            } else if(trim($rdpayreq) == 'bank'){
                $this->form_validation->set_rules('rdfullName', 'Fullname', 'required');
                $this->form_validation->set_rules('rdbankName', 'Bank', 'required');
                $this->form_validation->set_rules('rdabaSwift', 'Routing', 'required');
                $this->form_validation->set_rules('rdaccNumber', 'Account NUmber', 'required');
                $this->form_validation->set_rules('rdphoneNumber', 'Phone', 'required');
                $this->form_validation->set_rules('rdrecEmail', 'Email', 'required');
            } else{
                //echo 'it is not website or bank';
            }
                
            if($this->form_validation->run() == FALSE){
                //redirect(current_url());
            }else {  
                $userDet = $this->model_getvalues->getTableRows3("pd_users", "email =", $_SESSION['username'], "pdu_id", "desc", 1);
                if($this->input->post('rdpayreq') == 'website'){
                    
                    $array = array(
                    "pdu_id" => $userDet['pdu_id'],
                    "amount" => $this->input->post('rdpayamount'),
                    "amountExchange" => $getRateVal,
                    "commission" => $getCommVal,
                    //"country" => $this->input->post('rdcountry'),
                    "des" => $this->input->post('rddes'),
                    "payreq" => $this->input->post('rdpayreq'),
                    "url" => $this->input->post('rdurlz'),
                    "date" => date('m/d/Y H:i:s'),
                    "rate" => $this->input->post('rate')
                    );
                    if ($this->Model_insertvalues->addItem($array, 'pd_dollar_requests')) {
                        // Send dollar request email...
                        $this->sendNotificationEmail($this->session->userdata('email'), $this->session->userdata('fullname'));
                        //$this->session->set_flashdata('msgRequest2', '<div class="input-group" style="margin: 10px 10px; line-height: 1px;"><h3 style="color: blue;">Request Placed!</h3></div>'); 
                        redirect('accounts/dollar_request/success');
                    }
                    
                }else if($this->input->post('rdpayreq') == 'bank'){
                    $array = array(
                            "pdu_id" => $userDet['pdu_id'],
                            "amount" => $this->input->post('rdpayamount'),
                            "amountExchange" => $getRateVal,
                            "commission" => $getCommVal,
                            //"country" => $this->input->post('rdcountry'),
                            "des" => $this->input->post('rddes'),
                            "payreq" => $this->input->post('rdpayreq'),
                            "date" => date('m/d/Y H:i:s'),
                            "fullName" => $this->input->post('rdfullName'),
                            "bankName" => $this->input->post('rdbankName'),
                            "abaSwift" => $this->input->post('rdabaSwift'),
                            "accNumber" => $this->input->post('rdaccNumber'),
                            "phone" => $this->input->post('rdphoneNumber'),
                            "email" => $this->input->post('rdrecEmail'),
                            "rate" => $this->input->post('rate')
                        );
                        if ($this->Model_insertvalues->addItem($array, 'pd_dollar_requests')) {
                            $this->sendNotificationEmail($this->session->userdata('email'), $this->session->userdata('fullname'));
                            redirect('accounts/dollar_request/success');
                            /*if ($this->sendNotificationEmail($this->session->userdata('email'), $this->session->userdata('fullname'))) {
                            redirect('accounts/dollar_request/success');
                            } else {
                                echo "cannot send message..";
                            }*/
                        }
                }
            }
        }
        else{
            //echo 'this is an error';
        }
        $data['rate'] = $this->model_getvalues->getTableRows3("pd_rate", "id =", 1, "id", "desc", 1);
        $data['commission'] = $this->model_getvalues->getTableRows3("pd_commissions", "id =", 1, "id", "desc", 1);
        $this->load->view('layouts/header', $data);
        $this->load->view('accounts/request-dollar');
        $this->load->view('layouts/footer');
    }
    
    public function gift_request($stat=""){
        $sess['logged_in'] = $this->session->userdata('logged_in');
        if($this->session->userdata() && $sess['logged_in'] == FALSE){
            redirect('site/home');
        }
        
        
        $data['username'] = $_SESSION['username'];
        
        $data["msg"] = "";
        if ($stat === "success") {
            $data["msg"] = $this->model_htmldata->successMsg("Request For Gift Card Placed!");
        }
        
        //$this->form_validation->set_rules('payreq', 'Website or Receiver Option ', 'required|callback_check_req');
        $formsubmit = $this->input->post('makeRequest');
        if($formsubmit == 'create_gc'){
        	$data['active'] = 4;
        	// Check for validation..
        	$this->form_validation->set_rules('gcpayamount', 'Amount in USD', 'required');
            if ($this->form_validation->run() == FALSE){
            	echo 'validation is false';
            }else{
                $userDet = $this->model_getvalues->getTableRows3("pd_users", "email =", $_SESSION['username'], "pdu_id", "desc", 1);
                $rate = $this->model_getvalues->getTableRows3("pd_rate", "id =", 1, "id", "desc", 1);
                $getRateVal = $this->input->post('gcpayamount') * $rate['rate'];
                $getCommVal = $this->input->post('gcpayamount') * 0.05;
                echo $this->input->post('gcamountVal');
                $da = array(
                    "amount_usd" => $this->input->post('gcpayamount'),
                    "user_id" => $userDet['pdu_id'],
                    "amount_naira" => $getRateVal,
                    "date" => date('m/d/Y H:i:s'),
                    "commission" => $getCommVal,
                    "rate" => $this->input->post('rate')
                );
                if ($this->Model_insertvalues->addItem($da, 'pd_gift')) {
                    //$this->session->set_flashdata('msgRequest3', '<div class="input-group" style="margin: 10px 10px; line-height: 1px;"><h3 style="color: blue;">Request For Gift Card Placed!</h3></div>');
                    redirect('accounts/gift_request/success');
                }
            }
        }
        else{
            //echo 'this is an error';
        }
        $data['rate'] = $this->model_getvalues->getTableRows3("pd_rate", "id !=", 0, "id", "desc", 1);
        $this->load->view('layouts/header', $data);
        $this->load->view('accounts/request-gift');
        $this->load->view('layouts/footer');
    }
    
    public function sendNotificationEmail($email, $name){
        // Multiple recipients
        $to = $email; // note the comma
        // Subject
        $subject = 'Request made on PayDelegate.com';
        
        // Message
        $message = '
<style>
    body {
        padding: 0;
        margin: 0;
    }

    html {
        -webkit-text-size-adjust: none;
        -ms-text-size-adjust: none;
    }

    @media only screen and (max-device-width: 680px),
    only screen and (max-width: 680px) {
        *[class="table_width_100"] {
            width: 96% !important;
        }
        *[class="border-right_mob"] {
            border-right: 1px solid #dddddd;
        }
        *[class="mob_100"] {
            width: 100% !important;
        }
        *[class="mob_center"] {
            text-align: center !important;
        }
        *[class="mob_center_bl"] {
            float: none !important;
            display: block !important;
            margin: 0px auto;
        }
        .iage_footer a {
            text-decoration: none;
            color: #929ca8;
        }
        img.mob_display_none {
            width: 0px !important;
            height: 0px !important;
            display: none !important;
        }
        img.mob_width_50 {
            width: 40% !important;
            height: auto !important;
        }
    }

    .table_width_100 {
        width: 680px;
    }
</style>
<div id="mailsub" class="notification" align="center">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;">
        <tr>
            <td align="center" bgcolor="#eff3f8">
                <table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">
                    <tr>
                        <td>
                            <!-- padding -->
                            <div style="height: 80px; line-height: 80px; font-size: 10px;"></div>
                        </td>
                    </tr>
                    <!--header -->
                    <tr>
                        <td align="center" bgcolor="#ffffff">
                            <!-- padding -->
                            <div style="height: 30px; line-height: 30px; font-size: 10px;"></div>
                            <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="left">
                                        <!--Item -->
                                        <div class="mob_center_bl" style="float: left; display: inline-block; width: 115px;">
                                            <table class="mob_center" width="115" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr>
                                                    <td align="left" valign="middle">
                                                        <!-- padding -->
                                                        <div style="height: 20px; line-height: 20px; font-size: 10px;"></div>
                                                        <table width="115" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td align="left" valign="top" class="mob_center">
                                                                    <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
                                                                        <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
                                                                        <img src="http://paydelegate.com/asset/images/logo.png" alt="PayDelegate" border="0" style="display: block;" /></font>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- Item END-->
                                        <!--[if gte mso 10]>
                            </td>
                            <td align="right">
                    <![endif]-->
                                        <!-- 

                    Item -->
                                        <div class="mob_center_bl" style="float: right; display: inline-block; width: 88px;">
                                            <table width="88" border="0" cellspacing="0" cellpadding="0" align="right" style="border-collapse: collapse;">
                                                <tr>
                                                    <td align="right" valign="middle">
                                                        <!-- padding -->
                                                        <div style="height: 20px; line-height: 20px; font-size: 10px;"></div>
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td align="right">
                                                                    <!--social -->
                                                                    <div class="mob_center_bl" style="width: 88px;">
                                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                                            <tr>
                                                                                <td width="30"
                                                                                    align="center"
                                                                                    style="line-height: 19px;">
                                                                                    <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                                                        <font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
                                                                                        <img src="http://paydelegate.com/asset/images/facebook.png" alt="Facebook" />
                                                                                        </font>
                                                                                    </a>
                                                                                </td>
                                                                                <td
                                                                                    width="39"
                                                                                    align="center"
                                                                                    style="line-height: 19px;">
                                                                                    <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                                                        <font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
                                                                                        <img src="http://paydelegate.com/asset/images/twitter.png" alt="Twitter" />
                                                                                        </font>
                                                                                    </a>
                                                                                </td>
                                                                                <td width="29" align="right"
                                                                                    style="line-height: 19px;">
                                                                                    <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                                                        <font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
                                                                                        <img src="http://paydelegate.com/asset/images/instagram.png" alt="Instagram" />
                                                                                        </font>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <!--social END-->
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- Item END-->
                                    </td>
                                </tr>
                            </table>
                            <!-- padding -->
                            <div style="height: 50px; line-height: 50px; font-size: 10px;"></div>
                        </td>
                    </tr>
                    <!--header END-->

                    <!--content 1 -->
                    <tr>
                        <td align="center" bgcolor="#fbfcfd">
                            <table width="90%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center">
                                        <div style="line-height: 44px;">
                                            <font face="Arial, Helvetica, sans-serif" size="5" color="#57697e" style="font-size: 34px;">
                                            <span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
                                                Request successfully submitted! Please proceed to make payment in our partner account
                                                <br /><br />
                                                Thank you<br />
                                                Paydelegate Team
                                            </span></font>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <div style="line-height: 24px;">
                                            <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
                                                <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
                                                </font>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!--content 1 END-->

                    <!--content 3 -->
                    <!--
                    <tr>
                        <td align="center" bgcolor="#ffffff" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #eff2f4;">
                            <table width="94%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center">
                                        <div style="height: 80px; line-height: 80px; font-size: 10px;"></div>

                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center">
                                                    <font face="Arial, Helvetica, sans-serif" size="3" color="#57697e" style="font-size: 26px;">
                                                    <span style="font-family: Arial, Helvetica, sans-serif; font-size: 26px; color: #57697e;">
                                                        Partners
                                                    </span></font>
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="mob_100" style="float: left; display: inline-block; width: 33%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr>
                                                    <td align="center" style="line-height: 14px; padding: 0 10px;">
                                                        <div style="height: 40px; line-height: 40px; font-size: 10px;"></div>
                                                        <div style="line-height: 14px;">
                                                            <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                                <font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
                                                                <img src="" width="185" alt="Image 1" border="0" style="display: block; width: 100%; height: auto;" /></font>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="mob_100" style="float: left; display: inline-block; width: 33%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr>
                                                    <td align="center" style="line-height: 14px; padding: 0 10px;">
                                                        <div style="height: 40px; line-height: 40px; font-size: 10px;"></div>
                                                        <div style="line-height: 14px;">
                                                            <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                                <font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
                                                                <img src="" width="185" alt="Image 2" border="0" style="display: block; width: 100%; height: auto;" /></font>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="mob_100" style="float: left; display: inline-block; width: 33%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr>
                                                    <td align="center" style="line-height: 14px; padding: 0 10px;">
                                                        <div style="height: 40px; line-height: 40px; font-size: 10px;"></div>
                                                        <div style="line-height: 14px;">
                                                            <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                                <font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
                                                                <img src="" width="185" alt="Image 3" border="0" style="display: block; width: 100%; height: auto;" /></font>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="height: 80px; line-height: 80px; font-size: 10px;"></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> -->
                    <!--content 3 END-->

                    <!--brands -->
                    <!--
                    <tr>
                        <td align="center" bgcolor="#ffffff" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #eff2f4;">
                            <table width="94%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center">

                                        <div class="mob_100" style="float: left; display: inline-block; width: 25%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr>
                                                    <td align="center" style="line-height: 14px; padding: 0 24px;">
                                                        <div style="height: 30px; line-height: 30px; font-size: 10px;"></div>
                                                        <div style="line-height: 14px;">
                                                            <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                                <font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
                                                                <img src="" width="125" alt="Evernote" border="0" class="mob_width_50" style="display: block; width: 100%; height: auto;"
                                                                     /></font>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="mob_100" style="float: left; display: inline-block; width: 25%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr>
                                                    <td align="center" style="line-height: 14px; padding: 0 24px;">
                                                        <div style="height: 30px; line-height: 30px; font-size: 10px;"></div>
                                                        <div style="line-height: 14px;">
                                                            <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                                <font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
                                                                <img src="" width="107" alt="Pinterest" border="0" class="mob_width_50" style="display: block; width: 100%; height: auto;"
                                                                     /></font>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="mob_100" style="float: left; display: inline-block; width: 25%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr>
                                                    <td align="center" style="line-height: 14px; padding: 0 24px;">
                                                        <div style="height: 30px; line-height: 30px; font-size: 10px;"></div>
                                                        <div style="line-height: 14px;">
                                                            <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                                <font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
                                                                <img src="" width="103" alt="National Geographic" border="0" class="mob_width_50" style="display: block; width: 100%; height: auto;"
                                                                     /></font>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="mob_100" style="float: left; display: inline-block; width: 25%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr>
                                                    <td align="center" style="line-height: 14px; padding: 0 24px;">
                                                        <div style="height: 30px; line-height: 30px; font-size: 10px;"></div>
                                                        <div style="line-height: 14px;">
                                                            <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
                                                                <font face="Arial, Helvetica, sans-serif" size="2" color="#596167">
                                                                <img src="" width="116" alt="Shopify" border="0" class="mob_width_50" style="display: block; width: 100%; height: auto;"
                                                                     /></font>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="height: 28px; line-height: 28px; font-size: 10px;"></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>-->
                    <!--brands END-->

                    <!--footer -->
                    <tr>
                        <td class="iage_footer" align="center" bgcolor="#ffffff">
                            <!-- padding -->
                            <div style="height: 80px; line-height: 80px; font-size: 10px;"></div>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center">
                                        <font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;">
                                        <span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
                                            2016 &copy; PayDelegate.com. ALL Rights Reserved.
                                        </span></font>
                                    </td>
                                </tr>
                            </table>

                            <!-- padding -->
                            <div style="height: 30px; line-height: 30px; font-size: 10px;"></div>
                        </td>
                    </tr>
                    <!--footer END-->
                    <tr>
                        <td>
                            <!-- padding -->
                            <div style="height: 80px; line-height: 80px; font-size: 10px;"></div>
                        </td>
                    </tr>
                </table>
                <!--[if gte mso 10]>
      </td></tr>
      </table>
      <![endif]-->
            </td>
        </tr>
    </table>
</div>
        ';

        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Additional headers
        $headers[] = 'To ' . $name;
        $headers[] = 'From: Sales <paydeledate@gmail.com>';
        $headers[] = 'Cc: sales@paydelegate.com';
        $headers[] = 'Bcc: paydeledate@gmail.com';

        // Mail it
        mail($to, $subject, $message, implode("\r\n", $headers));
    }
    
    public function history(){
        $data['active'] = "";

        $data['username'] = $_SESSION['username'];
        $data['active'] = "requests";
        $data["i"] = 0;
        $data["edit"] = "";
        $data['active'] = "requests";
        $userDet = $this->model_getvalues->getTableRows3("pd_users", "email =", $_SESSION['username'], "pdu_id", "desc", 1);
        $data['rate'] = $this->model_getvalues->getTableRows3("pd_rate", "id !=", 0, "id", "desc", 1);
        $data['nairar'] = $this->model_getvalues->getTableRows('pd_requests', "pdu_id =", $userDet['pdu_id'], "req_id","desc");
        $data['dollarr'] = $this->model_getvalues->getTableRows('pd_dollar_requests', "pdu_id=",$userDet['pdu_id'], "req_id","desc");
        $data["giftr"] = $this->model_getvalues->getTableRows("pd_gift", "user_id =", $userDet['pdu_id'], "id", "desc");
        
        $this->load->view('layouts/header', $data);
        $this->load->view('accounts/history');
        $this->load->view('layouts/footer');
    }
}