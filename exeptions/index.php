<?php

namespace exeptions;

// Преобразование отчётов об ошибках в исключения
use ErrorException;
use Exception;

function exceptions_error_handler($severity, $message, $filename, $lineno) {
  throw new ErrorException($message, 0, $severity, $filename, $lineno);
};
//set_error_handler('exceptions_error_handler');


// Выброс исключения
function inverse($x)
{
  if (!$x) {
    throw new Exception('Деление на ноль.');
  }
  return 1 / $x;
}

try {
  echo inverse(5) . '<br>';
  echo inverse(0) . '<br>';
} catch (Exception $e) {
  echo 'PHP перехватил исключение: ' . $e->getMessage() . '<br>';
}

echo 'Привет, мир <br>';


//  Обработка исключений в блоке finally
echo '<br><br>';
function inverse2($x)
{
  if (!$x) {
    throw new Exception('Деление на ноль.');
  }
  return 1 / $x;
}

try {
  echo inverse2(5) . '<br>';
} catch (Exception $e) {
  echo 'PHP перехватил исключение: ' . $e->getMessage() . '<br>';
} finally {
  echo 'Первый блок finally. <br>';
}

try {
  echo inverse2(0) . '<br>';
} catch (Exception $e) {
  echo 'PHP перехватил исключение: ' . $e->getMessage() . '<br>';
} finally {
  echo 'Второй блок finally. <br>';
}

echo 'Привет, мир <br>';


//  Взаимодействие между блоками finally и return
echo '<br><br>';

function test()
{
  try {
    throw new Exception('foo');
  } catch (Exception $e) {
    return 'catch';
  } finally {
    return 'finally';
  }
}

echo test();


//  Вложенные исключения
echo '<br><br>';

class MyException extends Exception{}

class Test
{
  public function testing()
  {
    try {
      try {
        throw new MyException('foo!');
      } catch (MyException $e) {
        // Повторный выброс исключения
        throw $e;
      }
    } catch (Exception $e) {
      var_dump($e->getMessage());
    }
  }
}

$foo = new Test;
$foo->testing();


//  Обработка нескольких исключений в одном блоке catch
echo '<br><br>';

class MyException2 extends Exception{}
class MyOtherException2 extends Exception{}

class Test2
{
  public function testing2()
  {
    try {
      throw new MyException2();
    } catch (MyException2|MyOtherException2 $e) {
      var_dump(get_class($e));
    }
  }
}

$foo2 = new Test2;
$foo2->testing2();


//  Пример блока catch без переменной
echo '<br><br>';

class SpecificException extends Exception{}

function test3()
{
  throw new SpecificException('Ой!');
}

try {
  test3();
} catch (SpecificException) {
  print 'Функция выбросила исключение SpecificException, но детали исключения неважны.';
}


//  Throw как выражение
echo '<br><br>';

function test4()
{
  throw new Exception('Всё сломалось');
}

try {
  test4();
} catch (Exception $e) {
  print $e->getMessage();
}