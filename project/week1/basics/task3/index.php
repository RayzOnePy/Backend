<?php
    // Попробуйте следующие условия:
    if ('string') {echo 'Условие выполнилось<br>';}
    if (0) {echo 'Условие выполнилось<br>';}
    if (null) {echo 'Условие выполнилось<br>';}
    if (5) {echo 'Условие выполнилось<br>';}

    $x = 2;

    // С помощью тернарного оператора определите, является ли число чётным или нечётным и выведите результат.

    echo($x % 2 == 0 ? "$x - четное": "$x - нечетное");
?>