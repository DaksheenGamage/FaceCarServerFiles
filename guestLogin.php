<?php
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD']=='POST'){
	$reg=$_POST['reg'];
	//$reg="111111";
	$accType="O";
	//$pass=password_hash($pass,PASSWORD_DEFAULT);
	
	require_once 'connect.php';
	
	$sql = "SELECT Guest FROM userdetails WHERE RegNo='$reg' and AccountType='$accType'";
	$response = mysqli_query($conn,$sql);
	$result = array();
	if(mysqli_num_rows($response)===1){
		$row = mysqli_fetch_assoc($response);
		
		if($row['Guest']=="1"){
			
				
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