<?php
    
include('dbcon.php');

$cid =$db -> real_escape_string($_REQUEST['cid']);
   
    $i=0;
    $j=0;
    $arr=array();
//$sql="SELECT b.*,a.notification_messages AS message , a.notification_message_read_status As readStatus FROM notifications a , scan_logs b , students c , parents d WHERE b.log_id=a.scan_log_id and b.student_id=c.student_id and b.parents_id=d.parents_id and b.student_id='$sid' and d.parents_id='$did' and DATE(a.notification_created_date)=CURDATE()";
$sql="SELECT a.*,b.*,c.*,e.* FROM Enquiry a, customer b, technician c,services e WHERE a.alloted_technician_id=c.t_id and a.c_id=b.c_id and  a.c_id='$cid' and a.service_id=e.s_id GROUP By a.e_id ORDER BY a.e_id DESC";

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
            
            $arr['response']['data'][$i]['s_name'] = $rowInfo['s_name'];
            $arr['response']['data'][$i]['tech_name'] = $rowInfo['tech_name'];
            
             $arr['response']['data'][$i]['security_code'] = $rowInfo['security_code'];
             
            $arr['response']['data'][$i]['amount_paid'] = $rowInfo['amount_paid'];
            $arr['response']['data'][$i]['work_status'] = $rowInfo['work_status'];
            
            if($rowInfo['work_status']==5 && $rowInfo['payment_status']==2)
             {
                $arr['response']['data'][$i]['workFlgStatus'] = "Complete";
             } else if($rowInfo['work_status']==3 && $rowInfo['payment_status']==1){ 
                $arr['response']['data'][$i]['workFlgStatus'] = "Pending";
               
             } else if($rowInfo['work_status']==2){ 
                $arr['response']['data'][$i]['workFlgStatus'] = "Fault Analysis";
               
             }else if($rowInfo['work_status']==1 && $rowInfo['payment_status']==0){ 
                $arr['response']['data'][$i]['workFlgStatus'] = "Waiting Accept";
               
             } else{
                 $arr['response']['data'][$i]['workFlgStatus'] = "Pending";
             }
               $i++;
           
			}
			 $json = json_encode($arr);
            echo $json;
		}
			
    ?>
