<?php

namespace classes_and_objects\inheritance;
use DateTime;

print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

class A {
  public int $prop;
}

class B extends A {
//  public readonly int $prop;
}

echo '<br>';

class Foo
{
  public function printItem($string)
  {
    echo 'Foo: ' . $string  . '<br>';
  }

  public function printPHP()
  {
    echo 'PHP просто супер.' . '<br>';
  }
}

class Bar extends Foo
{
  public function printItem($string)
  {
    echo 'Bar: ' . $string . '<br>';
  }
}

$foo = new Foo();
$bar = new Bar();
$foo->printItem('baz');
$foo->printPHP();
$bar->printItem('baz');
$bar->printPHP();


/*===Совместимость типов возвращаемых значений с внутренними классами===*/

echo '<hr>';

//Переопределяющий метод не объявляет никакого типа возвращаемого значения

class MyDateTime extends DateTime{
  public function modify(string $modifier){return false;}
}
//"Deprecated: Return type of MyDateTime::modify(string $modifier) should either be compatible with DateTime::modify(string $modifier): DateTime|false, or the #[\ReturnTypeWillChange] attribute should be used to temporarily suppress the notice", начиная с PHP 8.1.0

//Переопределяющий метод объявляет неверный тип возвращаемого значения

class MyDateTime2 extends DateTime{
  public function modify(string $modifier): ?DateTime{return null;}
}
//"Deprecated: Return type of MyDateTime::modify(string $modifier): ?DateTime should either be compatible with DateTime::modify(string $modifier): DateTime|false, or the #[\ReturnTypeWillChange] attribute should be used to temporarily suppress the notice", начиная с PHP 8.1.0

//Переопределяющий метод объявляет неверный тип возвращаемого значения без уведомления об устаревании
class MyDateTime3 extends DateTime{
  #[\ReturnTypeWillChange]
  public function modify(string $modifier){return false;}
}