<?php
  session_start();
  include_once("../conexao.php");
  extract($_REQUEST);  

  
  $Periodo = $DataInicial.' a '.$DataFinal;

?>

<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<link rel=Stylesheet href=RelValMod.css>
<style>
<!--table
	{mso-displayed-decimal-separator:"\,";
	mso-displayed-thousand-separator:"\.";}
@page
	{margin:.79in .51in .79in .51in;
	mso-header-margin:.31in;
	mso-footer-margin:.31in;}
-->
</style>
</head>

<body link=blue vlink=purple>
<table width="1363" border="0">
  <tr>
    <td width="5" height="64">&nbsp;</td>
    <td width="142"><img src="../imagens/vitalcare.jpg" width="137" height="45" /></td>
    <td width="824"><h3 align="center">Rela&ccedil;&atilde;o de Pacientes Por Modalidade<br /><br /></h3></td>
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

 	<?php
	  $result = mssql_query("USER_Rel_ValorPorModalidade '$Convenio','$Liminar','$DataInicial','$DataFinal'",$con);
	  
	  $totalConvenio6hDiarias = 0;
	  $totalConvenio12hDiarias = 0;	  
	  $totalConvenio12hGDiarias = 0;	  
	  $totalConvenio24hDiarias = 0;	  
	  $totalConvenioGDiarias = 0;
	  $totalConvenioPacienteDiarias = 0;	  
	  
	  $totalConvenio6hValor = 0;
	  $totalConvenio12hValor = 0;	  
	  $totalConvenio12hGValor = 0;	  
	  $totalConvenio24hValor = 0;	  
	  $totalConvenioGValor = 0;	  
	  $totalConvenioPacienteValor = 0;		  
	  
	  $totalGeral6hDiarias = 0;
	  $totalGeral12hDiarias = 0;	  
	  $totalGeral12hGDiarias = 0;	  
	  $totalGeral24hDiarias = 0;	  
	  $totalGeralGDiarias = 0;	  	 
	  $totalGeralPacienteDiarias = 0;		  
	  
	  $totalGeral6hValor = 0;
	  $totalGeral12hValor = 0;	  
	  $totalGeral12hGValor = 0;	  
	  $totalGeral24hValor = 0;	  
	  $totalGeralGValor = 0;		   
	  $totalGeralPacienteValor = 0;		  
	  
	  $EmpresaAtual = '';

	  while ($Localiza = mssql_fetch_row($result))
	  {
		  if ($EmpresaAtual != $Localiza[0] and $EmpresaAtual != '') 
		    {
				echo " <tr height=21 style='height:15.75pt'>";
				echo "  <td colspan=2 height=21 class=xl96 width=115 style='border-right:1.0pt solid black;height:15.75pt;width:86pt'>Totais Convênio</td>";
				echo "  <td class=xl74 style='border-top:none;border-left:none'>".number_format($totalConvenio24hDiarias,2,',','.')."</td>";
				echo "  <td class=xl77 style='border-top:none;border-left:none'>".number_format($totalConvenio24hValor,2,',','.')."</td>";
				echo "  <td class=xl74 style='border-top:none'>".number_format($totalConvenio12hGDiarias,2,',','.')."</td>";
				echo "  <td class=xl75 style='border-top:none;border-left:none'>".number_format($totalConvenio12hGValor,2,',','.')."</td>";
				echo "  <td class=xl74 style='border-top:none;border-left:none'>".number_format($totalConvenio12hDiarias,2,',','.')."</td>";
				echo "  <td class=xl75 style='border-top:none;border-left:none'>".number_format($totalConvenio12hValor,2,',','.')."</td>";
				echo "  <td class=xl74 style='border-top:none;border-left:none'>".number_format($totalConvenio6hDiarias,2,',','.')."</td>";
				echo "  <td class=xl75 style='border-top:none;border-left:none'>".number_format($totalConvenio6hValor,2,',','.')."</td>";
				echo "  <td class=xl74 style='border-top:none;border-left:none'>".number_format($totalConvenioGDiarias,2,',','.')."</td>";
				echo "  <td class=xl77 style='border-top:none;border-left:none'>".number_format($totalConvenioGValor,2,',','.')."</td>";
				echo "  <td class=xl74 style='border-top:none'>".number_format($totalConvenioPacienteDiarias,2,',','.')."</td>";
				echo "  <td class=xl75 style='border-top:none;border-left:none'>".number_format($totalConvenioPacienteValor,2,',','.')."</td>";
				echo " </tr>";
				
				  $totalConvenio6hDiarias = 0;
				  $totalConvenio12hDiarias = 0;	  
				  $totalConvenio12hGDiarias = 0;	  
				  $totalConvenio24hDiarias = 0;	  
				  $totalConvenioGDiarias = 0;
				  $totalConvenioPacienteDiarias = 0;	  
				  
				  $totalConvenio6hValor = 0;
				  $totalConvenio12hValor = 0;	  
				  $totalConvenio12hGValor = 0;	  
				  $totalConvenio24hValor = 0;	  
				  $totalConvenioGValor = 0;	  
				  $totalConvenioPacienteValor = 0;		  
   		  } 

		  if ($EmpresaAtual != $Localiza[0])
		    {
			  echo "<table border=0><tr><td>Convênio: $Localiza[0]</td></tr></table>";
			  echo "<table border=0 cellpadding=0 cellspacing=0 width=1123 style='border-collapse:collapse;table-layout:fixed;width:1023pt'>";
			  echo " <tr height=32 style='mso-height-source:userset;height:24.0pt'>";
			  echo "  <td colspan=2 rowspan=3 height=79 class=xl86 width=115 style='border-right:1.0pt solid black;border-bottom:1.0pt solid black;height:59.25pt;width:126pt'><br /><br />Nome do Paciente</td>";
			  echo "  <td colspan=10 class=xl92 width=733 style='border-left:none;width:553pt'>MODALIDADE</td>";
			  echo "  <td colspan=2 class=xl94 width=175 style='border-right:1.0pt solid black;width:131pt'>&nbsp;</td>";
			  echo " </tr>";
			  echo " <tr height=26 style='mso-height-source:userset;height:19.5pt'>";
			  echo "  <td colspan=2 height=26 class=xl84 style='height:19.5pt'>24h</td>";
			  echo "  <td colspan=2 class=xl82 style='border-right:1.0pt solid black'>12h + Gerenciamento</td>";
			  echo "  <td colspan=2 class=xl82 style='border-right:1.0pt solid black;border-left:none'>12h</td>";
			  echo "  <td colspan=2 class=xl82 style='border-right:1.0pt solid black;border-left:none'>6h</td>";
			  echo "  <td colspan=2 class=xl82 style='border-left:none'>Gerenciamento</td>";
			  echo "  <td colspan=2 class=xl82 style='border-right:1.0pt solid black'><b>Total do Paciente</b></td>";
			  echo " </tr>";
			  echo " <tr height=21 style='height:15.75pt'>";
			  echo "  <td height=21 class=xl68 style='height:15.75pt;border-top:none;border-left:none'>Diarias</td>";
			  echo "  <td class=xl76 style='border-top:none;border-left:none'>Valor</td>";
			  echo "  <td class=xl78>Diarias</td>";
			  echo "  <td class=xl65 style='border-left:none'>Valor</td>";
			  echo "  <td class=xl78 style='border-left:none'>Diarias</td>";
			  echo "  <td class=xl65 style='border-left:none'>Valor</td>";
			  echo "  <td class=xl78 style='border-left:none'>Diarias</td>";
			  echo "  <td class=xl65 style='border-left:none'>Valor</td>";
			  echo "  <td class=xl78 style='border-left:none'>Diarias</td>";
			  echo "  <td class=xl79 style='border-left:none'>Valor</td>";
			  echo "  <td class=xl68 style='border-top:none'><b>Diarias</b></td>";
			  echo "  <td class=xl69 style='border-top:none;border-left:none'><b>Valor</b></td>";
			  echo " </tr>";
	  		  $EmpresaAtual = $Localiza[0];
			}

		  echo " <tr height=20 style='height:15.0pt'>";
		  echo "  <td colspan=2 height=20 class=xl98 width=115 style='border-right:1.0pt solid black;height:15.0pt;width:100pt'>$Localiza[1]</td>";
		  echo "  <td class=xl70 style='border-left:none'>$Localiza[2]</td>";
		  echo "  <td class=xl66 style='border-left:none'>".number_format($Localiza[3],2,',','.')."</td>";
		  echo "  <td class=xl70>$Localiza[8]</td>";
		  echo "  <td class=xl71 style='border-left:none'>".number_format($Localiza[9],2,',','.')."</td>";
		  echo "  <td class=xl70 style='border-left:none'>$Localiza[4]</td>";
		  echo "  <td class=xl71 style='border-left:none'>".number_format($Localiza[5],2,',','.')."</td>";
		  echo "  <td class=xl70 style='border-left:none'>$Localiza[6]</td>";
		  echo "  <td class=xl71 style='border-left:none'>".number_format($Localiza[7],2,',','.')."</td>";
		  echo "  <td class=xl70 style='border-left:none'>$Localiza[10]</td>";
		  echo "  <td class=xl66 style='border-left:none'>".number_format($Localiza[11],2,',','.')."</td>";
		  echo "  <td class=xl70><b>$Localiza[12]</b></td>";
		  echo "  <td class=xl71 style='border-left:none'><b>".number_format($Localiza[13],2,',','.')."</b></td>";
		  echo " </tr>";

		  $totalConvenio6hDiarias = $totalConvenio6hDiarias + $Localiza[6];
		  $totalConvenio12hDiarias = $totalConvenio12hDiarias + $Localiza[4];	  
		  $totalConvenio12hGDiarias = $totalConvenio12hGDiarias + $Localiza[8];
		  $totalConvenio24hDiarias = $totalConvenio24hDiarias + $Localiza[2];	  
		  $totalConvenioGDiarias = $totalConvenioGDiarias + $Localiza[10];
		  $totalConvenioPacienteDiarias = $totalConvenioPacienteDiarias + $Localiza[12];
	  
		  $totalConvenio6hValor = $totalConvenio6hValor + $Localiza[7];
		  $totalConvenio12hValor = $totalConvenio12hValor + $Localiza[5];	  
		  $totalConvenio12hGValor = $totalConvenio12hGValor + $Localiza[9];	  
		  $totalConvenio24hValor = $totalConvenio24hValor + $Localiza[3];	  
		  $totalConvenioGValor = $totalConvenioGValor + $Localiza[11];
		  $totalConvenioPacienteValor = $totalConvenioPacienteValor + $Localiza[13];		  

		  $totalGeral6hDiarias = $totalGeral6hDiarias + $Localiza[6];
		  $totalGeral12hDiarias = $totalGeral12hDiarias + $Localiza[4];	  
		  $totalGeral12hGDiarias = $totalGeral12hGDiarias + $Localiza[8];
		  $totalGeral24hDiarias = $totalGeral24hDiarias + $Localiza[2];	  
		  $totalGeralGDiarias = $totalGeralGDiarias + $Localiza[10];
		  $totalGeralPacienteDiarias = $totalGeralPacienteDiarias + $Localiza[12];		  
	  
		  $totalGeral6hValor = $totalGeral6hValor + $Localiza[7];
		  $totalGeral12hValor = $totalGeral12hValor + $Localiza[5];	  
		  $totalGeral12hGValor = $totalGeral12hGValor + $Localiza[9];	  
		  $totalGeral24hValor = $totalGeral24hValor + $Localiza[3];	  
		  $totalGeralGValor = $totalGeralGValor + $Localiza[11];
		  $totalGeralPacienteValor = $totalGeralPacienteValor + $Localiza[13];		  

	  }

	echo " <tr height=21 style='height:15.75pt'>";
	echo "  <td colspan=2 height=21 class=xl96 width=115 style='border-right:1.0pt solid black;height:15.75pt;width:86pt'>Totais Convênio</td>";
	echo "  <td class=xl74 style='border-top:none;border-left:none'>".number_format($totalConvenio24hDiarias,2,',','.')."</td>";
	echo "  <td class=xl77 style='border-top:none;border-left:none'>".number_format($totalConvenio24hValor,2,',','.')."</td>";
	echo "  <td class=xl74 style='border-top:none'>".number_format($totalConvenio12hGDiarias,2,',','.')."</td>";
	echo "  <td class=xl75 style='border-top:none;border-left:none'>".number_format($totalConvenio12hGValor,2,',','.')."</td>";
	echo "  <td class=xl74 style='border-top:none;border-left:none'>".number_format($totalConvenio12hDiarias,2,',','.')."</td>";
	echo "  <td class=xl75 style='border-top:none;border-left:none'>".number_format($totalConvenio12hValor,2,',','.')."</td>";
	echo "  <td class=xl74 style='border-top:none;border-left:none'>".number_format($totalConvenio6hDiarias,2,',','.')."</td>";
	echo "  <td class=xl75 style='border-top:none;border-left:none'>".number_format($totalConvenio6hValor,2,',','.')."</td>";
	echo "  <td class=xl74 style='border-top:none;border-left:none'>".number_format($totalConvenioGDiarias,2,',','.')."</td>";
	echo "  <td class=xl77 style='border-top:none;border-left:none'>".number_format($totalConvenioGValor,2,',','.')."</td>";
	echo "  <td class=xl74 style='border-top:none'>".number_format($totalConvenioPacienteDiarias,2,',','.')."</td>";
	echo "  <td class=xl75 style='border-top:none;border-left:none'>".number_format($totalConvenioPacienteValor,2,',','.')."</td>";
	echo " </tr>";

				
    echo "<tr><td><br /></td></tr>";
	echo " <tr height=21 style='border-top:1.0pt solid black;height:15.75pt'>";
	echo "  <td colspan=2 height=21 class=xl96 width=115 style='border-top:1.0pt solid black;border-right:1.0pt solid black;height:15.75pt;width:86pt'>Totais</td>";
	echo "  <td class=xl74 style='border-left:none'>".number_format($totalGeral24hDiarias,2,',','.')."</td>";
	echo "  <td class=xl77 style='border-left:none'>".number_format($totalGeral24hValor,2,',','.')."</td>";
	echo "  <td class=xl74>".number_format($totalGeral12hGDiarias,2,',','.')."</td>";
	echo "  <td class=xl75 style='border-left:none'>".number_format($totalGeral12hGValor,2,',','.')."</td>";
	echo "  <td class=xl74 style='border-left:none'>".number_format($totalGeral12hDiarias,2,',','.')."</td>";
	echo "  <td class=xl75 style='border-left:none'>".number_format($totalGeral12hValor,2,',','.')."</td>";
	echo "  <td class=xl74 style='border-left:none'>".number_format($totalGeral6hDiarias,2,',','.')."</td>";
	echo "  <td class=xl75 style='border-left:none'>".number_format($totalGeral6hValor,2,',','.')."</td>";
	echo "  <td class=xl74 style='border-left:none'>".number_format($totalGeralGDiarias,2,',','.')."</td>";
	echo "  <td class=xl77 style='border-left:none'>".number_format($totalGeralGValor,2,',','.')."</td>";
	echo "  <td class=xl74>".number_format($totalGeralPacienteDiarias,2,',','.')."</td>";
	echo "  <td class=xl75 style='border-left:none'>".number_format($totalGeralPacienteValor,2,',','.')."</td>";
	echo " </tr>";	  
    ?>
 
</table>

</body>

</html>