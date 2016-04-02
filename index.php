<?php require_once("pdo_init.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Store</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>
                            The Store <small>Interface Builder for Bootstrap</small>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">Home</a>
                        <a href="#" class="list-group-item">Home</a>
                        <a href="#" class="list-group-item">Home</a>
                        <a href="#" class="list-group-item">Home</a>
                        <a href="#" class="list-group-item">Home</a>
                    </div>
                </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-4">
                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                            <p>
                                這是一個mac電腦
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                            <p>
                                這是一杯綠茶甜甜的
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                            <p>
                                這是一個iPhone 5s
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                            <p>
                                <span>這是一個muji鉛筆盒</span>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                            <p>
                                這是一把吉他來自大西洋的男人
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                            <p>
                                <span>這是一台筆電牌子我看不清楚</span>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                            <p>
                                這是一頭豬
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                            <p>
                                每個程序猿都應該像我一樣
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                            <p>
                                這是一個人在游泳
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                            <p>
                                這是個花花的紙杯子
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                            <p>
                                這是一瓶可口可樂
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                            <p>
                                這是一個草莓夾心酥
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="pagination">
                                <li>
                                    <a href="#">Prev</a>
                                </li>
                                <li>
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li>
                                    <a href="#">4</a>
                                </li>
                                <li>
                                    <a href="#">5</a>
                                </li>
                                <li>
                                    <a href="#">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <form role="form" action="post_login.php" method="post">
                        <div class="form-group">
                            <label for="username">用户名</label>
                            <input type="email" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">密码</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <button type="submit" class="btn btn-default">登录</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>