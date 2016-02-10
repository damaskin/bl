<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class rating_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }

    public function like_ins($data) {
        $this->db->where('id_item', $data->id_item);
        $this->db->where('ip', $data->ip);
        $this->db->insert('ratings', $data);
    }
    public function like_upd($data) {
        $this->db->where('id_item', $data->id_item);
        $this->db->where('ip', $data->ip);
        $this->db->update('ratings', $data);
    }

    public function dislike_ins($data) {
        $this->db->where('id_item', $data->id_item);
        $this->db->where('ip', $data->ip);
        $this->db->insert('ratings', $data);
    }
    public function dislike_upd($data) {
        $this->db->where('id_item', $data->id_item);
        $this->db->where('ip', $data->ip);
        $this->db->update('ratings', $data);
    }


}