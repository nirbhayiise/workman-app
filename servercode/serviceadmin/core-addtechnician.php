<?php
	include_once 'class.php';
		$user = new User();											
	
	



if($_SERVER["REQUEST_METHOD"] == "POST") 
{ 

	$filenaname="";
    $filename = $_FILES["file"]["name"];
	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_ext = substr($filename, strripos($filename, '.')); // get file name
	$filesize = $_FILES["file"]["size"];
	$allowed_file_types = array('.png','.JPEG','.png','.jpg');	

	
		// Rename file
		$newfilename = md5($file_basename).date('dmYHis')  . $file_ext;
		if (file_exists("upload/" . $newfilename))
		{
			// file already exists error
			echo "You have already uploaded this file.";
		}
		else
		{		
			move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $newfilename);
		//	echo "File uploaded successfully.";	
		
		 $filenaname=$newfilename;
                 $bname=$_POST['bname'];
                $Professional=$_POST['Professional'];
                $technicianname=$_POST['technicianname'];
                $Address=$_POST['Address'];
                $phone=$_POST['phone'];
                $statename=$_POST['statename'];
                $city=$_POST['city'];
                $userImage=$_POST['userImage'];
                
                $mail=$_POST['mail'];
                $pas=$_POST['pas'];



                $res = $user->addtechnicians($bname,$Professional,$technicianname,$Address,$phone,$mail,$pas,$statename,$city,$filenaname);


 
                 echo "<script>alert('Technician Createded successfully!'); window.location='addtechnician.php'</script>"; 
		
		
		}


	
    
           



  

/*else{
    
    $bname=$_POST['bname'];
$Professional=$_POST['Professional'];
$technicianname=$_POST['technicianname'];
$Address=$_POST['Address'];
$phone=$_POST['phone'];
$statename=$_POST['statename'];
$city=$_POST['city'];
$userImage=$_POST['userImage'];

$mail=$_POST['mail'];
$pas=$_POST['pas'];



$res = $user->addtechnicians($bname,$Professional,$technicianname,$Address,$phone,$mail,$pas,$statename,$city,$filenaname);


 
 echo "<script>alert('Technician Createded successfully!'); window.location='addbusinessregister.php'</script>"; 
}
*/
  

	

 

} 



?>