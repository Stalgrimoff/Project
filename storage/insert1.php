<?php
    include 'conn.php';
    $id_place = array();
    $id_place = htmlentities(trim($_POST['id_place']));
    $row = htmlentities(trim($_POST['row']));
    $point = htmlentities(trim($_POST['point']));

    if (isset($id_place) && isset($row) && isset($point))
    {
        //формируем запрос на добавление
        $sql = "INSERT INTO  car (id_place, row, point) VALUES ('$id_place', '$row', '$point')";
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