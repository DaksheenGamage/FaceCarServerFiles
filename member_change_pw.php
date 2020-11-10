<?php
header('Content-Type: application/json');
	
	$id=$_POST['id'];
	$id=$id+0;
	
	$oldpass=$_POST['oldpw'];
	$newpass=$_POST['newpw'];

	
	require_once 'connect.php';
	
	$sql = "SELECT * FROM userdetails WHERE UserID=$id";
	
	$response = mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($response)===1){
		
		$row = mysqli_fetch_assoc($response);
	
		$pass = $row['Password'];
		
		if ($pass==$oldpass){
			
			$sql = "UPDATE userdetails SET Password = '$newpass' WHERE UserID=$id";
			if( mysqli_query($conn,$sql)){
				
				$result["success"]	=	"1";
				$result["message"]	=	"success";
				
				echo json_encode($result);
				mysqli_close($conn);
			
			
			}
			else{
				$result["success"]="0";
				$result["message"]="failed";
				
				echo json_encode($result);
				mysqli_close($conn);
			}

			
			
		}else{
			$result["success"]="3";
			$result["message"]="failed";
		}
	}else{
		$result["success"]="0";
		$result["message"]="failed";
	}
?>