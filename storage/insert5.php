<?php
    include 'conn.php';
    $id_tariff = htmlentities(trim($_POST['id_tariff']));
    $name_tarif = htmlentities(trim($_POST['name_tarif']));
    $weight = htmlentities(trim($_POST['weight']));
    $storage_life = htmlentities(trim($_POST['storage_life']));


    if (isset($storage_life) && isset($name_tarif) && isset($weight) && isset($id_tariff))
    {
        //формируем запрос на добавление
        $sql = "INSERT INTO tariff (storage_life, name_tarif, weight) VALUES ('$storage_life', '$name_tarif', '$weight')";
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
    <title>Добавление в таблицу tariff</title>
</head>
<body>
    <form action="admin.php" method="post">
    <input type="submit" value="Вернуться назад">
    </form>
</body>
</html>