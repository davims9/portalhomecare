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
    <td width="424"><h3 align="center">Valores faturados da GEAP<br /><br /></h3></td>
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
</br>
</br>
<?php
			
	  $result = mssql_query("PROC_REL_PACINTLISTA '$DataInicial','$DataFinal'",$con);
    

    echo '<table class="tablista" width="1010px">';
    echo '  <tr> ';
    echo '    <td class="titlista" width="150px"> Area </td> ';
    echo '    <td class="titlista" width="320px"> Modalidade</td> ';
    echo '    <td class="titlista" width="100px"> Codigo</td> ';
    echo '    <td class="titlista" width="390px"> Paciente</td> ';
    echo '    <td class="titlista" width="50px"> Diarias</td> ';
    echo '  </tr> ';

    while ($Localiza = mssql_fetch_row($result)){

		    
        echo '  <tr> ';
	echo '    <td class="listaint" width="150px"> ' .$Localiza[0]. '</td> ';
        echo '    <td class="listaint" width="320px"> ' .$Localiza[1]. '</td> ';
        echo '    <td class="listaint" width="100px"> ' .$Localiza[2]. '</td> ';
        echo '    <td class="listaint" width="390px"> ' .$Localiza[3]. '</td> ';
        echo '    <td class="listaint" width="50px"> ' .$Localiza[4]. '</td> ';
        echo '  </tr> ';
               
      }
    
      echo '</table>';
      
    ?>

    <!-- <a href="lastpage.htm" target="_blank">Last Page</a>-->

  </body>
</html>

</script>