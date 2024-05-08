<?php

print('<a href="http://php.manual/types/index.php">Back</a>');
echo '<br><br>';

/**
 * Побитовые операторы
 * Пример    Название          Результат
 * $a & $b    И                  Биты, которые установлены и в переменной $a, и в переменной $b.
 * $a | $b    Или                Будут заданы биты, которые установлены или в переменной $a, или в переменной $b.
 * $a ^ $b    Исключающее или    Будут заданы биты, которые установлены либо только в переменной $a, либо только в переменной $b, но не в обоих одновременно.
 * ~ $a      Отрицание          Будут заданы биты, которые не установлены в переменной $a, и наоборот.
 * $a << $b  Сдвиг влево        Все биты переменной $a сдвигаются влево на количествво позиций, указанных в переменной $b (каждая позиция предполагает «умножение на 2»)
 * $a >> $b  Сдвиг вправо      Все биты переменной $a сдвигаются вправо на количество позиций, указанных в переменной $b (каждая позиция предполагает «деление на 2»)
 **/

$format = '(%1$2d = %1$04b) = (%2$2d = %2$04b)'
  . ' %3$s (%4$2d = %4$04b)' . '<br>';


// Побитовые операции И, ИЛИ и ИСКЛЮЧАЮЩЕЕ ИЛИ (AND, OR и XOR) над целыми числами

$values = array(0, 1, 2, 4, 8);
$test = 1 + 4;

echo '<br>' . 'Побитовое И (AND)' . '<br>';
foreach ($values as $value) {
  $result = $value & $test;
  printf($format, $result, $value, '&', $test);
}

echo '<br>' . 'Побитовое (включающее) ИЛИ (OR)' . '<br>';
foreach ($values as $value) {
  $result = $value | $test;
  printf($format, $result, $value, '|', $test);
}

echo '<br>' . 'Побитовое ИСКЛЮЧАЮЩЕЕ ИЛИ (XOR)' . '<br>';
foreach ($values as $value) {
  $result = $value ^ $test;
  printf($format, $result, $value, '^', $test);
}

// Побитовая операция ИСКЛЮЧАЮЩЕЕ ИЛИ (XOR) над строками
echo '<hr>';
echo 12 ^ 9; // Выводит '5'
echo '<br>';
echo "12" ^ "9"; // Выводит символ Backspace (ascii 8)
// ('1' (ascii 49)) ^ ('9' (ascii 57)) = #8
echo '<br>';
echo "hallo" ^ "hello"; // Выводит ascii-значения #0 #4 #0 #0 #0
// 'a' ^ 'e' = #4
echo '<br>';
echo 2 ^ "3"; // Выводит 1
// 2 ^ ((int)"3") == 1
echo '<br>';
echo "2" ^ 3; // Выводит 1
// ((int)"2") ^ 3 == 1

// Сдвиг битов в целых числах
echo '<hr>';

echo '<br>' . '--- СДВИГ ВПРАВО НАД ПОЛОЖИТЕЛЬНЫМИ ЦЕЛЫМИ (НАТУРАЛЬНЫМИ) ЧИСЛАМИ ---' . '<br>';

$val = 4;
$places = 1;
$res = $val >> $places;
p($res, $val, '>>', $places, 'слева была вставлена копия знакового бита');

$val = 4;
$places = 2;
$res = $val >> $places;
p($res, $val, '>>', $places);

$val = 4;
$places = 3;
$res = $val >> $places;
p($res, $val, '>>', $places, 'биты были выдвинуты за правый край');

$val = 4;
$places = 4;
$res = $val >> $places;
p($res, $val, '>>', $places, 'то же, что и выше; нельзя сдвинуть дальше 0');

echo '<br>' . '--- СДВИГ ВПРАВО НАД ОТРИЦАТЕЛЬНЫМИ ЦЕЛЫМИ ЧИСЛАМИ ---' . '<br>';

$val = -4;
$places = 1;
$res = $val >> $places;
p($res, $val, '>>', $places, 'слева была вставлена копия знакового бита');

$val = -4;
$places = 2;
$res = $val >> $places;
p($res, $val, '>>', $places, 'биты были выдвинуты за правый край');

$val = -4;
$places = 3;
$res = $val >> $places;
p($res, $val, '>>', $places, 'то же, что и выше; нельзя сдвинуть дальше -1');

echo '<br>' . '--- СДВИГ ВЛЕВО НАД ПОЛОЖИТЕЛЬНЫМИ ЦЕЛЫМИ (НАТУРАЛЬНЫМИ) ЧИСЛАМИ ---' . '<br>';

$val = 4;
$places = 1;
$res = $val << $places;
p($res, $val, '<<', $places, 'правый край был дополнен нулями');

$val = 4;
$places = (PHP_INT_SIZE * 8) - 4;
$res = $val << $places;
p($res, $val, '<<', $places);

$val = 4;
$places = (PHP_INT_SIZE * 8) - 3;
$res = $val << $places;
p($res, $val, '<<', $places, 'знаковые биты были выдвинуты');

$val = 4;
$places = (PHP_INT_SIZE * 8) - 2;
$res = $val << $places;
p($res, $val, '<<', $places, 'биты были выдвинуты за левый край');

echo '<br>' . '--- СДВИГ ВЛЕВО НАД ОТРИЦАТЕЛЬНЫМИ ЦЕЛЫМИ ЧИСЛАМИ ---' . '<br>';

$val = -4;
$places = 1;
$res = $val << $places;
p($res, $val, '<<', $places, 'правый край был дополнен нулями');

$val = -4;
$places = (PHP_INT_SIZE * 8) - 3;
$res = $val << $places;
p($res, $val, '<<', $places);

$val = -4;
$places = (PHP_INT_SIZE * 8) - 2;
$res = $val << $places;
p($res, $val, '<<', $places, 'биты были выдвинуты за левый край, включая знаковый бит');

function p($res, $val, $op, $places, $note = '') {
  $format = '%0' . (PHP_INT_SIZE * 8) . "b\n";

  printf("Выражение: %d = %d %s %d\n", $res, $val, $op, $places);

  echo " Десятичный вид:\n";
  printf(" val=%d\n", $val);
  printf(" res=%d\n", $res);

  echo " Двоичный вид:\n";
  printf(' val=' . $format, $val);
  printf(' res=' . $format, $res);

  if ($note) {
    echo " ЗАМЕЧАНИЕ: $note\n";
  }

  echo "<br>";
}
