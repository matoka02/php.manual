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

