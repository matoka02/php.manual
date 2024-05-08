<?php

/*===Operator Precedence===*/

/*
Порядок выполнения операторов
https://www.php.net/manual/ru/language.operators.precedence.php
*/

$a = 3 * 3 % 5;
var_dump($a);

//$a2 = true ? 0 : true ? 1 : 2;    // Fatal error: Unparenthesized `a ? b : c ? d : e` is not supported
$a2 = (true ? 0 : true) ? 1 : 2;
var_dump($a2);

$a3 = 1;
$b = 2;
$a3 = $b += 3;
var_dump($a3);

$a4 = 1;
echo $a4 + $a4++; // может вывести как 2, так и 3

$i = 1;
$array[$i] = $i++; // может установить индекс как 1, так 2

echo '<br>';
$x = 4;
// следующий код может выдать неожиданный результат:
echo "x минус 1 равно " . $x - 1 . ", ну, я надеюсь\n";

// поскольку он вычисляется таким образом (до PHP 8.0.0):
//echo '<br>';
//echo (("x минус один равно " . $x) - 1) . ", ну, я надеюсь\n";

// требуемый приоритет следует задать скобками:
echo '<br>';
echo "x минус 1 равно " . ($x - 1) . ", ну, я надеюсь\n";

echo '<br><br>';
echo (5 % 3) . "<br>";           // печатает 2
echo (5 % -3) . "<br>";          // печатает 2
echo (-5 % 3) . "<br>";          // печатает -2
echo (-5 % -3) . "<br>";         // печатает -2

//Математические функции
//https://www.php.net/manual/ru/ref.math.php


/*===Increment and decrement operators===*/

echo '<hr>';
echo 'Постфиксный инкремент:', PHP_EOL;
$a = 5;
var_dump($a++);           // 5
var_dump($a);             // 6
echo 'Префиксный инкремент:', PHP_EOL;
$a = 5;
var_dump(++$a);           // 6
var_dump($a);             // 6
echo 'Постфиксный декремент:', PHP_EOL;
$a = 5;
var_dump($a--);           // 5
var_dump($a);             // 4
echo 'Префиксный декремент:', PHP_EOL;
$a = 5;
var_dump(--$a);           // 4
var_dump($a);             // 4

echo '<br>';
echo '== Буквенные строки ==' . PHP_EOL;
$s = 'W';
for ($n = 0; $n < 6; $n++) {
  echo ++$s . PHP_EOL;
}
// Буквенно-цифровые строки ведут себя иначе
echo '<br>';
echo '== Буквенно-цифровые строки ==' . PHP_EOL;
$d = 'A8';
for ($n = 0; $n < 6; $n++) {
  echo ++$d . PHP_EOL;
}
$d = 'A08';
for ($n = 0; $n < 6; $n++) {
  echo ++$d . PHP_EOL;
}

echo '<br>';
$s = "5d9";
var_dump(++$s);     // string '5e0'
var_dump(++$s);     // float 6


/*===Assignment Operators===*/

echo '<hr>';
$a = ($b = 4) + 5;
print_r($a);
echo '<br>';
$a = 3;
$a += 5; // устанавливает для переменной $a значение 8, как если бы было написано: $a = $a + 5;
$b = "Привет";
$b .= "-привет!"; // устанавливает переменной $b значение «Привет-привет!», как и $b = $b . "-привет!";
print_r($a);
echo '<br>';
print_r($b);

//Присваивание по ссылке
$a = 3;
$b = &$a; // $b — это ссылка на переменную $a

echo '<br>';
print_r($a);      // печатает 3
echo '<br>';
print_r($b);      // печатает 3
$a = 4; // меняем переменную $a
echo '<br>';
print_r($a);      // печатает 4
echo '<br>';
print_r($b);      // печатает 4

/**
Операторы арифметического присваивания
Пример	  Эквивалент  	Операция
$a += $b	$a = $a + $b	Сложение
$a -= $b	$a = $a - $b	Вычитание
$a *= $b	$a = $a * $b	Умножение
$a /= $b	$a = $a / $b	Деление
$a %= $b	$a = $a % $b	Модуль
$a **= $b	$a = $a ** $b	Возведение в степень

Операторы побитового присваивания
Пример	  Эквивалент	  Операция
$a &= $b	$a = $a & $b	Побитовое И
$a |= $b	$a = $a | $b	Побитовое ИЛИ
$a ^= $b	$a = $a ^ $b	Побитовое исключающее ИЛИ (Xor)
$a <<= $b	$a = $a << $b	Побитовый сдвиг влево
$a >>= $b	$a = $a >> $b	Побитовый сдвиг вправо

Другие операторы присваивания
Пример	  Эквивалент	  Операция
$a .= $b	$a = $a . $b	Конкатенация строк
$a ??= $b	$a = $a ?? $b	Объединение с Null
**/

/*===Bitwise Operators===*/

echo '<hr>';
print('<a href="http://php.manual/operators/bitwise.php">http://php.manual/operators/bitwise.php</a>');


