<?php
    
include('dbcon.php');
   $sid=$_REQUEST['sid'];
$did=$_REQUEST['did'];
    $i=0;
    $j=0;
    $arr=array();
//$sql="SELECT b.*,a.notification_messages AS message , a.notification_message_read_status As readStatus FROM notifications a , scan_logs b , students c , parents d WHERE b.log_id=a.scan_log_id and b.student_id=c.student_id and b.parents_id=d.parents_id and b.student_id='$sid' and d.parents_id='$did' and DATE(a.notification_created_date)=CURDATE()";
$sql="SELECT e.*,b.*,a.notification_messages AS message , a.notification_message_read_status As readStatus,c.student_card_id As student_card_id FROM notifications a , scan_logs b , students c , parents d , bus e WHERE c.student_bus_id=e.bus_id and  b.log_id=a.scan_log_id and b.student_id=c.student_id and b.parents_id=d.parents_id and b.student_id='$sid' and d.parents_id='$did' and DATE(a.notification_created_date)=CURDATE()";

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
              $localFare=$rowInfo['bus_fare'];  
              $flg=$rowInfo['pick_up_location'];
                $flgd=$rowInfo['drop_location'];
              if(!empty($flg))
              {
                   $arr['response']['data'][$i]['flag'] = "1";
              }else{
                    $arr['response']['data'][$i]['flag'] = "0";
              }
              if(!empty($flgd))
              {
                  $arr['response']['data'][$i]['flagd'] = "1"; 
              }
              else{
                    $arr['response']['data'][$i]['flagd'] = "0";
              }
           
            $arr['response']['data'][$i]['log_id'] = $rowInfo['log_id'];
            $arr['response']['data'][$i]['student_id'] = $rowInfo['student_id'];
            
            $arr['response']['data'][$i]['logs_school_id'] =$rowInfo['logs_school_id'];
            $arr['response']['data'][$i]['driver_id'] = $rowInfo['driver_id'];
            
            
            $arr['response']['data'][$i]['bus_id'] = $rowInfo['bus_number'];
            
            $arr['response']['data'][$i]['parents_id'] =$rowInfo['parents_id'];
            $arr['response']['data'][$i]['pick_up_location'] = $rowInfo['pick_up_location'];
            $arr['response']['data'][$i]['pick_up_datetime'] = $rowInfo['pick_up_datetime'];

     $arr['response']['data'][$i]['drop_datetime'] = $rowInfo['drop_datetime'];
            $arr['response']['data'][$i]['drop_location'] = $rowInfo['drop_location'];
            $arr['response']['data'][$i]['log_status'] = $rowInfo['log_status'];

            $arr['response']['data'][$i]['message'] =$rowInfo['message'];
                $arr['response']['data'][$i]['message'] =$rowInfo['message'];
                   $arr['response']['data'][$i]['readStatus'] =$rowInfo['readStatus'];
            

                 $i++;
             }
            $json = json_encode($arr);
            echo $json;
			}
			
    ?>
