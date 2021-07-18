<?php
include 'conn.php';
// определение текущей страницы 
if (isset($_GET['page'])){
  $page = $_GET['page'];
}else $page = 1;

$kol = 2; //количество записей для вывода
$art = ($page * $kol) - $kol;

//Определяем все количество записей в таблице
$res = mysqli_query($link, "SELECT COUNT(*) FROM client ");
$row = mysqli_fetch_row($res);
$total = $row[0];

//количесвто страниц для пагинации
$str_pag = ceil($total / $kol);

//формируем пагинацию
for ($i = 1; $i <= $str_pag; $i++){
  echo "<a href=clientselect.php?page=".$i."> Страница ".$i."</a>";
}
echo "<br>";
//запрос и вывод записей
$result = mysqli_query($link, "SELECT * FROM client LIMIT $art,$kol");
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h2> Таблица "Клиенты"</h2>
	<table border=1>
		  <tr>
		  <td>Код Клиента</td>
		  <td>ФИО</td>
		  <td>ТЕЛЕФОН</td>
		  </tr>
<?php
		while ($row = mysqli_fetch_array($result)) {
			echo '<tr>'.
			"<td> {$row['id_client']}</td>".
			"<td> {$row['FIO']}</td>".
			"<td> {$row['TEL']}</td>".
			'</tr>';
		}
?>
</table>
		<form action="admin.php" method="post">
	    <input type="submit" value="Вернуться назад">
	    </form>
</body>
</html>