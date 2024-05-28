<?php
namespace classes_and_objects\binding;

print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

//Ограничения self::

class A
{
  public static function who()
  {
    echo __CLASS__;
  }

  public static function test()
  {
    self::who();
  }
}

class B extends A
{
  public static function who()
  {
    echo __CLASS__;
  }
}

B::test();          // classes_and_objects\binding\A

//Использование позднего статического связывания
//Простое использование static::

echo '<br>';

class A2
{
  public static function who2()
  {
    echo __CLASS__;
  }

  public static function test2()
  {
    static::who2();
  }
}

class B2 extends A2
{
  public static function who2()
  {
    echo __CLASS__;
  }
}

B2::test2();            // classes_and_objects\binding\B2


//Использование static:: в нестатическом контексте
echo '<br><br>';

class A3
{
  private function foo3()
  {
    echo "success!" . '<br>';
  }

  public function test3()
  {
    $this->foo3();
    static::foo3();
  }
}

class B3 extends A3{}
class C3 extends A3{
  private function foo3(){}
}

$b3 = new B3();
$b3->test3();
$c3 = new C3();
//$c3->test3();

//Перенаправленные и неперенаправленные вызовы

echo '<br><br>';

class A4
{
  public static function foo4()
  {
    static::who4();
  }

  public static function who4()
  {
    echo __CLASS__ . '<br>';
  }
}

class B4 extends A4
{
  public static function test4()
  {
    A4::foo4();
    parent::foo4();
    self::foo4();
  }

  public static function who4()
  {
    echo __CLASS__ . '<br>';
  }
}

class C4 extends B4
{
  public static function who4()
  {
    echo __CLASS__ . '<br>';
  }
}

C4::test4();

// classes_and_objects\binding\A4
// classes_and_objects\binding\C4
// classes_and_objects\binding\C4