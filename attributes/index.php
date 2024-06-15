<?php

namespace attributes;

use Attribute;
use ReflectionClass;
use RuntimeException;

//interface ActionHandler
//{
//  public function execute();
//}
//
//#[Attribute]
//class SetUp{}
//
//class CopyFile implements ActionHandler
//{
//  public string $fileName;
//  public string $targetDirectory;
//
//  #[SetUp]
//  public function fileExists()
//  {
//    if (!file_exists($this->fileName)) {
//      throw new RuntimeException("File does not exist");
//    }
//  }
//
//  #[SetUp]
//  public function targetDirectoryExists()
//  {
//    if (!file_exists($this->targetDirectory)) {
//      mkdir($this->targetDirectory);
//    } elseif (!is_dir($this->targetDirectory)) {
//      throw new RuntimeException("Target directory $this->targetDirectory is not a directory");
//    }
//  }
//
//  public function execute()
//  {
//    copy($this->fileName, $this->targetDirectory . '/' . basename($this->fileName));
//  }
//}
//
//function executeAction(ActionHandler $actionHandler)
//{
//  $reflection = new ReflectionClass($actionHandler);
//
//  foreach ($reflection->getMethods() as $method) {
//    $attributes = $method->getAttributes(SetUp::class);
//    if (count($attributes) > 0) {
//      $methodName = $method->getName();
//      $actionHandler->$methodName();
//    }
//  }
//  $actionHandler->execute();
//}
//
//$copyAction = new CopyFile();
//$copyAction->fileName = "/tmp/foo.jpg";
//$copyAction->targetDirectory = "/home/user";
//
//executeAction($copyAction);


/*===Чтение атрибутов с помощью Reflection API===*/

//Чтение атрибутов средствами Reflection API
#[Attribute]
class MyAttribute
{
  public $value;
  public function __construct($value)
  {
    $this->value = $value;
  }
}

#[MyAttribute(value: 1234)]
class Thing{}

function dumpAttributeData($reflection)
{
  $attributes = $reflection->getAttributes();

  foreach ($attributes as $attribute) {
    var_dump($attribute->getName());
    var_dump($attribute->getArguments());
    var_dump($attribute->newInstance());
  }
}

dumpAttributeData(new ReflectionClass(Thing::class));

//Чтение конкретных атрибутов средствами Reflection API

function dumpAttributeData2($reflection)
{
  $attributes = $reflection->getAttributes(MyAttribute::class);

  foreach ($attributes as $attribute) {
    var_dump($attribute->getName());
    var_dump($attribute->getArguments());
    var_dump($attribute->newInstance());
  }
}

dumpAttributeData2(new ReflectionClass(Thing::class));


/*===Объявление классов атрибутов===*/

echo '<hr>';

//Спецификация указания целей, которым атрибут может быть присвоен

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_FUNCTION)]
class MyAttribute2{}

//Применение константы IS_REPEATABLE при объявлении атрибута для разрешения его многократного присваивания

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_FUNCTION | Attribute::IS_REPEATABLE)]
class MyAttribute3{}