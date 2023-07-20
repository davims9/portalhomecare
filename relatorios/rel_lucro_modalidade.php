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
    <td width="424"><h3 align="center">Rela&ccedil;&atilde;o Lucro por Modalidade</h3></td>
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
<table width="758" border="0">  <tr>
    <td width="31" class="TituloRel">Período:<?php echo $Periodo; ?></td>

    <td width="31" class="TituloRel"><?php if($Modalidade == 36){
			 echo '    <span class="TituloRel">Modalidade: <span class="DetalheRel">24 Horas</span></span>';  
		  }else if($Modalidade == 37){
			 echo '    <span class="TituloRel">Modalidade: <span class="DetalheRel">12 Horas</span></span>';  
		  }else if($Modalidade == 38){
			echo '    <span class="TituloRel">Modalidade: <span class="DetalheRel">6 Horas</span></span>';
		  }else{
			echo '    <span class="TituloRel">Modalidade: <span class="DetalheRel">TODOS</span></span>';  
		  }; ?></td>
    
  </tr>
</table>
<table width="760" border="0">
  <tr>
    <td width="524" bgcolor="#999999" class="TituloRel">Paciente</td>
    <td width="111" bgcolor="#999999" class="TituloRel">Valor de custo</td>
    <td width="111" bgcolor="#999999" class="TituloRel">Valor de Venda</td>
    <td width="111" bgcolor="#999999" class="TituloRel">Lucro</td>
   
  </tr>
</table>
	<?php
	  $result = mssql_query("PR_Lucro_Modalidade '$Convenio','$Modalidade','$DataInicial','$DataFinal'",$con);
	 // echo "PR_Lucro_Modalidade '$Convenio','$Modalidade','$DataInicial','$DataFinal";
	  $total_custo = 0;
	  $total_venda = 0;
	  $total_lucro = 0;
   
	  while ($Localiza = mssql_fetch_row($result))
	  {		
		  /*if ($EmpresaAtual != $Localiza[0])
		    {
			  echo '<table width="755" border="0" bgcolor="#CCCCCC">';
			  echo '  <tr>';
			  if($Modalidade == 36){
				 echo '    <td width="500"><span class="TituloRel">Modalidade: <span class="DetalheRel">24 Horas</span></span></td>';  
			  }else if($Modalidade == 37){
				 echo '    <td width="500"><span class="TituloRel">Modalidade: <span class="DetalheRel">12 Horas</span></span></td>';  
			  }else if($Modalidade == 38){
			  	echo '    <td width="500"><span class="TituloRel">Modalidade: <span class="DetalheRel">6 Horas</span></span></td>';
			  }else{
				echo '    <td width="500"><span class="TituloRel">Modalidade: <span class="DetalheRel">TODOS</span></span></td>';  
			  }
			  echo '  </tr>';
			  echo '</table>';
	  		  $EmpresaAtual = $Localiza[0];
			  $regparcial = 0;
			  
			}*/

		  echo '<table width="755" border="0">';
		  echo '<tr>';
		  
		  echo '	<td width="524" class="DetalheRel" margin-right: 2cm;>'.$Localiza[0].'</td>';
		  echo '	<td width="95" class="DetalheRel" margin-right: 2cm;>'.number_format($Localiza[1],2,',','.').'</td>';
		  echo '	<td width="95" class="DetalheRel" margin-right: 2cm;>'.number_format($Localiza[2],2,',','.').'</td>';
		  echo '	<td width="95" class="DetalheRel" margin-right: 2cm;>'.number_format($Localiza[3],2,',','.').'</td>';
		  echo '</tr>';
		  echo '</table>';
		  
		   $total_custo += $Localiza[1];
	       $total_venda += $Localiza[2];
		   $total_lucro += $Localiza[3];
		  $registros++;
		 /* $custo += $Localiza[1];
		  $qtd += $Localiza[2];

		  $total_custoP += $Localiza[1];
		  $total_lucroP += $Localiza[3];*/
	  }
	  
    /* $LucroP = $total_custoP-$total_ultimoP;	  
     $Lucro = $total_custo-$total_ultimo;*/	  
    ?>
<table width="754" border="0">
  <tr>
    <td width="748"  bgcolor="#999999" class="TituloRel">Custo Total: <span class="DetalheRel"><?php echo number_format($total_custo, 2, ',', '.'); ?></span>
    Venda Total: <span class="DetalheRel"><?php echo number_format( $total_venda, 2, ',', '.'); ?></span>
    Lucro Total: <span class="DetalheRel"><?php echo number_format( $total_lucro, 2, ',', '.'); ?></span></td>
    
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