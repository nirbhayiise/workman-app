<?php
    
include('dbcon.php');
   $pid=$_REQUEST['sid']; 
   $studentId=$_REQUEST['studentId'];
   $from=$_REQUEST['from'];
   $to=$_REQUEST['to'];
//   if(empty($from))
//   {
//       $from = date('Y-m-d');
//   }
//   if(empty($to))
//   {
//       $to=date('Y-m-d');
//   }

    $i=0;
    $j=0;
    $arr=array();
/*$sql="
SELECT a.* , b.* , c.* , d.* , e.* , g.*, 
(select f.address_txt from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As address_txt , 
(select f.bus_latitude from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As bus_latitude , 
(select f.bus_longitude from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) As bus_longitude , 
(select f.update_date_time from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1)
As update_date_time from school a, students b, parents c, bus d , bus_driver e, scan_logs g 
where g.student_id=b.student_id 
and g.logs_school_id=a.school_id 
and g.driver_id=e.driver_id 
and g.bus_id=d.bus_id 
and g.parents_id=c.parents_id 
and ((date(g.pick_up_datetime) between '$from' and '$to') OR (date(g.drop_datetime) between '$from' and '$to'))
and g.parents_id = '$pid' and b.student_active_status=1 and c.parents_active_status=1 and a.school_active_status=1 OR b.student_id='$studentId'
ORDER BY g.log_id DESC
";*/
$sql="SELECT a.* , b.* , c.* , d.* , e.* , g.*,
(select f.address_txt from bus_track_locations f 
where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1)
As address_txt ,
(select f.bus_latitude from bus_track_locations f 
where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1)
As bus_latitude ,
(select f.bus_longitude from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1)
As bus_longitude ,
(select f.update_date_time from bus_track_locations f where f.bus_id = d.bus_id order by f.location_id desc LIMIT 1) 
As update_date_time 
from school a, students b, parents c, bus d , bus_driver e, scan_logs g where g.student_id=b.student_id and g.logs_school_id=a.school_id and g.driver_id=e.driver_id and g.bus_id=d.bus_id
and g.parents_id=c.parents_id and ((date(g.pick_up_datetime) between '$from' and '$to') OR (date(g.drop_datetime) between '$from' and '$to')) and g.parents_id = '$pid' and b.student_active_status=1 
and c.parents_active_status=1 and a.school_active_status=1 and b.student_id='$studentId' ORDER BY g.log_id DESC";

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
           
            $arr['response']['data'][$i]['school_id'] = $rowInfo['school_id'];
            $arr['response']['data'][$i]['school_name'] = $rowInfo['school_name'];
            
            $arr['response']['data'][$i]['school_address'] =$rowInfo['school_address'];
            $arr['response']['data'][$i]['school_city'] = $rowInfo['school_city'];
            
            
            $arr['response']['data'][$i]['school_phone'] = $rowInfo['school_phone'];
            
            $arr['response']['data'][$i]['school_active_status'] =$rowInfo['school_active_status'];
           
           // $arr['response']['data'][$i]['student_id'] = $rowInfo['student_card_id'];
             $arr['response']['data'][$i]['student_id'] = $rowInfo['student_id'];
            $arr['response']['data'][$i]['student_first_name'] = $rowInfo['student_first_name'];

     $arr['response']['data'][$i]['student_address'] = $rowInfo['student_address'];
            $arr['response']['data'][$i]['student_phone'] = $rowInfo['student_phone'];
            $arr['response']['data'][$i]['student_parents_id'] = $rowInfo['student_parents_id'];

            $arr['response']['data'][$i]['student_school_id'] =$rowInfo['student_school_id'];
                $arr['response']['data'][$i]['student_class'] =$rowInfo['student_class'];
                   $arr['response']['data'][$i]['student_section'] =$rowInfo['student_section'];
                   
                    $arr['response']['data'][$i]['student_bus_id'] =$rowInfo['student_bus_id'];
                     $arr['response']['data'][$i]['student_created_date'] =$rowInfo['student_created_date'];
                      $arr['response']['data'][$i]['student_section_duration'] =$rowInfo['student_section_duration'];
                       $arr['response']['data'][$i]['student_active_status'] =$rowInfo['student_active_status'];
                        $arr['response']['data'][$i]['parents_id'] =$rowInfo['parents_id'];
                         $arr['response']['data'][$i]['parents_first_name'] =$rowInfo['parents_first_name'];
                          $arr['response']['data'][$i]['parents_last_name'] =$rowInfo['parents_last_name'];
                           $arr['response']['data'][$i]['parents_phone'] =$rowInfo['parents_phone'];
                            $arr['response']['data'][$i]['parents_mail'] =$rowInfo['parents_mail'];
            
            
            
            
            
                   $arr['response']['data'][$i]['ppassword'] =$rowInfo['ppassword'];
                     $arr['response']['data'][$i]['parents_emergency_contact'] =$rowInfo['parents_emergency_contact'];
                      $arr['response']['data'][$i]['parents_address'] =$rowInfo['parents_address'];
                       $arr['response']['data'][$i]['parents_city'] =$rowInfo['parents_city'];
                        $arr['response']['data'][$i]['parents_created_date'] =$rowInfo['parents_created_date'];
                         $arr['response']['data'][$i]['fcm_token'] =$rowInfo['fcm_token'];
                          $arr['response']['data'][$i]['parents_active_status'] =$rowInfo['parents_active_status'];
                           $arr['response']['data'][$i]['bus_id'] =$rowInfo['bus_number'];
                            $arr['response']['data'][$i]['bus_name'] =$rowInfo['bus_name'];
                            
                            
                            $arr['response']['data'][$i]['bus_number'] =$rowInfo['bus_number'];
                     $arr['response']['data'][$i]['bus_longitude'] =$rowInfo['bus_longitude'];
                      $arr['response']['data'][$i]['bus_latitude'] =$rowInfo['bus_latitude'];
                       $arr['response']['data'][$i]['address_txt'] =$rowInfo['address_txt'];
                        $arr['response']['data'][$i]['log_status'] =$rowInfo['log_status'];
                         $arr['response']['data'][$i]['drop_datetime'] =$rowInfo['drop_datetime'];
                          $arr['response']['data'][$i]['drop_location'] =$rowInfo['drop_location'];
                           $arr['response']['data'][$i]['pick_up_location'] =$rowInfo['pick_up_location'];
                              $arr['response']['data'][$i]['pick_up_datetime'] =$rowInfo['pick_up_datetime'];
                            $arr['response']['data'][$i]['driver_id'] =$rowInfo['driver_id'];
                               $arr['response']['data'][$i]['driver_first_name'] =$rowInfo['driver_first_name'].' '.$rowInfo['driver_last_name'];
                             
            

                 $i++;
             }
            $json = json_encode($arr);
            echo $json;
			}
			
    ?>
