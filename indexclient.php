<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление в таблицу данных client</title>
</head>
<body>
    <h1>Добавление данных в таблицу client</h1>
    <form action="insert3.php" method="post" name="action">
        <table>
            <tr>
                <td>Введите ФИО</td>
                <td><input type="text" name="FIO"></td>
            </tr>
            <tr>
                <td>Введите номер телефона</td>
                <td> <input type="text" name="TEL"></td>
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