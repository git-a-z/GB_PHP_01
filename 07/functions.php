<?php
  function updateCart() {    
    addToCart();    
    delFromCart();
  }

  function addToCart() {
    $id = $_POST['addToCartId'];

    if (isset($id)) {
      if (is_array($_SESSION['cart'])) {
        if (isset($_SESSION['cart'][$id])) {
          $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] + 1);
        } else {
          $_SESSION['cart'][$id] = 1;
        }
      } else {
        $_SESSION['cart'] = [$id => 1];
      }
    }
  }

  function delFromCart() {
    $id = $_POST['delFromCartId'];

    if (isset($id)) {
      if (is_array($_SESSION['cart'])) {
        if (isset($_SESSION['cart'][$id])) {
          if ($_SESSION['cart'][$id] > 1) {
            $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] - 1);
          } else {
            unset($_SESSION['cart'][$id]);
          }
        }
      }
    }
  }

  function showProducts($result, $action) {
    if ($result) {    
      echo '<div class="container">'; 
      while ($row = mysqli_fetch_assoc($result)) {
        $inCart = $_SESSION['cart'][$row['id']] ?? 0;
        echo '<div class="product">'; 
          echo '<a href="preview.php?id=' . $row['id'] . '" target="_blank">';
            echo '<img src="' . $row['image_path'] . '" class="img">';
          echo '</a>';
          echo '<form method="POST" action="' . $action . '">';
            echo '<input type="hidden" name="addToCartId" value="' . $row['id'] . '">';
            echo '<input type="submit" value="Добавить в корзину" class="submitButton addToCart">';
          echo '</form>';
          echo '<div>В корзине: ' . $inCart . '</div>';
          echo '<form method="POST" action="' . $action . '">';
            echo '<input type="hidden" name="delFromCartId" value="' . $row['id'] . '">';
            echo '<input type="submit" value="Удалить из корзины" class="submitButton delFromCart">';
          echo '</form>';
        echo '</div>';
      }
      echo '</div>';    
    }
  }
?>