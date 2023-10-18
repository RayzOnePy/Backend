<?php 
    // На вход подается строка целых уникальных (не повторяющихся) чисел, разделенных пробелами.
    // Найдите все возможные комбинации пар чисел и выведите их в любом порядке

    $nums_str = '1 2 3';
    $nums_array = explode(' ', $nums_str);

    foreach($nums_array as $num1)
    {
        foreach($nums_array as $num2)
        {
            if ($num1 != $num2)
                echo("$num1 $num2 | ");
        }
    }
?>