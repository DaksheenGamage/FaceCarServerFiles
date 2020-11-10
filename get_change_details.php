<?php
header('Content-Type: application/json');

//if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$id=$_POST['id'];
	
	require_once 'connect.php';
	
	$sql = "SELECT * FROM userdetails WHERE UserID='$id'";
	
	$result = array();
	$result['details']=array();
	$response = mysqli_query($conn,$sql);
	
	while($row = mysqli_fetch_array($response)){
		$index['name']	=	$row['FullName'];
		$index['phone']	=	$row['PhoneNumber'];
		$index['email']	=	$row['Email'];
		
		array_push($result['details'],$index);
		
	}
	$result["success"]="1";
	$result["message"]="success";
	echo json_encode($result);
	mysql_close($conn);
	
//}


?>