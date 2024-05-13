<?php

print('<a href="http://php.manual/functions/index.php">Back</a>');
echo '<br><br>';

//Простой пример синтаксиса callable-объекта первого класса
class Foo
{
  public function method() {}

  public static function staticMethod() {}

  public function __invoke() {}
}

$obj = new Foo();
$classStr = 'Foo';
$methodStr = 'method';
$staticMethodStr = 'staticMethod';
$f1 = strlen(...);
$f2 = $obj(...);
$f3 = $obj->method(...);
$f4 = $obj->$methodStr(...);
$f5 = Foo::staticMethod(...);
$f6 = $classStr::$staticMethodStr(...);
$f7 = 'strlen'(...);
$f8 = [$obj, 'method'](...);
$f9 = [Foo::class, 'staticMethod'](...);

//Сравнение области действия синтаксиса CallableExpr(...) и традиционного callable-синтаксиса
class Foo2{
  public function getPrivateMethod() {
    return [$this, 'privateMethod'];
  }
  public function privateMethod() {
    echo __METHOD__, '<br>';
  }
}

$foo2 = new Foo2();
$privateMethod = $foo2->getPrivateMethod();
$privateMethod();

echo '<br><br>';
class Foo3{
  public function getPrivateMethod() {
    return $this->privateMethod(...);
  }
  public function privateMethod() {
    echo __METHOD__, '<br>';
  }
}
$foo3 = new Foo3();
$privateMethod = $foo3->getPrivateMethod();
$privateMethod();