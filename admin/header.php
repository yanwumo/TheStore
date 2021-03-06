<?php
require_once("../pdo_init.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The Store!</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button> <a class="navbar-brand" href="../index.php">The Store!</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php if (isset($_SESSION["username"])) { ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["username"]; ?><strong class="caret"></strong></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="../my.php">個人資料</a>
                                    </li>
                                    <li>
                                        <a href="../my_items.php">商品管理</a>
                                    </li>
                                    <?php if ($_SESSION["privilege"] == 1) { ?>
                                        <li>
                                            <a href="../admin/admin.php">後台管理</a>
                                        </li>
                                    <?php } ?>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="../logout.php">登出</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php } ?>
                </div>

            </nav>
        </div>
    </div>
    <div class="row">