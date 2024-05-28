<?php
namespace classes_and_objects\final;

use classes_and_objects\constructor\BaseClass;

print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

//class BaseClass
//{
//  public function test()
//  {
//    echo "Вызван метод BaseClass::test()" . '<br>';
//  }
//
//  final public function moreTesting()
//  {
//    echo "Вызван метод BaseClass::moreTesting()" . '<br>';
//  }
//}
//
//class ChildClass extends BaseClass
//{
//  public function moreTesting()
//  {
//    echo "Вызван метод ChildClass::moreTesting()" . '<br>';
//  }
//}

//Fatal error: Cannot override final method classes_and_objects\final\BaseClass::moreTesting() in C:\OSPanel\domains\php.manual\classes_and_objects\final.php on line 17

//final class BaseClass2
//{
//  public function test2()
//  {
//    echo "Вызван метод BaseClass::test2()" . '<br>';
//  }
//
//  final public function moreTesting2()
//  {
//    echo "Вызван метод ChildClass::moreTesting2()" . '<br>';
//  }
//}
//
//class ChildClass2 extends BaseClass2{}

//Fatal error: Class classes_and_objects\final\ChildClass2 cannot extend final class classes_and_objects\final\BaseClass2 in C:\OSPanel\domains\php.manual\classes_and_objects\final.php on line 42

//class Foo{
//  final public const X = 'foo';
//}
//
//class Bar extends Foo{
//  public const X = 'bar';
//}

//Fatal error: classes_and_objects\final\Bar::X cannot override final constant classes_and_objects\final\Foo::X in C:\OSPanel\domains\php.manual\classes_and_objects\final.php on line 53