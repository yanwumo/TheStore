<?php require_once("header.php"); ?>
<div class="col-md-2">
    <ul class="nav nav-stacked nav-pills">
        <li>
            <a href="admin.php">首頁</a>
        </li>
        <li class="active">
            <a href="users.php">用戶列表</a>
        </li>
        <li>
            <a href="items.php">商品列表</a>
        </li>
        <li>
            <a href="categories.php">分類管理</a>
        </li>
    </ul>
</div>
<div class="col-md-10">
    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>UID</th>
                <th>用戶名</th>
                <th>權限</th>
                <th>電子信箱</th>
                <th>電話</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $page = isset($_GET["page"]) && $_GET["page"] >= 1 ? $_GET["page"] : 1;

            $statement = $dbh->prepare("SELECT COUNT(*) FROM users");
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


            // Query
            $statement = $dbh->prepare("SELECT * FROM users LIMIT $lower_bound, $items_per_page");
            $statement->execute();
            while ($row = $statement->fetch()) {
                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></a></td>
                    <td>
                        <?php
                        switch ($row['privilege']) {
                            case "-3":
                                echo "禁止發表 禁止回覆";
                                break;
                            case "-2":
                                echo "禁止發表";
                                break;
                            case "-1":
                                echo "禁止回覆";
                                break;
                            case "1":
                                echo "管理員";
                                break;
                        }
                        ?>
                    </td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td>
                        <?php
                        switch ($row['privilege']) {
                            case "-3":
                                ?>
                                <a href="post_change_privilege.php?id=<?php echo $row['id']; ?>&privilege=-1">解除禁止發表</a>
                                <a href="post_change_privilege.php?id=<?php echo $row['id']; ?>&privilege=-2">解除禁止回覆</a>
                                <?php
                                break;
                            case "-2":
                                ?>
                                <a href="post_change_privilege.php?id=<?php echo $row['id']; ?>&privilege=0">解除禁止發表</a>
                                <a href="post_change_privilege.php?id=<?php echo $row['id']; ?>&privilege=-3">禁止回覆</a>
                                <?php
                                break;
                            case "-1":
                                ?>
                                <a href="post_change_privilege.php?id=<?php echo $row['id']; ?>&privilege=-3">禁止發表</a>
                                <a href="post_change_privilege.php?id=<?php echo $row['id']; ?>&privilege=0">解除禁止回覆</a>
                                <?php
                                break;
                            case "0":
                                ?>
                                <a href="post_change_privilege.php?id=<?php echo $row['id']; ?>&privilege=-2">禁止發表</a>
                                <a href="post_change_privilege.php?id=<?php echo $row['id']; ?>&privilege=-1">禁止回覆</a>
                                <a href="post_change_privilege.php?id=<?php echo $row['id']; ?>&privilege=1">管理員</a>
                                <?php
                                break;
                            case "1":
                                ?>
                                <a href="post_change_privilege.php?id=<?php echo $row['id']; ?>&privilege=0">解除管理員</a>
                                <?php
                                break;
                        }
                        ?>
                    </td>
                </tr>
                <?php
            } ?>
            </tbody>
        </table>
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

<?php require_once("footer.php"); ?>