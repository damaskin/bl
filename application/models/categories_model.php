<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends CI_Model
{
    //Получаем данные айтимов
    public function get_categories()
    {
        $this->db->where('active', '1');
        $query = $this->db->get('category');


        return $query->result_array();

    }

}