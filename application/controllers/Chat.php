<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('Chat_model');
        $this->load->helper('download');
        $this->load->library('upload');

    }

    /*------------------------------- incognito  ------------------------ */
    function incognito()
    {

        $name['publictable'] = $this->Chat_model->public_table();

        $newData = array(

            'user' => $_POST['user'],
            'logged_in' => TRUE
        );
        $this->session->set_userdata($newData);
        $nick = $_SESSION['user'];
        $this->load->view("chatView", $this->for_all_user($nick));

    }

    /*------------------------------- basic chat for all user  ------------------------ */
    function for_all_user()
    {
        if (!empty($_POST['publicTable'])) {
            $name['publictable'] = $this->Chat_model->public_table();
            $idroom = $_POST['publicTable'];
            $name['chat'] = $this->Chat_model->get_chat_Idroom($idroom);
        } else {
            $name['publictable'] = $this->Chat_model->public_table();
            $name['chat'] = $this->Chat_model->get_chat();
        }
        $this->load->view("publictable", $name);
        $this->load->view('chat', $name);
    }
    /*-------------------------------end basic chat for all user  ------------------------ */
    /*-------------------------------sending message for all user  ------------------------ */
    function message_send()
    {
        $send['nickname'] = $_POST['username'];
        $send['text'] = $_POST['user'];
        $send["nick"] = $_POST['username'];
        $this->Chat_model->insert_chat($send);
        if (empty($_POST['table'])) {
            $name['publictable'] = $this->Chat_model->public_table();

        } else {
            $send["id_room"] = $_POST['table'];
            $name['publictable'] = $this->Chat_model->get_chat_defult();
        }
        $this->load->view("chatView", $this->for_all_user());
    }
    /*-------------------------------end  sending message for all user  ------------------------ */
    /*------------------------------- registration  ----------------- */
    public function reg()
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
            $this->load->view("chatView", $this->reg_chat());
        } else {
            $this->load->view('registration');
        }
    }
    /*-------------------------------end registration  ----------------- */
    /*------------------------------- Chat for registered user  ------------------------*/
    function reg_chat()
    {
        if (empty($_POST['tableName'])) {
            if ($this->session->userdata('nickName')) {
                $add['nickName'] = $this->session->userdata('userNick');
            }
            $name['chat'] = $this->Chat_model->get_chat();
        } else {
            if ($this->session->userdata('nickName')) {
                $add['nickName'] = $this->session->userdata('userNick');
            }
            $roomId = $_POST['tableName'];
            $name['chat'] = $this->Chat_model->get_chat_roomId($roomId);
        }
        $name['publictable'] = $this->Chat_model->public_table();
        $name['nameTable'] = $this->Chat_model->get_private_room();
        $this->load->view("table", $name);
        $this->load->view('regchat', $name);

    }
    /*-------------------------------end Chat for registered user  ------------------------ */
    /*-------------------------------sending message for registered user  ------------------------ */
    function send_message()
    {
        $send['nickname'] = $_POST['username'];
        $send['text'] = $_POST['user'];
        $send["nick"] = $_POST['username'];
        if (empty($_POST['tableName'])) {

            $this->Chat_model->insert_new_chat($send);
        } else {
            $send["id_room"] = $_POST['tableName'];
            $this->Chat_model->insert_new_chat_reg_user($send);
        }
        $this->load->view("chatView", $this->reg_chat());
    }

    /*------------------------------- create table for Chat for registered user  ------------------------ */
    function create_table()
    {
        $name['nameTable'] = $_POST['nameTable'];
        $name['nameUser'] = $_SESSION['userNick'];
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['remove_spaces'] = true;
        $config['overwrite'] = false;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        $this->upload->do_upload('tableImage');
        $fileData = $this->upload->data();
        $name['full_path'] = $fileData['full_path'];
        $name['file_name'] = $fileData['file_name'];
        if ($_POST['private'] === 'public') {
            $this->Chat_model->insert_name($name);
        }
        if ($_POST['private'] === 'private') {
            $this->Chat_model->insert_name_table($name);
        }
        $this->load->view("chatView", $this->reg_chat());
    }
    /*-------------------------------end create table for Chat for registered user ------------------------ */
}
