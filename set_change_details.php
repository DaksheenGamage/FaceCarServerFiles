<?php
header('Content-Type: application/json');

//if($_SERVER['REQUEST_METHOD']=='GET'){
	
	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	
	require_once 'connect.php';
	
	$sql = "UPDATE userdetails SET FullName = '$name' , Email='$email',PhoneNumber='$phone' WHERE UserID='$id'";
	if( mysqli_query($conn,$sql))
	{
		$result["success"]	=	"1";
		$result["message"]	=	"success";
		
		
		
		echo json_encode($result);
		mysqli_close($conn);
		
		
	}
	else
	{
		$result["success"]="0";
		$result["message"]="failed";
		
		echo json_encode($result);
		mysqli_close($conn);
	}

	
//}


?>