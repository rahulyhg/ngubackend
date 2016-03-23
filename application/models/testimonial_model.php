<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class testimonial_model extends CI_Model
{
public function create($name,$testimonial,$designation,$company)
{
$data=array("name" => $name,"testimonial" => $testimonial,"designation" => $designation,"company" => $company);
$query=$this->db->insert( "ngu_testimonial", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("ngu_testimonial")->row();
return $query;
}
function getsingletestimonial($id){
$this->db->where("id",$id);
$query=$this->db->get("ngu_testimonial")->row();
return $query;
}
public function edit($id,$name,$testimonial,$designation,$company)
{
$data=array("name" => $name,"testimonial" => $testimonial,"designation" => $designation,"company" => $company);
$this->db->where( "id", $id );
$query=$this->db->update( "ngu_testimonial", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `ngu_testimonial` WHERE `id`='$id'");
return $query;
}
}
?>
