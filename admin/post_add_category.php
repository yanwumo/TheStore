<?php
require_once("header.php");

$statement = $dbh->prepare("INSERT INTO categories (category, position) VALUES (:category, :position)");
$statement->bindValue(":category", $_POST["category"]);
$statement->bindValue(":position", $_POST["position"]);
$statement->execute();
?>
<script>document.location = document.referrer;</script>

<?php require_once("footer.php"); ?>