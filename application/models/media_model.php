<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class media_model extends CI_Model
{
public function create($order,$name,$image)
{
$data=array("order" => $order,"name" => $name,"image" => $image);
$query=$this->db->insert( "ngu_media", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("ngu_media")->row();
return $query;
}
function getsinglemedia($id){
$this->db->where("id",$id);
$query=$this->db->get("ngu_media")->row();
return $query;
}
public function edit($id,$order,$name,$image)
{
$data=array("order" => $order,"name" => $name);
if($image != "")
  $data['image']=$image;
$this->db->where( "id", $id );
$query=$this->db->update( "ngu_media", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `ngu_media` WHERE `id`='$id'");
return $query;
}
  public function getallmedia()
{
$query=$this->db->query("SELECT * FROM `ngu_media` WHERE 1")->result();
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `ngu_media` WHERE `id`='$id'")->row();
return $query;
}
}
?>
