<?php

namespace classes_and_objects\test\page1;

use classes_and_objects\test\A\A;

include 'A.php';

$a = new A;
$s = serialize($a);
// сохраняем $s где-нибудь, откуда page2.php сможет его получить.
file_put_contents('store', $s);
