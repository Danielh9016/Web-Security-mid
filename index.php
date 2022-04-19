<?php
unset($_SESSION['username']);
echo '這只是個期中留言板project沒什麼好看的 真的<br>';
?>

<form method="POST" action="login.php">
    <input id="username" placeholder="Username" required="" autofocus="" type="text" name="username">
    <br>
    <input id="password" placeholder="Password" required="" type="password" name="password">
    <br>
    <button  type="submit">登入</button>
</form>
<form method="POST" action="res.php">
    <button  type="submit">註冊</button>
</form>