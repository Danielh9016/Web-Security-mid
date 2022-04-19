<?php
echo '你最好是輸入一個沒有人註冊過的帳號喔';
?>

<form method="POST" action="register.php">

    <input id="username" placeholder="Username" required="" autofocus="" type="text" name="username">
    <input id="password" placeholder="Password" required="" type="password" name="password">
    <button  type="submit">註冊</button>
</form>