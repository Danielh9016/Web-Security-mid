<?php session_start();
    if( !isset($_POST['context']) ||  $_POST['context']=="" ){
    header("Location: index2.php");
    }
    require_once('config.php');
	$context = $_POST['context'];
    $context = str_replace("<","",$context);
    $context = str_replace(">","",$context);
    $context = str_replace("'","",$context);
    $context = str_replace("\"","",$context);
    $context = str_replace("\\","",$context);
    $username = $_SESSION['username'];
    if( isset($_POST['context']) ||  $_POST['context'] != "" ){
        $filename = $_FILES['file']['name'];
        $filetype = $_FILES['file']['type'];
        $filesize = $_FILES['file']['size'];
        $filetmp  = $_FILES['file']['tmp_name'];
        $dest = "./upload/file/" . $_FILES['file']['name'];
        move_uploaded_file($filetmp, $dest);
        $sql4 = "INSERT comment(no, username, context, datetime, path) VALUES (null, '$username', '$context', now(), '$filename')";
     }
    else{
         $sql4 = "INSERT comment(no, username, context, datetime, path) VALUES (null, '$username', '$context', now(), null)";
    }
    $r = mysqli_query($link, $sql4);
	if (!$r) {
		die('Error: ' . mysqli_error($link));
	} else {
        echo '留言成功';
		echo "  <script>
                setTimeout(function(){window.location.href='index2.php';},500);
                </script>";

	}
?>

