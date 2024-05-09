<?php

print('<a href="http://php.manual/operators/index.php">Back</a>');
echo '<br><br>';

/**
Логические операторы
Пример	    Название	        Результат
$a and $b	  И	                true, если и $a, и $b true.
$a or $b	  Или	              true, если или $a, или $b true.
$a xor $b	  Исключающее или	  true, если $a, или $b true, но не оба.
! $a	      Отрицание	        true, если $a не true.
$a && $b	  И	                true, если и $a, и $b true.
$a || $b	  Или	              true, если или $a, или $b true.
**/

//Функция foo() никогда не будет вызвана, т. к. эти операторы шунтирующие (short-circuit)
$a = (false && foo());
$b = (true || foo());
$c = (false and foo());
$d = (true or foo());

// У оператора «||» больший приоритет, чем у «or»
// Результат выражения (false || true) присваивается переменной $e
// Действует как: ($e = (false || true))
$e = false || true;
// Константа false присваивается переменной $f, а затем значение true игнорируется
// Действует как: (($f = false) or true)
$f = false or true;
var_dump($e, $f);


// У оператора «&&» больший приоритет, чем у «and»
// Результат выражения (true && false) присваивается переменной $g
// Действует как: ($g = (true && false))
$g = true && false;
// Константа true присваивается переменной $h, а затем значение false игнорируется
// Действует как: (($h = true) and false)
$h = true and false;
var_dump($g, $h);