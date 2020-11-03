<?php
  include('../db.php');
  // $upload_dir = '../student_img/';

  if(isset($_GET['delete'])){
		$lev = $_GET['delete'];
		$sql = "select * from levels where level_id = ".$lev;
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$sql = "delete from student where level_id=".$lev;
			if(mysqli_query($conn, $sql)){
				header('location:index.php');
			}
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>จัดการข้อมูลระดับชั้น</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>

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
          <a class="navbar-brand" href="index.php">จัดการข้อมูลระดับชั้น</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto"></ul>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="btn btn-primary" href="create.php"><i class="fa fa-user-plus"></i></a></li>
              </ul>
          </div>
          
        </div>
      </nav>

      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ข้อมูลระดับชั้น</div>
                      <div class="card-body">
                      <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>รหัสระดับชั้น</th>
                                <th>ระดับชั้น</th>
                      
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                          <?php
                        
                            $sql = "select * from levels";
                            $result = mysqli_query($conn, $sql);
                    				if(mysqli_num_rows($result)){
                    					while($row = mysqli_fetch_assoc($result)){
                          ?>
                          <tr>
                          
                            <td><?php echo $row['level_id'] ?></td>
                            <td><?php echo $row['level'] ?></td>
                            <td class="text-center">
                              <a href="../student_m1.1.php?level_id=<?php echo $row['level_id'] ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                              <!-- <a href="edit.php?level_id=<?php echo $row['level_id'] ?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
                              <a href="index.php?delete=<?php echo $row['level_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash-alt"></i></a> -->
                            </td>
                          </tr>
                          <?php
                              }
                            }
                          ?>
                        </tbody>
                      </table>
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
