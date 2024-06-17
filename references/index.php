<?php

namespace references;
use stdClass;

/*===Присвоение по ссылке===*/

// Использование ссылок с неинициализированными переменными

function foo(&$var){}

foo($a);

$b = array();
foo($b['b']);
var_dump(array_key_exists('b', $b));

$c = new stdClass();
foo($c->d);
var_dump(property_exists($c, 'd'));

//Присвоение ссылок глобальным переменным внутри функции
echo '<br>';

$var1 = "Пример переменной";
$var2 = "";

function global_references($use_globals)
{
  global $var1, $var2;
  if (!$use_globals) {
    $var2 =& $var1;
  } else {
    $GLOBALS['var2'] =& $var1;
  }
}

global_references(false);
echo "значение var2: '$var2' <br>";
global_references(true);
echo "значение var2: '$var2' <br>";

// Ссылки и foreach
echo '<br>';
$ref = 0;
$row =& $ref;
foreach (array(1, 2, 3) as $row) {
  echo "$row; ";
}
echo $ref;

echo '<br>';
$a2 = 1;
$b2 = array(2, 3);
$arr2 = array(&$a2, &$b2[0], &$b2[1]);
$arr2[0]++;
$arr2[1]++;
$arr2[2]++;
var_dump($arr2);

echo '<br>';
/* Присвоение скалярных переменных */
$a3 = 1;
$b3 =& $a3;
$c3 = $b3;
$c3 = 7; //$c3 не ссылка и не изменяет значений $a3 и $b3
var_dump($c3);

/* Присвоение массивов */
$arr4 = array(1);
$a4 =& $arr4[0]; // $a4 и $arr4[0] ссылаются на одно значение
$arr5 = $arr4; // присвоение не по ссылке!
$arr5[0]++;
/* $a4 == 2, $arr4 == array(2) */
/* Содержимое $arr изменилось, хотя было присвоено не по ссылке! */
var_dump($arr5);


/*===Передача по ссылке===*/

echo '<hr>';

function foo6(&$var6)
{
  $var6++;
}

$a6 = 5;
foo6($a6);
var_dump($a6);

echo '<br>';

function foo7(&$var7)
{
  $var7++;
}

function &bar7()
{
  $a7 = 5;
  return $a7;
}

foo7(bar7());
echo foo7(bar7());


/*===Возврат по ссылке===*/

echo '<hr>';

class foo
{
  public $value = 42;

  public function &getValue()
  {
    return $this->value;
  }
}

$obj = new foo;
$myValue =& $obj->getValue();
$obj->value = 2;
echo $myValue;

echo '<br>';

//  Для использования возвращаемой ссылки применять присвоение по ссылке:
function &collector()
{
  static $collection = array();
  return $collection;
}

$collection =& collector();
$collection[] = 'foo';
var_dump($collection);

echo '<br>';

//  Для передачи возвращаемой ссылки в другую функцию, принимающую ссылку, можно использовать
// следующий синтаксис:

function &collector2()
{
  static $collection2 = array();
  return $collection2;
}

array_push(collector2(), 'foo2');

var_dump(collector2());


/*===Сброс переменных-ссылок===*/

echo '<hr>';
$a8 = 16;
$b8 =& $a8;
echo "a8: $a8, b8: $b8 <br>";
unset($a8);
if (!isset($a8)) {
  echo "a8: 0, b8: $b8 <br>";
} else{
  echo "a8: $a8, b8: $b8 <br>";
}
