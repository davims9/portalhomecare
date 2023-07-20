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
    <td width="424"><h3 align="center">Agenda de Profissionais</h3></td>
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
<table width="758" border="0">
  <tr>
    <td width="492"><span class="TituloRel">Periodo Emiss&atilde;o: <span class="DetalheRel"><?php echo $Periodo; ?></span></span></td>
    <td width="256">&nbsp;</td>
  </tr>
</table>
<table width="757" border="0">
  <tr>
    <td width="751" class="TituloRel">&nbsp;</td>
  </tr>
</table>
<table width="755" border="0">
  <tr>
    <td width="592" bgcolor="#999999" class="TituloRel">Paciente</td>
    <td width="77" bgcolor="#999999" class="TituloRel">Data</td>
    <td width="72" bgcolor="#999999" class="TituloRel">Hora</td>
  </tr>
</table>
	<?php
      if (trim($Profissional) == '')
	  {
	  $result = mssql_query("select 	agd_id_agenda, agd_pac_rec, agd_psv_tipo, agd_psv_cod, convert(char(10), agd_data, 103) as Data,  
								convert(char(5),agd_hora,108) as Hora, pac_nome, psv_nome, 
								case agd_psv_tipo
									 when 'M' then 'MÉDICO'
									 when 'E' then 'ENFERMEIRO'
									 when 'X' then 'TÉC. ENFERMÁGEM'
									 when 'N' then 'NUTRICIONISTA' end as Tipo_Profissional
							from agd_agenda
							left join pac on pac_reg = agd_pac_rec
							left join psv on psv_cod = agd_psv_cod and psv_tipo = agd_psv_tipo
							where agd_data between convert(datetime,'$DataInicial',103) and convert(datetime,'$DataFinal',103) 
							order by psv_nome, agd_data, agd_hora",$con);
	  }
	  else
	  {
	  $result = mssql_query("select 	agd_id_agenda, agd_pac_rec, agd_psv_tipo, agd_psv_cod, convert(char(10), agd_data, 103) as Data,  
								convert(char(5),agd_hora,108) as Hora, pac_nome, psv_nome, 
								case agd_psv_tipo
									 when 'M' then 'MÉDICO'
									 when 'E' then 'ENFERMEIRO'
									 when 'X' then 'TÉC. ENFERMÁGEM'
									 when 'N' then 'NUTRICIONISTA' end as Tipo_Profissional
							from agd_agenda
							left join pac on pac_reg = agd_pac_rec
							left join psv on psv_cod = agd_psv_cod and psv_tipo = agd_psv_tipo
							where agd_data between convert(datetime,'$DataInicial',103) and convert(datetime,'$DataFinal',103) and agd_psv_cod = '$Profissional'
							order by psv_nome, agd_data, agd_hora",$con);
	  }
	  
	  $registros = 0;

	  while ($Localiza = mssql_fetch_row($result))
	  {
		  if ($ProfissionalAtual != $Localiza[3])
		    {
			  echo '<table width="755" border="0" bgcolor="#CCCCCC">';
			  echo '  <tr>';
			  echo '    <td width="500"><span class="TituloRel">Profissional: <span class="DetalheRel">'.$Localiza[7].'</span></span></td>';
			  echo '    <td width="255"><span class="TituloRel">Tipo: <span class="DetalheRel">'.$Localiza[8].'</span></span></td>';
			  echo '  </tr>';
			  echo '</table>';
	  		  $ProfissionalAtual = $Localiza[3];
			  $regparcial = 0;
			}

		  echo '<table width="755" border="0">';
		  echo '<tr>';
		  echo '	<td width="592" class="DetalheRel">'.$Localiza[6].'</td>';
		  echo '	<td width="77" class="DetalheRel">'.$Localiza[4].'</td>';
		  echo '	<td width="72" class="DetalheRel">'.$Localiza[5].'</td>';
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