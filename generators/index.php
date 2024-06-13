<?php

namespace generators;

use LogicException;

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