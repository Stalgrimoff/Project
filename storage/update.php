<?php
include 'conn.php';

		if(isset($_POST['warehouse'])){
			if (isset($_GET['red_id'])){
				$sql_update = "UPDATE placement SET warehouse = '{$_POST['warehouse']}', string = '{$_POST['string']}', position = '{$_POST['position']}' WHERE id_place = {$_GET['red_id']}";
				$result_update = mysqli_query($link,$sql_update);
			}
			if ($result_update){
				echo '<p>Успешно!</p>';
			} else {
				echo '<p>Произошла ошибка:  '. mysqli_error($link). '</p>';
			}
		}

		if (isset($_GET['red_id'])){
			$sql_select = "SELECT id_place, warehouse, string, position FROM placement WHERE id_place = {$_GET['red_id']}";
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
				<td>Склад</td>
				<td><input type="text" name="warehouse" value="<?=isset($_GET['red_id']) ? $row['warehouse'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Ряд</td>
				<td><input type="text" name="string" value="<?=isset($_GET['red_id']) ? $row['string'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Ячейка</td>
				<td><input type="text" name="position" value="<?=isset($_GET['red_id']) ? $row['position'] : ''; ?>"></td>
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