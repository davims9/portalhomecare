<?php
  session_start();
  include_once("../conexao.php");
  extract($_REQUEST);  
  
  $Periodo = $DataInicial.' a '.$DataFinal;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<link rel=Stylesheet href=rel_equip_prestador.css >

</head>

<body link=blue vlink=purple>
<div id="divImprimir">
  <table width="758" border="0">
    <tr>
      <td width="749"  bgcolor="#339999"><div align="center"><a href="javascript:imprimir()"><img src="../imagens/IMPRIMIR.gif" width="81" height="27" border="0" /></a></div></td>
    </tr>
  </table>
</div>
<table width="1063" border="0">
  <tr>
    <td width="5" height="64">&nbsp;</td>
    <td width="142"><img src="../imagens/vitalcare.jpg" width="137" height="45" /></td>
    <td width="424" class:= "titulo"><h3 align="center">Relat&oacute;rio de Pagamento ao Prestador<br/><br /></h3></td>
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
<table width="300" border="0">
  <tr>
    <td width="300" class="TituloRel">&nbsp;</td>
  </tr>
</table>
<table width="300" border="0">  <tr>
    <td width="31" class="TituloRel">Per&iacute;odo:<?php echo $Periodo; ?></td>
</table>
<?php
			
	  $result = mssql_query("PROC_RELATORIO_EQUIPFORN'$DataInicial', '$DataFinal','$Paciente','$Fornecedor','$Equip','$Area','$Convenio'",$con);

    $Localiza[0] = '';
    $Localiza[2] = '';
    $Localiza[3] = '';
    $Localiza[4] = '';
    $Localiza[5] = '';
    $Localiza[6] = '';
    $Localiza[7] = '';
    $Localiza[8] = '';
    
    while ($Localiza = mssql_fetch_row($result)){ 
          
      if ($prestadoratual != $Localiza[7])
		    {
              echo '<table>';  
              echo '  <tr > ';
              echo '      <td class="NR" width="100px"> </td> ';
              echo '      <td class="NR" width="200px"> </td> ';         
              echo '      <td class="NR" width="50px" > </td> ';
              echo '      <td class="NR" width="250px"> </td> ';
              echo '      <td class="NR" width="70px" > </td> ';
              echo '      <td class="TL" width="250px">Total de di&aacute;rias </td> ';
              echo '      <td class="NR" width="80px" > </td>';
              echo ' 	  <td class="NR" width="80px" > </td>';
              echo ' 	  <td class="TL" width="40px" >'.$totalDiarias.'</td>';
              echo '      <td class="NR" width="150px"> </td>';
              echo '  </tr> ';
              echo '</table>';
              echo '<table>';
              echo '  <tr > ';
              echo '    <td class="CV" > </td> ';
			  echo '  </tr>'; 
			  echo '  <tr > ';
              echo '    <td class="CV" > Fornecedor: ' .$Localiza[7]. '</td> ';
			  echo '  </tr>';              
              echo '</table>';
              echo '<table border="2"">';
              echo '    <tr>';
              echo '        <td class="toponota" width="97px">Area</td>';
	      echo '        <td class="toponota" width="197px">Convenio</td>';
              echo '        <td class="toponota" width="47px">Reg.</td>';
              echo '        <td class="toponota" width="247px">Nome Paciente</td>';
              echo '        <td class="toponota" width="67px">Cod. Equip</td>';
              echo '        <td class="toponota" width="250px">Nome Equipamento</td>';
              echo '        <td class="toponota" width="77px">Implanta&ccedil;&atilde;o</td>';
              echo '        <td class="toponota" width="77px">Retirada</td>';
              echo '        <td class="toponota" width="37px">Diarias</td>';
              echo '        <td class="toponota" width="147px">Observa&ccedil;&atilde;o</td>';
            echo '      </tr>';
            echo '</table>';
	  		  $prestadoratual = $Localiza[7];
              $totalDiarias = 0;              
			}
        
		echo '<table>';  
        echo '  <tr > ';
        echo '      <td class="NR" width="100px">'.$Localiza[9].'</td> ';
        echo '      <td class="NR" width="200px">'.$Localiza[11].'</td> ';          
        echo '      <td class="NR" width="50px" >'.$Localiza[0].'</td> ';
        echo '      <td class="NR" width="250px">'.$Localiza[1].'</td> ';
        echo '      <td class="NR" width="70px" >'.$Localiza[2].'</td> ';
        echo '      <td class="NR" width="250px">'.$Localiza[3].'</td> ';
        echo '      <td class="NR" width="80px" >'.$Localiza[4].'</td>';
        echo ' 	    <td class="NR" width="80px" >'.$Localiza[5].'</td>';
        echo ' 	    <td class="NR" width="40px" >'.$Localiza[6].'</td>';
        echo '      <td class="NR" width="150px">'.$Localiza[8].'</td>';
        echo '  </tr> ';
        echo '</table>';
        $totalDiarias = $Localiza[6]+$totalDiarias; 
    }
     echo '<table>';  
     echo '  <tr > ';
     echo '      <td class="NR" width="100px"> </td> ';
     echo '      <td class="NR" width="200px"> </td> ';         
     echo '      <td class="NR" width="50px" > </td> ';
     echo '      <td class="NR" width="250px"> </td> ';
     echo '      <td class="NR" width="70px" > </td> ';
     echo '      <td class="TL" width="250px">Total de di&aacute;rias </td> ';
     echo '      <td class="NR" width="80px" > </td>';
     echo ' 	  <td class="NR" width="80px" > </td>';
     echo ' 	  <td class="TL" width="40px" >'.$totalDiarias.'</td>';
     echo '      <td class="NR" width="150px"> </td>';
     echo '  </tr> ';
     echo '</table>';
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