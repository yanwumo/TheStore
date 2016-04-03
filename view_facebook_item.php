<?php
if (!isset($_GET['id'])) exit();
require_once("header.php");

$statement = $dbh->prepare("SELECT * FROM facebook_items WHERE id = :id");
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
                    <img style="width: 80%; height: auto;" src="<?php echo $row["picture"]; ?>" class="img-thumbnail" />
                </div>
                <div class="col-md-7">
                    <div class="list-group">
                        <div class="list-group-item">
                            物品名稱: <?php echo $row["title"]; ?>
                        </div>
                        <div class="list-group-item">
                            聯絡方式: <?php echo $row["facebook_id"]; ?>
                        </div>
                        <div class="list-group-item">
                            商品價格: <?php echo $row["price"]; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?php echo nl2br($row["content"]); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
    </div>





<?php require_once("footer.php"); ?>