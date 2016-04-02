<?php require_once("header.php"); ?>
    <div class="col-md-2">
        <ul class="nav nav-stacked nav-pills">
            <li>
                <a href="admin.php">首頁</a>
            </li>
            <li>
                <a href="users.php">用戶列表</a>
            </li>
            <li>
                <a href="items.php">商品列表</a>
            </li>
            <li class="active">
                <a href="categories.php">分類管理</a>
            </li>
            <li>
                <a href="chart.php">數據統計</a>
            </li>
        </ul>
    </div>
    <div class="col-md-10">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th>分類</th>
                    <th>位置</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                // Query
                $statement = $dbh->prepare("SELECT * FROM categories ORDER BY position");
                $statement->execute();
                while ($row = $statement->fetch()) {
                    ?>
                        <form action="post_change_category.php" method="post">
                            <tr>
                            <td><input type="hidden" name="id" value="<?php echo $row['id']; ?>" </td>
                            <td><input type="text" name="category" value="<?php echo $row['category']; ?>" /></td>
                            <td><input type="text" name="position" value="<?php echo $row['position']; ?>" /></td>
                            <td><input type="submit" /></td>
                            <td><a href="post_delete_category.php?id=<?php echo $row['id']; ?>">刪除</a></td>
                            </tr>
                        </form>
                    <?php
                } ?>
                </tbody>
            </table>
            <form action="post_add_category.php" method="post">
                新增分類: <input type="text" name="category" />
                位置: <input type="text" name="position" />
                <input type="submit" />
            </form>
        </div>
    </div>


<?php require_once("footer.php"); ?>