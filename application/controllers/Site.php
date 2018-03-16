<?php

/*
 * Controller for Default Page
 * Copyright padelegate.com
 * Developer Afolabi Kehinde
 * All rights Reserved
 */

class Site extends CI_Controller {

    public $table;

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('encryption');
        $this->table = "pd_users";
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Model_insertvalues');
        $this->load->model('Authentication_model');
        $this->load->model('Model_getvalues');
        $this->load->model('Model_user');
    }

    public function myph() {

        phpinfo();
    }

    public function home() {

        $data['active'] = "";


        $data["status"] = "";


        if ($this->input->post('regUser')) {

            $this->form_validation->set_rules('fname', 'Fullname', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['active'] = '1';
            } else {
                $dbdetails = $this->model_getvalues->getTableRows3("pd_users", "email =", $this->input->post('email'), "pdu_id", "desc", 1);
                if ($dbdetails !== FALSE) {
                    $this->session->set_flashdata('msg2', '<li><div class="input-group" style="margin: 10px 10px; line-height: 1px;"><span style="color: red;">Email Taken!</span></div></li>');
                } else {

                    $decnewpass = $this->encryption->encrypt($this->input->post('password'));
                    $array = array(
                        'fullName' => $this->input->post('fname'),
                        'email' => $this->input->post('email'),
                        'phone' => $this->input->post('phone'),
                        'password' => $decnewpass
                    );
                    if ($this->Model_insertvalues->addItem($array, $this->table)) {

                        $newdata = array(
                            'username' => $this->input->post('email'),
                            'email' => $this->input->post('email'),
                            'logged_in' => TRUE
                        );
                        $this->session->set_userdata($newdata);


                        $this->toMail($this->input->post('email'), $this->input->post('fname'));
                        //$this->session->set_flashdata('msg2', '<div class="input-group" style="margin: 10px 10px; line-height: 1px;"><span style="color: green;">Registered!</span></div>');
                        redirect('/accounts/sucmsg');
                        //$data["status"] = $this->model_htmldata->successMsg("New Agent Added");
                        //$data["status"] = $this->model_htmldata->successMsg("Employee Data Successfully Added");
                    }
                }
            }
        } elseif ($this->input->post('userLogin')) {

            $this->form_validation->set_rules('uName', 'Username', 'trim|required|valid_email');
            $this->form_validation->set_rules('pWord', 'Password', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data['active'] = '1';
            } else {
                $username = $this->input->post('uName');
                $password = $this->input->post('pWord');

                $dbdetails = $this->model_getvalues->getTableRows3("pd_users", "email =", $username, "pdu_id", "desc", 1);
                if ($dbdetails !== FALSE) {
                    $dbPass = $dbdetails['password'];
                    $dbDecPass = $this->encryption->decrypt($dbPass);
                    //$data['dbDecPass'] = $dbdetails['password'];

                    if ($dbDecPass == $password) {

                        $newdata = array(
                            'username' => $this->input->post('uName'),
                            'email' => $this->input->post('uName'),
                            'logged_in' => TRUE
                        );
                        $this->session->set_userdata($newdata);
                        redirect('/accounts/requests');
                    } else {

                        $this->session->set_flashdata('msg', '<li><div class="input-group" style="margin: 10px 10px; line-height: 1px;"><span style="color: red;">Invalid login!</span></div></li>');
                    }
                } else {

                    $this->session->set_flashdata('msg', '<li><div class="input-group" style="margin: 10px 10px; line-height: 1px;"><span style="color: red;">Invalid login!</span></div></li>');
                }
            }
        }

        $data['reguser'] = $this->model_getvalues->getTableRowWithLimit('pd_users', 'pdu_id', 'desc', 3);
        
        $this->load->view('layouts/header', $data);
        $this->load->view('index');
        $this->load->view('layouts/footer');
    }

    public function signup() {

        if ($this->input->post('signUpUser')) {

            $this->form_validation->set_rules('fname', 'Fullname', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['active'] = '1';
            } else {

                $dbdetails = $this->model_getvalues->getTableRows3("pd_users", "email =", $this->input->post('email'), "pdu_id", "desc", 1);
                if ($dbdetails !== FALSE) {

                    $this->session->set_flashdata('msg2', '<li><div class="input-group" style="margin: 10px 10px; line-height: 1px;"><span style="color: red;">Email Taken!</span></div></li>');
                } else {

                    $decnewpass = $this->encryption->encrypt($this->input->post('password'));
                    $array = array(
                        'fullName' => $this->input->post('fname'),
                        'email' => $this->input->post('email'),
                        'phone' => $this->input->post('phone'),
                        'password' => $decnewpass
                    );
                    if ($this->Model_insertvalues->addItem($array, $this->table)) {

                        $newdata = array(
                            'username' => $this->input->post('email'),
                            'email' => $this->input->post('email'),
                            'logged_in' => TRUE
                        );
                        $this->session->set_userdata($newdata);


                        $this->toMail($this->input->post('email'), $this->input->post('fname'));
                        //$this->session->set_flashdata('$sucMsg', '<div class="alert alert-success"><strong><i class=" icon-ok-4"></i> Success!</strong>');
                        redirect('/accounts/sucmsg');
                        //$data["status"] = $this->model_htmldata->successMsg("New Agent Added");
                        //$data["status"] = $this->model_htmldata->successMsg("Employee Data Successfully Added");
                    }
                }
            }
        }
        $this->load->view('layouts/header');
        $this->load->view('/accounts/register');
        $this->load->view('layouts/footer');
    }

    public function signin() {
        $sess['logged_in'] = $this->session->userdata('logged_in');
        if ($this->session->userdata() && $sess['logged_in'] == true) {
            redirect('accounts/requests');
        }

        $this->form_validation->set_rules('uName', 'Email/Username', 'required|valid_email');
        $this->form_validation->set_rules('pWord', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/header');
            $this->load->view('accounts/login');
            $this->load->view('layouts/footer');
        } else {

            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);

            $userInfo = $this->Model_user->checkLogin2($clean);

            if (!$userInfo) {
                $this->session->set_flashdata('flash_message', 'The login was unsucessful');
                redirect(site_url() . '/site/login');
            }
            foreach ($userInfo as $key => $val) {
                $this->session->set_userdata($key, $val);
            }
            redirect(site_url() . 'accounts/');
        }
    }

    public function login() {
        $sess['logged_in'] = $this->session->userdata('logged_in');
        if ($this->session->userdata() && $sess['logged_in'] == true) {
            redirect('accounts/requests');
        }
        //$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_rules('uName', 'Email/Username', 'required|valid_email');
        $this->form_validation->set_rules('pWord', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/header');
            $this->load->view('accounts/login');
            $this->load->view('layouts/footer');
        } else {

            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);

            $userInfo = $this->Model_user->checkLogin2($clean);

            if (!$userInfo) {
                $this->session->set_flashdata('flash_message', 'The login was unsucessful');
                redirect(site_url() . '/site/login');
            }
            foreach ($userInfo as $key => $val) {
                $this->session->set_userdata($key, $val);
            }
            redirect(site_url() . 'accounts/');
        }
    }

    public function contact() {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layouts/header');
            $this->load->view('contact');
            $this->load->view('layouts/footer');
        } else {
            // User info 
            $name = $this->security->xss_clean($this->input->post('name'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $phone = $this->security->xss_clean($this->input->post('phone'));
            $message = $this->security->xss_clean($this->input->post('message'));

            $data = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'message' => $message,
            ];
            $this->table = 'pd_guestbook';
            if ($this->Model_insertvalues->addItem($data, $this->table)) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Your request has been received successfully</div>');
                redirect(site_url() . '/site/contact');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">Message could not be sent!</div>');
                redirect(site_url() . '/site/contact');
            }
            
        }
    }

    public function toMail($email, $name) {

        // Multiple recipients
        $to = $email; // note the comma
        // Subject
        $subject = 'Welcome to PayDelegate.com';
        
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
                                                Welcome to PayDelegate <br />' . $email . '
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

                    <!--content 2 -->
                    <tr>
                        <td align="center" bgcolor="#ffffff" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #eff2f4;">
                            <table width="94%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center">
                                        <!-- padding -->
                                        <div style="height: 40px; line-height: 40px; font-size: 10px;"></div>

                                        <div class="mob_100" style="float: left; display: inline-block; width: 33%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr>
                                                    <td align="center" style="line-height: 14px; padding: 0 27px;">
                                                        <!-- padding -->
                                                        <div style="height: 40px; line-height: 40px; font-size: 10px;"></div>
                                                        <div style="line-height: 14px;">
                                                            <font face="Arial, Helvetica, sans-serif" size="3" color="#4db3a4" style="font-size: 14px;">
                                                            <strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #4db3a4;">
                                                                <a href="#1" target="_blank" style="color: #4db3a4; text-decoration: none;">Make USD Payments</a>
                                                            </strong></font>
                                                        </div>
                                                        <!-- padding -->
                                                        <div style="height: 18px; line-height: 18px; font-size: 10px;"></div>
                                                        <div style="line-height: 21px;">
                                                            <font face="Arial, Helvetica, sans-serif" size="3" color="#98a7b9" style="font-size: 14px;">
                                                            <span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #98a7b9;">
                                                                You can now make USD requests for payments online/us banks/for 
                                                                services with naira right from Nigeria or
                                                                 make payments into banks at home in NIgeria with USD
                                                            </span></font>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="mob_100" style="float: left; display: inline-block; width: 33%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr>
                                                    <td align="center" style="line-height: 14px; padding: 0 27px;">
                                                        <!-- padding -->
                                                        <div style="height: 40px; line-height: 40px; font-size: 10px;"></div>
                                                        <div style="line-height: 14px;">
                                                            <font face="Arial, Helvetica, sans-serif" size="3" color="#4db3a4" style="font-size: 14px;">
                                                            <strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #4db3a4;">
                                                                <a href="#2" target="_blank" style="color: #4db3a4; text-decoration: none;">Naira Payments</a>
                                                            </strong></font>
                                                        </div>
                                                        <!-- padding -->
                                                        <div style="height: 18px; line-height: 18px; font-size: 10px;"></div>
                                                        <div style="line-height: 21px;">
                                                            <font face="Arial, Helvetica, sans-serif" size="3" color="#98a7b9" style="font-size: 14px;">
                                                            <span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #98a7b9;">
                                                                You can now have naira payed into any Nigerian account from the USA at unbeatable rates
                                                            </span></font>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="mob_100" style="float: left; display: inline-block; width: 33%;">
                                            <table class="mob_100" width="100%" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
                                                <tr>
                                                    <td align="center" style="line-height: 14px; padding: 0 27px;">
                                                        <!-- padding -->
                                                        <div style="height: 40px; line-height: 40px; font-size: 10px;"></div>
                                                        <div style="line-height: 14px;">
                                                            <font face="Arial, Helvetica, sans-serif" size="3" color="#4db3a4" style="font-size: 14px;">
                                                            <strong style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #4db3a4;">
                                                                <a href="#3" target="_blank" style="color: #4db3a4; text-decoration: none;">Acquire Properties</a>
                                                            </strong></font>
                                                        </div>
                                                        <!-- padding -->
                                                        <div style="height: 18px; line-height: 18px; font-size: 10px;"></div>
                                                        <div style="line-height: 21px;">
                                                            <font face="Arial, Helvetica, sans-serif" size="3" color="#98a7b9" style="font-size: 14px;">
                                                            <span style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #98a7b9;">
                                                                You can now buy properties in Nigeria from the USA with our partners in the Real Estate
                                                            </span></font>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!--content 2 END-->

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
        $headers[] = 'From: Sales <sales@paydelegate.com>';
        $headers[] = 'Cc: sales@paydelegate.com';
        $headers[] = 'Bcc: paydeledate@gmail.com';

        // Mail it
        mail($to, $subject, $message, implode("\r\n", $headers));
    }

    public function about() {
        $data['active'] = "";

        $this->load->view('layouts/header', $data);
        $this->load->view('about');
        $this->load->view('layouts/footer');
    }

    public function faq() {
        $data['active'] = "";

        $this->load->view('layouts/header', $data);
        $this->load->view('faq');
        $this->load->view('layouts/footer');
    }

    public function newsletter() {
        $email = $this->security->xss_clean($this->input->post('email'));
        $data = [
            'email' => $email,
        ];
        $this->table = 'pd_newsletter';
        if ($this->Model_insertvalues->addItem($data, $this->table)) {
            echo "You have been added to our newsletter list";
        } else {
            echo "Message could not be sent!";
        }
    }

    public function terms() {
        $data['active'] = "";

        $this->load->view('layouts/header', $data);
        $this->load->view('terms');
        $this->load->view('layouts/footer');
    }

    public function policy() {
        $data['active'] = "";

        $this->load->view('layouts/header', $data);
        $this->load->view('policy');
        $this->load->view('layouts/footer');
    }

}
