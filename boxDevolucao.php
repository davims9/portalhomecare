<?php

/**
************************************************************************************************************************
Sistema: PORTAL HOMECARE
Desenvolvimento:  João Daniel Queiroz Lima
Última Alteração: 21/09/2011
Página: boxDevolucao.php
Resumo: Tela de lançamento da quantidade de item devolvido
************************************************************************************************************************
**/

include_once("conexao.php");	
extract($_REQUEST);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
body { font: normal 62.5% verdana; }
 
.textfield {
	font-family: Arial, Helvetica, sans-serif;
	font-size: x-small;
	font-style: normal;
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-top-style: groove;
	border-right-style: groove;
	border-bottom-style: groove;
	border-left-style: groove;
}
.botton1 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #CCC;
	text-decoration: none;
	font-weight: bold;
	background-color: #F00;
	border: thin outset #666;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Devolucao</title>
</head>

<body>
<?php
	echo '<script>';
	echo 'function retornar(saldo) ';
	echo '{';
    echo 'if (saldo >= document.form1.edQuantidade.value)';
	echo '{';
	echo "	   window.top.frmCadastro.acao.value = 'InclueItem1';";
	echo "     window.top.frmCadastro.InsCodigo.value = '".$Codigo."';";
	echo "     window.top.frmCadastro.InsDescricao.value = '".$Descricao."';";
	echo '     window.top.frmCadastro.InsQuantidade.value = document.form1.edQuantidade.value;';
	echo '	   window.top.frmCadastro.submit();';
	echo '	   window.top.hidePopWin(); ';
	echo '}';
	echo 'else';
	echo '{';
    echo 'alert("Quantidade devolvida maior que o saldo disponível para devolução pelo paciente!");';
	echo '}';
	echo '}';
	echo '</script>';
	
	$rsMat = mssql_query("SELECT ISM_MAT_COD, sum(ISM_QTDE_BAIXA) - isnull((SELECT  sum(ISM_QTDE_SOLICITADA) FROM sma 
								left join ISM on ISM_SMA_SERIE = sma_serie and ISM_SMA_NUM = SMA_NUM
								where sma_pac_reg = '$Paciente' and sma_hsp_num = '$Internacao' and ISM_MAT_COD = '$Codigo' --and SMA_SERIE = '111'
								and sma_tipo = 'D1'
								group by ISM_MAT_COD),0) as Saldo
							FROM sma 
							left join ISM on ISM_SMA_SERIE = sma_serie and ISM_SMA_NUM = SMA_NUM
							where sma_pac_reg = '$Paciente' and sma_hsp_num = '$Internacao' and ISM_MAT_COD = '$Codigo' --and SMA_SERIE = '111'
							and sma_tipo = 'S1'
							group by ISM_MAT_COD",$con);
								
   $Busca = mssql_fetch_row($rsMat);	
   
   $Saldo = $Busca[1];
	
?>
<form id="form1" name="form1" method="post" action="">
<table width="381" border="0">
  <tr>
    <td width="112"><strong>Codigo:</strong></td>
    <td colspan="2"><?php echo $Codigo; ?></td>
  </tr>
  <tr>
    <td><strong>Descrição:</strong></td>
    <td colspan="2"><?php echo $Descricao; ?></td>
  </tr>
  <tr>
    <td><strong>Qtd. Devolver:</strong></td>
    <td colspan="2">
      <input name="edQuantidade" type="text" class="textfield" id="edQuantidade" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="135">&nbsp;</td>
    <td width="120"><input name="idInserir" type="button" class="botton1" id="idInserir" value="Inserir" onclick="return retornar(<?php echo $Saldo ?>)"/></td>
  </tr>
</table>
</form>
</body>
</html>