<?php
include('dbcon.php');


    $email = $_REQUEST['mail'];
    
	


    $check = mysqli_query($db,"select * from customer where c_email= '".$email."' and c_status=1");    
    $num_count = mysqli_num_rows($check);
    if($num_count == 1){
	$rowInfo = mysqli_fetch_array($check); 
	
	$status = "1";
	    $msg = "success";
		$arr['response'][0]['status']=$status;
        	$arr['response'][0]['message']=$msg;  

				$arr['response'][0]['c_pass'] 		= $rowInfo['c_pass'];
				$pas=$rowInfo['c_pass'];
				$mail=$rowInfo['c_email'];
				$c_first_name=$rowInfo['c_first_name'];
					$mail=$rowInfo['c_email'];
				sendMailMessg11($c_first_name,$pas,$mail);
	$json = json_encode($arr);
		echo $json;
		
	}else{
    $status = "0";
     	$msg = "Email not varified. Please check your email ";
     	$arr['response'][0]['status']=$status;
     	$arr['response'][0]['message']=$msg;
     	$arr['response'][0]['password'] 		="0";
         
     	$json = json_encode($arr);
     	echo $json;
	}
	
	
	
	function sendMailMessg11($applicantName, $pas,$c_email)
{
    $msg = "Dear '$applicantName' , \n <br><br> You are welcome to  IG3R Workman 24-7 Platform. <br> Your password is <b> '$pas' </b>. <br> ";

// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

// send email
//mail($c_email,"Welcome Message",$msg);





        $to =$c_email ;
         $subject = "IG3R Workman24-7 Forgot Password!";
         
         $message = "<b>Welcome!.</b>";
         $message .=$msg; //"<h1>247workman .</h1>";
         
         $header = "From:no-reply@workman247.com \r\n";
      
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
           // echo "Message sent successfully...";
         }else {
            //echo "Message could not be sent...";
         }

}

?>