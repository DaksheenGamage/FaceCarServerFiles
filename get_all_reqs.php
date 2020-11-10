<?php
header('Content-Type: application/json');

//if($_SERVER['REQUEST_METHOD']=='GET'){
	
	$reg=$_POST['regNo'];
	
	require_once 'connect.php';
	
	$sql = "SELECT userdetails.FullName,userdetails.UserID,userrequests.requestID,userrequests.RequestType,userrequests.Status,userrequests.Vehicle,userdetails.PhoneNumber FROM userrequests INNER JOIN userdetails on userrequests.userID=userdetails.UserID
WHERE userrequests.Vehicle='$reg'&& userrequests.Status='P'";
	
	$result = array();
	$result['details']=array();
	$response = mysqli_query($conn,$sql);
	
	while($row = mysqli_fetch_array($response)){
		
		$index['name'] 		= 	$row['FullName'];
		$index['reqType'] 	= 	$row['RequestType'];
		
		$index['userid'] 	= 	$row['UserID'];
		$index['reqid'] 	= 	$row['requestID'];
		$index['status']	=	$row['Status'];
		$index['regno']		=	$row['Vehicle'];
		$index['number']	=	$row['PhoneNumber'];
		
		array_push($result['details'],$index);
		
	}
	$result["success"]="1";
	$result["message"]="success";
	echo json_encode($result);
	mysql_close($conn);
	
//}


?>