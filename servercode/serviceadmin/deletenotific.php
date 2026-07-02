<?php
	include 'class.php';

    $flagStatus="";
    $schoolId=$_POST['sid'];
	$user = new User();
	
	$flagStatus = $user->deletenoty($schoolId);

	if($flagStatus=='1')
	{
	    echo 'success';
	}
	else
	{
	     echo 'failed';
	}


?>