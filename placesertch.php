<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Склад</title>
</head>
<body>
	<form method="post">
		<table>
			<tr>
				<td>Поле для поиска </td>
				<td><input type="text" name="poisk" value="<?=$_POST['poisk']; ?>"></td>
				<td><input type="submit" name="submit" value="OK"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
include('conn.php');
$poisk = $_POST['poisk'];
$reset = $_POST['reset'];
if (empty($poisk))
{
	$sql = "SELECT * FROM placement";
	$result = mysqli_query($link, $sql);
	echo '<table border=1>'.
		 '<tr>'.
		 '<td>ID склада</td>'.
		 '<td>Название склада</td>'.
		 '<td>Ряд</td>'.
		 '<td>Ячейка</td>'.
		 '</tr>';
		 while ($row = mysqli_fetch_array($result)) {
		 	echo 
		 	'<tr>'.
		 	"<td>{$row['id_place']}</td>".
		 	"<td>{$row['warehouse']}</td>".
		 	"<td>{$row['string']}</td>".
		 	"<td>{$row['position']}</td>".
		 	'</tr>';
		 }
		 echo '</table>';
} else {
	$sqllike = "SELECT * FROM placement WHERE id_place LIKE '%$poisk%' OR warehouse LIKE '%$poisk%' OR string LIKE
	'%$poisk%' OR position LIKE '%$poisk%' ";
	$res = mysqli_query($link, $sqllike);
	echo '<table border=1>'.
		 '<tr>'.
		 '<td>ID склада</td>'.
		 '<td>Название склада</td>'.
		 '<td>Ряд</td>'.
		 '<td>Ячейка</td>'.
		 '</tr>';
		while ($row1 = mysqli_fetch_array($res)) {
		 	echo 
		 	'<tr>'.
		 	"<td>{$row1['id_place']}</td>".
		 	"<td>{$row1['warehouse']}</td>".
		 	"<td>{$row1['string']}</td>".
		 	"<td>{$row1['position']}</td>".
		 	'</tr>';
		 }
		 echo '</table>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Склад</title>
</head>
<body>
	<form action="admin.php" method="post">
	    <input type="submit" value="Вернуться назад">
	    </form>
</body>
</html>