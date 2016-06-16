<?php


class Quyen_model extends CI_Model {

    public function __construct()
    {

        parent::__construct();
        $this->load->database();


    }

    public function get_user()
    {
        $query = $this->db->query("SELECT * from user;");
        $rows = array();
        if($query->num_rows() > 0){
            foreach ($query->result() as $row){
                $rows[] = $row;
            }
        }
        return $rows;
    }
    public function get_tenuser($user_id)
    {
        $query = $this->db->query("SELECT * from user WHERE id = $user_id;");
        $rows = array();
        if($query->num_rows() > 0){
            foreach ($query->result() as $row){
                $rows[] = $row;
            }
        }
        return $rows;
    }

    public function add($user,$pass,$quyen)
    {
        $this->db->query("INSERT INTO user VALUE ('','$user','$pass','$quyen');");
    }

    public function edit($iduser,$user,$pass,$quyen)
    {
        $this->db->query("UPDATE user SET name= '$user',pass= '$pass',quyen= $quyen WHERE id = $iduser;") ;
    }
    public function delete($iduser)
    {
        $this->db->query("DELETE FROM user WHERE id = $iduser;") ;
    }



}

