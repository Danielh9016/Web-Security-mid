<?php
session_start();
if( !isset($_POST['username']) || !isset($_POST['password']) || $_POST['username']=="" || $_POST['password']=="" ){
    header("Location: index.php");
}
$username = $_POST['username'];
$_SESSION['username'] = $_POST['username'];
$password = $_POST['password'];

require_once('config.php');
$sql = "SELECT * FROM `users` WHERE `username` = '$username' and `password` = '$password';";

$result=mysqli_query($link,$sql);
mysqli_close($link);
try {
    $row = mysqli_fetch_array($result);   
    
    if($row ){
        $_SESSION['admin']=$row['admin'];
        echo "<script>
        setTimeout(function(){window.location.href='index2.php';},0);
        </script>";
    }else{
        echo "<script> alert('登入失敗');</script>";
        echo "<script>
        setTimeout(function(){window.location.href='index.php';},0);
        </script>";
    }
}
catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), '<br>';
    echo 'Check credentials in config file at: ', $Mysql_config_location, '\n';
}
?>