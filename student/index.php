<?php
  include('../db.php');
  $upload_dir = '../student_img/';

  if(isset($_GET['delete'])){
		$stuid = $_GET['delete'];
		$sql = "select * from student where stu_id = ".$stuid;
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
      $imgStu = $row['stu_picture'];
      $levid = $row['level_id'];
			unlink($upload_dir.$stu_picture);
			$sql = "delete from student where stu_id=".$stuid;
			if(mysqli_query($conn, $sql)){
				header('location:index.php?level_id='.$levid.'');
			}
		}
  }

  if (isset($_GET['level_id'])){
    $levid = $_GET['level_id'];
    $sql = "select * from student where level_id='".$levid."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)){
       while($row = mysqli_fetch_assoc($result)){
       }
      }
    }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>จัดการข้อมูลพื้นฐานนักเรียน</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
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
          <a class="navbar-brand" href="index.php">จัดการข้อมูลพื้นฐานนักเรียน</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto"></ul>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="btn btn-primary" href="create.php?level_id=<?php echo $_GET['level_id'] ?>"><i class="fa fa-user-plus"></i> เพิ่มข้อมูลนักเรียน</a></li>
              </ul>
          </div>
          
        </div>
      </nav>

      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ข้อมูลนักเรียน</div>
                      <div class="card-body">
                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>รหัสนักเรียน</th>
                                <th>รูปนักเรียน</th>
                                <th>หมายเลขประจำตัวประชาชน</th>
                                <th>คำนำหน้า</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>ระดับชั้น</th>
                                <!-- <th>ที่อยู่</th>
                                <th>ละติจูด</th>
                                <th>ลองติจูด</th>
                                <th>ผู้ปกครอง</th> -->
                                <!-- <th>Actions</th> -->
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                          <?php
                           if (isset($_GET['level_id'])){
                            $levid = $_GET['level_id'];
                            $sql = "select * from student INNER JOIN levels ON student.level_id = levels.level_id 
                                  INNER JOIN title ON student.t_id = title.t_id
                                  where student.level_id='".$levid."'";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result)){
                               while($row = mysqli_fetch_assoc($result)){
                          ?>
                          <tr>
                            <td><?php echo $row['stu_id'] ?></td>
                            <td><img src="<?php echo $upload_dir.$row['stu_picture'] ?>" height="40"></td>
                            <td><?php echo $row['stu_citizen'] ?></td>
                            <td><?php echo $row['t_name'] ?></td>
                            <td><?php echo $row['stu_name'].' '.$row['stu_lastname'] ?></td>
                            <td><?php echo $row['level'] ?></td>
                            <!-- <td><?php echo $row['address'] ?></td>
                            <td><?php echo $row['lati'] ?></td>
                            <td><?php echo $row['longti'] ?></td>
                            <td><?php echo $row['gua_id'] ?></td> -->
                            <!-- <td class="text-center">
                              <a href="show.php?stu_id=<?php echo $row['stu_id'] ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                              <a href="edit.php?stu_id=<?php echo $row['stu_id'] ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
                              <a href="index.php?delete=<?php echo $row['stu_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash-alt"></i></a>
                            </td> -->
                            <td> <a href="show.php?stu_id=<?php echo $row['stu_id'] ?>" class="btn btn-success"><i class="fa fa-eye"></i></a></td>
                            <td> <a href="edit.php?stu_id=<?php echo $row['stu_id'] ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a></td>
                            <td> <a href="index.php?delete=<?php echo $row['stu_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash-alt"></i></a></td>
                          </tr>
                          <?php
                              }
                            }
                          }
                          ?>
                        </tbody>
                      </table>
                      <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="btn btn-outline-danger" href="../level_ad.php"><i class="fa fa-sign-out-alt">ย้อนกลับ</i></a></li>
                      </ul>
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
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
      } );
    </script>
  </body>
</html>
