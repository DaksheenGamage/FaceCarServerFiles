<?php
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD']=='POST'){
    //$rego="111111";
	$rego=$_POST['rego'];
	require_once 'connect.php';
	
	$sql = "SELECT * FROM modulerelated WHERE VehicleReg='$rego'";
	$response = mysqli_query($conn,$sql);
	$result = array();
	if(mysqli_num_rows($response)===1){
		$row = mysqli_fetch_assoc($response);
		
		$result["module"]=$row["ModuleID"];
		$result['success'] = "1";
		$result['message'] = "success";
		echo json_encode($result);
				
		mysqli_close($conn);
		
			
	}else{
		$result['success'] = "0";
		$result['message'] = "failed";
		echo json_encode($result);
		mysqli_close($conn);
		
	}
}


?>