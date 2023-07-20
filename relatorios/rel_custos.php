<?php
  session_start();
  include_once("../conexao.php");
  extract($_REQUEST);  
  header("Content-type: text/html; charset=utf-8");
  $Periodo = $DataInicial.' a '.$DataFinal;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UV-Compatible" content="ie=edge">
<link rel=Stylesheet href=rel_equip_custos.css >

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
    <td width="424" class:= "titulo"><h3 align="center">Relat&oacute;rio de Custos<br/><br /></h3></td>
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
		
    $pacienteAtual = '';

	  $result = mssql_query("PROC_RELATORIO_CUSTOS'$DataInicial', '$DataFinal','$Paciente','$Convenio','$Area'",$con);
    
    while ($Localiza = mssql_fetch_row($result)){ 
          
      if ($pacienteAtual != $Localiza[1])
		    {

            if ($pacienteAtual != '')
            {

              $totalTribPac = $totalFatPac*(-0.0565);
              $totalRolPac = $totalFatPac+($totalTribPac);
              $totalMargPac = $totalRolPac-$totalCusPac;

              echo '<table>';  
              echo '  <tr > ';
              echo '      <td width="470px" COLSPAN=2></td> ';        
              echo '      <td width="200px">ROB  </td> ';
              echo '      <td width="100px" >'.number_format($totalFatPac, 2, ',', '').'</td> ';
              echo '      <td width="300px" COLSPAN=3> </td> ';
              echo '  </tr> ';
              echo '  <tr > ';
              echo '      <td width="470px" COLSPAN=2></td> ';        
              echo '      <td width="200px">Tributos    </td> ';
              echo '      <td width="100px" style="color:#ff0000">'.number_format($totalTribPac, 2, ',', '').'</td> ';
              echo '      <td width="300px" COLSPAN=3> </td> ';
              echo '  </tr> ';
              echo '  <tr > ';
              echo '      <td width="470px" COLSPAN=2></td> ';        
              echo '      <td width="200px">ROL  </td> ';
              echo '      <td width="100px" >'.number_format($totalRolPac, 2, ',', '').'</td> ';
              echo '      <td width="300px" COLSPAN=3> </td> ';
              echo '  </tr> ';
              echo '  <tr > ';
              echo '      <td width="470px" COLSPAN=2></td> ';        
              echo '      <td width="200px">DESPESA    </td> ';
              echo '      <td width="100px" style="color:#ff0000">-'.number_format($totalCusPac, 2, ',', '').'</td> ';
              echo '      <td width="300px" COLSPAN=3> </td> ';
              echo '  </tr> ';
              echo '  <tr > ';
              echo '      <td width="470px" COLSPAN=2></td> ';        
              echo '      <td width="200px">MARGEM    </td> ';
              echo '      <td width="100px" >'.number_format($totalMargPac, 2, ',', '').'</td> ';
              echo '      <td width="300px" COLSPAN=3> </td> ';
              echo '  </tr> ';
              echo '  <tr > ';
              echo '      <td width="470px" COLSPAN=2></td> ';        
              echo '      <td width="200px">MARGEM ROL    </td> ';
              echo '      <td width="100px" >'.number_format((($totalMargPac*100)/$totalRolPac), 2, ',', '').'</td> ';
              echo '      <td width="300px" COLSPAN=3> </td> ';
              echo '  </tr> ';
              echo '</table>';
            }
            echo '<table>';
            echo '  <tr > ';
            echo '    <td class="CV" > </td> ';
            echo '  </tr>'; 
            echo '  <tr > ';
            echo '    <td class="CV" > Area: ' .utf8_encode($Localiza[0]). '</td> ';
            echo '  </tr>';
            echo '  <tr > ';
            echo '    <td class="CV" > Convenio: ' .utf8_encode($Localiza[3]). '</td> ';
            echo '  </tr>';
            echo '  <tr > ';
            echo '    <td class="CV" > Paciente: ' .$Localiza[1]. ' -  '.utf8_encode($Localiza[2]).' </td> ';
            echo '    <td class="CV" > Admissão: ' .$Localiza[4]. ' </td> ';
            echo '  </tr>';                 
            echo '</table>';
            echo '<table>';
            echo '    <tr>';
            echo '        <td width="70px">Categoria</td>';
            echo '        <td width="500px">Descrição</td>';
            echo '        <td width="100px">Quantidade</td>';
            echo '        <td width="100px">Valor total faturado</td>';
            echo '        <td width="100px">Custo Total</td>';
            echo '        <td width="100px">Custo Unitario</td>';
            echo '        <td width="100px">Preço de venda</td>';
            echo '      </tr>';
            echo '</table>';
            $areaAtual = $Localiza[0];
            $convenioAtual = $Localiza[3];
            $pacienteAtual = $Localiza[1];
            $totalFatPac = 0;  
            $totalCusPac = 0;
            $totalTribPac = 0;
            $totalRolPac = 0;
            $totalMargPac = 0;            
			  }
        
		    echo '<table>';  
        echo '  <tr > ';
        echo '      <td width="70px">'.$Localiza[5].'</td> ';        
        echo '      <td width="500px" >'.utf8_encode($Localiza[6]).'</td> ';
        echo '      <td width="100px">'.$Localiza[7].'</td> ';
        echo '      <td width="100px" >'.number_format($Localiza[8], 2, ',', '').'</td> ';
        echo '      <td width="100px" style="color:#ff0000">'.number_format(($Localiza[7]*$Localiza[9]), 2, ',', '').' </td> ';
        echo '      <td width="100px" style="color:#ff0000">'.number_format($Localiza[9], 2, ',', '').'</td>';
        echo ' 	    <td width="100px" >'.number_format($Localiza[10], 2, ',', '').'</td>';
        echo '  </tr> ';
        echo '</table>';
        $totalFatPac = $Localiza[8]+$totalFatPac;
        $totalCusPac = ($Localiza[7]*$Localiza[9])+$totalCusPac;
        
      }

      $totalTribPac = $totalFatPac*(-0.0565);
      $totalRolPac = $totalFatPac+($totalTribPac);
      $totalMargPac = $totalRolPac-$totalCusPac;

      echo '<table>';  
      echo '  <tr > ';
      echo '      <td width="470px" COLSPAN=2></td> ';        
      echo '      <td width="200px">ROB  </td> ';
      echo '      <td width="100px" >'.number_format($totalFatPac, 2, ',', '').'</td> ';
      echo '      <td width="300px" COLSPAN=3> </td> ';
      echo '  </tr> ';
      echo '  <tr > ';
      echo '      <td width="470px" COLSPAN=2></td> ';        
      echo '      <td width="200px">Tributos    </td> ';
      echo '      <td width="100px" style="color:#ff0000">'.number_format($totalTribPac, 2, ',', '').'</td> ';
      echo '      <td width="300px" COLSPAN=3> </td> ';
      echo '  </tr> ';
      echo '  <tr > ';
      echo '      <td width="470px" COLSPAN=2></td> ';        
      echo '      <td width="200px">ROL  </td> ';
      echo '      <td width="100px" >'.number_format($totalRolPac, 2, ',', '').'</td> ';
      echo '      <td width="300px" COLSPAN=3> </td> ';
      echo '  </tr> ';
      echo '  <tr > ';
      echo '      <td width="470px" COLSPAN=2></td> ';        
      echo '      <td width="200px">DESPESA    </td> ';
      echo '      <td width="100px" style="color:#ff0000">-'.number_format($totalCusPac, 2, ',', '').'</td> ';
      echo '      <td width="300px" COLSPAN=3> </td> ';
      echo '  </tr> ';
      echo '  <tr > ';
      echo '      <td width="470px" COLSPAN=2></td> ';        
      echo '      <td width="200px">MARGEM    </td> ';
      echo '      <td width="100px" >'.number_format($totalMargPac, 2, ',', '').'</td> ';
      echo '      <td width="300px" COLSPAN=3> </td> ';
      echo '  </tr> ';
      echo '  <tr > ';
      echo '      <td width="470px" COLSPAN=2></td> ';        
      echo '      <td width="200px">MARGEM ROL    </td> ';
      echo '      <td width="100px" >'.number_format((($totalMargPac*100)/$totalRolPac), 2, ',', '').'</td> ';
      echo '      <td width="300px" COLSPAN=3> </td> ';
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