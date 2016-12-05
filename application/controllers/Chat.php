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

    /*------------------------------- registration  ----------------- */
    public function registration()
    {
        if (isset($_POST['add'])) {
            $add['name'] = $_POST['name'];
            $add['Nickname'] = $_POST['Nickname'];
            $add['password'] = $_POST['password'];
            $this->load->model('Chat_model');
            $add['users'] = $this->Chat_model->insert_user($add);
            $newData = array(
                'nickName' => $_POST['Nickname'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newData);
            $this->load->view("chatView", $this->index());

        } else {
            $this->load->view('registration');
        }
    }

    /*------------------------------- incognito  ------------------------ */
    function incognito()
    {

        $this->load->view("chatView", $this->index($_POST['username']));

    }


    /*------------------------------- index  ------------------------ */
    function index()
    {
        $this->load->model('Chat_model');
        if ($this->session->userdata('nickName')) {
            $name['nickName'] = $this->session->userdata('nickName');

        }
        $name['chat'] = $this->Chat_model->get_chat();

        $add['nameTable'] = $this->Chat_model->get_new_room();
        $this->load->view("table", $add);
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
        $namesTable = 'chatRoom' . rand(10, 100);
        $this->dbforge->create_table($namesTable);
        $add['nameTable'] = $namesTable;
        $add['nameUser'] = $_SESSION['nickName'];
        $this->load->model('Chat_model');
        $this->Chat_model->insert_name_tabele($add);
        $add['nameTable'] = $this->Chat_model->get_new_room();
        $this->load->view("chatView", $this->index());
        $this->load->view("table", $add);


    }
}
