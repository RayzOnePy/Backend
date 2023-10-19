<?php 
    function write($text)
    {
        echo($text);
        echo("<br>");
    }

    // Напишите функцию, которая будет принимать на вход 3 аргумента с типом float и возвращать минимальное значение.
    write("Task1");
    function find_min(float $a, float $b, float $c)
    {
        if ($a < $b && $a < $c)
            return $a;
        else if ($b < $a && $b < $c)
            return $b;
        else
            return $c;
    }

    $a = 4.3;
    $b = 3.1;
    $c = 5.6;

    $min = find_min($a, $b, $c);

    write("минимальное значение среди чисел : ($a; $b; $c) - $min");

    // Напишите функцию, которая принимает на вход два аргумента по ссылкам и умножает каждый из них на 2.
    write("Task2");
    function multiply_two(&$a, &$b)
    {
        $a *= 2;
        $b *= 2;
    }

    $a = 2;
    $b = 3;

    write("$a, $b");
    multiply_two($a, $b);
    write("$a, $b");

    // Напишите функцию, считающую факториал числа (произведение целых чисел от единицы до переданного). Реализуйте с помощью рекурсии.
    write("Task3");
    function factorial($x)
    {
        if ($x == 0)
            return 1;
        else
            return $x * factorial($x - 1);
    }

    $x = 4;
    $factorial_x = factorial($x);
    write("факториал $x - $factorial_x");

    // Напишите функцию, которая будет выводить на экран целые числа от 0 до переданного значения.
    // И да, тут тоже нужно реализовать с помощью рекурсии (чтобы лучше с ней познакомиться, несмотря на то что вариант с циклом проще).
    write("Task4");
    function print_num($x)
    {
        if ($x === 0) {
            echo $x;
            return;
        }
        print_num($x - 1);
        echo (", $x");
    }
    print_num(4);
?>