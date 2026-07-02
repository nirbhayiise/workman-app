<?php
//error_reporting(0);
include('dbcon.php');
$i=0;
$arr=array();
$cid  = $_REQUEST['cid'];
$name  = $_REQUEST['c_first_name'];
$address  = $_REQUEST['c_address'];
$password  = $_REQUEST['c_pass'];


if(empty($name))
{
	   $status = "0";	
		$msg = "Please enter name";	
		$arr['response']['status']=$status;     
		$arr['response']['message']=$msg;
		$json = json_encode($arr);
		echo $json;
		return;
}

else if(empty($address))
{
	   $status = "0";	
		$msg = "Please enter address";	
		$arr['response']['status']=$status;     
		$arr['response']['message']=$msg;
		$json = json_encode($arr);
		echo $json;
		return;
}

else if(empty($password))
{
	   $status = "0";	
		$msg = "Please enter password";	
		$arr['response']['status']=$status;     
		$arr['response']['message']=$msg;
		$json = json_encode($arr);
		echo $json;
		return;
}

else
        	{
        	 $sql1= "UPDATE customer SET c_first_name='$name',c_address='$address',c_pass='$password' where c_id='$cid'";
        
        
         $check = mysqli_query($db,$sql1);  
        
         if($check)
         {
        	    $status = "1";	
        		$msg = "Profile Successfully updated.";	
        		$arr['response']['status']=$status;     
        		$arr['response']['message']=$msg;
        		$json = json_encode($arr);
        		echo $json; 
         }
         else
         {
        	     $status = "0";	
        		 $msg = "Profile not updated.";
        		 $arr['response']['status']=$status;     
        		 $arr['response']['message']=$msg; 
        		  $json = json_encode($arr);  
        		  echo $json; 
         }
    }
	



// Unused legacy functions removed
