<?php
    return [
        '~^hello/(.*)$~' => [\Controllers\MainController::class, 'sayHello'],
        '~^bye/(.*)$~' => [\Controllers\MainController::class, 'sayBye'],
        '~^$~' => [\Controllers\MainController::class, 'main'],
        '~^articles/(\d+)$~' => [\Controllers\ArticlesController::class, 'view'],
        '~^articles/(\d+)/edit$~' => [\Controllers\ArticlesController::class, 'edit'],
        '~^articles/add$~' => [\Controllers\ArticlesController::class, 'add'],
    ];