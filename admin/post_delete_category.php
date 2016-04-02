<?php
require_once("header.php");

$statement = $dbh->prepare("DELETE FROM category WHERE id = :id");
$statement->bindValue(":id", $_GET["id"]);
$statement->execute();

?>
<script>document.location = document.referrer;</script>

<?php require_once("footer.php"); ?>