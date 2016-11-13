<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <title>主页</title>
</head>
<body>

<?php
require '../lib/login_check.php';
require '../lib/db.php';
$res=false;
function query_grade($uid)
{
    global $conn,$res;
//    var_dump($conn);
    $sql="select `uid`,`score`,`cid`,`time` from weeb.grades where uid='${uid}' ";
    var_dump($sql);
//    $res=$conn->query($sql);
    var_dump($res);
    $conn->close();
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <?php
            if($logged_in)
            {
                if(empty($_GET["id"]))
                {
                    if($type=='student')
                    {
                        query_grade($id);
                    }
                    else
                    {
                        echo "<h3>您没有任何的成绩记录</h3>";
                    }
                }
                else
                {
                    if($type=='admin')
                    {
                        query_grade($_GET["id"]);
                    }
                    else
                    {
                        echo "<h3>你不是管理员，不允许查询别人的成绩</h3>";
                    }
                }
            }
            else {

                ?>

                <a class="btn btn-primary form-control" href="../login.php">去登陆</a>

                <?php

            }
                ?>

            <hr>

            <table class="table table-bordered">
                <tr>
                    <th>用户id</th>
                    <th>成绩</th>
                    <th>考试科目</th>
                    <th>考试时间</th>
                </tr>


                    <?php

            if($res)
            {
                $row=$res->fetch_assoc();
                while($row)
                {

                    ?>

                    <tr>
                        <td><?php echo $row["uid"] ?></td>
                        <td><?php echo $row["score"] ?></td>
                        <td><?php echo $row["cid"] ?></td>
                        <td><?php echo $row["time"] ?></td>
                    </tr>

                    <?php
                }
            }

                    ?>

            </table>
            <hr>
            <a href="../index.php" class="btn btn-primary form-control">返回首页</a>
        </div>
    </div>
</div>
</body>
</html>
