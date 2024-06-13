<?php

namespace fibers;

use Fiber;

$fiber = new Fiber(function (): void {
  $value = Fiber::suspend('fiber');
  echo 'Значение возобновлённого файбера: ', $value, '<br>';
});

$value = $fiber->start();

echo 'Значение приостановленного файбера: ', $value, '<br>';

$fiber->resume('test');