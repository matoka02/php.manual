<?php

print('<a href="http://php.manual/operators/index.php">Back</a>');
echo '<br><br>';

//Пример использования оператора instanceof с классами
class MyClass {}
class NotMyClass {}
$a = new MyClass();
var_dump($a instanceof MyClass);
var_dump($a instanceof NotMyClass);

//Использование оператора instanceof с наследуемыми классами
echo '<br>';
class ParentClass {}
class MyClass2 extends ParentClass {}
$a = new MyClass2();
var_dump($a instanceof MyClass2);
var_dump($a instanceof ParentClass);

//Использование оператора instanceof для проверки того, что объект — это не экземпляр класса
echo '<br>';
class MyClass3 {}
$a = new MyClass3();
var_dump(!($a instanceof stdClass));

//Использование оператора instanceof с интерфейсами
echo '<br>';
interface MyInterface {}
class MyClass4 implements MyInterface {}
$a = new MyClass4();
var_dump($a instanceof MyClass4);
var_dump($a instanceof MyInterface);

//Использование оператора instanceof с другими переменными
echo '<br>';
interface MyInterface2 {}
class MyClass5 implements MyInterface2 {}
$a = new MyClass5();
$b = new MyClass5();
$c = 'MyClass5';
$d = 'NotMyClass';
var_dump($a instanceof $b); // Переменная $b — объект класса MyClass
var_dump($a instanceof $c); // Переменная $c — строка 'MyClass'
var_dump($a instanceof $d); // Переменная $d — строка 'NotMyClass'

//Пример использования оператора instanceof для проверки других переменных
echo '<br>';
$a = 1;
$b = NULL;
$c = imagecreate(5, 5);

var_dump($a instanceof stdClass); // Переменная $a — целое типа integer
var_dump($b instanceof stdClass); // Переменная $b — NULL
var_dump($c instanceof stdClass); // Переменная $c — значение типа resource

//Использование оператора instanceof для проверки констант
echo '<br>';
var_dump(FALSE instanceof stdClass);
// до PHP 7.3.0 - PHP Fatal error:  instanceof expects an object instance, constant given
// с PHP 8.0.0 - bool(false)

//Пример использования instanceof с произвольным выражением
echo '<br>';
class ClassA extends \stdClass {}
class ClassB extends \stdClass {}
class ClassC extends ClassB {}
class ClassD extends ClassA {}

function getSomeClass(): string
{
  return ClassA::class;
}

var_dump(new ClassA instanceof ('std' . 'Class'));
var_dump(new ClassB instanceof ('Class' . 'B'));
var_dump(new ClassC instanceof ('Class' . 'A'));
var_dump(new ClassD instanceof (getSomeClass()));