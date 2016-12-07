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
    function public_table()
    {

        $query = $this->db->get('publictable');
        return $query->result_array();
    }

    function insert_name_table($add)
    {

        $this->db->insert('nameTable', $add);
    }

    function insert_name($add)
    {

        $this->db->insert('publictable', $add);
    }

    function get_private_room()
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

    function insert_new_chat_reg_user($chat)
    {
        $this->db->insert('reg_chat', $chat);
    }

    function get_chat_roomId($roomId = '')
    {
        $query = $this->db->get('reg_chat');
		$query = $this->db->select('*')
						  ->from('reg_chat')
						  ->where('id_room',$roomId)
						  ->get();
        return $query->result_array();
    }
    function get_chat_Idroom($idroom = '')
    {
        $query = $this->db->get('chat');
        $query = $this->db->select('*')
            ->from('chat')
            ->where('id_room',$idroom)
            ->get();
        return $query->result_array();
    }
    function get_chat_defult()
    {
        $query = $this->db->get('chat');
        $query = $this->db->select('*')
            ->from('chat')
            ->where('id_room','0')
            ->get();
        return $query->result_array();
    }
}