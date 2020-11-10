<?php
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD']=='POST'){
	$email=$_POST['email'];
	$pass = $_POST['password'];
	//$pass=password_hash($pass,PASSWORD_DEFAULT);
	
	require_once 'connect.php';
	
	$sql = "SELECT * FROM userdetails WHERE Email='$email'";
	$response = mysqli_query($conn,$sql);
	$result = array();
	$result['login']=array();
	if(mysqli_num_rows($response)===1){
		$row = mysqli_fetch_assoc($response);
		
		if($pass==$row['Password']){
			
			$index['id']		= 	$row['UserID'];
			$index['username']	= 	$row['UserName'];				
			$index['name']		= 	$row['FullName'];
			$index['email']		=	$row['Email'];
			$index['type']		=	$row['AccountType'];
			$index['reg']		=	$row['RegNo'];
			$index['status']	=	$row['Status'];
			$index['guest']		=	$row['Guest'];
			
			array_push($result['login'],$index);
				
			$result['success'] = "1";
			$result['message'] = "success";
			echo json_encode($result);
				
			mysqli_close($conn);
			
		}
		else{
			$result['success'] = "0";
				$result['message'] = "failed";
				echo json_encode($result);
				mysqli_close($conn);
		}
		
	}else{
		$result['success'] = "0";
				$result['message'] = "failed";
				echo json_encode($result);
				mysqli_close($conn);
		
	}
	
	
	
}


?>