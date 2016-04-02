<?php
require_once("header.php");

$statement = $dbh->prepare("UPDATE categories SET category = :category, position = :position WHERE id = :id");
$statement->bindValue(":id", $_POST["id"]);
$statement->bindValue(":category", $_POST["category"]);
$statement->bindValue(":position", $_POST["position"]);
$statement->execute();
?>
<script>document.location = document.referrer;</script>

<?php require_once("footer.php"); ?>