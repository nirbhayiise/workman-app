<?php
    
include('dbcon.php');
   $e_id=$db -> real_escape_string($_REQUEST['e_id']); 
      $c_id=$db -> real_escape_string($_REQUEST['frindliness']); 
         $t_id=$db -> real_escape_string($_REQUEST['service_in_future']); 
            $f_details=$db -> real_escape_string($_REQUEST['impove_message']); 
         
if(!empty($e_id) && !empty($c_id) && !empty($t_id) && !empty($f_details))
{
$sql="INSERT INTO `Satisfaction`( `e_id`, `Friendliness`, `future_use`, `improve_service`, `s_created`, `s_status`)
VALUES 
('$e_id','$c_id','$t_id','$f_details',now(),'1')";


		$result=mysqli_query($db,$sql);
	
		$last_id = mysqli_insert_id($db);
		if($last_id>0)
		{
		   
           
           	$status = "1";
			$msg = "Thanks for Submiting FeedBack";
			$arr['response'][0]['status']=$status;
			$arr['response'][0]['message']=$msg;
			
			// updatefeebckStatus($db,$e_id);
			
                   
           
            $json = json_encode($arr);
            echo $json;
		
		}
		else
		{
            
            	$status = "0";
			$msg = "Feeback not submit!";
			$arr['response'][0]['status']=$status;
			$arr['response'][0]['message']=$msg;
		
			
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

function updatefeebckStatus($db,$eid)
{
    $qrystr="UPDATE `Enquiry` SET `complete_task_feedbck_status`=1 WHERE `e_id`='$eid'";
  
    $qry = mysqli_query($db,$qrystr); 
        
}
			
    ?>
