<!DOCTYPE html>
<?php require_once("pdo_init.php"); ?>

<html>
<meta charset="utf-8">
<body>

<form action="post_login.php" method="post">
    <label for="username" >用户名: </label><input type="text" id="username" name="username" />
    <label for="password" >密码: </label><input type="password" id="password" name="password" />
    <input type="submit" value="登录" />
</form>

</body>
</html>