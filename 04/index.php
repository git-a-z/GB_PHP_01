<?php
$title = 'Урок 4. Работа с файлами';
$imgFolder = 'img/';
include_once('functions.php');
ini_set('max_file_uploads', '1');
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
  <script src="js/script.js"></script>
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

  echo '1. Создать галерею фотографий. Она должна 
    состоять всего из одной странички, на которой 
    пользователь видит все картинки в уменьшенном виде и 
    форму для загрузки нового изображения. При клике на 
    фотографию она должна открыться в браузере в новой 
    вкладке. Размер картинок можно ограничивать с помощью 
    свойства width. При загрузке изображения необходимо 
    делать проверку на тип и размер файла.<br>';
  ?>

  <div class='container'>
    <a href="img/Herald.jpg" target="_blank">
      <img src="img/Herald.jpg" class='img'>
    </a>
    <a href="img/HumptyDumpty.jpg" target="_blank">
      <img src="img/HumptyDumpty.jpg" class='img'>
    </a>
    <a href="img/MadTeaParty.jpg" target="_blank">
      <img src="img/MadTeaParty.jpg" class='img'>
    </a>
    <a href="img/WhiteKnight.jpg" target="_blank">
      <img src="img/WhiteKnight.jpg" class='img'>
    </a>
  </div>

  <form method="post" enctype="multipart/form-data" class='container'>
    <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
    <input type="file" name="file">
    <input type="submit" value="Загрузить картинку!">
  </form>

  <?php
  // если была произведена отправка формы
  if (isset($_FILES['file'])) {
    // проверяем, можно ли загружать изображение
    $check = can_upload($_FILES['file']);

    if ($check === true) {
      // загружаем изображение на сервер
      make_upload($_FILES['file']);
      echo "<strong>Файл успешно загружен!</strong>";
    } else {
      // выводим сообщение об ошибке
      echo "<strong>$check</strong>";
    }
  }

  echo '<hr><br>';

  echo '2. *Строить фотогалерею, не указывая статичные 
    ссылки к файлам, а просто передавая в функцию 
    построения адрес папки с изображениями. Функция сама 
    должна считать список файлов и построить фотогалерею 
    со ссылками в ней.<br><br>';

  makeGallery($imgFolder);

  echo '<hr><br>';

  echo '3. *[ для тех, кто изучал JS-1 ] При клике по 
    миниатюре нужно показывать полноразмерное изображение 
    в модальном окне.<br>';

  makeModalGallery($imgFolder);

  ?>
</body>
</html>