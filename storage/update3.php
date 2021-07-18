<?php
include 'conn.php';

		if(isset($_POST['id_place'])){
			if (isset($_GET['red_id'])){
				$sql_update = "UPDATE product SET id_place = '{$_POST['id_place']}', id_client = '{$_POST['id_client']}', id_tariff = '{$_POST['id_tariff']}', summa = '{$_POST['summa']}' WHERE id_prod = {$_GET['red_id']}";
				$result_update = mysqli_query($link,$sql_update);
			}
			if ($result_update){
				echo '<p>Успешно!</p>';
			} else {
				echo '<p>Произошла ошибка:  '. mysqli_error($link). '</p>';
			}
		}

		if (isset($_GET['red_id'])){
			$sql_select = "SELECT id_prod, id_place, id_client, id_tariff, summa FROM product WHERE id_prod = {$_GET['red_id']}";
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
				<td><select name="id_place">
                <?php
                include 'conn.php';
                $sql_select = "SELECT id_place, warehouse FROM placement";
                $result_select = mysqli_query($link, $sql_select);
                while ($row = mysqli_fetch_array($result_select))
                {
                    echo "<option value = ' ".$row['id_place']."'>".$row['warehouse']."</option>";
                }
                ?>
                </select>
                </td>
			</tr>
			<tr>
				<td>ФИО клиента</td>
				<td><select name="id_client">
                <?php
                include 'conn.php';
                $sql_select = "SELECT id_client, FIO FROM client";
                $result_select = mysqli_query($link, $sql_select);
                while ($row = mysqli_fetch_array($result_select))
                {
                    echo "<option value = ' ".$row['id_client']."'>".$row['FIO']."</option>";
                }
                ?>
                </select>
                </td>
			</tr>
			<tr>
				<td>Наименование тарифа</td>
				<td><select name="id_tariff">
				<?php
                include 'conn.php';
                $sql_select = "SELECT id_tariff, name_tarif FROM tariff";
                $result_select = mysqli_query($link, $sql_select);
                while ($row = mysqli_fetch_array($result_select))
                {
                    echo "<option value = '".$row['id_tariff']."'>".$row['name_tarif']."</option>";
                }
                ?>
                </select>
				</td>
			</tr>
			<tr>
				<td>Стоимость</td>
				<td><input type="text" name="summa" value="<?=isset($_GET['red_id']) ? $row['summa'] : ''; ?>"></td>
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