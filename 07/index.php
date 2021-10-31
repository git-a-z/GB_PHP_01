<?php
$expire = 3600; // сессия будет хранится 1 час даже после закрытия браузера
ini_set('session.gc_maxlifetime', $expire);
session_start();
setcookie(session_name(), session_id(), time() + $expire);

include_once('functions.php');
include_once('db.php');

updateCart();
$itemsInCart = is_array($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
$title = 'Урок 7. Сессии. Авторизация и аутентификация';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php
    echo $title;
    ?>
  </title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <script>
    // Чтобы предотвратить повторную отправку формы при обновлении страницы
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <?php
  echo '<h1>' . $title . '<br></h1>';
  echo '<hr><br>';
  echo '1. Создать модуль корзины. В нее можно добавлять товары, а можно удалять.<br><br>';

  echo '<div class="cart">';
  echo '<a href="cart.php" target="_blank">Корзина</a>';
  echo '<div>Позиций в корзине: ' . $itemsInCart . '</div>';
  echo '</div>';
   
  $result = mysqli_query($link, 'SELECT * FROM image_gallery ORDER BY clicks DESC;');
  showProducts($result, 'index.php');

  mysqli_close($link);
  ?>  
</body>
</html>