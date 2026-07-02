<?php
include('dbcon.php');

    $email =$db -> real_escape_string($_REQUEST['mail']);
    $password = $db -> real_escape_string($_REQUEST['password']);
	
	
    $check = mysqli_query($db,"select * from technician where (t_phone= '".$email."' OR username='".$email."') and t_pass='".$password."' and t_status='1'");    
    $num_count = mysqli_num_rows($check);
    if($num_count == 1){
	$rowInfo = mysqli_fetch_array($check); 
	
	$status = "1";
	    $msg = "success";
		$arr['response'][0]['status']=$status;
        	$arr['response'][0]['message']=$msg;  
	$arr['response'][0]['t_id'] 		= $rowInfo['t_id'];
            	$arr['response'][0]['b_id'] 		= $rowInfo['b_id'];
				
				$arr['response'][0]['professional_area'] 			= $rowInfo['professional_area'];
				$arr['response'][0]['tech_name'] 			= $rowInfo['tech_name'];
	
		$arr['response'][0]['last_name'] 			= $rowInfo['last_name'];
				$arr['response'][0]['t_address'] 		= $rowInfo['t_address'];
					$arr['response'][0]['t_phone'] 		= $rowInfo['t_phone'];
					$arr['response'][0]['t_pass'] 		= $rowInfo['t_pass'];
						$arr['response'][0]['t_email'] 		= $rowInfo['t_email'];
							$arr['response'][0]['proImg'] 		= $rowInfo['proImg'];
							
				
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