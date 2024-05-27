<?php
namespace classes_and_objects\abstraction;

print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

/*
 * На основе абстрактного класса нельзя создавать объекты, и любой класс, содержащий хотя бы один
 * абстрактный метод, должен быть определён как абстрактный. Методы, объявленные абстрактными,
 * несут, по существу, лишь описательный смысл и не могут включать реализацию.
 * При наследовании от абстрактного класса, все методы, помеченные абстрактными в родительском классе, должны быть определены в дочернем классе и следовать обычным правилам наследования и совместимости сигнатуры.
 */

abstract class AbstractClass{
  // Данные методы должны быть определены в дочернем классе
  abstract protected function getValue();
  abstract protected function prefixValue($prefix);

  // Общий метод
  public function printOut() {
    print $this->getValue() . '<br>';
  }
}

class ConcreteClass1 extends AbstractClass{
  protected function getValue() {
    return "ConcreteClass1";
  }
  public function prefixValue($prefix) {
    return "{$prefix}ConcreteClass1";
  }
}

class ConcreteClass2 extends AbstractClass{
  public function getValue() {
    return "ConcreteClass2";
  }
  public function prefixValue($prefix) {
    return "{$prefix}ConcreteClass2";
  }
}

$class1 = new ConcreteClass1();
$class1->printOut();
echo $class1->prefixValue('FOO_') . '<br>';
$class2 = new ConcreteClass2();
$class2->printOut();
echo $class2->prefixValue('FOO_') . '<br>';

echo '<hr>';

abstract class AbstractClass3
{
  abstract protected function prefixName($name);
}

class ConcreteClass3 extends AbstractClass3
{
  public function prefixName($name, $separator = '.')
  {
    if ($name == 'Pacman') {
      $prefix = 'Mr';
    } elseif ($name == 'Pacwoman') {
      $prefix = 'Mrs';
    } else {
      $prefix = '';
    }
    return "{$prefix}{$separator}{$name}";
  }
}

$class3 = new ConcreteClass3();
echo $class3->prefixName('Pacman') , '<br>';
echo $class3->prefixName('Pacwoman') , '<br>';