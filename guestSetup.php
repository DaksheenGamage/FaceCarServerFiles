<?php
header('Content-Type: application/json');

//if($_SERVER['REQUEST_METHOD']=='GET'){
	
	$reg=$_POST['regNo'];
	$accType="O";
	$status=$_POST['status'];

	//$reg="111111";
	//$status="0";
	
	require_once 'connect.php';
	
	$sql = "UPDATE userdetails SET Guest = '$status' WHERE RegNo='$reg' AND AccountType='$accType'";
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