<?php

namespace classes_and_objects\constructor;
print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

class BaseClass
{
  function __construct()
  {
    print 'Конструктор класса BaseClass' . '<br>';
  }
}

class SubClass extends BaseClass
{
  function __construct()
  {
    parent::__construct();
    print 'Конструктор класса SubClass' . '<br>';
  }
}

class OtherSubClass extends BaseClass
{
}

$obj = new BaseClass();
$obj2 = new SubClass();
$obj3 = new OtherSubClass();

//  Объявление аргументов в конструкторах

echo '<br>';

class Point
{
  protected int $x;
  protected int $y;

  public function __construct(int $x, int $y = 0)
  {
    $this->x = $x;
    $this->y = $y;
  }
}

// Передаём оба параметра
$p1 = new Point(4, 5);
// Передаём только обязательные параметры. Переменная $y содержит значение по умолчанию 0
$p2 = new Point(4);
// Вызываем с именованными параметрами (начиная с PHP 8.0):
$p3 = new Point(y: 5, x: 4);

var_dump($p1);
var_dump($p2);
var_dump($p3);


/*===Продвижение свойств в конструкторе===*/

echo '<hr>';

//  Продвижение параметров конструктора до свойств
class Point2
{
  public function __construct(protected int $x, protected int $y = 0)
  {
  }
}


/*===Ключевое слово new в инициализаторах===*/

echo '<hr>';
//  Пример ключевого слова new при инициализации класса
// Всё допустимо:
//static $x = new Foo;
//const C = new Foo;
function test($param = new Foo)
{
}

#[AnAttribute(new Foo)]
class Test
{
  public function __construct(public $prop = new Foo)
  {
  }
}

// Всё запрещено (ошибка времени компиляции):
//function test(
//  $a = new (CLASS_NAME_CONSTANT)(), // Динамическое имя класса
//  $b = new class {}, // Анонимный класс
//  $c = new A(...[]), // Распаковка аргументов
//  $d = new B($abc), // Неподдерживаемое постоянное выражение
//) {}


/*===Статические методы, которые создают объект класса===*/

echo '<hr>';

class Product
{
  private ?int $id;
  private ?string $name;

  private function __construct(?int $id = null, ?string $name = null)
  {
    $this->id = $id;
    $this->name = $name;
  }

  public static function fromBasicData(int $id, string $name): static
  {
    $new = new static($id, $name);
    return $new;
  }

  public static function fromJson(string $json): static
  {
    $data = json_decode($json, true);
    return new static($data["id"], $data["name"]);
  }

  public static function fromXml(string $xml): static
  {
    $data = convert_xml_to_array($xml);
    $new = new static();
    $new->id = $data["id"];
    $new->name = $data["name"];
    return $new;
  }
}

$p1 = Product::fromBasicData(5, 'Widget');
//$p2 = Product::fromJson($some_json_string);
//$p3 = Product::fromXml($some_xml_string);


/*===Деструкторы===*/

echo '<hr>';

class MyDestructableClass
{
  function __construct()
  {
    print "Конструктор\n";
    echo '<br>';
  }

  function __destruct()
  {
    print "Уничтожается " . __CLASS__ . "\n";
  }
}

$obj = new MyDestructableClass();