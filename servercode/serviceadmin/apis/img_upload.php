<?php




 // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
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
            if(file_exists("serviceadmin/upload/" . $filename)){
                echo json_encode(array("status" => "0", "message" => "File already exists", "filename" => "default.png"));
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "serviceadmin/upload/" . $filename);
                echo json_encode(array("status" => "1", "message" => "Success", "filename" => $filename));
            } 
        } else{
            echo json_encode(array("status" => "0", "message" => "Invalid MIME type", "filename" => "default.png"));
        }
    } else{
        echo json_encode(array("status" => "0", "message" => "Error: " . $_FILES["photo"]["error"], "filename" => "default.png"));
    }







/*
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./upload/" . $filename;
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
      echo  "{\"status\":\"1\",\"file\":\"+$filename+\"}";
    } else {
       echo  "{\"status\":\"0\",\"file\":\"+$filename+\"}";
    }*/



?>