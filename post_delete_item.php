<?php
require_once("header.php");

$statement = $dbh->prepare("SELECT uid FROM items WHERE id = :id");
$statement->bindValue(":id", $_GET["id"]);
$statement->execute();
$row = $statement->fetch();
if ($row["uid"] != $_SESSION["uid"]) exit();

$statement = $dbh->prepare("DELETE FROM items WHERE id = :id");
$statement->bindValue(":id", $_GET["id"]);
$statement->execute();
/*
$sql = "DELETE FROM items WHERE id = :id";
$sth = $dbh->prepare($sql);
$sth->execute(array($_GET['id']));
$sql = "DELETE FROM collection WHERE gid = ?";
$sth = $dbh->prepare($sql);
$sth->execute(array($_GET['id']));
$sql = "DELETE FROM message WHERE goods = ?";
$sth = $dbh->prepare($sql);
$sth->execute(array($_GET['id']));
$sql = "DELETE FROM comment WHERE gid = ?";
$sth = $dbh->prepare($sql);
$sth->execute(array($_GET['id']));

$time = date("Y-m-d");
$sql = "SELECT * FROM system WHERE time = ?";
$sth = $dbh->prepare($sql);
$sth->execute(array($time));

if ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
    $sql = "update system set goodsno = goodsno - 1 where time = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($time));
} else {
    $sql = "select count(*) from users";
    $sth = $dbh->prepare($sql);
    $sth->execute(array());
    $userno = $sth->fetch(PDO::FETCH_ASSOC);
    $sql = "select count(*) from goods where valid = 1";
    $sth = $dbh->prepare($sql);
    $sth->execute(array());
    $goodsno = $sth->fetch(PDO::FETCH_ASSOC);
    $user=$userno['count(*)'];
    $goods=$goodsno['count(*)'];
    $sql = "insert into system (time,userno,goodsno,soldno) VALUES (?,?,?,1)";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($time,$user,$goods));
}
*/
?>
<script>document.location = document.referrer;</script>
<?php require_once("footer.php"); ?>