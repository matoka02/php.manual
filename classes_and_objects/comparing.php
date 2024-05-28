<?php
namespace classes_and_objects\comparing;

print('<a href="http://php.manual/classes_and_objects/index.php">Back</a>');
echo '<br><br>';

/*
 * При использовании оператора сравнения (==), свойства объектов просто сравниваются друг с другом,
 * а именно: два объекта равны, если они имеют одинаковые атрибуты и значения
 * (значения сравниваются через ==) и являются экземплярами одного и того же класса.
 * С другой стороны, при использовании оператора идентичности (===), переменные, содержащие объекты,
 * считаются идентичными только тогда, когда они ссылаются на один и тот же экземпляр одного и того же класса.
 */

function bool2str($bool)
{
  return (string) $bool;
}

function compareObjects(&$o1, &$o2)
{
  echo 'o1 == o2 : ' . bool2str($o1 == $o2) . '<br>';
  echo 'o1 != o2 : ' . bool2str($o1 != $o2) . '<br>';
  echo 'o1 === o2 : ' . bool2str($o1 === $o2) . '<br>';
  echo 'o1 !== o2 : ' . bool2str($o1 !== $o2) . '<br>';
}

class Flag
{
  public $flag;

  function __construct($flag = true)
  {
    $this->flag = $flag;
  }
}

class OtherFlag
{
  public $flag;

  function __construct($flag = true)
  {
    $this->flag = $flag;
  }
}

$o = new Flag();
$p = new Flag();
$q = $o;
$r = new OtherFlag();

echo "Два экземпляра одного и того же класса" . '<br>';
compareObjects($o, $p);
echo "Две ссылки на один и тот же экземпляр" . '<br>';
compareObjects($o, $q);
echo "Экземпляры двух разных классов" . '<br>';
compareObjects($o, $r);