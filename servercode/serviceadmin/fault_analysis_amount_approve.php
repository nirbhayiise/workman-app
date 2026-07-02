<?php
	include 'class.php';

    
    $amount=$_POST['amount'];
    $fid=$_POST['fid'];
	$user = new User();
	
	$flagStatus = $user->getAmountApprove($amount,$fid);
	

	if($flagStatus=='1')
	{
	    echo 'success';
	}
	else
	{
	     echo 'failed';
	}


?>