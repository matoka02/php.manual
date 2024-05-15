<?php

namespace classes_and_objects\properties;
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

/*===Объявления типов===*/

echo '<hr>';
class User
{
  public int $id;
  public ?string $name;

  public function __construct(int $id, ?string $name)
  {
    $this->id = $id;
    $this->name = $name;
  }
}

$user = new User(1234, null);
var_dump($user->id);      // int 1234
var_dump($user->name);    // null

echo '<br>';
class Shape
{
  public int $numberOfSides;
  public string $name;

  public function setNumberOfSides(int $numberOfSides): void
  {
    $this->numberOfSides = $numberOfSides;
  }
  public function setName(string $name): void
  {
    $this->name = $name;
  }
  public function getNumberOfSides(): int
  {
    return $this->numberOfSides;
  }
  public function getName(): string
  {
    return $this->name;
  }
}

$triangle = new Shape();
$triangle->setName('triangle');
$triangle->setNumberOfSides(3);
var_dump($triangle->getName());
var_dump($triangle->getNumberOfSides());
$circle = new Shape();
$circle->setName('circle');
var_dump($circle->getName());
//var_dump($circle->getNumberOfSides());    // Fatal error: Uncaught Error: Typed property classes_and_objects\Shape::$numberOfSides must not be accessed before initialization on line 66


/*===Readonly-свойства===*/

echo '<hr>';
class Test{
  public readonly string $prop;
  public function __construct(string $prop)
  {
    // Правильная инициализация.
    $this->prop=$prop;
  }
}

$test = new Test('foobar');
// Правильное чтение
var_dump($test->prop);
// Неправильное переопределение. Не имеет значения, что присвоенное значение такое же
//$test->prop = "foobar";
// Error: Cannot modify readonly property Test::$prop

class Test2
{
  public function __construct(
    public readonly int   $i = 0,
    public readonly array $arr = [],
  ) { }
}

$test2 = new Test2();
//$test2->i += 1;
//$test2->i++;
//++$test2->i;
//$test2->arr[] = 1;
//$test2->arr[0][] = 1;
//$ref =& $test2->i;
//$test2->i =& $ref;
//byRef($test2->i);
//foreach ($test2 as &$prop);

class Test3{
  public function __construct(public readonly object $obj){}
}
$test3 = new Test3(new \stdClass());
// Правильное внутреннее изменение
$test3->obj->foo = 1;

// Неправильное переопределение
//$test3->obj = new stdClass();
var_dump($test3->obj->foo);     // int 1