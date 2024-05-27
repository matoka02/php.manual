<?php

namespace classes_and_objects\visibility;
print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

/*===Область видимости свойства===*/

class MyClass
{
  public $public = 'Public';
  protected $protected = 'Protected';
  private $private = 'Private';

  function printHello()
  {
    echo '<br>';
    echo $this->public;
    echo '<br>';
    echo $this->protected;
    echo '<br>';
    echo $this->private;
  }
}

$obj = new MyClass();
echo $obj->public;
//echo $obj->protected;
//echo $obj->private;
$obj->printHello();

echo '<br>';

class MyClass2 extends MyClass
{
//можно переопределить общедоступные и защищённые свойства, но не закрытые
  public $public = 'Public2';
  protected $protected = 'Protected2';

  function printHello()
  {
    echo '<br>';
    echo $this->public;
    echo '<br>';
    echo $this->protected;
    echo '<br>';
//    echo $this->private;
  }
}

$obj2 = new MyClass2();
echo $obj->public;
//echo $obj->protected;
//echo $obj->private;
$obj2->printHello();


/*===Область видимости метода===*/

echo '<hr>';
class MyClass3{
  // объявление общедоступного конструктора
  public function __construct(){}
  // объявление общедоступного метода
  public function MyPublic(){}
  // объявление защищённого метода
  protected function MyProtected(){}
  // объявление закрытого метода
  private function MyPrivate(){}
  // общедоступный метод
  function Foo3(){
    $this->MyPublic();
    $this->MyProtected();
    $this->MyPrivate();
  }
}

$myclass = new MyClass3;
$myclass->MyPublic();
//$myclass->MyProtected();
//$myclass->MyPrivate();
$myclass->Foo3();

class MyClass4 extends MyClass3{
  function Foo4(){
    $this->MyPublic();
    $this->MyProtected();
//    $this->MyPrivate();
  }
}

$myclass2 = new MyClass4;
$myclass2->MyPublic();
$myclass2->Foo4();

echo '<br>';
class Bar
{
  public function test()
  {
    $this->testPrivate();
    $this->testPublic();
  }

  public function testPublic()
  {
    echo 'Bar::testPublic' . '<br>';
  }

  private function testPrivate()
  {
    echo 'Bar::testPrivate' . '<br>';
  }
}

echo '<br>';

class Foo extends Bar
{
  public function testPublic()
  {
    echo 'Foo::testPublic' . '<br>';
  }

  private function testPrivate()
  {
    echo 'Foo::testPrivate' . '<br>';
  }
}

$myFoo = new Foo();
$myFoo->test();


/*===Область видимости констант===*/

echo '<hr>';

class MyClass5
{
  public const MY_PUBLIC = 'public' . '<br>';
  protected const MY_PROTECTED = 'protected' . '<br>';
  private const MY_PRIVATE = 'private' . '<br>';

  public function foo5()
  {
    echo self::MY_PUBLIC;
    echo self::MY_PROTECTED;
    echo self::MY_PRIVATE;
  }
}

$myClass5 = new MyClass5();
MyClass5::MY_PUBLIC;
//MyClass5::MY_PROTECTED;
//MyClass5::MY_PRIVATE;
$myClass5->foo5();

class MyClass6 extends MyClass5{
  public function foo6(){
    echo self::MY_PUBLIC;
    echo self::MY_PROTECTED;
//    echo self::MY_PRIVATE;
  }
}

$myClass6 = new MyClass6();
MyClass6::MY_PUBLIC;
$myClass6->foo6();


/*===Видимость из других объектов===*/

echo '<hr>';

class Test
{
  private $foo;

  public function __construct($foo)
  {
    $this->foo = $foo;
  }

  private function bar()
  {
    echo 'Доступ к закрытому методу.';
  }

  public function baz(Test $other)
  {
    $other->foo = 'привет';
    var_dump($other->foo);
    $other->bar();
  }
}

$test = new Test('test');
$test->baz(new Test('other'));