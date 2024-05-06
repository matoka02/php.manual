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

echo '<hr>';

$var = null;
var_dump($var);
var_dump(is_null($var));


/*===2. Boolean values===*/

echo '<hr>';

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
- внутренние объекты, которые перегружают своё -; поведение приведения к логическому типу. Например: объекты SimpleXML, созданные из пустых элементов без атрибутов.
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

echo '<hr>';

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
$large_number = 50000000000000 * $million;
var_dump($large_number);      // float(5.0E+19)

var_dump(25 / 7);         // float(3.5714285714286)
var_dump((int)(25 / 7)); // int(3)
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
echo (int)((0.1 + 0.7) * 10);    // 7


/*===4. Floating point numbers===*/

echo '<hr>';

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

echo '<hr>';

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

// 5.n Синтаксический анализ переменных

// простой синтаксис
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

echo '<br><br>';
$string = 'string';
echo "Символ с индексом -2 равен $string[-2].", PHP_EOL;
$string[-3] = 'o';
echo "Изменение символа на позиции -3 на «o» даёт следующую строку: $string.", PHP_EOL;

// сложный синтаксис
echo '<br><br>';
error_reporting(E_ALL);

//$great = 'здорово';
//echo "Это { $great}";
//echo '<br>';
//echo "Это {$great}";
//echo '<br>';
//echo "Этот квадрат шириной {$square->width}00 сантиметров.";
//echo '<br>';
//echo "Это работает: {$arr['key']}";
//echo '<br>';
//echo "Это работает: {$arr[4][3]}";
//echo '<br>';
//echo "Это неправильно: {$arr[foo][3]}";
//echo '<br>';
//echo "Это работает: " . $arr['foo'][3];
//echo '<br>';
//echo "Это тоже работает: {$obj->values[3]->name}";
//echo '<br>';
//echo "Это значение переменной с именем $name: {${$name}}";
//echo '<br>';
//echo "Это значение переменной с именем, которое возвращает функция getName(): {${getName()}}";
//echo '<br>';
//echo "Это значение переменной с именем, которое возвращает \$object->getName(): {${$object->getName()}}";
//echo '<br>';
//echo "Это то, что возвращает функция getName(): {getName()}";
//echo '<br>';
//echo "C:\folder\{$great}.txt";
//echo '<br>';
//echo "C:\\folder\\{$great}.txt";

class beers
{
  const softdrink = 'rootbeer';
  public static $ale = 'ipa';
}

$rootbeer = 'A & W';
$ipa = 'Alexander Keith\'s';
echo "Я бы хотел {${beers::softdrink}}\n";
echo '<br><br>';
echo "Я бы хотел {${beers::$ale}}\n}}";

// 5.n+1 Доступ и изменение символа в строке
echo '<br><br>';
$str = 'This is a test.';
$first = $str[0];
$third = $str[2];
echo('first: ' . $first . '; third: ' . $third);
echo '<br>';
$str2 = 'This is still a test.';
$last = $str2[strlen($str2) - 1];
echo $last;
echo '<br>';
$str3 = 'Look at the sea';
$str3[strlen($str3) - 1] = 'e';
echo $str3;


/*===Number strings===*/

echo '<hr>';
var_dump("0D1" == "000"); // false, «0D1» — не научная нотация
var_dump("0E1" == "000"); // true, «0E1» — это 0 * (10 ^ 1) или 0
var_dump("2E1" == "020"); // true, «2E1» — это 2 * (10 ^ 1) или 20

$foo = 1 + "10.5";                // $foo — число с плавающей точкой (11.5)
$foo = 1 + "-1.3e3";              // $foo — число с плавающей точкой (-1299)
//$foo = 1 + "bob-1.3e3";           // TypeError начиная с PHP 8.0.0. Ранее $foo принималось за целое число (1)
//$foo = 1 + "bob3";                // TypeError начиная с PHP 8.0.0, Ранее $foo принималось за целое число (1)
//$foo = 1 + "10 Small Pigs";       // $foo — целое (11). В PHP 8.0.0 выдаётся ошибка уровня E_WARNING, а в более ранних версиях — уровня E_NOTICE
//$foo = 4 + "10.2 Little Piggies"; // $foo — число с плавающей точкой (14.2). В PHP 8.0.0 выдаётся ошибка уровня E_WARNING, а в более ранних версиях — уровня E_NOTICE
//$foo = "10.0 pigs " + 1;          // $foo — число с плавающей точкой (11). В PHP 8.0.0 выдаётся ошибка уровня E_WARNING, а в более ранних версиях — уровня E_NOTICE
//$foo = "10.0 pigs " + 1.0;        // $foo — число с плавающей точкой (11). В PHP 8.0.0 выдаётся ошибка уровня E_WARNING, а в более ранних версиях — уровня E_NOTICE


/*===6. Arrays===*/

echo '<hr>';
print('<a href="http://php.manual/types/arrays.php">http://php.manual/types/arrays.php</a>');

