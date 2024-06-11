<?php

namespace namespaces;

class MyClass {}
function myfunction() {}
const MYCONST = 1;

$a = new MyClass;
$c = new \namespaces\MyClass;

$a = strlen('hi');

$d = namespace\MYCONST;
$d = __NAMESPACE__ . '\MYCONST';
echo constant($d);
echo '<hr>';


/*===Определение пространств имён===*/

/*
 * Хотя любой корректный PHP-код разрешается размещать внутри пространства имён, только классы
 * (включая абстрактные и трейты), интерфейсы, функции и константы зависят от него.
 * Кроме того, одно и то же пространство имён, в отличие от остальных конструкций PHP,
 * допустимо определять в нескольких файлах, что помогает распределять содержание файлов по файловой системе.
 */


/*===Определение подпространств имён===*/

/*
 * Так же как файлы и каталоги, пространства имён PHP разрешают создавать иерархию имён.
 * Поэтому имя пространства разрешено определять с подуровнями.
 */

// namespace MyProject\Sub\Level;
// const CONNECT_OK = 1;
// class Connection { }
// function connect() { }

// Приведённый пример создаёт константу MyProject\Sub\Level\CONNECT_OK,
// класс MyProject\Sub\Level\Connection и функцию MyProject\Sub\Level\connect.


/*===Описание нескольких пространств имён в одном файле===*/

// Описание нескольких пространств имён, простой синтаксис

//namespace MyProject;
//
//const CONNECT_OK = 1;
//class Connection { /* ... */ }
//function connect() { /* ... */  }
//
//namespace AnotherProject;
//
//const CONNECT_OK = 1;
//class Connection { /* ... */ }
//function connect() { /* ... */  }

//Описание нескольких пространств имён, синтаксис со скобками

//namespace MyProject2 {
//  const CONNECT_OK = 1;
//  class Connection { /* ... */ }
//  function connect() { /* ... */  }
//}
//
//namespace AnotherProject2 {
//  const CONNECT_OK = 1;
//  class Connection { /* ... */ }
//  function connect() { /* ... */  }
//}

//Описание глобального и обычного пространства имён в одном файле

//namespace MyProject3 {
//  const CONNECT_OK = 1;
//  class Connection { /* ... */ }
//  function connect() { /* ... */  }
//}
//
//namespace {       // Глобальный код
//  session_start();
//  $a = MyProject3\connect();
//  echo MyProject3\Connection::start();
//}

//Описание глобального и обычного пространства имён в одном файле

//declare(encoding='UTF-8');
//namespace MyProject4 {
//  const CONNECT_OK = 1;
//  class Connection { /* ... */ }
//  function connect() { /* ... */  }
//}
//
//namespace {      // Глобальный код
//  session_start();
//  $a = MyProject4\connect();
//  echo MyProject4\Connection::start();
//}


/*===Пространства имён: основы===*/

//Перейти на
//http://php.manual/namespaces/test/file1.php
//http://php.manual/namespaces/test/file2.php

//Доступ к глобальным классам, функциям и константам из пространства имён

function strlen() {}
const INI_ALL = 3;
class Exception {}

$a = \strlen('hi');
$b = \INI_ALL;
$c = new \Exception('error');


/*===Пространства имён и динамические особенности языка===*/

echo '<hr>';
//Перейти на
//http://php.manual/namespaces/test/example1.php
//http://php.manual/namespaces/test/example2.php


/*===Ключевое слово namespace и магическая константа __NAMESPACE__===*/

// 1. Пример записи константы __NAMESPACE__ в коде с пространством имён
//namespace MyProject;
echo '<hr>';
echo '"', __NAMESPACE__, '"';

// 2. Пример записи константы __NAMESPACE__ в глобальном пространстве
echo '"', __NAMESPACE__, '"';

// 3. Константа __NAMESPACE__ и динамическое конструирование имени

echo '<br><br>';
function get($classname)
{
  $a3 = __NAMESPACE__ . '\\' . $classname;
  return new $a3();
}

// 4. Ключевое слово namespace внутри пространства имён
//use blah\blah as mine;

//blah\mine(); // Вызывает функцию MyProject\blah\mine()
//namespace\blah\mine(); // Вызывает функцию MyProject\blah\mine()
//
//namespace\func(); // Вызывает функцию MyProject\func()
//namespace\sub\func(); // Вызывает функцию MyProject\sub\func()
//namespace\cname::method(); // Вызывает статический метод method класса MyProject\cname
//$a = new namespace\sub\cname(); // Создаёт экземпляр класса MyProject\sub\cname
//$b = namespace\CONSTANT; // Присваивает значение константы MyProject\CONSTANT переменной $b


// 5. Ключевое слово namespace в глобальном коде
//namespace\func(); // Вызывает функцию func()
//namespace\sub\func(); // Вызывает функцию sub\func()
//namespace\cname::method(); // Вызывает статический метод method класса cname
//$a5 = new namespace\sub\cname(); // Создаёт экземпляр класса sub\cname
//$b5 = namespace\CONSTANT; // Присваивает значение константы CONSTANT переменной $b


