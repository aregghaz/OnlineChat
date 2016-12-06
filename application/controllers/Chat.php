<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
        $this->load->library('session');
        $this->load->dbforge();
		$this->load->model('Chat_model');
    }
    /*------------------------------- incognito  ------------------------ */
    function incognito()
    {
        $this->load->view("chatView", $this->chatForAllUser($_POST['username']));
    }
    /*------------------------------- basic chat for all user  ------------------------ */
    function chatForAllUser()
    {
        $name['chat'] = $this->Chat_model->get_chat();
        $this->load->view('chat', $name);
    }
    /*-------------------------------end basic chat for all user  ------------------------ */
    /*-------------------------------sending message for all user  ------------------------ */
    function sendingMessage()
    {
        $send['nickname'] = $_POST['username'];
        $send['text'] = $_POST['user'];
        $send["nick"] = $_POST['username'];
        $this->Chat_model->insert_chat($send);
        $this->load->view("chatView", $this->chatForAllUser());
    }
    /*-------------------------------end  sending message for all user  ------------------------ */
    /*------------------------------- registration  ----------------- */
    public function registration()
    {
        if (isset($_POST['add'])) {
            $add['name'] = $_POST['name'];
            $add['Nickname'] = $_POST['regNicName'];
            $add['users'] = $this->Chat_model->insert_user($add);
            $newData = array(
                'userNick' => $_POST['regNicName'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newData);
            $this->load->view("chatView", $this->newChat());
        } else {
            $this->load->view('registration');
        }
    }
    /*-------------------------------end registration  ----------------- */
    /*------------------------------- Chat for registered user  ------------------------ */
    function newChat()
    {
        if (empty($_POST['tableName'])) {
            if ($this->session->userdata('nickName')) {
                $add['nickName'] = $this->session->userdata('userNick');
            }
            $name['nameTable'] = $this->Chat_model->get_all_room();
            $name['chat'] = $this->Chat_model->get_chat();
            $this->load->view("table", $name);
            $this->load->view('regchat', $name);
        }
        else {
            if ($this->session->userdata('nickName')) {
                $add['nickName'] = $this->session->userdata('userNick');
            }
            $roomId = $_POST['tableName'];
            $name['nameTable'] = $this->Chat_model->get_all_room();
            $name['chat'] = $this->Chat_model->get_chat_roomId($roomId);
            $this->load->view("table", $name);
            $this->load->view('regchat', $name);
        }
    }
    /*-------------------------------end Chat for registered user  ------------------------ */
    /*-------------------------------sending message for registered user  ------------------------ */
    function newChatSendMessage()
    {
        if (empty($_POST['tableName'])) {
            $send['nickname'] = $_POST['username'];
            $send['text'] = $_POST['user'];
            $send["nick"] = $_POST['username'];
            $this->Chat_model->insert_new_chat($send);
            $this->load->view("chatView", $this->newChat());
        } else {
            $send['nickname'] = $_POST['username'];
            $send['text'] = $_POST['user'];
            $send["nick"] = $_POST['username'];
			$send["id_room"] = $_POST['tableName'];
            $this->Chat_model->insert_new_chat_reg_user($send);
            $this->load->view("chatView", $this->newChat());
        }
    }
    /*------------------------------- create table for Chat for registered user  ------------------------ */
    function CreateTable()
    {
        $name['nameTable'] = $_POST['nameTable'];
        $name['nameUser'] = $_SESSION['userNick'];
        $this->Chat_model->insert_name_table($name);
        $name['nameTable'] = $this->Chat_model->get_all_room();
        $this->load->view("chatView", $this->newChat());
    }
    /*-------------------------------end create table for Chat for registered user ------------------------ */
}
