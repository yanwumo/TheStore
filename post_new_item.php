<?php
require_once("header.php");
if (!isset($_SESSION["username"])) { ?>
    <script type="text/javascript">
        window.location.href='index.php';
    </script>
<?php } ?>

<?php
if (!isset($_POST["title"]) || !isset($_POST["price"]) || 
    !isset($_POST["quantity"]) || !isset($_POST["shipping_type"]) ||
    !isset($_POST["shipping_price"]) || !isset($_POST["transaction_place"]) ||
    !isset($_POST["other"])) exit();

if ($_POST["title"] == "" || $_POST["price"] == "" ||
    $_POST["quantity"] == "" || $_POST["shipping_type"] == "" ||
    $_POST["shipping_price"] == "" || $_POST["transaction_place"] == "") {
    echo "信息不完整";
    ?>
    <script type="text/javascript">
        setTimeout("window.history.back()", 3000);
    </script>
    <?php
    exit();
}

// File upload BEGIN
$file_uploaded = false;
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
        $file_uploaded = true;
    }
}
// File upload END

$statement = $dbh->prepare("INSERT INTO items (title, price, quantity, shipping_type, shipping_price, transaction_place, other, uid, post_time, category_id) VALUES (:title, :price, :quantity, :shipping_type, :shipping_price, :transaction_place, :other, :uid, NOW(), :category_id)");
$statement->bindParam(":title", $_POST["title"]);
$statement->bindParam(":price", $_POST["price"]);
$statement->bindParam(":quantity", $_POST["quantity"]);
$statement->bindParam(":shipping_type", $_POST["shipping_type"]);
$statement->bindParam(":shipping_price", $_POST["shipping_price"]);
$statement->bindParam(":transaction_place", $_POST["transaction_place"]);
$statement->bindParam(":other", $_POST["other"]);
$statement->bindParam(":uid", $_SESSION["uid"]);
$str_empty = "0";
$statement->bindParam(":category_id", $str_empty); //temp

if ($statement->execute()) {
    if ($file_uploaded) {
        $statement = $dbh->prepare("SELECT LAST_INSERT_ID()");
        $statement->execute();
        $row = $statement->fetch();
        $destination_filename = $row["LAST_INSERT_ID()"] . "." . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["file"]["tmp_name"], "img_items/" . $destination_filename);
        $statement = $dbh->prepare("UPDATE items SET picture = :picture WHERE id = :id");
        $statement->bindParam(":picture", $destination_filename);
        $statement->bindParam(":id", $row["LAST_INSERT_ID()"]);
        $statement->execute();
    }

    echo "发布成功, 3s后自动返回. ";
    ?>
    <script type="text/javascript">
        setTimeout("window.location.href='index.php'", 3000);
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
