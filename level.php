<?php
     include('db.php');
    
    //  $sql = "SELECT COUNT(student.stu_id) as numstu,COUNT(inforhome.infor_id) as numin FROM student LEFT JOIN inforhome ON student.stu_id = inforhome.stu_id WHERE student.level_id = 'l01'";
    //  $result = mysqli_query($conn,$sql);
    //  if(mysqli_num_rows($result)){
    //   while($row = mysqli_fetch_assoc($result)){
    //     // echo $row['numstu'];
    //     // // echo " ";
    //     // echo $row['numin'];
    //   }
    // }
    // $status = 'ปัจจุบัน';
    // $dasql = "SELECT * FROM year where y_status = '".$status."'";
    //       $resu = mysqli_query($conn, $dasql);
    //         if(mysqli_num_rows($resu)){
    //           while($row3 = mysqli_fetch_assoc($resu)){
    //             // echo $row3['y_id'];
    //             // echo $row3['y_status'];
    //             // $year = $row3['y_id'];
    //             // echo $year;
    //             // echo $row3['y_name'];
    //           }
    //         }
             

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>จัดการข้อมูลพื้นฐานนักเรียน</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>

</head>
<body>

    <?php
    include('wel_direc.php');
    ?>
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
        <?php
                //       $dasql = "SELECT * FROM year";
                //       $resu = mysqli_query($conn, $dasql);
                //         if(mysqli_num_rows($resu)){
                //           while($row3 = mysqli_fetch_assoc($resu)){
                //             // echo $row3['y_status'];
                //             // $year = $row3['y_id'];
                //             // echo $year;
                //             // echo $row3['y_name'];
                //     ?>
                    <!-- <ul class="nav nav-tabs">
                //       <li class="active">
                //         <a class="nav-link active" data-toggle="tab" href="level.php?y_id=<?php echo $row3['y_id'] ?>"><?php echo $row3['y_year']?></a>
                //       </li>
                //     </ul> -->
                
          <!-- <a class="navbar-brand" href="index.php">ข้อมูลระดับชั้น</a> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto"></ul>
              <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item"><a class="btn btn-primary" href="create.php"><i class="fa fa-user-plus"></i></a></li> -->
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
                      <table id="example" class="table table-dark table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>รหัสระดับชั้น</th>
                                <th>ระดับชั้น</th>
                                <th>สถานะการเยี่ยมบ้าน</th>
                                <th>รายชื่อนักเรียน</th>
                            </tr>
                        </thead>

                        <tbody>
                          <?php
                            $sql = "select * from levels GROUP BY level ASC";
                            $result = mysqli_query($conn, $sql);
                    				if(mysqli_num_rows($result)){
                    					while($row = mysqli_fetch_assoc($result)){
                                
                          ?>
                          <tr>
                            <td><?php echo $row['level_id'] ?></td>
                            <td><?php echo $row['level']?></td>
                            
                            <td>
                                <?php
                                     
                                    $lev = $row['level_id'];
                                    $status = 'ปัจจุบัน';
                                    $dasql = "SELECT * FROM year where y_status = '".$status."'";
                                          $resu = mysqli_query($conn, $dasql);
                                            if(mysqli_num_rows($resu)){
                                              while($row3 = mysqli_fetch_assoc($resu)){
                                                 $yid = $row3['y_id'];
          
                              
                                    $datasql ="SELECT COUNT(student.stu_id) as numstu,COUNT(inforhome.infor_id) as numin FROM student 
                                                LEFT JOIN inforhome ON student.stu_id = inforhome.stu_id AND inforhome.y_id ='".$yid."' 
                                                LEFT JOIN year ON year.y_id=inforhome.y_id AND year.y_status='".$status."' WHERE student.level_id = '".$lev."'";
                                    $res = mysqli_query($conn,$datasql);
                                    if(mysqli_num_rows($res)){
                                     while($row2 = mysqli_fetch_assoc($res)){
                                      // echo $row2['numstu'];
                                      // echo $row2['numin'];
                                      if($row2['numstu'] == $row2['numin']){
                            
                                       echo "เยี่ยมเรียบร้อยแล้ว";
                                      }if($row2['numstu'] != $row2['numin']){
                                        echo "ยังไม่เรียบร้อย";
                              
                                       
                                      }
                                     }
                                    }
                                
                                  }
                                }
                                  
                                ?>

                             
                            </td>
                          
                            <td class="text-center">
                              <a href="listname.php?level_id=<?php echo $row['level_id'] ?>" class="btn btn-info"><i class="fa fa-address-book"></i></a>
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

    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
      } );
    </script>
    
</body>
</html>