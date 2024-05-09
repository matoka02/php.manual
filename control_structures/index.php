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
  echo $value . "\n";
}