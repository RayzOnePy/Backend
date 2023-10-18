<?php
    // На вход подается строка целых чисел, разделенных пробелами.
    // Найдите наибольшее возможное число, составленное путём конкатенации этих чисел друг к другу.
    
    function largestNumber($nums) {
        function compare($x, $y) {
            return $y . $x <=> $x . $y;
        }

        usort($nums, 'compare');

        $result = implode('', $nums);

        return $result;
    }
    $nums_str = '100 95 9 2 42 11 81';
    $nums_array = explode(' ', $nums_str);

    $result = largestNumber($nums_array);
    echo $result;