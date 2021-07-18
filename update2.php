<?php
include 'conn.php';

		if(isset($_POST['FIO'])){
			if (isset($_GET['red_id'])){
				$sql_update = "UPDATE client SET FIO = '{$_POST['FIO']}', TEL = '{$_POST['TEL']}' WHERE id_client = {$_GET['red_id']}";
				$result_update = mysqli_query($link,$sql_update);
			}
			if ($result_update){
				echo '<p>Успешно!</p>';
			} else {
				echo '<p>Произошла ошибка:  '. mysqli_error($link). '</p>';
			}
		}

		if (isset($_GET['red_id'])){
			$sql_select = "SELECT id_client, FIO, TEL FROM client WHERE id_client = '{$_GET['red_id']}'";
			$result_select = mysqli_query($link, $sql_select);
			$row = mysqli_fetch_array($result_select);
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Редактирование</title>
</head>
<body>
	<form action="" method="post">
		<table>
			<tr>
				<td>ФИО</td>
				<td><input type="text" name="FIO" value="<?=isset($_GET['red_id']) ? $row['FIO'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Номер телефона</td>
				<td><input type="text" name="TEL" value="<?=isset($_GET['red_id']) ? $row['TEL'] : ''; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="Сохранить"></td>
			</tr>
		</table>
	
	</form>
	<form action="admin.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>