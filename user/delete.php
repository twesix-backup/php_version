<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <title>删除用户</title>
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
  if($type!='admin')
  {
    echo "<h3>你不是系统管理员,没有权限删除任何用户</h3>";
  }
  else
  {
    if(!empty($_GET["id"]))
    {
      $id=$_GET['id'];

      delete_user();
    }
    else
    {
      echo "<h3>没有用户id，无法删除用户</h3>";
    }
  }

}
function delete_user()
{
//    echo "<h3>正在连接数据库，准备添加用户</h3>";

  global $conn,$id;

  $sql="delete from weeb.users where id='${id}'";

  if($conn->query($sql))
  {
    echo "<h3>用户(id : ${id})删除成功</h3>";
  }
  else
  {
    echo "<h3>用户不存在，删除失败</h3>";
  }
}
?>
<hr>
<div class="container">
  <div class="row">

    <?php

    if($logged_in)
    {

      ?>

      <div class="col-sm-8 col-sm-offset-2">
        <form class="form" action="delete.php" method="get">
          <div class="form-group">
            <input type="text" class="form-control" name="id" placeholder="用户id" required>
          </div>
          <div class="form-group">
            <br><br>
            <button class="btn btn-danger form-control" type="submit">删除该用户</button>
          </div>
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
