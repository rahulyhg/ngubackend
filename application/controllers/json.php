<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Json extends CI_Controller
{
    public function getallcontact()
    {
        $elements = array();
        $elements[0] = new stdClass();
        $elements[0]->field = '`ngubackend_contact`.`id`';
        $elements[0]->sort = '1';
        $elements[0]->header = 'id';
        $elements[0]->alias = 'id';

        $elements = array();
        $elements[1] = new stdClass();
        $elements[1]->field = '`ngubackend_contact`.`name`';
        $elements[1]->sort = '1';
        $elements[1]->header = 'name';
        $elements[1]->alias = 'name';

        $elements = array();
        $elements[2] = new stdClass();
        $elements[2]->field = '`ngubackend_contact`.`email`';
        $elements[2]->sort = '1';
        $elements[2]->header = 'email';
        $elements[2]->alias = 'email';

        $elements = array();
        $elements[3] = new stdClass();
        $elements[3]->field = '`ngubackend_contact`.`phone`';
        $elements[3]->sort = '1';
        $elements[3]->header = 'phone';
        $elements[3]->alias = 'phone';

        $elements = array();
        $elements[4] = new stdClass();
        $elements[4]->field = '`ngubackend_contact`.`organization`';
        $elements[4]->sort = '1';
        $elements[4]->header = 'organization';
        $elements[4]->alias = 'organization';

        $elements = array();
        $elements[5] = new stdClass();
        $elements[5]->field = '`ngubackend_contact`.`query`';
        $elements[5]->sort = '1';
        $elements[5]->header = 'query';
        $elements[5]->alias = 'query';

        $search = $this->input->get_post('search');
        $pageno = $this->input->get_post('pageno');
        $orderby = $this->input->get_post('orderby');
        $orderorder = $this->input->get_post('orderorder');
        $maxrow = $this->input->get_post('maxrow');
        if ($maxrow == '') {
        }
        if ($orderby == '') {
            $orderby = 'id';
            $orderorder = 'ASC';
        }
        $data['message'] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, 'FROM `ngubackend_contact`');
        $this->load->view('json', $data);
    }
    public function getsinglecontact()
    {
        $id = $this->input->get_post('id');
        $data['message'] = $this->contact_model->getsinglecontact($id);
        $this->load->view('json', $data);
    }
    public function getallsubscribe()
    {
        $elements = array();
        $elements[0] = new stdClass();
        $elements[0]->field = '`ngubackend_subscribe`.`id`';
        $elements[0]->sort = '1';
        $elements[0]->header = 'id';
        $elements[0]->alias = 'id';

        $elements = array();
        $elements[1] = new stdClass();
        $elements[1]->field = '`ngubackend_subscribe`.`email`';
        $elements[1]->sort = '1';
        $elements[1]->header = 'email';
        $elements[1]->alias = 'email';

        $search = $this->input->get_post('search');
        $pageno = $this->input->get_post('pageno');
        $orderby = $this->input->get_post('orderby');
        $orderorder = $this->input->get_post('orderorder');
        $maxrow = $this->input->get_post('maxrow');
        if ($maxrow == '') {
        }
        if ($orderby == '') {
            $orderby = 'id';
            $orderorder = 'ASC';
        }
        $data['message'] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, 'FROM `ngubackend_subscribe`');
        $this->load->view('json', $data);
    }
    public function getsinglesubscribe()
    {
        $id = $this->input->get_post('id');
        $data['message'] = $this->subscribe_model->getsinglesubscribe($id);
        $this->load->view('json', $data);
    }

    public function subscribe()
    {
        $email = $this->input->get_post('email');
        $data['message'] = $this->subscribe_model->subscribe($email);
        $this->load->view('json', $data);
    }

    public function contactSubmit()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $name = $data['name'];
        $phone = $data['phone'];
        $email = 'vinodwohlig@gmail.com';
        $organization = $data['organization'];
        $query = $data['query'];
        $data['message'] = $this->contact_model->contactSubmit($name, $phone, $email, $organization, $query);
        $this->load->view('json', $data);
    }
    public function getalltestimonial()
    {
        $elements = array();
        $elements[0] = new stdClass();
        $elements[0]->field = '`ngu_testimonial`.`id`';
        $elements[0]->sort = '1';
        $elements[0]->header = 'Id';
        $elements[0]->alias = 'id';

        $elements = array();
        $elements[1] = new stdClass();
        $elements[1]->field = '`ngu_testimonial`.`name`';
        $elements[1]->sort = '1';
        $elements[1]->header = 'Name';
        $elements[1]->alias = 'name';

        $elements = array();
        $elements[2] = new stdClass();
        $elements[2]->field = '`ngu_testimonial`.`testimonial`';
        $elements[2]->sort = '1';
        $elements[2]->header = 'Testimonial';
        $elements[2]->alias = 'testimonial';

        $elements = array();
        $elements[3] = new stdClass();
        $elements[3]->field = '`ngu_testimonial`.`designation`';
        $elements[3]->sort = '1';
        $elements[3]->header = 'Designation';
        $elements[3]->alias = 'designation';

        $elements = array();
        $elements[4] = new stdClass();
        $elements[4]->field = '`ngu_testimonial`.`company`';
        $elements[4]->sort = '1';
        $elements[4]->header = 'Company';
        $elements[4]->alias = 'company';

        $search = $this->input->get_post('search');
        $pageno = $this->input->get_post('pageno');
        $orderby = $this->input->get_post('orderby');
        $orderorder = $this->input->get_post('orderorder');
        $maxrow = $this->input->get_post('maxrow');
        if ($maxrow == '') {
        }
        if ($orderby == '') {
            $orderby = 'id';
            $orderorder = 'ASC';
        }
        $data['message'] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, 'FROM `ngu_testimonial`');
        $this->load->view('json', $data);
    }
    public function getsingletestimonial()
    {
        $id = $this->input->get_post('id');
        $data['message'] = $this->testimonial_model->getsingletestimonial($id);
        $this->load->view('json', $data);
    }
    public function getallmedia()
    {
        $elements = array();
        $elements[0] = new stdClass();
        $elements[0]->field = '`ngu_media`.`id`';
        $elements[0]->sort = '1';
        $elements[0]->header = 'Id';
        $elements[0]->alias = 'id';

        $elements = array();
        $elements[1] = new stdClass();
        $elements[1]->field = '`ngu_media`.`order`';
        $elements[1]->sort = '1';
        $elements[1]->header = 'Order';
        $elements[1]->alias = 'order';

        $elements = array();
        $elements[2] = new stdClass();
        $elements[2]->field = '`ngu_media`.`name`';
        $elements[2]->sort = '1';
        $elements[2]->header = 'Name';
        $elements[2]->alias = 'name';

        $elements = array();
        $elements[3] = new stdClass();
        $elements[3]->field = '`ngu_media`.`image`';
        $elements[3]->sort = '1';
        $elements[3]->header = 'Image';
        $elements[3]->alias = 'image';

        $search = $this->input->get_post('search');
        $pageno = $this->input->get_post('pageno');
        $orderby = $this->input->get_post('orderby');
        $orderorder = $this->input->get_post('orderorder');
        $maxrow = $this->input->get_post('maxrow');
        if ($maxrow == '') {
        }
        if ($orderby == '') {
            $orderby = 'id';
            $orderorder = 'ASC';
        }
        $data['message'] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, 'FROM `ngu_media`');
        $this->load->view('json', $data);
    }
    public function getsinglemedia()
    {
        $id = $this->input->get_post('id');
        $data['message'] = $this->media_model->getsinglemedia($id);
        $this->load->view('json', $data);
    }
    public function getallclient()
    {
        $elements = array();
        $elements[0] = new stdClass();
        $elements[0]->field = '`ngu_client`.`id`';
        $elements[0]->sort = '1';
        $elements[0]->header = 'Id';
        $elements[0]->alias = 'id';

        $elements = array();
        $elements[1] = new stdClass();
        $elements[1]->field = '`ngu_client`.`order`';
        $elements[1]->sort = '1';
        $elements[1]->header = 'Order';
        $elements[1]->alias = 'order';

        $elements = array();
        $elements[2] = new stdClass();
        $elements[2]->field = '`ngu_client`.`name`';
        $elements[2]->sort = '1';
        $elements[2]->header = 'Name';
        $elements[2]->alias = 'name';

        $elements = array();
        $elements[3] = new stdClass();
        $elements[3]->field = '`ngu_client`.`image`';
        $elements[3]->sort = '1';
        $elements[3]->header = 'Image';
        $elements[3]->alias = 'image';

        $search = $this->input->get_post('search');
        $pageno = $this->input->get_post('pageno');
        $orderby = $this->input->get_post('orderby');
        $orderorder = $this->input->get_post('orderorder');
        $maxrow = $this->input->get_post('maxrow');
        if ($maxrow == '') {
        }
        if ($orderby == '') {
            $orderby = 'id';
            $orderorder = 'ASC';
        }
        $data['message'] = $this->chintantable->query($pageno, $maxrow, $orderby, $orderorder, $search, $elements, 'FROM `ngu_client`');
        $this->load->view('json', $data);
    }
    public function getsingleclient()
    {
        $id = $this->input->get_post('id');
        $data['message'] = $this->client_model->getsingleclient($id);
        $this->load->view('json', $data);
    }
}
