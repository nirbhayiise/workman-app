<?php
error_reporting(0);
include('dbcon.php');

    $cat_id = $_REQUEST['cat_id'];
    $service_id = $_REQUEST['service_id'];
     $b_id = $_REQUEST['bid'];
      $cid = $_REQUEST['cid'];
    $details = $_REQUEST['details'];
    $six_digit_random_number = mt_rand(10000, 99999);
    // echo $six_digit_random_number;
    // die;
    //$alloted_technician_id = $_REQUEST['alloted_technician_id'];
    $work_status = $_REQUEST['work_status'];
    
    $contact_person_name = $_REQUEST['contact_person_name'];
    $contact_person_mail = $_REQUEST['contact_person_mail'];
    $contact_person_mob = $_REQUEST['contact_person_mob'];
    
     $photo1 = $_REQUEST['photo1'];
      $photo2 = $_REQUEST['photo2'];
      
     
    
    if(!empty($cat_id) && !empty($service_id) && !empty($details))
    {
       $qry="INSERT INTO `Enquiry`(`cat_id`, `service_id`, `c_id`,`b_id`, `details`, `alloted_technician_id`, `work_status`, `e_created`, `e_status`, `contact_person_name`, `contact_person_mail`, `contact_person_mob`,`payment_status`, security_code, photo1, photo2,payment_dialog_status) 
    VALUES ('$cat_id','$service_id','$cid','$b_id','$details','0','$work_status',now(),'1','$contact_person_name','$contact_person_mail','$contact_person_mob','0', '$six_digit_random_number','$photo1','$photo2','1')";
  
    $check = mysqli_query($db,$qry);    
   
    if($check == 1){
	$rowInfo = mysqli_fetch_array($check); 
	
	$status = "1";
	    $msg = "Enquiry successfully submited";
		$arr['response'][0]['status']=$status;
        	$arr['response'][0]['message']=$msg;  

			
				
	$json = json_encode($arr);
		echo $json;
		
	}else{
        $status = "0";
     	$msg = "Enquiry not submit. Try again ";
     	$arr['response'][0]['status']=$status;
     	$arr['response'][0]['message']=$msg;
     	
         
     	$json = json_encode($arr);
     	echo $json;
	}
    }
	else
	{
	    $status = "0";
     	$msg = "Param. Missing";
     	$arr['response'][0]['status']=$status;
     	$arr['response'][0]['message']=$msg;
     	
         
     	$json = json_encode($arr);
     	echo $json;
	
    }
    

?>