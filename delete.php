<?php
require_once('config.php');
$no = $_GET['no'];
$sql2 = "select * from comment where no = '$no'";
$result = mysqli_query($link, $sql2);
$row = mysqli_fetch_assoc($result);
session_start();
if($row['username']==$_SESSION['username']){
    $sql = "delete from comment where no='$no'";
    mysqli_query($link, $sql);
    if (!mysqli_query($link, $sql)) {
    	die(mysqli_error());
    } else {
        echo '刪除成功';
	    echo "<script>
            setTimeout(function(){window.location.href='return.php';},300);
            </script>";
        }
}
else{
    echo '刪除失敗 非本人帳號';
    echo "  <script>
            setTimeout(function(){window.location.href='return.php';},300);
            </script>";
}

?>