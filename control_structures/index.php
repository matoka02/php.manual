<?php


/*===IF===*/

if ($a > $b) {
  echo "a больше b";
  $b = $a;
}


/*===ELSE===*/

echo '<hr>';
if ($a > $b) {
  echo "a больше b";
} else {
  echo "a НЕ больше b";
}

// неоднозначный, но рабочий код
echo "<br>";
$a = false;
$b = true;
if ($a)
  if ($b)
    echo "b";
  else
    echo "c";


/*===ELSEIF/ELSE IF===*/

echo '<hr>';
if ($a > $b) {
  echo "a больше b";
} elseif ($a == $b) {
  echo "a равно b";
} else {
  echo "a меньше b";
}

//Некорректный способ:
//if ($a > $b):
//  echo $a . " больше " . $b;
//else if ($a == $b): // Не скомпилируется.
//  echo "Строка выше вызывает фатальную ошибку.";
//endif;


//Корректный способ:
echo "<br>";
if ($a > $b):
  echo $a . " больше " . $b;
elseif ($a == $b): // Заметьте, тут одно слово.
  echo $a . " равно " . $b;
else:
  echo $a . " не больше и не равно " . $b;
endif;


/*===Alternative syntax for control structures===*/

echo '<hr>';
?>
<?php if ($a == 5): ?>
  A равно 5
<?php endif; ?>

<?php
if ($a == 5):
  echo "a равно 5";
  echo "...";
elseif ($a == 6):
  echo "a равно 6";
  echo "!!!";
else:
  echo "a не равно ни 5 ни 6";
endif;
?>

<?php


/*===WHILE===*/

echo '<hr>';
$i = 1;
while ($i <= 10) {
  echo $i++;
}

echo '<br>';
$i = 1;
while ($i <= 10):
  echo $i;
  ++$i;
endwhile;


/*===DO-WHILE===*/

echo '<hr>';
$i = 0;
do {
  echo $i;
} while ($i > 0);

echo '<br>';
do {
  if ($i < 5) {
    echo "i ещё недостаточно велико";
    break;
  }
  $i *= $factor;
  if ($i < $minimum_limit) {
    break;
  }
  echo "значение i уже подходит";
  /* обработка i */
} while (0);


/*===FOR===*/

echo '<hr>';
for ($i = 1; $i <= 10; $i++) {
  echo $i;
}

echo '<br>';
for ($i = 1; ; $i++) {
  if ($i > 10) {
    break;
  }
  echo $i;
}

echo '<br>';
$i = 1;
for (; ;) {
  if ($i > 10) {
    break;
  }
  echo $i;
  $i++;
}

echo '<br>';
for ($i = 1, $j = 0; $i <= 10; $j += $i, print $i, $i++);

echo '<br>';
$people = array(
  array('name' => 'Kalle', 'salt' => 856412),
  array('name' => 'Pierre', 'salt' => 215863)
);

for ($i = 0; $i < count($people); $i++) {
  $people[$i]['salt'] = mt_rand(00000, 999999);
}


/*===FOREACH===*/

/**
 * работает только с массивами и объектами
 */
echo '<hr>';
$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
  $value = $value * 2;
}
// массив $arr теперь выглядит так: array(2, 4, 6, 8)
unset($value); // разорвать ссылку на последний элемент
var_dump($arr);

echo '<br>';
$arr2 = array(1, 2, 3, 4);
foreach ($arr2 as &$value) {
  $value = $value * 2;
}
foreach ($arr2 as $key => $value) {
  echo "{$key} => {$value} ";
}
var_dump($arr2);

echo '<br>';
foreach (array(1, 2, 3, 4) as &$value) {
  $value = $value * 2;
}

// только значение
echo '<br>';
$a = array(1, 2, 3, 17);
foreach ($a as $v) {
  echo "Текущее значение переменной \$a: $v"."<br>";
}

// значение (для иллюстрации массив выводится в виде значения с ключом)
echo '<br>';
$a = array(1, 2, 3, 17);
$i = 0;
foreach ($a as $v) {
  echo "\$a[$i] => $v.\n";
  $i++;
}

// ключ и значение
echo '<br>';
$a = array(
  "one" => 1,
  "two" => 2,
  "three" => 3,
  "seventeen" => 17
);
foreach ($a as $k => $v) {
  echo "\$a[$k] => $v.\n";
}

// многомерные массивы
echo '<br>';
$a = array();
$a[0][0] = "a";
$a[0][1] = "b";
$a[1][0] = "y";
$a[1][1] = "z";
foreach ($a as $v1) {
  foreach ($v1 as $v2) {
    echo "$v2\n";
  }
}

// динамические массивы
echo '<br>';
foreach (array(1, 2, 3, 4, 5) as $v) {
  echo "$v\n";
}

