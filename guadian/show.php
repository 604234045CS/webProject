<?php
  require_once('../db.php');
  // $upload_dir = 'uploads/';

  if (isset($_GET['gua_id'])) {
    $guaid = $_GET['gua_id'];
    $sql = "select * from guardian INNER JOIN title ON guardian.t_id = title.t_id where gua_id='".$guaid."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>จัดการข้อมูลพื้นฐานผู้ปกครอง</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
  </head>
  <body>
  <div>
    <img src="../student_img/mai.jpg" class="img img_responsive" width="100%" >
  </div>


  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav">
             <li class="nav-item active">
                 <a class="nav-link" href="../level_ad.php">จัดการข้อมูลนักเรียน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../teacher/index.php">จัดการข้อมูลครู</a>
            </li>
           
            <li class="nav-item">
                 <a class="nav-link" href="../user/index.php">จัดการข้อมูลผู้ใช้</a>
            </li>
             <li class="nav-item">
                 <a class="nav-link" href="../guadian/index.php">จัดการข้อมูลผู้ปกครอง</a>
            </li>
            <li class="nav-item">
                 <a class="nav-link" href="../year/index.php">จัดการข้อมูลปีการศึกษา</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-danger" href="../admin_edit.php"><i  aria-hidden="true"></i> แก้ไขข้อมูลส่วนตัว</a>
            </li>
            <li class="nav-item">
                 <a class="nav-link" href="../logout.php">ออกจากระบบ</a>
            </li>
        </ul>
    
     </nav>

      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
          <a class="navbar-brand" href="index.php">จัดการข้อมูลพื้นฐานผู้ปกครอง</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto"></ul>

          </div>
        </div>
      </nav>

      <div class="container">
        <div class="row justify-content-center">
          <div class="card">
            <div class="card-header">
              รายละเอียดข้อมูลผู้ปกครอง
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md">
                    <h5 class="form-control"><i class="fa fa-user">
                      <span><?php echo $row['gua_citizen'] ?></span>
                    </i></h5>
                    <h5 class="form-control"><i class="fa fa-user">
                      <span><?php echo $row['t_name'] ?></span>
                    </i></h5>
                    <h5 class="form-control"><i class="fa fa-envelope">
                      <span><?php echo $row['gua_name'] .'  '.$row['gua_lastname']?></span>
                    </i></h5>
                    <h5 class="form-control"><i class="fa fa-address-book">
                      <span><?php echo $row['gua_citizen'] ?></span>
                    </i></h5>
                    <h5 class="form-control"><i class="fa fa-mobile-alt">
                      <span><?php echo $row['numphone'] ?></span>
                    </i></h5>
                    <h5 class="form-control"><i class="fa fa-envelope">
                      <span><?php echo $row['status_stu'] ?></span>
                    </i></h5>

                      <a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i><span>Back</span></a>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <footer class="page-footer font-small special-color-dark pt-4">
<div class="footer-copyright text-center py-3">© 2020 Copyright:
  <a href="https://www.chanawittaya.ac.th/"> โรงเรียนจะนะวิทยา</a>
</div>
</footer>
      <script src="js/bootstrap.min.js" charset="utf-8"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
      <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable();
        } );
      </script>
    </body>
  </html>
