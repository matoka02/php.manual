<?php
/*===Intro===*/

/* 
Types:
1) null;
2) bool;
3) int;
4) float (floating-point number);
5) string;
6) array;
7) object;
8) callable;
9) resource;

Таблицы сравнения типов PHP
https://www.php.net/manual/ru/types.comparisons.php
*/

/* 
Проверка:
- значения и типа выражения - var_dump()
- типа выражения - get_debug_type()
- является ли выражение определённым типом - is_type
*/

$a_bool = true;
$a_str = "foo";
$a_str2 = 'foo';
$an_int = 12;

echo get_debug_type($a_bool), "\n";
echo '<br>';
echo get_debug_type($a_str), "\n";

if (is_int($an_int)) {
  $an_int += 4;
}
var_dump($an_int);

if (is_string($a_bool)) {
  echo "Строка: $a_bool";
}

/* 
Список базовых типов:
1) Встроенные типы:
  - null;
  - Скалярные типы:
    - bool;
    - int;
    - float;
    - string;
  - array;
  - object;
  - resource;
  - never;
  - void;
  - «Относительные типы классов»: self, parent и static;
2) Типы значений:
  - false;
  - true;
3) Определяемые пользователем типы (часто называемые класс-типами):
  - Интерфейсы;
  - Классы;
  - Перечисления;
4) callable
*/


/*===1. NULL===*/

?>
<hr>
<?php
$var = null;
var_dump($var);
var_dump(is_null($var));


/*===2. Boolean values===*/

?>
<hr>
<?php
// $foo = True;

// if ($action == "show_version") {
//   echo "Версия 1.23";
// }
// if ($show_separators == TRUE) {
//   echo "<hr>\n";
// }
// if ($show_separators) {
//   echo "<hr>\n";
// }

/*
При преобразовании в логическое значение bool, следующие значения рассматриваются как false:
- само значение boolean false;
- integer 0 (ноль);
- float 0.0 (ноль) и -0.0 (минус ноль);
- пустая строка "" и строка "0";
- массив без элементов;
- особый тип NULL (включая неустановленные; переменные)
- внутренние объекты, которые перегружают своё -; поведение приведения к логическому типу. Наприме;р: объекты SimpleXML, созданные из пустых элементов без атрибутов.
Все остальные значения считаются true (включая resource и NAN).
*/

var_dump((bool)"");       // bool(false)
var_dump((bool)"0");      // bool(false)
var_dump((bool)1);        // bool(true)
var_dump((bool)-2);       // bool(true)
var_dump((bool)"foo");    // bool(true)
var_dump((bool)2.3e5);    // bool(true)
var_dump((bool)array(12)); // bool(true)
var_dump((bool)array());  // bool(false)
var_dump((bool)"false");  // bool(true)


/*===3. Whole numbers===*/

?>
<hr>
<?php

$a = 1234; // десятичное число
$a = 0123; // восьмеричное число (эквивалентно 83 в десятичной системе)
$a = 0o123; // восьмеричное число (начиная с PHP 8.1.0)
$a = 0x1A; // шестнадцатеричное число (эквивалентно 26 в десятичной системе)
$a = 0b11111111; // двоичное число (эквивалентно 255 в десятичной системе)
$a = 1_234_567; // десятичное число (с PHP 7.4.0)

// Переполнение целых на 64-битных системах
$large_number = 9223372036854775807;
var_dump($large_number);      // int(9223372036854775807)

$large_number = 9223372036854775808;
var_dump($large_number);      // float(9.2233720368548E+18)

$million = 1000000;
$large_number =  50000000000000 * $million;
var_dump($large_number);      // float(5.0E+19)

var_dump(25 / 7);         // float(3.5714285714286)
var_dump((int) (25 / 7)); // int(3)
var_dump(round(25 / 7));  // float(4)

// Преобразование в целое 

function foo($value): int
{
  return $value;
}
var_dump(foo(8.1));       // int 8
var_dump((int)8.1);       // int 8
var_dump(intval(8.1));    // int 8

// Нельзя приводить неизвестную дробь к типу int, так как это иногда может дать неожиданные результаты.
echo (int) ((0.1 + 0.7) * 10);    // 7


/*===4. Floating point numbers===*/

?>
<hr>
<?php

$a = 1.234;
$b = 1.2e3;
$c = 7E-10;
$d = 1_234.567;

// $a и $b равны до 5-ти знаков после точки.
$a = 1.23456789;
$b = 1.23456780;
$epsilon = 0.00001;
if (abs($a - $b) < $epsilon) {
  echo "true";
}


