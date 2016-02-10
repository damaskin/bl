<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items_model extends CI_Model
{

    function __construct() {
        parent::__construct();
    }

    //Получаем данные айтимов
    public function get_items()
    {
//        $this->db->where('active', '1');
//        $this->db->where('user_id', '1');
        $query = $this->db->get('items');
//        $query_data = $query->result_array();
//        print_r ($query_data[0]['id']);
//        echo($query_data[0]['id']);
//        echo "<br/>";

        return $query->result_array();

    }

    public function get_comments()
    {
        $this->db->where('active', '1');
        $query = $this->db->get('comments');


        return $query->result_array();

    }

//    public function get_users()
//    {
//
//        $query = $this->db->get('items');
//        $query_data = $query->result_array();
//
//        $this->db->select('username');
//        $this->db->where('id', $query_data[1]['id']);
//        $q = $this->db->get('users');
//        $query_users = $q->result_array();
//        echo($query_users[0]['username']);
//        print_r($query_users);
//
//        return $q->result_array();
//    }




    function comment_insert($data){
        //Inserting in Table(students) of Database(college)
        $this->db->insert('comments', $data);
    }

}