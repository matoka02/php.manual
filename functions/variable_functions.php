<?php

print('<a href="http://php.manual/functions/index.php">Back</a>');
echo '<br><br>';

// Пример функции переменной

function foo()
{
  echo "В foo()<br />\n";
}
function bar($arg = '')
{
  echo "В bar(); аргумент был '$arg'.<br />\n";
}
function echoit($string)
{
  echo $string;
}

$func = 'foo';
$func();        // Вызывает функцию foo()
$func = 'bar';
$func('test');  // Вызывает функцию bar()
$func = 'echoit';
$func('test');  // Вызывает функцию echoit()

// Пример метода переменной
echo '<br>';

class Foo
{
  function Variable()
  {
    $name = 'Bar';
    $this->$name();
  }

  function Bar()
  {
    echo "Это Bar";
  }
}

$foo = new Foo();
$funcname = "Variable";
$foo->$funcname();

//  Пример вызова метода переменной со статическим свойством
echo '<br>';
class Foo2
{
  static $variable = 'статическое свойство';

  static function Variable2()
  {
    echo 'Вызов метода Variable2';
  }
}

echo Foo2::$variable; // Это выведет «статическое свойство». В области видимости класса нужна
// переменная $variable
$variable = "Variable2";
Foo2::$variable();  // Вызывает $foo->Variable2() после прочтения переменной $variable в текущей
// области видимости

//  Сложные callable-функции
echo '<br>';

class Foo3
{
  static function bar()
  {
    echo "bar\n";
  }

  function baz()
  {
    echo "baz\n";
  }
}

$func = array("Foo3", "bar");
$func();                            //bar
$func = array(new Foo3(), "baz");
$func();                            //baz
$func = "Foo3::bar";
$func();                            //bar

