<?php
// Funcao que verifica se usuario está logado
if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"]))
{
  // Usuário não logado! Redireciona para a página de login
    header("Location: index.php");
    exit;
}
?>