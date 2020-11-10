<?php
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD']=='POST')
{	/*
	$userid="20";
	$userid=$userid+0;
	$requesttype="DEL";
	$regno="111111";
	*/
	
	$userid=$_POST['userid'];
	$userid=$userid+0;
	$requesttype=$_POST['requestType'];
	$regno=$_POST['Regno'];
	
	$status="P";
	
	
	require_once 'connect.php';
	
	$sql = "INSERT INTO userrequests (userID,RequestType,Vehicle,Status) VALUES($userid,'$requesttype','$regno','$status' )";
	//echo mysqli_query($conn,$sql);
	if( mysqli_query($conn,$sql))
	{
		$result["success"]="1";
		$result["message"]="success";
		
		
		
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
}

?>