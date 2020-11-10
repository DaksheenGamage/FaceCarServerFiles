<?php

header('Content-Type: application/json');

	$id=$_POST["userid"];
	$reqid = $_POST["reqid"];
	
	$status = "R";
	


	
	require_once 'connect.php';
	
	$sql = "SELECT Email FROM userdetails WHERE UserID=$id";
	
	$response = mysqli_query($conn,$sql);
		
	$row = mysqli_fetch_assoc($response);
	
	$email = $row['Email'];
	
	$sql1 = "UPDATE userdetails SET userdetails.Password = '$email' WHERE userdetails.UserID=$id";
	$sql2 = "UPDATE userrequests SET userrequests.Status = 'A' WHERE requestID=$reqid";
	$sql3 = "UPDATE userdetails SET userdetails.Status = '$status' WHERE UserID=$id";
	
	
	if( mysqli_query($conn,$sql1) && mysqli_query($conn,$sql3))
	{	
		
		if(mysqli_query($conn,$sql2)){
			$results["success"]	=	"1";
			$results["message"]	=	"success";
		}else{
			$results["success"]="0";
			$results["message"]="failed";
		}
			
		
		
	}else
	{
		$results["success"]="3";
		$results["message"]="failed";
		
		
	}
	echo json_encode($results);
	mysqli_close($conn);

	


?>
