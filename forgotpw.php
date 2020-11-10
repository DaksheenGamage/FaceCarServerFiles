<?php
header('Content-Type: application/json');

	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
		

	
	$reg=$_POST['reg'];
	$email=$_POST['email'];
	$requesttype = "RESPW";
	$status="P";
	
	require_once 'connect.php';
	
	$sql = "SELECT * FROM userdetails WHERE RegNo='$reg'&& Email='$email'";
	
		
	$response = mysqli_query($conn,$sql);
		
	if(mysqli_num_rows($response)===1){
		$row = mysqli_fetch_assoc($response);
		$type=$row['AccountType'];
		$id =	$row['UserID'];
		$id=$id+0;
		$temp_pass=generateRandomString();
			
		if($type=="O"){
			
			$sql = "UPDATE userdetails SET Password = '$temp_pass' , Status='R' WHERE UserID='$id'";
			if( mysqli_query($conn,$sql))
			{
				$result["success"]	=	"1";
				$result["message"]	=	"success_owner";
				
				$emailTo=$row['Email'];
				
				$fullName=$row['FullName'];
				
				$subject="FACECAR password has been reset ";
				$headers='From: FaceCar Team <facecar2.0@gmail.com>';
				
				$content="Hi $fullName\n\nYour Password has been reset successfully. please enter the following password to login and reset your password\n \n\n your temperory password : $temp_pass";
				
			
				if(mail($emailTo,$subject,$content,$headers)){
				  //echo "Your message was sent, we will get back to you ASAP!";
				}else{
				  //echo  "Your message couldn't be sent, please try again later";
				}
				
				
				
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
			$requesttype = "RESPW";
			$status="P";
			
			require_once 'connect.php';
			
			
					
			
			$sql1 = "INSERT INTO userrequests (userID,RequestType,Vehicle,Status) VALUES($id,'$requesttype','$reg','$status' )";
				
				
				if( mysqli_query($conn,$sql1))
				{
					$result["success"]="1";
					$result["message"]="success_member";
					
					
					
					
				}
				else
				{
					$result["success"]="0";
					$result["message"]="failed";
					
					
				}
				echo json_encode($result);
				mysqli_close($conn);
	
	
		}
		
	}else{
		$result['success'] = "0";
				$result['message'] = "failed";
				echo json_encode($result);
				mysqli_close($conn);
		
	}
	
	


?>






			
			
			
	