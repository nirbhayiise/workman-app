<?php
	include 'class.php';

    $flagStatus="";
    $techId=$_POST['techId'];
    $reqId=$_POST['reqId'];
	$user = new User();
	 // $reqData = $user->getJobDetailsForAccpt($reqId);
	$flagStatus = $user->asskignedTechUpdate($reqId,$techId);

	if($flagStatus=='1')
	{
	   
	   echo 'success';
	    sendMailMessg($user,$reqId);
	     
	}
	else
	{
	     echo 'failed';
	      // sendMailMessg($user,$reqId);
	}



function sendMailMessg($user,$reqId)
{
    
    
    
    $reqData = $user->getJobDetailsForAccpt($reqId);
    // print_r($reqData);
    // die;
    $fname=$reqData['c_first_name'];
     $tech_name=$reqData['tech_name'];
      $t_phone=$reqData['t_phone'];
       $security_code=$reqData['security_code'];
           $c_email=$reqData['c_email'];
            $pro_name=$reqData['pro_name'];
               $security_code=$reqData['security_code'];
   // $msg = "Dear '$applicantName' , \n <br> you are welcome to  IG3R Workman 24-7 Platform. <br> <br> Your user name is <b> '$useId' </b>. <br> <br> You will never struggle to fix your cars, equipment, devices, home/office appliances again… <br><br>  IG3R Workman 24-7! … Fix it all";

$msg="Dear $fname,  \n <br> 
Your request to fix your $pro_name has been received and assigned to our Technician/ Engineer. \n <br>
Name: $tech_name \n <br>
GSM: $t_phone.  \n <br>
Job Security Code: $security_code \n <br>
Kindly use the Security Code to Identify him/her. \n <br>
 \n <br>
Thank you for choosing IC3R Workman24-7. \n <br>
 \n <br>
Administrator. \n <br>
+2348131240001 \n <br>
Infor247workman@gmail.com \n <br>

IG3R Workman24-7! … Fix it all \n <br>
";
// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

// send email
//mail($c_email,"Welcome Message",$msg);





        $to =$c_email ;
         $subject = "IG3R Workman24-7 Job Request Message!";
         
      
       
       
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

?>