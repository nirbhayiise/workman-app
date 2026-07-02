<?php
//error_reporting(0);
include('dbcon.php');
$i=0;
$arr=array();
  $e_id = $db -> real_escape_string($_REQUEST['e_id']);
    $c_id = $db -> real_escape_string($_REQUEST['c_id']);
      $t_id = $db -> real_escape_string($_REQUEST['t_id']);
           $fid = $db -> real_escape_string($_REQUEST['fid']);




if(empty($e_id) && empty($c_id)&& empty($t_id)&& empty($fid))
{
	   $status = "0";	
		$msg = "Something went wrong!";	
		$arr['response']['status']=$status;     
		$arr['response']['message']=$msg;
		$json = json_encode($arr);
		echo $json;
		return;
}


else
{
         $sql1= "UPDATE fault_analysis SET f_status='0' WHERE t_id='$t_id' and c_id='$c_id' and e_id='$e_id' and f_id='$fid'";
   
       $result=mysqli_query($db,$sql1);
       $check=mysqli_affected_rows($db);
         if($check>0)
         {
        	    $status = "1";	
        		$msg = " Remove Fault Analysis Item ";	
        		$arr['response']['status']=$status;     
        		$arr['response']['message']=$msg;
        		$json = json_encode($arr);
        		echo $json; 
         }
         else
         {
        	     $status = "0";	
        		 $msg = "Something went wrong";
        		 $arr['response']['status']=$status;     
        		 $arr['response']['message']=$msg; 
        		  $json = json_encode($arr);   
         }	
}


function stateIdFinder($stateName)
{
$sql3 = "SELECT id FROM states WHERE name ='$stateName'";
$check3 = mysql_query($sql3);
$row_city = mysql_num_rows($check3);
$rowInfo3 = mysql_fetch_array($check3);
$STATE_ID = $rowInfo3['id']; 

return $STATE_ID;	
}

function cityIdFinder($cityName)
{
$sql2 = "SELECT id FROM cities WHERE name ='$cityName'";
$check2 = mysql_query($sql2);
$row_city = mysql_num_rows($check2);
$rowInfo2 = mysql_fetch_array($check2); 
$CITY_ID = $rowInfo2['id'];

return 	$CITY_ID;
}

function stateValidate($stateId,$cityId)
{
$sql3 = "SELECT id FROM cities WHERE id ='$cityId' and stateID='$stateId'";
$check3 = mysql_query($sql3);
$row_city = mysql_num_rows($check3);
$rowInfo3 = mysql_fetch_array($check3);
$STATE_ID = $rowInfo3['id']; 

return $STATE_ID;
}

 
 ?>
