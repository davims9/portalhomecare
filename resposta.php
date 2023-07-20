<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Resposta</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}
</style>

</head>

<body>

<?php
	// Função para definição dos padrões da página
	include_once("../functions/estilo.php"); 
extract($_REQUEST);

?>	

<script type='text/javascript' src='funcoes/funcoes.js'> </script>

<table width="328" height="137" border="2" bordercolor="#333333" bgcolor="#06F">
  <tr>
    <td width="191" height="118" bgcolor="#FFFFFF"><div align="center" class="style1">
      <div id="Layer1" style="position:absolute; width:42px; height:47px; z-index:1; left: 11px; top: 41px;">
	  <?php
	  		if ($tipo == 'INCLUIR') 
			{
				echo '<img src="imagens/salvar.gif">';
			}
			if ($tipo == 'ERROR') 
			{
				echo '<img src="imagens/error.gif">';
			}
			if ($tipo == 'ALTERAR') 
			{
				echo '<img src="imagens/alterar.gif">';
			}
			if ($tipo == 'EXCLUIR') 
			{
				echo '<img src="imagens/excluir.gif">';
			}
	  ?>
	  </div>
      <div id="Layer2" style="position:absolute; width:264px; height:40px; z-index:2; left: 56px; top: 52px;">
        <div align="left" class="letraResposta"><?php echo $descricaoMensagem ?></div>
      </div>
      <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div></td>
  </tr>
</table>
<div id="Layer3" style="position:absolute; width:55px; height:21px; z-index:3; left: 134px; top: 104px;">
  <input name="btnSair" type="button" id="btnSair" class="Botao" onClick="javascript:window.close()" value="   Fechar   ">
</div>
</body>
</html>
