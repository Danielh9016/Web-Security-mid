<?php session_start();
    if( !isset($_POST['url']) ||  $_POST['url']=="" ){
    header("Location: index2.php");
    }
    require_once('config.php');
	$url = $_POST['url'];
    $array = file_get_contents($url);
    $username = $_SESSION['username'];
    file_put_contents('./upload/' . $username .'.jpg', $array);
    $tmp = "./upload/" . $username . ".jpg";  
    $sql = "UPDATE `users` SET `head` = '$tmp' WHERE `username` = '$username' ";
    $r = mysqli_query($link, $sql);
	if (!$r) {
		die('Error: ' . mysqli_error($link));
	} else {
        echo '更換成功';
		echo "  <script>
                setTimeout(function(){window.location.href='index2.php';},500);
                </script>";

	}
?>

