<?php
include('dbcon.php');

    $email =$db -> real_escape_string($_REQUEST['mail']);
    $password = $db -> real_escape_string($_REQUEST['password']);
	
	
    $check = mysqli_query($db,"select * from customer where (username= '".$email."' OR c_phone='".$email."') and c_pass='".$password."' and c_status='1'");    
   
    $num_count = mysqli_num_rows($check);
    if($num_count == 1){
	$rowInfo = mysqli_fetch_array($check); 
	
	$status = "1";
	    $msg = "success";
		$arr['response'][0]['status']=$status;
        	$arr['response'][0]['message']=$msg;  
	$arr['response'][0]['c_id'] 		= $rowInfo['c_id'];
            	$arr['response'][0]['c_first_name'] 		= $rowInfo['c_first_name'];
				
				$arr['response'][0]['c_last_name'] 			= $rowInfo['c_last_name'];
				$arr['response'][0]['c_phone'] 			= $rowInfo['c_phone'];
	
		$arr['response'][0]['c_address'] 			= $rowInfo['c_address'];
				$arr['response'][0]['c_email'] 		= $rowInfo['c_email'];
					$arr['response'][0]['c_pass'] 		= $rowInfo['c_pass'];
						$arr['response'][0]['c_created'] 		= $rowInfo['c_created'];
				
	$json = json_encode($arr);
		echo $json;
		
	}else{
    $status = "0";
     	$msg = "Email not varified. Please check your email ";
     	$arr['response'][0]['status']=$status;
     	$arr['response'][0]['message']=$msg;
        $arr['response'][0]['data'] = array();
         
     	$json = json_encode($arr);
     	echo $json;
	}

?>