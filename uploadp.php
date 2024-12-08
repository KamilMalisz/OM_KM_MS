<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
if (file_exists($target_file)) {
    $uploadOk = 0;
  }
if ($_FILES["file"]["size"] > 1000000) {
    $uploadOk = 0;
}
if ($uploadOk == 1) {
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
} 
  header('Location: /projekt/upload.php');
?>