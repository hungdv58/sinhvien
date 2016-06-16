<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('sv_model');
        $this->load->model('quyen_model');
        $this->load->model('themnganh_model');
        $this->load->model('themkh_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library("session");
    }

    public function index()
    {

        $this->load->view('login');
    }

    public function logout()
    {
        $this->session->unset_userdata("username");
        $this->load->view('login');
    }

    public function sv()
    {
        $khoahoc = $this->sv_model->get_khoahoc();
        $nganh = $this->sv_model->get_nganh();
        $data = array('khoahoc' => $khoahoc, 'nganh' => $nganh,'username' => $this->session->userdata("username"),'quyen' => $this->session->userdata("quyen"));
        $this->load->view('sv_view', $data);
    }


    public function quyen()
    {
        $data = array('user' => $this->quyen_model->get_user(),'username' => $this->session->userdata("username"),'quyen' => $this->session->userdata("quyen"));
        $this->load->view('quyen', $data);
    }

    public function addquyen()
    {
        $user=$_POST['name'];
        $pass=$_POST['pass'];
        $repass=$_POST['repass'];
        if(isset($_POST['1'])&&!isset($_POST['2'])&&!isset($_POST['3']))  $this->quyen_model->add($user,$pass,1);
        if(!isset($_POST['1'])&&isset($_POST['2'])&&!isset($_POST['3']))  $this->quyen_model->add($user,$pass,2);
        if(!isset($_POST['1'])&&!isset($_POST['2'])&&isset($_POST['3']))  $this->quyen_model->add($user,$pass,3);
        if(isset($_POST['1'])&&isset($_POST['2'])&&!isset($_POST['3']))  $this->quyen_model->add($user,$pass,4);
        if(isset($_POST['1'])&&!isset($_POST['2'])&&isset($_POST['3']))  $this->quyen_model->add($user,$pass,5);
        if(!isset($_POST['1'])&&isset($_POST['2'])&&isset($_POST['3']))  $this->quyen_model->add($user,$pass,6);
        if(isset($_POST['1'])&&isset($_POST['2'])&&isset($_POST['3']))  $this->quyen_model->add($user,$pass,7);
        redirect('welcome/quyen', 'refresh');
    }

    public function deletequyen()
    {
        if(isset($_POST['edit'])) {
            if(isset($_POST['chk_group'])) {

                $optionArray = $_POST['chk_group'];

                for ($i = 0; $i < count($optionArray); $i++) {
                    $query = $this->quyen_model->get_tenuser($optionArray[$i]);
                    foreach ($query as $row) {
                        $name[$i] = $row->name;
                        $pass[$i] = $row->pass;
                        $id[$i]= $row->id;
                    }
                }
                $data['name'] = $name;
                $data['pass'] = $pass;
                $data['id'] = $id;
                $data['username'] = $this->session->userdata("username");
                $data['quyen'] = $this->session->userdata("quyen");
                $this->load->view('editquyen', $data);
            }


            else {
                echo '<script language="javascript">';
                echo 'alert("Bạn chưa chọn khóa học")';
                echo '</script>';
                redirect('themkh/view', 'refresh');
            }
        }
        if(isset($_POST['delete'])) {
            if(isset($_POST['chk_group'])) {
                $optionArray = $_POST['chk_group'];

                //$this->load->view('a', $data);
                for ($i = 0; $i < count($optionArray); $i++) {
                    $query = $this->quyen_model->get_tenuser($optionArray[$i]);
                    foreach ($query as $row) {
                        $name[$i] = $row->name;
                        $id[$i] = $row->id;
                    }
                }
                $data['name'] = $name;
                $data['id'] = $id;
                $data['username'] = $this->session->userdata("username");
                $data['quyen'] = $this->session->userdata("quyen");
                $this->load->view('deletequyen', $data);
            }
            else {
                echo '<script language="javascript">';
                echo 'alert("Bạn chưa chọn khóa học")';
                echo '</script>';
                redirect('themkh/view', 'refresh');
            }
        }
    }


    public function deleteq()
    {
        if(isset($_POST['yes'])) {
            $kh = $this->quyen_model->get_user();
            $i = 0;
            foreach ($kh as $row) {
                $a[$i] = $row->id;
                $i++;
            }

            for ($i = 0; $i < count($a); $i++) {
                if (isset($_POST[$a[$i]]))

                    $this->quyen_model->delete($_POST[$a[$i]]);
            }
            redirect('welcome/quyen', 'refresh');
        }
        if(isset($_POST['no'])) {
            redirect('welcome/quyen', 'refresh');
        }
    }

    public function editq()
    {
        if(isset($_POST['save'])) {
            $kh = $this->quyen_model->get_user();
            $i = 0;
                foreach ($kh as $row) {
                    $a[$i] = $row->id;
                    $i++;
                }

                for ($i = 0; $i < count($a); $i++) {
                    if (isset($_POST[$a[$i]])) {
                        if (isset($_POST[$a[$i] . '1']) && !isset($_POST[$a[$i] . '2']) && !isset($_POST[$a[$i] . '3'])) $quyen = 1;
                        if (!isset($_POST[$a[$i] . '1']) && isset($_POST[$a[$i] .'2']) && !isset($_POST[$a[$i] . '3'])) $quyen = 2;
                        if (!isset($_POST[$a[$i] . '1']) && !isset($_POST[$a[$i] . '2']) && isset($_POST[$a[$i] . '3'])) $quyen = 3;
                        if (isset($_POST[$a[$i] . '1']) && isset($_POST[$a[$i] . '2']) && !isset($_POST[$a[$i] . '3'])) $quyen = 4;
                        if (isset($_POST[$a[$i] . '1']) && !isset($_POST[$a[$i] . '2']) && isset($_POST[$a[$i] . '3'])) $quyen = 5;
                        if (!isset($_POST[$a[$i] . '1']) && isset($_POST[$a[$i] . '2']) && isset($_POST[$a[$i] . '3'])) $quyen = 6;
                        if (isset($_POST[$a[$i] . '1']) && isset($_POST[$a[$i] . '2']) && isset($_POST[$a[$i] . '3'])) $quyen = 7;
                        $this->quyen_model->edit($a[$i], $_POST[$a[$i] . 'name'], $_POST[$a[$i] . 'pass'], $quyen);
                    }
            }
            redirect('welcome/quyen', 'refresh');
        }
        if(isset($_POST['back'])) {
            redirect('welcome/quyen', 'refresh');
        }
    }

    public function view()
    {
        $sinhvien = $this->sv_model->get_sinhvien();
        $khoa = $this->sv_model->get_khoa();
        $nganh = $this->sv_model->get_nganh();
        $ngay = $this->sv_model->get_ngay();
        $kh = $this->sv_model->get_khoahoc();
        $data = array('sinhvien' => $sinhvien, 'kh' => $kh, 'khoa' => $khoa, 'ngay' => $ngay, 'nganh' => $nganh,'username' => $this->session->userdata("username"),'quyen' => $this->session->userdata("quyen"));
        $this->load->view('search', $data);
    }

    public function submit()
    {
        $sinhvien = $this->sv_model->get_sinhvien();
        $khoa = $this->sv_model->get_khoa();
        $nganh = $this->sv_model->get_nganh();
        $ngay = $this->sv_model->get_ngay();
        $kh = $this->sv_model->get_khoahoc();
        $khoahoc = $this->sv_model->khoahoc($_POST['khoahoc'], $_POST['khoa'], $_POST['ngay'], $_POST['nganh']);
        $data = array('sinhvien' => $sinhvien, 'khoahoc' => $khoahoc, 'khoa' => $khoa, 'ngay' => $ngay, 'nganh' => $nganh, 'kh' => $kh,'username' => $this->session->userdata("username"),'quyen' => $this->session->userdata("quyen"));
        $this->load->view('search', $data);

    }

    public function check(){
        if(isset($_POST['ok'])){
            if($_POST['username']!=''&&$_POST['password']!=''){
                if($this->sv_model->check_username($_POST['username'])){
                    if($this->sv_model->check_password($_POST['username'],$_POST['password'])){
                        $khoahoc = $this->sv_model->get_khoahoc();
                        $nganh = $this->sv_model->get_nganh();
                        $row = $this->sv_model->get_user($_POST['username']);
                        foreach ($row as $k =>$val):
                            $username=$val->name;
                            $quyen=$val->quyen;
                        endforeach;
                        $data1 = array ('username' => $username,'quyen' => $quyen);
                        $this->session->set_userdata($data1);
                        $data = array('khoahoc' => $khoahoc, 'nganh' => $nganh,'username' => $this->session->userdata("username"),'quyen' => $this->session->userdata("quyen"));
                        if($this->session->userdata("quyen")==7||$this->session->userdata("quyen")==5||$this->session->userdata("quyen")==4||$this->session->userdata("quyen")==1)
                            $this->load->view('sv_view', $data);
                        if($this->session->userdata("quyen")==2) {
                            $kh = $this->themkh_model->get_kh();
                            $data = array('kh' => $kh,'username' => $this->session->userdata("username"),'quyen' => $this->session->userdata("quyen"));
                            $this->load->view('themkh_view', $data);
                        }
                        if($this->session->userdata("quyen")==3||$this->session->userdata("quyen")==6) {
                            $nganh = $this->themnganh_model->get_nganh();
                            $data = array('nganh' => $nganh,'username' => $this->session->userdata("username"),'quyen' => $this->session->userdata("quyen"));
                            $this->load->view('themnganh_view', $data);
                        }


                    }
                    else{
                        echo '<script language="javascript">';
                        echo 'alert("Tài khoản hoặc mật khẩu không đúng")';
                        echo '</script>';
                        redirect('', 'refresh');
                    }
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Tài khoản không tồn tại")';
                    echo '</script>';
                    redirect('', 'refresh');
                }

            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Bạn chưa điền đầy đủ thông tin")';
                echo '</script>';
                redirect('', 'refresh');
            }
        }
    }

    public function do_upload()
    {

        if ($_FILES['file']['name'] != NULL) {

            $target_file = $_FILES['file']['tmp_name'] . basename($_FILES['file']['name']);
            $FileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $filename = $_FILES['file']['tmp_name'];
            if ($FileType == "xlsx" || $FileType == "xls") {
                $this->sv_model->readexcel($filename);
                redirect('Welcome/view', 'refresh');
            } else {

                echo '<script language="javascript">';
                echo 'alert("Sai kiểu file")';
                echo '</script>';
                redirect('', 'refresh');
            }

        } else {

            echo '<script language="javascript">';
            echo 'alert("Bạn chưa chọn file")';
            echo '</script>';
            redirect('Welcome/view', 'refresh');
        }

    }


    public function add()
    {
        $masv = $_POST['masv'];
        $hoten = $_POST['hoten'];
        $khoahoc = $_POST['khoahoc'];
        $khoa = $_POST['khoa'];
        $nganh = $_POST['nganh'];
        $this->sv_model->insertData($masv, $hoten, $khoahoc, $khoa, $nganh);
        redirect('Welcome/view', 'refresh');
    }

    public function export()
    {
        if (isset($_POST['save'])) {
            if (isset($_POST['chk_group'])) {
                $optionArray = $_POST['chk_group'];


                for ($i = 0; $i < count($optionArray); $i++) {
                    $query = $this->sv_model->get_sv($optionArray[$i]);
                    $this->sv_model->exported($optionArray[$i]);
                    foreach ($query as $row) {
                        $fp = fopen("sinhvien.ldap", "a+");
                        fwrite($fp, pack("CCC", 0xef, 0xbb, 0xbf));
                        fwrite($fp, "##!ou=" . $row->kh_ten . ",ou=" . $row->n_ten . ",ou=chinhquy,ou=sinhvien,ou=dhcn,ou=sinhvien,ou=vnu.ou=vn#@/home/ldap/sinhvien/chinhquy/" . $row->n_ten . "/" . $row->kh_ten . "#" . $row->masv . "!" . $row->masv . "!" . $row->masv . "!" . $row->masv . "!" . $row->hoten . "!\n");
                    }
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="'.basename("sinhvien.ldap").'"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize("sinhvien.ldap"));
                    readfile("sinhvien.ldap");
                    fclose($fp);
                    unlink('sinhvien.ldap');
                }
            }
            else {
                echo '<script language="javascript">';
                echo 'alert("Bạn chưa chọn sinh viên")';
                echo '</script>';
                redirect('Welcome/view', 'refresh');
            }
        }

        if(isset($_POST['edit'])) {
                if(isset($_POST['chk_group'])) {
                    $optionArray = $_POST['chk_group'];


                    for ($i = 0; $i < count($optionArray); $i++) {
                        $query = $this->sv_model->get_sv($optionArray[$i]);
                        foreach ($query as $row) {
                            $idsv[$i] = $row->sv_id;
                            $tensv[$i] = $row->hoten;
                            $masv[$i] = $row->masv;
                            $khoahoc[$i] = $row->kh_ten;
                            $khoa[$i] = $row->khoa;
                            $nganh[$i] = $row->n_ten;
                        }
                    }
                    $n = $this->sv_model->get_nganh();
                    $kh = $this->sv_model->get_khoahoc();
                    $data['idsv'] = $idsv;
                    $data['tensv'] = $tensv;
                    $data['masv'] = $masv;
                    $data['khoahoc'] = $khoahoc;
                    $data['khoa'] = $khoa;
                    $data['nganh'] = $nganh;
                    $data['n'] = $n;
                    $data['kh'] = $kh;
                    $data['username'] = $this->session->userdata("username");
                    $data['quyen'] = $this->session->userdata("quyen");
                    $this->load->view('editsv', $data);
                }
            else {
                    echo '<script language="javascript">';
                    echo 'alert("Bạn chưa chọn sinh viên")';
                    echo '</script>';
                    redirect('Welcome/view', 'refresh');
                }
            }
            if(isset($_POST['delete'])) {

                if(isset($_POST['chk_group'])) {
                    $optionArray = $_POST['chk_group'];

                    //$this->load->view('a', $data);
                    for ($i = 0; $i < count($optionArray); $i++) {
                        $query = $this->sv_model->get_sv($optionArray[$i]);
                        foreach ($query as $row) {
                            $tensv[$i] = $row->hoten;
                            $masv[$i] = $row->masv;
                            $idsv[$i] = $row->sv_id;
                        }
                    }
                    $data['tensv'] = $tensv;
                    $data['masv'] = $masv;
                    $data['idsv'] = $idsv;
                    $data['username'] = $this->session->userdata("username");
                    $data['quyen'] = $this->session->userdata("quyen");
                    $this->load->view('deletesv', $data);
                }
                else {
                    echo '<script language="javascript">';
                    echo 'alert("Bạn chưa chọn sinh viên")';
                    echo '</script>';
                    redirect('Welcome/view', 'refresh');
                }
            }


        }

    public function edit()
    {
        if(isset($_POST['save'])) {
            $sv = $this->sv_model->get_sinhvien();
            $i = 0;
            foreach ($sv as $row) {
                $a[$i] = $row->sv_id;
                $i++;
            }

            for ($i = 0; $i < count($a); $i++) {
                if (isset($_POST[$a[$i]]))
                    $this->sv_model->edit($a[$i], $_POST[$a[$i] . 'masv'], $_POST[$a[$i] . 'hoten'], $_POST[$a[$i] . 'kh'], $_POST[$a[$i] . 'khoa'], $_POST[$a[$i] . 'nganh']);
            }
            redirect('Welcome/view', 'refresh');
        }
        if(isset($_POST['back'])) {
            redirect('Welcome/view', 'refresh');
        }
    }
    public function delete()
    {
        if(isset($_POST['yes'])) {
            $nganh = $this->sv_model->get_sinhvien();
            $i = 0;
            foreach ($nganh as $row) {
                $a[$i] = $row->sv_id;
                $i++;
            }

            for ($i = 0; $i < count($a); $i++) {
                if (isset($_POST[$a[$i]]))

                    $this->sv_model->delete($_POST[$a[$i]]);
            }
            redirect('Welcome/view', 'refresh');
        }
        if(isset($_POST['no'])) {
            redirect('Welcome/view', 'refresh');
        }
    }

}
?>