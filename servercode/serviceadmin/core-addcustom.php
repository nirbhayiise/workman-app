<?php
	include_once 'class.php';
		$user = new User();											
												
if($_SERVER["REQUEST_METHOD"] == "POST") 
{ 

$firstname=$_POST['firstname'];
$statename=$_POST['statename'];
$city=$_POST['city'];

$lastname=$_POST['lastname'];
$CompleteAddress=$_POST['CompleteAddress'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];


$res = $user->addctm($firstname,$lastname,$mobile,$CompleteAddress,$email,$password,$statename,$city);


 
 echo "<script>alert('Customer Createded successfully!'); window.location='addcustomer.php'</script>";   

	

 

} 



?>