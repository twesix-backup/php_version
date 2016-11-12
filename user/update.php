<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <title>更新用户</title>
</head>
<body>
<?php
require '../lib/login_check.php';

if(!empty($_GET["password"]))
{
    if($logged_in)
    {
        if(empty($_GET["id"]))
        {
            $uid=$id;
            update_user();
        }
        else
        {
            if($type=='admin')
            {
                $uid=$_GET["id"];
                update_user();
            }
            else
            {
                echo "<h3>你不是系统管理员，不可以修改除了你之外的用户的密码</h3>";
            }
        }
    }
    else
    {
        echo "<h3>你没有登录，请登录</h3>";
    }
}
else
{
    echo "<h3>缺乏新密码，修改失败</h3>";
}


function update_user()
{
    global $conn,$uid;
    $pwd=$_GET["password"];
    $sql="update weeb.users set password='$pwd' where id='$uid'";

    require '../lib/db.php';
    if($conn->query($sql))
    {
        echo "<h3>用户(id : ${uid})密码修改成功</h3>";
    }
    else
    {
        echo "<h3>密码修改失败,请重试</h3>";
    }
}
?>
<div class="container">
    <div class="row">

        <?php

        if($logged_in)
        {

            ?>

            <div class="col-sm-8 col-sm-offset-2">
                <form class="form" method="get" action="update.php">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="用户id" name="id" required <?php echo $type=='admin'?'':'disabled' ?> >
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="新密码" name="password" required>
                    </div>
                    <button class="form-control btn-success" type="submit">修改</button>
                </form>
            </div>

            <?php

        }
        else
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