<?php

namespace context_options_and_parameters;

/*
 * Контекстные опции доступны для всех обёрток, которые работают через сокеты, например: tcp,
 * http и ftp:
 * - bindto;
 * - backlog;
 * - ipv6_v6only;
 * - so_reuseport;
 * - so_broadcast;
 * - tcp_nodelay.
 */

// Соединение с сетью через IP-адрес 192.168.0.100
$opts = array(
  'socket' => array(
    'bindto' => '192.168.0.100:0',
  ),
);

// Соединение с сетью через IP-адрес 192.168.0.100 и порт 7000
$opts = array(
  'socket' => array(
    'bindto' => '192.168.0.100:7000',
  ),
);

// Соединение с сетью через IPv6-адрес 2001:db8::1
// и порт 7000
$opts = array(
  'socket' => array(
    'bindto' => '[2001:db8::1]:7000',
  ),
);


// Соединение с сетью через порт 7000
$opts = array(
  'socket' => array(
    'bindto' => '0:7000',
  ),
);


// Создаём контекст...
$context = stream_context_create($opts);

// ...и получаем через него данные
echo file_get_contents('http://php.manual', false, $context);

echo '<hr>';
/*
 * Опции контекста для транспортных протоколов http:// и https://.
 * - method string;
 * - header array или string;
 * - user_agent string;
 * - content string;
 * - proxy string;
 * - request_fulluri bool;
 * - follow_location int;
 * - max_redirects int;
 * - protocol_version float;
 * - timeout float;
 * - ignore_errors bool.
 */

//Извлечь страницу и отправить данные методом POST

$postdata = http_build_query(
  array(
    'var1' => 'некоторое содержимое',
    'var2' => 'doh'
  )
);

$opts = array('http' =>
  array(
    'method' => 'POST',
    'header' => 'Content-type: application/x-www-form-urlencoded',
    'content' => $postdata
  ));

$context = stream_context_create($opts);

//$result = file_get_contents('http://example.com/submit.php', false,
//  $context);


//Игнорировать переадресации, но извлечь заголовки и содержимое

$url = 'http://www.example.org/header.php';
$opts2 = array('http' =>
  array(
    'method' => 'GET',
    'max_redirects' => '0',
    'ignore_errors' => '1'
  ));

$context2 = stream_context_create($opts2);
$stream = fopen($url, 'r', false, $context2);

echo '<hr>';

/*
 * Параметры контекста для транспортных протоколов ftp:// и ftps://:
 * - overwrite bool;
 * - resume_pos int;
 * - proxy string.
 */

/*
 * Опции контекста для протоколов ssl:// и tls://:
 * - peer_name string;
 * - verify_peer bool;
 * - verify_peer_name bool;
 * - allow_self_signed bool;
 * - cafile string;
 * - capath string;
 * - local_cert string;
 * - local_pk string;
 * - passphrase string;
 * - verify_depth int;
 * - ciphers string;
 * - capture_peer_cert bool;
 * - capture_peer_cert_chain bool;
 * - SNI_enabled bool;
 * - disable_compression bool;
 * - peer_fingerprint string | array;
 * - security_level int.
 */

/*
 * Контекстные опции для обёртки phar://:
 * - compress int;
 * - metadata mixed.
 */

/*
 * Параметры контекста - эти параметры устанавливают для контекста через параметр context функции
 *  stream_context_set_params():
 * - notification callable.
 */

/*
 * Опции контекста Zip доступны для обёрток zip:
 * - password.
 */

// Читаем зашифрованный архив
$opts = array(
  'zip' => array(
    'password' => 'secret',
  ),
);

// Создаём контекст...
$context = stream_context_create($opts);

// ...и получаем данные
echo file_get_contents('zip://test.zip#test.txt', false, $context);

echo '<hr>';

/*
 * Опции контекста Zlib доступны для обёрток zlib:
 * - level.
 */