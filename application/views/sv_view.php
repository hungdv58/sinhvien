<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>UET</title>
    <base href="<?php echo base_url(); ?>" />
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->

                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>UET</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->

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
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          
          <!-- search form -->
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
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
                        <li class="active"><a href="Welcome/sv"><i class="fa fa-circle-o"></i> Thêm sinh viên</a></li>
                        <li ><a href="Welcome/view"><i class="fa fa-circle-o"></i> Danh sách sinh viên</a></li>
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
                        <li class="active"><a href="Welcome/sv"><i class="fa fa-circle-o"></i> Thêm sinh viên</a></li>
                        <li  ><a href="Welcome/view"><i class="fa fa-circle-o"></i> Danh sách sinh viên</a></li>
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
                        <li class="active"><a href="Welcome/sv"><i class="fa fa-circle-o"></i> Thêm sinh viên</a></li>
                        <li ><a href="Welcome/view"><i class="fa fa-circle-o"></i> Danh sách sinh viên</a></li>

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
                        <li class="active"><a href="Welcome/sv"><i class="fa fa-circle-o"></i> Thêm sinh viên</a></li>
                        <li ><a href="Welcome/view"><i class="fa fa-circle-o"></i> Danh sách sinh viên</a></li>
                    </ul>
                </li>';
              ?>
            
            
            
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2>Thêm sinh viên bằng file excel</h2>

                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="Welcome/do_upload" enctype="multipart/form-data" name="sub" >
                  <div class="box-body">
                    
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="exampleInputFile" name="file">
                      
                    </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name='save'> Submit </button>
                  </div>
                </form>
              </div><!-- /.box -->
              
              <div class="box box-primary">
                <div class="box-header with-border">
                <h2>Thêm sinh viên</h2>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="Welcome/add" enctype="multipart/form-data" name="sub" >
                
                  <div class="box-body">
                    <div class="form-group">
                        <label>Mã sinh viên</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="masv"/>    
                      
                    </div>
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="hoten"/>    
                      
                    </div>
                    
                    <div class="form-group">
                      <label>Khóa học</label>
                        <select class="form-control select2" name="khoahoc" >
                        <?php foreach ($khoahoc as $k =>$val):
                        echo '
                        <option>'.$val->kh_ten.'</option>';
                        endforeach; ?>
                    </div>
                    <div class="form-group">
                    <label></label>
                    <select class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Khoa</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="khoa"/>    
                      
                    </div>
                    <div class="form-group">
                      <label>Ngành</label>
                        <select class="form-control select2" name="nganh" >
                        <?php foreach ($nganh as $k =>$val):
                        echo '
                        <option>'.$val->n_ten.'</option>';
                        endforeach; ?>
                    </div>
                    <div class="form-group">
                    <label></label>
                    <select class="form-control">
                        </select>
                    </div>
                    
                    
                  </div>
                
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name='submit'> Submit </button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div>
           
              
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      

      <!-- Control Sidebar -->
      
     
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
  </body>
</html>
