<?php
include 'conn.php';

		if(isset($_POST['name_tarif'])){
			if (isset($_GET['red_id'])){
				$sql_update = "UPDATE tariff SET name_tarif = '{$_POST['name_tarif']}', weight = '{$_POST['weight']}', storage_life = '{$_POST['storage_life']}' WHERE id_tariff = {$_GET['red_id']}";
				$result_update = mysqli_query($link,$sql_update);
			}
			if ($result_update){
				echo '<p>Успешно!</p>';
			} else {
				echo '<p>Произошла ошибка:  '. mysqli_error($link). '</p>';
			}
		}

		if (isset($_GET['red_id'])){
			$sql_select = "SELECT id_tariff, name_tarif, weight, storage_life FROM tariff WHERE id_tariff = {$_GET['red_id']}";
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
				<td><input type="text" name="name_tarif" value="<?=isset($_GET['red_id']) ? $row['name_tarif'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Телефон</td>
				<td><input type="text" name="weight" value="<?=isset($_GET['red_id']) ? $row['weight'] : ''; ?>"></td>
			</tr>
			<tr>
				<td>Дата начала работы</td>
				<td><input type="time" name="storage_life" value="<?=isset($_GET['red_id']) ? $row['storage_life'] : ''; ?>"></td>
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