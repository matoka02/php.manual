<?php

print('<a href="http://php.manual/operators/index.php">Back</a>');
echo '<br><br>';

/**
Операторы сравнения
Пример      Название                            Результат
$a == $b    Равно                               Возвращается true, если значение переменной $a после преобразования типов равно значению переменной $b.
$a === $b   Тождественно равно                  Возвращается true, если значение переменной $a равно значению переменной $b и имеет тот же тип.
$a != $b    Не равно                            Возвращается true, если значение переменной $a после преобразования типов не равно значению переменной $b.
$a <> $b    Не равно                            Возвращается true, если значение переменной $a после преобразования типов не равно значению переменной $b.
$a !== $b   Тождественно не равно               Возвращается true, если значение переменной $a не равно значению переменной $b или они разных типов.
$a < $b     Меньше                              Возвращается true, если значение переменной $a строго меньше значения переменной $b.
$a > $b     Больше                              Возвращается true, если значение переменной $a строго больше значения переменной $b.
$a <= $b    Меньше или равно                    Возвращается true, если значение переменной $a меньше или равно значению переменной $b.
$a >= $b    Больше или равно                    Возвращается true, если значение переменной $a больше или равно значению переменной $b.
$a <=> $b   Космический корабль (spaceship)     Целое число (int) меньше, больше или равное нулю, когда значение переменной $a меньше, больше или равно значению переменной $b.
 **/

echo '<hr>';
var_dump(0 == "a");         // bool(false) в PHP 8, bool(true) в PHP 7
var_dump("1" == "01");      // bool(true)
var_dump("10" == "1e1");    // bool(true)
var_dump(100 == "1e2");     // bool(true)

switch ("a") {
  case 0:
    echo "0";                     // 0 в PHP 7
    break;
  case "a":
    echo "a";                     // a в PHP 8
    break;
}

// Целые числа
echo '<br>';
var_dump(1 <=> 1);        // 0
var_dump(1 <=> 2);        // -1
var_dump(2 <=> 1);        // 1

// Числа с плавающей точкой
echo '<br>';
var_dump(1.5 <=> 1.5);    // 0
var_dump(1.5 <=> 2.5);    // -1
var_dump(2.5 <=> 1.5);    // 1

// Строки
echo '<br>';
var_dump("a" <=> "a");    // 0
var_dump("a" <=> "b");    // -1
var_dump("b" <=> "a");    // 1
var_dump("a" <=> "aa");   // -1
var_dump("zz" <=> "aa");  // 1

// Массивы
echo '<br>';
var_dump([] <=> []);                 // 0
var_dump([1, 2, 3] <=> [1, 2, 3]);   // 0
var_dump([1, 2, 3] <=> []);          // 1
var_dump([1, 2, 3] <=> [1, 2, 1]);   // 1
var_dump([1, 2, 3] <=> [1, 2, 4]);   // -1

// Объекты
echo '<br>';
$a = (object)["a" => "b"];
$b = (object)["a" => "b"];
var_dump($a <=> $b);                 // 0
$a = (object)["a" => "b"];
$b = (object)["a" => "c"];
var_dump($a <=> $b);                 // -1
$a = (object)["a" => "c"];
$b = (object)["a" => "b"];
var_dump($a <=> $b);                 // 1

// сравниваются не только значения; ключи также должны совпадать
$a = (object)["a" => "b"];
$b = (object)["b" => "b"];
var_dump($a <=> $b);                 // 1

/**
Сравнение типов
Тип операнда 1	                    Тип операнда 2	  Результат
null или string	                    string	          null преобразуется в пустую строку (""), числовое или лексическое сравнение
bool или null	                      что угодно	      Преобразуется в bool, false < true
object	                            object	          Встроенные классы могут определять свои правила сравнения, объекты разных классов не сравниваются, про сравнение объектов одного класса рассказано в разделе «Сравнение объекта»
string, resource, int или float	    string, resource, int или float	Строки и ресурсы переводятся в числа, обычная математика
array	                              array	            Массив с меньшим числом элементов меньше, если ключ из первого массива не найден во втором массиве — массивы не могут сравниваться, иначе идёт сравнение значений (смотрите пример ниже)
array	                              что угодно	      Тип array всегда больше
object	                            что угодно	      Тип object всегда больше
**/

// Сравнение boolean/null
echo '<br>';
var_dump(1 == TRUE);          // TRUE  — то же, что и (bool)1 == TRUE
var_dump(0 == FALSE);         // TRUE  — то же, что и (bool)0 == FALSE
var_dump(100 < TRUE);         // FALSE  — то же, что и (bool)100 < TRUE
var_dump(-10 < FALSE);        // FALSE  — то же, что и (bool)-10 < FALSE
var_dump(min(-100, -10, NULL, 10, 100)); // NULL  — (bool)NULL < (bool)-100 это FALSE < TRUE

// Алгоритм сравнения обычных массивов
function standard_array_compare($op1, $op2)
{
  if (count($op1) < count($op2)) {
    return -1; // $op1 < $op2
  } elseif (count($op1) > count($op2)) {
    return 1; // $op1 > $op2
  }

  foreach ($op1 as $key => $val) {
    if (!array_key_exists($key, $op2)) {
      return 1;
    } elseif ($val < $op2[$key]) {
      return -1;
    } elseif ($val > $op2[$key]) {
      return 1;
    }
  }

  return 0; // $op1 == $op2
}


/*===Ternary operator===*/

echo '<hr>';
$action = (empty($_GET['action'])) ? 'default' : $_POST['action'];

if (empty($_GET['action'])) {
  $action = 'default';
} else {
  $action = $_POST['action'];
}

echo '<br>';
//echo (true ? 'true' : false ? 't' : 'f');   / Fatal error: Unparenthesized `a ? b : c ? d : e` is not supported. Use either `(a ? b : c) ? d : e` or `a ? b : (c ? d : e)`
echo '<br>';
echo ((true ? 'true' : false) ? 't' : 'f');

echo '<br>';
echo 0 ?: 1 ?: 2 ?: 3, PHP_EOL; // 1
echo 0 ?: 0 ?: 2 ?: 3, PHP_EOL; // 2
echo 0 ?: 0 ?: 0 ?: 3, PHP_EOL; // 3


/*===Null coalescing===*/

echo '<hr>';
$action = $_POST['action'] ?? 'default';

if (isset($_POST['action'])) {
  $action = $_POST['action'];
} else {
  $action = 'default';
}

//print 'Mr. ' . $name ?? 'Anonymous';    // Warning: Undefined variable $name on line 157
print 'Mr. ' . ($name ?? 'Anonymous');

$foo = null;
$bar = null;
$baz = 1;
$qux = 2;

echo '<br>';
echo $foo ?? $bar ?? $baz ?? $qux;