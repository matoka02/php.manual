<?php

namespace classes_and_objects\test\page2;

use classes_and_objects\test\A\A;

// это нужно для того, чтобы функция unserialize работала правильно.
include 'A.php';

$s = file_get_contents('store');
$a = unserialize($s);

// теперь можно использовать метод show_one() объекта $a.
$a->show_one();
