<?php
// Funcao que verifica se usuario est� logado
if(!isset($_SESSION["login"]) || !isset($_SESSION["nome_usuario"]))
{
  // Usu�rio n�o logado! Redireciona para a p�gina de login
    header("Location: index.php");
    exit;
}
?>