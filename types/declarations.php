<?php

//declare(strict_types=1);
namespace types\declarations;

print('<a href="http://php.manual/types/index.php">Back</a>');
echo '<br><br>';



//Скалярные типы
//function test(boolean $param){}
//test(true);

echo '<hr>';
//void
//function &test():void{}

//Тип Callable
//Этот тип нельзя объявлять в качестве типа свойства класса.

//Объявление типов в параметрах передачи по ссылкам
echo '<hr>';

//function array_baz(array &$param)
//{
//  $param = 1;
//}
//
//$var = [];
//var_dump($var);           // массив
//array_baz($var);
//var_dump($var);           // число
//array_baz($var);


/*===Составные типы====*/

//Синтаксический сахар обнуляемого типа
echo '<hr>';

//class C{}
//
//function f(C $c = null)
//{
//  var_dump($c);
//}
//
//f(new C());
//f(null);

//Повторяющиеся и избыточные типы
echo '<hr>';
//function foo(): int|int{} // Запрещено
//function foo(): bool|false{} // Запрещено
//function foo(): int&Traversable{} // Запрещено
//function foo(): self&Traversable{} // Запрещено

//use A as B;
//function foo(): A|B {} // Запрещено («use» — часть разрешения имён)
//function foo(): A&B {} // Запрещено («use» — часть разрешения имён)

//class_alias('X', 'Y');
//function foo(): X|Y {} // Разрешено (избыточность известна только во время выполнения)
//function foo(): X&Y {} // Разрешено (избыточность известна только во время выполнения)

//Объявление типа класса
echo '<hr>';
//class C{}
//class D extends C{}
//class E{}
//
//function f(C $c)
//{
//  echo get_class($c) . "\n" . "<br>";
//}
//
//f(new C);
//f(new D);
//f(new E);

//Объявление типа интерфейса
echo '<hr>';
//interface I{  public function f(); }
//class C implements I{ public function f(){} };
//class E{}
//
//function F(I $i){
//  echo get_class($i) . "\n" . "<br>";
//}
//
//f(new C);
//f(new E);

//Объявление типа возвращаемого значения
echo '<hr>';
function sum($a, $b): float
{
  return $a + $b;
}

var_dump(sum(1, 2));

//Возвращение объекта
echo '<hr>';

class C{}

function getC(): C
{
  return new C;
}

var_dump(getC());       // object(C)[1]

//Объявление аргумента с обнуляемым типом
echo '<hr>';

class D{}

function f(?D $d)
{
  var_dump($d);         // object(D)[1]{null}
}

f(new D);
f(null);

//Объявление типа возвращаемого значения как обнуляемого
echo '<hr>';

function get_item(): ?string
{
  if (isset($_GET['item'])) {
    return $_GET['item'];
  } else {
    return null;
  }
}

//Объявление типа свойства класса
echo '<hr>';

class User
{
  public static string $foo = 'foo';
  public int $id;
  public string $username;

  public function __construct(int $id, string $username)
  {
    $this->id = $id;
    $this->username = $username;
  }
}


/*===Строгая типизация===*/

echo '<hr>';
// раскомментировать declare(strict_types=1); в начале файла

function sum2(int $a, int $b){
  return $a + $b;
}
var_dump(sum2(1, 2));           // 3
var_dump(sum2(1.5, 2.5));       // 3 без строгой типизации, с типизацией - скрипт остановлен

// аналогично
function sum3($a, $b):int{
  return $a + $b;
}
var_dump(sum3(1, 2));
var_dump(sum3(1.5, 2.5));