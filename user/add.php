<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <title>新增用户</title>
</head>
<body>
<?php
require "../lib/db.php";
require '../lib/login_check.php';
if(!$logged_in)
{
    echo "<h3>您还未登陆，请登录</h3>";
}
else
{
    if($type=='student')
    {
        echo "<h3>你的身份是${type},没有权限添加任何用户</h3>";
    }
    else
    {
        if(!empty($_GET["username"])&&!empty($_GET["password"])&&!empty($_GET["type"]))
        {
            $uname=$_GET['username'];
            $pwd=$_GET['password'];
            $utype=$_GET['type'];

            if($type=='teacher')
            {
                if($utype=='teacher')
                {
                    echo "<h3>你的身份是${type},没有权限添加${utype}类型的用户</h3>";
                }
                else
                {
                    add_user();
                }
            }
            elseif($type=='admin')
            {
                add_user();
            }
            else
            {
                echo "<h3>你的身份是非法的,请退出后重新登录</h3>";
            }
        }
        else
        {
            echo "<h3>用户信息不完整，无法添加新用户</h3>";
        }
    }

}
function add_user()
{
//    echo "<h3>正在连接数据库，准备添加用户</h3>";

    global $conn,$uname,$pwd,$utype;

    $sql="insert into weeb.users (username, password,type) values ('$uname','$pwd','$utype')";

    if($conn->query($sql))
    {
        echo "<h3>用户 ${uname}(${utype})添加成功</h3>";
    }
    else
    {
        echo "<h3>用户已存在，添加失败</h3>";
    }
}
?>
<hr>
<div class="container">
    <div class="row">

            <?php

        if($logged_in&&$type=='admin')
        {

            ?>

            <div class="col-sm-8 col-sm-offset-2">
                <form class="form" action="add.php" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="用户名" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="password" placeholder="密码" required>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="type">用户类型</label>
                        </div>
                        <div class="col-sm-3">
                            <input type="radio" name="type" value="teacher">教师
                        </div>
                        <div class="col-sm-3">
                            <input type="radio" name="type" value="student" checked>学生
                        </div>
                        <div class="col-sm-3">
                            <input type="radio" name="type" value="admin">管理员
                        </div>
                    </div>
                    <div class="form-group">
                        <br><br>
                        <button class="btn btn-success form-control" type="submit">提交</button>
                    </div>
                </form>
            </div>

            <?php

        }
        if(!$logged_in)
        {

            ?>

            <div class="col-sm-8 col-sm-offset-2">
                <a class="btn btn-primary form-control" href="../login.php">去登陆</a>
            </div>

            <?php
        }

            ?>

        <div class="col-sm-8 col-sm-offset-2">
            <hr>
            <a href="../index.php" class="btn btn-primary form-control">返回首页</a>
        </div>

    </div>
</div>
</body>
</html>