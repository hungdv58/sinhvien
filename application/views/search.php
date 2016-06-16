<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>UET</title>
    <base href="<?php echo base_url(); ?>" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <a href="" class="logo">
            <span class="logo-lg"><b>UET</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="width: 200px">
                            <center>
                                <span class="hidden-xs" ><b>Tài khoản: <?php echo $username; ?></b></span>
                            </center>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">

                                <h1>
                                    <?php echo '<h4 style="color: white;"><b>'.$username.'</b></h4><br><h4 style="color: white;" > ';

                                    if($quyen==7)
                                        echo '<p>- Quản lí sinh viên</p><p>- Quản lí khóa học</p><p>- Quản lí ngành</p></td> <td>';
                                    if($quyen==6)
                                        echo '<p>- Quản lí khóa học</p><p>- Quản lí ngành</p></td> <td>';
                                    if($quyen==5)
                                        echo '<p>- Quản lí sinh viên</p><p>- Quản lí ngành</p></td> <td>';
                                    if($quyen==4)
                                        echo '<p>- Quản lí sinh viên</p><p>- Quản lí khóa học</p></td> <td>';
                                    if($quyen==3)
                                        echo '<p>- Quản lí ngành</p></td> <td>';
                                    if($quyen==2)
                                        echo '<p>- Quản lí khóa học</p></td> <td>';
                                    if($quyen==1)
                                        echo '<p>- Quản lí sinh viên</p></td>';

                                    echo '</h4>'; ?>

                                </h1>
                            </li>
                            <li class="user-footer">

                                <div class="pull-right">
                                    <form action="welcome/logout">
                                        <button  type="submit" class="btn btn-primary" name="logout">Sign out</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">
                <li class="header">Menu</li>

                <?php if($username=='admin') echo '
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Quản lí tài khoản</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="Welcome/quyen"><i class="fa fa-circle-o"></i> Danh sách tài khoản</a></li>

                    </ul>
                </li>';
                ?>
                <?php if($quyen==7) echo'
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Thêm dữ liệu</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li ><a href="Welcome/sv"><i class="fa fa-circle-o"></i> Thêm sinh viên</a></li>
                        <li class="active"><a href="Welcome/view"><i class="fa fa-circle-o"></i> Danh sách sinh viên</a></li>
                        <li ><a href="themnganh/view"><i class="fa fa-circle-o"></i> Danh sách ngành</a></li>
                        <li><a href="themkh/view"><i class="fa fa-circle-o"></i> Danh sách khóa học</a></li>
                    </ul>
                </li>';

                if($quyen==5) echo'
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Thêm dữ liệu</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="Welcome/sv"><i class="fa fa-circle-o"></i> Thêm sinh viên</a></li>
                        <li class="active" ><a href="Welcome/view"><i class="fa fa-circle-o"></i> Danh sách sinh viên</a></li>
                        <li><a href="themnganh/view"><i class="fa fa-circle-o"></i> Danh sách ngành</a></li>

                    </ul>
                </li>';
                if($quyen==4) echo'
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Thêm dữ liệu</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="Welcome/sv"><i class="fa fa-circle-o"></i> Thêm sinh viên</a></li>
                        <li class="active"><a href="Welcome/view"><i class="fa fa-circle-o"></i> Danh sách sinh viên</a></li>

                        <li><a href="themkh/view"><i class="fa fa-circle-o"></i> Danh sách khóa học</a></li>
                    </ul>
                </li>';

                if($quyen==1) echo'
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Thêm dữ liệu</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="Welcome/sv"><i class="fa fa-circle-o"></i> Thêm sinh viên</a></li>
                        <li class="active"><a href="Welcome/view"><i class="fa fa-circle-o"></i> Danh sách sinh viên</a></li>
                    </ul>
                </li>';
                ?>
            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
        <section class="content-header">
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h2>Danh sách sinh viên</h2>
                        </div>
                        <div class="box-header with-border">
                        <form action="welcome/submit" method="post">
                            <div>
                                <label style="font-size: large">Khóa học</label>
                                <select style="width: 150px" name="khoahoc">
                                    <option></option>
                                    <?php foreach ($kh as $k =>$val):
                                        echo '
                            <option>'.$val->kh_ten.'</option>;';
                                    endforeach;?>
                                </select>
                                <label style="font-size: large">      Ngành</label>
                                <select style="width: 150px" name="nganh">
                                    <option class="selected"></option>
                                    <?php foreach ($nganh as $k =>$val):
                                        echo '
                            <option>'.$val->n_ten.'</option>;';
                                    endforeach;?>
                                </select>
                                <label style="font-size: large">      Khoa</label>
                                <select style="width: 150px" name="khoa">
                                    <option></option>
                                    <?php foreach ($khoa as $k =>$val):
                                        echo '
                            <option>'.$val->khoa.'</option>;';
                                    endforeach;?>
                                </select>
                                <label style="font-size: large">      Ngày</label>
                                <select style="width: 150px" name="ngay">
                                    <option class="selected"></option>
                                    <?php foreach ($ngay as $k =>$val):
                                        echo '
                            <option>'.$val->date.'</option>;';
                                    endforeach;?>
                                </select>

                                  <input style="margin-left: 40px" type="submit" name="submit" class="btn btn-primary" value="Danh sách">
                            </div>
                        </form>
                            </div>
                        <?php
                        if(isset($_POST['submit'])) {
                            echo '
                    <form method="POST" action="welcome/export">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="10%">Mã sinh viên</th>
                        <th width="15%">Họ tên</th>
                        <th width="10%">Khóa học</th>
                        <th width="15%">Khoa</th>
                        <th width="10%">Ngành</th>
                        <th width="20%">Ngày cập nhật</th>
                        <th width="10%">Export</th>
                        <th><input type="checkbox" id="checkAll"/> Check all</th>
                      </tr>
                    </thead>
                    <tbody>'; ?>
                            <?php foreach ($khoahoc as $k => $val):
                                echo '<tr>
                        <td>' . $val->masv . '</td>
                        <td>' . $val->hoten . '</td>
                        <td>' . $val->kh_ten . '</td>
                        <td>' . $val->khoa . ' </td>
                        <td>' . $val->n_ten . ' </td>
                        <td>' . $val->datetime .'</td>';
                        if($val->export)
                                echo '<td>Exported </td>';
                        else
                            echo '<td> </td>';
                        echo '
                         <td>';?><input type="checkbox" name="chk_group[]"
                                        value="<?php echo $val->sv_id; ?>" class="checkbox1" /><?php echo '</td>
                      </tr>';
                            endforeach;
                            echo '
                      </tbody>
                    <tfoot>
                    <th colspan="8">
                        <input type="submit" class="btn btn-primary" name="save" align="left" style="float: right;" value="Export">
                        <input type="submit" class="btn btn-primary" name="edit" align="left" style="float: right;" value="Edit">
                        <input type="submit" class="btn btn-primary" name="delete" align="left" style="float: right;" value="Delete">
                    </th>
                    </tfoot>
                  </table>
                  </form>';
                        }
                        else {
                            echo '
                    <form method="POST" action="welcome/export">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                          <th width="10%">Mã sinh viên</th>
                        <th width="15%">Họ tên</th>
                        <th width="10%">Khóa học</th>
                        <th width="15%">Khoa</th>
                        <th width="10%">Ngành</th>
                        <th width="20%">Ngày cập nhật</th>
                        <th width="10%">Export</th>
                        <th><input type="checkbox" id="checkAll"/> Check all</th>
                      </tr>
                    </thead>
                    <tbody>'; ?>
                            <?php foreach ($sinhvien as $k => $val):
                                echo '<tr>
                        <td>' . $val->masv . '</td>
                        <td>' . $val->hoten . '</td>
                        <td>' . $val->kh_ten . '</td>
                        <td>' . $val->khoa . ' </td>
                        <td>' . $val->n_ten . ' </td>
                        <td>' . $val->datetime .'</td>';
                                if($val->export)
                                    echo '<td>Exported </td>';
                                else
                                    echo '<td> </td>';
                                echo '
                         <td>';?><input type="checkbox" name="chk_group[]"
                                        value="<?php echo $val->sv_id; ?>" class="checkbox1"/><?php echo '</td>
                      </tr>';
                            endforeach;
                            echo '
                      </tbody>
                    <tfoot>
                    <th colspan="8">
                        <input type="submit" class="btn btn-primary" name="edit" align="left" style="float: right;" value="Edit">
                        <input type="submit" class="btn btn-primary" name="delete" align="left" style="float: right;" value="Delete">
                        <input type="submit" class="btn btn-primary" name="save" align="left" style="float: right;" value="Export">
                    </th>
                    </tfoot>
                  </table>
                  </form>';
                        }
                        ?>
                    </div><!-- /.box -->

                </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->
<script src="assets/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src="assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
<script>
$(document).ready(function() {
$('#checkAll').click(function(event) { //on click
if(this.checked) { //Kiểm tra trạng thái đã chọn checkbox có id là selectall hay chưa
$('.checkbox1').each(function() { //lặp qua từng checkboxcheckbox
this.checked = true; //chọn tất cả checkbox có class là: "checkbox1"
});
}else{
$('.checkbox1').each(function() { //lặp qua từng checkboxcheckbox
this.checked = false; //deselect all checkboxes with class "checkbox1"
});
}
});
});
</script>
</body>
</html>
