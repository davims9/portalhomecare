<?php

$mensagem = substr('1a ',0,2);

if (is_numeric($mensagem))
  echo $mensagem . 'numerico';
else
  echo $mensagem  . 'nao numerico';
?>