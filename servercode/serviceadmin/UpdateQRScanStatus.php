<?php
	include 'class.php';

    $flagStatus="";

    $reqId=$_POST['reqId'];
	$user = new User();
	 // $reqData = $user->getJobDetailsForAccpt($reqId);
	$flagStatus = $user->fetchQRupdateQRCodeStatus($reqId);

	if($flagStatus=='1')
	{
	   
	   echo 'success';
	   // sendMailMessg($user,$reqId);
	     
	}
	else
	{
	     echo 'failed';
	      // sendMailMessg($user,$reqId);
	}





?>