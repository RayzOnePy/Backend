<?php
    //На вход подается строка из чисел, разделенных пробелами.
    //Замените каждый элемент строки произведением всех других элементов.

    $nums_string = "1 2 3";
    $nums_array = explode(" ", $nums_string);
    $temp_nums_array = [];
    for($i = 0; $i < count($nums_array); $i++)
    {
        $multiply = 1;
        for($j = 0; $j < count($nums_array); $j++)
        {
            if($i != $j)
            {
                $multiply *= $nums_array[$j];
            }
        }
        $temp_nums_array[] = $multiply;
    }
    $nums_array = $temp_nums_array;
    var_dump($nums_array);
    echo("<br>");

    //На вход подается строка целых чисел, разделенных пробелами.
    //Найдите максимальную разницу между двумя элементами строки при условии, что меньшее число должно находиться справа от большего.
    $nums_string = "1 6 4 3";
    $nums_array = explode(" ", $nums_string);
    $max_difference = -1;
    for($i = 0; $i < count($nums_array); $i++)
    {
        for($j = $i; $j < count($nums_array); $j++)
        {
            if($nums_array[$i] - $nums_array[$j] > 0 && $nums_array[$i] - $nums_array[$j] > $max_difference)
                $max_difference = $nums_array[$i] - $nums_array[$j];
        }
    }
    echo("Максимальная разница - $max_difference");