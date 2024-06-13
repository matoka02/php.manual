<?php

namespace errors;
use Stringable;

/*
 * Параметр error_reporting в php.ini. На стадии разработки указать значение E_ALL, на готовом
 * продукте можно E_ALL & ~E_NOTICE & ~E_DEPRECATED.
 * Параметр display_errors в php.ini. На стадии разработки включить, после - отключить.
 * Параметр log_errors в php.ini. Файл лога указывается в параметре error_log.
 * Пользовательская обработка ошибок может быть установлена в функции set_error_handler().
 */

/*
 * Иерархия Error:
 * - Throwable:
 * 1. Error:
 *  1.1 ArithmeticError:
 *    - DivisionByZeroError;
 *  1.2 AssertionError;
 *  1.3 CompileError:
 *    - ParseError;
 *  1.4 TypeError:
 *    - ArgumentCountError;
 *  1.5 ValueError;
 *  1.6 UnhandledMatchError;
 *  1.7 FiberError;
 * - Exception:
 *  ...
 */


print('<a href="https://www.php.net/manual/ru/class.throwable.php">https://www.php.net/manual/ru/class.throwable.php</a>');
echo '<br>';
print('<a href="https://www.php.net/manual/ru/class.error.php">https://www.php.net/manual/ru/class.error.php</a>');
echo '<br>';
print('<a href="https://www.php.net/manual/ru/class.arithmeticerror.php">https://www.php.net/manual/ru/class.arithmeticerror.php</a>');
echo '<br>';
print('<a href="https://wwhttps://www.php.net/manual/ru/class.divisionbyzeroerror.php">https://www.php.net/manual/ru/class.divisionbyzeroerror.php</a>');
echo '<br>';
print('<a href="https://www.php.net/manual/ru/class.assertionerror.php">https://www.php.net/manual/ru/class.assertionerror.php</a>');
echo '<br>';
print('<a href="https://www.php.net/manual/ru/class.compileerror.php">https://www.php.net/manual/ru/class.compileerror.php</a>');
echo '<br>';
print('<a href="https://www.php.net/manual/ru/class.parseerror.php">https://www.php.net/manual/ru/class.parseerror.php</a>');
echo '<br>';
print('<a href="https://www.php.net/manual/ru/class.typeerror.php">https://www.php.net/manual/ru/class.typeerror.php</a>');
echo '<br>';
print('<a href="https://www.php.net/manual/ru/class.argumentcounterror.php">https://www.php.net/manual/ru/class.argumentcounterror.php</a>');
echo '<br>';
print('<a href="https://www.php.net/manual/ru/class.valueerror.php">https://www.php.net/manual/ru/class.valueerror.php</a>');
echo '<br>';
print('<a href="https://www.php.net/manual/ru/class.unhandledmatcherror.php">https://www.php.net/manual/ru/class.unhandledmatcherror.php</a>');
echo '<br>';
print('<a href="https://www.php.net/manual/ru/class.fibererror.php">https://www.php.net/manual/ru/class.fibererror.php</a>');
echo '<br>';
print('<a href="https://www.php.net/manual/ru/class.throwable.php">https://www.php.net/manual/ru/class.throwable.php</a>');
echo '<br>';
print('<a href="https://www.php.net/manual/ru/class.exception.php">https://www.php.net/manual/ru/class.exception.php</a>');
