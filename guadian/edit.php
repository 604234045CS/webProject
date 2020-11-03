<?php
  require_once('../db.php');
  // $upload_dir = 'uploads/';

  if (isset($_GET['gua_id'])) {
    $guaid  = $_GET['gua_id'];
    $sql = "select * from guardian where gua_id='".$guaid."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      // echo $row['gua_id'];
      // echo '$guaid';
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

  if(isset($_POST['Submit'])){
    $cizen = $_POST['gua_citizen'];
    $gname = $_POST['gua_name'];
    $glast = $_POST['gua_lastname'];
		$phone = $_POST['numphone'];
    $status = $_POST['status_stu'];

    //---$userPic from Part 1
		if(!isset($errorMsg)){
			$sql = "update guardian
									set gua_citizen = '".$cizen."',
                  gua_name = '".$gname."',
                  gua_lastname = '".$glast."',
                  numphone = '".$phone."',
                  status_stu = '".$status."'
					where gua_id='".$guaid."'";
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record updated successfully';
				header('Location:index.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
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
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="btn btn-outline-danger" href="index.php"><i class="fa fa-sign-out-alt"></i></a></li>
            </ul>
        </div>
      </div>
    </nav>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                แก้ไขข้อมูลผู้ปกครอง
              </div>
              <div class="card-body">
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="gua_citizen">หมายเลขบัตรประชาชน</label>
                      <input type="text" class="form-control" name="gua_citizen"  placeholder="Enter citizen" value="<?php echo $row['gua_citizen']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="gua_name">ชื่อ:</label>
                      <input type="text" class="form-control" name="gua_name" placeholder="Enter name" value="<?php echo $row['gua_name']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="gua_lastname">นามสกุล</label>
                      <input type="text" class="form-control" name="gua_lastname" placeholder="Enter lastname" value="<?php echo $row['gua_lastname']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="numphone">หมายเลขโทรศัพท์</label>
                      <input type="text" class="form-control" name="numphone" placeholder="Enter Mobile Number" value="<?php echo $row['numphone']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="status_stu">สถานะ</label>
                      <input type="text" class="form-control" name="status_stu" placeholder="Enter status" value="<?php echo $row['status_stu']; ?>" required>
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
</html>
