<?php
include 'conn.php';
// определение текущей страницы 
if (isset($_GET['page'])){
  $page = $_GET['page'];
}else $page = 1;

$kol = 2; //количество записей для вывода
$art = ($page * $kol) - $kol;

//Определяем все количество записей в таблице
$res = mysqli_query($link, "SELECT COUNT(*) FROM product ");
$row = mysqli_fetch_row($res);
$total = $row[0];

//количесвто страниц для пагинации
$str_pag = ceil($total / $kol);

//формируем пагинацию
for ($i = 1; $i <= $str_pag; $i++){
  echo "<a href=prodselect.php?page=".$i."> Страница ".$i."</a>";
}
echo "<br>";
//запрос и вывод записей
$result = mysqli_query($link, "SELECT product.id_prod, placement.warehouse, client.FIO, tariff.name_tarif, product.summa FROM product INNER JOIN placement ON product.id_place = placement.id_place INNER JOIN client ON product.id_client = client.id_client INNER JOIN tariff ON product.id_tariff = tariff.id_tariff LIMIT $art,$kol");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2> Таблица "Хранение"</h2>
    <table border=1>
          <tr>
            <td>Код хранения</td>
            <td>Наименование склада</td>
            <td>ФИО клиента</td>
            <td>Название тарифа</td>
            <td>Стоимость</td>
          </tr>
<?php
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>'.
              "<td>{$row['id_prod']}</td>".
              "<td>{$row['warehouse']}</td>".
              "<td>{$row['FIO']}</td>".
              "<td>{$row['name_tarif']}</td>".
              "<td>{$row['summa']}</td>".
            '</tr>';
        }
?>
</table>
        <form action="admin.php" method="post">
        <input type="submit" value="Вернуться назад">
        </form>
</body>
</html>