<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);


$arr = array();
error_reporting(0);
 $banner=$_FILES['banner']['name']; 
 $expbanner=explode('.',$banner);
 $bannerexptype=$expbanner[1];
 date_default_timezone_set('Australia/Melbourne');
 $date = date('m/d/Yh:i:sa', time());
 $rand=mt_rand(10000, 99999);
 $encname=$date.$rand;
 $bannername=md5($encname).'.'.$bannerexptype;
 $bannerpath="../upload/".$bannername;
 $allowed = array('gif', 'png', 'jpg');
 $ext = pathinfo($bannername, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        $status = "0";
			$msg = "Bad Extension ";
			$arr['status']=$status;
			$arr['message']=$msg;
			$arr['filename']="default.png";
       // die;
    }
    //$image_info = getimagesize($_FILES["banner"]);
//print_r($image_info);

 if(move_uploaded_file($_FILES["banner"]["tmp_name"],$bannerpath)==1){
     	$status = "1";
			$msg = "Upload Image Success";
			$arr['status']=$status;
			$arr['message']=$msg;
			$arr['filename']=$bannername;
 }else{
            $status = "0";
			$msg = "Unable to Upload Image ";
			$arr['status']=$status;
			$arr['message']=$msg;
			$arr['filename']="default.png";
 }
 $json = json_encode($arr);
            echo $json;
		

?>