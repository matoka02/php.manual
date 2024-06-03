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
use blah\blah as mine;

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