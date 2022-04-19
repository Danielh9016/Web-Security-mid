<?php  
session_start();
if($_SESSION['username']==""){
	header("Location: index.php");
}	

require_once('config.php');
$username = $_SESSION['username'];
$sql = "select * from title";
$result = mysqli_query($link, $sql);
while ($row = mysqli_fetch_assoc($result)) {
	echo "<b>" . nl2br($row['text']) . "</b>    <br>";
}

echo "登入帳號：" . $username;
$sql2="select * from `users` where `username` = '$username'";
            
$result2 = mysqli_query($link, $sql2);      
$row2 = mysqli_fetch_assoc($result2);
?>

<img src="<?php echo $row2['head'];?>" width="50" height="50">

<form method="POST" action="index.php">
    <button  type="submit">登出</button>
</form>


<form method="POST" enctype="multipart/form-data" action="head.php">
	<p>選擇大頭貼
	<input type="file" name="file">
    <button  type="submit">上傳圖片</button></p>
</form>
<form method="POST" action="url.php">
	<input id="url" placeholder="或是從網址上傳" required="" autofocus="" type="text" name="url">
    <button  type="submit">上傳網址</button>
</form>

<form method="POST" enctype="multipart/form-data" action="comment.php">
<p> 
    <textarea name="context" id="context" rows="4" cols="25">不然就留個言吧</textarea>
	<input type="button" value="粗" onclick="bold()">
	<input type="button" value="斜" onclick="italic()">
	<input type="button" value="底" onclick="under()">
	<input type="button" value="圖" onclick="img()">
	<input type="button" value="色" onclick="color()">
  </p>
<input type="file" name="file">  
    <br>
    <button  type="submit">留言</button>
</form>
<script>
function bold() {
            var x = document.getElementById('context');
            x.value = "[b]" + x.value + "[/b]";
        }
function italic() {
            var x = document.getElementById('context');
            x.value = "[i]" + x.value + "[/i]";
        }
function under() {
            var x = document.getElementById('context');
            x.value = "[u]" + x.value + "[/u]";
        }
function img() {
            var x = document.getElementById('context');
            x.value = "[img]" + x.value + "[/img]";
        }
function color() {
            var x = document.getElementById('context');
            x.value = "[color=#FF0000]" + x.value + "[/color]";
    	}
</script>
<?php 
    
$sql3 = "select * from comment";
$result3 = mysqli_query($link, $sql3);


if($username == '123'){
	echo ' 
		<a href="admin.php">你的身分是管理員，你可以點進來</a><br>';
}
while ($row = mysqli_fetch_assoc($result3)) {
	$tmp = $row['username'];
	$sql4 = "select * from `users` where `username` = '$tmp'";
	$result4 = mysqli_query($link, $sql4);
	$row3 = mysqli_fetch_assoc($result4);
	echo "<img src= " . $row3['head'] . " width=\"50\" height=\"50\">";
	echo "<br>名字：" . $row['username'];
	echo "<br>留言：" . nl2br($row['context']) . "<br>";
	if ($row['path'] != null) { 
		echo "附加檔案：";
		echo ' 
		<a href="upload/'. $row['path'] .'">'. $row['path'] .'<br></a>';
	}
	if ($username == $row['username']) { 
		echo ' 
		<a href="delete.php?no=' . $row['no'] . '">刪除</a>';
	}
	echo ' 
		<a href="view.php?no=' . $row['no'] . '">單獨顯示</a><br>';
	echo "Time：" . $row['datetime'] . "<br>";
	echo "<hr>";

}
echo "<br>";
echo '<div class="bottom left position-abs content">';
echo "總共有" . mysqli_num_rows($result3) . "則留言";
?>

