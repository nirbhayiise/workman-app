<?php
include('dbcon.php');
  $reqId=$_POST['reqId'];
  


sendMailMessg($db,$reqId);
function sendMailMessg($db,$reqId)
{
    
    
      $qry="SELECT a.*,b.*,d.*,e.*, f.* FROM Enquiry a, professional_area b, services d, customer e, technician f
		                  WHERE a.cat_id=b.pro_id and a.service_id=d.s_id and a.c_id=e.c_id and a.e_status=1 and a.alloted_technician_id=f.t_id and a.e_id=$reqId";
		                 
                $rs = mysqli_query($db,$qry);
                $reqData = mysqli_fetch_assoc($rs);
              // print_r($reqData);
    $fname=$reqData['c_first_name'];
     $tech_name=$reqData['tech_name'];
      $t_phone=$reqData['t_phone'];
       $security_code=$reqData['security_code'];
           $c_email=$reqData['c_email'];
            $pro_name=$reqData['pro_name'];
               $security_code=$reqData['security_code'];
   // $msg = "Dear '$applicantName' , \n <br> you are welcome to  IG3R Workman 24-7 Platform. <br> <br> Your user name is <b> '$useId' </b>. <br> <br> You will never struggle to fix your cars, equipment, devices, home/office appliances again… <br><br>  IG3R Workman 24-7! … Fix it all";

$msg="Dear $fname, 
Your request to fix your $pro_name have been closed out by our Technician/Engineer. 

Kindly confirm by submitting our customer satisfactory Feedback in less than a minute from our mobile App.

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
         $subject = "IG3R Workman24-7 Job Close out message!";
         
         $message = "<b>Welcome!.</b>";
         $message .=$msg; //"<h1>247workman .</h1>";
         
         $header = "From:no-reply@theconsulateng.org \r\n";
      
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
              echo '{"status":"success"}';
           // echo "Message sent successfully...";
         }else {
                echo '{"status":"failed"}';
            //echo "Message could not be sent...";
         }

}

?>