<?php

namespace variables\index;
/*===Basics===*/

$var = 'Боб';
$Var = 'Джо';
echo "$var, $Var";

echo '<br>';
//$4site = 'ещё нет';     // Неверно; начинается с цифры
$_4site = 'ещё нет';    // Верно; начинается с символа подчёркивания
$täyte = 'mansikka';    // Верно; 'ä' это (Расширенный) ASCII 228.

echo '<br>';
$foo = 'Боб';              // Присваивает переменной $foo значение «Боб»
$bar = &$foo;              // Ссылка на переменную $foo через переменную $bar.
$bar = "Меня зовут $bar";  // Изменение переменной $bar...
echo $bar;
echo '<br>';
echo $foo;                 // ...меняет и переменную $foo.

echo '<br>';
$foo2 = 25;
$bar2 =& $foo;
//$bar2=&(24*7);

function test()
{
  return 25;
}

//$bar3=&test();

//Значения по умолчанию в неинициализированных переменных

echo '<hr>';
/** @var TYPE_NAME $unset_var */
var_dump($unset_var);                         // null
/** @var TYPE_NAME $unset_bool */
echo $unset_bool ? "true\n" : "false\n";      // false
/** @var TYPE_NAME $unset_str */
$unset_str .= 'abc';
var_dump($unset_str);                         // string 'abc'
/** @var TYPE_NAME $unset_int */
$unset_int += 25;
var_dump($unset_int);                         // int 25
/** @var TYPE_NAME $unset_float */
$unset_float += 1.25;
var_dump($unset_float);                       // float 1.25
$unset_arr[3] = "def";
var_dump($unset_arr);                         // array (size=1): 3 => string 'def' (length=3)
/** @var TYPE_NAME $unset_obj */
//$unset_obj->foo5 = 'bar';                     // object(stdClass)#1 (1) {  ["foo"]=>  string(3) "bar" }
//var_dump($unset_obj);


/*===Variable scope===*/
echo '<hr>';
print('<a href="http://php.manual/variables/scope.php">http://php.manual/variables/scope.php</a>');


/*===Variable variables===*/
echo '<hr>';

$a = 'hello';
$$a = 'world';
echo "$a {$$a}";
echo '<br>';
echo "$a $hello";

echo '<br>';

class Foo
{
  public $bar = 'Я bar.';
  public $arr = array('Я A.', 'Я B.', 'Я C.');
  public $r = 'Я r.';
}

$foo3 = new Foo();
$bar3 = 'bar';
$baz = array('foo', 'bar', 'baz', 'quux');
echo $foo3->$bar3 . "\n";
echo '<br>';
echo $foo3->{$baz[1]} . "\n";

$start = 'b';
$end = 'ar';
echo '<br>';
echo $foo3->{$start . $end} . "\n";

$arr = 'arr';
echo '<br>';
echo $foo3->{$arr[1]} . "\n";


/*===Variables From External Sources ===*/
echo '<hr>';
print('<a href="http://php.manual/variables/external.php">http://php.manual/variables/external.php</a>');

/*
PHP содержит несколько функций, которые умеют определять тип переменной, например: gettype(), is_array(), is_float(), is_int(), is_object() и is_string().
*/