<?php
require_once("header.php");
if (!isset($_SESSION["username"])) {
    ?>
    <script type="text/javascript">
        window.location.href='index.php';
    </script>
<?php
}

if ($_FILES["file"]["type"] == "image/png" || $_FILES["file"]["type"] == "image/jpeg" ||
$_FILES["file"]["type"] == "image/pjpeg") {
    if ($_FILES["file"]["size"] > 2048000) {
    echo "文件大小超过限制";
    ?>
    <script type="text/javascript">
        setTimeout("window.history.back()", 3000);
    </script>
    <?php
    exit();
    }
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"];
        ?>
        <script type="text/javascript">
            setTimeout("window.history.back()", 3000);
        </script>
        <?php
        exit();
    } else {
        $destination_filename = $_SESSION["uid"] . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["file"]["tmp_name"], "img_avatars/" . $destination_filename);
        $statement = $dbh->prepare("UPDATE users SET avatar = :avatar WHERE id = :id");
        $statement->bindParam(":avatar", $destination_filename);
        $statement->bindParam(":id", $_SESSION["uid"]);
        $statement->execute();
        echo "头像上传成功, 3s后自动返回. ";
        ?>
        <script type="text/javascript">
            setTimeout("window.location.href='my.php'", 3000);
        </script>
        <?php
    }
}

require_once("footer.php");
?>
