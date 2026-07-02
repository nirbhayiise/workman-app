<?php
//error_reporting(0);
include('dbcon.php');
$i=0;
$arr=array();
//$user_email  = $_REQUEST['user_email'];
//$user_password  = $_REQUEST['user_password'];
//$token= $_REQUEST['token'];


$user_mobile  = $_REQUEST['user_mobile'];
$USER_NAME  = $_REQUEST['USER_NAME'];
$STORE_NAME  = $_REQUEST['STORE_NAME'];
//$LANGUAGE  = $_REQUEST['LANGUAGE'];
$HOUSE_NO  = $_REQUEST['HOUSE_NO'];
$LOCALITY  = $_REQUEST['LOCALITY'];
$STATE  = $_REQUEST['STATE'];
$CITY  = $_REQUEST['CITY'];
$PINCODE  = $_REQUEST['PINCODE'];
$GSTIN  = $_REQUEST['GSTIN'];
$USER_TYPE  = $_REQUEST['USER_TYPE'];

if(empty($user_mobile) || $user_mobile=='null')
{
	   $status = "0";	
		$msg = "Please enter Mobile";	
		$arr['response']['status']=$status;     
		$arr['response']['message']=$msg;
		$json = json_encode($arr);
		echo $json;
		return;
}

if(empty($USER_NAME) || $USER_NAME=='null')
{
	   $status = "0";	
		$msg = "Please enter Name";	
		$arr['response']['status']=$status;     
		$arr['response']['message']=$msg;
		$json = json_encode($arr);
		echo $json;
		return;
}
/*if(empty($STORE_NAME) || $STORE_NAME=='null')
{
	   $status = "0";	
		$msg = "Please enter Store Name";	
		$arr['response']['status']=$status;     
		$arr['response']['message']=$msg;
		$json = json_encode($arr);
		echo $json;
		return;
}*/
if(empty($HOUSE_NO) || $HOUSE_NO=='null')
{
	   $status = "0";	
		$msg = "Please enter HOUSE NO";	
		$arr['response']['status']=$status;     
		$arr['response']['message']=$msg;
		$json = json_encode($arr);
		echo $json;
		return;
}
if(empty($LOCALITY) || $LOCALITY=='null')
{
	   $status = "0";	
		$msg = "Please enter LOCALITY";	
		$arr['response']['status']=$status;     
		$arr['response']['message']=$msg;
		$json = json_encode($arr);
		echo $json;
		return;
}
if(empty($STATE) || $STATE=='null')
{
	   $status = "0";	
		$msg = "Please enter STATE";	
		$arr['response']['status']=$status;     
		$arr['response']['message']=$msg;
		$json = json_encode($arr);
		echo $json;
		return;
}


if(empty($CITY) || $CITY=='null')
{
	   $status = "0";	
		$msg = "Please enter Mobile";	
		$arr['response']['status']=$status;     
		$arr['response']['message']=$msg;
		$json = json_encode($arr);
		echo $json;
		return;
}

if(empty($PINCODE) || $PINCODE=='null')
{
	   $status = "0";	
		$msg = "Please enter CITY";	
		$arr['response']['status']=$status;     
		$arr['response']['message']=$msg;
		$json = json_encode($arr);
		echo $json;
		return;
}
else
{
	$satteTempId=stateIdFinder($db, $STATE);
	$cityTempId=cityIdFinder($db, $CITY);
	$satteValid=stateValidate($db, $satteTempId,$cityTempId);
	if(empty($satteValid))
	{
		 $status = "0";	
		$msg = "Entered City/State does not exist";	
		$arr['response']['status']=$status;     
		$arr['response']['message']=$msg;
		$json = json_encode($arr);
		echo $json;
		return;
	}
	else
	{
	 $sql1= "UPDATE enrollment SET CONTACT_PERSON='$USER_NAME',STORE_NAME='$STORE_NAME',ADDRESS_1='$HOUSE_NO',ADDRESS_2='$LOCALITY',CITY='$cityTempId',STATE='$satteTempId',PINCODE='$PINCODE',GSTIN='$GSTIN' WHERE MOBILE_NO='$user_mobile'";

 $check = mysqli_query($db, $sql1);  
 if($check=='1')
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
 }
}
	
}


function stateIdFinder($db, $stateName)
{
$sql3 = "SELECT id FROM states WHERE name ='$stateName'";
$check3 = mysqli_query($db, $sql3);
if ($check3) {
    $rowInfo3 = mysqli_fetch_array($check3);
    return $rowInfo3['id']; 
}
return null;
}

function cityIdFinder($db, $cityName)
{
$sql2 = "SELECT id FROM cities WHERE name ='$cityName'";
$check2 = mysqli_query($db, $sql2);
if ($check2) {
    $rowInfo2 = mysqli_fetch_array($check2); 
    return $rowInfo2['id'];
}
return null;
}

function stateValidate($db, $stateId,$cityId)
{
$sql3 = "SELECT id FROM cities WHERE id ='$cityId' and stateID='$stateId'";
$check3 = mysqli_query($db, $sql3);
if ($check3) {
    $rowInfo3 = mysqli_fetch_array($check3);
    return $rowInfo3['id']; 
}
return null;
}

 ?>
 ?>
