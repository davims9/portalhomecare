<?php
  session_start();
  include_once("../conexao.php");
  extract($_REQUEST);  

  $Periodo = $Mes.'/'.$Ano;
  
	IF ($Convenio === '999') {
		$Convenio = '';

	}

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
  <table width="1205" border="0">
    <tr>
      <td width="1185"  bgcolor="#339999"><div align="center"><a href="javascript:imprimir()"><img src="../imagens/IMPRIMIR.gif" width="81" height="27" border="0" /></a></div></td>
    </tr>
  </table>
</div>
<table width="1205" border="0">
  <tr>
    <td width="5" height="64">&nbsp;</td>
    <td width="142"><img src="../imagens/vitalcare.jpg" width="137" height="45" /></td>
    <td width="424"><h3 align="center">Quantitativo de Pacientes por motivo de alta</h3></td>
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
<table width="1180" border="0">
	    <?php 
		 if ($Convenio != ''){
			$result= mssql_query("select cnv_nome from cnv where cnv_cod = '$Convenio' order by cnv_nome",$con);
			while ($Localiza = mssql_fetch_row($result)){
			
			 echo '<tr>';
             echo '   <td width="424"><h3 align="left">Convenio: '.$Localiza[0].'</h3></td>';
             echo '</tr>';
			}
			 }
		?>
  <tr>
    <td width="830" class="TituloRel">&nbsp;</td>
  </tr>
</table>


<table width="1185" border="0">
  <tr>
    <td width="80" bgcolor="#999999" class="TituloRel">Area</td>
    <td width="60" bgcolor="#999999" class="TituloRel">Mes</td>
    <td width="45" bgcolor="#999999" class="TituloRel">Ano</td>   
    <td width="400" bgcolor="#999999" class="TituloRel">Nome Paciente</td>
    <td width="350" bgcolor="#999999" class="TituloRel">Modalidade</td>
    <td width="200" bgcolor="#999999" class="TituloRel">Motivo de alta</td>
    <td width="50" bgcolor="#999999" class="TituloRel">Quantidade</td>
  </tr>
