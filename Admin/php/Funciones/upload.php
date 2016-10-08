<?php
include("../../../API/FuncionesPHP/createPost.php");
$post = $_POST['post'];
if(is_array($_FILES)) {
	if(is_uploaded_file($_FILES['media']['tmp_name'])) {
		$sourcePath = $_FILES['media']['tmp_name'];
		$targetPath = $_FILES['media']['name'];
		createPostImage($sourcePath,$targetPath,$post);
	}
}
return -1;
?>