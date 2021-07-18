<?php
$exit = $_POST['exit'];
if (!empty($exit)){
	unset($_SESSION['login']);
	unset($_SESSION['pass']);
	exit("<html><head><title>Загрузка..</title><meta http-equiv='Refresh' content='0; URL=index.php'></head></html>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Добро пожаловать Админ</title>
</head>
<body>
    
    <h1>Представления</h1>
    <h2>Хранение</h2>
    <form action="prod.php" method="post">
		<input type="submit" name="connect" value="Открыть">
    </form>

    <h1>Работа с таблицей tariff</h1>
    <h3>Вывод</h3>
    <form action="tariffselect.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Вывести данные"></td>
            </tr>
        </table>
    </form>
    <h3>Ввод</h3>
    <form action="indextariff.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Добавить данные"></td>
            </tr>
        </table>
    </form>
    <h3>Сортировка</h3>
     <form action="tarifsort.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Сортировать данные"></td>
            </tr>
        </table>
    </form>
    <h3>Поиск</h3>
    <form action="tariffsertch.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Поиск данных"></td>
            </tr>
        </table>
    </form>
    <h3>Обновление</h3>
    <form action="uptariff.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Обновление данных"></td>
            </tr>
        </table>
    </form>

    <h1>Работа с таблицей client</h1>
    <h3>Вывод</h3>
    <form action="clientselect.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Вывести данные"></td>
            </tr>
        </table>
    </form>
    <h3>Ввод</h3>
    <form action="indexclient.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Добавить данные"></td>
            </tr>
        </table>
    </form>
    <h3>Поиск</h3>
    <form action="clientsertch.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Поиск данных"></td>
            </tr>
        </table>
    </form>
    <h3>Обновление</h3>
    <form action="upclient.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Обновление данных"></td>
            </tr>
        </table>
    </form>
    




    <h1>Работа с таблицей placement</h1>
    
    <h3>Вывод</h3>
    <form action="placeselect.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Вывести данные"></td>
            </tr>
        </table>
    </form>
    <h3>Ввод</h3>
    <form action="indexplacement.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Добавить данные"></td>
            </tr>
        </table>
    </form>
    <h3>Сортировка</h3>
     <form action="placsort.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Сортировать данные"></td>
            </tr>
        </table>
    </form>
    <h3>Поиск</h3>
    <form action="placesertch.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Поиск данных"></td>
            </tr>
        </table>
    </form>
    <h3>Обновление</h3>
    <form action="upplace.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Обновление данных"></td>
            </tr>
        </table>
    </form>
    


    <h1>Работа с таблицей product</h1>
    <h3>Вывод</h3>
    <form action="prodselect.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Вывести данные"></td>
            </tr>
        </table>
    </form>
    <h3>Ввод</h3>
    <form action="indexproduct.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Добавить данные"></td>
            </tr>
        </table>
    </form>
    <h3>Поиск</h3>
    <form action="prodsertch.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Поиск данных"></td>
            </tr>
        </table>
    </form>
    <h3>Обновление</h3>
    <form action="upprod.php" method="post" name="action">
        <table>
            <tr>
                <td><input type="submit" value="Обновление данных"></td>
            </tr>
        </table>
    </form>
    
    
    
	<form method="post">
		<input type="submit" value="Выйти" name="exit">
	</form>
</body>
</html>