</table>
	<?php
			
	  $result = mssql_query("Pr_Rel_Altas '$Mes', '$Ano','$Area','$Convenio','$Alta'",$con);
	  $registros = 0;

        	$area = '';

		$resultAssMed = 0;									
		$resultAssPed = 0;									
		$resultAssAdm = 0;								
		$resultAssEva = 0;				
		$resultAssObt = 0;
		$resultAssTrans = 0;

		$result24Med = 0;
		$result24Ped = 0;
		$result24Adm = 0;          
		$result24Eva = 0;
		$result24Obt = 0;
		$result24Trans = 0;

		$result12Med = 0;								  
		$result12Ped = 0;								  
		$result12Adm = 0;								   
		$result12Eva = 0;							   
		$result12Obt = 0;
		$result12Trans = 0;

		$result6Med = 0;
		$result6Ped = 0;
		$result6Adm = 0;          
		$result6Eva = 0;
		$result6Obt = 0;
		$result6Trans = 0;


		$resultTAssMed = 0;									
		$resultTAssPed = 0;									
		$resultTAssAdm = 0;								
		$resultTAssEva = 0;				
		$resultTAssObt = 0;
		$resultTAssTrans = 0;

		$resultT24Med = 0;
		$resultT24Ped = 0;
		$resultT24Adm = 0;          
		$resultT24Eva = 0;
		$resultT24Obt = 0;
		$resultT24Trans = 0;

		$resultT12Med = 0;								  
		$resultT12Ped = 0;								  
		$resultT12Adm = 0;								   
		$resultT12Eva = 0;							   
		$resultT12Obt = 0;
		$resultT12Trans = 0;

		$resultT6Med = 0;
		$resultT6Ped = 0;
		$resultT6Adm = 0;          
		$resultT6Eva = 0;
		$resultT6Obt = 0;
		$resultT6Trans = 0;



		
	  while ($Localiza = mssql_fetch_row($result))
	  {
	  
          if ($area != $Localiza[0] and $area != ''){
	echo '<table width="1185" bgcolor="#999999" border="0">';
	echo '<tr>';
        echo	'<td width="1180" bgcolor="#999999" class="TituloRel" style="text-align:left;">Total da &aacute;rea: </td>';
	echo '</tr>';
	echo '<tr>';	
       	echo	'<td width="1180" bgcolor="#999999" class="TituloRel" style="text-align:left;">Assistência Domiciliar: 
			<span class="DetalheRel" >Médica: '.$resultAssMed.', A Pedido: '.$resultAssPed.', Administrativa: '.$resultAssAdm.'
			, Evasão:  '.$resultAssEva.', Óbito: '.$resultAssObt.', Transferência: '.$resultAssTrans.'</span> </td>';
	echo '</tr>';
	echo '<tr>';	
        echo	'<td width="1180" bgcolor="#999999" class="TituloRel" style="text-align:left;">Internação - 24 Horas: 
			<span class="DetalheRel" >Médica: '.$result24Med.', A Pedido: '.$result24Ped.', Administrativa: '.$result24Adm.'
			, Evasão:  '.$result24Eva.', Óbito: '.$result24Obt.', Transferência: '.$result24Trans.'</span> </td>';
	echo '</tr>';
	echo '<tr>';	
       	echo	'<td width="1180" bgcolor="#999999" class="TituloRel" style="text-align:left;">Internação - 12 Horas: 
			<span class="DetalheRel" >Médica: '.$result12Med.', A Pedido: '.$result12Ped.', Administrativa: '.$result12Adm.'
			, Evasão:  '.$result12Eva.', Óbito: '.$result12Obt.', Transferência: '.$result12Trans.'</span> </td>';
	echo '</tr>';
	echo '<tr>';	
       	echo	'<td width="1180" bgcolor="#999999" class="TituloRel" style="text-align:left;">Internação - 6 Horas:  
			<span class="DetalheRel" >Médica: '.$result6Med.', A Pedido: '.$result6Ped.', Administrativa: '.$result6Adm.'
			, Evasão:  '.$result6Eva.', Óbito: '.$result6Obt.', Transferência: '.$result6Trans.'</span> </td>';
    	echo	'</tr>';
	echo '</table>';

		$resultAssMed = 0;									
		$resultAssPed = 0;									
		$resultAssAdm = 0;								
		$resultAssEva = 0;				
		$resultAssObt = 0;
		$resultAssTrans = 0;

		$result24Med = 0;
		$result24Ped = 0;
		$result24Adm = 0;          
		$result24Eva = 0;
		$result24Obt = 0;
		$result24Trans = 0;

		$result12Med = 0;								  
		$result12Ped = 0;								  
		$result12Adm = 0;								   
		$result12Eva = 0;							   
		$result12Obt = 0;
		$result12Trans = 0;

		$result6Med = 0;
		$result6Ped = 0;
		$result6Adm = 0;          
		$result6Eva = 0;
		$result6Obt = 0;
		$result6Trans = 0;


          }
		  
          echo '<table width="1185" border="0">';
		  echo '<tr>';
          	  echo '	<td width="80"  class="DetalheRel">'.$Localiza[0].'</td>';
		  echo '	<td width="60"  class="DetalheRel">'.$Localiza[1].'</td>';
		  echo '	<td width="45"  class="DetalheRel">'.$Localiza[2].'</td>';
		  echo '	<td width="400" class="DetalheRel">'.$Localiza[3].'</td>';
		  echo '	<td width="350" class="DetalheRel">'.$Localiza[4].'</td>';
		  echo '	<td width="200" class="DetalheRel">'.$Localiza[5].'</td>';
		  echo '	<td width="50"  class="DetalheRel" style="text-align:right;">'.$Localiza[6].'</td>';


		IF ($Localiza[4] == 'Assistência Domiciliar'){
			IF ($Localiza[5] == 'Médica'){
					$resultAssMed = $resultAssMed+$Localiza[6];
					$resultTAssMed = $resultTAssMed + $Localiza[6];
			} 
			IF ($Localiza[5] == 'A Pedido'){ 
					$resultAssPed = $resultAssPed+$Localiza[6];
					$resultTAssPed = $resultTAssPed + $Localiza[6];
			}
			IF ($Localiza[5] == 'Administrativa'){ 
					$resultAssAdm = $resultAssAdm+$Localiza[6];
					$resultTAssAdm = $resultTAssAdm + $Localiza[6];
			}          
			IF ($Localiza[5] == 'Evasão'){
					$resultAssEva = $resultAssEva+$Localiza[6];
					$resultTAssEva = $resultTAssEva + $Localiza[6];
			}
			IF ($Localiza[5] == 'Óbito'){
					$resultAssObt = $resultAssObt+$Localiza[6];
					$resultTAssObt = $resultTAssObt + $Localiza[6];
			}
			IF ($Localiza[5] == 'Transferência'){  
					$resultAssTrans = $resultAssTrans+$Localiza[6];
					$resultTAssTrans = $resultTAssTrans + $Localiza[6];
			}

		}

		IF ($Localiza[4] == 'Internação Domiciliar - 24 Horas'){
			IF ($Localiza[5] == 'Médica'){ 
					$result24Med = $result24Med+$Localiza[6];
					$resultT24Med = $resultT24Med + $Localiza[6];
			}
			IF ($Localiza[5] == 'A Pedido'){ 
					$result24Ped = $result24Ped+$Localiza[6];
					$resultT24Ped = $resultT24Ped + $Localiza[6];
			}
			IF ($Localiza[5] == 'Administrativa'){
					$result24Adm = $result24Adm+$Localiza[6];
					$resultT24Adm = $resultT24Adm + $Localiza[6];
			}                  
			IF ($Localiza[5] == 'Evasão'){
					$result24Eva = $result24Eva+$Localiza[6];
					$resultT24Eva = $resultT24Eva + $Localiza[6];
			}
			IF ($Localiza[5] == 'Óbito'){
					$result24Obt = $result24Obt+$Localiza[6];
					$resultT24Obt = $resultT24Obt + $Localiza[6];
			}
			IF ($Localiza[5] == 'Transferência'){  
					$result24Trans = $result24Trans+$Localiza[6];
					$resultT24Trans = $resultT24Trans + $Localiza[6];
			}
		}

		IF ($Localiza[4] == 'Internação Domiciliar - 12 Horas'){
			IF ($Localiza[5] == 'Médica'){ 
					$result12Med = $result12Med+$Localiza[6];
					$resultT12Med = $resultT12Med + $Localiza[6];
			}
			IF ($Localiza[5] == 'A Pedido'){ 
					$result12Ped = $result12Ped+$Localiza[6];
					$resultT12Ped = $resultT12Ped + $Localiza[6];
			}
			IF ($Localiza[5] == 'Administrativa'){
					$result12Adm = $result12Adm+$Localiza[6];
					$resultT12Adm = $resultT12Adm + $Localiza[6];
			}          
			IF ($Localiza[5] == 'Evasão'){
					$result12Eva = $result12Eva+$Localiza[6];
					$resultT12Eva = $resultT12Eva + $Localiza[6];
			}
			IF ($Localiza[5] == 'Óbito'){
					$result12Obt = $result12Obt+$Localiza[6];
					$resultT12Obt = $resultT12Obt + $Localiza[6];
			}
			IF ($Localiza[5] == 'Transferência'){  
					$result12Trans = $result12Trans+$Localiza[6];
					$resultT12Trans = $resultT12Trans+$Localiza[6];
			}
		}

		
		
		IF ($Localiza[4] == 'Internação Domiciliar - 6 Horas'){
			IF ($Localiza[5] == 'Médica'){
					$result6Med = $result6Med+$Localiza[6];
					$resultT6Med = $resultT6Med + $Localiza[6];
			}
			IF ($Localiza[5] == 'A Pedido'){
					$result6Ped = $result6Ped+$Localiza[6];
					$resultT6Ped = $resultT6Ped + $Localiza[6];
			}
			IF ($Localiza[5] == 'Administrativa'){
					$result6Adm = $result6Adm+$Localiza[6];
					$resultT6Adm = $resultT6Adm + $Localiza[6];
			}          
			IF ($Localiza[5] == 'Evasão'){
					$result6Eva = $result6Eva+$Localiza[6];
					$resultT6Eva = $resultT6Eva + $Localiza[6];
			}
			IF ($Localiza[5] == 'Óbito'){
					$result6Obt = $result6Obt+$Localiza[6];
					$resultT6Obt = $resultT6Obt + $Localiza[6];
			}
			IF ($Localiza[5] == 'Transferência'){  
					$result6Trans = $result6Trans+$Localiza[6];
					$resultT6Trans = $resultT6Trans + $Localiza[6];
			}
		}

		$area=$Localiza[0];
		$registros++;
		$regparTransf = $regparTransf+$Localiza[6];
					
	
	  }
