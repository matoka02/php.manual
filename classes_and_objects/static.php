<?php
namespace classes_and_objects\static;

print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

/*
 * Доступ к статическим свойствам осуществляется с помощью оператора разрешения области видимости (::), и к ним нельзя получить доступ через оператор объекта (->).
 * На класс можно ссылаться с помощью переменной. Значение переменной в таком случае не может
 * быть ключевым словом (например, self, parent и static).
 */

class Foo
{
public
  static $my_static = 'foo';

  public function staticValue()
  {
    return self::$my_static;
  }
}

class Bar extends Foo
{
  public function fooStatic()
  {
    return parent::$my_static;
  }
}

print Foo::$my_static . '<br>';

$foo = new Foo();
print $foo->staticValue() . '<br>';
//print $foo->my_static . '<br>';
print $foo::$my_static . '<br>';    // // Не определено свойство my_static
$classname = 'Foo';
//print $classname::$my_static . '<br>';
print Bar::$my_static . '<br>';
$bar = new Bar();
print $bar->fooStatic() . '<br>';