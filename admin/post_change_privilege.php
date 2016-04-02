<?php
require_once("header.php");

$statement = $dbh->prepare("UPDATE users SET privilege = :privilege WHERE id = :id");
$statement->bindValue(":privilege", $_GET['privilege']);
$statement->bindValue(":id", $_GET['id']);
$statement->execute();
?>
<script>document.location = document.referrer;</script>
<?php
require_once("footer.php");
?>