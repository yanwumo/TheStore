<?php require_once("pdo_init.php"); ?>

<!DOCTYPE html>

<html>
<meta charset="utf-8">
<meta http-equiv="refresh" content="3;url=index.php">
<body>

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

$statement = $dbh->prepare("INSERT INTO items (title, price, quantity, shipping_type, shipping_price, transaction_place, other, uid, post_time, picture) VALUES (:title, :price, :quantity, :shipping_type, :shipping_price, :transaction_place, :other, :uid, NOW(), :picture)");
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

if ($statement->execute()) {
    echo "发布成功, 3s后自动返回. ";
} else {
    echo "错误, 请检查. ";
}
?>

</body>
</html>