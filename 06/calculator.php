<?php
$title = 'Урок 6. Интерактивность';
include_once('functions.php');
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

  echo '1. Создать форму-калькулятор с операциями: 
  сложение, вычитание, умножение, деление. Не забыть 
  обработать деление на ноль! Выбор операции можно 
  осуществлять с помощью тега select<br>
  2. Создать калькулятор, который будет определять тип 
  выбранной пользователем операции, ориентируясь на нажатую 
  кнопку.<br><br>';
    
  $operand1 = $_POST['operand1'] ?? '';
  $operand2 = $_POST['operand2'] ?? '';
  $operation = $_POST['operation'] ?? '';
  $operationSign = $_POST['operationSign'] ?? '';
  $operation = operationFromSign($operation, $operationSign);

  $result = '';
  if ($operand1 != '' && $operand2 != '' && $operation != '') {
    $result = mathOperation($operand1, $operand2, $operation);
  }  
  ?>
  
  <form method="post" action="calculator.php">
  <p>Калькулятор:</p>
  <input type="number" name="operand1" value="<?php echo $operand1;?>">
  <select name="operation">
    <option <?php echo ($operation == 'sum' ? 'selected' : '');?> value="sum"> + </option>
    <option <?php echo ($operation == 'sub' ? 'selected' : '');?> value="sub"> - </option>
    <option <?php echo ($operation == 'mul' ? 'selected' : '');?> value="mul"> * </option>
    <option <?php echo ($operation == 'div' ? 'selected' : '');?> value="div"> / </option> 
  </select>
  <input type="number" name="operand2" value="<?php echo $operand2;?>">
  <input type="submit" value="Равно">
  <input type="submit" name="operationSign" value="+">
  <input type="submit" name="operationSign" value="-">
  <input type="submit" name="operationSign" value="*">
  <input type="submit" name="operationSign" value="/">
  <span><?php echo $result;?></span>
  </form>  
</body>
</html>