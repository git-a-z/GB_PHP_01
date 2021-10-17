<?php 
  $title = 'Урок 1. Введение в PHP';
  $year = date("Y"); 
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
</head>
<body>
  <?php  
    echo '<h1>' . $title . '<br>Текущий год: ' . $year . '</h1>';

    echo '<hr><br>';
    echo "Hello, World!";

    echo '<br><br>';
    $name = "GeekBrains user";
    echo "Hello, $name!";

    echo '<br><br>';
    define('MY_CONST', 100);
    echo MY_CONST;

    echo '<br><br>';
    $int10 = 42;
    $int2 = 0b101010;
    $int8 = 052;
    $int16 = 0x2A;
    echo "Десятеричная система $int10 <br>";
    echo "Двоичная система $int2 <br>";
    echo "Восьмеричная система $int8 <br>";
    echo "Шестнадцатеричная система $int16 <br>";

    echo '<br>';
    $precise1 = 1.5;
    $precise2 = 1.5e4;
    $precise3 = 6E-8;
    echo "$precise1 | $precise2 | $precise3";

    echo '<br><br>';
    $a = 1;
    echo "$a";
    echo '$a';

    echo '<br><br>';
    $a = 10;
    $b = (boolean) $a;
    echo "b = $b";

    echo '<br><br>';
    $a = 'Hello, ';
    $b = 'world';
    $c = $a . $b;
    echo $c;

    echo '<br><br>';
    $a = 4;
    $b = 5;
    echo $a + $b . '<br>'; // сложение
    echo $a * $b . '<br>'; // умножение
    echo $a - $b . '<br>'; // вычитание
    echo $a / $b . '<br>'; // деление
    echo $a % $b . '<br>'; // остаток от деления
    echo $a ** $b . '<br>'; // возведение в степень

    echo '<br><br>';
    $a = 4;
    $b = 5;
    $a += $b;
    echo 'a = ' . $a;
    $a = 0;
    echo $a++; // Постинкремент
    echo ++$a; // Преинкремент
    echo $a--; // Постдекремент
    echo --$a; // Предекремент

    echo '<br><br>';
    $a = 4;
    $b = 5;
    var_dump($a == $b); // Сравнение по значению
    var_dump($a === $b); // Сравнение по значению и типу
    var_dump($a > $b); // Больше
    var_dump($a < $b); // Меньше
    var_dump($a <> $b); // Не равно
    var_dump($a != $b); // Не равно
    var_dump($a !== $b); // Не равно без приведения типов
    var_dump($a <= $b); // Меньше или равно
    var_dump($a >= $b); // Больше или равно

    echo '<br><br><hr><br>';
    echo '3. Объяснить, как работает данный код:<br><br>';
    $a = 5;
    $b = '05';
    echo '$a = 5; $b = "05"; $a == $b; Результат: ';
    var_dump($a == $b); // Почему true?
    echo '<br>$b приводится к числу 5 и поэтому результат true';
    echo '<br><br>';
    echo "(int)'012345' Результат: ";
    var_dump((int)'012345'); // Почему 12345?
    echo '<br>приведение типов к целому числу 12345';
    echo '<br><br>';
    echo '(float)123.0 === (int)123.0 Результат: ';
    var_dump((float)123.0 === (int)123.0); // Почему false?
    echo '<br>false потому что строгое сравнение разных типов.';
    echo '<br><br>';
    echo "(int)0 === (int)'hello, world' Результат: ";
    var_dump((int)0 === (int)'hello, world'); // Почему true?
    echo '<br>true потому что в строке не найдено цифр и приведение к числу (по-умолчанию 0)';
  
    echo '<br><br><hr><br>';
    echo '5. *Используя только две переменные, поменяйте их 
    значение местами. Например, если a = 1, b = 2, надо, 
    чтобы получилось b = 1, a = 2. Дополнительные переменные 
    использовать нельзя.<br><br>';
    $a = 1;
    $b = 2;
    echo '$a = 1; $b = 2; ' . "(a = $a, b = $b)<br><br>";
    $a = $a + $b; // 1 + 2 = 3
    echo '$a = $a + $b; // 1 + 2 = 3 ' . "(a = $a, b = $b)<br><br>";
    $b = $a - $b; // 3 - 2 = 1
    echo '$b = $a - $b;  // 3 - 2 = 1 ' . "(a = $a, b = $b)<br><br>";
    $a = $a - $b; // 3 - 1 = 2
    echo '$a = $a - $b;  // 3 - 1 = 2 ' . "(a = $a, b = $b)<br><br>";
  ?>
</body>
</html>