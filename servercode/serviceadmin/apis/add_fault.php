<?php
    
include('dbcon.php');
   $e_id=$db -> real_escape_string($_REQUEST['e_id']); 
      $c_id=$db -> real_escape_string($_REQUEST['c_id']); 
         $t_id=$db -> real_escape_string($_REQUEST['t_id']); 
            $f_details=$db -> real_escape_string($_REQUEST['f_details']); 
         
if(!empty($e_id) && !empty($c_id) && !empty($t_id) && !empty($f_details))
{
$sql="INSERT INTO `fault_analysis`(`e_id`, `c_id`, `t_id`, `f_created`, `f_details`, `f_status`)
VALUES 
('$e_id','$c_id','$t_id',now(),'$f_details','1')";

		$result=mysqli_query($db,$sql);
	
		$last_id = mysqli_insert_id($db);
		if($last_id>0)
		{
		   
           
           	$status = "1";
			$msg = "SucceFully Add Fault!";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;
			 
			
                   
           
            $json = json_encode($arr);
            echo $json;
		
		}
		else
		{
            
            	$status = "0";
			$msg = "Failed to Add Fault Analysis!";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;
		
			
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
			
    ?>
