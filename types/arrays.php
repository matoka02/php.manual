<?php

print('<a href="http://php.manual/types/index.php">Back</a>');
echo '<br><br>';

$array = array(
  "foo" => "bar",
  "bar" => "foo",
);

$array = [
  "foo" => "bar",
  "bar" => "foo",
];

echo $array["foo"];

//Пример преобразования типов и перезаписи элементов
echo '<hr>';
$array2 = array(
  1 => "a",
  "1" => "b",
  1.5 => "c",
  true => "d",
);
var_dump($array2);     // string 'd'

//Смешанные целочисленные (int) и строковые (string) ключи
echo '<hr>';
$array3 = array(
  "foo" => "bar",
  "bar" => "foo",
  100 => -100,
  -100 => 100,
);
var_dump($array3);

//Индексные массивы без ключа
echo '<hr>';
$array4 = array("foo", "bar", "hallo", "world");
var_dump($array4);

//Ключи для некоторых элементов
echo '<hr>';
$array5 = array(
  "a",
  "b",
  6 => "c",
  "d",
);
var_dump($array5);

//Расширенный пример преобразования типов и перезаписи элементов
echo '<hr>';
$array6 = array(
  1 => 'a',
  '1' => 'b',   // значение «b» перезапишет значение «a»
  1.5 => 'c',   // значение «c» перезапишет значение «b»
  -1 => 'd',
  '01' => 'e',  // поскольку это не целочисленная строка, она НЕ перезапишет ключ 1
  '1.5' => 'f', // поскольку это не целочисленная строка, она НЕ перезапишет ключ 1
  true => 'g',  // значение «g» перезапишет значение «c»
  false => 'h',
  '' => 'i',
  null => 'j',  // значение «j» перезапишет значение «i»
  'k',          // значение «k» присваивается ключу 2. Потому что самый большой целочисленный ключ до этого был 1
  2 => 'l',     // значение «l» перезапишет значение «k»
);

var_dump($array6);

//Доступ к элементам массива
echo '<hr>';
$array7 = array(
  "foo" => "bar",
  42 => 24,
  "multi" => array(
    "dimensional" => array(
      "array" => "foo"
    )
  )
);
var_dump($array7["foo"]);
var_dump($array7[42]);
var_dump($array7["multi"]["dimensional"]["array"]);

//Разыменование массива
echo '<hr>';
function getArray()
{
  return array(1, 2, 3);
}

$secondElement = getArray()[1];
var_dump($secondElement);

//Создание и модификация с применением синтаксиса квадратных скобок
echo '<hr>';
$arr = array(5 => 1, 12 => 2);
$arr[] = 56;
$arr["x"] = 42;
unset($arr[5]);
var_dump($arr);
unset($arr);
//var_dump($arr);

echo '<hr>';
$array8 = array(1, 2, 3, 4, 5);
print_r($array8);
echo '<br>';
foreach ($array8 as $i => $value) {
  unset($array8[$i]);
}
print_r($array8);
echo '<br>';
$array8[] = 6;
print_r($array8);
echo '<br>';
$array8 = array_values($array8);
$array8[] = 7;
print_r($array8);

//Деструктуризация массива
echo '<hr>';
$source_array = ['foo', 'boo', 'baz'];
[$foo, $bar, $baz] = $source_array;
echo $foo;
echo '<br>';
echo $bar;
echo '<br>';
echo $baz;

echo '<br><br>';
$source_array2 = [
  [1, 'John'],
  [2, 'Jane'],
];
foreach ($source_array2 as [$id, $name]) {
  echo $id . ': ' . $name . '<br>';
}

echo '<br>';
[, , $baz] = $source_array;
echo $baz;

echo '<br><br>';
$source_array3 = ['foo' => 1, 'bar' => 2, 'baz' => 3];
[$baz => $three] = $source_array3;
echo $three;
echo '<br>';
$source_array4 = ['foo', 'bar', 'baz'];
[2 => $baz] = $source_array4;
echo $baz;

echo '<br><br>';
$a = 1;
$b = 2;
[$b, $a] = [$a, $b];
echo $a;    // выведет 2
echo $b;    // выведет 1

echo '<br><br>';
$a = array(1 => 'один', 2 => 'два', 3 => 'три');
// после удаления массив не переиндексирован
unset($a[2]);
var_dump($a);
// после удаления переиндексирован
$b = array_values($a);
var_dump($b);

//Что можно и нельзя делать с массивами
echo '<hr';
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', false);
$array9 = array(1, 2);
$count = count($array9);
for ($i = 0; $i < $count; $i++) {
  echo "\nПроверяем $i: \n";
  echo "Плохо: " . $array['$i'] . "\n";
  echo "Хорошо: " . $array[$i] . "\n";
  echo "Плохо: {$array['$i']}\n";
  echo "Хорошо: {$array[$i]}\n";
}

