<?php
    
include('dbcon.php');
 $bid=$db -> real_escape_string($_REQUEST['bid']); 
  $pid=$db -> real_escape_string($_REQUEST['pid']); 

   $c_first_name=$db -> real_escape_string($_REQUEST['c_first_name']); 
      $c_last_name=$db -> real_escape_string($_REQUEST['c_last_name']); 
         $c_phone=$db -> real_escape_string($_REQUEST['c_phone']); 
            $c_address=$db -> real_escape_string($_REQUEST['c_address']); 
               $c_email=$db -> real_escape_string($_REQUEST['c_email']); 
                  $c_pass=$db -> real_escape_string($_REQUEST['c_pass']);
                    $proImg=$db -> real_escape_string($_REQUEST['proImg']);
                  $usrname=$c_first_name.mt_rand(100, 999);
if(!empty($c_first_name) && !empty($c_last_name) && !empty($c_phone) && !empty($c_address) && !empty($c_email) && !empty($c_pass))
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
    
$sql="INSERT INTO `technician`(`b_id`, `professional_area`, `tech_name`,`last_name`, `t_address`, `t_phone`, `t_email`, `t_pass`, `t_created` ,`t_status` , `username`, proImg)
VALUES 
('$bid','$pid','$c_first_name','$c_last_name',' $c_address','$c_phone','$c_email','$c_pass',now(),'1','$usrname', '$proImg')";

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

 function sendMailMessg($applicantName, $useId,$c_email)
{
    $msg = "Dear '$applicantName' , \n <br> you are welcome to  IG3R Workman 24-7 Platform. <br> <br> Your user name is <b> '$useId' </b>. <br> <br> You will never struggle to fix your cars, equipment, devices, home/office appliances again… <br><br>  IG3R Workman 24-7! … Fix it all";

// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

// send email
//mail($c_email,"Welcome Message",$msg);





       $to =$c_email ;
         $subject = "IG3R Workman24-7 Registration!";
         
         $message = "<b>Welcome!.</b><br>";
         $message .=$msg; //"<h1>247workman .</h1>";
         
         $header = "From:no-reply@workman247.com \r\n";
      
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            //  echo 'success';
           // echo "Message sent successfully...";
         }else {
            //echo "Message could not be sent...";
         }

}


function checkEmail($db,$email)
{
$sql3 = "SELECT t_id FROM technician WHERE t_email ='$email'";
$check3 = mysqli_query($db,$sql3);
$row_city = mysqli_num_rows($check3);
$rowInfo3 = mysqli_fetch_array($check3);
$STATE_ID = $rowInfo3['t_id']; 

return $STATE_ID;	
}

function checkMobile($db,$mob)
{
$sql3 = "SELECT t_id FROM technician WHERE t_phone ='$mob'";
$check3 = mysqli_query($db,$sql3);
$row_city = mysqli_num_rows($check3);
$rowInfo3 = mysqli_fetch_array($check3);
$STATE_ID = $rowInfo3['t_id']; 

return $STATE_ID;	
}

