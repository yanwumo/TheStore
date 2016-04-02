<?php require_once("header.php"); ?>
<?php
$username = $_SESSION["username"];
$statement = $dbh->prepare("SELECT * FROM users WHERE name = :name");
$statement->bindParam(":name", $username);
$statement->execute();
?>

<div class="col-md-2">
</div>
<div class="col-md-8">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li <?php if (!isset($_GET["page"]) || $_GET["page"] == 1) echo 'class="active"'; ?>>
                    <a href="my.php?page=1">個人資料</a>
                </li>
                <li <?php if (isset($_GET["page"]) && $_GET["page"] == 2) echo 'class="active"'; ?>>
                    <a href="my.php?page=2">修改資料</a>
                </li>
                <li <?php if (isset($_GET["page"]) && $_GET["page"] == 3) echo 'class="active"'; ?>>
                    <a href="my.php?page=3">修改頭像</a>
                </li>

            </ul>
            <?php if (!isset($_GET["page"]) || $_GET["page"] == 1) { ?>

                <div class="list-group">
                    <div class="list-group-item">
                        姓名
                    </div>
                    <div class="list-group-item">
                        電話
                    </div>
                    <div class="list-group-item">
                        電子信箱
                    </div>
                    <div class="list-group-item">
                       facebook
                    </div>

                </div>


            <?php } else if ($_GET["page"] == 2) { ?>
                <form role="form" action="post_login.php" method="post">
                    <div class="form-group">
                        用户名: <?php echo $username; ?>
                    </div>
                    <div class="form-group">
                        <label for="email">電子信箱</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">電話</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook">
                    </div>
                    <div class="form-group">
                        <label for="password">舊密碼</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="new_password">新密碼</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>
                    <div class="form-group">
                        <label for="re_password">確認密碼</label>
                        <input type="password" class="form-control" id="re_password" name="re_password">
                    </div>
                    <button type="submit" class="btn btn-default">確認</button>
                </form>


            <?php } else if ($_GET["page"] == 3) { ?>

            <?php } ?>
        </div>
    </div>

</div>
<div class="col-md-2">
</div>

<?php require_once("footer.php"); ?>