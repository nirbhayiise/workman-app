<?php
    
include('dbcon.php');
  $mailId="";
   $usnam="";
   $name="";
   $mobile=$getRow['c_phone'];
   $c_first_name=$db -> real_escape_string($_REQUEST['c_first_name']); 
      $c_last_name=$db -> real_escape_string($_REQUEST['c_last_name']); 
         $c_phone=$db -> real_escape_string($_REQUEST['c_phone']); 
            $c_address=$db -> real_escape_string($_REQUEST['c_address']); 
               $c_email=$db -> real_escape_string($_REQUEST['c_email']); 
                  $c_pass=$db -> real_escape_string($_REQUEST['c_pass']); 
                  $NGstate = $db -> real_escape_string($_REQUEST['NGstate']);
                   $NGcity = $db -> real_escape_string($_REQUEST['NGcity']);
                  $usrname=$c_first_name.mt_rand(100, 999);
                
if(!empty($c_first_name) && !empty($c_last_name) && !empty($c_phone) && !empty($c_address) && !empty($c_email) && !empty($c_pass) && !empty($NGstate) && !empty($NGcity))
{
    
     if(checkEmail($db,$c_email)>0)
    {
        	$status = "0";
			$msg = "Email Id Already Exist!";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;
			  $arr['response']['usn']='EMPTY';
			
                        $json = json_encode($arr);
		       echo $json;
		       die;
    }
    
     if(checkMobile($db,$c_phone)>0)
    {
        	$status = "0";
			$msg = "Mobile No Already Exist!";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;
			  $arr['response']['usn']='EMPTY';
			
                        $json = json_encode($arr);
		       echo $json;
		       die;
    }
    
    
$sql="INSERT INTO `customer`(`c_first_name`, `c_last_name`, `c_phone`, `c_address`, `c_email`, `c_pass`, `c_created`, `c_status` , `username`, `NGstate`, `NGcity`)
VALUES 
('$c_first_name','$c_last_name','$c_phone','$c_address','$c_email','$c_pass',now(),'1','$usrname', '$NGstate', '$NGcity')";

		$result=mysqli_query($db,$sql);
		$lastId=mysqli_insert_id($db);
		//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if($lastId>0)
		{
		    
		    $sql= "select * from customer where c_email= '".$email."' and c_pass='".$password."' and c_status='1'";
		    $check1 = mysqli_query($db,$sql);    
            $num_count = mysqli_num_rows($check1);
           
        	$rowInfo = mysqli_fetch_array($check1); 
		    
		     $status = "1";
            $msg = "User created  Successfully.";
            $arr['response']['status']=$status;
            $arr['response']['message']=$msg;
             $arr['response']['usn']=$usrname;
           
           
           
            $json = json_encode($arr);
            echo $json;
              fetchRegisterLatestUser($db,$lastId);
           
            // sendMailMessg($c_first_name,$usrname,$c_email);
		
		}
		else
		{
            
            	$status = "0";
			$msg = "Failed to create user!";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;
			  $arr['response']['usn']='EMPTY';
			
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
			
                        $json = json_encode($arr);
		       echo $json;
    
}




function checkEmail($db,$email)
{
$sql3 = "SELECT c_id FROM customer WHERE c_email ='$email'";
$check3 = mysqli_query($db,$sql3);
$row_city = mysqli_num_rows($check3);
$rowInfo3 = mysqli_fetch_array($check3);
$STATE_ID = $rowInfo3['c_id']; 

return $STATE_ID;	
}

function checkMobile($db,$mob)
{
$sql3 = "SELECT c_id FROM customer WHERE c_phone ='$mob'";
$check3 = mysqli_query($db,$sql3);
$row_city = mysqli_num_rows($check3);
$rowInfo3 = mysqli_fetch_array($check3);
$STATE_ID = $rowInfo3['c_id']; 

return $STATE_ID;	
}

function sendMailMessg11($applicantName, $useId,$c_email)
{
   
         
         
        $msg = "Dear '".$applicantName."' , \n <br><br> You are welcome to  IG3R Workman 24-7 Platform. <br> Your user name is <b> '".$useId."' </b>. <br> You will never struggle to fix your cars, equipment, devices, home/office appliances again… <br> <br> <br>  IG3R Workman 24-7! …  Fix it all ";

        $to = $c_email ;
        $subject = "IG3R Workman24-7 Registration!";
        $from = 'no-reply@workman247.com';
         
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         
        $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
         
        $message = "<b>Welcome!.</b><br>";
        $message .=$msg; //"<h1>247workman .</h1>";
         
        $retval = mail($to,$subject,$message,$headers);
         
         if( $retval == true ) {
          // echo "Message sent successfully...";
         }else {
          // echo "Message could not be sent...";
         }
         
         
         


}


function fetchRegisterLatestUser($db,$id)
{
    $qry = "select * from customer where c_id= '$id'";
    $rs = mysqli_query($db,$qry);
    $getRow = mysqli_fetch_assoc($rs);
     
   $mailId=$getRow['c_email'];
   $usnam=$getRow['username'];
   $name=$getRow['c_first_name'];
   $mobile=$getRow['c_phone'];
       sendMailMessg11($name, $usnam,$mailId);
  //print_r($getRow);
   //mailSubmtSignup($name,$mailId,$usnam,$mobile);
 
}
 function sendMailMessg($applicantName, $useId,$mail)
{
    $msg = "Dear '$applicantName' , \n you are welcome to 24-7 Workman Platform. Your user name is '$useId' . You will never struggle to fix your cars, equipment, devices, home/office appliances again… 24-7 Workman! … Fix it all";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("$mail","Welcome Message",$msg);

}			
    ?>
