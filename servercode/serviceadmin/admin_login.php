<?php
	include_once 'class.php';
		$user = new User();											
												
if($_SERVER["REQUEST_METHOD"] == "POST") 
{ 

$adminuser=$_POST['username'];
$password=$_POST['password'];

$res = $user->adminlogin($adminuser,$password);

if($res==1)
{
 
 echo "<script>alert('Login successfully!'); window.location='dashboard.php'</script>";   
}else
{
   echo "<script>alert('Login failed try again!'); window.location='index.php'</script>";  
}
	

 

} 



?>