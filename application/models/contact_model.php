<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class contact_model extends CI_Model
{
public function create($name,$email,$phone,$organization,$query)
{
$data=array("name" => $name,"email" => $email,"phone" => $phone,"organization" => $organization,"query" => $query);
$query=$this->db->insert( "ngubackend_contact", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("ngubackend_contact")->row();
return $query;
}
function getsinglecontact($id){
$this->db->where("id",$id);
$query=$this->db->get("ngubackend_contact")->row();
return $query;
}
public function edit($id,$name,$email,$phone,$organization,$query)
{
if($image=="")
{
$image=$this->contact_model->getimagebyid($id);
$image=$image->image;
}
$data=array("name" => $name,"email" => $email,"phone" => $phone,"organization" => $organization,"query" => $query);
$this->db->where( "id", $id );
$query=$this->db->update( "ngubackend_contact", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `ngubackend_contact` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `ngubackend_contact` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `ngubackend_contact` ORDER BY `id`
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

public function contactSubmit($name,$phone,$organization,$qu){
  $query=$this->db->query("INSERT INTO `ngubackend_contact`(`name`,`phone`,`organization`,`query`) VALUES('$name','$phone','$organization','$qu')");
  //send email for subscription

       $message = "<html><body><div id=':1fn' class='a3s adM' style='overflow: hidden;'>
       <p style='color:#000;font-family:Roboto;font-size:14px'>Name : $name <br/>
     Phone : $phone <br/>
     Organization : $organization <br/>
     Query : $qu
       </p>

</div></body></html>";
$url = 'https://api.sendgrid.com/';
$user = 'poojathakare';
$pass = 'wohlig123';
$request =  $url.'api/mail.send.json';

$json_string = array(

  'to' => array(
    'info@willnevergrowup.com'
  ),
  'category' => 'test_category'
);


$params = array(
   'api_user'  => $user,
   'api_key'   => $pass,
   'x-smtpapi' => json_encode($json_string),
   'to'        => 'info@willnevergrowup.com',
   'subject'   => 'Contact Form Submission',
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
//$response = curl_exec($session);
curl_close($session);
    if(!empty($query))
    {

      $object = new stdClass();
      $object->value = true;
      return $object;
    }else {
      $object = new stdClass();
      $object->value = false;
      return $object;
    }


}

}
?>
