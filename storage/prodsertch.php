<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Хранение</title>
</head>
<body>
	<form method="post">
		<table>
			<tr>
				<td>Поле для поиска </td>
				<td><input type="text" name="poisk" value="<?=$_POST['poisk']; ?>"></td>
				<td><input type="submit" name="submit" value="OK"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
include('conn.php');
$poisk = $_POST['poisk'];
$reset = $_POST['reset'];
if (empty($poisk))
{
	$sql = "SELECT product.id_prod, placement.warehouse, client.FIO, tariff.name_tarif, product.summa FROM product INNER JOIN placement ON product.id_place = placement.id_place INNER JOIN client ON product.id_client = client.id_client INNER JOIN tariff ON product.id_tariff = tariff.id_tariff";
	$result = mysqli_query($link, $sql);
	echo '<table border=1>'.
		 '<tr>'.
		 '<td>Код хранения</td>'.
		 '<td>Наименование склада</td>'.
		 '<td>ФИО клиента</td>'.
		 '<td>Название тарифа</td>'.
		 '<td>Стоимость</td>'.
		 '</tr>';
		 while ($row = mysqli_fetch_array($result)) {
		 	echo 
		 	'<tr>'.
				"<td>{$row['id_prod']}</td>".
				"<td>{$row['warehouse']}</td>".
				"<td>{$row['FIO']}</td>".
				"<td>{$row['name_tarif']}</td>".
				"<td>{$row['summa']}</td>".	
		 	'</tr>';
		 }
		 echo '</table>';
} else {
	$sqllike = "SELECT product.id_prod, placement.warehouse, client.FIO, tariff.name_tarif, product.summa FROM product INNER JOIN placement ON product.id_place = placement.id_place INNER JOIN client ON product.id_client = client.id_client INNER JOIN tariff ON product.id_tariff = tariff.id_tarifft WHERE id_prod LIKE '%$poisk%' OR warehouse LIKE
	'%$poisk%' OR FIO LIKE '%$poisk%' OR name_tarif LIKE '%$poisk%' OR summa LIKE '%$poisk%' ";
	$res = mysqli_query($link, $sqllike);
	echo '<table border=1>'.
		 '<tr>'.
			 '<td>Код хранения</td>'.
			 '<td>Наименование склада</td>'.
			 '<td>ФИО клиента</td>'.
			 '<td>Название тарифа</td>'.
			 '<td>Стоимость</td>'.
		 '</tr>';
		while ($row1 = mysqli_fetch_array($res)) {
		 	echo 
		 	'<tr>'.
				"<td>{$row1['id_prod']}</td>".
				"<td>{$row1['warehouse']}</td>".
				"<td>{$row1['FIO']}</td>".
				"<td>{$row1['name_tarif']}</td>".
				"<td>{$row1['summa']}</td>".
		 	'</tr>';
		 }
		 echo '</table>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Хранение</title>
</head>
<body>
	<form action="admin.php" method="post">
	    <input type="submit" value="Вернуться назад">
	    </form>
</body>
</html>