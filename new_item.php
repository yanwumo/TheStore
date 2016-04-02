<?php require_once("header.php"); ?>

    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <form role="form" action="post_edit_personal_information.php" method="post">

            <div class="form-group">
                <label for="title">物品名稱</label>
                <input type="text" class="form-control" id="title" name="title" >
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

            <button type="submit" class="btn btn-default">確認</button>
        </form>
    </div>
    <div class="col-md-2">
    </div>

<?php require_once("footer.php"); ?>