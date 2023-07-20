<?php
  session_start();
  include_once("../conexao.php");
    extract($_REQUEST);  

  $Periodo = $DataInicial.' a '.$DataFinal;


  $result = mssql_query("select emp_nome_fantasia from emp where emp_cod = '$Empresa'",$con);
  $Localiza = mssql_fetch_row($result);
  
  $Nome_Empresa = $Localiza[0];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Relat&oacute;rio</title>
<style type="text/css">
.TituloRel {
	font-family: "Courier New", Courier, monospace;
	font-size: 13px;
	font-weight: bold;
}
.DetalheRel {
	font-family: "Courier New", Courier, monospace;
	font-size: 13px;
	font-weight: normal;
}
</style>
</head>

<body>
<div id="divImprimir">
  <table width="994" border="0">
    <tr>
      <td width="988"  bgcolor="#339999"><div align="center"><a href="javascript:imprimir()"><img src="../imagens/IMPRIMIR.gif" width="81" height="27" border="0" /></a></div></td>
    </tr>
  </table>
</div>
<table width="995" border="0">
  <tr>
    <td width="8" height="64">&nbsp;</td>
    <td width="147"><img src="../imagens/vitalcare.jpg" width="137" height="45" /></td>
    <td width="653"><h3 align="center">Relat&oacute;rio de Fisioterapia</h3></td>
    <td width="169"><table width="169" height="44" border="0">
      <tr>
        <td width="163" height="19"><div align="right" class="DetalheRel">
          Emiss&atilde;o: <?php echo date("d/m/Y"); ?>
        </div></td>
      </tr>
      <tr>
        <td height="19"><div align="right" class="DetalheRel">
          Hora: <?php echo date("H:i"); ?>
        </div></td>
      </tr>
    </table>
  </tr>
</table>
<table width="994" border="0">
  <tr>
    <td width="492"><span class="TituloRel">Fatura - Período Emiss&atilde;o: <span class="DetalheRel"><?php echo $Periodo; ?></span></span></td>
    <td width="492"><span class="TituloRel">Empresa: <span class="DetalheRel"><?php echo $Nome_Empresa; ?></span></span></td>
  </tr>
</table>
<table width="996" border="0">
  <tr>
    <td width="990" class="TituloRel">&nbsp;</td>
  </tr>
</table>
<table width="998" border="0">
  <tr>
    <td width="95" bgcolor="#999999" class="TituloRel">Dt. Emiss.</td>
    <td width="111" bgcolor="#999999" class="TituloRel">Conv&ecirc;nio</td>
    <td width="79" bgcolor="#999999" class="TituloRel">C&oacute;d. Item</td>
    <td width="332" bgcolor="#999999" class="TituloRel">Descri&ccedil;&atilde;o</td>
    <td width="45" bgcolor="#999999" class="TituloRel">Qtde</td>
    <td width="76" bgcolor="#999999" class="TituloRel">Valor</td>
    <td width="112" bgcolor="#999999" class="TituloRel">In&iacute;cio</td>
    <td width="114" bgcolor="#999999" class="TituloRel">Final</td>
  </tr>
</table>
	<?php
      if (trim($Paciente) == '')
	  {
	     $result = mssql_query("PR_Rel_Fisioterapia '$DataInicial','$DataFinal',$Empresa,0",$con);
	  }
	  else
	  {
	     $result = mssql_query("PR_Rel_Fisioterapia '$DataInicial','$DataFinal',$Empresa,$Paciente",$con);
	  }
	  
	  $registros = 0;
	  $VlTotalGeral = 0;
	  $QtdTotalGeral = 0;

	  while ($Localiza = mssql_fetch_row($result))
	  {
		  if ($PacienteAtual != $Localiza[1])
		    {
			  if ($VlTotalGeral != 0)
			    {
				  echo '	<table width="997" border="0">';
				  echo '	  <tr>';
				  echo '		<td width="625"  bgcolor="#999999" class="TituloRel">Total: <span class="DetalheRel">'.$regparcial.'</span></td>';
				  echo '        <td width="47"  bgcolor="#999999" class="TituloRel">'.$QtdTotal.'</td>';
				  echo '		<td width="311"  bgcolor="#999999" class="TituloRel">'.number_format($VlTotal,2,',','.').'</td>';
				  echo '	  </tr>';
				  echo '	</table>';
				}
			  echo '<table width="998" border="0">';
			  echo '  <tr>';
			  echo '    <td><span class="TituloRel">Nome do Paciente: <span class="DetalheRel">'.$Localiza[2].'</span></span></td>';
			  echo '  </tr>';
			  echo '</table>';
	  		  $PacienteAtual = $Localiza[1];
			  $regparcial = 0;
		  	  $VlTotal = 0;
			  $QtdTotal = 0;
			}

		  echo '<table width="998" border="0">';
		  echo '<tr>';
		  echo '	<td width="95" class="DetalheRel">'.$Localiza[0].'</td>';
		  echo '	<td width="111" class="DetalheRel">'.$Localiza[8].'</td>';
		  echo '	<td width="79" class="DetalheRel">'.$Localiza[3].'</td>';
		  echo ' 	<td width="332" class="DetalheRel">'.$Localiza[7].'</td>';
		  echo '	<td width="45" class="DetalheRel">'.$Localiza[4].'</td>';
		  echo '	<td width="76" class="DetalheRel">'.number_format($Localiza[5],2,',','.').'</td>';
		  echo '	<td width="112" class="DetalheRel">'.$Localiza[9].'</td>';
		  echo '	<td width="114" class="DetalheRel">'.$Localiza[10].'</td>';
		  echo '</tr>';
		  echo '</table>';
		  $registros++;
		  $regparcial++;
		  $VlTotal = $VlTotal + $Localiza[5];
		  $VlTotalGeral = $VlTotalGeral + $Localiza[5];
		  $QtdTotal = $QtdTotal + $Localiza[4];
		  $QtdTotalGeral = $QtdTotalGeral + $Localiza[4];
	  }
    ?>
<table width="997" border="0">
  <tr>
    <td width="625"  bgcolor="#999999" class="TituloRel">Total: <span class="DetalheRel"><?php echo $regparcial; ?></span></td>
    <td width="47"  bgcolor="#999999" class="TituloRel"><?php echo $QtdTotal; ?></td>
    <td width="311"  bgcolor="#999999" class="TituloRel"><?php echo number_format($VlTotal,2,',','.'); ?></td>
  </tr>
</table>

<table width="997" border="0">
  <tr>
    <td width="625"  bgcolor="#999999" class="TituloRel">Total: <span class="DetalheRel"><?php echo $registros; ?></span></td>
    <td width="47"  bgcolor="#999999" class="TituloRel"><?php echo $QtdTotalGeral; ?></td>
    <td width="311"  bgcolor="#999999" class="TituloRel"><?php echo number_format($VlTotalGeral,2,',','.'); ?></td>
  </tr>
</table>
</body>
</html>
<script>
function imprimir()
{
   document.getElementById('divImprimir').style.display = "none";
   window.print();
  
}
</script>