<?php
header('Content-Type: application/json');

//if($_SERVER['REQUEST_METHOD']=='GET'){
	
	$userid=$_POST['userid'];
	$reqid=$_POST['reqid'];
	$userid=$userid+0;
	$reqid=$reqid+0;
	
	$status=$_POST['userstatus'];
	$statusReq=$_POST['reqstatus'];
	
	require_once 'connect.php';
	
	$sql = "UPDATE userdetails SET Status = '$status' WHERE UserID='$userid'";
	$sql1 = "UPDATE userrequests SET userrequests.Status = '$statusReq' WHERE userrequests.requestID='$reqid'";
	if( mysqli_query($conn,$sql)&& mysqli_query($conn,$sql1))
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