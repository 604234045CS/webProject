<?php
  include('add_g.php');
//    include('create.php');
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
        <a class="navbar-brand"  href="create.php">จัดการข้อมูลพื้นฐานผู้ปกครอง</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="btn btn-outline-danger" href="create.php?level_id=<?php echo $_GET['level_id'] ?>"><i class="fa fa-sign-out-alt"></i></a></li>
            </ul>
        </div>
      </div>
    </nav>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">เพิ่มข้อมูลผู้ปกครอง</div>
              <div class="card-body">
                <form class="" action="add_g.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="gua_id">รหัสผู้ปกครอง</label>
                      <input type="text" class="form-control" name="gua_id"  placeholder="Enter id" value="" required>
                    </div>
                    <div class="form-group">
                      <label for="t_id">คำนำหน้า</label>
                      <select id="t_id" name="t_id">
                        <option value="1">เด็กหญิง</option>
                        <option value="2">เด็กชาย</option>
                        <option value="3">นางสาว</option>
                        <option value="4">นาย</option>
                        <option value="5">นาง</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="gua_citizen">หมายเลขประจำตัวประชาชน</label>
                      <input type="text" class="form-control" name="gua_citizen" placeholder="Enter citizen" value="" pattern="[0-9]{13}" title="กรุณากรอกตัวเลข 13 หลักเท่านั้น" required>
                    </div>
                    <div class="form-group">
                      <label for="gua_name">ชื่อ</label>
                      <input type="text" class="form-control" name="gua_name" placeholder="Enter name" value="" required>
                    </div>
                    <div class="form-group">
                      <label for="gua_lastname">นามสกุล</label>
                      <input type="text" class="form-control" name="gua_lastname"  placeholder="Enter lastname" value="" required>
                    </div>
                    <div class="form-group">
                      <label for="numphone">หมายเลขโทรศัพท์</label>
                      <input type="text" class="form-control" name="numphone" placeholder="Enter Mobile Number" value="" pattern="[0-9]{10}" title="กรุณากรอกตัวเลข 10 หลักเท่านั้น" required>
                    </div>
                    <div class="form-group">
                      <label for="status_stu">สถานะผู้ปกครอง</label>
                      <input type="text" class="form-control" name="status_stu" placeholder="Enter status" value="" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="Submit" class="btn btn-primary waves">บันทึก</button>
                    </div>
                </form>
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

  </body>
