<?php
session_start();
if($_SESSION['username']=="" || $_SESSION['username']!="123"){
	header("Location: index.php");
}	
 echo "好我知道你是管理員了然後咧";
?>

<form method="POST" action="title.php">
    <input id="ti" placeholder="不然給你改個標題好了" required="" autofocus="" type="text" name="ti">
    <br>
    <button  type="submit">更改標題</button>
</form>

<form method="POST" action="return.php">
    <button  type="submit">返回</button>
</form>