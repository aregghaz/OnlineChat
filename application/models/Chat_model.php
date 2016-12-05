<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_model extends CI_Model
{

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    function get_chat()
    {

        $query = $this->db->get('chat');
        return $query->result_array();
    }

    function insert_chat($chat)
    {

        $this->db->insert('chat', $chat);
    }

    function insert_user($add)
    {

        $this->db->insert('users', $add);
    }


    function insert_name_table($add)
    {

        $this->db->insert('nameTable', $add);
    }

    function get_all_room()
    {

        $query = $this->db->get('nameTable');
        return $query->result_array();
    }

    function get_new_chat($tableName)
    {

        $query = $this->db->get($tableName);
        return $query->result_array();
    }

    function insert_new_chat($chat)
    {

        $this->db->insert('chat', $chat);
    }
}