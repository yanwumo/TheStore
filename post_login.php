<?php require_once("pdo_init.php"); ?>

<!DOCTYPE html>

<html>
<meta charset="utf-8">
<meta http-equiv="refresh" content="5;url=index.php">
<body>

<?php
if (!isset($_POST["username"]) || !isset($_POST["password"])) exit();

$username = $_POST["username"];
$password = md5($_POST["password"]);

$statement = $dbh->prepare("SELECT * FROM users WHERE name = :name");
$statement->bindParam(":name", $username);
$statement->execute();

if ($row = $statement->fetch()) {
    if ($row["password"] == $password) {
        // Password check correct
        session_start();
        $_SESSION["username"] = $username;
        echo "登录成功. ";
    } else {
        echo "密码不正确, 请重试. ";
    }
} else {
    echo "用户不存在, 请重试. ";
}
?>

</body>
</html>