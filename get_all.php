<?php
header('Content-Type: application/json');

//if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$reg=$_POST['regNo'];
	$status="A";
	
	require_once 'connect.php';
	
	$sql = "SELECT * FROM userdetails WHERE RegNo='$reg' AND Status = '$status'";
	
	$result = array();
	$result['details']=array();
	$response = mysqli_query($conn,$sql);
	
	while($row = mysqli_fetch_array($response)){
		
		
		$index['id'] 	= 	$row['UserID'];
		$index['name']	=	$row['FullName'];
		$index['phone']	=	$row['PhoneNumber'];
		$index['email']	=	$row['Email'];
		$index['regno']	=	$row['RegNo'];
		$index['acctype']	=	$row['AccountType'];
		
		array_push($result['details'],$index);
		
	}
	$result["success"]="1";
	$result["message"]="success";
	echo json_encode($result);
	mysql_close($conn);
	
//}


?>