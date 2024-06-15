<?php

namespace generators;

use ArrayIterator;
use Iterator;
use LogicException;
use RuntimeException;

function xrange($start, $limit, $step = 1)
{
  if ($start <= $limit) {
    if ($start <= 0) {
      throw new LogicException("Шаг должен быть положительным");
    }
    for ($i = $start; $i <= $limit; $i += $step) {
      yield $i;
    }
  } else {
    if ($step >= 0) {
      throw new LogicException("Шаг должен быть отрицательным");
    }
    for ($i = $start; $i >= $limit; $i += $step) {
      yield $i;
    }
  }
}

echo 'Нечётные однозначные числа с помощью range():  ';
foreach (range(1, 9, 2) as $number) {
  echo "$number ";
}
echo '<br>';
echo 'Нечётные однозначные числа с помощью xrange():  ';
foreach (xrange(1, 9, 2) as $number) {
  echo "$number ";
}


/*===Ключевое слово yield===*/
echo '<hr>';

function gen_one_to_three()
{
  for ($i = 1; $i <= 3; $i++) {
//    переменная $i сохраняет значение между вызовами
    yield $i;
  }
}

$generator = gen_one_to_three();

foreach ($generator as $value) {
  echo "$value <br>";
}


/*===Получение значений с ключами===*/
echo '<hr>';

$input = <<<'EOF'
1;PHP;Любит знаки доллара 
2;Python;Любит пробелы 
3;Ruby;Любит блоки
EOF;

function input_parser($input)
{
  foreach (explode("\n", $input) as $line) {
    $fields = explode(";", $line);
    $id = array_shift($fields);

    yield $id => $fields;
  }
}

foreach (input_parser($input) as $id => $fields) {
  echo "$id:\n";
  echo "    $fields[0]\n";
  echo "    $fields[1]\n";
}


/*===Получение значений null===*/
echo '<hr>';

function gen_three_nulls()
{
  foreach (range(1, 3) as $i) {
    yield;
  }
}

var_dump(iterator_to_array(gen_three_nulls()));


/*===Получение значения по ссылке===*/
echo '<hr>';

function &gen_reference()
{
  $value = 3;
  while ($value > 0) {
    yield $value;
  }
}

foreach (gen_reference() as &$number) {
  echo (--$number) . '...';
}


/*===Делегирование генератора через yield from===*/
echo '<hr>';

//  Выражение yield from с функцией iterator_to_array()

function inner()
{
  yield 1;
  yield 2;
  yield 3;
}

function gen()
{
  yield 0;
  yield from inner();
  yield 4;
}

var_dump(iterator_to_array(gen()));

//  Основы работы с выражением yield from

echo '<br>';

function count_to_ten()
{
  yield 1;
  yield 2;
  yield from [3, 4];
  yield from new ArrayIterator([5, 6]);
  yield from seven_eight();
  yield 9;
  yield 10;
}

function seven_eight()
{
  yield 7;
  yield from eight();
}

function eight()
{
  yield 8;
}

foreach (count_to_ten() as $num) {
  echo "$num ";
}

//  Выражение yield from и возвращаемые значения

echo '<br>';

function count_to_ten2()
{
  yield 1;
  yield 2;
  yield from [3, 4];
  yield from new ArrayIterator([5, 6]);
  yield from seven_eight2();
  return yield from nine_ten2();
}

function seven_eight2()
{
  yield 7;
  yield from eight2();
}

function eight2()
{
  yield 8;
}

function nine_ten2()
{
  yield 9;
  return 10;
}

$gen2 = count_to_ten2();

foreach ($gen2 as $num) {
  echo "$num ";
}

echo $gen2->getReturn();


/*===Сравнение генераторов с объектами класса Iterator===*/
echo '<hr>';

//function getLinesFromFile($fileName)
//{
//  if (!fileHandle = fopen($fileName, "r")) {
//    return;
//  }
//  while (false !== $line = fgets($fileHandle)) {
//    yield $line;
//  }
//  fclose($fileHandle);
//}

//class LineIterator implements Iterator
//{
//  protected $fileHandle;
//  protected $line;
//  protected $i;
//
//  public function __construct($fileName)
//  {
//    if (!$this->fileHandle = fopen($fileName, "r")) {
//      throw new RuntimeException('Невозможно открыть файл "' . $fileName . '"');
//    }
//  }
//
//  public function rewind()
//  {
//    fseek($this->fileHandle, 0);
//    $this->line = fgets($this->fileHandle);
//    $this->i = 0;
//  }
//
//  public function valid()
//  {
//    return false !== $this->line;
//  }
//
//  public function current()
//  {
//    return $this->line;
//  }
//
//  public function key()
//  {
//    return $this->i;
//  }
//
//  public function next()
//  {
//    if (false !== $this->line) {
//      $this->line = fgets($this->fileHandle);
//      $this->i++;
//    }
//  }
//
//  public function __destruct()
//  {
//    fclose($this->fileHandle);
//  }
//}
