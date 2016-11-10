<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <title>查询用户</title>
</head>
<body>
<table class="table">
    <tr>
        <th>ID</th>
        <th>用户名</th>
        <th>密码</th>
        <th>操作</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <a class="btn btn-default" href="update.php?id=<%=user.getId()%>">修改</a>
            <a class="btn btn-danger" href="delete.php?id=<%=user.getId()%>">删除</a>
        </td>
    </tr>
</table>
<hr>
<p>
    共条记录, <a class="btn btn-default" href="add.php">新增用户</a>
</p>
</body>
</html>
