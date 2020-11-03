<?php
  include('db.php');

  // session_start();
  // $id = $_SESSION["Dir_id"];
  // $id = $_SESSION["username"];
  // echo $id;
  // $name = $_SESSION["Dir_name"];
  //   echo $name;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ข้อมูลการเยี่ยมบ้าน</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>

  </head>
  <body>
      
  <div>
    <img src="student_img/mai.jpg" class="img img_responsive" width="100%" >
  </div>
    <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
    </button>
    
     <!-- <button href="direc_edit/edit.php">
   <span class="fa fa-user-circle-o"></span>
    </button>  -->
    <!-- <li class="nav-item"><a class="btn btn-outline-danger" href="direc_edit/edit.php"><i class="fa fa-user-circle-o"></i></a></li> --> -->
    
    <ul class="nav">
             <li class="nav-item active">
                 <a class="nav-link" href="level.php">สถานะการเยี่ยมบ้าน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="summary.php">ข้อมูลสรุปการเยี่ยมบ้าน</a>
            </li>
           <li class="nav-item">
                <a class="btn btn-outline-danger" href="director_edit.php"><i  aria-hidden="true"></i>แก้ไขข้อมูลส่วนตัว</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><iaria-hidden="true"></i> ออกจากระบบ</a>
            </li> 

            

            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="dropdown-menu" role="button">ตั้งค่า</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="director_edit.php">แก้ไขข้อมูลส่วนตัว</a>
                <a class="dropdown-item" href="index.php">ออกจากระบบ</a>
              </div>
            </li> -->
       </ul> 

       
     </nav> 


    
  </body>
  <!-- <footer class="page-footer font-small special-color-dark pt-4">
<div class="footer-copyright text-center py-3">© 2020 Copyright:
  <a href="https://www.chanawittaya.ac.th/"> โรงเรียนจะนะวิทยา</a>
</div>
</footer> -->

</html>
