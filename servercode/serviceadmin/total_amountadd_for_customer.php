<?php
	include 'class.php';

    
    $eid=$_POST['eid'];
    $samount=$_POST['samount'];
 
	$user = new User();
	
	$flagStatus = $user->totalAmountUpdateToCust($eid,$samount);
	

	if($flagStatus=='1')
	{
	    echo 'success';
	}
	else
	{
	     echo 'failed';
	}


?>