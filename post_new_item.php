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
    exit();
}

$statement = $dbh->prepare("INSERT INTO items (title, price, quantity, shipping_type, shipping_price, transaction_place, other, uid, post_time, picture, category_id) VALUES (:title, :price, :quantity, :shipping_type, :shipping_price, :transaction_place, :other, :uid, NOW(), :picture, :category_id)");
$statement->bindParam(":title", $_POST["title"]);
$statement->bindParam(":price", $_POST["price"]);
$statement->bindParam(":quantity", $_POST["quantity"]);
$statement->bindParam(":shipping_type", $_POST["shipping_type"]);
$statement->bindParam(":shipping_price", $_POST["shipping_price"]);
$statement->bindParam(":transaction_place", $_POST["transaction_place"]);
$statement->bindParam(":other", $_POST["other"]);
$statement->bindParam(":uid", $_SESSION["uid"]);
$str_empty = "";
$statement->bindParam(":picture", $str_empty); //temp
$str_empty = "0";
$statement->bindParam(":category_id", $str_empty); //temp

if ($statement->execute()) {
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
