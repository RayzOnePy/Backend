<?php
    function write_var_dump($arg)
    {
        var_dump($arg);
        echo("<br>");
    }
    // С помощью функции var_dump() получите результаты следующих выражений:  
    write_var_dump(!1);
    write_var_dump(!0);
    write_var_dump(!true);
    write_var_dump(2 && 3);
    write_var_dump(5 && 0);
    write_var_dump(3 || 0);
    write_var_dump(5 / 1);
    write_var_dump(1 / 5);
    write_var_dump(5 + '5string');
    write_var_dump('5' == 5);
    write_var_dump('05' == 5);
    write_var_dump('05' == '5');
?>