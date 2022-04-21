<?php

if( !isset($_POST['username']) || !isset($_POST['password']) || $_POST['username']=="" || $_POST['password']=="" ){
    header("Location: res.php");
}
$username = $_POST['username'];
$password = $_POST['password'];

require_once('config.php');
$sql = "SELECT * FROM `users` WHERE `username` = '$username';";

$result=mysqli_query($link,$sql);
try {
    $row = mysqli_fetch_array($result);   
    if(!$row ){
        $sql2 = "insert users(id,username,password,admin) values (null,'$username','$password',0)";
		mysqli_query($link, $sql2);
        mysqli_close($link);
        if (!$result) {
            die('Error: ' . mysqli_error());
        } else {
            echo '<div class="success">註冊成功</div>';
            echo "
                <script>
                setTimeout(function(){window.location.href='index.php';},1000);
                </script>";
        }
    }else{
        echo '<div class="warning">帳號已註冊過</div>';
			echo "
                <script>
                setTimeout(function(){window.location.href='index.php';},1000);
                </script>";
    }
}
catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), '<br>';
    echo 'Check credentials in config file at: ', $Mysql_config_location, '\n';
}
?>