// Распаковка вложенных массивов языковой конструкцией list()
echo '<br>';
$array = [
  [1, 2],
  [3, 4],
];
foreach ($array as list($a, $b)) {
  echo "A: $a; B: $b\n";
}
echo '<br>';
foreach ($array as list($a)) {
  echo "$a\n";
}
echo '<br>';
foreach ($array as list($a)) {
  echo "A: $a; B: $b; C: $c\n";
}


/*===BREAK===*/

/**
 * прерывает выполнение текущей структуры for, foreach, while, do-while или switch.
 */
echo '<hr>';
$arr = array('один', 'два', 'три', 'четыре', 'стоп', 'пять');
foreach ($arr as $val) {
  if ($val == 'стоп') {
    break;    /* Тут можно было написать 'break 1;'. */
  }
  echo "$val<br />\n";
}

echo '<br>';
$i = 0;
while (++$i) {
  switch ($i) {
    case 5:
      echo "Итерация 5<br />\n";
      break 1;  /* Выйти только из конструкции switch. */
    case 10:
      echo "Итерация 10; выходим<br />\n";
      break 2;  /* Выходим из конструкции switch и из цикла while. */
    default:
      break;
  }
}


/*===CONTINUE===*/

echo '<hr>';
$arr = ['ноль', 'один', 'два', 'три', 'четыре', 'пять', 'шесть'];
foreach ($arr as $key => $value) {
  if (0 === ($key % 2)) { // пропуск чётных чисел
    continue;
  }
  echo $value . "\n";     // один три пять
}

echo '<br><br>';
$i = 0;
while ($i++ < 5) {
  echo 'Внешний' . '<br>';
  while (1) {
    echo 'Средний' . '<br>';
    while (1) {
      echo 'Внутренний' . '<br>';
      continue 3;
    }
    echo 'Это никогда не выведется.' . '<br>';
  }
  echo 'Это также не выведется.' . '<br>';
}


/*===SWITCH===*/

echo '<hr>';

$i = 2;

// Оператор switch:
switch ($i) {
  case 0:
    echo "i равно 0";
    break;
  case 1:
    echo "i равно 1";
    break;
  case 2:
    echo "i равно 2";
    break;
}

echo '<br>';
// Эквивалентно:
if ($i == 0) {
  echo "i равно 0";
} elseif ($i == 1) {
  echo "i равно 1";
} elseif ($i == 2) {
  echo "i равно 2";
}

echo '<br>';
$i = 'шоколадка';
switch ($i) {
  case "яблоко":
    echo "i это яблоко";
    break;
  case "шоколадка":
    echo "i это шоколадка";
    break;
  case "пирог":
    echo "i это пирог";
    break;
}

/**
Если не напишете оператор break в конце секции case, PHP будет продолжать исполнять команды следующей секции case
**/

echo '<br>';
$i = 0;
switch ($i) {
  case 0:
    echo "i равно 0";
  case 1:
    echo "i равно 1";
  case 2:
    echo "i равно 2";
}

echo '<br>';
switch ($i) {
  case 0:
  case 1:
  case 2:
    echo "i меньше чем 3, но неотрицательный";
    break;
  case 3:
    echo "i равно 3";
}

echo '<br>';
$i = 4;
switch ($i) {
  case 0:
    echo "i равно 0";
    break;
  case 1:
    echo "i равно 1";
    break;
  case 2:
    echo "i равно 2";
    break;
  default:
    echo "i не равно 0, 1 или 2";
}

/**
нельзя использовать для сложных оценок значения switch
 **/

echo '<br>';
$target = 1;
$start = 3;
switch ($target) {
  case $start - 1:
    print "A";
    break;
  case $start - 2:
    print "B";
    break;
  case $start - 3:
    print "C";
    break;
  case $start - 4:
    print "D";
    break;
}

echo '<br>';
$offset = 1;
$start = 3;
switch (true) {
  case $start - $offset === 1:
    print "A";
    break;
  case $start - $offset === 2:
    print "B";
    break;
  case $start - $offset === 3:
    print "C";
    break;
  case $start - $offset === 4:
    print "D";
    break;
}

/**
Альтернативный синтаксис для управляющей структуры switch
 */

echo '<br>';
$i = 4;
switch ($i):
  case 0:
    echo "i равно 0";
    break;
  case 1:
    echo "i равно 1";
    break;
  case 2:
    echo "i равно 2";
    break;
  default:
    echo "i не равно 0, 1 или 2";
endswitch;

echo '<br>';
$beer = 4;
switch($beer)
{
  case 'tuborg';
  case 'carlsberg';
  case 'stella';
  case 'heineken';
    echo 'Хороший выбор';
    break;
  default;
    echo 'Пожалуйста, сделайте новый выбор...';
    break;
}


/*===MATCH===*/