/*===Пространства имён: псевдонимирование и импорт ===*/

echo '<hr>';

// 1. Импорт или псевдонимирование через ключевое слово use

//use My\Full\Classname as Another;
//
//// Это то же, что и My\Full\NSname as NSname
//use My\Full\NSname;
//
//// Импортирование глобального класса
//use ArrayObject;
//
//// Импортирование функции
//use function My\Full\functionName;
//
//// Создание псевдонима функции
//use function My\Full\functionName as func;
//
//// Импортирование константы
//use const My\Full\CONSTANT;
//
//$obj = new namespace\Another; // Создаёт экземпляр класса foo\Another
//$obj = new Another; // Создаёт объект класса My\Full\Classname
//NSname\subns\func(); // Вызывает функцию My\Full\NSname\subns\func
//
//$a = new ArrayObject(array(1)); // Создаёт объект класса ArrayObject
//// без выражения use ArrayObject был бы создан объект класса foo\ArrayObject
//
//func(); // вызывает функцию My\Full\functionName
//echo CONSTANT; // выводит содержимое константы My\Full\CONSTANT


// 2. Импорт или создание псевдонима через ключевое слово use, комбинирование нескольких выражений

//use My\Full\Classname as Another, My\Full\NSname;
//
//$obj = new Another; // Создаёт объект класса My\Full\Classname
//NSname\subns\func(); // Вызывает функцию My\Full\NSname\subns\func

// 3. Импорт и динамические имена

//use My\Full\Classname as Another, My\Full\NSname;
//
//$obj = new Another; // Создаёт объект класса My\Full\Classname
//$a = 'Another';
//$obj = new $a;      // Создаёт объект класса Another

// 4. Импортирование и абсолютные имена

//use My\Full\Classname as Another, My\Full\NSname;
//
//$obj = new Another; // Создаёт объект класса My\Full\Classname
//$obj = new \Another; // Создаёт объект класса Another
//$obj = new Another\thing; // Создаёт объект класса My\Full\Classname\thing
//$obj = new \Another\thing; // Создаёт объект класса Another\thing

/*
 * Ключевое слово use должно быть указано в самом начале файла (в глобальной области) или
 * внутри объявления пространства имён. Это нужно, потому что импорт выполняется во время компиляции,
 * а не во время исполнения, поэтому его нельзя ограничить блоком кода.
 */

// 5. Недопустимое правило импорта

//namespace Languages;
//
//function toGreenlandic()
//{
//use Languages\Danish;
//
//  //...
//}

//6. Групповые объявления через ключевое слово use

//use some\namespace\ClassA;
//use some\namespace\ClassB;
//use some\namespace\ClassC as C;
//
//use function some\namespace\fn_a;
//use function some\namespace\fn_b;
//use function some\namespace\fn_c;
//
//use const some\namespace\ConstA;
//use const some\namespace\ConstB;
//use const some\namespace\ConstC;
//
//// Эквивалентно следующему групповому объявлению с ключевым словом use
//use some\namespace\{ClassA, ClassB, ClassC as C};
//use function some\namespace\{fn_a, fn_b, fn_c};
//use const some\namespace\{ConstA, ConstB, ConstC};


/*===Глобальное пространство===*/

echo '<hr>';

//namespace A\B\C;
//
///* Функция — это A\B\C\fopen */
//function fopen() {
//  /* ... */
//  $f = \fopen(...); // Вызов глобальной функции fopen
//  return $f;
//}


/*===Пространства имён: возврат к глобальному пространству для функций и констант===*/

echo '<hr>';

// 1. Доступ к глобальным классам внутри пространства имён
//namespace A\B\C;
//class Exception extends \Exception {}
//
//$a = new Exception('hi'); // Переменная $a — это объект класса A\B\C\Exception
//$b = new \Exception('hi'); // Переменная $b — это объект класса Exception
//
//$c = new ArrayObject; // Фатальная ошибка, класс A\B\C\ArrayObject не найден

//2. Возврат к глобальным функциям или константам внутри пространства имён

//namespace A\B\C;
//
//const E_ERROR = 45;
//function strlen($str)
//{
//  return \strlen($str) - 1;
//}
//
//echo E_ERROR, '<br>'; // Выводит 45
//echo INI_ALL, '<br>'; // Выводит «7» — возвращается к глобальной константе INI_ALL
//
//echo strlen('hi'), '<br>'; // Выводит «1»
//if (is_array('hi')) { // Выводит строку «это не массив»
//  echo "Это массив <br>";
//} else {
//  echo "Это не массив <br>";
//}


/*===Правила разрешения имён ===*/

echo '<hr>';
print('<a href="http://php.manual/namespaces/rules.php">http://php.manual/namespaces/rules.php</a>');



