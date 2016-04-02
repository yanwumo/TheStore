<?php
require_once("pdo_init.php");

$title = $_POST["title"];
$content = $_POST["content"];
$post_id = $_POST["post_id"];
$facebook_name = $_POST["facebook_name"];
$picture = $_POST["picture"];
$price = $_POST["price"];
$facebook_id = $_POST["facebook_id"];

$statement = $dbh->prepare("INSERT INTO facebook_items (title, content, post_id, facebook_name, picture, price, facebook_id) VALUES (:title, :content, :post_id, :facebook_name, :picture, :price, :facebook_id)");
$statement->bindValue(":title", $title);
$statement->bindValue(":content", $content);
$statement->bindValue(":post_id", $post_id);
$statement->bindValue(":facebook_name", $facebook_name);
$statement->bindValue(":picture", $picture);
$statement->bindValue(":price", $price);
$statement->bindValue(":facebook_id", $facebook_id);
$statement->execute();