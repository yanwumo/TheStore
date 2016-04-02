<?php
require_once("header.php");
if (!isset($_SESSION["username"])) { ?>
    <script type="text/javascript">
        window.location.href='index.php';
    </script>
<?php } ?>

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
        $_SESSION["username"] = $username;
        $_SESSION["uid"] = $row["id"];
        echo "登录成功, 3s后自动返回. ";
        ?>
        <script type="text/javascript">
            setTimeout("window.location.href='index.php'", 3000);
        </script>
    <?php
    } else {
        echo "密码不正确, 请重试. ";
        ?>
        <script type="text/javascript">
            setTimeout("window.history.back()", 3000);
        </script>
    <?php
    }
} else {
    echo "用户不存在, 请重试. ";
}
?>

<?php require_once("footer.php"); ?>
