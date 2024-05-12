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
function takes_many_args(
  $first_arg,
  $second_arg,
  $a_very_long_argument_name,
  $arg_with_default = 5,
  $again = 'a default string', // Конечная запятая не допускалась до PHP 8.0.0
)
{
}

// Передача аргументов по ссылке
function add_some_extra(&$string)
{
  $string .= 'и кое-что ещё.';
}
$str = 'Это строка, ';
add_some_extra($str);
echo $str;

// Значения по умолчанию для параметров в функциях
echo '<br>';
function makecoffee($type = "капучино")
{
  return "Готовим чашку $type.\n";
}
echo makecoffee();                  // Готовим чашку капучино.
echo makecoffee(null);         // Готовим чашку .
echo makecoffee("эспрессо");   // Готовим чашку эспрессо.

// Нескалярные типы как значения по умолчанию
echo '<br>';
function makecoffee2($types = array("капучино"), $coffeeMaker = NULL)
{
  $device = is_null($coffeeMaker)
    ? "вручную"
    : $coffeeMaker
  ;

  return "Готовлю чашку " . join(", ", $types) . " $device. \n";
}
echo makecoffee2();
echo makecoffee2(array("капучино", "лавацца"), "в чайнике");

// Объекты как значения по умолчанию, с PHP 8.1.0
echo '<br>';

class DefaultCoffeeMaker
{
  public function brew()
  {
    return "Приготовление кофе.\n";
  }
}

class FancyCoffeeMaker
{
  public function brew()
  {
    return "Приготовление прекрасного кофе только для вас.\n";
  }
}

function makecoffee3($coffeeMaker = new DefaultCoffeeMaker()): string
{
  return $coffeeMaker->brew();
}

echo makecoffee3();
echo makecoffee3(new FancyCoffeeMaker());

// Неправильное определение значений по умолчанию для параметров функции
echo '<br>';
//function makeyogurt($container = "миску", $flavour)
//{
//  return "Делаем $container с $flavour йогуртом.\n";
//}
//
//echo makeyogurt("малиновым");

// Deprecated: Optional parameter $container declared before required parameter $flavour is implicitly treated as a required parameter on line 113
// Fatal error: Uncaught ArgumentCountError: Too few arguments to function makeyogurt(), 1 passed on line 116 and exactly 2 expected on line 113
// ArgumentCountError: Too few arguments to function makeyogurt(), 1 passed on line 116 and exactly 2 expected on line 113

// Правильное определение значений по умолчанию для параметров функции
echo '<br>';
function makeyogurt2($flavour2, $container2 = "миску")
{
  return "Делаем $container2 с $flavour2 йогуртом.\n";
}

echo makeyogurt2("малиновым");

// Правильное определение значений по умолчанию для параметров функции (с PHP 8.0.0)
echo '<br>';
function makeyogurt3($container3 = "миску", $flavour3 = "малиновым", $style3 = "греческим")
{
  return "Делаем $container3 с $flavour3 $style3 йогуртом.\n";
}

echo makeyogurt3(style3: "натуральным");

// Объявление необязательных аргументов после обязательных аргументов
echo '<br>';
//function foo3($a = [], $b) {}     // Функция не присвоит значение по умолчанию; устарело с PHP 8.0.0
function foo4($a, $b) {}          // Функционально эквивалентны, без уведомления об устаревании
function bar3(A $a = null, $b) {} // Всё ещё разрешается; переменная $a обязательна, но допускает
// значение null
function bar4(?A $a, $b) {}       // Рекомендуется

// Списки аргументов переменной длины
echo '<br>';
function sum(...$numbers)
{
  $acc = 0;
  foreach ($numbers as $n) {
    $acc += $n;
  }
  return $acc;
}
echo sum(sum(1, 2, 3, 4));

// Передача аргументов через spread-оператор ...
echo '<br>';
function add($a, $b)
{
  return $a + $b;
}
echo add(...[1, 2]) . '<br>';
$a = [1, 2];
echo add(...$a);

// Аргументы с подсказкой типа
