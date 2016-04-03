<?php
require_once("header.php");
if (!isset($_SESSION["username"])) { ?>
    <script type="text/javascript">
        window.location.href='index.php';
    </script>
<?php } ?>

<?php
if (!isset($_GET["postid"]) || !isset($_POST["content"])) exit();

if ($_POST["content"] == "") {
    echo "信息不完整";
    ?>
    <script type="text/javascript">
        setTimeout("window.history.back()", 3000);
    </script>
    <?php
    exit();
}


$statement = $dbh->prepare("INSERT INTO replies (post_id, uid, content) VALUES (:post_id, :uid, :content)");
$statement->bindParam(":post_id", $_GET["postid"]);
$statement->bindParam(":uid", $_SESSION["uid"]);
$statement->bindParam(":content", $_POST["content"]);

if ($statement->execute()) {
    echo "发布成功, 3s后自动返回. ";
    ?>
    <script type="text/javascript">
        setTimeout("document.location = document.referrer", 3000);
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
