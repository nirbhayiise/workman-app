<?php
	include_once 'class.php';
		$user = new User();											
												
if($_SERVER["REQUEST_METHOD"] == "POST") 
{ 

$first_name=$_POST['firstname'];
$last_name=$_POST['lastname'];
$complete_address=$_POST['CompleteAddress'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];


$res = $user->addvend($first_name,$last_name,$complete_address,$mobile,$password);


 
 echo "<script>alert('Vendor  Createded successfully!'); window.location='addvendor.php'</script>";   

	

 

} 



?>