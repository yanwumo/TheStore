<?php
require_once("pdo_init.php");

$createtime = date("Y-m-d H:i:s" ,strtotime( $_POST["createtime"] ));

$statement = $dbh->prepare("INSERT INTO items (title, price, quantity, shipping_type, shipping_price, transaction_place, other, uid, post_time, picture, category_id) VALUES (:title, :price, :quantity, :shipping_type, :shipping_price, :transaction_place, :other, 0, :post_time, :picture, -1)");
$statement->bindValue(":title", $_POST["title"]);
$statement->bindValue(":price", $_POST["price"]);
$statement->bindValue(":quantity", $_POST["quantity"]);
$statement->bindValue(":shipping_type", $_POST["shipping_type"]);
$statement->bindValue(":shipping_price", $_POST["shipping_price"]);
$statement->bindValue(":transaction_place", $_POST["transaction_place"]);
$statement->bindValue(":other", $_POST["other"]);
$statement->bindValue(":post_time", $createtime);
$statement->bindValue(":picture", $_POST["picture"]);
$statement->execute();