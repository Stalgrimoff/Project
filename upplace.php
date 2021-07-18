<?php
		include 'conn.php';
		if (isset($_GET['del_id'])){
			$sql_delete = "DELETE FROM placement WHERE id_place = {$_GET['del_id']}";
			$result_delete = mysqli_query ($link, $sql_delete);
			if ($result_delete) {
				header('Location: upplace.php');
			} else {
				echo '<p>Произошла ошибка:   '. mysqli_error($link) . '</p>';
			}
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
	<h2>Таблица "Склад"</h2>
		<table border=1>
			<tr>
				<td> ID Склада</td>
				<td>Название склада</td>
				<td>Ряд</td>
				<td>Ячейка</td>
				<td>Удаление</td>
				<td>Редактирование</td>
			</tr>
			<?php
			$sql_placement = "SELECT id_place, warehouse, string, position FROM placement";
			$result_placement = mysqli_query($link, $sql_placement);
			while ($row_placement = mysqli_fetch_array($result_placement)){
				echo '<tr>'.
						"<td>{$row_placement['id_place']}</td>".
						"<td>{$row_placement['warehouse']}</td>".
						"<td>{$row_placement['string']}</td>".
						"<td>{$row_placement['position']}</td>".
						"<td><a href='?del_id={$row_placement['id_place']}'>Удалить</a></td>".
						"<td><a href='update.php?red_id={$row_placement['id_place']}'>Изменить</a></td>".
						'</tr>';
			}
			?>
		</table>
		<form action="admin.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>