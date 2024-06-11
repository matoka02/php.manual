<?php

namespace enumerations;

use UnitEnum;

enum Suit{
  case Hearts;
  case Diamonds;
  case Clubs;
  case Spades;
}
function pick_a_card(Suit $suit){}

$val = Suit::Hearts;
pick_a_card($val);
pick_a_card(Suit::Clubs);
//pick_a_card('Spades');

$a = Suit::Spades;
$b = Suit::Spades;
var_dump($a === $b);
var_dump($a instanceof Suit);
print Suit::Spades->name;


/*===Типизированные перечисления===*/
echo '<hr>';
// Типизированное перечисление может поддерживаться типами int или string и такое перечисление
// поддерживает только один тип за раз (то есть нельзя объединять int|string)

enum Suit2: string
{
  case Hearts = 'H';
  case Diamonds = 'D';
  case Clubs = 'C';
  case Spades = 'S';
}

print Suit2::Clubs->value;
//$suit2 = Suit2::Clubs;
//$ref2 = &$suit2->value;   // Error: Cannot acquire reference to property Suit::$value

//$record2 = get_stuff_from_database($id);
//print $record2['suit'];
//$suit2 = Suit::from($record2['suit']);
//print $suit2->value;
//$suit2 = Suit2::tryFrom('A') ?? Suit2::Spades;
//print $suit2->value;


/*===Методы перечислений===*/
echo '<hr>';

interface Colorful3
{
  public function color(): string;
}

enum Suit3 implements Colorful3
{
  case Hearts3;
  case Diamonds3;
  case Clubs3;
  case Spades3;

  // Выполняет контракт интерфейса.
  public function color(): string
  {
    // TODO: Implement color() method.
    return match ($this) {
      Suit3::Hearts3, Suit3::Diamonds3 => 'Красный',
      Suit3::Clubs3, Suit3::Spades3 => 'Чёрный',
    };
  }

  // Не часть интерфейса; хорошо.
  public function shape(): string
  {
    return 'Rectangle';
  }
}

function paint(Colorful3 $c){}

paint(Suit3::Clubs3);
print Suit3::Diamonds3->shape();

echo '<br>';
interface Colorful4{
  public function color4(): string;
}

enum Suit4: string implements Colorful4
{
  case Hearts4 = 'H';
  case Diamonds4 = 'D';
  case Clubs4 = 'C';
  case Spades4 = 'S';

  // Выполняет интерфейсный контракт.
  public function color4(): string
  {
    // TODO: Implement color4() method.
    return match ($this) {
      Suit4::Hearts4, Suit4::Diamonds4 => 'Красный',
      Suit4::Clubs4, Suit4::Spades4 => 'Чёрный',
    };
  }
}

print Suit4::Diamonds4->color4();

echo '<br>';

interface Colorful5
{
  public function color5(): string;
}

//final class Suit5 implements \UnitEnum, Colorful5
//{
//  public const Hearts5 = new self('Hearts5');
//  public const Diamonds5 = new self('Diamonds5');
//  public const Clubs5 = new self('Clubs5');
//  public const Spades5 = new self('Spades5');
//
//  private function __construct(public readonly string $name){}
//
//  public function color5(): string
//  {
//    // TODO: Implement color5() method.
//    return match ($this) {
//      Suit5::Hearts5, Suit5::Diamonds5 => 'Красный',
//      Suit5::Clubs5, Suit5::Spades5 => 'Чёрный',
//    };
//  }
//
//  public function shape(): string
//  {
//    return 'Прямоугольник';
//  }
//
////  public function name(): array{
////    // Недопустимый метод, поскольку определение метода cases() в перечислениях вручную запрещено.
////    // Смотрите также раздел "Список значений".
////  }
//}


/*===Статические методы перечислений===*/
echo '<hr>';

enum Size
{
  case Small;
  case Medium;
  case Large;

