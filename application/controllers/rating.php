<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rating extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('rating_model');
    }




    public function post()
    {
        if ($_POST['btn']=='like') {


            $data = array(

                'id_item' => $_POST['id_item'],
                'ip' => '127.0.0.1',
                'rate' => '2',
            );



            $this->rating_model->like_ins($data);
        }

        if ($_POST['btn']=='dislike') {

            $data = array(

                'id_item' => $_POST['id_item'],
                'ip' => '127.0.0.1',
                'rate' => '1',
            );
            $this->rating_model->dislike_ins($data);
        }

    }






    public function post_rating()
    {
        if ($_POST['btn']=='like') {
            $data = array(
                'id' => $_POST['btn'],
                'id_item' => $_POST['id_item'],
                'id_user' => $_POST['id_user'],
                'rate' => '1',
            );
            $this->rating_model->like_insert($data);
        }

        if ($_POST['btn']=='dislike') {
            $data = array(
                'id' => $_POST['btn'],
                'id_item' => $_POST['id_item'],
                'id_user' => $_POST['id_user'],
                'rate' => '2',
            );
            $this->rating_model->dislike_insert($data);
        }
        echo $data;
    }

    public function del_rating() {
        if ($_POST['btn']=='like') {
            $data = array(
                'id' => $_POST['btn'],
                'id_item' => $_POST['id_item'],
                'id_user' => $_POST['id_user'],
                'rate' => '1',
            );
            $this->rating_model->like_delete($data);
        }

        if ($_POST['btn']=='dislike') {
            $data = array(
                'id' => $_POST['btn'],
                'id_item' => $_POST['id_item'],
                'id_user' => $_POST['id_user'],
                'rate' => '2',
            );
            $this->rating_model->dislike_delete($data);
        }

    }


}