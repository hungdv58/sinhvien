<?php



class Themnganh extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('themnganh_model');
        $this->load->library("session");
    }


    public function view()
    {
        $nganh = $this->themnganh_model->get_nganh();
        $data = array('nganh' => $nganh,'username' => $this->session->userdata("username"),'quyen' => $this->session->userdata("quyen"));
        $this->load->view('themnganh_view', $data);
    }

    public function add()
    {
        $this->themnganh_model->add($_POST['nganh']);
        redirect('themnganh/view', 'refresh');
    }
    public function export()
    {
        if(isset($_POST['edit'])) {
            if(isset($_POST['chk_group'])) {
                $optionArray = $_POST['chk_group'];

                //$this->load->view('a', $data);
                for ($i = 0; $i < count($optionArray); $i++) {
                    $query = $this->themnganh_model->get_tennganh($optionArray[$i]);
                    foreach ($query as $row) {
                        $tennganh[$i] = $row->n_ten;
                        $idnganh[$i] = $row->n_id;
                    }
                }
                $data['tennganh'] = $tennganh;
                $data['idnganh'] = $idnganh;
                $data['username'] = $this->session->userdata("username");
                $data['quyen'] = $this->session->userdata("quyen");
                $this->load->view('editnganh', $data);
            }
            else {
                echo '<script language="javascript">';
                echo 'alert("Bạn chưa chọn ngành")';
                echo '</script>';
                redirect('themnganh/view', 'refresh');
            }
        }
        if(isset($_POST['delete'])) {
            if (isset($_POST['chk_group'])) {
                $optionArray = $_POST['chk_group'];

                //$this->load->view('a', $data);
                for ($i = 0; $i < count($optionArray); $i++) {
                    $query = $this->themnganh_model->get_tennganh($optionArray[$i]);
                    foreach ($query as $row) {
                        $tennganh[$i] = $row->n_ten;
                        $idnganh[$i] = $row->n_id;
                    }
                }
                $data['tennganh'] = $tennganh;
                $data['idnganh'] = $idnganh;
                $data['username'] = $this->session->userdata("username");
                $data['quyen'] = $this->session->userdata("quyen");
                $this->load->view('deletenganh', $data);
            } else {
                echo '<script language="javascript">';
                echo 'alert("Bạn chưa chọn ngành")';
                echo '</script>';
                redirect('themnganh/view', 'refresh');
            }
        }
    }


    public function edit()
    {
        if(isset($_POST['save'])) {
            $nganh = $this->themnganh_model->get_nganh();
            $i = 0;
            foreach ($nganh as $row) {
                $a[$i] = $row->n_id;
                $i++;
            }

            for ($i = 0; $i < count($a); $i++) {
                if (isset($_POST[$a[$i]]))
                    $this->themnganh_model->edit($a[$i], $_POST[$a[$i]]);
            }
            redirect('themnganh/view', 'refresh');
        }
        if(isset($_POST['back'])) {
            redirect('themnganh/view', 'refresh');
        }
    }
    public function delete()
    {
        if(isset($_POST['yes'])) {
            $nganh = $this->themnganh_model->get_nganh();
            $i = 0;
            foreach ($nganh as $row) {
                $a[$i] = $row->n_id;
                $i++;
            }

            for ($i = 0; $i < count($a); $i++) {
                if (isset($_POST[$a[$i]]))

                    $this->themnganh_model->delete($_POST[$a[$i]]);
            }
            redirect('themnganh/view', 'refresh');
        }
        if(isset($_POST['no'])) {
            redirect('themnganh/view', 'refresh');
        }
    }
}

?>