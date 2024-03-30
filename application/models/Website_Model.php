<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Website_Model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function insert($name, $email, $pword)
    {
        $data = ['name' => $name, "email" => $email, "pword" => $pword];
        return  $this->db->insert('users', $data);
    }
    public function readData()
    {

        $this->db->select("id as id,name as name,email as email");
        $this->db->from('users');
        return $this->db->get()->result_array();
    }
    public function editData($id = "")
    {
        $this->db->select("id as id,name as name,email as email");
        $this->db->where('id', $id);
        $this->db->from('users');
        return $this->db->get()->row_array();
    }
    public function update($name, $email, $id)
    {
        $data = ['name' => $name, "email" => $email];
        $this->db->set($data);
        $this->db->where('id', $id);
        return   $this->db->update('users');
    }
    public function delete($id = "")
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
}
