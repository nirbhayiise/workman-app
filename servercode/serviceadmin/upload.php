<?php
if (is_array($_FILES)) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        $sourcePath = $_FILES['userImage']['tmp_name'];
        $targetPath = "upload/" . $_FILES['userImage']['name'];
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
        if (move_uploaded_file($sourcePath, $targetPath)) {
            ?>
<img class="image-preview" src="<?php echo $targetPath; ?>"
	class="upload-preview" />
<?php
        }
    }
}
?>