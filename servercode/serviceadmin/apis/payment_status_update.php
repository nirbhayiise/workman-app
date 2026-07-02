<?php
//error_reporting(0);
include('dbcon.php');
$i=0;
$arr=array();
$eid  = $db -> real_escape_string($_REQUEST['eid']);
$t_ref  = $db -> real_escape_string($_REQUEST['t_ref']);





if(empty($eid) && empty($tid))
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
         $sql1= "UPDATE Enquiry SET work_status='5',payment_status='1',payment_dialog_status='1',transcation_ref='$t_ref' WHERE e_id='$eid'";
        //  echo $sql1;
        //  die;
       $result=mysqli_query($db,$sql1);
       $check=mysqli_affected_rows($db);
         if($check=='1')
         {
        	    $status = "1";	
        		$msg = " Successfully Payment Done ";	
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
        		  echo $json;
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
