<?php require_once("header.php"); ?>

<?php
if (!isset($_POST["username"]) || !isset($_POST["password"]) || !isset($_POST["re_password"]) ||
    !isset($_POST["email"]) || !isset($_POST["phone"])) exit();

if ($_POST["username"] == "" || $_POST["password"] == "" || $_POST["re_password"] == "" || $_POST["email"] == "" || $_POST["phone"] == "") {
    echo "信息不完整";
    exit();
}

if ($_POST["password"] != $_POST["re_password"]) {
    echo "密码不一致";
    exit();
}

$username = $_POST["username"];
$password = md5($_POST["password"]);
$email = $_POST["email"];
$phone = $_POST["phone"];

$statement = $dbh->prepare("INSERT INTO users (name, password, email, phone) VALUES (:name, :password, :email, :phone)");
$statement->bindParam(":name", $username);
$statement->bindParam(":password", md5($password));
$statement->bindParam(":email", $email);
$statement->bindParam(":phone", $phone);

if ($statement->execute()) {
    echo "注册成功, 3s后自动返回. ";
    ?>
    <script type="text/javascript">
        setTimeout("window.location.href='index.php'", 3000);
    </script>
    <?php
} else {
    echo "用户名已存在. ";
    ?>
    <script type="text/javascript">
        setTimeout("window.history.back()", 3000);
    </script>
    <?php
}
?>

<?php require_once("footer.php"); ?>
