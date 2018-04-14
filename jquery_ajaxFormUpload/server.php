<?php
$file_TName=$_FILES['file1']['tmp_name'];
$file_Name=$_FILES['file1']['name'];
move_uploaded_file($file_TName, 'upload_folder/'.$file_Name);

?>