  public static function fromLength(int $cm): static
  {
    return match (true) {
      $cm < 50 => static::Small,
      $cm < 100 => static::Medium,
      default => static::Large,
    };
  }
}
var_dump(Size::fromLength(80));


/*===Константы перечислений===*/
echo '<hr>';

enum Size2
{
  case Small;
  case Medium;
  case Large;

  public const Huge = self::Large;
}
var_dump(Size2::Huge);


/*===Трейты===*/
echo '<hr>';

interface Colorful6{
  public function color6(): string;
}

trait Rectangle{
  public function shape(): string{
    return 'Прямоугольник';
  }
}

enum Suit6 implements Colorful6
{
  use Rectangle;

  case Hearts6;
  case Diamonds6;
  case Clubs6;
  case Spades6;

  public function color6(): string
  {
    return match ($this) {
      Suit6::Hearts6, Suit6::Diamonds6 => 'Красный',
      Suit6::Clubs6, Suit6::Spades6 => 'Чёрный',
    };
  }
}
print Suit6::Spades6->color6();


/*===Значения перечисления в постоянных выражениях===*/
echo '<hr>';

enum Direction implements \ArrayAccess
{
  case Up;
  case Down;

  public function offsetExists($offset): bool
  {
    return false;
  }
  public function offsetGet($offset): mixed{
    return null;
  }
  public function offsetSet($offset, $value): void{
    throw new \Exception();
  }
  public function offsetUnset($offset): void{
    throw new \Exception();
  }
}

class Foo
{
  // Это разрешено.
  const DOWN = Direction::Down;
  // Это запрещено, так как не может быть детерминированным.
  const UP = Direction::Up['short'];
}

// Это совершенно законно, потому что это не постоянное выражение.
//$x = Direction::Up['short'];
//var_dump('\$x - это ' . var_dump($x, true));
//$foo = new Foo();


/*===Отличия от объектов===*/
echo '<hr>';

/*
 * Перечислениям доступны следующие функциональные возможности объекта с аналогичным поведением:
 * - Методы public, private и protected.
 * - Статические методы public, private и protected.
 * - Константы public, private и protected.
 * - Перечислениям разрешено реализовывать любое количество интерфейсов.
 * - К перечислениям и вариантам разрешено добавлять атрибуты.  Целевой фильтр TARGET_CLASS
 * включает сами перечисления. Целевой фильтр TARGET_CLASS_CONST включает варианты перечислений.
 * - Магические методы __call, __callStatic, и __invoke.
 * - Константы __CLASS__ и __FUNCTION__ ведут себя как обычно.
 *
 * Магическая константа ::class для типа перечисления оценивается как название перечисления,
 * включая любое пространство имён, точно так же, как объект. Магическая константа ::class в
 * экземпляре варианта также оценивается как тип перечисления, поскольку она — экземпляр этого типа.
 *
 * Кроме того, варианты перечисления нельзя создавать через ключевое слово new или методом
 * ReflectionClass::newInstanceWithoutConstructor().  Оба способа приведут к ошибке.
 */

//$clovers = new Suit();

//$horseshoes = (new ReflectionClass(Suit::class))->newInstanceWithoutConstructor()


/*===Список значений===*/
echo '<hr>';

/*
 * И чистые, и типизированные перечисления реализуют внутренний интерфейс с именем UnitEnum.
 * Интерфейс UnitEnum включает статический метод cases(). Метод cases() возвращает упакованный
 * массив всех определённых в перечислении вариантов в порядке объявления.
 */

var_dump(Suit::cases());
var_dump(Suit6::cases());


/*===Сериализация===*/
echo '<hr>';

Suit::Hearts === unserialize(serialize(Suit::Hearts));
print serialize(Suit::Hearts);

echo '<br>';

enum Foo2
{
  case Bar;
}

enum Baz2: int
{
  case Beep = 5;
}

print_r(Foo2::Bar);
echo '<br>';
print_r(Baz2::Beep);

