<?php
namespace classes_and_objects\references;

print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

class A
{
  public $foo = 1;
}

$a = new A;
$b = $a;     // $a и $b - копии одного идентификатора
// ($a) = ($b) = <id>
$b->foo = 2;
echo $a->foo . '<br>';


$c = new A;
$d = &$c;    // $c и $d - ссылки
// ($c,$d) = <id>

$d->foo = 2;
echo $c->foo . '<br>';


$e = new A;

function foo($obj)
{
  // ($obj) = ($e) = <id>
  $obj->foo = 2;
}

foo($e);
echo $e->foo . '<br>';