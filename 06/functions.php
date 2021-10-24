<?php

function mathOperation($a, $b, $operation) {
  switch($operation) {
    case 'sum':
      return $a + $b;
    case 'sub':
      return $a - $b;
    case 'mul':
      return $a * $b;
    case 'div':
      if ($b == 0)
        return 'Деление на ноль!';
      else
        return $a / $b;
    default:
      return "Операция $operation не поддерживается!";
  }
}

function operationFromSign($operation, $operationSign) {
  switch($operationSign) {
    case '+':
      return 'sum';
    case '-':
      return 'sub';
    case '*':
      return 'mul';
    case '/':
      return 'div';
    default:
      return $operation;
  }
}

?>