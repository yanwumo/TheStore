<?php
if (!isset($_GET['id'])) exit();
require_once("header.php");

$statement = $dbh->prepare("SELECT * FROM items WHERE id = :id");
$statement->bindParam(":id", $_GET['id']);
$statement->execute();
$row = $statement->fetch();
?>

<div class="col-md-2">
</div>
<div class="col-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <img src="img_items/<?php echo $row["picture"]; ?>" class="img-thumbnail" />
            </div>
            <div class="col-md-7">
                <div class="list-group">
                    <div class="list-group-item">
                        物品名稱: <?php echo $row["title"]; ?>
                    </div>
                    <div class="list-group-item">
                        聯絡方式: <?php echo $row["facebook"]; ?>
                    </div>
                    <div class="list-group-item">
                        商品價格: <?php echo $row["price"]; ?>
                    </div>
                    <div class="list-group-item">
                        商品數量: <?php echo $row["quantity"]; ?>
                    </div>
                    <div class="list-group-item">
                        運輸方式: <?php echo $row["shipping_type"]; ?>
                    </div>
                    <div class="list-group-item">
                        運費: <?php echo $row["shipping_price"]; ?>
                    </div>
                    <div class="list-group-item">
                        交易地點: <?php echo $row["transaction_place"]; ?>
                    </div>
                    <div class="list-group-item">
                        發表時間: <?php echo $row["post_time"]; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>
                    <?php echo nl2br($row["other"]); ?>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="list-group">
                <?php
                $statement = $dbh->prepare("SELECT (SELECT name FROM users WHERE users.id = uid) AS name, content FROM replies WHERE post_id = :id");
                $statement->bindValue(":id", $_GET['id']);
                $statement->execute();
                while ($row = $statement->fetch()) {
                    ?>
                    <div class="list-group-item">
                        <?php echo $row["name"]; ?>: <?php echo $row["content"]; ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="row">
            <form role="form" action="post_reply.php?postid=<?php echo $_GET['id']; ?>" method="post">
                <div class="form-group">
                    <p><label for="content">回應</label></p>
                    <textarea id="content" name="content" rows="10" cols="80"></textarea>
                </div>
                <button type="submit" class="btn btn-default">確認</button>
            </form>
        </div>
    </div>
</div>
<div class="col-md-2">
</div>





<?php require_once("footer.php"); ?>