/**
 * Используется строгое сравнение (===), а не слабое (==).
 * Выражение match доступно начиная с PHP 8.0.0.
**/

echo '<hr>';
$food = 'cake';
$return_value = match ($food) {
  'apple' => 'На столе лежит яблоко',
  'banana' => 'На столе лежит банан',
  'cake' => 'На столе стоит торт',
};
var_dump($return_value);

echo '<br>';
//$result = match ($x) {
//  // Множественное условие:
//  $a, $b, $c => 5,
//  // Аналогично трём одиночным:
//  $a => 5,
//  $b => 5,
//  $c => 5,
//};

echo '<br>';
//$expressionResult = match ($condition) {
//  1, 2 => foo(),
//  3, 4 => bar(),
//  default => baz(),
//};

//Пример необработанного выражения
echo '<br>';
$condition = 5;
try {
  match ($condition) {
    1, 2 => foo(),
    3, 4 => bar(),
  };
} catch (\UnhandledMatchError $e) {
  var_dump($e);
}

//  Использование match для ветвления в зависимости от вхождения в диапазоны целых чисел

$age = 23;
$result = match (true) {
  $age >= 65 => 'пожилой',
  $age >= 25 => 'взрослый',
  $age >= 18 => 'совершеннолетний',
  default => 'ребёнок',
};
var_dump($result);

//  Использование match для ветвления в зависимости от содержимого строки

$text2 = 'Bienvenue chez nous';

$result2 = match (true) {
  str_contains($text2, 'Welcome') || str_contains($text2, 'Hello') => 'en',
  str_contains($text2, 'Bienvenue') || str_contains($text2, 'Bonjour') => 'fr',
};
var_dump($result2);


/*===DECLARE===*/

echo '<hr>';
// Правильно:
//declare(ticks=1);

// Недопустимо:
//const TICK_VALUE = 1;
//declare(ticks=TICK_VALUE);

// Пример использования тика
declare(ticks=1);
// Функция, исполняемая при каждом тике
function tick_handler()
{
//  echo "Вызывается tick_handler()\n";
}
register_shutdown_function('tick_handler'); // вызывает событие тика
$a = 1;           // вызывает событие тика
if ($a > 0) {
  $a += 2;        // вызывает событие тика
  var_dump($a);   // вызывает событие тика
}


/*===RETURN===*/

echo '<hr>';
//https://www.php.net/manual/ru/functions.returning-values.php


/*===REQUIRE===*/

/**
 * Выражение require остановит выполнение скрипта, тогда как выражение include только выдаёт предупреждение уровня E_WARNING, которое разрешает скрипту продолжить работу.
**/


/*===INCLUDE===*/

echo '<hr>';
echo "Одно $color $fruit"; // Одно
echo '<br>';
include 'test.php';
echo "Одно $color $fruit"; // Одно зелёное яблоко
echo '<br>';
function foo()
{
  global $color2;
  include 'test.php';
  echo "Одно $color2 $fruit2";
}
foo();                     // Одно зелёное яблоко
echo '<br>';
echo "Одно $color2 $fruit2"; // Одно зелёное

// Не сработает, PHP интерпретирует как include(('vars.php') == TRUE), то есть include('1')
if (include('test.php') == TRUE) {
  echo 'OK';
}

// Cработает
if ((include 'test.php') == TRUE) {
  echo 'OK';
}

echo '<br>';
$foo = include 'return.php';
echo $foo . '<br>';             // PHP
$bar = include 'noreturn.php';
echo $bar . '<br>';             // 1

//  Буферизация вывода и включение файла PHP в строку

$string = get_include_contents('somefile.php');
function get_include_contents($filename) {
  if (is_file($filename)) {
    ob_start();
    include $filename;
    return ob_get_clean();
  }
  return false;
}


/*===REQUIRE_ONCE===*/

/**
 * Выражение require_once аналогично require за исключением того, что PHP проверит, включался ли уже данный файл, и если да, не будет включать его ещё раз.
 */


/*===INCLUDE_ONCE===*/

/**
 * include_once может использоваться в тех случаях, когда один и тот же файл может быть включён и выполнен более одного раза во время выполнения скрипта, в данном случае это поможет избежать проблем с переопределением функций, переменных и т.д.
**/


/*===GOTO===*/

echo '<hr>';
goto a;
echo 'Foo';
a:
echo 'Bar';         // Bar

//echo '<br>';
//for ($i = 0, $j = 50; $i < 100; $i++) {
//  while ($j--) {
//    if ($i == 17) {
//      goto end;
//    }
//  }
//}
//echo "i=$i";
//end:
//echo 'j hit 17';

//Это не сработает
//echo '<br>';
//goto loop;
//for ($i = 0, $j = 50; $i < 100; $i++) {
//  while ($j--) {
//    loop:
//  }
//}
//echo "$i = $i";