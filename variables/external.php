<?php
print('<a href="http://php.manual/variables/index.php">Back</a>');
echo '<br><br>';
?>

<form action="" method="post">
  Name:  <input type="text" name="username" /><br />
  Email: <input type="text" name="email" /><br />
  <input type="submit" name="submit" value="Submit me!" />
</form>

<?php

echo $_POST['username'];
echo '<br>';
echo $_REQUEST['username'];

?>

<?php

echo '<hr>';
if ($_POST) {
  echo '<pre>';
  echo htmlspecialchars(print_r($_POST, true));
  echo '</pre>';
}

?>

<form action="" method="post">
  Имя:  <input type="text" name="personal[name]" /><br />
  Email: <input type="text" name="personal[email]" /><br />
  Пиво: <br />
  <select multiple name="beer[]">
    <option value="warthog">Warthog</option>
    <option value="guinness">Guinness</option>
    <option lang="de" value="stuttgarter">Stuttgarter Schwabenbräu</option>
  </select><br />
  <input type="submit" value="Отправь меня!" />
</form>

<?php

echo '<hr>';
setcookie("MyCookie[foo]", 'Testing 1', time() + 3600);
setcookie("MyCookie[bar]", 'Testing 2', time() + 3600);

if (isset($_COOKIE['count'])) {
  $count = $_COOKIE['count'] + 1;
} else {
  $count = 1;
}

setcookie('count', $count, time() + 3600);
setcookie("Cart[$count]", $item, time() + 3600);