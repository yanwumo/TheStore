<?php
require_once("header.php");
if (!isset($_SESSION["username"])) { ?>
    <script type="text/javascript">
        window.location.href='index.php';
    </script>
<?php } ?>

    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <form role="form" action="post_new_item.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="title">商品名稱</label>
                <input type="text" class="form-control" id="title" name="title" >
            </div>
            <div class="form-group">
                <label for="category">商品分類</label>
                <select class="form-control" id="category" name="category">
                    <option value="">----</option>
                    <?php
                    $statement = $dbh->prepare("SELECT * FROM categories ORDER BY position");
                    $statement->execute();
                    while ($row = $statement->fetch()) {
                        echo '<option value="' . $row["id"] . '">' . $row["category"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="price">商品價格</label>
                <input type="text" class="form-control" id="price" name="price" >
            </div>
            <div class="form-group">
                <label for="quantity">商品數量</label>
                <input type="text" class="form-control" id="quantity" name="quantity" >
            </div>
            <div class="form-group">
                <label for="shipping_type">運輸方式</label>
                <input type="text" class="form-control" id="shipping_type" name="shipping_type">
            </div>
            <div class="form-group">
                <label for="shipping_price">運費</label>
                <input type="text" class="form-control" id="shipping_price" name="shipping_price">
            </div>
            <div class="form-group">
                <label for="transaction_place">交易地點</label>
                <input type="text" class="form-control" id="transaction_place" name="transaction_place">
            </div>
            <div class="form-group">
                <label for="other">其它</label>
                <textarea id="other" name="other" rows="10" cols="40"></textarea>
            </div>
            <div class="form-group">
                <label for="file">
                    File input
                </label>
                <input type="file" id="file" name="file" />
                <p class="help-block">
                    仅限png, jpg, 2MB以内
                </p>
            </div>

            <button type="submit" class="btn btn-default">確認</button>
        </form>
    </div>
    <div class="col-md-2">
    </div>

<?php require_once("footer.php"); ?>