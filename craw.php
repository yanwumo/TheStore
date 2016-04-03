<?php
require_once("pdo_init.php");

$content = $_POST["content"];
$post_id = $_POST["post_id"];
$facebook_name = $_POST["facebook_name"];
$picture = $_POST["picture"];
$facebook_id = $_POST["facebook_id"];

$temp = strstr($content, "物品標價", true);
$temp = strstr($temp, "物品名稱");
if (strstr($temp, "物品名稱：")) $temp = substr($temp, strlen("物品名稱："));
else if (strstr($temp, "物品名稱: ")) $temp = substr($temp, strlen("物品名稱: "));
else if (strstr($temp, "物品名稱:")) $temp = substr($temp, strlen("物品名稱:"));
$title = substr($temp, 0, strrpos($temp, "\n"));

$temp = strstr($content, "數量", true);
$temp = strstr($temp, "淡江師生優惠價");
if (strstr($temp, "淡江師生優惠價：")) $temp = substr($temp, strlen("淡江師生優惠價："));
else if (strstr($temp, "淡江師生優惠價: ")) $temp = substr($temp, strlen("淡江師生優惠價: "));
else if (strstr($temp, "淡江師生優惠價:")) $temp = substr($temp, strlen("淡江師生優惠價:"));
$price = substr($temp, 0, strrpos($temp, "\n"));

$statement = $dbh->prepare("INSERT INTO facebook_items (title, content, post_id, facebook_name, picture, price, facebook_id) VALUES (:title, :content, :post_id, :facebook_name, :picture, :price, :facebook_id)");
$statement->bindValue(":title", $title);
$statement->bindValue(":content", $content);
$statement->bindValue(":post_id", $post_id);
$statement->bindValue(":facebook_name", $facebook_name);
$statement->bindValue(":picture", $picture);
$statement->bindValue(":price", $price);
$statement->bindValue(":facebook_id", $facebook_id);
$statement->execute();