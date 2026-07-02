<?php
    
include('dbcon.php');
  $e_id = $db -> real_escape_string($_REQUEST['e_id']);
    $c_id = $db -> real_escape_string($_REQUEST['c_id']);
      $t_id = $db -> real_escape_string($_REQUEST['t_id']);
    $i=0;
    $j=0;
    $arr=array();
//$sql="SELECT b.*,a.notification_messages AS message , a.notification_message_read_status As readStatus FROM notifications a , scan_logs b , students c , parents d WHERE b.log_id=a.scan_log_id and b.student_id=c.student_id and b.parents_id=d.parents_id and b.student_id='$sid' and d.parents_id='$did' and DATE(a.notification_created_date)=CURDATE()";
$sql="SELECT a.*,b.*,c.*,d.* FROM  Enquiry a, customer b, technician c, fault_analysis d  
WHERE d.e_id=a.e_id and d.c_id=b.c_id and d.t_id=c.t_id  and d.e_id='$e_id' and d.c_id='$c_id' and d.t_id='$t_id' and d.f_status='1' ORDER BY d.f_id DESC";

		$result=mysqli_query($db,$sql);
		//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if(mysqli_num_rows($result) == 0)
		{
			$status = "0";
			$msg = "No data Exist";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;
			
                        $json = json_encode($arr);
		       echo $json;
		}
		else
		{
            
            $status = "1";
            $msg = "Get data Successfully.";
            $arr['response']['status']=$status;
            $arr['response']['message']=$msg;
           
             while($rowInfo= mysqli_fetch_array($result,MYSQLI_ASSOC))
             {
              
            $arr['response']['data'][$i]['f_id'] = $rowInfo['f_id'];
               $arr['response']['data'][$i]['pay_approve'] = $rowInfo['pay_approve'];
              $arr['response']['data'][$i]['f_details'] =$rowInfo['f_details'];
          

                 $i++;
             }
            $json = json_encode($arr);
            echo $json;
			}
			
    ?>
