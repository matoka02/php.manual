<?php

namespace predefined_interfaces_and_classes;
use ArrayAccess;
use Serializable;
use stdClass;
use Stringable;
use Traversable;
use ArrayIterator;
use Iterator;
use IteratorAggregate;
use WeakMap;
use WeakReference;

/*
 * Интерфейс Traversable - интерфейс, определяющий, является ли класс обходимым (traversable) с
 * использованием foreach.
 * Абстрактный базовый интерфейс, который не может быть реализован сам по себе. Вместо этого
 * должен реализовываться IteratorAggregate или Iterator.
 * Этот интерфейс не имеет методов, его единственная цель - быть базовым интерфейсом для всех
 * обходимых классов.
 * 1.1 Интерфейс Iterator - интерфейс для внешних итераторов или объектов, которые могут
 * повторять себя изнутри.
 * 1.2 Интерфейс IteratorAggregate - интерфейс для создания внешнего итератора.
 * 1.3 Класс InternalIterator - класс для упрощения реализации интерфейса IteratorAggregate для
 * внутренних классов.
 * 1.4 Throwable является родительским интерфейсом для всех объектов, выбрасывающихся с помощью
 * выражения throw, включая классы Error и Exception.
 * Классы PHP не могут напрямую реализовать интерфейс Throwable. Вместо этого они могут
 * наследовать подкласс Exception.
 * 1.5 Интерфейс ArrayAccess - интерфейс разрешает обращаться к объектам как к массивам.
 * 1.6 Интерфейс Serializable - интерфейс для индивидуальной сериализации.
 * 1.7 Класс Closure - класс, используемый для создания анонимных функций.
 * 1.8 Класс stdClass - пустой класс общего назначения с динамическими свойствами.
 * 1.9 Класс Generator - объекты класса Generator возвращаются генераторами.
 * 1.10 Класс Fiber - файберы представляют собой прерываемые функции полного цикла. Файберы могут
 *  быть приостановлены из любого места цикла, приостанавливая выполнение в файбере до тех пор,
 * пока файбер не будет возобновлён в будущем.
 * 1.11 Класс WeakReference предоставляет способ доступа к объекту, не влияя при этом на
 * количество ссылок на него, таким образом сборщик мусора сможет освободить этот объект.
 * Объект класса WeakReference не может быть сериализован.
 * 1.12 Класс WeakMap — карта, или словарь, который принимает объекты как ключи. Основная задача
 * класса — создавать кеши данных, которые получили из объекта, которым не нужно жить дольше, чем объект.
 * Класс WeakMap реализует интерфейсы ArrayAccess, Traversable (через интерфейс
 * IteratorAggregate) и Countable, поэтому с объектом класса часто работают так же, как с ассоциативным массивом.
 * 1.13 Интерфейс Stringable обозначает класс, реализующий метод __toString(). В отличие от
 * большинства интерфейсов, Stringable неявно присутствует в любом классе, в котором определён
 * магический метод __toString(), хотя он может и должен быть объявлен явно.
 * 1.14 Интерфейс UnitEnum автоматически применяется движком ко всем перечислениям. Он не может
 * быть реализован пользовательскими классами. Перечисления не могут переопределять его методы,
 * поскольку реализации по умолчанию предоставляются движком. Доступен только для проверки типа.
 * 1.15 Интерфейс BackedEnum автоматически применяется движком к типизированным перечислениям. Он
 *  не может быть реализован пользовательскими классами. Перечисления не могут переопределять его
 *  методы, поскольку реализации по умолчанию предоставляются движком. Доступен только для проверки типа.
 * 1.16 Класс SensitiveParameterValue позволяет обернуть чувствительные значения, чтобы защитить
 * их от случайного раскрытия.
 */


//interface Traversable{}
//var_dump(Traversable::class);



//interface Iterator extends Traversable
//{
//  /* Методы */
//  public current(): mixed
//public key(): mixed
//public next(): void
//public rewind(): void
//public valid(): bool
//}