?>   
    
<table width="1185" bgcolor="#999999" border="0">
    <tr>
        <td width="1180" bgcolor="#999999" class="TituloRel" style="text-align:left;">Total da &aacute;rea: </td>
    </tr>
    <tr>
        <td width="1180" bgcolor="#999999" class="TituloRel" style="text-align:left;">Assistência Domiciliar: 
		<span class="DetalheRel" >Médica: <?php echo $resultAssMed; ?>, A Pedido: <?php echo $resultAssPed; ?>, Administrativa: <?php echo $resultAssAdm; ?>
		, Evasão: <?php echo $resultAssEva; ?>, Óbito: <?php echo $resultAssObt; ?>, Transferência: <?php echo $resultAssTrans; ?></span> </td> 
    </tr>
    <tr>
	<td width="1180" bgcolor="#999999" class="TituloRel" style="text-align:left;">Internação - 24 Horas: 
		<span class="DetalheRel" >Médica: <?php echo $result24Med; ?>, A Pedido: <?php echo $result24Ped; ?>, Administrativa: <?php echo $result24Adm; ?>
		, Evasão: <?php echo $result24Eva; ?>, Óbito: <?php echo $result24Obt; ?>, Transferência: <?php echo $result24Trans; ?></span> </td>
    </tr>
    <tr>
       <td width="1180" bgcolor="#999999" class="TituloRel" style="text-align:left;">Internação - 12 Horas: 
		<span class="DetalheRel" >Médica: <?php echo $result12Med; ?>, A Pedido: <?php echo $result12Ped; ?>, Administrativa: <?php echo $result12Adm; ?>
		, Evasão: <?php echo $result12Eva; ?>, Óbito: <?php echo $result12Obt; ?>, Transferência: <?php echo $result12Trans; ?></span> </td> 
    </tr>
    <tr>
        <td width="1180" bgcolor="#999999" class="TituloRel" style="text-align:left;">Internação - 6 Horas:  
		<span class="DetalheRel" >Médica: <?php echo $result6Med; ?>, A Pedido: <?php echo $result6Ped; ?>, Administrativa: <?php echo $result6Adm; ?>
		, Evasão: <?php echo $result6Eva; ?>, Óbito: <?php echo $result6Obt; ?>, Transferência: <?php echo $result6Trans; ?></span> </td>  
    </tr>
