<?php

namespace attributes\Another;

use attributes\MyExample\MyAttribute;

#[MyAttribute]
#[\attributes\MyExample\MyAttribute]
#[MyAttribute(1234)]
#[MyAttribute(value:1234)]
#[MyAttribute(value: 1234)]
#[MyAttribute(MyAttribute::VALUE)]
#[MyAttribute(array("key" => "value"))]
#[MyAttribute(100 + 200)]
class Thing{}

#[MyAttribute(1234), MyAttribute(5678)]
class AnotherThing{}
