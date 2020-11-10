<?php
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD']=='POST')
{	/*
	$userid="20";
	$userid=$userid+0;
	$requesttype="DEL";
	$regno="111111";
	*/
	
	$requestid=$_POST['id'];
	$requestid=$requestid+0;
	
	
	require_once 'connect.php';
	
	$sql = "UPDATE userrequests SET Status = 'D' WHERE requestID='$requestid'";
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