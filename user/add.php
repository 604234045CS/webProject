<?php
  require_once('../db.php');
//   $upload_dir = 'uploads/';

  if (isset($_POST['Submit'])) {
	// $adid = $_POST['admin_id'];
	$title = $_POST['t_id'];
    $name = $_POST['user_name'];
	$last = $_POST['user_lastname'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$status = $_POST['status'];
	
	// $query = "SELECT * FROM student where admin_id = '$adid'";
	// $res = mysqli_query($conn, $query)or die("Error in sql : $query". mysqli_error($query));
	// if(mysqli_num_rows($res)>0){
	// 	echo 'รหัสเจ้าหน้าที่ซ้ำ';
	// }else{
	// 	echo 'ใช้รหัสเจ้าหน้าที่ได้';
	// }

	if(empty($title)){
		$errorMsg = 'Please input name';
	}elseif(empty($name)){
		$errorMsg = 'Please input name';
	}elseif(empty($last)){
		$errorMsg = 'Please input lastname';
	}elseif(empty($user)){
		$errorMsg = 'Please input user';
	}elseif(empty($pass)){
		$errorMsg = 'Please input pass';
	}elseif(empty($status)){
		$errorMsg = 'Please input status';
	}
		//---$userPic from Part 2
		if(!isset($errorMsg)){
			
			$sql = "insert into user(t_id, user_name, user_lastname, username, password, status)
					values('".$title."', '".$name."', '".$last."', '".$user."', '".$pass."', '".$status."')";	
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record added successfully';
				header('Location: index.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
				
			
				
				
			}
		}
	
  }
?>
