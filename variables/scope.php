<?php

print('<a href="http://php.manual/variables/index.php">Back</a>');
echo '<br><br>';

// переменная доступна внутри включенного скрипта b.inc
$a4 = 1;
//include 'b.inc';

echo '<br><br>';
$a3 = 1; /* Глобальная область видимости */
function test()
{
  echo $a3; /* Ссылка на переменную в локальной области видимости */
}

test();
// Warning: Undefined variable $a3 in C:\OSPanel\domains\php.manual\variables\scope.php on line 15


/*===Ключевое слово global===*/
echo '<hr>';
$a = 1;
$b = 2;

function Sum()
{
  global $a, $b;
  $b = $a + $b;
}

Sum();
echo $b;

echo '<br>';
$a2 = 1;
$b2 = 5;

function Sum2()
{
  $GLOBALS['b2'] = $GLOBALS['a2'] + $GLOBALS['b2'];
}

Sum2();
echo $b2;

echo '<br>';
function test_superglobal()
{
  echo $_POST['name'];
}


/*===Переменные, которые определили через ключевое слово static===*/
echo '<hr>';

function test2()
{
  static $a = 0;
  echo $a;                    // 0
  $a++;
}

var_dump(test2());            // null

echo '<br>';
function test3()
{
  static $count = 0;
  $count++;
  echo $count;                // 12345678910

  if ($count < 10) {
    test3();
  }

  $count--;
}

var_dump(test3());            // null

echo '<br>';
function foo()
{
  static $int = 0;         // Правильно
  static $int = 1 + 2;     // Правильно
//  static $int = sqrt(121); // Неправильно, поскольку это функция

  $int++;
  echo $int;
}

echo '<br>';

class Foo
{
  public static function counter()
  {
    static $counter = 0;
    $counter++;
    return $counter;
  }
}

class Bar extends Foo{}

var_dump(Foo::counter()); // int(1)
var_dump(Foo::counter()); // int(2)
var_dump(Bar::counter()); // int(3), до PHP 8.1.0 int(1)
var_dump(Bar::counter()); // int(4), до PHP 8.1.0 int(2)


/*===Ссылки с глобальными (global) и статическими (static) переменными===*/
echo '<hr>';

function test_global_ref()
{
  global $obj;
  $new = new stdClass();
  $obj =& $new;
}

function test_global_noref()
{
  global $obj;
  $new = new stdClass();
  $obj = $new;
}

test_global_ref();
var_dump($obj);           // null
test_global_noref();
var_dump($obj);           // object(stdClass)[1]

echo '<br>';

function &get_instance_ref()
{
  static $obj;

  echo 'Статический объект: ';
  var_dump($obj);

  if (!isset($obj)) {
    $new = new stdClass();

    // Присвоить ссылку статической переменной
    $obj = &$new;
  }

  if (!isset($obj->property)) {
    $obj->property = 1;
  } else {
    $obj->property++;
  }

  return $obj;
}

function &get_instance_noref()
{
  static $obj;

  echo 'Статический объект: ';
  var_dump($obj);

  if (!isset($obj)) {
    $new = new stdClass();

    // Присвоить объект статической переменной
    $obj = $new;
  }

  if (!isset($obj->property)) {
    $obj->property = 1;
  } else {
    $obj->property++;
  }

  return $obj;
}

$obj1 = get_instance_ref();
$still_obj1 = get_instance_ref();
echo "\n";
$obj2 = get_instance_noref();
$still_obj2 = get_instance_noref();

/*
Статический объект: NULL
Статический объект: NULL

Статический объект: NULL
Статический объект: object(stdClass)#3 (1) {
["property"]=>
  int(1)
    }
*/