<?php
header('Content-Type: application/json');

//if($_SERVER['REQUEST_METHOD']=='GET'){
	
	$reg=$_POST['reg'];
	//$reg="111111";
	
	require_once 'connect.php';
	
	$sql="DELETE FROM modulerelated WHERE VehicleReg= '$reg'";
	
	
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