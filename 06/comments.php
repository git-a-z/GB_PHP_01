<?php
$title = 'Урок 6. Интерактивность';
include_once('db.php');
$userName = $_POST['userName'] ?? '';
$newComment = $_POST['newComment'] ?? '';
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
  <?php
  echo '<h1>' . $title . '<br></h1>';

  echo '<hr><br>';

  echo '3. Добавить функционал отзывов 
  в имеющийся у вас проект.<br><br>';
  ?>
  <script>
    // Чтобы предотвратить повторную отправку формы при обновлении страницы
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

  <form method="POST" action="comments.php">
  <p><b>Напишите Ваш отзыв:</b></p><br>
  <p><span>Ваше имя: </span>
  <input type="text" maxlength="50" name="userName" class="user_name" value="<?php echo $userName ?>"></p><br>
  <p><textarea maxlength="225" name="newComment"></textarea></p>
  <p><input type="submit" value="Отправить" class="submitButton"></p><br>
  </form>

  <p><b>Отзывы:</b></p>

  <?php
  $newComment = mysqli_real_escape_string($link,
    (string)htmlspecialchars(strip_tags($newComment)));

  $userName = mysqli_real_escape_string($link,
    (string)htmlspecialchars(strip_tags($userName)));

  if ($newComment) {
    if ($userName) {
      mysqli_query($link, 'INSERT comments (comment,username) VALUES ("' 
        . $newComment . '","' . $userName . '");');
    } else {
      mysqli_query($link, 'INSERT comments (comment) VALUES ("' 
        . $newComment . '");');
    }
  }

  $result = mysqli_query($link, 'SELECT * FROM comments ORDER BY time_of_creation DESC;');

  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<p class="comment"><span>' . $row['username'] . ': ' 
        . nl2br($row['comment']) 
        . '</span><span class="comment_time"> (создан в ' 
        . $row['time_of_creation'] . ')</span></p>';
    }
  }

  mysqli_close($link);
  ?>
</body>
</html>