<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление в таблицу данных placement</title>
</head>
<body>
    <h1>Добавление данных в таблицу placement</h1>
    <form action="insert1.php" method="post" name="action">
        <table>
            <tr>
                <td>Введите склад</td>
                <td> <input type="text" name="id_place"></td>
            </tr>
            <tr>
                <td>Введите ряд</td>
                <td> <input type="text" name="row"></td>
            </tr>
            <tr>
                <td>Введите место</td>
                <td> <input type="text" name="point"></td>
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