<?php
  require_once('../db.php');
//   $upload_dir = 'uploads/';

  if (isset($_POST['Submit'])) {
	$guaid = $_POST['gua_id'];
	$title = $_POST['t_id'];
    $cizen = $_POST['gua_citizen'];
	$gname = $_POST['gua_name'];
	$glast = $_POST['gua_lastname'];
	$phone = $_POST['numphone'];
	$status = $_POST['status_stu'];
    

	if(empty($guaid)){
		$errorMsg = 'Please input id';
	}elseif(empty($title)){
		$errorMsg = 'Please input title';
	}elseif(empty($cizen)){
		$errorMsg = 'Please input name';
	}elseif(empty($gname)){
		$errorMsg = 'Please input lastname';
	}elseif(empty($glast)){
		$errorMsg = 'Please input user';
	}elseif(empty($phone)){
		$errorMsg = 'Please input pass';
	}elseif(empty($status)){
		$errorMsg = 'Please input pass';
	}
		//---$userPic from Part 2
		if(!isset($errorMsg)){
			$query = "SELECT * FROM director where gua_id = '".$guaid."'";
			$sql = "insert into guardian(gua_id,t_id, gua_citizen, gua_name, gua_lastname, numphone, status_stu)
					values('".$guaid."','".$title."', '".$cizen."', '".$gname."', '".$glast."', '".$phone."', '".$status."')";
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record added successfully';
				header('Location: index.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
				echo 'รหัสผู้ปกครองซ้ำ';
			}
		}
	
  }
?>
