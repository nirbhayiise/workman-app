<?php
    
include('dbcon.php');
 $reqid=$db -> real_escape_string($_REQUEST['reqid']); 
    $uid=$db -> real_escape_string($_REQUEST['uid']); 
 $bank_name=$db -> real_escape_string($_REQUEST['bank_name']); 
  $account_name=$db -> real_escape_string($_REQUEST['account_name']); 
         $account_number=$db -> real_escape_string($_REQUEST['account_number']);
           $amount=$db -> real_escape_string($_REQUEST['amount']);
           
if(!empty($bank_name) && !empty($account_name) && !empty($uid) && !empty($reqid) && !empty($account_number))
{
$sql="INSERT INTO `pay_bank`(`req_id`, `u_id`, `bank_name`,`account_name`, `acoount_number`, `created_date`, `payment_status_bnk`, `amount`)
VALUES 
('$reqid','$uid','$bank_name','$account_name','$account_number',now(),'1','$amount')";

		$result=mysqli_query($db,$sql);
	  $flg=	mysqli_insert_id($db);
		//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if($flg>0)
		{
		    
		    $check1 = mysqli_query($db,"select * from customer where c_email= '".$email."' and c_pass='".$password."' and c_status='1'");    
            $num_count = mysqli_num_rows($check1);
           
        	$rowInfo = mysqli_fetch_array($check1); 
		    
		     $status = "1";
            $msg = "Bank Details Submited successfully.";
            $arr['response']['status']=$status;
            $arr['response']['message']=$msg;
             $arr['response']['usn']='No';
                
                  $qrystr="UPDATE `Enquiry`  SET `complete_task_feedbck_status`=1, payment_dialog_status='1' WHERE `e_id`='$reqid'";
  
                 $qry = mysqli_query($db,$qrystr); 
        
            //  $sql1= "UPDATE Enquiry SET work_status='5',payment_status='1' WHERE e_id='$reqid'";
            //   $result=mysqli_query($db,$sql1);
            //   $check=mysqli_affected_rows($db);
           
            $json = json_encode($arr);
            echo $json;
            //sendMailMessg($c_first_name,$usrname,$c_email);
		
		}
		else
		{
            
            	$status = "0";
			$msg = "Failed !";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;
			$arr['response']['usn']='NO';
		
			
                        $json = json_encode($arr);
		       echo $json;
           
			}
}
else
{
    	$status = "0";
			$msg = "Missing parameters!";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;
			$arr['response']['usn']='NO';
			
                        $json = json_encode($arr);
		       echo $json;
    
}

 function sendMailMessg($applicantName, $useId,$c_email)
{
    $msg = "Dear '$applicantName' , \n you are welcome to 24-7 Workman Platform. Your user name is '$useId' . You will never struggle to fix your cars, equipment, devices, home/office appliances again… 24-7 Workman! … Fix it all";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("$c_email","Welcome Message",$msg);

}
			
    ?>
