<?php



class Themkh extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('themkh_model');
        $this->load->library("session");
    }


    public function view()
    {
        $kh = $this->themkh_model->get_kh();
        $data = array('kh' => $kh,'username' => $this->session->userdata("username"),'quyen' => $this->session->userdata("quyen"));
        $this->load->view('themkh_view', $data);
    }
    public function add()
    {
        $this->themkh_model->add($_POST['khoahoc']);
        redirect('themkh/view', 'refresh');
    }
    public function export()
    {
        if(isset($_POST['edit'])) {
            if(isset($_POST['chk_group'])) {

                    $optionArray = $_POST['chk_group'];

                    //$this->load->view('a', $data);
                    for ($i = 0; $i < count($optionArray); $i++) {
                        $query = $this->themkh_model->get_tenkh($optionArray[$i]);
                        foreach ($query as $row) {
                            $tenkh[$i] = $row->kh_ten;
                            $idkh[$i] = $row->kh_id;
                        }
                    }
                    $data['tenkh'] = $tenkh;
                    $data['idkh'] = $idkh;
                    $data['username'] = $this->session->userdata("username");
                    $data['quyen'] = $this->session->userdata("quyen");
                    $this->load->view('editkh', $data);
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
                    $query = $this->themkh_model->get_tenkh($optionArray[$i]);
                    foreach ($query as $row) {
                        $tenkh[$i] = $row->kh_ten;
                        $idkh[$i] = $row->kh_id;
                    }
                }
                $data['tenkh'] = $tenkh;
                $data['idkh'] = $idkh;
                $data['username'] = $this->session->userdata("username");
                $data['quyen'] = $this->session->userdata("quyen");
                $this->load->view('deletekh', $data);
            }
            else {
                    echo '<script language="javascript">';
                    echo 'alert("Bạn chưa chọn khóa học")';
                    echo '</script>';
                    redirect('themkh/view', 'refresh');
                }
        }
    }


    public function edit()
    {
        if(isset($_POST['save'])) {
            $kh = $this->themkh_model->get_kh();
            $i = 0;
            foreach ($kh as $row) {
                $a[$i] = $row->kh_id;
                $i++;
            }

            for ($i = 0; $i < count($a); $i++) {
                if (isset($_POST[$a[$i]]))
                    $this->themkh_model->edit($a[$i], $_POST[$a[$i]]);
            }
            redirect('themkh/view', 'refresh');
        }
        if(isset($_POST['back'])) {
            redirect('themkh/view', 'refresh');
        }
    }
    public function delete()
    {
        if(isset($_POST['yes'])) {
            $kh = $this->themkh_model->get_kh();
            $i = 0;
            foreach ($kh as $row) {
                $a[$i] = $row->kh_id;
                $i++;
            }

            for ($i = 0; $i < count($a); $i++) {
                if (isset($_POST[$a[$i]]))

                    $this->themkh_model->delete($_POST[$a[$i]]);
            }
            redirect('themkh/view', 'refresh');
        }
        if(isset($_POST['no'])) {
            redirect('themkh/view', 'refresh');
        }
    }
}

?>