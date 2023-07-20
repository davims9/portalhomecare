<?php
  session_start();
  include_once("../conexao.php");
  extract($_REQUEST);

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
    <td width="424"><h3 align="center">Relatório de Margem Mat. Med.<br /><br /></h3></td>
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

<?php

$result = mssql_query("select tab_nome, MAT_COD, pre_tab_cod, SMK_COD, SMK_NOME, MAT_PRC_ULT_ENTRADA,
                                    pre_vlr_p2 as Valorfatur ,
                                    (100-((pre_vlr_p2/MAT_PRC_ULT_ENTRADA)*100)) as Margem,
					MAT_CONS_MEDIO
                            from smk
                            LEFT join mat on (mat_smk_cod = smk_cod)
                            LEFT join pre on (pre_smk_cod = smk_cod)
                            LEFT JOIN tab on (tab_cod = pre_tab_cod)
                            where tab_cod = '$Convenio'
                                  AND SMK_STATUS = 'A'
                                  and SMK_TIPO = 'M'
                                  AND MAT_DEL_LOGICA <> 'S'
                                  AND MAT_SBA_COD = 'FARMA'
                                  AND pre_vlr_p2  <= MAT_PRC_ULT_ENTRADA
                                  and MAT_PRC_ULT_ENTRADA <> 0
			ORDER BY MAT_CONS_MEDIO DESC",$con);

$tabcod = '';

    while ($Localiza = mssql_fetch_row($result)){
	
        if  ($tabcod != $Localiza[02]){ 
        echo '<table  width="972px">';
        echo '  <tr > ';
        echo '    <td class="CV" > Tabela: '.$Localiza[2].' - '.$Localiza[0].'</td> ';
        echo '  </tr>';
        echo '</table>';
        echo '<table border="1" width="1090px">';
        echo '    <tr>';
        echo '        <td class="toponota" width="94px">C&oacute;d. Mat.</td>';
        echo '        <td class="toponota" width="109px">C&oacute;d. Item</td>';
        echo '        <td class="toponota" width="479px">Nome do Material</td>';
        echo '        <td class="toponota" width="89px">Val Entrada</td>';
        echo '        <td class="toponota" width="89px">Val Fatur.</td>';
        echo '        <td class="toponota" width="74px">Margem</td>';
        echo '        <td class="toponota" width="150px">Consumo Medio Mensal</td>';
        echo '      </tr>';
        echo '</table>';
        $tabcod = $Localiza[02];
        }

        echo '<table  width="1090px">';
        echo '  <tr > ';
        echo '  <td width="95px" class="NR" >'.$Localiza[1].'</td> ';
        echo '  <td width="110px" class="NR">'.$Localiza[3].'</td> ';
        echo '  <td width="480px" class="NR">'.$Localiza[4].'</td> ';
        echo '	<td width="90px" class="NR">R$'.number_format($Localiza[5],2,',','.').'</td>';
        echo ' 	<td width="90px" class="NR">R$'.number_format($Localiza[6],2,',','.').'</td>';
        echo ' 	<td width="75px" class="NR">'.number_format($Localiza[7],2,',','.').'%</td>';
        echo ' 	<td width="150px" class="NR" align ="center">'.number_format($Localiza[8],0,',','.').'</td>';
        echo '  </tr> ';
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