</table>
</br>

<?php
	if ($Area == ''){
	echo '<table width="1185" bgcolor="#999999" border="0">';
  	echo '<tr>';
    	echo '	<td width="1180" bgcolor="#999999" class="TituloRel" style="text-align:;">Total geral: </td>';
  	echo '</tr>';
    	echo '<tr>';
        echo '	<td width="1180" bgcolor="#999999" class="TituloRel" style="text-align:left;">Assistência Domiciliar: 
			<span class="DetalheRel" >Médica: '.$resultTAssMed.', A Pedido: '.$resultTAssPed.', Administrativa: '.$resultTAssAdm.'
			, Evasão: '.$resultTAssEva.', Óbito: '.$resultTAssObt.', Transferência: '.$resultTAssTrans.'</span> </td> ';
	echo '</tr>';
    	echo '<tr>';	
	echo '	<td width="1180" bgcolor="#999999" class="TituloRel" style="text-align:left;">Internação - 24 Horas: 
			<span class="DetalheRel" >Médica: '.$resultT24Med.', A Pedido: '.$resultT24Ped.', Administrativa: '.$resultT24Adm.'
			, Evasão: '.$resultT24Eva.', Óbito: '.$resultT24Obt.', Transferência: '.$resultT24Trans.'</span> </td>';
   	echo '</tr>';
    	echo '<tr>';
        echo '	<td width="1180" bgcolor="#999999" class="TituloRel" style="text-align:left;">Internação - 12 Horas: 
			<span class="DetalheRel" >Médica: '.$resultT12Med.', A Pedido: '.$resultT12Ped.', Administrativa: '.$resultT12Adm.'
			, Evasão: '.$resultT12Eva.', Óbito: '.$resultT12Obt.', Transferência: '.$resultT12Trans.'</span> </td> ';
    	echo '</tr>';
    	echo '<tr>';
        echo '	<td width="1180" bgcolor="#999999" class="TituloRel" style="text-align:left;">Internação - 6 Horas:  
			<span class="DetalheRel" >Médica: '.$resultT6Med.', A Pedido: '.$resultT6Ped.', Administrativa: '.$resultT6Adm.'
			, Evasão: '.$resultT6Eva.', Óbito: '.$resultT6Obt.', Transferência: '.$resultT6Trans.'</span> </td>';  
    	echo '</tr>';	
	echo '</table>';
	}
?>

</body>
</html>
<script>
function imprimir()
{
   document.getElementById('divImprimir').style.display = "none";
   window.print();
  
}
</script>