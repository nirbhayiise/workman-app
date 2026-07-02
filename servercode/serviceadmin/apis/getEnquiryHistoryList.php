<?php
    
include('dbcon.php');

    $c_id =$db -> real_escape_string($_REQUEST['c_id']);
   
    $i=0;
    $j=0;
    $arr=array();
//$sql="SELECT b.*,a.notification_messages AS message , a.notification_message_read_status As readStatus FROM notifications a , scan_logs b , students c , parents d WHERE b.log_id=a.scan_log_id and b.student_id=c.student_id and b.parents_id=d.parents_id and b.student_id='$sid' and d.parents_id='$did' and DATE(a.notification_created_date)=CURDATE()";
$sql="SELECT a.*,b.*,c.*,e.* FROM Enquiry a, customer b, technician c,services e WHERE a.e_id=a.e_id and a.c_id=b.c_id and a.alloted_technician_id=c.t_id and a.c_id='$c_id' and a.service_id=e.s_id GROUP By a.e_id ORDER BY a.e_id DESC";

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
              
            $arr['response']['data'][$i]['e_id'] = $rowInfo['e_id'];
               $arr['response']['data'][$i]['s_name'] = $rowInfo['s_name'];
              $arr['response']['data'][$i]['tech_name'] =$rowInfo['tech_name'];
                   $arr['response']['data'][$i]['details'] =$rowInfo['details'];
                     $arr['response']['data'][$i]['e_created'] =$rowInfo['e_created'];
                        $arr['response']['data'][$i]['amount_paid'] =$rowInfo['amount_paid'];
                             $arr['response']['data'][$i]['payment_status'] =$rowInfo['payment_status'];
          

                 $i++;
             }
            $json = json_encode($arr);
            echo $json;
			}
			
    ?>
