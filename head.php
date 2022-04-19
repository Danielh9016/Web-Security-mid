<?php
session_start();
if( $_FILES['file']['name']=="" ){
    header("Location: index2.php");
}
require_once('config.php');
$filename=$_FILES['file']['name'];
$tmpname=$_FILES['file']['tmp_name'];
$filetype=$_FILES['file']['type'];
$filesize=$_FILES['file']['size'];   
$dest = "./upload/" . $_FILES['file']['name'];
move_uploaded_file($tmpname, $dest); 
    $username = $_SESSION['username'];
    $tmp = "./upload/" . $filename;  
    $sql = "UPDATE `users` SET `head` = '$tmp' WHERE `username` = '$username' ";
    $result=mysqli_query($link,$sql);
    if (!$result) {
		die('Error: ' . mysqli_error($link));
	} else {
        echo '更換成功';
		echo "  <script>
                setTimeout(function(){window.location.href='index2.php';},500);
                </script>";

	}
?>