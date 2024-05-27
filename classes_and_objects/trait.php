<?php
namespace classes_and_objects\trait;

print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

trait ezcReflectionReturnInfo
{
  #[\ReturnTypeWillChange]
  function getReturnType(){}
  function getReturnDescription(){}
}

class ezcReflectionMethod extends \ReflectionMethod{
  use ezcReflectionReturnInfo;
}

class ezcReflectionFunction extends \ReflectionFunction{
  use ezcReflectionReturnInfo;
}


/*===Приоритет===*/

echo '<hr>';

//Пример приоритета старшинства
class Base
{
  public function sayHello()
  {
    echo 'Hello ';
  }
}

trait SayWorld
{
  public function sayHello()
  {
    parent::sayHello();
    echo 'World!';
  }
}

class MyHelloWorld extends Base
{
  use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();

//Пример альтернативного порядка приоритета
echo '<br>';
trait HelloWorld2{
  public function sayHello2(){
    echo 'Hello World!';
  }
}
class TheWorldIsNotEnough{
  use HelloWorld2;
  public function sayHello2(){
    echo 'Hello Universe!';
  }
}

$o2 = new TheWorldIsNotEnough();
$o2->sayHello2();


/*===Несколько трейтов===*/

echo '<hr>';
trait Hello{
  public function sayHello3(){
    echo 'Hello ';
  }
}
trait World{
  public function sayWorld3(){
    echo 'World';
  }
}
class MyHelloWorld3{
  use Hello, World;
  public function sayExclamationMark(){
    echo '!';
  }
}

$o3 = new MyHelloWorld3();
$o3->sayHello3();
$o3->sayWorld3();
$o3->sayExclamationMark();


/*===Разрешение конфликтов ===*/

echo '<hr>';
trait A{
  public function smallTalk(){
    echo 'a';
  }
  public function bigTalk(){
    echo 'A';
  }
}
trait B{
  public function smallTalk(){
    echo 'b';
  }
  public function bigTalk(){
    echo 'B';
  }
}
class Talker{
  use A, B {
    B::smallTalk insteadof A;
    A::bigTalk insteadof B;
  }
}
class Aliased_Talker{
  use A, B {
    B::smallTalk insteadof A;
    A::bigTalk insteadof B;
    B::smallTalk as talk;
  }
}


/*===Изменение видимости метода===*/

echo '<hr>';
trait HelloWorld4{
  public function sayHello4(){
    echo 'Hello World!';
  }
}
// Изменение видимости метода sayHello
class MyClass1{
  use HelloWorld4 {sayHello4 as protected;}
}
// Создание псевдонима метода с изменённой видимостью
// видимость sayHello не изменилась
class MyClass2{
  use HelloWorld4 {sayHello4 as private myPrivateHello;}
}


/*===Трейты, состоящие из трейтов===*/

echo '<hr>';
trait Hello5{
  public function sayHello5(){
    echo 'Hello ';
  }
}
trait World5{
  public function sayWorld5(){
    echo 'World!';
  }
}
trait HelloWorld5{
  use Hello5, World5;
}
class MyHelloWorld5{
  use HelloWorld5;
}

$o5 = new MyHelloWorld5();
$o5->sayHello5();
$o5->sayWorld5();


/*===Абстрактные члены трейтов===*/

echo '<hr>';
trait Hello6{
  public function sayHelloWorld6(){
    echo 'Hello' .$this->getWorld6();
  }
  abstract public function getWorld6();
}
class MyHelloWorld6{
  private $world6;
  use Hello6;
  public function getWorld6(){
    return $this->world6;
  }
  public function setWorld6($val){
    $this->world6 = $val;
  }
}


/*===Статические члены трейта===*/

echo '<hr>';
//Статические переменные
trait Counter
{
  public function inc()
  {
    static $c = 0;
    $c = $c + 1;
    echo $c . '<br>';
  }
}

class C1
{
  use Counter;
}

class C2
{
  use Counter;
}

$m = new C1();
$m->inc();
$p = new C2();
$p->inc();

//Статические методы
echo '<br>';
trait StaticExample
{
  public static function doSomething(){
    echo 'Что-либо делаем';
  }
}
class Example{
  use StaticExample;
}
Example::doSomething();

//Статические свойства
echo '<br>';
trait StaticExample2 {
  public static $static = 'foo';
}
class Example2 {
  use StaticExample2;
}
echo Example2::$static;


/*===Свойства===*/

echo '<hr>';
//Определение свойств
trait PropertiesTrait{
  public $x=1;
}
class PropertiesExample{
  use PropertiesTrait;
}
$example = new PropertiesExample();
$example->x;

//Разрешение конфликтов
echo '<br>';
trait PropertiesTrait2 {
  public $same = true;
  public $different1 = false;
  public bool $different2;
  public bool $different3;
}

class PropertiesExample2 {
  use PropertiesTrait2;
  public $same = true;
//  public $different1 = true; // Фатальная ошибка
//  public string $different2; // Фатальная ошибка
//  readonly protected bool $different3; // Фатальная ошибка
}


/*===Константы===*/

/*
 * Начиная с версии PHP 8.2.0 трейты могут также определять константы.
 */

echo '<hr>';
//Определение констант

//trait ConstantsTrait{
//  public const FLAG_MUTABLE = 1;
//  final public const FLAG_IMMUTABLE = 5;
//}
//class ConstantsExample2 {
//  use ConstantsTrait;
//}
//
//$example2 = new ConstantsExample2();
//echo $example2::FLAG_MUTABLE;

//Разрешение конфликтов
//echo '<br>';
//trait ConstantsTrait3 {
//  public const FLAG_MUTABLE = 1;
//  final public const FLAG_IMMUTABLE = 5;
//}
//
//class ConstantsExample3 {
//  use ConstantsTrait3;
//  public const FLAG_IMMUTABLE = 5; // Фатальная ошибка
//}