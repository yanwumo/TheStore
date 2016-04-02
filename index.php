<?php require_once("header.php"); ?>
<?php
$page = isset($_GET["page"]) && $_GET["page"] >= 1 ? $_GET["page"] : 1;

$statement = $dbh->prepare("SELECT COUNT(*) FROM goods");
$statement->execute();
$row = $statement->fetch();
$goods_per_page = 12;
$total_goods = $row["COUNT(*)"];
$total_page = ceil($total_goods / $goods_per_page);
if ($total_page == 0) $total_page = 1;
$lower_bound = ($page - 1) * $goods_per_page;
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
        <a href="#" class="list-group-item active">Home</a>
        <a href="#" class="list-group-item">Home</a>
        <a href="#" class="list-group-item">Home</a>
        <a href="#" class="list-group-item">Home</a>
        <a href="#" class="list-group-item">Home</a>
    </div>
</div>
<div class="col-md-8">
    <div class="row">

            <div class="col-md-4">
                <div class="thumbnail">
                    <img alt="Bootstrap Thumbnail First" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
                    <div class="caption">
                        <h3>
                            這是一杯綠茶甜甜的
                        </h3>
                        <p>這是一杯綠茶甜甜的</p>
                        <p>
                            <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
                    <div class="caption">
                        <h3>
                            這是一杯綠茶甜甜的
                        </h3>
                        <p>
                            這是一杯綠茶甜甜的
                        </p>
                        <p>
                            <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img alt="Bootstrap Thumbnail Third" src="http://lorempixel.com/output/sports-q-c-600-200-1.jpg" />
                    <div class="caption">
                        <h3>
                            這是一杯綠茶甜甜的
                        </h3>
                        <p>
                            這是一杯綠茶甜甜的
                        </p>
                        <p>
                            <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img alt="Bootstrap Thumbnail First" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
                    <div class="caption">
                        <h3>
                            這是一杯綠茶甜甜的
                        </h3>
                        <p>這是一杯綠茶甜甜的</p>
                        <p>
                            <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
                    <div class="caption">
                        <h3>
                            這是一杯綠茶甜甜的
                        </h3>
                        <p>
                            這是一杯綠茶甜甜的
                        </p>
                        <p>
                            <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img alt="Bootstrap Thumbnail Third" src="http://lorempixel.com/output/sports-q-c-600-200-1.jpg" />
                    <div class="caption">
                        <h3>
                            這是一杯綠茶甜甜的
                        </h3>
                        <p>
                            這是一杯綠茶甜甜的
                        </p>
                        <p>
                            <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img alt="Bootstrap Thumbnail First" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
                    <div class="caption">
                        <h3>
                            這是一杯綠茶甜甜的
                        </h3>
                        <p>這是一杯綠茶甜甜的</p>
                        <p>
                            <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
                    <div class="caption">
                        <h3>
                            這是一杯綠茶甜甜的
                        </h3>
                        <p>
                            這是一杯綠茶甜甜的
                        </p>
                        <p>
                            <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img alt="Bootstrap Thumbnail Third" src="http://lorempixel.com/output/sports-q-c-600-200-1.jpg" />
                    <div class="caption">
                        <h3>
                            這是一杯綠茶甜甜的
                        </h3>
                        <p>
                            這是一杯綠茶甜甜的
                        </p>
                        <p>
                            <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img alt="Bootstrap Thumbnail First" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
                    <div class="caption">
                        <h3>
                            這是一杯綠茶甜甜的
                        </h3>
                        <p>這是一杯綠茶甜甜的</p>
                        <p>
                            <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
                    <div class="caption">
                        <h3>
                            這是一杯綠茶甜甜的
                        </h3>
                        <p>
                            這是一杯綠茶甜甜的
                        </p>
                        <p>
                            <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <img alt="Bootstrap Thumbnail Third" src="http://lorempixel.com/output/sports-q-c-600-200-1.jpg" />
                    <div class="caption">
                        <h3>
                            這是一杯綠茶甜甜的
                        </h3>
                        <p>
                            這是一杯綠茶甜甜的
                        </p>
                        <p>
                            <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                        </p>
                    </div>
                </div>
            </div>

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
                            <a href="<?php substr($_SERVER['PHP_SELF'], strrpos($_SERVER['PHP_SELF'], '/') + 1); ?>?page=<?php echo $total_page; ?>&category=<?php echo $category; ?>"><?php echo "...$totalPage"; ?></a>
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
        你好, <?php echo $_SESSION["username"]; ?>
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