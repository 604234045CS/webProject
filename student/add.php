<?php
  require_once('../db.php');
//   include('../menu.php');
  $upload_dir = '../student_img/';

  

  if (isset($_POST['Submit'])) {
	$stuid = $_POST['stu_id'];
	$title = $_POST['t_id'];
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
	//---1



    if(empty($stuid)){
			$errorMsg = 'Please input id';
		}elseif(empty($title)){
			$errorMsg = 'Please input title';
		}elseif(empty($stucitizen)){
			$errorMsg = 'Please input citizen';
		}elseif(empty($stuname)){
			$errorMsg = 'Please input name';
		}elseif(empty($stulast)){
			$errorMsg = 'Please input lastname';
		}elseif(empty($stulevel)){
			$errorMsg = 'Please input level';
		}elseif(empty($stuaddress)){
			$errorMsg = 'Please input address';
		}elseif(empty($stulati)){
			$errorMsg = 'Please input lati';
		}elseif(empty($stulongti)){
			$errorMsg = 'Please input longti';
		}elseif(empty($stugua)){
			$errorMsg = 'Please input gua_id';
		}else{

			//---2
			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
			

			$imgStu = time().'_'.rand(1000,9999).'.'.$imgExt;

			if(in_array($imgExt, $allowExt)){

				if($imgSize < 5000000){
					move_uploaded_file($imgTmp ,$upload_dir.$imgStu);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
			//---2

		}

		//---$userPic from Part 2
		if(!isset($errorMsg)){
			$query = "SELECT * FROM student where stu_id =$stuid";
			$sql = "insert into student(stu_id, t_id, stu_citizen, stu_name, stu_lastname, level_id, 	address, lati, longti, gua_id, stu_picture)
					values('".$stuid."','".$title."', '".$stucitizen."', '".$stuname."','".$stulast."', '".$stulevel."', '".$stuaddress."','".$stulati."', '".$stulongti."', '".$stugua."', '".$imgStu."')";
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record added successfully';
				header('Location: index.php?level_id='.$stulevel.'');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
				echo 'รหัสนักเรียนซ้ำ';
			}
		}
  }
?>
