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

public function contactSubmit($name,$phone,$email,$organization,$query){
  $query=$this->db->query("INSERT INTO `ngubackend_contact`(`name`,`phone`,`email`,`organization`,`query`) VALUES('$name','$phone','$email','$organization','$query')");
  //send email for subscription
       $this->load->library('email');
       $this->email->from('vigwohlig@gmail.com', 'NGU');
       $this->email->to($email);
       $this->email->subject('Your NGU Contact Form Submission');

       $message = "<html><body><div id=':1fn' class='a3s adM' style='overflow: hidden;'>
       <p style='color:#000;font-family:Roboto;font-size:20px'>Thank You  $name for Contacting Us.</p>

</div></body></html>";
       $this->email->message($message);
       $this->email->send();
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
