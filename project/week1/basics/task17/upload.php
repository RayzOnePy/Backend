<?php
    if (!empty($_FILES['attachment'])) {
        $file = $_FILES['attachment'];

        // собираем путь до нового файла - папка uploads в текущей директории
        // в качестве имени оставляем исходное файла имя во время загрузки в браузере
        $srcFileName = $file['name'];
        $newFilePath = __DIR__ . '/uploads/' . $srcFileName;

        $allowedExtensions = ['jpg', 'png', 'gif'];
        $extension = pathinfo($srcFileName, PATHINFO_EXTENSION);
        
        // [$width, $height] = getimagesize($newFilePath);

        if (!in_array($extension, $allowedExtensions)) 
            $error = 'Загрузка файлов с таким расширением запрещена!';
        else if($_FILES['attachment']['size'] >= 8388608)
            $error = 'Файл должен быть меньше 8 мб';
        // else if($width >= 1280 || $height >= 720)
        // $error = 'Изображение превышает допустимое разрешение (1280Х720)';
        else if ($file['error'] !== UPLOAD_ERR_OK) 
            $error = 'Ошибка при загрузке файла.';
        else if (file_exists($newFilePath)) 
            $error = 'Файл с таким именем уже существует';
        else if (!move_uploaded_file($file['tmp_name'], $newFilePath))
            $error = 'Ошибка при загрузке файла';
        else 
            $result = "/week1/basics/task17/uploads/". $srcFileName;
    }
?>
<html>
<head>
    <title>Загрузка файла</title>
</head>
<body>
    <?php if (!empty($error)): ?>
        <?= $error ?>
    <?php elseif (!empty($result)): ?>
        <a href="<?= $result ?>">посмотреть файл</a>
    <?php endif; ?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="attachment">
    <input type="submit">
</form>
</body>
</html>