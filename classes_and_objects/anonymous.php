<?php
namespace classes_and_objects\anonymous;

print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

// Использование явного класса
//class Logger
//{
//  public function log($message)
//  {
//    echo $message;
//  }
//}

//$util->setLogger(new Logger());
// Использование анонимного класса
//$util->setLogger(new class {
//  public function log($message)
//  {
//    echo $message;
//  }
//});

class SomeClass{}
interface SomeInterface{}
trait SomeTrait{}

var_dump(new class(10) extends SomeClass implements SomeInterface{
  private $num;
  public function __construct($num){
    $this->num = $num;
  }
  use SomeTrait;
});

echo '<br>';

class Outer
{
  private $prop = 1;
  protected $prop2 = 2;
  protected function func1()
  {
    return 3;
  }

  public function func2()
  {
    return new class($this->prop) extends Outer {
      private $prop3;
      public function __construct($prop)
      {
        $this->prop3 = $prop;
      }
      public function func3()
      {
        return $this->prop2 + $this->prop3 + $this->func1();
      }
    };
  }
}

echo (new Outer)->func2()->func3();

echo '<br>';
function anonymous_class()
{
  return new class {};
}

if (get_class(anonymous_class()) === get_class(anonymous_class())) {
  echo 'Тот же класс';
} else {
  echo 'Другой класс';
}

echo '<br><br>';
echo get_class(new class {});   // class@anonymousC:\OSPanel\domains\php.manual\classes_and_objects\anonymous.php:79$b8