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


        $elements[1] = new stdClass();
        $elements[1]->field = '`ngubackend_contact`.`name`';
        $elements[1]->sort = '1';
        $elements[1]->header = 'name';
        $elements[1]->alias = 'name';


        $elements[2] = new stdClass();
        $elements[2]->field = '`ngubackend_contact`.`email`';
        $elements[2]->sort = '1';
        $elements[2]->header = 'email';
        $elements[2]->alias = 'email';


        $elements[3] = new stdClass();
        $elements[3]->field = '`ngubackend_contact`.`phone`';
        $elements[3]->sort = '1';
        $elements[3]->header = 'phone';
        $elements[3]->alias = 'phone';


        $elements[4] = new stdClass();
        $elements[4]->field = '`ngubackend_contact`.`organization`';
        $elements[4]->sort = '1';
        $elements[4]->header = 'organization';
        $elements[4]->alias = 'organization';


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
        if(!empty($data))
        {
            $name = $data['name'];
            $phone = $data['phone'];
            // $email = 'vinodwohlig@gmail.com';
            $organization = $data['organization'];
            $qu = $data['query'];
            $data['message'] = $this->contact_model->contactSubmit($name, $phone, $organization, $qu);
        }
        else{
             $data['message'] =0;
        }

        $this->load->view('json', $data);
    }
    public function getalltestimonial()
    {
        $data['message'] = $this->testimonial_model->getalltestimonial();
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
       $data['message'] = $this->media_model->getallmedia();
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
       $data['message'] = $this->client_model->getallclient();
        $this->load->view('json', $data);
    }
    public function getsingleclient()
    {
        $id = $this->input->get_post('id');
        $data['message'] = $this->client_model->getsingleclient($id);
        $this->load->view('json', $data);
    }
    public function getClientWithDescription()
    {
        $data['message'] = $this->client_model->getClientWithDescription($id);
        $this->load->view('json', $data);
    }
    public function sendMail()
    {
        // $data = json_decode(file_get_contents('php://input'), true);
                // $name = $data['name'];
                // $email = $data['email'];
                // $phone = $data['phone'];
                // $comment = $data['comment'];
                 $name = $this->input->get_post('name');
                 $email = $this->input->get_post('email');
                 $phone = $this->input->get_post('phone');
                 $comment = $this->input->get_post('comment');
                $url = 'https://api.sendgrid.com/';
                $params = array(
                        'api_user'  => base64_decode('d2lsbG5ldmVyZ3Jvd3Vw'),
                        'api_key'   => base64_decode('Zm9yZ2V0Nzg2Nw=='),
                        'to'        =>'asifupadhye@gmail.com',
                        // 'x-smtpapi' => json_encode($json_string),
                        'subject'   => 'Enquiry for HappynessQuotient.com',
                        'html'      => "<p>Name: ".$name."</p><p>Email: ".$email."</p><p>Organization: ".comment."</p><p>Telephone: ".$phone."</p>",
                        'text'      => 'Will Never Grow Up',
                        'from'      => 'hq@willnevergrowup.in',
                        'fromname'      => 'Happyness Quotient',
                    );
                $request =  $url.'api/mail.send.json';
                $session = curl_init($request);
                curl_setopt ($session, CURLOPT_POST, true);
                curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
                curl_setopt($session, CURLOPT_HEADER, false);
                curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);//New line
                curl_setopt($session, CURLOPT_SSL_VERIFYHOST, false);//New line
                curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($session);
                curl_close($session);


                // send another mail
                $params = array(
                        'api_user'  => base64_decode('d2lsbG5ldmVyZ3Jvd3Vw'),
                        'api_key'   => base64_decode('Zm9yZ2V0Nzg2Nw=='),
                        'to'        =>'master@willnevergrowup.in',
                        'subject'   => 'Enquiry for HappynessQuotient.com',
                        'html'      => "<p>Name: ".$name."</p><p>Email: ".$email."</p><p>Organization: ".comment."</p><p>Telephone: ".$phone."</p>",
                        'text'      => 'Will Never Grow Up',
                        'from'      => 'hq@willnevergrowup.in',
                        'fromname'      => 'Happyness Quotient',
                    );
                $request =  $url.'api/mail.send.json';
                $session = curl_init($request);
                curl_setopt ($session, CURLOPT_POST, true);
                curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
                curl_setopt($session, CURLOPT_HEADER, false);
                curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);//New line
                curl_setopt($session, CURLOPT_SSL_VERIFYHOST, false);//New line
                curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($session);
                curl_close($session);


                // send another mail
                $params = array(
                        'api_user'  => base64_decode('d2lsbG5ldmVyZ3Jvd3Vw'),
                        'api_key'   => base64_decode('Zm9yZ2V0Nzg2Nw=='),
                        'to'        =>'info@willnevergrowup.com',
                        'subject'   => 'Enquiry for HappynessQuotient.com',
                        'html'      => "<p>Name: ".$name."</p><p>Email: ".$email."</p><p>Organization: ".comment."</p><p>Telephone: ".$phone."</p>",
                        'text'      => 'Will Never Grow Up',
                        'from'      => 'hq@willnevergrowup.in',
                        'fromname'      => 'Happyness Quotient',
                    );
                $request =  $url.'api/mail.send.json';
                $session = curl_init($request);
                curl_setopt ($session, CURLOPT_POST, true);
                curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
                curl_setopt($session, CURLOPT_HEADER, false);
                curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);//New line
                curl_setopt($session, CURLOPT_SSL_VERIFYHOST, false);//New line
                curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($session);
                curl_close($session);


                // send another mail
                // $params = array(
                //         'api_user'  => base64_decode('d2lsbG5ldmVyZ3Jvd3Vw'),
                //         'api_key'   => base64_decode('Zm9yZ2V0Nzg2Nw=='),
                //         'to'        =>'pooja@wohlig.com',
                //         'subject'   => 'Enquiry for HappynessQuotient.com',
                //         'html'      => "<p>Name: ".$name."</p><p>Email: ".$email."</p><p>Organization: ".comment."</p><p>Telephone: ".$phone."</p>",
                //         'text'      => 'Will Never Grow Up',
                //         'from'      => 'hq@willnevergrowup.in',
                //         'fromname'      => 'Happyness Quotient',
                //     );
                // $request =  $url.'api/mail.send.json';
                // $session = curl_init($request);
                // curl_setopt ($session, CURLOPT_POST, true);
                // curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
                // curl_setopt($session, CURLOPT_HEADER, false);
                // curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);//New line
                // curl_setopt($session, CURLOPT_SSL_VERIFYHOST, false);//New line
                // curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
                // $response = curl_exec($session);
                // curl_close($session);

      
    }
    public function sendSubscribe()
    {
                 $email = $this->input->get_post('email');
                $url = 'https://api.sendgrid.com/';
                $params = array(
                        'api_user'  => base64_decode('d2lsbG5ldmVyZ3Jvd3Vw'),
                        'api_key'   => base64_decode('Zm9yZ2V0Nzg2Nw=='),
                        'to'        =>'asifupadhye@gmail.com',
                        'subject'   => 'New Subscriber on HappynessQuotient.com​',
                        'html'      => "<p>Subscribe: ".$email."</p>",
                        'text'      => 'Will Never Grow Up',
                        'from'      => 'hq@willnevergrowup.in',
                        'fromname'      => 'Happyness Quotient',
                    );
                $request =  $url.'api/mail.send.json';
                $session = curl_init($request);
                curl_setopt ($session, CURLOPT_POST, true);
                curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
                curl_setopt($session, CURLOPT_HEADER, false);
                curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);//New line
                curl_setopt($session, CURLOPT_SSL_VERIFYHOST, false);//New line
                curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($session);
                curl_close($session);

