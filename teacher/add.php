<?php
  require_once('../db.php');
//   $upload_dir = 'uploads/';

  if (isset($_POST['Submit'])) {
	$teaid = $_POST['tea_id'];
	$title = $_POST['t_id'];
    $user = $_POST['username'];
	$pass = $_POST['password'];
	$name = $_POST['tea_name'];
    $lastname = $_POST['tea_lastname'];
    $level = $_POST['level_id'];

    if(empty($teaid)){
			$errorMsg = 'Please input tea_id';
		}elseif(empty($title)){
			$errorMsg = 'Please input title';
		}elseif(empty($user)){
			$errorMsg = 'Please input username';
		}elseif(empty($pass)){
			$errorMsg = 'Please input password';
		}elseif(empty($name)){
			$errorMsg = 'Please input tea_name';
		}elseif(empty($lastname)){
			$errorMsg = 'Please input tea_lastname';
		}elseif(empty($level)){
			$errorMsg = 'Please input level_id';
		}

		//---$userPic from Part 2
		if(!isset($errorMsg)){
			$query = "SELECT * FROM tea_id where stu_id ='".$teaid."'";
			$sql = "insert into teacher(tea_id, t_id, username, password, tea_name, tea_lastname, level_id)
					values('".$teaid."','".$title."' , '".$user."', '".$pass."', '".$name."', '".$lastname."', '".$level."')";
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record added successfully';
				header('Location: index.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
				echo 'รหัสครูซ้ำ';
			}
		}
  }
?>
