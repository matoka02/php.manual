<?php
/*---Intro---*/

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
echo get_debug_type($a_str), "\n";

if (is_int($an_int)) {
  $an_int+=4;
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
