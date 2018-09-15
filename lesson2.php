<?php
header("Content-type: text/html; charset=utf-8");
//1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения.
// Затем написать скрипт, который работает по следующему принципу:
//если $a и $b положительные, вывести их разность;
//если $а и $b отрицательные, вывести их произведение;
//если $а и $b разных знаков, вывести их сумму;
//Ноль можно считать положительным числом.

$a = -10;
$b = -250;

var_dump($a);
var_dump($b);

function compareAndB(int $a, int $b)
{
    if (($a >= 0) && ($b >= 0)) {
        return $a - $b;
    } else if (($a < 0) && ($b < 0)) {
        return $a * $b;
    } else
        return $a + $b;
}

echo compareAndB($a, $b);

//3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
//Обязательно использовать оператор return.

function sum(int $a, int $b)
{
    return $a + $b;
}

function devide(int $a, int $b)
{
    if ($b != 0) {
        return $a / $b;
    } else {
        echo "Делить на ноль нельзя";
    }
}

function diff(int $a, int $b)
{
    return $a - $b;
}

function mult(int $a, int $b)
{
    return $a * $b;
}

//4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
//где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
//В зависимости от переданного значения операции выполнить одну из арифметических операций
//(использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

function mathOperation(int $arg1, int $arg2, $operation)
{
    switch ($operation) {
        case "summa":
            return sum($arg1, $arg2);
        case "devide":
            return devide($arg1, $arg2);
        case "difference":
            return diff($arg1, $arg2);
        case "multiplication":
            return mult($arg1, $arg2);
        default:
            return "Anknoun operation";
    }
}

echo "<br>";

echo mathOperation($a, $b, "summa");
echo "<br>";
echo mathOperation($a, $b, "devide");
echo "<br>";
echo mathOperation($a, $b, "difference");
echo "<br>";
echo mathOperation($a, $b, "multiplication");
echo "<br>";

//6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат:
//function power($val, $pow), где $val – заданное число, $pow – степень.

function power($val, $pow)
{
    if ($pow == 0) {
        return 1;
    }
    return $val*power($val, $pow-1);
};

echo power(5, 2);
echo "<br>";
echo power(5, 3);
echo "<br>";
echo power(5, 4);
echo "<br>";



//7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
//22 часа 15 минут
//21 час 43 минуты

echo "<br>";
$hour = date("H");
$minut = date("i");
echo "<br>";

function hourEnding ($hour){
    switch ((substr($hour, 1))) {
        case '1':
            return "час";
        case '2':
        case '3':
        case '4':
            return "часа";
        default:
            return "часов";
    }
}

function minutEnding ($minut){
    switch (substr($minut, 1)) {
        case '1':
            return "минута";
        case '2':
        case '3':
        case '4':
            return "минуты";
        default:
            return "минут";
    }
}

echo( $hour. " ". hourEnding ($hour). " " . $minut . " ". minutEnding ($minut));




/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 11.09.2018
 * Time: 18:57
 */