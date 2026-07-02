<?php
	include_once 'class.php';

							
												
if($_SERVER["REQUEST_METHOD"] == "POST") 
{ 



$gst=$_POST['gst'];
$sellingprice=$_POST['SellingPrice'];
$mrp=$_POST['MRP'];
$qtyunit=$_POST['Quantityunit'];
$remark=$_POST['des'];
$item_name=$_POST['itemname'];
$section_id=$_POST['category'];
$category_id=$_POST['selectSm'];
$item_statuss=$_POST['actvdect'];
$vid=$_POST['vid'];

 if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename= date('dmYHis').str_replace(" ", "", basename($_FILES["photo"]["name"]));
        //$filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
        
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
            
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";
                	$user = new User();
                	$res = $user->AddProducts($item_name,$filename,$section_id,$remark,$mrp,$sellingprice,$qtyunit,$item_statuss,$gst,$vid);
               
              // 	header("location: addcategory.php");
               		echo "<script>alert('Product Added!'); window.location='additems.php'</script>";
        
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }









} 



?>