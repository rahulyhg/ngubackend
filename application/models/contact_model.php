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
    public function exportcontactcsv()
{
$this->load->dbutil();
		$query=$this->db->query("SELECT `id`, `name`, `phone`, `organization`, `query` FROM `ngubackend_contact` WHERE 1 ORDER BY `id` DESC");

       $content= $this->dbutil->csv_from_result($query);
        //$data = 'Some file data';
$timestamp=new DateTime();
        $timestamp=$timestamp->format('Y-m-d_H.i.s');
        if ( ! write_file("./uploads/contactfile_$timestamp.csv", $content))
        {
             echo 'Unable to write the file';
        }
        else
        {
            redirect(base_url("uploads/contactfile_$timestamp.csv"), 'refresh');
             echo 'File written!';
        }
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
//         $query=$this->db->query("SELECT * FROM `emailer`")->row();
//         $username=$query->username;
//         $password=$query->password;
//         $url = 'https://api.sendgrid.com/';
//         $user = $username;
//         $pass = $password;
// echo $user;
// $params = array(
//     'api_user'  => $user,
//     'api_key'   => $pass,
//     // 'to'        => 'info@willnevergrowup.com',
//    'to'        => 'pooja@wohlig.com',
//     'subject'   => 'Contact Us',
//     'html'      => $message,
//     'text'      => 'Contact Us Details',
//     'from'      => 'info@willnevergrowup.com'
//   );

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
    
       $url = 'https://api.sendgrid.com/';
                $params = array(
                        'api_user'  => base64_decode('cG9vamF3b2hsaWc='),
                        'api_key'   => base64_decode('d29obGlnMTIz'),
                        // 'to'        =>'info@willnevergrowup.com',
                        'to'        =>'pooja@wohlig.com',
                        'subject'   => 'Contact Us',
                        'html'      => $message,
                        'text'      => 'Will Never Grow Up',
                        'from'      => 'info@willnevergrowup.com',
                        'fromname'      => 'Will Never Grow Up',
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
                // print_r($response);
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
