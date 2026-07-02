<?php

  sendMailMessg11("sk","hi","nirbhayiise@gmail.com");
function sendMailMessg11($applicantName, $useId,$c_email)
{
    $msg = "Dear '".$applicantName."' , \n <br><br> You are welcome to  IG3R Workman 24-7 Platform. <br> Your user name is <b> '".$useId."' </b>. <br> You will never struggle to fix your cars, equipment, devices, home/office appliances again… <br> <br> <br>  IG3R Workman 24-7! …  Fix it all ";

// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

// send email
//mail($c_email,"Welcome Message",$msg);





         $to =$c_email ;
         $subject = "IG3R Workman24-7 Registration!";
         
         $message = "<b>Welcome!.</b><br>";
       //  $message .=$msg; //"<h1>247workman .</h1>";
         
         $header = "From:no-reply@workman247.com \r\n";
      
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($c_email,$subject,"Hiiii",$header);
         
         if( $retval == true ) {
              echo 'success';
           // echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
         
         
         


}
?>