<?php
    
include('dbcon.php');
  $tid = $db -> real_escape_string($_REQUEST['tid']);
    $i=0;
    $j=0;
    $arr=array();
//$sql="SELECT b.*,a.notification_messages AS message , a.notification_message_read_status As readStatus FROM notifications a , scan_logs b , students c , parents d WHERE b.log_id=a.scan_log_id and b.student_id=c.student_id and b.parents_id=d.parents_id and b.student_id='$sid' and d.parents_id='$did' and DATE(a.notification_created_date)=CURDATE()";
$sql="SELECT a.*,b.*,d.*,e.* FROM Enquiry a, professional_area b, services d, customer e WHERE a.cat_id=b.pro_id and a.service_id=d.s_id and a.c_id=e.c_id and a.e_status='1' and a.alloted_technician_id='$tid' and a.work_status=2 ORDER by a.e_id DESC";
// echo $sql;
// die;
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
              $arr['response']['data'][$i]['c_id'] =$rowInfo['c_id'];
            $arr['response']['data'][$i]['c_first_name'] =$rowInfo['c_first_name'];
            $arr['response']['data'][$i]['c_last_name'] = $rowInfo['c_last_name'];
             $arr['response']['data'][$i]['c_phone'] = $rowInfo['c_phone'];
              $arr['response']['data'][$i]['c_address'] = $rowInfo['c_address'];
               $arr['response']['data'][$i]['s_name'] = $rowInfo['s_name'];
                $arr['response']['data'][$i]['pro_name'] = $rowInfo['pro_name'];
               
                 $arr['response']['data'][$i]['contact_person_name'] = $rowInfo['contact_person_name'];
                 $arr['response']['data'][$i]['contact_person_mail'] = $rowInfo['contact_person_mail'];
                 $arr['response']['data'][$i]['contact_person_mob'] = $rowInfo['contact_person_mob'];
                 $arr['response']['data'][$i]['details'] = $rowInfo['details'];
                   $arr['response']['data'][$i]['work_status'] = $rowInfo['work_status'];
                $arr['response']['data'][$i]['security_code'] = $rowInfo['security_code'];
                $arr['response']['data'][$i]['scan_flag'] = $rowInfo['scan_flag'];
                $arr['response']['data'][$i]['e_created'] = $rowInfo['e_created'];
                  $arr['response']['data'][$i]['accept_tech'] = $rowInfo['accept_tech'];
                  $arr['response']['data'][$i]['cancellation_flag'] = $rowInfo['cancellation_flag'];
                
                  $arr['response']['data'][$i]['photo1'] = $rowInfo['photo1'];
                $arr['response']['data'][$i]['photo2'] = $rowInfo['photo2'];
               
            

                 $i++;
             }
            $json = json_encode($arr);
            echo $json;
			}
			
    ?>
