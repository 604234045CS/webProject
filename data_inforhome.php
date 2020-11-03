<?php
include('db.php');
// $upload_dir = '../student_img/';
    $status = 'ปัจจุบัน';
    $stuid = $_GET['stu_id'];
    $status = 'ปัจจุบัน';
    $dasql = "SELECT * FROM year where y_status = '".$status."'";
          $resu = mysqli_query($conn, $dasql);
            if(mysqli_num_rows($resu)){
              while($row3 = mysqli_fetch_assoc($resu)){
                 $yid = $row3['y_id'];
    // $sql = "select * from inforhome 
    // INNER JOIN student ON inforhome.stu_id = student.stu_id 
    // INNER JOIN guardian ON guardian.gua_id = student.gua_id 
    // INNER JOIN levels ON levels.level_id = student.level_id 
    // INNER JOIN teacher ON teacher.tea_id = inforhome.tea_id 
    // INNER JOIN imgsigna ON imgsigna.stu_id = student.stu_id 
    // INNER JOIN year ON year.y_id = inforhome.y_id AND year.y_id ='".$yid."' AND year.y_status='".$status."' 
    // WHERE student.stu_id = ".$stuid;
    $sql = "select * from inforhome INNER JOIN student ON inforhome.stu_id = student.stu_id 
            INNER JOIN guardian ON guardian.gua_id = student.gua_id 
            INNER JOIN levels ON levels.level_id = student.level_id 
            INNER JOIN teacher ON teacher.tea_id = inforhome.tea_id 
            INNER JOIN imgsigna ON imgsigna.stu_id = student.stu_id 
            INNER JOIN year ON year.y_id = inforhome.y_id AND imgsigna.y_id='".$yid."' 
            AND year.y_status='".$status."' WHERE student.stu_id = ".$stuid;
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        // echo $row['stu_id'];
         
      }else {
        $errorMsg = 'Could not Find Any Record';
        // echo 'ยังไม่มีข้อมูล';
        
      }
    }
  }

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
<!-- <style>
td {
  height: 50px;
  vertical-align: bottom;
}
</style> -->

</head>

<body>
<?php
    include('wel_direc.php');
?>

<div class="container">


  <h2>ข้อมูลการเยี่บมบ้านนักเรียน</h2>
  
  <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                รายละเอียอดข้อมูลการเยี่ยมบ้าน
              </div>
              <div class="card-body">
                
              <table class="thead-dark">
    <thead>
      <tr>
        <th>รายละเอียดการเยี่ยมบ้าน</th>
        <!-- <th>Lastname</th>
        <th>Email</th> -->
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>    ชื่อ-นามสกุล </br>
                หมายเลขบัตรประตัวประชาชน </br>
                ระดับชั้น </br>
                ผู้ปกครอง </br>
                ที่อยู่ </br>
                สมาชิกในครอบครัว </br>
                นักเรียนอาศัยอยู่กับ </br>
                อาชีพผู้ปกครอง </br>
                ความสัมพันธ์ในครอบครัว </br>
                รายได้ผู้ปกครอง </br>
                รายรับนักเรียน </br>
                สุขภาพนักเรียน </br>
                ระยะทาง </br>
                การเดินทางของนักเรียน </br>
                สภาพที่อยู่อาศัย </br>
                พฤติกรรมการใช้สารเสพติด </br>
                พฤติกรรมการใช้ความรุนแรง </br>
                พฤติกรรมทางเพศ </br>
                พฤติกรรมการเล่นเกม </br>
                ผู้ให้ข้อมูล </br>
                ภาพการเยี่ยมบ้าน </br>
                ลายมือชื่อผู้ปกครอง </br>
                ครูผู้เยี่ยม </br>
                วันที่เยี่ยม </br>
                ภาคการเยี่ยม </br>
                
        </td> 
        <td> </br>
              <?php echo $row['stu_name'] .' '. $row['stu_lastname'];?> </br>
              <?php echo $row['stu_citizen'];?> </br>
              <?php echo $row['level'];?> </br>
              <?php echo $row['gua_name'] .' '.$row['gua_lastname'];?> </br>
              <?php echo $row['address'];?> </br>
              <?php echo $row['member'];?> </br>
              <?php echo $row['live'];?> </br>
              <?php echo $row['career'];?> </br>
              <?php echo $row['relationship'];?> </br>
              <?php echo $row['income'];?> </br>
              <?php echo $row['money'];?> </br>
              <?php echo $row['health'];?> </br>
              <?php echo $row['distance'];?> </br>
              <?php echo $row['goschool'];?> </br>
              <?php echo $row['residence'];?> </br>
              <?php echo $row['substance'];?> </br>
              <?php echo $row['violence'];?> </br>
              <?php echo $row['sexual'];?> </br>
              <?php echo $row['game'];?> </br>
              <?php echo $row['informant'];?> </br>
              <img src="http://127.0.0.1/stu_chanawit/mobileApp/imgINFOR/<?php echo $row['img'] ?>" height="40"> </br>
              <img src="http://127.0.0.1/stu_chanawit/mobileApp/imgSIGNA/<?php echo $row['imgsig'] ?>" height="40"> </br>
              <?php echo $row['tea_name'].' '.$row['tea_lastname'];?> </br>
              <?php echo $row['date'];?> </br>
              <?php echo $row['y_name'];?> </br>
          </td>
        </tr>

      </tbody>
      </table>
                    
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item"><a class="btn btn-outline-danger" href="listname.php?level_id=<?php echo $row['level_id'] ?>"><i class="fa fa-sign-out-alt">ย้อนกลับ</i></a></li>
                  </ul>
            </div>
          </div>
        </div>
      </div>

</div>

</body>
</html>
