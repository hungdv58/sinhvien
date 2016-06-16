<?php


class Themnganh_model extends CI_Model {

    public function __construct()
    {

        parent::__construct();
        $this->load->database();


    }

    public function get_nganh()
    {
        $query = $this->db->query("SELECT * from nganh;");
        $rows = array();
        if($query->num_rows() > 0){
            foreach ($query->result() as $row){
                $rows[] = $row;
            }
        }
        return $rows;
    }

    public function get_tennganh($n_id)
    {
        $query = $this->db->query("SELECT * from nganh WHERE n_id = $n_id;");
        $rows = array();
        if($query->num_rows() > 0){
            foreach ($query->result() as $row){
                $rows[] = $row;
            }
        }
        return $rows;
    }

    public function add($nganh)
    {

        $this->db->query("INSERT INTO nganh VALUE ('','$nganh');");
    }

    public function edit($idnganh,$tennganh)
    {
        $this->db->query("UPDATE nganh SET n_ten= '$tennganh' WHERE n_id = $idnganh;") ;
    }
    public function delete($idnganh)
    {
        $this->db->query("DELETE FROM nganh WHERE n_id = $idnganh;") ;
    }


}