function mailSubmtSignup($name,$mailId,$usnam,$mobile)
{
//($name,$mailId,$usnam,$mobile);
    
      $name =$name; //$_POST['name'];
      $emailid = $mailId;//$_POST['email'];
      $phoneno = $mobile;//$_POST['phone'];
      $usernam =$usnam; //$_POST['query'];
          //sending mail

               $to =$mailId; //'nirbhayiise@gmail.com';
               $subject = 'Register';
               $from = 'noreply@247workman.com';

              // To send HTML mail, the Content-type header must be set

              $headers  = 'MIME-Version: 1.0' . "\r\n";
              $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

             // Create email headers

             $headers .= 'From: '.$from."\r\n".
             'Reply-To: '.$from."\r\n" .
             'X-Mailer: PHP/' . phpversion();

             // Compose a simple HTML email message

          // Compose a simple HTML email message

          $message = '<center><table cellspadding="0" cellspacing="0" style="width:90%;">';
             
             $message .= '<tr>';
                 $message .= '<td colspan="2" style="background: #00000014;padding: 0.5%;border-top: 5px solid #e84c3d;border-radius: 9px 9px 0px 0px;border-left: 1px solid #f96a23;border-right: 1px solid #f96a23;"><center><img src="" style="height:80px;width: 293px;"></center></td>';
             $message .= '</tr>';

             $message .= '<tr>';
                 $message .= '<td colspan="2" style="font-size: 36px; padding: 1%;background: #ff0000;color: #ffffff;font-weight: bold;font-family: sans-serif;"><center>Successfull Register!</center></td>';
             $message .= '</tr>';

             $message .= '<tr>';
                 $message .= '<td style="width: 150px;color: #404b79;font-weight: bold;font-family: sans-serif;background: #f0bb2652;padding: 1%;border-top: 1px solid #f96a23;border-left: 1px solid #f96a23;border-bottom: 1px solid #f96a23;border-right: 1px solid #f96a23;">Name</td>';
              
               $message .= '<td style="width: 150px;color: #404b79;font-family: sans-serif;background: #f0bb2652;padding: 1%;border-top: 1px solid #f96a23;border-left: 1px solid #f96a23;border-bottom: 1px solid #f96a23;border-right: 1px solid #f96a23;">';
               $message .= $name;
               $message .= '</td>';
             $message .= '</tr>';
            
             $message .= '<tr>';
                 $message .= '<td style="width: 150px;color: #404b79;font-weight: bold;font-family: sans-serif;background: #f0bb2652;padding: 1%;border-top: 1px solid #f96a23;border-left: 1px solid #f96a23;border-bottom: 1px solid #f96a23;border-right: 1px solid #f96a23;">UserName</td>';
               $message .= '<td style="width: 150px;color: #404b79;font-family: sans-serif;background: #f0bb2652;padding: 1%;border-top: 1px solid #f96a23;border-left: 1px solid #f96a23;border-bottom: 1px solid #f96a23;border-right: 1px solid #f96a23;">';
               $message .= $usernam;
               $message .= '</td>';
             $message .= '</tr>';
            
             $message .= '<tr>';
                 $message .= '<td style="width: 150px;color: #404b79;font-weight: bold;font-family: sans-serif;background: #f0bb2652;padding: 1%;border-top: 1px solid #f96a23;border-left: 1px solid #f96a23;border-bottom: 1px solid #f96a23;border-right: 1px solid #f96a23;">Email Id</td>';
               $message .= '<td style="width: 150px;color: #404b79;font-family: sans-serif;background: #f0bb2652;padding: 1%;border-top: 1px solid #f96a23;border-left: 1px solid #f96a23;border-bottom: 1px solid #f96a23;border-right: 1px solid #f96a23;">';
               $message .= $emailid;
               $message .= '</td>';
             $message .= '</tr>';
             
             $message .= '<tr>';
                 $message .= '<td style="width: 150px;color: #404b79;font-weight: bold;font-family: sans-serif;background: #f0bb2652;padding: 1%;border-top: 1px solid #f96a23;border-left: 1px solid #f96a23;border-bottom: 1px solid #f96a23;border-right: 1px solid #f96a23;">Mobile</td>';
               $message .= '<td style="width: 150px;color: #404b79;font-family: sans-serif;background: #f0bb2652;padding: 1%;border-top: 1px solid #f96a23;border-left: 1px solid #f96a23;border-bottom: 1px solid #f96a23;border-right: 1px solid #f96a23;">';
               $message .= $phoneno;
               $message .= '</td>';
             $message .= '</tr>';
            
             $message .= '<tr>';
                 $message .= '<td colspan="2" style="background: #404b79;color: #ffffff;padding: 0.5%;"><center>Copyright © 2021 247workman</center></td>';
             $message .= '</tr>';
          $message .= '</table></center>';
                    
         mail($to, $subject, $message, $headers);


         
              

          
}

function fetchRegisterLatestUser($db,$id)
{
    $qry = "select * from technician where t_id= '$id'";
    $rs = mysqli_query($db,$qry);
    $getRow = mysqli_fetch_assoc($rs);
     
   $mailId=$getRow['t_email'];
   $usnam=$getRow['username'];
   $name=$getRow['tech_name'];
   $mobile=$getRow['t_phone'];
   
   
   //mailSubmtSignup($name,$mailId,$usnam,$mobile);
   sendMailMessg($name, $usnam,$mailId);
}
			
    ?>
