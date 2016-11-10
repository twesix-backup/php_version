<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>更新用户</title>
</head>
<body>
	<form method="POST" action="update.php">
		<input type="hidden" name="id" value="<%=user.getId()%>" />
		<table>
			<tr>
				<td>用户名</td>
				<td><input name="username" value="<%=user.getUsername()%>" /></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input name="password" value="<%=user.getPassword()%>" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="提交" /></td>
			</tr>
		</table>
	</form>
</body>
</html>