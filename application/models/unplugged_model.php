<?php
if (!defined("BASEPATH"))
    exit("No direct script access allowed");
class unplugged_model extends CI_Model
{
    public function create($name, $email, $number)
    {
        $data  = array(
            "name" => $name,
            "email" => $email,
            "number" => $number,
        );
        $query = $this->db->insert("ngu_unplugged", $data);
        $id    = $this->db->insert_id();
        if (!$query)
            return 0;
        else
            return $id;
    }
    public function beforeedit($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get("ngu_unplugged")->row();
        return $query;
    }
    function getsingleunplugged($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get("ngu_unplugged")->row();
        return $query;
    }
    public function edit($id, $name, $email, $number)
    {
        $data = array(
            "name" => $name,
            "email" => $email,
            "number" => $number,
        );
        $this->db->where("id", $id);
        $query = $this->db->update("ngu_unplugged", $data);
        return 1;
    }
    public function delete($id)
    {
        $query = $this->db->query("DELETE FROM `ngu_unplugged` WHERE `id`='$id'");
        return $query;
    }
    public function getallunplugged()
    {
        $query = $this->db->query("SELECT * FROM `ngu_unplugged` WHERE 1")->result();
        return $query;
    }
}
?>