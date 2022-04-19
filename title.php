<?php
if( !isset($_POST['ti']) || $_POST['ti']=="" ){
    header("Location: index2.php");
}
$ti = $_POST['ti'];
require_once('config.php');
$sql = "UPDATE `title` SET `text`= '$ti'";
$result = mysqli_query($link, $sql);

if (!$result) {
    die('Error: ' . mysqli_error());
} else {
    echo '標題修改成功';
    echo "
        <script>
        setTimeout(function(){window.location.href='return.php';},1000);
        </script>";
}
?>