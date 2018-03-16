<?php

/**
 * Model_insertValues
 *
 * @package paydelegate
 * @author Abiye Chris. I. Surulere
 * @copyright 2017
 * @version 1.0
 * @access public
 */
class Model_user extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    public function insertToken($user_id) {
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');

        $string = array(
            'token' => $token,
            'user_id' => $user_id,
            'created' => $date
        );
        $query = $this->db->insert_string('pd_tokens', $string);
        $this->db->query($query);
        return $token . $user_id;
    }

    public function isTokenValid($token) {
        $tkn = substr($token, 0, 30);
        $uid = substr($token, 30);

        $q = $this->db->get_where('pd_tokens', array(
            'pd_tokens.token' => $tkn,
            'pd_tokens.user_id' => $uid), 1);

        if ($this->db->affected_rows() > 0) {
            $row = $q->row();

            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d');
            $todayTS = strtotime($today);

            if ($createdTS != $todayTS) {
                return false;
            }

            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
        } else {
            return false;
        }
    }

    public function getUserInfo($id) {
        $q = $this->db->get_where('pd_users', array('pdu_id' => $id), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        } else {
            error_log('no user found getUserInfo(' . $id . ')');
            return false;
        }
    }

    public function updateUserInfo($post) {
        $data = array(
            'password' => $post['password'],
            'last_login' => date('Y-m-d h:i:s A'),
            'status' => $this->status[1]
        );
        $this->db->where('id', $post['user_id']);
        $this->db->update('users', $data);
        $success = $this->db->affected_rows();

        if (!$success) {
            error_log('Unable to updateUserInfo(' . $post['user_id'] . ')');
            return false;
        }

        $user_info = $this->getUserInfo($post['user_id']);
        return $user_info;
    }

    public function checkLogin($post) {
        //$this->load->library('password');
        $this->db->select('*');
        $this->db->where('email', $post['uName']);
        $this->db->where('status!=', $name);
        $query = $this->db->get('pd_users');
        $userInfo = $query->row();

        if (!$this->password->validate_password($post['pWord'], $userInfo->password)) {
            error_log('Unsuccessful login attempt(' . $post['email'] . ')');
            return false;
        }

        $this->updateLoginTime($userInfo->id);

        unset($userInfo->password);
        return $userInfo;
    }

    public function checkLogin2() {
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
                $status = $dbdetails['status'];
                $dbDecPass = $this->encryption->decrypt($dbPass);
                $fullname = $dbdetails['fullName'];
                //$data['dbDecPass'] = $dbdetails['password'];

                if ($dbDecPass == $password) {
                    if($status == 1){
                        $newdata = array(
                            'fullname' => $fullname,
                            'username' => $this->input->post('uName'),
                            'email' => $this->input->post('uName'),
                            'logged_in' => TRUE
                        );
                        $this->session->set_userdata($newdata);
                        redirect('/accounts/requests');
                    }
                    if($status == 0){
                        $this->session->set_flashdata('msg', '<li><span style="color: red;">Your account has been suspended, Please contact admin!</span></li>');
                    }
                } else {
                    $this->session->set_flashdata('msg', '<li><span style="color: red;">Invalid login!</span></li>');
                }
            } else {
                $this->session->set_flashdata('msg', '<li><span style="color: red;">Invalid login!</span></li>');
            }
        }
    }
    
    public function checkLogin3() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['active'] = '1';
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $dbdetails = $this->model_getvalues->getTableRows3("pd_admin", "email =", $email, "id", "desc", 1);
            if ($dbdetails !== FALSE) {
                $dbPass = $dbdetails['password'];
                $dbDecPass = $this->encryption->decrypt($dbPass);
                //$data['dbDecPass'] = $dbdetails['password'];

                if ($dbDecPass == $password) {

                    $newdata = array(
                        'username' => $this->input->post('username'),
                        'email' => $this->input->post('email'),
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($newdata);
                    redirect('/admin/dashboard');
                } else {

                    $this->session->set_flashdata('msg', '<li><span style="color: red;">Invalid login!</span></li>');
                }
            } else {

                $this->session->set_flashdata('msg', '<li><span style="color: red;">Invalid login!</span></li>');
            }
        }
    }

    public function updateLoginTime($id) {
        $this->db->where('id', $id);
        $this->db->update('users', array('last_login' => date('Y-m-d h:i:s A')));
        return;
    }

    public function getUserInfoByEmail($email) {
        $q = $this->db->get_where('users', array('email' => $email), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        } else {
            error_log('no user found getUserInfo(' . $email . ')');
            return false;
        }
    }

    public function updatePassword($post) {
        $this->db->where('pdu_id', $post['user_id']);
        $this->db->update('pd_users', array('password' => $post['password']));
        $success = $this->db->affected_rows();

        if (!$success) {
            error_log('Unable to updatePassword(' . $post['user_id'] . ')');
            return false;
        }
        return true;
    }

}
