<?php

namespace predefined_variables;

/*
 * Предопределённые переменные:
 * - Суперглобальные переменные — Встроенные переменные, которые всегда доступны во всех областях.
 * - $GLOBALS — Ссылки на все переменные глобальной области видимости.
 * - $_SERVER — Информация о сервере и среде исполнения.
 * - $_GET — Переменные HTTP GET.
 * - $_POST — Переменные HTTP POST.
 * - $_FILES — Переменные файлов, загруженных по HTTP.
 * - $_REQUEST — Переменные HTTP-запроса.
 * - $_SESSION — Переменные сессии.
 * - $_ENV — Переменные окружения.
 * - $_COOKIE — HTTP Cookies.
 * - $php_errormsg — Предыдущее сообщение об ошибке.
 * - $http_response_header — Заголовки ответов HTTP.
 * - $argc — Количество аргументов, переданных скрипту.
 * - $argv — Массив переданных скрипту аргументов.
 */

/*===Суперглобальные переменные===*/

/*
 * Суперглобальными переменными являются:
 * - $GLOBALS - ссылки на все переменные глобальной области видимости;
 * - $_SERVER - информация о сервере и среде исполнения;
 * - $_GET - переменные HTTP GET;
 * - $_POST - переменные HTTP POST;
 * - $_FILES - переменные файлов, загруженных по HTTP;
 * - $_COOKIE - ассоциативный массив (array) значений, переданных скрипту через HTTP Cookies;
 * - $_SESSION - переменные сессии;
 * - $_REQUEST - ассоциативный массив (array), который по умолчанию содержит данные переменных
 * $_GET, $_POST и $_COOKIE.;
 * - $_ENV - переменные окружения;
 */

function test()
{
  $foo = 'локальная переменная';

  echo '$foo в глобальной области видимости: ' . $GLOBALS['foo'] . '<br>';
  echo '$foo в текущей области видимости: ' . $foo . '<br>';
}

$foo = 'Пример содержимого';
test();

echo '<br>';


$myServer = [
  '$_SERVER["PHP_SELF"]' => $_SERVER['PHP_SELF'],
//  '$_SERVER["argv"]' => $_SERVER['argv'],
//  '$_SERVER["argc"]' => $_SERVER['argc'],
  '$_SERVER["GATEWAY_INTERFACE"]' => $_SERVER['GATEWAY_INTERFACE'],
  '$_SERVER["SERVER_ADDR"]' => $_SERVER['SERVER_ADDR'],
  '$_SERVER["SERVER_NAME"]' => $_SERVER['SERVER_NAME'],
  '$_SERVER["SERVER_SOFTWARE"]' => $_SERVER['SERVER_SOFTWARE'],
  '$_SERVER["SERVER_PROTOCOL"]' => $_SERVER['SERVER_PROTOCOL'],
  '$_SERVER["REQUEST_METHOD"]' => $_SERVER['REQUEST_METHOD'],
  '$_SERVER["REQUEST_TIME"]' => $_SERVER['REQUEST_TIME'],
  '$_SERVER["REQUEST_TIME_FLOAT"]' => $_SERVER['REQUEST_TIME_FLOAT'],
  '$_SERVER["QUERY_STRING"]' => $_SERVER['QUERY_STRING'],
  '$_SERVER["DOCUMENT_ROOT"]' => $_SERVER['DOCUMENT_ROOT'],
//  '$_SERVER["HTTPS"]' => $_SERVER['HTTPS'],
  '$_SERVER["REMOTE_ADDR"]' => $_SERVER['REMOTE_ADDR'],
//  '$_SERVER["REMOTE_HOST"]' => $_SERVER['REMOTE_HOST'],
  '$_SERVER["REMOTE_PORT"]' => $_SERVER['REMOTE_PORT'],
//  '$_SERVER["REMOTE_USER"]' => $_SERVER['REMOTE_USER'],
//  '$_SERVER["REDIRECT_REMOTE_USER"]' => $_SERVER['REDIRECT_REMOTE_USER'],
  '$_SERVER["SCRIPT_FILENAME"]' => $_SERVER['SCRIPT_FILENAME'],
  '$_SERVER["SERVER_ADMIN"]' => $_SERVER['SERVER_ADMIN'],
  '$_SERVER["SERVER_PORT"]' => $_SERVER['SERVER_PORT'],
  '$_SERVER["SERVER_SIGNATURE"]' => $_SERVER['SERVER_SIGNATURE'],
//  '$_SERVER["PATH_TRANSLATED"]' => $_SERVER['PATH_TRANSLATED'],
  '$_SERVER["SCRIPT_NAME"]' => $_SERVER['SCRIPT_NAME'],
  '$_SERVER["REQUEST_URI"]' => $_SERVER['REQUEST_URI'],
//  '$_SERVER["PHP_AUTH_DIGEST"]' => $_SERVER['PHP_AUTH_DIGEST'],
//  '$_SERVER["PHP_AUTH_USER"]' => $_SERVER['PHP_AUTH_USER'],
//  '$_SERVER["PHP_AUTH_PW"]' => $_SERVER['PHP_AUTH_PW'],
//  '$_SERVER["AUTH_TYPE"]' => $_SERVER['AUTH_TYPE'],
//  '$_SERVER["PATH_INFO"]' => $_SERVER['PATH_INFO'],
//  '$_SERVER["ORIG_PATH_INFO"]' => $_SERVER['ORIG_PATH_INFO'],
];
var_dump($myServer);

echo '<br>';
// echo 'Привет, ' . htmlspecialchars($_GET["name"]) . '!';
// echo 'Привет ' . htmlspecialchars($_POST["name"]) . '!';

echo '<br>';

function get_contents(){
  file_get_contents('http://php.manual');
//  file_get_contents("https://readmanga.live/");
  var_dump($http_response_header);
}
get_contents();
//var_dump($http_response_header);

echo '<br>';
var_dump($argc);
var_dump($argv);


/*===$php_errormsg===*/

/*
 * Эта функциональность объявлена УСТАРЕВШЕЙ начиная с PHP 7.2.0 и её крайне не рекомендуется
 * использовать.
 * Используйте функцию error_get_last().
 */

echo '<hr>';
@strpos();
echo $php_errormsg;

