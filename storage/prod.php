<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php
	include('conn.php');
	$all_view = "SHOW TABLES FROM storage LIKE 'prod'";
	$res_view = mysqli_query($link, $all_view);
	$nam_view= mysqli_num_rows($res_view);

	if ($nam_view == 1)
	{
		$sql_composition = "SELECT * FROM prod";
		$result_composotion = mysqli_query($link, $sql_composition);
	}
	else
	{
		$sql_view = "CREATE VIEW prod AS SELECT product.id_prod, product.id_place, client.FIO, tariff.name_tarif, product.price FROM product, client, tariff WHERE product.id_client=client.id_client AND product.id_tariff=tariff.id_tariff";
		$result_view = mysqli_query($link, $sql_view);
	}
	?>
<h2>Таблица "Хранение"</h2>
<table border=1>
	<tr>
		  <td>Код Хранения</td>
		  <td>Склад</td>
          <td>ФИО клиента</td>
          <td>Название тарифа</td>
          <td>Стоимость</td>
	</tr>
	<?php
	while ($row = mysqli_fetch_array($result_composotion)) 
	{
		echo '<tr>'.
		"<td> {$row['id_prod']}</td>".
		"<td> {$row['id_place']}</td>".
		"<td> {$row['FIO']}</td>".
        "<td> {$row['name_tarif']}</td>".
        "<td> {$row['price']}</td>".
		'</tr>';
	}
	?>
</table>
    <form action="admin.php" method="post">
    <input type="submit" value="Вернуться назад">
    </form>
</body>
</html>