// send aonthr
                  $params = array(
                        'api_user'  => base64_decode('d2lsbG5ldmVyZ3Jvd3Vw'),
                        'api_key'   => base64_decode('Zm9yZ2V0Nzg2Nw=='),
                        'to'        =>'info@willnevergrowup.com',
                        'subject'   => 'New Subscriber on HappynessQuotient.com​',
                        'html'      => "<p>Subscribe: ".$email."</p>",
                        'text'      => 'Will Never Grow Up',
                        'from'      => 'hq@willnevergrowup.in',
                        'fromname'      => 'Happyness Quotient',
                    );
                $request =  $url.'api/mail.send.json';
                $session = curl_init($request);
                curl_setopt ($session, CURLOPT_POST, true);
                curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
                curl_setopt($session, CURLOPT_HEADER, false);
                curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);//New line
                curl_setopt($session, CURLOPT_SSL_VERIFYHOST, false);//New line
                curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($session);
                curl_close($session);



                //   $params = array(
                //         'api_user'  => base64_decode('d2lsbG5ldmVyZ3Jvd3Vw'),
                //         'api_key'   => base64_decode('Zm9yZ2V0Nzg2Nw=='),
                //         'to'        =>'pooja@wohlig.com',
                //         'subject'   => 'New Subscriber on HappynessQuotient.com​',
                //         'html'      => "<p>Subscribe: ".$email."</p>",
                //         'text'      => 'Will Never Grow Up',
                //         'from'      => 'hq@willnevergrowup.in',
                //         'fromname'      => 'Happyness Quotient',
                //     );
                // $request =  $url.'api/mail.send.json';
                // $session = curl_init($request);
                // curl_setopt ($session, CURLOPT_POST, true);
                // curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
                // curl_setopt($session, CURLOPT_HEADER, false);
                // curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);//New line
                // curl_setopt($session, CURLOPT_SSL_VERIFYHOST, false);//New line
                // curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
                // $response = curl_exec($session);
                // curl_close($session);

                  $params = array(
                        'api_user'  => base64_decode('d2lsbG5ldmVyZ3Jvd3Vw'),
                        'api_key'   => base64_decode('Zm9yZ2V0Nzg2Nw=='),
                        'to'        =>'master@willnevergrowup.in',
                        'subject'   => 'New Subscriber on HappynessQuotient.com​',
                        'html'      => "<p>Subscribe: ".$email."</p>",
                        'text'      => 'Will Never Grow Up',
                        'from'      => 'hq@willnevergrowup.in',
                        'fromname'      => 'Happyness Quotient',
                    );
                $request =  $url.'api/mail.send.json';
                $session = curl_init($request);
                curl_setopt ($session, CURLOPT_POST, true);
                curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
                curl_setopt($session, CURLOPT_HEADER, false);
                curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);//New line
                curl_setopt($session, CURLOPT_SSL_VERIFYHOST, false);//New line
                curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($session);
                curl_close($session);
            
      
    }
}
