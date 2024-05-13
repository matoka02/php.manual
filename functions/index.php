<?php

$makefoo = true;
bar();
if ($makefoo) {
  function foo()
  {
    echo "Я не существую, пока выполнение программы не дойдёт до меня.\n";
  }
}
if ($makefoo) foo();
function bar()
{
  echo "Я существую сразу после запуска программы.\n";
}

echo '<br>';
function foo2()
{
  function bar2()
  {
    echo "Я не существую, пока не вызовут функцию foo2().\n";
  }
};
foo2();
bar2();

// Рекурсивные функции
function recursion($a)
{
  if ($a < 20) {
    echo $a . '<br>';
    recursion($a + 1);
  }
}


/*===Function Arguments===*/

echo '<hr>';
print('<a href="http://php.manual/functions/function_arguments.php">http://php.manual/functions/function_arguments.php</a>');


/*===Returning values===*/

echo '<hr>';
function square($num)
{
  return $num * $num;
}

echo square(4);

//  Возврат нескольких значений в виде массива
echo '<br>';
function small_numbers()
{
  return [0, 1, 2];
}
[$zero, $one, $two] = small_numbers();
list($zero, $one, $two) = small_numbers();
var_dump(small_numbers());

//  Возврат результата по ссылке
function &return_reference()
{
  return $someref;
}

$newref =& return_reference();


/*===Variable functions===*/

echo '<hr>';
print('<a href="http://php.manual/functions/variable_functions.php">http://php.manual/functions/variable_functions.php</a>');


/*===Anonymous functions===*/

echo '<hr>';
print('<a href="http://php.manual/functions/anonymous_function.php">http://php.manual/functions/anonymous_function.php</a>');


/*===Arrow functions===*/

//PHP создаёт стрелочные функции через класс Closure.

echo '<hr>';
$y = 1;
$fn1 = fn($x) => $x + $y;
// Эквивалентно получению переменной $y по значению:
$fn2 = function ($x) use ($y) {
  return $x + $y;
};
var_export($fn1(3));

//Стрелочные функции захватывают переменные по значению автоматически, даже когда функции вложены
echo '<br>';
$z = 1;
$fn = fn($x) => fn($y) => $x * $y + $z;
// Выведет 51
var_export($fn(5)(10));

//Примеры определения стрелочных функций
fn(array $x) => $x;
static fn(): int => $x;
fn($x = 42) => $x;
fn(&$x) => $x;
fn&($x) => $x;
fn($x, ...$rest) => $rest;

//Стрелочные функции не умеют изменять значения из внешней области видимости
echo '<br>';
$x = 1;
$fn = fn() => $x++; // Ничего не изменит
$fn();
var_export($x);     // Выведет 1


/*===First class callable syntax ===*/

echo '<hr>';
print('<a href="http://php.manual/functions/callable.php">http://php.manual/functions/callable.php</a>');

