<?php

/**
************************************************************************************************************************
Sistema: PORTAL HOMECARE
Desenvolvimento:  Jo�o Daniel Queiroz Lima
�ltima Altera��o: 21/09/2011
P�gina: boxDataHora.php
Resumo: Tela de lan�amento da hora para a agenda de profissionais
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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Devolucao</title>
</head>

<body>
<?php
	echo '<script>';
	echo 'function retornar(Hora) ';
	echo '{';
//    echo 'if (saldo >= document.form1.edQuantidade.value)';
//	echo '{';
	echo "	   window.top.frmCadastro.acao.value = 'InclueItem1';";
	echo '     window.top.frmCadastro.BuscaHORA.value = document.form1.edHora.value;';
	echo '	   window.top.frmCadastro.submit();';
	echo '	   window.top.hidePopWin(); ';
//	echo '}';
//	echo 'else';
//	echo '{';
//    echo 'alert("Quantidade devolvida maior que o saldo dispon�vel para devolu��o pelo paciente!");';
//	echo '}';
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
<table width="299" border="0">
  <tr>
    <td width="88"><strong>Medico:</strong></td>
    <td colspan="2"><?php echo $Profissional; ?></td>
  </tr>
  <tr>
    <td><strong>Paciente:</strong></td>
    <td colspan="2"><?php echo $Paciente; ?></td>
  </tr>
  <tr>
    <td><strong>Data:</strong></td>
    <td colspan="2"><?php echo $Data; ?></td>
  </tr>
  <tr>
    <td><strong>Hora:</strong></td>
    <td colspan="2">
      <input name="edHora" type="text" class="textfield" id="edHora" onkeyup="AplicaMascara('00:00', this);" size="10" maxlength="5"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="68">&nbsp;</td>
    <td width="129"><input name="idInserir" type="button" class="botton1" id="idInserir" value="Inserir" onclick="return retornar(<?php echo $Saldo ?>)"/></td>
  </tr>
</table>
</form>
</body>
</html>

<script>
function AplicaMascara(Mascara, elemento){
    
    // Seta o elemento
    var elemento = (elemento) ? elemento : document.getElementById(elemento); 
    if(!elemento) return false;
    
    // M�todo que busca um determinado caractere ou string dentro de uma Array
    function in_array( oque, onde ){
            for(var i = 0 ; i <onde.length; i++){
            if(oque == onde[i]){
                return true;
            }
        }
        return false;
    }
    // Informa o array com todos os caracteres que podem ser considerados caracteres de mascara
    var SpecialChars = [':', '-', '.', '(',')', '/', ',', '_'];
    var oValue = elemento.value;
    var novo_valor = '';
    for( i = 0 ; i <oValue.length; i++){
        //Recebe o caractere de mascara atual
        var nowMask = Mascara.charAt(i);
        //Recebe o caractere do campo atual
        var nowLetter = oValue.charAt(i);
        //Aplica a masca
        if(in_array(nowMask, SpecialChars) == true && nowLetter != nowMask){
            novo_valor +=  nowMask + '' + nowLetter;
        } else {
            novo_valor += nowLetter;
        }
        // Remove regras duplicadas
        var DuplicatedMasks = nowMask+''+nowMask;
        while (novo_valor.indexOf(DuplicatedMasks)>= 0) {
         novo_valor = novo_valor.replace(DuplicatedMasks, nowMask);
        }
    }
    // Retorna o valor do elemento com seu novo valor
    elemento.value = novo_valor;
    
} 
</script>