<?php
header('Content-Type: application/json');

//require_once 'connect.php';
/*
$sql = "INSERT INTO userdetails (FullName,UserName,Password,VehicleRegNo,PhoneNumber,Email,AccountType) VALUES('BBB','BBB','BBB','BBB','BBB','BBB','B')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
*/
if($_SERVER['REQUEST_METHOD']=='POST')
{
	
	$username=$_POST['username'];
	$pass=$_POST['password'];
	$fullname=$_POST['fullname'];
	$rego=$_POST['RegistrationNumber'];
	$phonenumber=$_POST['phonenumber'];
	$email=$_POST['email'];
	$accounttype="O";
	$status="A";
	$guest="0";
	//$pass=password_hash($pass,PASSWORD_DEFAULT);
	
	require_once 'connect.php';
	
	$sql="SELECT * FROM userdetails WHERE RegNo = '$rego' AND AccountType = '$accounttype'";
	$response = mysqli_query($conn,$sql);
	if(mysqli_num_rows($response)===0){
		$sql = "INSERT INTO userdetails (FullName,UserName,Password,RegNo,PhoneNumber,Email,AccountType,Status,Guest) VALUES('$fullname','$username','$pass','$rego','$phonenumber','$email','$accounttype','$status','$guest')";
		//echo mysqli_query($conn,$sql);
		if( mysqli_query($conn,$sql))
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
	}
	else{
		$result["success"]="3";
		$result["message"]="failed";
		echo json_encode($result);
		mysqli_close($conn);
	}
	
	
}

?>