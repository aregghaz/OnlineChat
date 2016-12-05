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
        $this->load->dbforge();
    }


    /*------------------------------- incognito  ------------------------ */
    function incognito()
    {

        $this->load->view("chatView", $this->chatForAllUser($_POST['username']));

    }

    /*------------------------------- basic chat for all user  ------------------------ */
    function chatForAllUser()
    {
        $this->load->model('Chat_model');

        $name['chat'] = $this->Chat_model->get_chat();
        $this->load->view('chat', $name);
    }

    /*-------------------------------end basic chat for all user  ------------------------ */

    /*-------------------------------end  sending message for all user  ------------------------ */
    function sendingMessage()
    {
        $send['nickname'] = $_POST['username'];
        $send['text'] = $_POST['user'];
        $send["nick"] = $_POST['username'];
        $this->load->model('Chat_model');
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

            $add['password'] = $_POST['password'];
            $this->load->model('Chat_model');
            $add['users'] = $this->Chat_model->insert_user($add);
            $newData = array(
                'userNick' => $_POST['regNicName'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newData);
            $this->load->view("chatView", $this->chatForAllUser());

        } else {
            $this->load->view('registration');
        }
    }
    /*-------------------------------end registration  ----------------- */
    /*------------------------------- Chat for registered user  ------------------------ */
    function newChat()
    {

        if ($this->session->userdata('nickName')) {
            $add['nickName'] = $this->session->userdata('userNick');
        }
        $this->load->model('Chat_model');
        $add['nameTable'] = $this->Chat_model->get_all_room();
        $this->load->view("table", $add);
        $this->load->view('chat', $add);


    }
    /*-------------------------------end Chat for registered user  ------------------------ */


    /*-------------------------------sending message for registered user  ------------------------ */

    function newChatSendMessage()
    {

        $send['nickname'] = $_POST['username'];
        $send['text'] = $_POST['user'];
        $send["nick"] = $_POST['username'];
        $this->load->model('Chat_model');
        $this->Chat_model->insert_new_chat($send);
        $this->load->view("chatView", $this->newChat());
    }


    /*------------------------------- create table for Chat for registered user  ------------------------ */

    function CreateTable()
    {

        $this->load->dbforge();
        $this->dbforge->add_field($fields = array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 100,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nick' => array(
                'type' => 'VARCHAR',
                'constraint' => '30',
            ),
            'text' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',

            ),

            'time' => array(
                'type' => '	timestamp',


            ),
            'nickname' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',

            ),

        ));
        $this->dbforge->add_key('id');
        $namesTable = $_POST['nameTable'];
        $this->dbforge->create_table($namesTable);
        $add['nameTable'] = $namesTable;
        $add['nameUser'] = $_SESSION['userNick'];
        $this->load->model('Chat_model');
        $this->Chat_model->insert_name_table($add);
        $this->load->view("chatView", $this->newChat());



    }
    /*-------------------------------end create table for Chat for registered user ------------------------ */
}
