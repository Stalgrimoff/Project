<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Сортировка</title>
</head>
<body>
	<ul>
		<li><a href="tarifsort.php?sort=name_tarif-asc"> Название тарифа от А до Я </a></li>
		<li><a href="tarifsort.php?sort=name_tarif-desc"> Название тарифа от Я до А</a></li>
		<li><a href="tarifsort.php?sort=default"> По умолчанию</a></li>
		<li><a href="tarifsort.php?sort=weight-asc"> Вес по возрастанию</a></li>
		<li><a href="tarifsort.php?sort=weight-desc"> Вес по убыванию</a></li>
	</ul>
</body>
</html>
<?php
include 'conn.php';
$sorting = $_GET['sort'];

switch ($sorting) {
	case 'name_tarif-asc':
	$sorting_sql = 'ORDER BY name_tarif ASC';
	break;
	
	case 'name_tarif-desc':
	$sorting_sql = 'ORDER BY name_tarif DESC';
	break;

	case 'weight-asc':
	$sorting_sql = 'ORDER BY weight ASC';
	break;
	
	case 'weight-desc':
	$sorting_sql = 'ORDER BY weight DESC';
	break;

	default:
	$sorting_sql = '';
	break;
}
$sql = "SELECT * FROM tariff $sorting_sql";
$result_sql = mysqli_query($link, $sql);
echo '<table border=1>'.
'<tr>'.
'<td>ID тарифа</td>'.
'<td>Название тарифа</td>'.
'<td>Вес</td>'.
'<td>Время хранения</td>'.
'</tr>';
while ($row = mysqli_fetch_array($result_sql)) {
	echo
	'<tr>'.
	"<td>{$row['id_tariff']}</td>".
	"<td>{$row['name_tarif']}</td>".
	"<td>{$row['weight']}</td>".
	"<td>{$row['storage_life']}</td>".
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