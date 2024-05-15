<?php

namespace classes_and_objects\constants;
print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

//  Объявление и использование константы
class MyClass
{
  const CONSTANT = 'значение константы';
  function showConstant()
  {
    echo self::CONSTANT . '<br>';
  }
}

echo MyClass::CONSTANT . '<br>';
$className = "MyClass";
//echo $className::CONSTANT . '<br>';
$class = new MyClass();
$class->showConstant();
echo $class::CONSTANT . '<br>';

// Пример использования ::class с пространством имён

//namespace foo{
//  class bar{}
//  echo bar::class;
//}

class bar {
}
echo bar::class;      // classes_and_objects\constants\bar

//  Пример констант, заданных выражением
const ONE = 1;
class foo
{
  const TWO = ONE * 2;
  const THREE = ONE + self::TWO;
  const SENTENCE = 'Значение константы THREE - ' . self::THREE;
}
var_dump(foo::SENTENCE);

//  Модификаторы видимости констант класса, начиная с PHP 7.1.0
class Foo2{
  public const BAR = 'bar';
  private const BAZ = 'baz';
}
echo Foo2::BAR, PHP_EOL;
echo Foo2::BAZ, PHP_EOL;