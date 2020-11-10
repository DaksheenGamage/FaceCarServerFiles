<?php
header('Content-Type: application/json');

//if($_SERVER['REQUEST_METHOD']=='GET'){
	
	$id=$_POST['id'];
	$id=$id+0;
	$acctype=$_POST['acctype'];
	
	$reg=$_POST['reg'];
	
	require_once 'connect.php';
	if ($acctype=="O"){
		$sql="DELETE FROM userdetails WHERE RegNo= '$reg'";
	}
	else{
		$sql = "DELETE FROM userdetails WHERE UserID = $id";
	}
	
	
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