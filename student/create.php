<?php
  // include('../menu.php');
  include('add.php');
  // if (isset($_GET['level_id'])){
  //   $levid = $_GET['level_id'];
  // }
   

    // $sql = "select * from levels where level_id ='".$levid"'";

    // $result = mysqli_query($conn, $sql);
    // if(mysqli_num_rows($result) > 0){
    //     $row = mysqli_fetch_assoc($result);
    //     // echo $row['stu_id'];
         
    //   }else {
    //     $errorMsg = 'Could not Find Any Record';
    //   }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>จัดการข้อมูลนักเรียน</title>
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
        <a class="navbar-brand" href="index.php">จัดการข้อมูลนักเรียน</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="btn btn-primary" href="create_g.php?level_id=<?php echo $_GET['level_id'] ?>"><i class="fa fa-user-plus"></i> เพิ่มข้อมูลผู้ปกครอง</a></li>
              </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="btn btn-outline-danger" href="index.php?level_id=<?php echo $_GET['level_id'] ?>"><i class="fa fa-sign-out-alt"></i></a></li>
            </ul>
            
        </div>
      </div>
    </nav>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">เพิ่มข้อมูลนักเรียน</div>
              <div class="card-body">
                <form class="" action="add.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="stu_id">รหัสนักเรียน</label>
                      <input type="text" class="form-control" name="stu_id"  placeholder="Enter id" value="" pattern="[0-9]{4}" title="กรุณากรอกตัวเลข 4 หลักโดยเลข 2 ตัวหน้าตามปีการศึกษาเท่านั้น" required>
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
                      <label for="stu_citizen">หมายเลขประจำตัวประชาชน</label>
                      <input type="text" class="form-control" name="stu_citizen"  placeholder="Enter citizen" value="" pattern="[0-9]{13}" title="กรุณากรอกตัวเลข 13 หลักเท่านั้น" required>
                    </div>
                    <div class="form-group">
                      <label for="stu_name">ชื่อ :</label>
                      <input type="text" class="form-control" name="stu_name" placeholder="Enter name" value="" required>
                    </div>
                    <div class="form-group">
                      <label for="stu_lastname">นามสกุล :</label>
                      <input type="text" class="form-control" name="stu_lastname" placeholder="Enter lastname" value="" required>
                    </div>
                    <div class="form-group">
                      <label for="level_id">ระดับชั้น</label>
                      <!-- <input type="text" class="form-control" name="level_id"  placeholder="Enter level" value="" required> -->
                      <select id="level_id" name="level_id">
                        <option value="l01">ชั้นมัธยมศึกษาปีที่ 1/1</option>
                        <option value="l11">ชั้นมัธยมศึกษาปีที่ 1/2</option>
                        <option value="l02">ชั้นมัธยมศึกษาปีที่ 2/1</option>
                        <option value="l22">ชั้นมัธยมศึกษาปีที่ 2/2</option>
                        <option value="l03">ชั้นมัธยมศึกษาปีที่ 3/1</option>
                        <option value="l33">ชั้นมัธยมศึกษาปีที่ 3/2</option>
                        <option value="l04">ชั้นมัธยมศึกษาปีที่ 4</option>
                        <option value="l05">ชั้นมัธยมศึกษาปีที่ 5</option>
                        <option value="l06">ชั้นมัธยมศึกษาปีที่ 6</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="address">ที่อยู่ :</label>
                      <input type="text" class="form-control" name="address" placeholder="Enter address" value="" required>
                    </div>
                    <div class="form-group">
                      <label for="lati">ละติจูด :</label>
                      <input type="text" class="form-control" name="lati" placeholder="Enter lati" value="" pattern="[0-9]{1}.[0-9]{6}" title="กรุณากรอกตัวเลขเท่านั้น" required>
                    </div>
                    <div class="form-group">
                      <label for="longti">ลองติจูด :</label>
                      <input type="text" class="form-control" name="longti" placeholder="Enter longti" value="" pattern="[0-9]{3}.[0-9]{6}" title="กรุณากรอกตัวเลขเท่านั้น" required>
                    </div>
                    
                    
                    <div class="form-group">
                      <!-- <label for="gua_id">ผู้ปกครอง </label>
                      <input type="text" class="form-control" name="gua_id" placeholder="Enter gua" value="" required> -->

                      <label for="gua_id">ผู้ปกครอง</label>
                      <select id="gua_id" name="gua_id"> 
                      <!-- <?php foreach($row as $sh){?><option value="<?php echo $row['gua_id']?>"><?php echo $row['gua_name'].' '.$row['gua_lastname']?></option><?php }?> -->
                      <?php
                       $sql = "select * from guardian INNER JOIN title ON guardian.t_id = title.t_id";
                       $result = mysqli_query($conn, $sql);
                       if (mysqli_num_rows($result) > 0) {
                        //  $row = mysqli_fetch_assoc($result);

                         while($row = mysqli_fetch_assoc($result)){
                          // echo $row['gua_id'];
                          
                        
                    ?>
                        <option value="<?php echo $row['gua_id']?>"><?php echo $row['gua_name'].' '.$row['gua_lastname']?> 
                        <?php
                      }
                     }else {
                       $errorMsg = 'Could not Find Any Record';
                     }
                    ?>  
                      </select>
                    </div>
                     
                    

                    <div class="form-group">                      
                      <div class="user-image mb-3 text-center">
                        <label for="stu_picture">แสดงรูปภาพ</label>
                        <div style="width: 100px; height: 100px; overflow: hidden; background: #cccccc; margin: 0 auto">
                          <img src="..." class="figure-img img-fluid rounded" id="imgPlaceholder" alt="">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" name="stu_picture" class="custom-file-input"  id="stu_picture" required>
                        <label class="custom-file-label" for="stu_picture">เลือกรูปภาพ</label>
                      </div>
                    </div>
                    <br/>

                    
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




    <script>
      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#imgPlaceholder').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
      }

      $("#stu_picture").change(function () {
        readURL(this);
      });
    </script>

  </body>
</html>
