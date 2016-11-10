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
setcookie('username','',time()-3600);
setcookie('password','',time()-3600);
setcookie('type','',time()-3600);
?>
<h3>注销成功</h3>
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
