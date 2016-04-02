<?php
require_once("header.php");
if (!isset($_SESSION["username"])) { ?>
    <script type="text/javascript">
        window.location.href='index.php';
    </script>
<?php } ?>

<?php
if (!isset($_POST["password"]) || !isset($_POST["new_password"]) ||
    !isset($_POST["re_password"]) || !isset($_POST["email"]) ||
    !isset($_POST["phone"]) || !isset($_POST["facebook"])) exit();

$username = $_SESSION["username"];
$statement = $dbh->prepare("SELECT * FROM users WHERE name = :name");
$statement->bindParam(":name", $username);
$statement->execute();
$row = $statement->fetch();


if ($_POST["password"] == "") {
    echo "修改个人资料前请先验证密码.";
    ?>
    <script type="text/javascript">
        setTimeout("window.history.back()", 3000);
    </script>
    <?php
    exit();
}
if (md5($_POST["password"]) != $row["password"]) {
    echo "旧密码错误";
    ?>
    <script type="text/javascript">
        setTimeout("window.history.back()", 3000);
    </script>
    <?php
    exit();
}
if ($_POST["new_password"] != $_POST["re_password"]) {
    echo "密码不一致";
    ?>
    <script type="text/javascript">
        setTimeout("window.history.back()", 3000);
    </script>
    <?php
    exit();
}
if ($_POST["email"] == "" || $_POST["phone"] == "") {
    echo "信息不完整";
    ?>
    <script type="text/javascript">
        setTimeout("window.history.back()", 3000);
    </script>
    <?php
    exit();
}

$statement = $dbh->prepare("UPDATE users SET password = :password, email = :email, phone = :phone, facebook_homepage = :facebook WHERE name = :name");
$statement->bindParam(":name", $username);
if ($_POST["new_password"] == "") {
    $statement->bindParam(":password", $row["password"]);
} else {
    $statement->bindParam(":password", md5($_POST["new_password"]));
}
$statement->bindParam(":email", $_POST["email"]);
$statement->bindParam(":phone", $_POST["phone"]);
$statement->bindParam(":facebook", $_POST["facebook"]);
if ($statement->execute()) {
    echo "修改个人资料成功";
    ?>
    <script type="text/javascript">
        setTimeout("window.location.href='my.php'", 3000);
    </script>
    <?php
} else {
    echo "错误, 请检查. ";
    ?>
    <script type="text/javascript">
        setTimeout("window.history.back()", 3000);
    </script>
    <?php
}
?>

<?php require_once("footer.php"); ?>