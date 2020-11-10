<?php
header('Content-Type: application/json');

//if($_SERVER['REQUEST_METHOD']=='GET'){
	
	$id=$_POST['id'];
	$id=$id+0;
	
	$pass=$_POST['password'];
	$status = "A";

	
	require_once 'connect.php';
	
	$sql = "UPDATE userdetails SET Password = '$pass' WHERE UserID=$id ";
	$sql1 = "UPDATE userdetails SET Status = '$status' WHERE UserID=$id ";
	if( mysqli_query($conn,$sql) && mysqli_query($conn,$sql1) )
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