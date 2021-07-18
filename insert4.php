<?php
    include 'conn.php';
    $id_prod = htmlentities(trim($_POST['id_prod']));
    $id_place = htmlentities(trim($_POST['id_place']));
    $id_client = htmlentities(trim($_POST['id_client']));
    $id_tariff = htmlentities(trim($_POST['id_tariff']));
    $summa = htmlentities(trim($_POST['summa']));

    if (isset($id_place) && isset($id_client) && isset($id_tariff) && isset($summa))
    {
        //формируем запрос на добавление
        $sql = "INSERT INTO product (`id_place`, `id_client`, `id_tariff`, `summa`) VALUES ('$id_place', '$id_client', '$id_tariff', '$summa')";
        //проверка результата на добавление
        $result = mysqli_query($link, $sql);
        if($result){
            echo "Данные успешно добавлены";
        }
        else{
            echo "Произошла ошибка: " .mysqli_error($link);
        }
    }
    mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Добавление в таблицу post</title>
</head>
<body>
    <form action="admin.php" method="post">
    <input type="submit" value="Вернуться назад">
    </form>
</body>
</html>