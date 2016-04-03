<?php require_once("header.php"); ?>
<?php
$page = isset($_GET["page"]) && $_GET["page"] >= 1 ? $_GET["page"] : 1;

$statement = $dbh->prepare("SELECT COUNT(*) FROM facebook_items");

$statement->execute();
$row = $statement->fetch();
$items_per_page = 12;
$total_items = $row["COUNT(*)"];
$total_page = ceil($total_items / $items_per_page);
if ($total_page == 0) $total_page = 1;
$lower_bound = ($page - 1) * $items_per_page;
if ($total_page > 9) {
    $need = true;
    $need_left = false;
    $need_right = false;
    if ($page >= 5) {
        $need_left = true;
        $left_bound = $total_page - 5;
    }
    if ($page <= $total_page - 4) {
        $need_right = true;
        $right_bound = 6;
    }
} else {
    $need = false;
}
?>

    <div class="col-md-2">
        <div class="list-group">
            <?php
            echo '<a href="index.php?category=-1" class="list-group-item active">From Facebook</a>';
            // All items
            echo '<a href="index.php" class="list-group-item">所有分类</a>';

            // Categories
            $statement = $dbh->prepare("SELECT * FROM categories ORDER BY position");
            $statement->execute();
            while ($row = $statement->fetch()) {
                echo '<a href="index.php?category=' . $row["id"] . '" class="list-group-item">' . $row["category"] . '</a>';
            }
            ?>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <?php
            $statement = $dbh->prepare("SELECT * FROM facebook_items ORDER BY id DESC LIMIT $lower_bound, $items_per_page");
            $statement->execute();
            while ($row = $statement->fetch()) {
                ?>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img style="width: auto; height: 200px;" src="<?php echo $row["picture"]; ?>" />
                        <div class="caption">
                            <h3 class="text-overflow"><?php echo $row["title"]; ?>&nbsp;</h3>
                            <p>&nbsp;</p>
                            <p><a class="btn btn-primary" href="view_item.php?id=<?php echo $row["id"]; ?>">查看详情</a></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="pagination">
                    <!-- Prev Page -->
                    <?php if ($page == 1) { ?>
                        <li class="disabled">
                            <a>&laquo;</a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href="<?php substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1); ?>?page=<?php echo $page - 1; ?>">&laquo;</a>
                        </li>
                    <?php } ?>

                    <!-- Pages -->
                    <?php
                    if (!$need) {
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($i != $page) {
                                ?>
                                <li>
                                    <a href="<?php substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1); ?>?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="active">
                                    <a><?php echo "$i"; ?></a>
                                </li>
                                <?php
                            }
                        }
                    } else {
                        if ($need_left && !$need_right) {
                            ?>
                            <li>
                                <a href="<?php substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1); ?>?page=1&category=<?php echo $category; ?>"><?php echo "1..."; ?></a>
                            </li>
                            <?php
                            for ($i = $left_bound; $i <= $total_page; $i++) {
                                if ($i != $page) {
                                    ?>
                                    <li>
                                        <a href="<?php substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1); ?>?page=<?php echo $i; ?>&category=<?php echo $category; ?>"><?php echo $i; ?></a>
                                    </li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="active">
                                        <a><?php echo "$i"; ?></a>
                                    </li>
                                    <?php
                                }
                            }
                        } else if (!$need_left && $need_right) {
                            for ($i = 1; $i <= $right_bound; $i++) {
                                if ($i != $page) {
                                    ?>
                                    <li>
                                        <a href="<?php substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1); ?>?page=<?php echo $i; ?>&category=<?php echo $category; ?>"><?php echo $i; ?></a>
                                    </li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="active">
                                        <a><?php echo "$i"; ?></a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            <li>
                                <a href="<?php substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1); ?>?page=<?php echo $total_page; ?>&category=<?php echo $category; ?>"><?php echo "...$total_page"; ?></a>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li>
                                <a href="<?php substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1); ?>?page=1&category=<?php echo $category; ?>"><?php echo "1..."; ?></a>
                            </li>
                            <?php
                            for ($i = $page - 2; $i <= $page + 2; $i++) {
                                if ($i != $page) {
                                    ?>
                                    <li>
                                        <a href="<?php substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1); ?>?page=<?php echo $i; ?>&category=<?php echo $category; ?>"><?php echo $i; ?></a>
                                    </li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="active">
                                        <a><?php echo "$i"; ?></a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            <li>
                                <a href="<?php substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1); ?>?page=<?php echo $total_page; ?>&category=<?php echo $category; ?>"><?php echo "...$total_page"; ?></a>
                            </li>
                            <?php
                        }
                    }
                    ?>

                    <!-- Next Page -->
                    <?php if ($page < $total_page) { ?>
                        <li>
                            <a href="<?php substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1); ?>?page=<?php echo $page + 1; ?>&category=<?php echo $category; ?>">&raquo;</a>
                        </li>
                    <?php } else { ?>
                        <li class="disabled">
                            <a>&raquo;</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <?php if (isset($_SESSION["username"])) { ?>
            <?php
            $statement = $dbh->prepare("SELECT * FROM users WHERE id = :id");
            $statement->bindParam(":id", $_SESSION["uid"]);
            $statement->execute();
            $row = $statement->fetch();
            ?>
            <img style="max-width: 90%; max-height: 200px" src="img_avatars/<?php echo $row["avatar"]; ?>" />
            <p>你好, <?php echo $_SESSION["username"]; ?></p>
            <p><a class="btn btn-primary" href="new_item.php">发表商品</a></p>
        <?php } else { ?>
            <form role="form" action="post_login.php" method="post">
                <div class="form-group">
                    <label for="username">用户名</label>
                    <input type="email" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">密码</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-default">登录</button>
                <button type="button" onclick="window.location.href='register.php'" class="btn btn-default">注册</button>
            </form>
        <?php } ?>
    </div>

<?php require_once("footer.php"); ?>