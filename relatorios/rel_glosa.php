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
<link rel=Stylesheet href=rel_glosa.css>

</head>

<body link=blue vlink=purple>
<table width="1063" border="0">
  <tr>
    <td width="5" height="64">&nbsp;</td>
    <td width="142"><img src="../imagens/vitalcare.jpg" width="137" height="45" /></td>
    <td width="424"><h3 align="center">Relatorio de informa&ccedil;&otilde;es de glosa<br /><br /></h3></td>
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
<table width="800" border="0">
  <tr>
    <td width="800" class="TituloRel">&nbsp;</td>
  </tr>
</table>
<table width="758" border="0">  <tr>
    <td width="31" class="TituloRel">Per&iacute;odo:<?php echo $Periodo; ?></td>

    <td width="31" class="TituloRel"><?php if($Modalidade == 1){
			 echo '    <span class="TituloRel">Modalidade: <span class="DetalheRel">data de emiss&atilde;o da nota de sevi&ccedil;o</span></span>';  
		  }else{
			echo '    <span class="TituloRel">Modalidade: <span class="DetalheRel">Data de recebimento pela glosa</span></span>';  
		  }; ?></td>
    
  </tr>
</table>
<?php
			
	  $result = mssql_query("PROC_RELATORIO_GLOSAS'$Modalidade','$DataInicial','$DataFinal'",$con);
    
    $totalValNS = 0;
    $totalValRecebNS = 0;	  
    $totalSaldoNS = 0;	  	  
    $totalValRecebNR = 0;
    $totalGeralValNS = 0;
    $totalGeralValRecebNS = 0;	  
    $totalGeralSaldoNS = 0;	    
    $totalGeralValRecebNR = 0;
    $ConvenioAtual = '';
    
    while ($Localiza = mssql_fetch_row($result)){
        
         if ($ConvenioAtual != $Localiza[0] and $ConvenioAtual != '')
          {
              echo '<table  width="1039px">';
			  echo '  <tr> ';
              echo '        <td class="total" width="82px">Total</td>';
              echo '        <td class="total" width="152px">R$' .number_format($totalValNS,2,',','.'). '</td>';
              echo '        <td class="total" width="152px">R$' .number_format($totalValRecebNS,2,',','.'). '</td>';
              echo '        <td class="total" width="152px">R$' .number_format($totalSaldoNS,2,',','.'). '</td>';
              echo '        <td class="total" width="112px">&nbsp;</td>';
              echo '        <td class="total" width="152px">R$' .number_format($totalValRecebNR,2,',','.'). '</td>';
              echo '        <td class="total" width="102px">&nbsp;</td>';
              echo '        <td class="total" width="102px">&nbsp;</td>';
              echo '  </tr>';
              echo '</table>';
              $totalValNS = 0;
              $totalValRecebNS = 0;
              $totalSaldoNS = 0;
              $totalValRecebNR = 0;
          }
        
          if ($ConvenioAtual != $Localiza[0])
		    {
              
              echo '<table  width="1039px">';
			  echo '  <tr > ';
              echo '    <td class="CV" > Conv&ecirc;nio: ' .$Localiza[0]. '</td> ';
			  echo '  </tr>';              
              echo '</table>';
              echo '<table border="2" width="1039px">';
              echo '    <tr>';
              echo '        <td class="toponota" width="79px">Num da NS</td>';
              echo '        <td class="toponota" width="149px">Valor da NS</td>';
              echo '        <td class="toponota" width="149px">Val Receb NS</td>';
              echo '        <td class="toponota" width="149px">Saldo da NS</td>';
              echo '        <td class="toponota" width="109px">Num da NR</td>';
              echo '        <td class="toponota" width="149px">Val Receb NR</td>';
              echo '        <td class="toponota" width="101px">Data Recurso</td>';
              echo '        <td class="toponota" width="102px">Data Receb NR</td>';
            echo '      </tr>';
            echo '</table>';
	  		  $ConvenioAtual = $Localiza[0];
              
			}
        
		echo '<table class="notas" width="1039px">';  
        echo '  <tr> ';
        
        if ($NSAtual != $Localiza[1])  
        {
            
			echo '    <td width="82px" class="NR"> ' .$Localiza[1]. '</td> ';
            echo '    <td width="152px" class="NR"> R$' .number_format($Localiza[2],2,',','.'). '</td> ';
            echo '    <td width="152px" class="NR"> R$' .number_format($Localiza[3],2,',','.'). '</td> ';
            echo '    <td width="152px" class="NR"> R$' .number_format($Localiza[4],2,',','.'). '</td> ';
            echo '	<td width="112px" class="NS">'.$Localiza[5].'-'.$Localiza[6].'</td>';
            echo ' 	<td width="152px" class="NS"> R$'.number_format($Localiza[7],2,',','.').'</td>';
            echo ' 	<td width="102px" class="NS">'.$Localiza[8].'</td>';
            echo ' 	<td width="102px" class="NS">'.$Localiza[9].'</td>';
            echo '  </tr> ';
            echo '</table>';
            $NSAtual = $Localiza[1];
            $totalValNS = $totalValNS + $Localiza[2];
            $totalValRecebNS = $totalValRecebNS + $Localiza[3];	  
            $totalSaldoNS = $totalSaldoNS + $Localiza[4];	  
            $totalValRecebNR =  $totalValRecebNR + $Localiza[7];
        }
        
        else
        {
            echo '  <td width="82px" > &nbsp; </td> ';
            echo '  <td width="152px"> &nbsp; </td> ';
            echo '  <td width="152px"> &nbsp; </td> ';
            echo '  <td width="152px"> &nbsp;</td> ';
            echo '	<td width="112px">'.$Localiza[5].'-'.$Localiza[6].'</td>';
            echo ' 	<td width="152px"> R$'.number_format($Localiza[7],2,',','.').'</td>';
            echo ' 	<td width="102px">'.$Localiza[8].'</td>';
            echo ' 	<td width="102px">'.$Localiza[9].'</td>';          
            echo '  </tr> ';
            echo '</table>';
            $totalValRecebNR =  $totalValRecebNR + $Localiza[7];
        }

        $totalGeralValNS = $totalGeralValNS + $Localiza[2];
        $totalGeralValRecebNS = $totalGeralValRecebNS + $Localiza[3];  
        $totalGeralSaldoNS = $totalGeralSaldoNS + $Localiza[4];
        $totalGeralValRecebNR = $totalGeralValRecebNR + $Localiza[7];
                      
      }
    
    echo '<table  width="1039px">';
	echo '  <tr> ';
    echo '        <td class="total" width="82px">Total</td>';
    echo '        <td class="total" width="152px">R$' .number_format($totalValNS,2,',','.'). '</td>';
    echo '        <td class="total" width="152px">R$' .number_format($totalValRecebNS,2,',','.'). '</td>';
    echo '        <td class="total" width="152px">R$' .number_format($totalSaldoNS,2,',','.'). '</td>';
    echo '        <td class="total" width="112px">&nbsp;</td>';
    echo '        <td class="total" width="152px">R$' .number_format($totalValRecebNR,2,',','.'). '</td>';
    echo '        <td class="total" width="102px">&nbsp;</td>';
    echo '        <td class="total" width="102px">&nbsp;</td>';
    echo '  </tr>';
    echo '</table>';
    
    echo '<table  width="1039px">';
	echo '  <tr> ';
    echo '  </tr>';
    echo '</table>';
    
    echo '<table  width="1039px">';
	echo '  <tr> ';
    echo '        <td class="total" width="82px">Total Geral</td>';
    echo '        <td class="total" width="152px">R$' .number_format($totalGeralValNS,2,',','.'). '</td>';
    echo '        <td class="total" width="152px">R$' .number_format($totalGeralValRecebNS,2,',','.'). '</td>';
    echo '        <td class="total" width="152px">R$' .number_format($totalGeralSaldoNS,2,',','.'). '</td>';
    echo '        <td class="total" width="112px">&nbsp;</td>';
    echo '        <td class="total" width="152px">R$' .number_format($totalGeralValRecebNR,2,',','.'). '</td>';
    echo '        <td class="total" width="102px">&nbsp;</td>';
    echo '        <td class="total" width="102px">&nbsp;</td>';
    echo '  </tr>';
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