<?php

namespace operators\anonymous_function;
print('<a href="http://php.manual/functions/index.php">Back</a>');
echo '<br><br>';

//PHP создаёт анонимные функции через класс Closure.

echo preg_replace_callback(
  '~-([a-z])~',
  function ($match) {
    return strtoupper($match[1]);
  },
  'hello-world'
);

//Пример присваивания анонимной функции как значения переменной

echo '<br>';
$greet=function ($name) {
  printf("Hello %s\r\n", $name);
};
$greet('World!');
$greet('PHP!');

//Пример наследования переменных из родительской области видимости
echo '<br>';
$message = 'привет';
// Без конструкции use
$example = function () {
  /** @var TYPE_NAME $message */
  var_dump($message);       // null
};
$example();
// Наследуем переменную $message
$example = function () use ($message) {
  var_dump($message);       // string 'привет', string 'привет'
};
$example();

// Анонимная функция наследует переменную с тем значением, которое переменная
// содержала перед определением функции, а не в месте вызова функции
$message = 'мир';
$example();

// Сбросим message
$message = 'привет';

// Наследование по ссылке
$example = function () use (&$message) {
  var_dump($message);       // string 'привет', string 'мир'
};
$example();

// Значение, которое изменили в родительской области видимости,
// отражается внутри вызова функции
$message = 'мир';
echo $example();

// Замыкания умеют принимать обычные аргументы
$example = function ($arg) use ($message) {
  var_dump($arg . ', ' . $message);   // string 'привет, мир', string 'привет, мир'
};
$example("привет");

// Объявление типа значения, которое вернёт функция, идёт после конструкции use
$example = function () use ($message): string {
  return "привет, $message";
};
var_dump($example());


//Замыкания и область видимости
echo '<br>';

class Cart
{
  const PRICE_BUTTER = 1.00;
  const PRICE_MILK = 3.00;
  const PRICE_EGGS = 6.95;

  protected $products = array();

  public function add($product, $quantity)
  {
    $this->products[$product] = $quantity;
  }

  public function getQuantity($product)
  {
    return isset($this->products[$product]) ? $this->products[$product] : FALSE;
  }

  public function getTotal($tax)
  {
    $total = 0.00;
    $callback = function ($quantity, $product) use ($tax, &$total) {
      $pricePerItem = constant(__CLASS__ . "::PRICE_" . strtoupper($product));
      $total += ($pricePerItem * $quantity) * ($tax + 1.0);
    };

    array_walk($this->products, $callback);
    return round($total, 2);
  }
}

$my_cart = new Cart();

$my_cart->add('butter',1);
$my_cart->add('milk',3);
$my_cart->add('eggs',6);

print $my_cart->getTotal(0.05).'<br>';      // 54.29

//Автоматическое связывание переменной $this
echo '<br>';

class Test
{
  public function testing()
  {
    return function () {
      var_dump($this);      // object(Test)[4]
    };
  }
}

$object = new Test();
$function = $object->testing();
$function();



/*===Static anonymous functions===*/
echo '<hr>';

class Foo
{
  function __construct()
  {
    $func = static function () {
      var_dump($this);
    };
    $func();
  }
}

new Foo();

// Попытка связать объект со статической анонимной функцией
echo '<br>';
$func = static function() {
  // Тело функции
};

$func = $func->bindTo(new stdClass);
$func();
