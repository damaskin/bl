<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('url');
    }

    public function index()
    {

        $this->load->model('items_model');

        $data_items['items'] = $this->items_model->get_items();

        $data_user_top_menu['users'] = $this->ion_auth->get_user();
        $data_user_top_menu['user'] = $this->ion_auth->get_users();



        $this->load->view('header');
        $this->load->view('menu', $data_user_top_menu);
        $this->load->view('content', $data_items);
        $this->load->view('footer');

        //print_r ($this->ion_auth->get_user());
    }


}