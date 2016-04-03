<?php require_once("header.php"); ?>
<div class="col-md-2">
</div>
<div class="col-md-10">
    <div class="row">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>名稱</th>
                <th>價格</th>
                <th>數量</th>
                <th>運輸方式</th>
                <th>運費</th>
                <th>交易地點</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $page = isset($_GET["page"]) && $_GET["page"] >= 1 ? $_GET["page"] : 1;

            $statement = $dbh->prepare("SELECT COUNT(*) FROM items WHERE uid = :uid");
            $statement->bindValue(":uid", $_SESSION["uid"]);
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
            $statement = $dbh->prepare("SELECT * FROM items WHERE uid = :uid LIMIT $lower_bound, $items_per_page");
            $statement->bindValue(":uid", $_SESSION["uid"]);
            $statement->execute();
            while ($row = $statement->fetch()) {
                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["title"]; ?></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td><?php echo $row["quantity"]; ?></td>
                    <td><?php echo $row["shipping_type"]; ?></td>
                    <td><?php echo $row["shipping_price"]; ?></td>
                    <td><?php echo $row["transaction_place"]; ?></td>
                    <td><a href="post_delete_item.php?id=<?php echo $row['id']; ?>">删除</a></td>
                </tr>
                <?php
            }
            ?>
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