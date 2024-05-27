<?php
namespace classes_and_objects\scope_operator;

print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

class MyClass {
  const CONST_VALUE = 'Значение константы';
}

$classname = 'MyClass';
echo $classname::CONST_VALUE;
echo MyClass::CONST_VALUE;

echo '<br>';

class OtherClass extends MyClass
{
  public static $my_static = 'статическая переменная';

  public static function doubleColon()
  {
    echo parent::CONST_VALUE . '<br>';
    echo self::CONST_VALUE . '<br>';
  }
}

$classname = 'OtherClass';
$classname::doubleColon();
OtherClass::doubleColon();

echo '<br>';

class MyClass2{
  protected function myFunc(){
    echo "MyClass::myFunc()\n";
  }
}

class OtherClass2 extends MyClass2{
  public function myFunc2(){
    parent::myFunc();
    echo "OtherClass::myFunc()\n";
  }
}

$class = new OtherClass2();
$class->myFunc2();