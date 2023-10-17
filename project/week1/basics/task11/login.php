<?php
    $login = !empty($_GET['login']) ? $_GET['login'] : '';
    $password = !empty($_GET['password']) ? $_GET['password'] : '';
?>

<html>
<head>
    <title>Результат авторизации</title>
</head>
<body>
<p>
    <?php 
        if ($login != "admin")
            echo("Пользователь не найден");
        else if ($password != "QWEasd123")
            echo("Неправильный пароль");
        else 
            echo("Все хорошо!");
    ?>
</p>
</body>
</html>