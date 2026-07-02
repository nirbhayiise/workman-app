<?php
    
include('dbcon.php');

$tId =$db -> real_escape_string($_REQUEST['tId']);
    $workstatus = $db -> real_escape_string($_REQUEST['workstatus']);
    $i=0;
    $j=0;
    $arr=array();
//$sql="SELECT b.*,a.notification_messages AS message , a.notification_message_read_status As readStatus FROM notifications a , scan_logs b , students c , parents d WHERE b.log_id=a.scan_log_id and b.student_id=c.student_id and b.parents_id=d.parents_id and b.student_id='$sid' and d.parents_id='$did' and DATE(a.notification_created_date)=CURDATE()";
$sql="SELECT a.*,b.*,c.*,d.*,e.*,f.* FROM Enquiry a,business b, services c, customer d, technician e, professional_area f 
WHERE 
a.b_id=b.b_id 
and 
a.cat_id = f.pro_id 
and 
a.service_id= c.s_id 
and 
a.c_id = d.c_id 
and 
a.alloted_technician_id=e.t_id 
and 
a.alloted_technician_id='$tId' 
and 
a.work_status='$workstatus' 
and 
a.e_status=1";

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
            
            $arr['response']['data'][$i]['details'] =$rowInfo['details'];
            $arr['response']['data'][$i]['b_name'] = $rowInfo['b_name'];
            $arr['response']['data'][$i]['pro_name'] = $rowInfo['pro_name'];
            $arr['response']['data'][$i]['c_first_name'] = $rowInfo['c_first_name'];
            $arr['response']['data'][$i]['c_phone'] = $rowInfo['c_phone'];
            $arr['response']['data'][$i]['c_address'] = $rowInfo['c_address'];
            $arr['response']['data'][$i]['work_status'] = $rowInfo['work_status'];
            
            

                 $i++;
             }
            $json = json_encode($arr);
            echo $json;
			}
			
    ?>
