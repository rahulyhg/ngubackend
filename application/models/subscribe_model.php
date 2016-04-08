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
      function exportsubscribecsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT * FROM `ngubackend_subscribe`");

       $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';
$timestamp=new DateTime();
        $timestamp=$timestamp->format('Y-m-d_H.i.s');
        if ( ! write_file("./uploads/subscribefile_$timestamp.csv", $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url("uploads/subscribefile_$timestamp.csv"), 'refresh');
             echo 'File written!';
        }
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
    $this->db->query("INSERT INTO `ngubackend_subscribe`(`email`) VALUE('$email')");
    $id=$this->db->insert_id();

           $message = "<html><body><div id=':1fn' class='a3s adM' style='overflow: hidden;'>
       <p style='color:#000;font-family:Roboto;font-size:14px'>
     Email : $email <br/>
       </p>

</div></body></html>";
        $query=$this->db->query("SELECT * FROM `emailer`")->row();
        $username=$query->username;
        $password=$query->password;
        $url = 'https://api.sendgrid.com/';
        $user = $username;
        $pass = $password;

$params = array(
    'api_user'  => $user,
    'api_key'   => $pass,
    'to'        => 'info@willnevergrowup.com',
//    'to'        => 'pooja.wohlig@gmail.com',
    'subject'   => 'Subcription Mailer',
    'html'      => $message,
    'text'      => 'Contact Us Details',
    'from'      => 'info@willnevergrowup.com'
  );

$request =  $url.'api/mail.send.json';

// Generate curl request
$session = curl_init($request);
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
// Tell PHP not to use SSLv3 (instead opting for TLS)
//curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);

//Turn off SSL
curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);//New line
curl_setopt($session, CURLOPT_SSL_VERIFYHOST, false);//New line

curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// obtain response
$response = curl_exec($session);

// print everything out
////var_dump($response,curl_error($session),curl_getinfo($session));
//print_r($response);
curl_close($session);
  $object = new stdClass();
    $object->value = true;
    return $object;
          }
// obtain response
        //  $this->email->message($message);
        //  $this->email->send();
        //  echo "mail sended".$email;

  
}

}
?>
