<?php require_once("header.php"); ?>

    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <form role="form" action="post_register.php" method="post">
            <div class="form-group">
                <label for="name">姓名</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="password">密码</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="re_password">確認密码</label>
                <input type="password" class="form-control" id="re_password" name="re_password">
            </div>
            <div class="form-group">
                <label for="email">電子信箱</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="phone">電話</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <!--
            <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" class="form-control" id="facebook" name="facebook">
            </div>
            -->

            <button type="submit" class="btn btn-default">註冊</button>
        </form>
    </div>
    <div class="col-md-2">
    </div>

<?php require_once("footer.php"); ?>