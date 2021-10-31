<?php
session_start();
include_once('functions.php');
include_once('db.php');

updateCart();
$cartIds = is_array($_SESSION['cart']) ? array_keys($_SESSION['cart']) : [];
$title = 'Корзина';
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

  $cartIdsString = implode(',', $cartIds);
  $result = mysqli_query($link, 'SELECT * FROM image_gallery WHERE id IN(' . $cartIdsString . ') ORDER BY clicks DESC;');
  showProducts($result, 'cart.php');

  mysqli_close($link);
  ?>  
</body>
</html>