/*===5. Strings===*/

?>
<hr>
<?php

// 5.1 Одинарные кавычки

echo 'Это — простая строка';
echo '<br>';

echo 'В строки также разрешено вставлять
символ новой строки, способом, которым записан этот текст, —
так делать нормально';
echo '<br>';

// Выводит: Однажды Арнольд сказал: "I'll be back"
echo 'Однажды Арнольд сказал: "I\'ll be back"';
echo '<br>';

// Выводит: Вы удалили C:\*.*?
echo 'Вы удалили C:\\*.*?';
echo '<br>';

// Выводит: Вы удалили C:\*.*?
echo 'Вы удалили C:\*.*?';
echo '<br>';

// Выводит: Это не будет развёрнуто: \n в новую строку
echo 'Это не будет развёрнуто: \n в новую строку';
echo '<br>';

// Выводит: Переменные $expand и $either также не разворачиваются
echo 'Переменные $expand и $either также не разворачиваются';

// 5.2 Двойные кавычки
echo '<hr>';
echo "\n";
echo '<br>';
echo "\r";
echo '<br>';
echo "\t";
echo '<br>';
echo "\v";
echo '<br>';
echo "\e";
echo '<br>';
echo "\f";
echo '<br>';
echo "\\";
echo '<br>';
echo "\$";
echo '<br>';
echo "\"";
echo '<br>';
echo "\[0-7]{1,3}";
echo '<br>';
echo "\x[0-9A-Fa-f]{1,2}";
echo '<br>';
// echo "\u{[0-9A-Fa-f]+}";
echo "\u{41}";
echo '<br>';


// 5.3 Heredoc 

echo '<hr>';
// без отступов
echo <<<END
      a
     b
    c
\n
END;

// 4 отступа
echo <<<END
      a
     b
    c
    END;


//   echo <<<END
//   a
//  b
// c
//    END;

echo '<br>';
$values = [<<<END
a
  b
    c
END, 'd e f'];
var_dump($values);

echo '<br>';
class foo2
{
  public $bar2 = <<<EOT
bar
EOT;
}

echo '<br>';
$str = <<<EOD
Пример строки,
которую записали heredoc-синтаксисом
в несколько строк.
EOD;
echo $str;

echo '<br>';
class foo
{
  var $foo;
  var $bar;

  function __construct()
  {
    $this->foo = 'Foo';
    $this->bar = array('Bar1', 'Bar2', 'Bar3');
  }
}

$foo = new foo();
$name = 'Имярек';

echo <<<EOT
Меня зовут "$name". Я печатаю $foo->foo.
Теперь я вывожу {$foo->bar[1]}.
Это должно вывести заглавную букву 'A': \x41
EOT;

echo '<br>';
var_dump(array(
  <<<EOD
foobar!
EOD
));

echo '<br>';
function foo3()
{
  static $bar = <<<LABEL
Здесь ничего нет...
LABEL;
}

class foo3
{
  const BAR = <<<FOOBAR
Пример использования константы
FOOBAR;

  public $baz = <<<FOOBAR
Пример использования поля
FOOBAR;
}

echo '<br>';
echo <<<"FOOBAR"
Привет, мир!
FOOBAR;

// 5.4 Nowdoc 

echo '<hr>';
echo <<<'EOD'
Пример текста,
занимающего несколько строк,
написанного синтаксисом nowdoc. Обратные слеши выводятся без обработки,
например, \\ и \'.
EOD;

echo '<br>';

// Синтаксический анализ переменных 
echo '<hr>';
$juice = "apple";

echo "He drank some $juice juice." . PHP_EOL;
echo "He drank some juice made of $juices." . PHP_EOL;
echo "He drank some juice made of {$juice}s.";

echo '<br><br>';
$juices = array("apple", "orange", "koolaid1" => "purple");

echo "He drank some $juices[0] juice." . PHP_EOL;
echo '<br>';
echo "He drank some $juices[1] juice." . PHP_EOL;
echo '<br>';
echo "He drank some $juices[koolaid1] juice." . PHP_EOL;
echo '<br>';

class people
{
  public $john = "John Smith";
  public $jane = "Jane Smith";
  public $robert = "Robert Paulsen";

  public $smith = "Smith";
}

$people = new people();

echo "$people->john drank some $juices[0] juice." . PHP_EOL;
echo '<br><br>';
echo "$people->john then said hello to $people->jane." . PHP_EOL;
echo '<br>';
echo "$people->john's wife greeted $people->robert." . PHP_EOL;
echo '<br>';
echo "$people->robert greeted the two $people->smiths.";
