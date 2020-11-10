<?php
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD']=='POST')
{	
	
	$userid=$_POST['userid'];
	$userid=$userid+0;
	$reg=$_POST['reg'];
	$moduleid=$_POST['RID'];
	
	
	require_once 'connect.php';
	
	$sql = "INSERT INTO modulerelated (VehicleReg,ModuleID,OwnerID) VALUES('$reg','$moduleid',$userid)";
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