echo '<br><br>';
error_reporting(E_ALL);
$arr = array('fruit' => 'apple', 'veggie' => 'carrot');
print $arr['fruit'];
echo '<br>';
print $arr['veggie'];
echo '<br>';
//print $arr[fruit];
define('fruit', 'veggie');
echo '<br>';
print $arr['fruit'];
echo '<br>';
print $arr[fruit];
echo '<br>';
print "Hello $arr[fruit]";
echo '<br>';
print "Hello {$arr[fruit]}";
echo '<br>';
print "Hello {$arr['fruit']}";
//print "Hello $arr['fruit']";
//print "Hello $_GET['foo']";
echo '<br>';
print "Hello " . $arr['fruit'];

echo '<hr>';

class A
{
  private $B;
  protected $C;
  public $D;

  function __construct()
  {
    $this->{1} = null;
  }
}

var_export((array)new A());

echo '<br>';

class A1
{
  private $A;
}

class B extends A1
{
  private $A;
  public $AA;
}

var_export((array)new B());

//Распаковка массива
echo '<hr>';
$arr1 = [1, 2, 3];
$arr2 = [...$arr1];
$arr3 = [0, ...$arr1];
$arr4 = [...$arr1, ...$arr2, 111];
$arr5 = [...$arr1, ...$arr1];

function getArr()
{
  return ['a', 'b'];
}

$arr6 = [...getArr(), 'c' => 'd'];
echo '<br>';
print_r($arr1);
echo '<br>';
print_r($arr2);
echo '<br>';
print_r($arr3);
echo '<br>';
print_r($arr4);
echo '<br>';
print_r($arr5);
echo '<br>';
print_r($arr6);

echo '<br><br>';
$arr7 = ["a" => 1];
$arr8 = ["a" => 2];
$arr9 = ["a" => 0, ...$arr7, ...$arr8];
print_r($arr9);       // Array ( [a] => 2 )
echo '<br>';
$arr10 = [1, 2, 3];
$arr11 = [4, 5, 6];
$arr12 = [...$arr10, ...$arr11];
print_r($arr12);      // Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 [5] => 6 )


//Примеры:
// - способы объявления
echo '<hr>';
$a = array(
  'color' => 'красный',
  'taste' => 'сладкий',
  'shape' => 'круг',
  'name' => 'яблоко',
  4,
);
$b = array('a', 'b', 'c');

$a = array();
$a['color'] = 'красный';
$a['taste'] = 'сладкий';
$a['shape'] = 'круг';
$a['name'] = 'яблоко';
$a[] = 4;

$b = array();
$b[] = 'a';
$b[] = 'b';
$b[] = 'c';

print_r($a);
echo '<br>';
print_r($b);

echo '<br><br>';
$map = array(
  'version' => 4,
  'OS' => 'Linux',
  'lang' => 'english',
  'short_tags' => true
);

$array10 = array(
  7,
  8,
  0,
  156,
  -10
);

$switching = array(
  10,         // ключ = 0
  5 => 6,
  3 => 7,
  'a' => 4,
  11,         // ключ = 6 (максимальным числовым индексом было 5)
  '8' => 2, // ключ = 8 (число!)
  '02' => 77, // ключ = '02'
  0 => 12  // значение 10 будет перезаписано на 12
);

$empty = array();

print_r($map);
echo '<br>';
print_r($array10);
echo '<br>';
print_r($switching);
echo '<br>';
print_r($empty);

// - коллекция
echo '<br><br>';
$colors = array('красный', 'голубой', 'зелёный', 'жёлтый');
foreach ($colors as $color) {
  echo "Вам нравится $color?\n";
}

// - изменение элемента в цикле
echo '<br>';
foreach ($colors as &$color) {
  $color = mb_strtoupper($color);
}
unset($color);
print_r($colors);

// - индекс, начинающийся с единицы
echo '<br><br>';
$firstquarter = array(1 => 'Январь', 'Февраль', 'Март');
print_r($firstquarter);

// - заполнение массива
$handle = opendir('.');
while (false !== ($file = readdir($handle))) {
  $files[] = $file;
}
closedir($handle);

// - сортировка массива
echo '<br><br>';
sort($files);
print_r($files);

// рекурсивные и многомерные массивы
echo '<br><br>';
$fruits = array("fruits" => array("a" => "апельсин",
  "b" => "банан",
  "c" => "яблоко"
),
  "numbers" => array(1,
    2,
    3,
    4,
    5,
    6
  ),
  "holes" => array("первая",
    5 => "вторая",
    "третья"
  )
);

echo $fruits["holes"][5];    // напечатает «вторая»
echo '<br>';
echo $fruits["fruits"]["a"]; // напечатает «апельсин»
echo '<br>';
unset($fruits["holes"][0]);  // удалит «первая»

// Создаст новый многомерный массив
echo '<br>';
$juices["apple"]["green"] = "хороший";

$arr13 = array(2, 3);
$arr14 = $arr13;
$arr14[] = 4;
print_r($arr13);
echo '<br>';
print_r($arr14);

$arr15 =& $arr13;
$arr15[] = 8;
echo '<br>';
print_r($arr13);
echo '<br>';
print_r($arr15);