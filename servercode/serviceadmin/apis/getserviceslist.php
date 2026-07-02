<?php
    
include('dbcon.php');
   $pid = $db -> real_escape_string($_REQUEST['pid']);
    $i=0;
    $j=0;
    $arr=array();
//$sql="SELECT b.*,a.notification_messages AS message , a.notification_message_read_status As readStatus FROM notifications a , scan_logs b , students c , parents d WHERE b.log_id=a.scan_log_id and b.student_id=c.student_id and b.parents_id=d.parents_id and b.student_id='$sid' and d.parents_id='$did' and DATE(a.notification_created_date)=CURDATE()";
$sql="select * from services where pro_id='$pid' and s_status=1 order  by s_name ASC";

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
              
            $arr['response']['data'][$i]['s_id'] = $rowInfo['s_id'];
            
            $arr['response']['data'][$i]['s_name'] =$rowInfo['s_name'];
            $arr['response']['data'][$i]['pro_id'] = $rowInfo['pro_id'];
            

                 $i++;
             }
            $json = json_encode($arr);
            echo $json;
			}
			
    ?>
