<?php
namespace classes_and_objects\methods;

print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

/*
 * Следующие названия методов считаются магическими:
 * __construct(),
 * __destruct(),
 * __call(),
 * __callStatic(),
 * __get(), __set(),
 * __isset(),
 * __unset(),
 * public __sleep(): array,
 * public __wakeup(): void,
 * public __serialize(): array,
 * public __unserialize(array $data): void,
 * public __toString(): string,
 * __invoke( ...$values): mixed,
 * static __set_state(array $properties): object,
 * __clone(): void,
 * __debugInfo(): array.
 * Внимание!
 * Все магические методы, за исключением __construct(), __destruct() и __clone(), ДОЛЖНЫ быть объявлены как public, в противном случае будет вызвана ошибка уровня E_WARNING. До PHP 8.0.0 для магических методов __sleep(), __wakeup(), __serialize(), __unserialize() и __set_state() не выполнялась проверка.
 */



/*===__sleep() и __wakeup()===*/

/*
 * Функция serialize() проверяет, присутствует ли в классе метод с магическим именем __sleep().
 * Если это так, то этот метод выполняется до любой операции сериализации.
 * Он может очистить объект и должен возвращать массив с именами всех переменных этого объекта,
 * которые должны быть сериализованы. Если метод ничего не возвращает, то сериализуется null и
 * выдаётся предупреждение E_NOTICE.
 */

class Connection
{
  protected $link;
  private $dsn, $username, $password;

  public function __construct($dsn, $username, $password)
  {
    $this->dsn = $dsn;
    $this->username = $username;
    $this->password = $password;
    $this->connect();
  }

  private function connect()
  {
    $this->link = new PDO($this->dsn, $this->username, $this->password);
  }

  public function __sleep()
  {
    return array('dsn', 'username', 'password');
  }

  public function __wakeup()
  {
    $this->connect();
  }
}


/*===__serialize() и __unserialize()===*/

/*
 * serialize() проверяет, есть ли в классе функция с магическим именем __serialize().
 * Если да, функция выполняется перед любой сериализацией.
 * Она должна создать и вернуть ассоциативный массив пар ключ/значение, которые представляют сериализованную форму объекта.
 * Если массив не возвращён, будет выдано TypeError.
 * Если и __serialize() и __sleep() определены в одном и том же объекте, будет вызван только метод __serialize().
 * __sleep() будет игнорироваться.
 * Ситуация с  __unserialize() и __wakeup() аналогична.
 */

class Connection2
{
  protected $link;
  private $dsn, $username, $password;

  public function __construct($dsn, $username, $password)
  {
    $this->dsn = $dsn;
    $this->username = $username;
    $this->password = $password;
    $this->connect();
  }

  private function connect()
  {
    $this->link = new PDO($this->dsn, $this->username, $this->password);
  }

  public function __serialize(): array
  {
    return [
      'dsn' => $this->dsn,
      'username' => $this->username,
      'password' => $this->password
    ];
  }

  public function __unserialize(array $data): void
  {
    $this->dsn = $data['dsn'];
    $this->username = $data['username'];
    $this->password = $data['password'];

    $this->connect();
  }
}


/*===__toString()===*/

/*
 * Метод __toString() позволяет классу решать, как он должен реагировать при преобразовании в строку.
*/

class TestClass
{
  public $foo;

  public function __construct($foo)
  {
    $this->foo = $foo;
  }

  public function __toString()
  {
    return $this->foo;
  }
}

$class = new TestClass('Привет');
echo $class;


/*===__invoke()===*/

/*
 * Метод __invoke() вызывается, когда скрипт пытается выполнить объект как функцию.
 */

echo '<hr>';

class CallableClass
{
  public function __invoke($x)
  {
    var_dump($x);
  }
}

$obj = new CallableClass();
$obj(5);
var_dump(is_object($obj));

echo '<br>';

class Sort
{
  private $key;

  public function __construct(string $key)
  {
    $this->key = $key;
  }

  public function __invoke(array $a, array $b): int
  {
    return $a[$this->key] <=> $b[$this->key];
  }
}

$customers = [
  ['id' => 1, 'first_name' => 'John', 'last_name' => 'Do'],
  ['id' => 3, 'first_name' => 'Alice', 'last_name' => 'Gustav'],
  ['id' => 2, 'first_name' => 'Bob', 'last_name' => 'Filipe']
];
// Сортировка клиентов по имени
usort($customers, new Sort('first_name'));
print_r($customers);
// Сортировка клиентов по фамилии
echo '<br><br>';
usort($customers, new Sort('last_name'));
print_r($customers);


/*===__set_state()===*/

/*
 * Этот статический метод вызывается для тех классов, которые экспортируются функцией var_export().
 */

echo '<hr>';

class A
{
  public $var1;
  public $var2;

  public static function __set_state($an_array)
  {
    $obj = new A;
    $obj->var1 = $an_array['var1'];
    $obj->var2 = $an_array['var2'];
    return $obj;
  }
}

$a = new A();               // boolean true
$a->var1 = 5;               // null
$a->var2 = 'foo';

$b = var_dump($a, true);
var_dump($b);
//eval('$c = ' . $b . ';');
//var_dump($c);


/*===__debugInfo()===*/

/*
 * Этот метод вызывается функцией var_dump(), когда необходимо вывести список свойств объекта.
 * Если этот метод не определён, тогда будут выведены все свойства объекта c модификаторами public, protected и private.
 */

echo '<hr>';

class C
{
  private $prop;

  public function __construct($val)
  {
    $this->prop = $val;
  }

  public function __debugInfo()
  {
    return [
      'propSquared' => $this->prop ** 2,
    ];
  }
}

var_dump(new C(42));        // int 1764


/*===__clone()===*/

/*
 * При клонировании объекта, PHP выполняет поверхностную копию всех свойств объекта. Любые
 * свойства, являющиеся ссылками на другие переменные, останутся ссылками.
 * После завершения клонирования, если метод __clone() определён, то будет вызван метод __clone()
 * вновь созданного объекта для возможного изменения всех необходимых свойств.
 */

echo '<hr>';

class SubObject
{
  static $instances = 0;
  public $instance;

  public function __construct()
  {
    $this->instance = ++self::$instances;
  }

  public function __clone(): void
  {
    // TODO: Implement __clone() method.
    $this->instance = ++self::$instances;
  }
}

class MyCloneable
{
  public $object1;
  public $object2;

  function __clone()
  {
    // Принудительно клонируем this->object1, иначе
    // он будет указывать на один и тот же объект.
    $this->object1 = clone $this->object2;
  }
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;

print "Оригинальный объект: " . '<br>';
print_r($obj);

print "Клонированный объект:" . '<br>';
print_r($obj2);

echo '<br><br>';

$dateTime = new \DateTime();
echo (clone $dateTime)->format('Y');