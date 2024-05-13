<?php

$makefoo = true;
bar();
if ($makefoo) {
  function foo()
  {
    echo "Я не существую, пока выполнение программы не дойдёт до меня.\n";
  }
}
if ($makefoo) foo();
function bar()
{
  echo "Я существую сразу после запуска программы.\n";
}

echo '<br>';
function foo2()
{
  function bar2()
  {
    echo "Я не существую, пока не вызовут функцию foo2().\n";
  }
};
foo2();
bar2();

// Рекурсивные функции
function recursion($a)
{
  if ($a < 20) {
    echo $a . '<br>';
    recursion($a + 1);
  }
}


/*===Function Arguments===*/

echo '<hr>';
print('<a href="http://php.manual/functions/function_arguments.php">http://php.manual/functions/function_arguments.php</a>');


/*===Returning values===*/

echo '<hr>';
function square($num)
{
  return $num * $num;
}

echo square(4);

//  Возврат нескольких значений в виде массива
echo '<br>';
function small_numbers()
{
  return [0, 1, 2];
}
[$zero, $one, $two] = small_numbers();
list($zero, $one, $two) = small_numbers();
var_dump(small_numbers());

//  Возврат результата по ссылке
function &return_reference()
{
  return $someref;
}

$newref =& return_reference();


/*===Variable functions===*/

echo '<hr>';
print('<a href="http://php.manual/functions/variable_functions.php">http://php.manual/functions/variable_functions.php</a>');

