<?php
    require __DIR__ . '/auth.php';
    $login = getUserLogin();

    if ($login !== null && !empty($_FILES['attachment'])) {
        $file = $_FILES['attachment'];

        $srcFileName = $file['name'];
        $newFilePath = __DIR__ . '/uploads/' . $srcFileName;

        $allowedExtensions = ['jpg', 'png', 'gif'];
        $extension = pathinfo($srcFileName, PATHINFO_EXTENSION);
        
        if (!in_array($extension, $allowedExtensions)) 
            $error = 'Загрузка файлов с таким расширением запрещена!';
        else if($_FILES['attachment']['size'] >= 8388608)
            $error = 'Файл должен быть меньше 8 мб';
        else if ($file['error'] !== UPLOAD_ERR_OK) 
            $error = 'Ошибка при загрузке файла.';
        else if (file_exists($newFilePath)) 
            $error = 'Файл с таким именем уже существует';
        else if (!move_uploaded_file($file['tmp_name'], $newFilePath))
            $error = 'Ошибка при загрузке файла';
        else 
            $result = "/week1/basics/task18/uploads/". $srcFileName;
    }
?>
<html>
<head>
    <title>Загрузка файла</title>
</head>
<body>
    <?php if ($login === null): ?>
        <a href="login.php">Авторизуйтесь</a>
    <?php else: ?>
        Добро пожаловать, <?= $login ?> |
        <a href="logout.php">Выйти</a>
        <br>
        <?php if (!empty($error)): ?>
            <?= $error ?>
        <?php elseif (!empty($result)): ?>
            <?= $result ?>
        <?php endif; ?>
        <br>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="attachment">
            <input type="submit">
        </form>
    <?php endif; ?>
</body>
</html>