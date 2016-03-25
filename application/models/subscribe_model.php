<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class subscribe_model extends CI_Model
{
public function create($email)
{
$data=array("email" => $email);
$query=$this->db->insert( "ngubackend_subscribe", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("ngubackend_subscribe")->row();
return $query;
}
function getsinglesubscribe($id){
$this->db->where("id",$id);
$query=$this->db->get("ngubackend_subscribe")->row();
return $query;
}
public function edit($id,$email)
{
if($image=="")
{
$image=$this->subscribe_model->getimagebyid($id);
$image=$image->image;
}
$data=array("email" => $email);
$this->db->where( "id", $id );
$query=$this->db->update( "ngubackend_subscribe", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `ngubackend_subscribe` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `ngubackend_subscribe` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `ngubackend_subscribe` ORDER BY `id`
                    ASC")->row();
$return=array(
"" => "Select Option"
);
foreach($query as $row)
{
$return[$row->id]=$row->name;
}
return $return;
}
public function subscribe($email){
        $query1=$this->db->query("SELECT * FROM `ngubackend_subscribe` WHERE `email`='$email'");
    $num=$query1->num_rows();
    if($num>0)
    {
    $object = new stdClass();
    $object->value = false;
    $object->comment = 'already exists';
   return $object;
    }
    else{
      echo"test";
    $this->db->query("INSERT INTO `ngubackend_subscribe`(`email`) VALUE('$email')");
    $id=$this->db->insert_id();

    //send email for subscription
        //  $this->load->library('email');
        //  $this->email->from('vigwohlig@gmail.com', 'NGU');
        //  $this->email->to($email);
        //  $this->email->subject('Your NGU subscription');

         $message = "<html><body><div id=':1fn' class='a3s adM' style='overflow: hidden;'>
         <p style='color:#000;font-family:Roboto;font-size:20px'>Thank You for subscribing to NGU.</p>

</div></body></html>";

if(!empty($email))
{

$url = 'https://api.sendgrid.com/';
$user = 'poojathakare';
$pass = 'wohlig123';
$request =  $url.'api/mail.send.json';

$json_string = array(

'to' => array(
'vinodwohlig@gmail.com', $email
),
'category' => 'test_category'
);

$params = array(
'api_user'  => $user,
'api_key'   => $pass,
'x-smtpapi' => json_encode($json_string),
'to'        => 'info@willnevergrowup.com',
'subject'   => 'Your NGU subscription',
'html'      => $message,
'text'      => 'testttttttttt',
'from'      => 'info@willnevergrowup.com',
//  'from'      => 'info@willnevergrowup.com',
);

$session = curl_init($request);
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
// Tell PHP not to use SSLv3 (instead opting for TLS)
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
// print everything out
print_r($response);

// obtain response
}        //  $this->email->message($message);
        //  $this->email->send();
        //  echo "mail sended".$email;

    $object = new stdClass();
    $object->value = true;
    return $object;
          }
}

}
?>
