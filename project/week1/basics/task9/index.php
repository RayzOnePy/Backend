<?php 
    function write($text)
    {
        echo($text);
        echo("<br>");
    }
    // напишите функцию, принимающую на вход 2 аргумента - массив и какое-либо значение.
    // Функция возвращает true, если переданное значение присутствует в массиве и false - если нет.
    write("task1");
    function find_num($array, $x)
    {
        foreach($array as $num)
        {
            if ($num == $x)
            {
                return true;
            }
        }
        return false;
    }

    $array = [1, 4, 76, 621, 555];
    $x = 4;
    $array_has_num = (boolean)(!!find_num($array, $x));
    if ($array_has_num)
        write("Утверждение что число $x присутствует в массиве - true");
    else
        write("Утверждение что число $x присутствует в массиве - false");

    // напишите функцию, принимающую на вход 2 аргумента - массив и какое-либо значение. 
    // Функция возвращает число вхождений числа в массив. Например: для массива [1, 2, 1, 3] число вхождений числа "1" будет равно двум.
    write("task2");
    function num_count($array, $x)
    {
        $count = 0;
        foreach($array as $num)
        {
            if ($num == $x)
                $count++;
        }
        return $count;
    }

    $array = [12, 12, 3, 4, 5, 12];
    $x = 12;
    $num_count = num_count($array, $x);
    write("$num_count");

    // Дана строка с числами, разделенными пробелом.
    // Найдите все четные числа и выведите их, разделяя пробелами.
    // Порядок чисел должен быть таким же, как и на входе.
    write("task3");
    $nums = "1 2 3 4 5 6 7 8 9";
    $array_nums = explode(" ", $nums);
    foreach($array_nums as $num)
    {
        if($num % 2 == 0)
            echo("$num ");
    }
    echo("<br>");

    // В этой задаче вам нужно написать код, который будет выводить первые n чисел последовательности фибоначи.
    write("task4");
    function fibonacci(int $x)
    {
        if ($x == 1 || $x == 2)
        {
            return 1;
        }
        return fibonacci($x - 1) + fibonacci($x - 2);
    }

    $x = 6;
    for($i = 1; $i < $x; $i++)
    {
        $temp = fibonacci($i);
        echo("$temp ");
    }
?>