class myIterator implements Iterator
{
  private $position = 0;
  private $array = array(
    'firstelement',
    'secondelement',
    'thirdelement',
  );

  public function __construct()
  {
    $this->position = 0;
  }

  public function rewind(): void
  {
    var_dump(__METHOD__);
    $this->position = 0;
  }

  #[\ReturnTypeWillChange]
  public function current()
  {
    var_dump(__METHOD__);
    return $this->array[$this->position];
  }

  #[\ReturnTypeWillChange]
  public function key()
  {
    var_dump(__METHOD__);
    return $this->position;
  }

  public function next(): void
  {
    var_dump(__METHOD__);
    ++$this->position;
  }

  public function valid(): bool
  {
    var_dump(__METHOD__);
    return isset($this->array[$this->position]);
  }
}

$it = new myIterator();

foreach ($it as $key => $value) {
  var_dump($key, $value);
  echo '<br>';
}

echo '<br><br>';

//interface IteratorAggregate extends Traversable
//{
//  /* Методы */
//  public getIterator(): Traversable
//}

class myData implements IteratorAggregate
{
  public $property1 = 'Первое общедоступное свойство';
  public $property2 = 'Второе общедоступное свойство';
  public $property3 = 'Третье общедоступное свойство';
  public $property4 = '';

  public function __construct()
  {
    $this->property4 = 'последнее свойство';
  }

  public function getIterator(): Traversable
  {
    return new ArrayIterator($this);
  }
}

$obj = new myData();

foreach ($obj as $key => $value) {
  var_dump($key, $value);
  echo '<br>';
}

echo '<br><br>';


//final class InternalIterator implements Iterator {
//  /* Методы */
//  private __construct()
//public current(): mixed
//public key(): mixed
//public next(): void
//public rewind(): void
//public valid(): bool
//}


//interface Throwable extends Stringable {
//  /* Методы */
//  public getMessage(): string
//public getCode(): int
//public getFile(): string
//public getLine(): int
//public getTrace(): array
//public getTraceAsString(): string
//public getPrevious(): ?Throwable
//public __toString(): string
///* Наследуемые методы */
//public Stringable::__toString(): string
//}


//interface ArrayAccess {
//  /* Методы */
//  public offsetExists(mixed $offset): bool
//public offsetGet(mixed $offset): mixed
//public offsetSet(mixed $offset, mixed $value): void
//public offsetUnset(mixed $offset): void
//}

class Obj implements ArrayAccess
{
  public $container = [
    'one' => 1,
    'two' => 2,
    'three' => 3,
  ];

  public function offsetSet($offset, $value): void
  {
    if (is_null($offset)) {
      $this->container[] = $value;
    } else {
      $this->container[$offset] = $value;
    }
  }

  public function offsetExists($offset): bool
  {
    return isset($this->container[$offset]);
  }

  public function offsetUnset($offset): void
  {
    unset($this->container[$offset]);
  }

  public function offsetGet($offset): mixed
  {
    return isset($this->container[$offset]) ? $this->container[$offset] : null;
  }
}

$obj2 = new Obj();

var_dump(isset($obj2['two']));
var_dump($obj2['two']);
unset($obj2['two']);
var_dump(isset($obj2['two']));
$obj2['two'] = 'A value';
var_dump($obj2['two']);
$obj2[] = 'Append 1';
$obj2[] = 'Append 2';
$obj2[] = 'Append 3';
print_r($obj2);

echo '<br><br>';

//interface Serializable {
//  /* Методы */
//  public serialize(): ?string
//public unserialize(string $data): void
//}

class obj3 implements Serializable
{
  private $data;

  public function __construct()
  {
    $this->data = 'Мои закрытые данные';
  }

  public function serialize()
  {
    return serialize($this->data);
  }

  public function unserialize($data)
  {
    $this->data = unserialize($data);
  }

  /** @return string */
  public function getData(): string
  {
    return $this->data;
  }
}

