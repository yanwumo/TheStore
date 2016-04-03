<?php
require_once("pdo_init.php");
?>

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
                    </button> <a class="navbar-brand" href="index.php">The Store</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" />
                        </div>
                        <button type="submit" class="btn btn-default">
                            Submit
                        </button>
                    </form>
                    <div class="search_suggest" id="searchsuggest">
                        <ul>

                        </ul>
                    </div>
                    <?php if (isset($_SESSION["username"])) { ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["username"]; ?><strong class="caret"></strong></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="my.php">个人资料</a>
                                    </li>
                                    <li>
                                        <a href="#">我的收藏</a>
                                    </li>
                                    <?php if ($_SESSION["privilege"] == 1) { ?>
                                        <li>
                                            <a href="admin/admin.php">后台管理</a>
                                        </li>
                                    <?php } ?>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="logout.php">登出</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php } ?>
                    <script type="text/javascript">
                        function SearchSuggest(searchFuc) {
                            var input = $('#searchtext');
                            var suggestWrap = $('#searchsuggest');
                            var key = "";
                            var init = function () {
                                input.bind('keyup', sendKeyWord);
                                input.bind('blur', function () {
                                    setTimeout(hideSuggest, 100);
                                })
                            };
                            var hideSuggest = function () {
                                suggestWrap.hide();
                            };
                            var sendKeyWord = function (event) {
                                var valText = $.trim(input.val());
                                if (valText == '' || valText == key) {
                                    return;
                                }
                                searchFuc(valText);
                                key = valText;
                            };
                            this.dataDisplay = function (data) {
                                if (data.length <= 0) {
                                    suggestWrap.hide();
                                    return;
                                }
                                var li;
                                var tmpFrag = document.createDocumentFragment();
                                suggestWrap.find('ul').html('<li>您要找的是不是:</li>');
                                for (var i = 0; i < data.length; i++) {
                                    a=document.createElement('A');
                                    a.href="./showItemDetail.php?id="+data[i].id;
                                    a.innerHTML=data[i].goodsname;
                                    li = document.createElement('LI');
                                    li.appendChild(a);
                                    tmpFrag.appendChild(li);
                                }
                                suggestWrap.find('ul').append(tmpFrag);
                                suggestWrap.show();
                                suggestWrap.find('li').hover(function () {
                                    suggestWrap.find('li').removeClass('hover');
                                    $(this).addClass('hover');

                                }, function () {
                                    $(this).removeClass('hover');
                                }).bind('click', function () {
                                    input.val(this.innerHTML);

                                    suggestWrap.hide();
                                });
                            };
                            init();
                        }
                        var searchSuggest = new SearchSuggest(sendKeyWordToBack);
                        function sendKeyWordToBack(keyword) {
                            var obj = {
                                "keyword": keyword
                            };
                            $.ajax({
                                type: "GET",
                                url: "http://www.nthuhw.com/searchAdvice.php",
                                async: true,
                                data: obj,
                                dataType: "json",
                                success: function (data) {
                                    var aData = [];
                                    for (var i = 0; i < data.length; i++) {
                                        var dataobj={};
                                        dataobj.goodsname=data[i]["goodsname"];
                                        dataobj.id=data[i]["id"];
                                        aData.push(dataobj);
                                    }
                                    searchSuggest.dataDisplay(aData);
                                }
                            });
                        }

                    </script>
                </div>

            </nav>
        </div>
    </div>
    <div class="row">