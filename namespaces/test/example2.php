<?php

namespace namespaces\test;

class classname
{
  function __construct()
  {
    echo __METHOD__, '<br>';
  }
}

function funcname()
{
  echo __FUNCTION__, '<br>';
}

const constname = 'namespaced';

include 'example1.php';

$a = 'classname';
$obj = new $a;
$b = 'funcname';
$b();
echo constant('constname'), '<br>';

/* Обратите внимание, что в двойных кавычках символ обратного слеша нужно заэкранировать. Например, "\\namespacename\\classname" */

$a = 'namespaces\test\classname';
$obj = new $a;
$a = 'namespaces\test\classname';
$obj = new $a;
$b = 'namespaces\test\funcname';
$b();
$b = 'namespaces\test\funcname';
$b();
echo constant('\namespaces\test\constname'), '<br>';
echo constant('namespaces\test\constname'), '<br>';