<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <title>查询用户</title>
</head>
<body>
<?php
require '../lib/login_check.php';
require '../lib/db.php';

switch ($type)
{
    case 'student' : $sql="select (`id`,`username`,`type`) from weeb.users where type='student'";break;
    case 'teacher' : $sql="select (`id`,`username`,`type`) from weeb.users where type='student' and type='teacher'";break;
    case 'admin' : $sql="select (`id`,`username`,`type`) from weeb.users";break;
    default : $sql=false;break;
}
if($sql)
{
    $res=$conn->query($sql);
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <table class="table">
                <tr>
                    <th>用户ID</th>
                    <th>用户名</th>
                    <th>用户类型</th>
                </tr>

                            <?php

                    if(!empty($res))
                    {
                        $row=$res->fetch_assoc();
                        while(!empty($row))
                        {

                            ?>

                            <tr>
                                <td><?php echo $row["id"] ?></td>
                                <td><?php echo $row["username"] ?></td>
                                <td><?php echo $row["type"] ?></td>
                            </tr>

                            <?php

                            $row=$res->fetch_assoc();
                        }
                    }
                            ?>

            </table>

            <hr>
            <h4>共<?php echo $num; ?>个用户</h4>
            <hr>

            <a href="../index.php" class="btn btn-primary form-control">返回首页</a>
        </div>
    </div>
</div>

</body>
</html>
