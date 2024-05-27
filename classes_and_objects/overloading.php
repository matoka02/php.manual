<?php
namespace classes_and_objects\overloading;

print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

/*
 * Перегрузка свойств
 * public __set(string $name, mixed $value): void
 * public __get(string $name): mixed
 * public __isset(string $name): bool
 * public __unset(string $name): void
 *
 * Метод __set() будет выполнен при записи данных в недоступные (защищённые или приватные) или несуществующие свойства.
 * Метод __get() будет выполнен при чтении данных из недоступных (защищённых или приватных) или несуществующих свойств.
 * Метод __isset() будет выполнен при использовании isset() или empty() на недоступных (защищённых или приватных) или несуществующих свойствах.
 * Метод __unset() будет выполнен при вызове unset() на недоступном (защищённом или приватном)
 * или несуществующем свойстве.
 */

class PropertyTest
{
  private $data = array();
  public $declared = 1;
  private $hidden = 2;

  public function __set($name, $value)
  {
    echo "Установка '$name' в '$value'" . '<br>';
    $this->data[$name] = $value;
  }

  public function __get($name)
  {
    echo "Получение '$name'" . '<br>';
    if (array_key_exists($name, $this->data)) {
      return $this->data[$name];
    }

    $trace = debug_backtrace();
    trigger_error(
      'Undefined property via __get(): ' . $name . ' in ' . $trace[0]['file'] . ' on line ' .
      $trace[0]['line'], E_USER_NOTICE
    );
    return null;
  }

  public function __isset($name)
  {
    echo "Установлено ли '$name'?" . '<br>';
    return isset($this->data[$name]);
  }

  public function __unset($name)
  {
    echo "Уничтожение '$name'" . '<br>';
    unset($this->data[$name]);
  }

  //Не магический метод, просто для примера.
  public function getHidden()
  {
    return $this->hidden;
  }
}

echo '<pre><br>';
$obj = new PropertyTest;
$obj->a = 1;
echo $obj->a . '<br><br>';

var_dump(isset($obj->a));
unset($obj->a);
var_dump(isset($obj->a));
echo '<br>';

echo $obj->declared . '<br><br>';

echo "Давайте поэкспериментируем с закрытым свойством 'hidden':\n";
echo "Закрытые свойства видны внутри класса, поэтому __get() не используется...\n";
echo $obj->getHidden() . "\n";
echo "Закрытые свойства не видны вне класса, поэтому __get() используется...\n";
echo $obj->hidden . "\n";

echo '<hr>';

/*
 * Перегрузка методов
 * public __call(string $name, array $arguments): mixed
 * public static __callStatic(string $name, array $arguments): mixed
 * __call() запускается при вызове недоступных методов в контексте объект.
 * __callStatic() запускается при вызове недоступных методов в статическом контексте.
*/

class MethodTest {
  public function __call($name, $arguments) {
    // Замечание: значение $name регистрозависимо.
    echo "Вызов метода '$name' "
      . implode(', ', $arguments). '<br>';
  }

  public static function __callStatic($name, $arguments) {
    // Замечание: значение $name регистрозависимо.
    echo "Вызов статического метода '$name' "
      . implode(', ', $arguments). '<br>';
  }
}

$obj = new MethodTest;
$obj->runTest('в контексте объекта');

MethodTest::runTest('в статическом контексте');
