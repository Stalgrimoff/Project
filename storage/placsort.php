<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Сортировка</title>
</head>
<body>
	<ul>
		<li><a href="placsort.php?sort=warehouse-asc"> Склад от А до Я </a></li>
		<li><a href="placsort.php?sort=warehouse-desc"> Склад от Я до А</a></li>
		<li><a href="placsort.php?sort=default"> По умолчанию</a></li>
		<li><a href="placsort.php?sort=string-asc"> Ряд по возрастанию</a></li>
		<li><a href="placsort.php?sort=string-desc"> Ряд по убыванию</a></li>
	</ul>
</body>
</html>
<?php
include 'conn.php';
$sorting = $_GET['sort'];

switch ($sorting) {
	case 'warehouse-asc':
	$sorting_sql = 'ORDER BY warehouse ASC';
	break;
	
	case 'warehouse-desc':
	$sorting_sql = 'ORDER BY warehouse DESC';
	break;

	case 'string-asc':
	$sorting_sql = 'ORDER BY string ASC';
	break;
	
	case 'string-desc':
	$sorting_sql = 'ORDER BY string DESC';
	break;

	default:
	$sorting_sql = '';
	break;
}
$sql = "SELECT * FROM placement $sorting_sql";
$result_sql = mysqli_query($link, $sql);
echo '<table border=1>'.
'<tr>'.
'<td>ID склада</td>'.
'<td>Название склада</td>'.
'<td>Ряд</td>'.
'<td>Ячейка</td>'.
'</tr>';
while ($row = mysqli_fetch_array($result_sql)) {
	echo
	'<tr>'.
	"<td>{$row['id_place']}</td>".
	"<td>{$row['warehouse']}</td>".
	"<td>{$row['string']}</td>".
	"<td>{$row['position']}</td>".
	'</tr>';
}
echo '</table>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="admin.php" method="post">
	    <input type="submit" value="Вернуться назад">
	</form>
</body>
</html>