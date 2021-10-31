<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>original size</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include_once('db.php');

$id = $_GET['id'] ?? null;

if ($id && is_numeric($id)) {
  mysqli_query($link, 'UPDATE image_gallery SET clicks = clicks + 1 WHERE id = ' . $id);
  $result = mysqli_query($link, 'SELECT * FROM image_gallery WHERE id = ' . $id);
  $image = mysqli_fetch_assoc($result);

  if ($image) {
    echo '<div class="container">'; 
    echo '<div class="image_container">';    
    echo '<img src="' . $image['image_path'] . '">';
    echo '<span>Просмотров: ' . $image['clicks'] . '</span>';    
    echo '</div>';
    echo '</div>';
  } else {
    die("Can't find image with id = " . $id);
  }  
}

mysqli_close($link);
?>
</body>
</html>