/*===7. Objects===*/

echo '<hr>';

class foo8
{
  function do_foo()
  {
    echo "Код foo.";
  }
}

$bar = new foo8();
$bar->do_foo();

echo '<br>';
$obj = (object)array('1' => 'foo');
var_dump(isset($obj->{'1'}));
var_dump(key($obj));
echo '<br>';
$obj2 = (object)'привет';
echo $obj2->scalar;


/*===Enumerations===*/

echo '<hr>';

enum Suit
{
  case Hearts;
  case Diamonds;
  case Clubs;
  case Spades;
}

function do_stuff(Suit $s)
{
}

do_stuff(Suit::Spades);
var_dump(Suit::Spades);


/*===9. Resource===*/

/*
Resource — это переменная, содержащая ссылку на внешний ресурс. Список функций, которые создают и работают с ресурсами, ограничен. Список всех таких функций и существующих типов ресурсов (resource) дан в приложении.
https://www.php.net/manual/ru/resource.php
*/


/*===8. Callable===*/

echo '<hr>';
// 8.1 Пример callback-функции
function my_callback_function()
{
  echo '1: Привет, мир!';
}

class MyClass
{
  static function myCallbackMethod()
  {
    echo '2: Привет, мир!';
  }
}

// Тип 1: Простой callback
call_user_func('my_callback_function');
echo '<br>';
// Тип 2: Вызов статического метода класса
call_user_func(array('MyClass', 'myCallbackMethod'));
echo '<br>';
// Тип 3: Вызов метода класса
$obj = new MyClass();
call_user_func(array($obj, 'myCallbackMethod'));
echo '<br>';
// Тип 4: Вызов статического метода класса
call_user_func('MyClass::myCallbackMethod');
echo '<br>';

// Тип 5: Вызов относительного статического метода
class A2
{
  public static function who()
  {
    echo "A2\n";
  }
}

class B2 extends A2
{
  public static function who()
  {
    echo "B2\n";
  }
}

echo '<br>';
call_user_func(array('B2', 'parent::who'));

class C
{
  public function __invoke($name)
  {
    echo 'Привет ', $name, "\n";
  }
}

$c = new C();
echo '<br>';
call_user_func($c, 'PHP!');

// 8.3 Пример передачи замыкания в callback-параметр
echo '<br><br>';
$double = function ($a) {
  return $a * 2;
};
$numbers = range(1, 5);
$new_numbers = array_map($double, $numbers);

print implode(' ', $new_numbers);


/*===Mixed===*/

/*
Тип mixed принимает любое значение. Он эквивалентен объединению типов object|resource|array|string|float|int|bool|null. Тип доступен с PHP 8.0.0.
На языке теории типов, mixed — верхний тип. Остальные типы — его подтипы.
 */


/*===Void===*/

/*
void — это тип, который допустимо указывать только как возвращаемое значение, которое указывает, что функция не возвращает значение, зато работу функции по-прежнему можно прерывать. Поэтому его нельзя объявлять в объединении типов. Тип доступен с PHP 7.1.0.
*/


/*===Never===*/

/*
never — тип, который допустимо указывать только как возвращаемое значение, которое указывает, что функция прекратит работу без возврата значения. Она либо вызывает конструкцию языка exit(), либо выбрасывает исключение, либо это бесконечный цикл. Поэтому его нельзя объявлять в объединении типов. Доступно с PHP 8.1.0.
На языке теории типов, never — нижний тип. Это означает, что он — подтип остальных типов и заменяет другие возвращаемые типы при наследовании.
*/


/*===Относительные типы классов===*/

/*
Эти объявления типов можно использовать только внутри классов.
self
Значение должно быть instanceof того же класса, что и класс, в котором используется объявление типа.
parent
Значение должно быть instanceof родительского класса, наследуемого классом, в котором объявляется тип.
static
static — это тип только для возвращаемого значения, который требует, чтобы возвращаемое значение было instanceof того же класса, что и класс, в котором вызывается метод. Доступен начиная с PHP 8.0.0.
*/


/*===Типы значений===*/

/*
Типы значений — это те, которые проверяют тип значения и само значение. PHP поддерживает два типа значений: false с PHP 8.0.0 и true с PHP 8.2.0.
*/


/*===Итерируемые значения===*/

/*
Iterable — это встроенный псевдоним типа времени компиляции для array|Traversable. С момента появления в PHP 7.1.0 и до PHP 8.2.0 тип iterable был встроенным псевдотипом, который действовал как уже названный псевдоним типа, и допускался в качестве объявления типа. Тип iterable можно использовать с конструкцией foreach и с конструкцией yield from внутри генератора.
*/


echo '<hr>';
function gen(): iterable
{
  yield 1;
  yield 2;
  yield 3;
}

var_dump(gen());


/*===Type declarations===*/

echo '<hr>';
print('<a href="http://php.manual/types/declarations.php">http://php.manual/types/declarations.php</a>');
