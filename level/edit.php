<?php
  require_once('../db.php');
  // include('../menu.php');
  $upload_dir = '../student_img/';

  if (isset($_GET['stu_id'])) {
    $stuid = $_GET['stu_id'];
    $sql = "select * from student where stu_id=".$stuid;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }

  if(isset($_POST['Submit'])){
    $stucitizen = $_POST['stu_citizen'];
	  $stuname = $_POST['stu_name'];
	  $stulast = $_POST['stu_lastname'];
    $stulevel = $_POST['level_id'];
	  $stuaddress = $_POST['address'];
	  $stulati = $_POST['lati'];
    $stulongti = $_POST['longti'];
    $stugua = $_POST['gua_id'];
    //---1
    $imgName = $_FILES['stu_picture']['name'];
		$imgTmp = $_FILES['stu_picture']['tmp_name'];
		$imgSize = $_FILES['stu_picture']['size'];

		if($imgName){

			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

			$imgStu = time().'_'.rand(1000,9999).'.'.$imgExt;

			if(in_array($imgExt, $allowExt)){

				if($imgSize < 5000000){
					unlink($upload_dir.$row['stu_picture']);
					move_uploaded_file($imgTmp ,$upload_dir.$imgStu);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
      }
      
		}else{

			$imgStu = $row['stu_picture'];
    }
    //---1


    //---$userPic from Part 1
		if(!isset($errorMsg)){
			$sql = "update student
									set stu_citizen = '".$stucitizen."',
                    stu_name = '".$stuname."',
                    stu_lastname = '".$stulast."',
                    level_id = '".$stulevel."',
                    address = '".$stuaddress."',
                    lati = '".$stulati."',
                    longti = '".$stulongti."',
                    gua_id = '".$stugua."',
										stu_picture = '".$imgStu."'
					where stu_id=".$stuid;
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
    <title>จัดการข้อมูลนักเรียน</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
  </head>
  <body>
  <div>
    <img src="../student_img/visitHomeChana.jpg" class="img img_responsive" width="100%" >
  </div>


  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav">
             <li class="nav-item active">
                 <a class="nav-link" href="../student/index.php">จัดการข้อมูลนักเรียน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../teacher/index.php">จัดการข้อมูลครู</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../director/index.php">จัดการข้อมูลผู้อำนวยการ</a>
            </li>
            <li class="nav-item">
                 <a class="nav-link" href="../admin/index.php">จัดการข้อมูลเจ้าหน้าที่</a>
            </li>
             <li class="nav-item">
                 <a class="nav-link" href="../guadian/index.php">จัดการข้อมูลผู้ปกครอง</a>
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
                แก้ไขข้อมูลนักเรียน
              </div>
              <div class="card-body">
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="stu_citizen">หมายเลขประจำตัวประชาชน</label>
                      <input type="text" class="form-control" name="stu_citizen"  placeholder="Enter citizen" value="<?php echo $row['stu_citizen'] ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="stu_name">ชื่อ :</label>
                      <input type="text" class="form-control" name="stu_name" placeholder="Enter name" value="<?php echo $row['stu_name']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="stu_lastname">นามสกุล :</label>
                      <input type="text" class="form-control" name="stu_lastname" placeholder="Enter lastname" value="<?php echo $row['stu_lastname']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="level_id">ระดับชั้น</label>
                      <input type="text" class="form-control" name="level_id"  placeholder="Enter level" value="<?php echo $row['level_id']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="address">ที่อยู่ :</label>
                      <input type="text" class="form-control" name="address" placeholder="Enter address" value="<?php echo $row['address']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="lati">ละติจูด :</label>
                      <input type="text" class="form-control" name="lati" placeholder="Enter lati" value="<?php echo $row['lati']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="longti">ลองติจูด :</label>
                      <input type="text" class="form-control" name="longti"  placeholder="Enter longti" value="<?php echo $row['longti']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="gua_id">ผู้ปกครอง</label>
                      <input type="text" class="form-control" name="gua_id" placeholder="Enter gua" value="<?php echo $row['gua_id']; ?>" required>
                    </div>
                    

                    <div class="form-group">
                      <label for="stu_picture">แสดงรูปภาพ</label>
                      <div class="user-image mb-3 text-center">
                        <div style="width: 100px; height: 100px; overflow: hidden; background: #cccccc; margin: 0 auto">
                          <img src="<?php echo $upload_dir.$row['stu_picture'] ?>" class="figure-img img-fluid rounded" id="imgPlaceholder" alt="">
                        </div>
                      </div>
                    </div>                    
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" name="stu_picture" class="custom-file-input" id="stu_picture">
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
