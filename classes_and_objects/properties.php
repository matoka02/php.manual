<?php

namespace classes_and_objects;
print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

class SimpleClass
{
  public $var1 = 'hello' . 'world';
  public $var2 = <<<EOD
hello world
EOD;
  public $var3 = 1 + 2;
  // Неправильное определение свойств:
//  public $var4 = self::myStaticMethod();
//  public $var5 = $myVar;

  // Правильное определение свойств:
  public $var6 = myConstant;
  public $var7 = [true, false];

  public $var8 = <<<'EOD'
hello world
EOD;

  // Без модификатора области видимости:
  static $var9;
  readonly int $var10;
}

echo 'ola';