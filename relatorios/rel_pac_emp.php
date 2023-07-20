<?php
  session_start();
  include_once("../conexao.php");
  extract($_REQUEST);  

  
  $Periodo = $DataInicial.' a '.$DataFinal;

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
  <table width="758" border="0">
    <tr>
      <td width="749"  bgcolor="#339999"><div align="center"><a href="javascript:imprimir()"><img src="../imagens/IMPRIMIR.gif" width="81" height="27" border="0" /></a></div></td>
    </tr>
  </table>
</div>
<table width="758" border="0">
  <tr>
    <td width="5" height="64">&nbsp;</td>
    <td width="142"><img src="../imagens/vitalcare.jpg" width="137" height="45" /></td>
    <td width="424"><h3 align="center">Rela&ccedil;&atilde;o Paciente Empresa</h3></td>
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
<table width="757" border="0">
  <tr>
    <td width="751" class="TituloRel">&nbsp;</td>
  </tr>
</table>
<table width="760" border="0">
  <tr>
    <td width="524" bgcolor="#999999" class="TituloRel">Paciente</td>
    <td width="111" bgcolor="#999999" class="TituloRel">Data Ingresso</td>
    <td width="111" bgcolor="#999999" class="TituloRel">Data Termino</td>
  </tr>
</table>
	<?php
	  $result = mssql_query("select pac_nome, emp_nome_fantasia, convert(char(10),pac_data_inicio,103) as inicil, 
	  							convert(char(10),pac_data_final,103) as Final from pac_emp
								left join pac on pac_emp_pac_reg = pac_reg
								left join emp on pac_emp_emp_cod = emp_cod
								order by emp_nome_fantasia, pac_nome",$con);
	  
	  $registros = 0;

	  while ($Localiza = mssql_fetch_row($result))
	  {
		  if ($EmpresaAtual != $Localiza[1])
		    {
			  echo '<table width="755" border="0" bgcolor="#CCCCCC">';
			  echo '  <tr>';
			  echo '    <td width="500"><span class="TituloRel">Empresa: <span class="DetalheRel">'.$Localiza[1].'</span></span></td>';
			  echo '  </tr>';
			  echo '</table>';
	  		  $EmpresaAtual = $Localiza[1];
			  $regparcial = 0;
			}

		  echo '<table width="755" border="0">';
		  echo '<tr>';
		  echo '	<td width="524" class="DetalheRel">'.$Localiza[0].'</td>';
		  echo '	<td width="111" class="DetalheRel">'.$Localiza[2].'</td>';
		  echo '	<td width="111" class="DetalheRel">'.$Localiza[3].'</td>';
		  echo '</tr>';
		  echo '</table>';
		  $registros++;
		  $regparcial++;
	  }
    ?>
<table width="754" border="0">
  <tr>
    <td width="748"  bgcolor="#999999" class="TituloRel">Total: <span class="DetalheRel"><?php echo $regparcial; ?></span></td>
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