<?php 
  $title = 'Урок 2. Условные блоки, ветвление функции';
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
    echo '<h1>' . $title . '<br></h1>';

    echo '<hr><br>';

    echo '1. Объявить две целочисленные переменные $a и $b 
    и задать им произвольные начальные значения. Затем 
    написать скрипт, который работает по следующему 
    принципу:<br><br>

    если $a и $b положительные, вывести их разность;<br>
    если $а и $b отрицательные, вывести их произведение;<br>
    если $а и $b разных знаков, вывести их сумму;<br><br>
    
    Ноль можно считать положительным числом.<br><br>';

    $a = -2;
    $b = 3;

    if ($a >= 0 && $b >= 0) 
      echo $a - $b;
    elseif ($a < 0 && $b < 0)
      echo $a * $b;
    else
      echo $a + $b;

    echo '<hr><br>';

    echo '2. Присвоить переменной $а значение в промежутке 
    [0..15]. С помощью оператора switch организовать вывод 
    чисел от $a до 15.<br><br>';

    $a = 12;

    switch($a) {
      case 0:
        echo 0 . '<br>';
      case 1:
        echo 1 . '<br>';
      case 2:
        echo 2 . '<br>';
      case 3:
        echo 3 . '<br>';
      case 4:
        echo 4 . '<br>';
      case 5:
        echo 5 . '<br>';
      case 6:
        echo 6 . '<br>';
      case 7:
        echo 7 . '<br>';
      case 8:
        echo 8 . '<br>';
      case 9:
        echo 9 . '<br>';
      case 10:
        echo 10 . '<br>';
      case 11:
        echo 11 . '<br>';
      case 12:
        echo 12 . '<br>';
      case 13:
        echo 13 . '<br>';
      case 14:
        echo 14 . '<br>';
      case 15:
        echo 15 . '<br>';
        break;
      default:
        echo 'Переменная вне диапазона [0..15] или дробная.';
    }

    echo '<hr><br>';

    echo '3. Реализовать основные 4 арифметические операции 
    в виде функций с двумя параметрами. Обязательно 
    использовать оператор return.<br><br>';

    $a = 2;
    $b = 4;
    echo(sum($a, $b) . '<br>');
    echo(sub($a, $b) . '<br>');
    echo(mul($a, $b) . '<br>');
    echo(div($a, $b) . '<br>');

    // сложение
    function sum ($a, $b) {
      return $a + $b;
    }

    // вычитание
    function sub ($a, $b) {
      return $a - $b;
    }

    // умножение
    function mul ($a, $b) {
      return $a * $b;
    }

    // деление
    function div ($a, $b) {
      if ($b == 0)
        return 'Деление на ноль!';
      else
        return $a / $b;
    }

    echo '<hr><br>';

    echo '4. Реализовать функцию с тремя параметрами: 
    function mathOperation($arg1, $arg2, $operation), 
    где $arg1, $arg2 – значения аргументов, $operation – 
    строка с названием операции. В зависимости от 
    переданного значения операции выполнить одну из 
    арифметических операций (использовать функции из 
    пункта 3) и вернуть полученное значение (использовать 
    switch).<br><br>';

    $a = 2;
    $b = 4;
    echo(mathOperation($a, $b, 'sum') . '<br>');
    echo(mathOperation($a, $b, 'sub') . '<br>');
    echo(mathOperation($a, $b, 'mul') . '<br>');
    echo(mathOperation($a, $b, 'div') . '<br>');
    echo(mathOperation($a, $b, 'pow') . '<br>');

    function mathOperation($arg1, $arg2, $operation) {
      switch($operation) {
        case 'sum':
          return sum($arg1, $arg2);
          break;
        case 'sub':
          return sub($arg1, $arg2);
          break;
        case 'mul':
          return mul($arg1, $arg2);
          break;
        case 'div':
          return div($arg1, $arg2);
          break;
        default:
          return "Операция $operation не поддерживается!";
      }
    }

    echo '<hr><br>';

    echo '5. Посмотреть на встроенные функции PHP. 
    Используя имеющийся HTML-шаблон, вывести текущий год 
    в подвале при помощи встроенных функций PHP.<br><br>';

    $year = date("Y");
    
    echo "Текущий год: $year";

    echo '<hr><br>';

    echo '6. *С помощью рекурсии организовать функцию 
    возведения числа в степень. Формат: function 
    power($val, $pow), где $val – заданное число, 
    $pow – степень.<br><br>';

    $x = 2;
    $n = 5;
    echo (power($x, $n));

    function power($val, $pow) {
      if ($pow == 0) {
        return 1;
      }
      if ($pow < 0) {
        return power(1 / $val, -$pow);
      }
      return $val * power($val, $pow - 1);
    }

    echo '<hr><br>';

    echo '7. *Написать функцию, которая вычисляет текущее 
    время и возвращает его в формате с правильными 
    склонениями, например<br><br>

    22 часа 15 минут<br>
    21 час 43 минуты<br><br>';

    timeInWords();

    function timeInWords() {
      $time = time();
      $h = (int) date('H', $time);
      $i = (int) date('i', $time);
  
      $hours = timeByWord($h);
      $minutes = timeByWord($i, false);

      echo "Сейчас $h $hours";
      echo " $i $minutes";

      echo '<hr>';

      for ($i = 0; $i <= 23; $i++) {
        echo $i . ' ' . timeByWord($i) . '<br>';
      }

      for ($i = 0; $i <= 59; $i++) {
        echo $i . ' ' . timeByWord($i, false) . '<br>';
      }
    } 

    function timeByWord($x, $hour=true) {
      $r = $x % 10;
      // echo " (r=$r) ";

      if ($r >= 2 && $r <= 4 && !($x >= 12 && $x <= 14))
        return $hour ? 'часа' : 'минуты';
      elseif ($r == 1 && $x != 11)
        return $hour ? 'час' : 'минута';
      else 
        return $hour ? 'часов' : 'минут';
    }

    echo '<hr><br>';

  ?>
</body>
  <?php 
    echo "<div style='text-align:center;'>$year</div>";
  ?>
</html>