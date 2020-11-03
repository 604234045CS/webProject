<?php
include('db.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    include('wel_direc.php');
?>
<div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                รายชื่อนักเรียน
              </div>
              <div class="card-body">
                
              <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th>ชื่อ - นามสกุล</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
   <?php
      
      if (isset($_GET['level_id'])) {
        $levid = $_GET['level_id'];
        $sql = "select * from student INNER JOIN title ON title.t_id = student.t_id where level_id ='".$levid."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
          while($row = mysqli_fetch_assoc($result)){
        ?>
      <tr> 
        <td> <?php echo $row['t_name'].''.$row['stu_name'].' '. $row['stu_lastname'];?> </td> 
        <!-- <td> </td> -->
        <td class="text-center">
            <a href="data_inforhome.php?stu_id=<?php echo $row['stu_id'] ?>" class="btn btn-info"><i class="fa fa-list"></i></a>
            <!-- <a href="student/index.php"><button>ikptgvupf</button></a> -->
        </td>
        </tr>
        <?php
         }
        }
      }
        ?>
       
      </tbody>
      </table>
                    
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item"><a class="btn btn-outline-danger" href="level.php"><i class="fa fa-sign-out-alt">ย้อนกลับ</i></a></li>
                  </ul>
            </div>
          </div>
        </div>
      </div>

</body>
</html>
