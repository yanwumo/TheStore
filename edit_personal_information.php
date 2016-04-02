<?php require_once("header.php"); ?>
<?php
$username = $_SESSION["username"];
$statement = $dbh->prepare("SELECT * FROM users WHERE name = :name");
$statement->bindParam(":name", $username);
$statement->execute();
?>

<!--
<div class="col-md-2">
</div>
-->
<div class="col-md-8">
    <form role="form" action="post_login.php" method="post">
        <div class="form-group">
            用户名: <?php echo $username; ?>
        </div>
        <div class="form-group">
            <label for="password">原密码</label>
            <input type="password" class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="new_password">新密码</label>
            <input type="password" class="form-control" id="new_password">
        </div>
        <div class="form-group">
            <label for="re_password">验证密码</label>
            <input type="password" class="form-control" id="re_password">
        </div>
        <button type="submit" class="btn btn-default">登录</button>
    </form>
</div>
<!--
<div class="col-md-2">
</div>
-->

<?php require_once("footer.php"); ?>