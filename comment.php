<?php session_start();
    if( !isset($_POST['context']) ||  $_POST['context']=="" ){
    header("Location: index2.php");
    }
    require_once('config.php');
	$context = $_POST['context'];
    $context = str_replace("[b]","<b>",$context);
    $context = str_replace("[/b]","</b>",$context);
    $context = str_replace("[i]","<i>",$context);
    $context = str_replace("[/i]","</i>",$context);
    $context = str_replace("[u]","<u>",$context);
    $context = str_replace("[/u]","</u>",$context);
    $context = str_replace("[img]","<img src=\"",$context);
    $context = str_replace("[/img]","\" width=\"50\" height=\"50\">",$context);
    $context = str_replace("[/color]","</span>",$context);
    $context = str_replace("[color=","<span style=\"color: ",$context);
    $context = str_replace("]",";\">",$context);
    
    $username = $_SESSION['username'];
    if( isset($_POST['context']) ||  $_POST['context'] != "" ){
        $filename = $_FILES['file']['name'];
        $filetype = $_FILES['file']['type'];
        $filesize = $_FILES['file']['size'];
        $filetmp  = $_FILES['file']['tmp_name'];
        $dest = "./upload/" . $_FILES['file']['name'];
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

