<?php
session_start();
include ('conn.php');
		$login = stripslashes(htmlspecialchars(trim($_POST['login'])));
		$pass = trim($_POST['pass']);
	if (!empty($login) && !empty($pass)) {
			$sql = "SELECT `id_access`, `login`, password, access FROM access where login='$login' and password = '$pass'";
			$result = mysqli_query($link,$sql);
			$row = mysqli_num_rows($result);
			if ($row == 0) {
				exit("Неверный логин или пароль!");
			} else {
				$row1 = mysqli_fetch_array($result);
				if($row1['access'] == 'admin'){
					header('Location: admin.php');
				}
			}
	}
mysqli_close($link);
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Авторизация</title>
</head>
<body>
	<form method="post" name="myForm">
		<p>Логин: <input type="text" name="login"> </p>
		<p>Пароль: <input type="password" name="pass"> </p>
		<input type="submit" value="Отправить" name="enter">
		<input type="reset" value="Выход">
	</form>
</body>
</html>