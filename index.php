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
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button> <a class="navbar-brand" href="#">Brand</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="#">Link</a>
                        </li>
                        <li>
                            <a href="#">Link</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Action</a>
                                </li>
                                <li>
                                    <a href="#">Another action</a>
                                </li>
                                <li>
                                    <a href="#">Something else here</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">Separated link</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">One more separated link</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" />
                        </div>
                        <button type="submit" class="btn btn-default">
                            Submit
                        </button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">Link</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Action</a>
                                </li>
                                <li>
                                    <a href="#">Another action</a>
                                </li>
                                <li>
                                    <a href="#">Something else here</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">Separated link</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>
    </div>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="jumbotron">
                                        <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                                        <h2>
                                            這是一個mac電腦
                                        </h2>
                                        <p>
                                            This is a template for a simple marketing or informational website.
                                        </p>
                                        <p>
                                            <a class="btn btn-primary btn-large" href="#">Learn more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="jumbotron">
                                        <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                                        <h2>
                                            這是一杯綠茶甜甜的
                                        </h2>
                                        <p>
                                            This is a template for a simple marketing or informational website.
                                        </p>
                                        <p>
                                            <a class="btn btn-primary btn-large" href="#">Learn more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="jumbotron">
                                        <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                                        <h2>
                                            這是一個iphone 5s
                                        </h2>
                                        <p>
                                            This is a template for a simple marketing or informational website.
                                        </p>
                                        <p>
                                            <a class="btn btn-primary btn-large" href="#">Learn more</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="jumbotron">
                                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                                            <h2>
                                                這是一個muji鉛筆盒
                                            </h2>
                                            <p>
                                                This is a template for a simple marketing or informational website.
                                            </p>
                                            <p>
                                                <a class="btn btn-primary btn-large" href="#">Learn more</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="jumbotron">
                                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                                            <h2>
                                                這是一把吉他來自大西洋彼岸的男人
                                            </h2>
                                            <p>
                                                This is a template for a simple marketing or informational website.
                                            </p>
                                            <p>
                                                <a class="btn btn-primary btn-large" href="#">Learn more</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="jumbotron">
                                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                                            <h2>
                                                這是一台筆電牌子我看不清楚
                                            </h2>
                                            <p>
                                                This is a template for a simple marketing or informational website.
                                            </p>
                                            <p>
                                                <a class="btn btn-primary btn-large" href="#">Learn more</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="jumbotron">
                                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                                            <h2>
                                                這是一頭豬
                                            </h2>
                                            <p>
                                                This is a template for a simple marketing or informational website.
                                            </p>
                                            <p>
                                                <a class="btn btn-primary btn-large" href="#">Learn more</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="jumbotron">
                                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                                            <h2>
                                                每個程序猿都應該像我一樣
                                            </h2>
                                            <p>
                                                This is a template for a simple marketing or informational website.
                                            </p>
                                            <p>
                                                <a class="btn btn-primary btn-large" href="#">Learn more</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="jumbotron">
                                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                                            <h2>
                                                這是一個人在游泳
                                            </h2>
                                            <p>
                                                This is a template for a simple marketing or informational website.
                                            </p>
                                            <p>
                                                <a class="btn btn-primary btn-large" href="#">Learn more</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="jumbotron">
                                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                                            <h2>
                                                這是一個花花的紙杯子
                                            </h2>
                                            <p>
                                                This is a template for a simple marketing or informational website.
                                            </p>
                                            <p>
                                                <a class="btn btn-primary btn-large" href="#">Learn more</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="jumbotron">
                                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                                            <h2>
                                                這是一瓶可口可樂
                                            </h2>
                                            <p>
                                                This is a template for a simple marketing or informational website.
                                            </p>
                                            <p>
                                                <a class="btn btn-primary btn-large" href="#">Learn more</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="jumbotron">
                                            <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
                                            <h2>
                                                這是一個草莓夾心酥
                                            </h2>
                                            <p>
                                                This is a template for a simple marketing or informational website.
                                            </p>
                                            <p>
                                                <a class="btn btn-primary btn-large" href="#">Learn more</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

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