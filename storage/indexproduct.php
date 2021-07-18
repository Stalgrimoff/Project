<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление в таблицу данных product</title>
</head>
<body>
    <h1>Добавление данных в таблицу product</h1>
    <form action="insert4.php" method="post" name="action">
        <table>
            <tr>
                <td>Введите склад</td>
                <td><input type="text" name="id_place"></td>
                </td>
            </tr>
            <tr>
                <td>Введите ID клиента</td>
                <td><select name="id_client">
                <?php
                include 'conn.php';
                $sql_select = "SELECT id_client, FIO FROM client";
                $result_select = mysqli_query($link, $sql_select);
                while ($row = mysqli_fetch_array($result_select))
                {
                    echo "<option value = '".$row['id_client']."'>".$row['FIO']."</option>";
                }
                ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Введите ID тарифа</td>
                <td><select name="id_tarif">
                <?php
                include 'conn.php';
                $sql_select = "SELECT id_tarif, name_tarif FROM tariff";
                $result_select = mysqli_query($link, $sql_select);
                while ($row = mysqli_fetch_array($result_select))
                {
                    echo "<option value = '".$row['id_tarif']."'>".$row['name_tarif']."</option>";
                }
                ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Введите стоимость хранения</td>
                <td> <input type="text" name="price"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Добавить данные">
                <input type="reset" value="Очистить форму"></td>
            </tr>
        </table>
    </form>
    <form action="admin.php" method="post">
		<input type="submit" value="Вернуться назад">
	</form>
</body>
</html>