<?php
  require_once('../db.php');
//   include('../menu.php');
//   $upload_dir = '../student_img/';

  

  if (isset($_POST['Submit'])) {
    $level_id = $_POST['level_id'];
    $level = $_POST['level'];
	

    if(empty($lev)){
			$errorMsg = 'Please input id';
		}else{
			$errorMsg = 'Please input level';
		}

		//---$userPic from Part 2
		if(!isset($errorMsg)){
			$sql = "insert into levels(level_id, level)
					values('".$level_id."', '".$level."')";
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
