<?php
    include 'conn.php';
    $id_client = htmlentities(trim($_POST['id_client']));
    $FIO = htmlentities(trim($_POST['FIO']));
    $TEL = htmlentities(trim($_POST['TEL']));


    if (isset($id_client) && isset($FIO) && isset($TEL))
    {
        //формируем запрос на добавление
        $sql = "INSERT INTO `client` (`FIO`, `TEL`) VALUES ('$FIO', '$TEL')";
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