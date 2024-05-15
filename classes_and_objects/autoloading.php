<?php

namespace classes_and_objects\autoloading;
use classes_and_objects\MyClass1;
use classes_and_objects\MyClass2;

print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

spl_autoload_register(function ($bar) {
  include $bar . 'php';
});

$obj = new MyClass1();
$obj2 = new MyClass2();

echo '<br><br>';
spl_autoload_register(function ($name) {
  var_dump($name);
});

class Foo implements ITest {}

echo '<br><br>';
class Autoloader
{
  public static function register()
  {
    spl_autoload_register(function ($class) {
      $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
      if (file_exists($file)) {
        require $file;
        return true;
      }
      return false;
    });
  }
}
Autoloader::register();
