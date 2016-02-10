<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Items extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('insert_model');
        $this->load->model('rating_model');
    }

    public function index()
    {

        $this->load->model('items_model');
        $this->load->model('categories_model');

        $data_items['items'] = $this->items_model->get_items();
        $data_items['categories'] = $this->categories_model->get_categories();

        $data_user_top_menu['users'] = $this->ion_auth->get_user();
        $data_user_top_menu['user'] = $this->ion_auth->get_users();

        //$user_id = $data_user_top_menu['users']->id;

        //print_r ($data_items['items'][0]);


        $this->load->view('header');
        $this->load->view('menu', $data_user_top_menu);
        $this->load->view('content', $data_items);
        $this->load->view('footer');

        //print_r ($this->ion_auth->get_user());
    }

    public function post_raiting() {
        if ($_POST['btn']=='like') {

            $this->db->where('ip', $_POST['ip']);
            $this->db->where('id_item', $_POST['id_item']);
            $this->db->where('rate', '1');
            $query = $this->db->get('ratings');
            $rowcount = $query->num_rows();



            if ($rowcount == 0) {

                $data = array(

                    'id_item' => $_POST['id_item'],
                    'ip' => $_POST['ip'],
                    'rate' => '2',
                );

                $this->db->where('id_item', $_POST['id_item']);
                $this->db->where('ip', $_POST['ip']);
                $this->db->insert('ratings', $data);
            } else {

                $data = array(

                    'id_item' => $_POST['id_item'],
                    'ip' => $_POST['ip'],
                    'rate' => '2',
                );

                $this->db->where('id_item', $_POST['id_item']);
                $this->db->where('ip', $_POST['ip']);
                $this->db->update('ratings', $data);
            }

        }

        if ($_POST['btn']=='dislike') {

            $this->db->where('ip', $_POST['ip']);
            $this->db->where('id_item', $_POST['id_item']);
            $this->db->where('rate', '2');
            $query = $this->db->get('ratings');
            $rowcount = $query->num_rows();



            if ($rowcount == 0) {

                $data = array(

                    'id_item' => $_POST['id_item'],
                    'ip' => $_POST['ip'],
                    'rate' => '1',
                );

                $this->db->where('id_item', $_POST['id_item']);
                $this->db->where('ip', $_POST['ip']);
                $this->db->insert('ratings', $data);
            } else {

                $data = array(

                    'id_item' => $_POST['id_item'],
                    'ip' => $_POST['ip'],
                    'rate' => '1',
                );

                $this->db->where('id_item', $_POST['id_item']);
                $this->db->where('ip', $_POST['ip']);
                $this->db->update('ratings', $data);
            }
        }
    }

    public function del_raiting() {
        if ($_POST['btn']=='like') {

            $this->db->where('id_item', $_POST['id_item']);
            $this->db->where('ip', $_POST['ip']);
            $this->db->delete('ratings');

        }

        if ($_POST['btn']=='dislike') {

            $this->db->where('id_item', $_POST['id_item']);
            $this->db->where('ip', $_POST['ip']);
            $this->db->delete('ratings');
        }
    }


    public function item($id)
    {
        $this->load->model('items_model');
        $this->load->model('categories_model');


        $data['items'] = $this->items_model->get_items();
        $data['comments'] = $this->items_model->get_comments();
        $data['id_item'] = $id;


        //Данные об авторизированном юзере
        $data_user_top_menu['users'] = $this->ion_auth->get_user();


        //Including validation library
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        //Validating Name Field
        $this->form_validation->set_rules('text', 'Text', 'required|min_length[1]|max_length[255]');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('header');
                $this->load->view('menu', $data_user_top_menu);
                $this->load->view('items/item_page_id', $data);
                $this->load->view('footer');
            } else {
                //Setting values for tabel columns
                $datas = array(
                    'text' => $this->input->post('text'),
                    'id_user' => $this->input->post('id_user'),
                    'id_item' => $this->input->post('id_item'),
                    'date' => $this->input->post('date'),
                    'active' => 1
                );
                //Transfering data to Model
                $this->items_model->comment_insert($datas);
                $datas['message'] = 'Data Inserted Successfully';

                $data['comments'] = $this->items_model->get_comments();



                //Loading View
                $this->load->view('header', $datas);
                $this->load->view('menu', $data_user_top_menu);
                $this->load->view('items/item_page_id', $data);
                $this->load->view('footer');

                redirect(current_url());

            }



    }


    public function category($id)
    {
        $this->load->model('items_model');
        $this->load->model('categories_model');


        $data['items'] = $this->items_model->get_items();
        $data['id_item'] = $id;
        $data_user_top_menu['users'] = $this->ion_auth->get_user();
        $data_user_top_menu['user'] = $this->ion_auth->get_users();

        $this->load->view('header');
        $this->load->view('menu', $data_user_top_menu);
        $this->load->view('items/category_page_id', $data);
        $this->load->view('footer');
    }

    public function add()
    {

        $data_user_top_menu['users'] = $this->ion_auth->get_user();

        //Including validation library
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        //Validating Name Field
        $this->form_validation->set_rules('title', 'Title', 'required|min_length[5]|max_length[15]');



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('menu', $data_user_top_menu);
            $this->load->view('items/add');
            $this->load->view('footer');
        } else {
            //Setting values for tabel columns
            $data = array(
                'title' => $this->input->post('title'),
                'text' => $this->input->post('text'),
                'user_id' => $this->input->post('user_id')
            );
            //Transfering data to Model
            $this->insert_model->form_insert($data);
            $data['message'] = 'Data Inserted Successfully';

            //Loading View
            $this->load->view('header');
            $this->load->view('menu', $data_user_top_menu);
            $this->load->view('items/add', $data);
            $this->load->view('footer');

        }


    }


}