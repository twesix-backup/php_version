<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>主页</title>
</head>
<body>
<?php
require "lib/login_check.php";
?>
<hr>
<div class="container">

        <?php

    if(!$logged_in)
    {

        ?>

        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <form action="login.php" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="用户名" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="密码" required>
                    </div>
                    <button type="submit" class="form-control btn-success">登录</button>
                </form>
            </div>
        </div>

        <?php

    }
    else
    {

        ?>

        <div class="row">
            <div class="col-sm-12 center">
                <a class="btn btn-lg btn-default" href="user/list.php">查询用户</a>
                <a class="btn btn-lg btn-default" href="user/add.php">添加用户</a>
                <a class="btn btn-lg btn-default" href="user/update.php">修改用户</a>
                <a class="btn btn-lg btn-default" href="user/delete.php">删除用户</a>
                <br><br>
                <a class="btn btn-lg btn-default" href="grade/query.php">查询成绩</a>
                <a class="btn btn-lg btn-default" href="grade/add.php">添加成绩</a>
                <br><br>
                <a class="btn btn-lg btn-danger" href="logout.php">注销</a>
            </div>
        </div>

        <?php

    }

        ?>
</div>
</body>
</html>
