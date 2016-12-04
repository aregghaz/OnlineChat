<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
        $this->load->helper('form');
        $this->load->library('session');
    }


    public function registration()
    {
        if (isset($_POST['add'])) {
            $add['name'] = $_POST['name'];
            $add['Nickname'] = $_POST['Nickname'];
            $add['password'] = $_POST['password'];
            $this->load->model('Chat_model');
            $add['users'] = $this->Chat_model->insert_user($add);
            $newdata = array(
                'nickname' => $_POST['Nickname'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newdata);
            $this->load->view("chatView", $this->index());
        } else {
            $this->load->view('registration');
        }
    }

    function indexrandom()
    {

        if (isset($_POST['add'])) {
            $newdata = array(
                'nickname' => $_POST['username'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newdata);
            $this->load->view("chatView", $this->index());
        } else {
            $this->load->view('registration');
        }

    }

    function index()
    {

        $this->load->model('Chat_model');

        if ($this->session->userdata('nickname')) {
            $name['nickname'] = $this->session->userdata('nickname');
        }
        $name['chat'] = $this->Chat_model->get_chat();
        $this->load->view('chat', $name);

    }


    function index2()
    {
        $send['nickname'] = $_POST['username'];
        $send['text'] = $_POST['user'];
        $send["nick"] = $_POST['username'];
        $this->load->model('Chat_model');
        $this->Chat_model->insert_chat($send);
        $this->load->view("chatView", $this->index());

    }


}
