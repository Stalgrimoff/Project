<?php
		include 'conn.php';
		if (isset($_GET['del_id'])){
			$sql_delete = "DELETE FROM client WHERE id_client = {$_GET['del_id']}";
			$result_delete = mysqli_query ($link, $sql_delete);
			if ($result_delete) {
				header('Location: upclient.php');
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
	<h2>Таблица "Клиенты"</h2>
		<table border=1>
			<tr>
				<td>Код клиента</td>
				<td>ФИО</td>
				<td>Телефон</td>
				<td>Удаление</td>
				<td>Редактирование</td>
			</tr>
			<?php
			$sql_client = "SELECT id_client, FIO, TEL FROM client";
			$result_client = mysqli_query($link, $sql_client);
			while ($row_client = mysqli_fetch_array($result_client)){
				echo '<tr>'.
						"<td>{$row_client['id_client']}</td>".
						"<td>{$row_client['FIO']}</td>".
						"<td>{$row_client['TEL']}</td>".
						"<td><a href='?del_id={$row_client['id_client']}'>Удалить</a></td>".
						"<td><a href='update2.php?red_id={$row_client['id_client']}'>Изменить</a></td>".
						'</tr>';
			}
			?>
		</table>
		<form action="admin.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>