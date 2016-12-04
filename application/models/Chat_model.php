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

}