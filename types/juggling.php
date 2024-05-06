<?php

print('<a href="http://php.manual/types/index.php">Back</a>');
echo '<br><br>';

//https://www.php.net/manual/ru/language.types.type-juggling.php

/*
// int|string
42    --> 42          // Точный тип
"42"  --> "42"        // Точный тип
new ObjectWithToString --> "Результат работы метода __toString()"
                      // Объект несовместим с типом int, переход к типу string
42.0  --> 42          // Тип float совместим с типом int
42.1  --> 42          // Тип float совместим с типом int
1e100 --> "1.0E+100"  // Тип float слишком велик для типа int, переход к типу string
INF   --> "INF"       // Тип float слишком велик для типа int, переход к типу string
true  --> 1           // Тип bool совместим с типом int
[]    --> TypeError   // Массив несовместим с типами int или string

// int|float|bool
"45"    --> 45        // Целочисленная числовая строка, int
"45.0"  --> 45.0      // Строка с числом с плавающей точкой, float

"45X"   --> true      // Нечисловая строка, переход к типу bool
""      --> false     // Нечисловая строка, переход к типу bool
"X"     --> true      // Нечисловая строка, переход к типу bool
[]      --> TypeError // Массив несовместим с типами int, float или bool
*/

$foo = 10;
$bar = (bool)$foo;
var_dump($bar);               // boolean true

echo '<br>';
$string = 'test';
$binary = (binary)$string;
$binary = b"binary string";
var_dump($binary);            // string 'binary string'

echo '<br>';
$foo2 = 10;
$str = "$foo";
$fst = (string)$foo;

if ($fst === $str) {
  echo 'они одинаковые';
}

echo '<br>';
$a = 'car';
var_dump($a);         // string 'car'
echo '<br>';
$a[0] = 'b';
var_dump($a[0]);      // string 'b'
echo $a;              // bar
var_dump($a);         // string 'bar'

/*
Не всегда ясно, что произойдет при приведении между конкретными типами. Дополнительную информацию дают разделы:

Преобразование типа к логическому значению (boolean)
https://www.php.net/manual/ru/language.types.boolean.php#language.types.boolean.casting
Преобразование типа к целому числу (integer)
https://www.php.net/manual/ru/language.types.integer.php#language.types.integer.casting
Преобразование типа к числу с плавающей точкой (float)
https://www.php.net/manual/ru/language.types.float.php#language.types.float.casting
Преобразование типа к строке (string)
https://www.php.net/manual/ru/language.types.string.php#language.types.string.casting
Преобразование типа к массиву (array)
https://www.php.net/manual/ru/language.types.array.php#language.types.array.casting
Преобразование типа к объекту (object)
https://www.php.net/manual/ru/language.types.object.php#language.types.object.casting
Преобразование типа к ресурсу (resource)
https://www.php.net/manual/ru/language.types.resource.php#language.types.resource.casting
Преобразование типа к NULL
https://www.php.net/manual/ru/language.types.null.php#language.types.null.casting
Таблицы сравнения типов
https://www.php.net/manual/ru/types.comparisons.php
*/