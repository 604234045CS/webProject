<?php
  require_once('../db.php');
  // $upload_dir = 'uploads/';

  if (isset($_GET['user_id'])) {
    $uid = $_GET['user_id'];
    $sql = "select * from user where user_id='".$uid."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

  if(isset($_POST['Submit'])){
		$name = $_POST['user_name'];
    $last = $_POST['user_lastname'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $status = $_POST['status'];

    //---$userPic from Part 1
		if(!isset($errorMsg)){
			$sql = "update user
									set user_name = '".$name."',
                  user_lastname = '".$last."',
                  username = '".$user."',
                  password = '".$pass."',
                  status = '".$status."'
					where user_id ='".$uid."'";
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
    <title>จัดการข้อมูลพื้นฐานเจ้าหน้าที่</title>
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
        <a class="navbar-brand" href="index.php">จัดการข้อมูลผู้ใช้</a>
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
                แก้ไขข้อมูลผู้ใช้
              </div>
              <div class="card-body">
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="user_name">ชื่อ</label>
                      <input type="text" class="form-control" name="user_name"  placeholder="Enter Name" value="<?php echo $row['user_name']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="user_lastname">นามสกุล</label>
                      <input type="text" class="form-control" name="user_lastname" placeholder="Enter Mobile Number" value="<?php echo $row['user_lastname']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="username">รหัสผู้ใช้</label>
                      <input type="text" class="form-control" name="username" placeholder="Enter Email" value="<?php echo $row['username']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="password">รหัสผ่าน</label>
                      <input type="password" class="form-control" name="password" placeholder="Enter Mobile Number" value="<?php echo $row['password']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="status">รหัสผ่าน</label>
                      <!-- <input type="status" class="form-control" name="status" placeholder="Enter Mobile Number" value="<?php echo $row['status']; ?>" required> -->
                      <select id="status" name="status" value="<?php echo $row['status']; ?>">
                        <option value="ผู้อำนวยการ">ผู้อำนวยการ</option>
                        <option value="เจ้าหน้าที่">เจ้าหน้าที่</option>
                      </select>
                    </div>
        
                    <div class="form-group">
                      <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
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
