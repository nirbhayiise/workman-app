<?php
	include 'class.php';

    $flagStatus="";
    $schoolId=$_POST['sid'];
    $status=$_POST['status'];
	$user = new User();
	
	$flagStatus = $user->requestActivesrvsNotifi($schoolId,$status);

	if($flagStatus=='1')
	{
	    echo 'success';
	}
	else
	{
	     echo 'failed';
	}


?>