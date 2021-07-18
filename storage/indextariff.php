<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление в таблицу данных tariff</title>
</head>
<body>
    <h1>Добавление данных в таблицу tariff</h1>
    <form action="insert5.php" method="post" name="action">
        <table>
            <tr>
                <td>Введите название тарифа</td>
                <td><input type="text" name="name_tarif"></td>
            </tr>
            <tr>
                <td>Введите вес</td>
                <td> <input type="text" name="weight"></td>
            </tr>
            <tr>
                <td>Введите длительность хранения</td>
                <td> <input type="time" name="storage_life"></td>
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