<?php


class Sv_model extends CI_Model {

        public function __construct()
        {

                parent::__construct();
                $this->load->database();
                require_once 'PHPExcel.php';
                
        }
        public function check_username($username) {
            $query = $this->db->query("SELECT name from user where name='$username';");
            if($query->num_rows() > 0){
                return true;
            }
            else return false;
        }
        public function check_password($username,$password) {
            $query = $this->db->query("SELECT id from user where name='$username' and pass='$password';");
            if($query->num_rows() ==1){
                return true;
            }
            else return false;
        }

        public function get_user($username)
        {
            $query = $this->db->query("SELECT * from user where name='$username';");
            $rows = array();
            if($query->num_rows() > 0){
                foreach ($query->result() as $row){
                    $rows[] = $row;
                }
            }
            return $rows;
        }

        public function readexcel($filename){
            $inputFileType = PHPExcel_IOFactory::identify($filename);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objReader->setReadDataOnly(true);
            $objPHPExcel = $objReader->load("$filename");
            $objWorksheet  = $objPHPExcel->setActiveSheetIndex(0);
            $highestRow    = $objWorksheet->getHighestRow();
            for ($row = 2; $row <= $highestRow;$row++)
            {
                $masv=$objWorksheet->getCellByColumnAndRow(0, $row)->getValue();
                $hoten=$objWorksheet->getCellByColumnAndRow(1, $row)->getValue();
                $khoahoc=$objWorksheet->getCellByColumnAndRow(2, $row)->getValue();
                $khoa=$objWorksheet->getCellByColumnAndRow(3, $row)->getValue();
                $nganh=$objWorksheet->getCellByColumnAndRow(4, $row)->getValue();
                $this->insertData($masv,$hoten,$khoahoc,$khoa,$nganh);
            }
       }

        public function insertData($masv,$hoten,$khoahoc,$khoa,$nganh) {

            $this->db->query("INSERT INTO `sinhvien`(`sv_id`, `masv`, `hoten`, `kh_id`, `khoa`, `n_id`, `date`,`datetime`)
            VALUES (NULL, '$masv', '$hoten', (SELECT kh_id FROM khoahoc WHERE  kh_ten ='$khoahoc'),
             '$khoa', (SELECT n_id FROM nganh WHERE n_ten='$nganh'),'". date("Y-m-d")."','". date("Y-m-d H-i-s")."');");
            
        }
        
         public function get_khoahoc()
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
        public function khoahoc($khoahoc,$khoa,$ngay,$nganh)
        {
            $query = $this->db->query("
            SELECT *,(SELECT kh.kh_ten from khoahoc kh WHERE kh.kh_id = s.kh_id) as kh_ten,(SELECT n.n_ten from nganh n WHERE n.n_id = s.n_id) as n_ten
            FROM sinhvien s
            WHERE s.kh_id in
            (SELECT kh.kh_id FROM khoahoc kh WHERE kh.kh_ten LIKE '%".$khoahoc."%')
            AND s.khoa in (SELECT khoa FROM sinhvien s WHERE s.khoa LIKE '%".$khoa."%')
            AND s.date in (SELECT date FROM sinhvien s WHERE s.date LIKE '%".$ngay."%')
            AND s.n_id in (SELECT n.n_id FROM nganh n WHERE n.n_ten LIKE '%".$nganh."%')
            ");
            $rows = array();
            if($query->num_rows() > 0){
                foreach ($query->result() as $row){
                    $rows[] = $row;
                }
            }
            return $rows;
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
        public function get_sinhvien()
        {
                $query = $this->db->query("SELECT s.*,n.n_ten,kh.kh_ten from sinhvien s INNER JOIN khoahoc kh ON kh.kh_id=s.kh_id INNER JOIN nganh n ON n.n_id=s.n_id;");
                $rows = array();
                if($query->num_rows() > 0){
                    foreach ($query->result() as $row){
                        $rows[] = $row;
                    }
                }
                return $rows;
        }
        public function get_sv($sv)
        {
            $query = $this->db->query("SELECT s.*,n.n_ten,kh.kh_ten from sinhvien s INNER JOIN khoahoc kh ON kh.kh_id=s.kh_id INNER JOIN nganh n ON n.n_id=s.n_id WHERE sv_id=$sv;");
            $rows = array();
            if($query->num_rows() > 0){
                foreach ($query->result() as $row){
                    $rows[] = $row;
                }
            }
            return $rows;
        }

        public function exported($sv)
        {
            $this->db->query("UPDATE sinhvien SET export=1 WHERE sv_id=$sv;");

        }
        public function get_khoa()
        {
            $query = $this->db->query("SELECT khoa from sinhvien GROUP BY khoa;");
            $rows = array();
            if($query->num_rows() > 0){
                foreach ($query->result() as $row){
                    $rows[] = $row;
                }
            }
            return $rows;
        }
        public function get_ngay()
        {
            $query = $this->db->query("SELECT date from sinhvien GROUP BY date;");
            $rows = array();
            if($query->num_rows() > 0){
                foreach ($query->result() as $row){
                    $rows[] = $row;
                }
            }
            return $rows;
        }

        public function export($data)
        {
            $query = $this->db->query("SELECT s.*,n.n_ten,kh.kh_ten from sinhvien s INNER JOIN khoahoc kh ON kh.kh_id=s.kh_id INNER JOIN nganh n ON n.n_id=s.n_id WHERE sv_id=$data;");
            $rows = array();
            if($query->num_rows() > 0){
                foreach ($query->result() as $row){
                    $rows[] = $row;
                }
            }
            return $rows;

        }
        public function edit($idsv,$masv,$hoten,$khoahoc,$khoa,$nganh)
        {

            $this->db->query("UPDATE sinhvien
                SET hoten= '$hoten',masv='$masv',khoa='$khoa',
                kh_id = (SELECT kh_id FROM khoahoc WHERE  kh_ten ='$khoahoc'),
                n_id=(SELECT n_id FROM nganh WHERE n_ten='$nganh'),
                date='". date("Y-m-d")."'
                WHERE sv_id = $idsv;") ;
        }

        public function delete($idsv)
        {
            $this->db->query("DELETE FROM sinhvien WHERE sv_id = '$idsv';") ;
        }

}

