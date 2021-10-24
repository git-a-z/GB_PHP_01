<?php
$title = 'Урок 5. Базы данных MySQL и работа с ними на уровне PHP';
include_once('db.php');
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

  echo '1. Создать галерею изображений, состоящую из двух 
  страниц:<br>
  просмотр всех фотографий (уменьшенных копий);<br>
  просмотр конкретной фотографии (изображение оригинального 
  размера) по ее ID в базе данных.<br>
  2. В базе данных создать таблицу, в которой будет 
  храниться информация о картинках (адрес на сервере, 
  размер, имя).<br>
  3. *На странице просмотра фотографии полного размера под 
  картинкой должно быть указано число ее просмотров.<br>
  4. *На странице просмотра галереи список фотографий должен 
  быть отсортирован по популярности. Популярность = число 
  кликов по фотографии.<br><br>';
   
  $result = mysqli_query($link, 'SELECT * FROM image_gallery ORDER BY clicks DESC;');

  if ($result) {
    echo '<div class="container">'; 
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<a href="preview.php?id=' . $row['id'] . '" target="_blank">';
      echo '<img src="' . $row['image_path'] . '" class="img">';
      echo '</a>';
    }
    echo '</div>';
  }

  mysqli_close($link);
  ?>  
</body>
</html>