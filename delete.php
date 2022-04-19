<?php
require_once('config.php');
$no = $_GET['no'];
$sql = "delete from comment where no='$no'";
session_start();
mysqli_query($link, $sql);
if (!mysqli_query($link, $sql)) {
	die(mysqli_error());
} else {
    echo '刪除成功';
	echo "
         <script>
            setTimeout(function(){window.location.href='return.php';},300);
        </script>";

}
?>