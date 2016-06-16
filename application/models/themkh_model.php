<?php


class Themkh_model extends CI_Model {

    public function __construct()
    {

        parent::__construct();
        $this->load->database();


    }

    public function get_kh()
    {
        $query = $this->db->query("SELECT * from khoahoc;");
        $rows = array();
        if($query->num_rows() > 0){
            foreach ($query->result() as $row){
                $rows[] = $row;
            }
        }
        return $rows;
    }
    public function get_tenkh($kh_id)
    {
        $query = $this->db->query("SELECT * from khoahoc WHERE kh_id = $kh_id;");
        $rows = array();
        if($query->num_rows() > 0){
            foreach ($query->result() as $row){
                $rows[] = $row;
            }
        }
        return $rows;
    }

    public function add($kh)
    {
        $this->db->query("INSERT INTO khoahoc VALUE ('','$kh');");
    }

    public function edit($idkh,$tenkh)
    {
        $this->db->query("UPDATE khoahoc SET kh_ten= '$tenkh' WHERE kh_id = $idkh;") ;
    }
    public function delete($idkh)
    {
        $this->db->query("DELETE FROM khoahoc WHERE kh_id = $idkh;") ;
    }



}

