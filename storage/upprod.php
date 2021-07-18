<?php
		include 'conn.php';
		if (isset($_GET['del_id'])){
			$sql_delete = "DELETE FROM product WHERE id_prod = {$_GET['del_id']}";
			$result_delete = mysqli_query ($link, $sql_delete);
			if ($result_delete) {
				header('Location: upprod.php');
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
	<h2>Таблица "Продукт"</h2>
		<table border=1>
			<tr>
				<td>Код хранения</td>
				<td>Наименование склада</td>
				<td>ФИО клиента</td>
				<td>Название тарифа</td>
				<td>Стоимость</td>
				<td>Удаление</td>
				<td>Редактирование</td>
			</tr>
			<?php
			$sql_product = "SELECT product.id_prod, placement.warehouse, client.FIO, tariff.name_tarif, product.summa FROM product INNER JOIN placement ON product.id_place = placement.id_place INNER JOIN client ON product.id_client = client.id_client INNER JOIN tariff ON product.id_tariff = tariff.id_tariff";
			$result_product = mysqli_query($link, $sql_product); 
			while ($row_product = mysqli_fetch_array($result_product)){
				echo '<tr>'.
						"<td>{$row_product['id_prod']}</td>".
						"<td>{$row_product['warehouse']}</td>".
						"<td>{$row_product['FIO']}</td>".
						"<td>{$row_product['name_tarif']}</td>".
						"<td>{$row_product['summa']}</td>".						
						"<td><a href='?del_id={$row_product['id_prod']}'>Удалить</a></td>".
						"<td><a href='update3.php?red_id={$row_product['id_prod']}'>Изменить</a></td>".
						'</tr>';
			}
			?>
		</table>
		<form action="admin.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>