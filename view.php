
<?php
require_once('config.php');
$no = $_GET['no'];
$sql3 = "select * from comment WHERE `no` = '$no'";
$result2 = mysqli_query($link, $sql3);

while ($row = mysqli_fetch_assoc($result2)) {
	$tmp =$row['username'];
	$sql4 = "select * from `users` where `username` = '$tmp'";
	$result4 = mysqli_query($link, $sql4);
	$row3 = mysqli_fetch_assoc($result4);
	echo '<img src='.$row3['head'].' width="50" height="50">';
	echo "<br>名字：" . $row['username'];
	$name = $row['username'];
	echo "<br>留言：" . nl2br($row['context']) . "<br>";
	if ($row['path'] != null) { 
		echo "附加檔案：";
		echo ' 
		<a href="upload/'. $row['path'] .'">'. $row['path'] .'<br></a>';
	}
	echo "Time：" . $row['datetime'] . "<br>";
	echo "<hr>";
}
echo "<br>";
?>

<form method="POST" action="return.php">
    <button  type="submit">返回</button>
</form>

