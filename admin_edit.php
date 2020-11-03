<?php
  require_once('db.php');
  // $upload_dir = 'uploads/';

  session_start();
  if(isset($_SESSION["user_id"])){
    $id = $_SESSION["user_id"];
    $sql = "select * from user where user_id='".$id."'";
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

    //---$userPic from Part 1
		if(!isset($errorMsg)){
			$sql = "update user
				    set user_name = '".$name."',
                    user_lastname = '".$last."',
                    username = '".$user."',
                    password = '".$pass."'
					where user_id='".$id."'";
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record updated successfully';
				header('Location: wel_admin.php');
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
    <title>แก้ไขข้อมูลส่วนตัว</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
  </head>
  <body>
  <!-- <div>
    <img src="student_img/visitHomeChana.jpg" class="img img_responsive" width="100%" >
  </div> -->

<?php
  include('wel_admin.php')
?>
  

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="../wel_admin.php">แก้ไขข้อมูลส่วนตัว</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
             <li class="nav-item"><a class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></a></li>
            </ul> 
         
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="btn btn-outline-danger" href="wel_admin.php"><i class="fa fa-sign-out-alt"></i></a></li>
            </ul>
        </div>
      </div>
    </nav>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                แก้ไขข้อมูลส่วนตัว
              </div>
              <div class="card-body">
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="user_name">ชื่อ</label>
                      <input type="text" class="form-control" name="user_name"  placeholder="Enter usename" value="<?php echo $row["user_name"]; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="user_lastname">นามสกุล</label>
                      <input type="text" class="form-control" name="user_lastname" placeholder="Enter password" value="<?php echo $row["user_lastname"]; ?>" required>
                    </div>

                    <div class="form-group">
                      <label for="username">ชื่อผู้ใช้</label>
                      <input type="text" class="form-control" name="username"  placeholder="Enter lastname" value="<?php echo $row["username"]; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="password">รหัสผ่าน</label>
                      <input type="password" class="form-control" name="password" placeholder="Enter level" value="<?php echo $row["password"]; ?>" required>
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

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">รายละเอียดข้อมูล</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="row">
                <div class="col-md">
                    <h5 class="form-control"><i class="fa fa-user-tag">
                      <span><?php echo $row['user_name'] .'  '.$row['user_lastname'];?></span>
                    </i></h5>
                    <h5 class="form-control"><i class="fa fa-user">
                      <span><?php echo $row['username'] ?></span>
                    </i></h5>
                    <h5 class="form-control"><i class="fa fa-key">
                      <span><?php echo $row['password'] ?></span>
                    </i></h5>
                </div>
              </div>
          </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
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
