<?php
include('dbcon.php');

$i=0;
$arr=array();
$lat= $_REQUEST['lat'];
$lng= $_REQUEST['lng'];

$txtaddress= $_REQUEST['txtaddress'];
$did= $_REQUEST['did'];


if(!empty($lat) && !empty($lng) && !empty($did))
{ 
    
$rendStr=mt_rand(1000,9999);  
$date1 =getDatetimeNow();
$qrystr="insert into bus_track_locations (bus_latitude,bus_longitude,driver_id,update_date_time,location_status,address_txt) Values ('$lat','$lng','$did',now(),'1','$txtaddress')";
  
   $qry = mysqli_query($db,$qrystr); 
        
		$addressId = mysqli_insert_id($db);
		if($addressId>0){
		
		
			$status = "1";
			$msg = "Location get successfully .";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;   
			
			
				
		}else{
			$status = "0";
			$msg = "On GPS device please .";
			$arr['response']['status']=$status;
			$arr['response']['message']=$msg;
			 $arr['response']['OTP']='not found';  
						
		}
   
		$json = json_encode($arr);
		echo $json;

}else{
     $status = "0";
     $msg = "missing some required parameter.";
     $arr['response']['status']=$status;
     $arr['response']['message']=$msg;

         
     $json = json_encode($arr);
     echo $json;
}

function getDatetimeNow() {
    $tz_object = new DateTimeZone('Asia/Kolkata');
    //date_default_timezone_set('Brazil/East');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('Y\-m\-d\ h:i:s');
}

?>