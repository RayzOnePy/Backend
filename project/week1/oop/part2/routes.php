<?php
    return [
        '~^hello/(.*)$~' => [\Controllers\MainController::class, 'sayHello'],
        '~^$~' => [\Controllers\MainController::class, 'main'],
        'asd' => function () {
            var_dump("asd");
        },
        '~^(.*)$' => function () {
            var_dump("asd");
        }, 
    ];