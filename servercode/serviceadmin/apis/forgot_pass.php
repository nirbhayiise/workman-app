<?php
    
include('dbcon.php');
   $c_first_name=$db -> real_escape_string($_REQUEST['c_first_name']); 
      $c_last_name=$db -> real_escape_string($_REQUEST['c_last_name']); 
         $c_phone=$db -> real_escape_string($_REQUEST['c_phone']); 
            $c_address=$db -> real_escape_string($_REQUEST['c_address']); 
               $c_email=$db -> real_escape_string($_REQUEST['c_email']); 
                  $c_pass=$db -> real_escape_string($_REQUEST['c_pass']); 
                  $usrname=$c_first_name.mt_rand(100, 999);
if(!empty($c_first_name) && !empty($c_last_name) && !empty($c_phone) && !empty($c_address) && !empty($c_email) && !empty($c_pass))
{
$sql="INSERT INTO `customer`(`c_first_name`, `c_last_name`, `c_phone`, `c_address`, `c_email`, `c_pass`, `c_created`, `c_status` , `username`)
VALUES 
('$c_first_name','$c_last_name','$c_phone','$c_address','$c_email','$c_pass',now(),'1','$usrname')";

		$result=mysqli_query($db,$sql);
		$lastId=mysqli_insert_id($db);
		//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if($lastId>0)
		{
		    
		    $check1 = mysqli_query($db,"select * from customer where c_email= '".$email."' and c_pass='".$password."' and c_status='1'");    
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




function sendMailMessg11($applicantName, $useId,$c_email)
{
    $msg = "Dear '$applicantName' , \n <br><br> You are welcome to  IG3R Workman 24-7 Platform. <br> Your user name is <b> '$useId' </b>. <br> You will never struggle to fix your cars, equipment, devices, home/office appliances again… <br> <br> <br>  IG3R Workman 24-7! …  Fix it all ";

// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

// send email
//mail($c_email,"Welcome Message",$msg);





        $to =$c_email ;
         $subject = "IG3R Workman24-7 Registration!";
         
         $message = "<b>Welcome!.</b>";
         $message .=$msg; //"<h1>247workman .</h1>";
         
         $header = "From:no-reply@workman247.com/ \r\n";
      
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
           // echo "Message sent successfully...";
         }else {
            //echo "Message could not be sent...";
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
   
   
   //mailSubmtSignup($name,$mailId,$usnam,$mobile);
   sendMailMessg11($name, $usnam,$mailId);
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
