<?php
require_once("header.php");
?>

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
        $_SESSION["privilege"] = $row["privilege"];
        echo "登錄成功, 3s後自動返回. ";
        ?>
        <script type="text/javascript">
            setTimeout("window.location.href='index.php'", 3000);
        </script>
    <?php
    } else {
        echo "密碼不正確, 請重試. ";
        ?>
        <script type="text/javascript">
            setTimeout("window.history.back()", 3000);
        </script>
    <?php
    }
} else {
    echo "用戶不存在, 請重試. ";
    ?>
    <script type="text/javascript">
        setTimeout("window.history.back()", 3000);
    </script>
    <?php
}
?>

<?php require_once("footer.php"); ?>
