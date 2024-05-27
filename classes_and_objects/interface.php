<?php
namespace classes_and_objects\interface;

print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

//Пример интерфейса

interface Template
{
  public function setVariable($name, $var);
  public function getHtml($template);
}

class WorkingTemplate implements Template
{
  private $vars = [];

  public function setVariable($name, $var)
  {
    $this->vars[$name] = $var;
  }

  public function getHtml($template)
  {
    foreach ($this->vars as $name => $value) {
      $template = str_replace('{' . $name . '}', $value, $template);
    }
    return $template;
  }
}

//class BedTemplate implements Template{
//  private $vars = [];
//  public function setVariable($name, $var){
//    $this->vars[$name] = $var;
//  }
//}
//Fatal error: Class classes_and_objects\interface\BedTemplate contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (classes_and_objects\interface\Template::getHtml) in  on line 31

echo '<br>';

//Наследование интерфейсов

interface A{
  public function foo();
}

interface B extends A{
  public function baz(Baz $baz);
}

class C implements B{
  public function foo(){}
  public function baz(Baz $baz){}
}

//class D implements B{
//  public function foo(){}
//  public function baz(Foo $foo){}
//}
//Fatal error: Could not check compatibility between classes_and_objects\interface\D::baz(classes_and_objects\interface\Foo $foo) and classes_and_objects\interface\B::baz(classes_and_objects\interface\Baz $baz), because class classes_and_objects\interface\Baz is not available in C:\OSPanel\domains\php.manual\classes_and_objects\interface.php on line 60

echo '<br>';

//Совместимость с несколькими интерфейсами

class Foo{}
class Bar extends Foo{}

interface A2
{
  public function myfunc(Foo $arg): Foo;
}

interface B2
{
  public function myfunc(Bar $arg): Bar;
}

class MyClass implements A2, B2
{
  public function myfunc(Foo $arg): Bar
  {
    return new Bar();
  }
}

echo '<br>';

//Множественное наследование интерфейсов

interface A3{
  public function foo();
}
interface B3{
  public function bar();
}
interface C3 extends A3, B3{
  public function baz();
}
class D3 implements C3{
  public function foo(){}
  public function bar(){}
  public function baz(){}
}

echo '<br>';

//Интерфейсы с константами

interface A4
{
  const B4 = 'Константа интерфейса';
}

echo A4::B4;
echo '<br>';

class B4 implements A4
{
  const B = 'Константа класса';
}

echo B4::B;

echo '<br>';

//Интерфейсы с абстрактными классами

interface A5
{
  public function foo(string $s): string;
  public function bar(int $i): int;
}

abstract class B5 implements A5
{
  public function foo(string $s): string
  {
    return $s . PHP_EOL;
  }
}

class C5 extends B5
{
  public function bar(int $i): int
  {
    return $i * 2;
  }
}

echo '<br>';

//Одновременное расширение и внедрение

class One{}
interface Usable{}
interface Updatable{}
// Порядок ключевых слов здесь важен. "extends" должно быть первым.
class Two extends One implements Usable, Updatable{}