<?php
    $files = scandir(__DIR__ . '/');
    foreach ($files as $file) {
        // echo("$file ");
        if (is_dir($file)) {
            echo("$file <br>");
        }
    }
?>