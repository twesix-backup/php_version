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
if(!empty($_GET['username'])&&!empty($_GET['password']))
{
    $username=$_GET['username'];
    $password=$_GET['password'];
    require "lib/db.php";
    $sql="select * from weeb.users where username='$username' and password='$password'";
    $res=$conn->query($sql);
    if($res->num_rows==1)
    {
        $logged_in=true;
        $res=$res->fetch_assoc();
        $username=$res["username"];
        $password=$res["password"];
        $type=$res["type"];
        $id=$res["id"];
        setcookie('username',$username);
        setcookie('password',$password);
        setcookie('type',$type);
        setcookie('id',$id);
        echo "<h3>你好，${username}</h3>";
    }
    else
    {
        $error=$conn->error;
        echo "<h3>用户名或密码错误</h3>";
    }
}
else
{
    echo "<h3>缺少用户名或密码，登录失败</h3>";
}
?>
<hr>
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a class="btn btn-primary form-control" href="index.php">返回首页</a>
        </div>
    </div>
</div>
</body>
</html>
