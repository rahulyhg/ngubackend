<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class client_model extends CI_Model
{
public function create($order,$name,$image,$status,$content)
{
$data=array("order" => $order,"name" => $name,"image" => $image,"status" => $status,"content" => $content);
$query=$this->db->insert( "ngu_client", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("ngu_client")->row();
return $query;
}
function getsingleclient($id){
$this->db->where("id",$id);
$query=$this->db->get("ngu_client")->row();
return $query;
}
public function edit($id,$order,$name,$image,$status,$content)
{
$data=array("order" => $order,"name" => $name,"status" => $status,"content" => $content,"image" => $image);

$this->db->where( "id", $id );
$query=$this->db->update( "ngu_client", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `ngu_client` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `ngu_client` WHERE `id`='$id'")->row();
return $query;
}
      public function getallclient()
{
$query=$this->db->query("SELECT * FROM `ngu_client` WHERE 1")->result();
return $query;
}
      public function getClientWithDescription()
{
$query=$this->db->query("SELECT `id`, `order`, `name`, `image`, `content` FROM `ngu_client` WHERE `content` <>'' AND `status`=2")->result();
if($query){
  return $query;
}
else{
  return 0;
}
}
}
?>
