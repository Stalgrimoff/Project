<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Клиенты</title>
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
	$sql = "SELECT * FROM client";
	$result = mysqli_query($link, $sql);
	echo '<table border=1>'.
		 '<tr>'.
		 '<td>ID клиента</td>'.
		 '<td>ФИО</td>'.
		 '<td>Номер телефона</td>'.
		 '</tr>';
		 while ($row = mysqli_fetch_array($result)) {
		 	echo 
		 	'<tr>'.
		 	"<td>{$row['id_client']}</td>".
		 	"<td>{$row['FIO']}</td>".
		 	"<td>{$row['TEL']}</td>".
		 	'</tr>';
		 }
		 echo '</table>';
} else {
	$sqllike = "SELECT * FROM client WHERE id_client LIKE '%$poisk%' OR FIO LIKE
	'%$poisk%' OR TEL LIKE '%$poisk%' ";
	$res = mysqli_query($link, $sqllike);
	echo '<table border=1>'.
		 '<tr>'.
		 '<td>ID клиента</td>'.
		 '<td>ФИО</td>'.
		 '<td>Номер телефона</td>'.
		 '</tr>';
		while ($row1 = mysqli_fetch_array($res)) {
		 	echo 
		 	'<tr>'.
		 	"<td>{$row1['id_client']}</td>".
		 	"<td>{$row1['FIO']}</td>".
		 	"<td>{$row1['TEL']}</td>".
		 	'</tr>';
		 }
		 echo '</table>';
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Клиенты</title>
</head>
<body>
	<form action="admin.php" method="post">
	    <input type="submit" value="Вернуться назад">
	    </form>
</body>
</html>