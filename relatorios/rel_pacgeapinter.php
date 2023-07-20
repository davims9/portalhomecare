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
<link rel=Stylesheet href=rel_pacgeap.css>

</head>

<body link=blue vlink=purple>

  <table width="1063" border="0">
  <tr>
    <td width="5" height="64">&nbsp;</td>
    <td width="142"><img src="../imagens/vitalcare.jpg" width="137" height="45" /></td>
    <td width="424"><h3 align="center">Quantidade pacientes internados da GEAP<br /><br /></h3></td>
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
  </tr>
</table>
<?php
			
	  $result = mssql_query("PROC_REL_PACINTQTD '$DataInicial','$DataFinal'",$con);
    
    $total = 0;
    $AreaAtual = '';
    
    while ($Localiza = mssql_fetch_row($result)){
        
         if ($AreaAtual != $Localiza[0] and $AreaAtual != '')
          {
              echo '  <tr > ';
              echo '        <td class="total" width="320px">Total </td>';
              echo '        <td class="total" width="150px">' .$total. '</td>';
              echo '  </tr>';
              echo '</table>';
              $total = 0;
              echo '</br>';
          }
        
          if ($AreaAtual != $Localiza[0])
		      {
              
              echo '<table  width="470px" >';
			        echo '  <tr > ';
              echo '    <td class="area" colspan="2"> ' .$Localiza[0]. '</td> ';
              echo '  </tr > ';
	  		      $AreaAtual = $Localiza[0];
              
			    }
        

        echo '  <tr > ';  
		  	echo '    <td class="categoria" width="320px"> ' .$Localiza[1]. '</td> ';
        echo '    <td class="categoria" width="150px">' .$Localiza[2]. '</td> ';
        echo '  </tr > ';  
        $total = $total+$Localiza[2];
        $finalizou = false;          
      }
      $finalizou = true;
      echo '  <tr > ';
      echo '        <td class="total" width="320px">Total </td>';
      echo '        <td class="total" width="150px">' .$total. '</td>';
      echo '  </tr>';
      echo '</table>';
      
      
    ?>
  

  </body>
</html>

</script>