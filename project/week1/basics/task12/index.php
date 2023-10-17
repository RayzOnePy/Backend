<?php 
    function write($text)
    {
        echo($text);
        echo("<br>");
    }
    //На вход подается строка из чисел, разделенных пробелами.
    //Найдите все числа, встречающиеся 2 и более раз. Выведите их в любом порядке, разделяя пробелами.

    $nums_string = '3 2 5 2 1 3';
    write($nums_string);
    $nums_array = explode(' ', $nums_string);
    $duplicate = [];

    foreach($nums_array as $num)
    {
        if(!isset($duplicate[$num]))
        {
            $duplicate[$num] = 1;
        }
        else
        {
            $duplicate[$num]++;
        }

        if($duplicate[$num] === 2)
        {
            echo("$num ");
        }
    }
    echo("<br>");

    //На вход подается строка из чисел, разделенных пробелами.
    //Найдите максимальное произведение двух чисел из этой строки.

    $nums_str = '1 2 3 4';
    $nums_array = explode(' ', $nums_str);

    $max = 0;
    foreach($nums_array as $i => $num1)
    {
        foreach($nums_array as $j => $num2)
        {
            if($i === $j)
            {
                continue;
            }
            if(($num1 * $num2) > $max)
            {
                $max = $num1 * $num2;
            }
        }
    }

    write("максимальное произведение: $max");
?>