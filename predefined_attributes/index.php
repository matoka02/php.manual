<?php

namespace predefined_attributes;
use Exception;

//final class Attribute
//{
//  /* Константы */
//  const int TARGET_CLASS;
//  const int TARGET_FUNCTION;
//  const int TARGET_METHOD;
//  const int TARGET_PROPERTY;
//  const int TARGET_CLASS_CONSTANT;
//  const int TARGET_PARAMETER;
//  const int TARGET_ALL;
//  const int IS_REPEATABLE;
//  /* Свойства */
//  public int $flags;
//  /* Методы */
//  public __construct(int $flags = Attribute::TARGET_ALL)
//}

/*
 * Класс AllowDynamicProperties - aтрибут маркирует классы, в которых разрешается объявлять
 * динамические свойства.
 */

//final class AllowDynamicProperties {
//  /* Методы */
//  public __construct()
//}


class DefaultBehavior{}

#[\AllowDynamicProperties]
class ClassAllowsDynamicProperties{}

$o1 = new DefaultBehavior();
$o2 = new ClassAllowsDynamicProperties();
$o1->nonExistingProp = true;
$o2->nonExistingProp = true;

echo '<br>';

//final class Override {
//  /* Методы */
//  public __construct()
//}

class Base
{
  protected function foo(): void {}
}

final class Extended extends Base
{
  #[\Override]
  protected function boo(): void {}
}

//final class ReturnTypeWillChange {
//  /* Методы */
//  public __construct()
//}

/*
 * Класс SensitiveParameter - атрибутом размечают параметр с чувствительным значением, которое
 * PHP отредактирует, когда значение пападёт в трассировку стека.
 */

//final class SensitiveParameter {
//  /* Методы */
//  public __construct()
//}

function defaultBehavior(
  string $secret,
  string $normal
) {
  throw new Exception('Error!');
}

function sensitiveParametersWithAttribute(
  #[\SensitiveParameter]
  string $secret,
  string $normal
) {
  throw new Exception('Error!');
}

try {
  defaultBehavior('password', 'normal');
} catch (Exception $e) {
  echo $e, PHP_EOL, PHP_EOL;
  echo '<br>';
}

try {
  sensitiveParametersWithAttribute('password', 'normal');
} catch (Exception $e) {
  echo $e, PHP_EOL, PHP_EOL;
  echo '<br>';
}