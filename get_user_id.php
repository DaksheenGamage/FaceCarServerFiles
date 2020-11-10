<?php

header('Content-Type: application/json');


if($_SERVER['REQUEST_METHOD']=='POST'){
	
		$email=$_POST['email'];
		$requesttype=$_POST['requestType'];
		$regno=$_POST['Regno'];
		
		
		
		/*
		$email="test@test";
		$requesttype="ACC";
		$regno="111111";
		*/
		
		$status="P";
		
		
		require_once 'connect.php';
		
		$sql = "SELECT * FROM userdetails WHERE RegNo='$regno' && Email='$email'";
		$response = mysqli_query($conn,$sql);
		
		
			
			$row = mysqli_fetch_assoc($response);
			
			$id =	$row['UserID'];
			$id=$id+0;
			
		
		$sql1 = "INSERT INTO userrequests (userID,RequestType,Vehicle,Status) VALUES($id,'$requesttype','$regno','$status' )";
		
		
		if( mysqli_query($conn,$sql1))
		{
			$result["success"]="1";
			$result["message"]="success";
			
			
			
		}
		else
		{
			$result["success"]="0";
			$result["message"]="failed";
			
			
		}
		echo json_encode($result);
		mysqli_close($conn);
	
	}
	else{
		$result["success"]="3";
		$result["message"]="failed";

}

?>
