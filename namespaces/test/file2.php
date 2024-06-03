<?php

namespace namespaces;
include 'file1.php';

const FOO = 2;
function foo(){}
class foo
{
  static function staticmethod(){}
}

/* Неполные имена */
foo(); // Разрешается в функцию namespaces\foo
foo::staticmethod(); // Разрешается в метод staticmethod класса namespaces\foo
echo FOO; // Разрешается в константу namespaces\FOO

echo '<br>';
/* Полные имена */
test\foo(); // Разрешается в функцию namespaces\test\foo
test\foo::staticmethod(); // Разрешается в метод staticmethod класса namespaces\test\foo
echo test\FOO; // Разрешается в константу namespaces\test\FOO

echo '<br>';
/* Абсолютные имена */
\namespaces\foo(); // Разрешается в функцию namespaces\foo
\namespaces\foo::staticmethod(); // Разрешается в метод staticmethod класса namespaces\foo
echo \namespaces\FOO; // Разрешается в константу namespaces\FOO
