<?php
  require_once('../db.php');
//   $upload_dir = 'uploads/';

  if (isset($_POST['Submit'])) {
    $name = $_POST['y_name'];
	$year = $_POST['y_year'];
	$status = $_POST['y_status'];
	
    

	if(empty($name)){
		$errorMsg = 'Please input name';
	}elseif(empty($year)){
		$errorMsg = 'Please input year';
	}elseif(empty($status)){
		$errorMsg = 'Please input status';
	}
		//---$userPic from Part 2
		if(!isset($errorMsg)){
			$sql = "insert into year(y_name, y_year, y_status)
					values('".$name."', '".$year."', '".$status."')";
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
