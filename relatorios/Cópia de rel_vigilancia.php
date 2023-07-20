<?php
  session_start();
  include_once("../conexao.php");
  extract($_REQUEST);  

  
  $Periodo = $Mes.'/'.$Ano;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
  <table width="830" border="0">
    <tr>
      <td width="819"  bgcolor="#339999"><div align="center"><a href="javascript:imprimir()"><img src="../imagens/IMPRIMIR.gif" width="81" height="27" border="0" /></a></div></td>
    </tr>
  </table>
</div>
<table width="830" border="0">
  <tr>
    <td width="5" height="64">&nbsp;</td>
    <td width="142"><img src="../imagens/vitalcare.jpg" width="137" height="45" /></td>
    <td width="424"><h3 align="center">Relatorio para Vigilancia Sanitaria</h3></td>
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
<table width="835" border="0">
  <tr>
    <td width="830" class="TituloRel">&nbsp;</td>
  </tr>
</table>
<table width="830" border="0">
  <tr>
    <td width="70" bgcolor="#999999" class="TituloRel">Area</td>
    <td width="60" bgcolor="#999999" class="TituloRel">Mes</td>
    <td width="45" bgcolor="#999999" class="TituloRel">Ano</td>
    <td width="510" bgcolor="#999999" class="TituloRel">Modalidade</td>
	<td width="70" bgcolor="#999999" class="TituloRel">Quantidade</td>
  </tr>
</table>
	<?php
			
	  $result = mssql_query("Pr_Rel_ResumoParaVigilancia '$Mes', '$Ano'",$con);
	  $registros = 0;
        $resultarea = 0;
        $area = '';
	
	  while ($Localiza = mssql_fetch_row($result))
	  {
          if ($area != $Localiza[0] and $area != ''){
             echo '<table width="825" border="0">';
             echo '<tr>';
             echo '   <td width="819" bgcolor="#999999" class="TituloRel" style="text-align:right;">Total da &aacute;rea: <span class="DetalheRel">'.$resultarea.'</span></td>';
             echo '</tr>';
             echo '</table>';
            $resultarea = 0;  
              
          }
          
          echo '<table width="825" border="0">';
		  echo '<tr>';
          echo '	<td width="70"  class="DetalheRel">'.$Localiza[0].'</td>';
		  echo '	<td width="60"  class="DetalheRel">'.$Localiza[1].'</td>';
		  echo '	<td width="45"  class="DetalheRel">'.$Localiza[2].'</td>';
		  echo '	<td width="510" class="DetalheRel">'.$Localiza[3].'</td>';
		  echo '	<td width="70"  class="DetalheRel" style="text-align:right;">'.$Localiza[4].'</td>';
		  echo '</tr>';
		  echo '</table>';
          
          $resultarea = $resultarea+$Localiza[4];
          $area=$Localiza[0];
		  $registros++;
		  $regparcial = $regparcial+$Localiza[4];
	  }
    ?>
    
<table width="825" border="0">
    <tr>
        <td width="819" bgcolor="#999999" class="TituloRel" style="text-align:right;">Total da &aacute;rea: <span class="DetalheRel" ><?php echo $resultarea; ?></span></td>
    </tr>
</table>
<table width="825" border="0">
  <tr>
    <td width="819" bgcolor="#999999" class="TituloRel" style="text-align:right;">Total: <span class="DetalheRel" ><?php echo $regparcial; ?></span></td>
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