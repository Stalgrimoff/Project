<?php
    include 'conn.php';
    $id_place = htmlentities(trim($_POST['id_place']));
    $warehouse = htmlentities(trim($_POST['warehouse']));
    $string = htmlentities(trim($_POST['string']));
    $position = htmlentities(trim($_POST['position']));

    if (isset($warehouse) && isset($string) && isset($position))
    {
        //формируем запрос на добавление
        $sql = "INSERT INTO  placement (`warehouse`, `string`, `position`) VALUES ('$warehouse', '$string', '$position')";
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
    <title>Добавление в таблицу placement</title>
</head>
<body>
    <form action="admin.php" method="post">
    <input type="submit" value="Вернуться назад">
    </form>
</body>
</html>