$obj3 = new obj3();
$ser = serialize($obj3);
var_dump($ser);
$newobj3 = unserialize($ser);
var_dump($newobj3->getData());

echo '<br><br>';

//final class Closure {
//  /* Методы */
//  private __construct()
//public static bind(Closure $closure, ?object $newThis, object|string|null $newScope = "static"): ?Closure
//public bindTo(?object $newThis, object|string|null $newScope = "static"): ?Closure
//public call(object $newThis, mixed ...$args): mixed
//public static fromCallable(callable $callback): Closure
//}

//class stdClass {
//}

$obj4 = (object)array('foo' => 'bar');
var_dump($obj4);

$json = '{"foo":"bar"}';
var_dump(json_decode($json));

$obj5 = new stdClass();
$obj5->foo = 42;
$obj5->{1} = 23;
var_dump($obj5);

echo '<br><br>';

//final class Generator implements Iterator {
//  /* Методы */
//  public current(): mixed
//public getReturn(): mixed
//public key(): mixed
//public next(): void
//public rewind(): void
//public send(mixed $value): mixed
//public throw(Throwable $exception): mixed
//public valid(): bool
//public __wakeup(): void
//}

//final class Fiber
//{
//  /* Методы */
//  public __construct(callable $callback)
//public start(mixed ...$args): mixed
//public resume(mixed $value = null): mixed
//public throw(Throwable $exception): mixed
//public getReturn(): mixed
//public isStarted(): bool
//public isSuspended(): bool
//public isRunning(): bool
//public isTerminated(): bool
//public static suspend(mixed $value = null): mixed
//public static getCurrent(): ?Fiber
//}

//final class WeakReference {
//  /* Методы */
//  public __construct()
//public static create(object $object): WeakReference
//public get(): ?object
//}

$obj6 = new stdClass();
$weakref = WeakReference::create($obj6);
var_dump($weakref->get());
unset($obj6);
var_dump($weakref->get());

echo '<br><br>';

//final class WeakMap implements ArrayAccess, Countable, IteratorAggregate {
//  /* Методы */
//  public count(): int
//public getIterator(): Iterator
//public offsetExists(object $object): bool
//public offsetGet(object $object): mixed
//public offsetSet(object $object, mixed $value): void
//public offsetUnset(object $object): void
//}

$wm = new WeakMap();
$o = new stdClass();

class A
{
  public function __destruct()
  {
    echo 'Уничтожено! <br>';
  }
}

$wm[$o] = new A();
var_dump(count($wm));
echo 'Сброс...<br>';
unset($o);
echo 'Готово<br>';
var_dump(count($wm));

echo '<br><br>';

//interface Stringable {
//  /* Методы */
//  public __toString(): string
//}

class IP4Address implements Stringable
{
  private string $oct1;
  private string $oct2;
  private string $oct3;
  private string $oct4;

  public function __construct(string $oct1, string $oct2, string $oct3, string $oct4)
  {
    $this->oct1 = $oct1;
    $this->oct2 = $oct2;
    $this->oct3 = $oct3;
    $this->oct4 = $oct4;
  }

  public function __toString(): string
  {
    return "$this->oct1.$this->oct2.$this->oct3.$this->oct4";
  }
}

function showStuff(string|Stringable $value)
{
  print $value;
}

$ip = new IP4Address('123', '456', '78', '9');
showStuff($ip);

echo '<br><br>';

//interface UnitEnum {
//  /* Методы */
//  public static cases(): array
//}

//interface BackedEnum extends UnitEnum {
//  /* Методы */
//  public static from(int|string $value): static
//public static tryFrom(int|string $value): ?static
//  /* Наследуемые методы */
//public static UnitEnum::cases(): array
//}

//final class SensitiveParameterValue {
//  /* Свойства */
//  private readonly mixed $value;
//  /* Методы */
//  public __construct(mixed $value)
//public __debugInfo(): array
//public getValue(): mixed
//}