<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <title>添加成绩</title>
</head>
<body>

<?php
require '../lib/login_check.php';
require '../lib/db.php';
function add_grade($id,$score,$cid)
{
    global $conn;
    $sql="select type from weeb.users where id='${id}' ";
    $res=$conn->query($sql);
    $row=$res->fetch_assoc();
    if($row&&$row["type"]=='student')
    {
        $time=ctime();
        $sql="insert into weeb.grades(`uid`,`cid`,`score`,`time`) values ('$id','$cid','$score','$time')";
        $res=$conn->query($sql);
        if($res)
        {
            echo "<h3>成绩添加成功</h3>";
        }
        else
        {
            echo "<h3>添加失败，请重试</h3>";
        }
    }
    else
    {
        echo "<h3>该用户不存在或者不能为该用户添加成绩</h3>";
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

                <?php
            if($logged_in)
            {
                if(empty($_GET["id"])||empty($_GET["score"])||empty($_GET["cid"]))
                {
                    echo "<h3>成绩信息不全，添加失败</h3>";
                }
                else
                {
                    if($type=='teacher'||$type=='admin')
                    {
                        add_grade($_GET["id"],$_GET["score"],$_GET["cid"]);
                    }
                    else
                    {
                        echo "<h3>你没有权限添加学生成绩，添加失败</h3>";
                    }
                }
            }
            else {

                ?>

                <a class="btn btn-primary form-control" href="../login.php">去登陆</a>

                <?php

            }
                ?>

            <form class="form" action="add.php" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" name="id" placeholder="用户id">
                </div>
                <div class="form-group">
                    <select  class="form-control" name="cid" title="科目id">
                        <option value="1">英语</option>
                        <option value="2">数学</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" max="100" min="0" value="60"
                           name="score" placeholder="成绩">
                </div>
                <button class="btn btn-success form-control" type="submit">提交</button>
            </form>

            <hr>
            <a href="../index.php" class="btn btn-primary form-control">返回首页</a>
        </div>
    </div>
</div>
</body>
</html>
