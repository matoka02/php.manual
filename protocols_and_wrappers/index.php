<?php

namespace protocols_and_wrappers;

/*
 * file:// — Доступ к локальной файловой системе.
 * http:// -- https:// — Доступ к URL-адресам по протоколу HTTP(s).
 * ftp:// -- ftps:// — Доступ к URL-адресам по протоколу FTP(s).
 * php:// — Доступ к различным потокам ввода-вывода:
 * - php://stdin, php://stdout и php://stderr;
 * - php://input;
 * - php://output;
 * - php://fd;
 * - php://memory и php://temp;
 * - php://filter.
 */

//Определение URL-адреса, с которого забрали документ после переадресаций

$url = 'http://www.example.com/redirecting_page.php';

$fp = fopen($url, 'r');

$meta_data = stream_get_meta_data($fp);
foreach ($meta_data['wrapper_data'] as $response) {
  /* Выполнялась ли переадресация? */
  if (strtolower(substr($response, 0, 10)) == 'location: ') {
    /* Сохранить в переменной $url адрес переадресации */
    $url = substr($response, 10);
  }
}

//Пример #1 php://temp/maxmemory
// Устанавливаем предел в 5 МБ
$fiveMBs = 5 * 1024 * 1024;
$fp = fopen("php://temp/maxmemory:$fiveMBs", 'r+');

fputs($fp, "hello\n");

// Читаем то, что записали
rewind($fp);
echo stream_get_contents($fp);

echo '<br>';

//Пример #2 php://filter/resource=<поток для фильтрации>
/* Это просто эквивалентно:
  readfile("http://www.example.com");
  поскольку на самом деле фильтры не указали */

readfile("php://filter/resource=http://www.example.com");
echo '<br>';

//Пример #3 php://filter/read=<список фильтров для применения к цепочке чтения>
/* Этот скрипт выведет содержимое
  www.example.com полностью в верхнем регистре */
readfile("php://filter/read=string.toupper/resource=http://www.example.com");

/* Этот скрипт делает тоже самое, что вверхний, но
  будет также кодировать алгоритмом ROT13 */
readfile("php://filter/read=string.toupper|string.rot13/resource=http://www.example.com");
echo '<br>';

//Пример #4 php://filter/write=<список фильтров для применения к цепочке записи>
/* Этот скрипт будет фильтровать строку "Hello World"
  через фильтр rot13, затем записывать результат
  в файл example.txt в текущем каталоге */
file_put_contents("php://filter/write=string.rot13/resource=example.txt","Hello World");
echo '<br>';

//Пример #5 php://memory и php://temp нельзя переиспользовать
file_put_contents('php://memory', 'PHP');
echo file_get_contents('php://memory'); // ничего не напечатает

echo '<hr>';

