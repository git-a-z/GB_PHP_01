<?php
  function can_upload($file) {
    // если имя пустое, значит файл не выбран
    if($file['name'] == '')
      return 'Вы не выбрали файл.';
    
    /* если размер файла 0, значит его не пропустили настройки 
    сервера из-за того, что он слишком большой */
    if($file['size'] == 0)
      return 'Файл слишком большой.';
    
    // разбиваем имя файла по точке и получаем массив
    $getMime = explode('.', $file['name']);
    // нас интересует последний элемент массива - расширение
    $mime = strtolower(end($getMime));
    // объявим массив допустимых расширений
    $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
    
    // если расширение не входит в список допустимых - return
    if(!in_array($mime, $types))
      return 'Недопустимый тип файла.';
    
    return true;
  }
  
  function make_upload($file) {	
    // формируем уникальное имя картинки: случайное число и name
    $name = mt_rand(0, 10000) . preg_replace('/[^ a-zа-я\d.]/ui', '', $file['name']);
    copy($file['tmp_name'], 'img/' . $name);
  }

  function makeGallery($folder) {
    $images = scandir($folder);
    ?><div class='container'><?php
    foreach($images as $image) {
      if (is_file($folder . $image)) {
        ?><a href='<?php echo $folder . $image; ?>' target='_blank'>
          <img src='<?php echo $folder . $image; ?>' class='img'>
        </a><?php
      }
    }
    ?></div><?php 
  }

  function makeModalGallery($folder) {
    $images = scandir($folder);
    ?><div class='container'><?php
    foreach($images as $image) {
      if (is_file($folder . $image)) {
        ?>
        <div>
          <img src="<?php echo $folder . $image; ?>" class="img" onclick="modalOpen(this)">
          <div class="modal">
            <div class="modal_content">   
              <span onclick="modalClose(this)" class="close_modal">×</span>       
              <p class="modal_preview">
                <img src="<?php echo $folder . $image; ?>">
              </p>          
            </div>
          </div>
        </div>
        <?php
      }
    }
    ?></div><?php 
  }