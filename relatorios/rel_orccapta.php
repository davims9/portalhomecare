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
<link rel=Stylesheet href=rel_orcamento.css >

</head>

<body link=blue vlink=purple>
<div id="divImprimir">
<table width="758" border="0">
      <tr>
        <td width="749"  bgcolor="#339999"><div align="center"><a href="javascript:imprimir()"><img src="../imagens/IMPRIMIR.gif" width="81" height="27" border="0" /></a></div></td>
      </tr>
    </table>
  </div>

<?php
			
    $result = mssql_query("PROC_RELATORIO_ORCCAPTA  '$Paciente', '$Orcamento'",$con);
  
    

      $ctfnome = '';
      $pacreg = '';
    while ($Localiza = mssql_fetch_row($result)){ 

      if  ($pacreg != $Localiza[04]){    
        
        echo ' <h3 align="center">Proposta Orçamentaria de Internação Domiciliar - No.:'.$Localiza[0].'</h3>
        <hr align="left" width="820" size="1" >';

        echo ' 
        <div class="empresa" style="width:800px">'.$Localiza[1].'
        <img align="right" src="../imagens/vitalcare.jpg" width="240" height="100"></div>
        <div class= "paciente">CNPJ: '.$Localiza[2].'</div>
        <table class= "paciente">
          <tr >
            <td class="camposcap1">Paciente:</td> <td class="camposcap2" colspan="3"> '.$Localiza[3].'</td>
          <tr>
            <td class="camposcap1">Registo:</td> <td class="camposcap2"> '.$Localiza[4].'</td>
            <td style="width:100px">Sexo: '.$Localiza[5].'</td>
            <td style="width:145px">Dt. Nasc.: '.$Localiza[6].'</td>
          </tr>
          <tr>
            <td class="camposcap1">Convênio:</td> <td class="camposcap2" colspan="2"> ' .$Localiza[7].'</td>
            <td style="width:100px">Idade: '.$Localiza[8].'</td>
          </tr>
        </table>
        <table class= "paciente">  
          <tr>
            <td class="camposcap1">Matricula:</td> <td class="camposcap3"> '.$Localiza[9].'</td>
            <td style="width:200px">Usuário: '.$Localiza[10].'</td>
          </tr>
          <tr>
            <td class="camposcap1">Período:</td> <td class="camposcap3"> '.$Localiza[12].' a '.$Localiza[13].' ('.$Localiza[14].' dia(s))</td>
            <td style="width:200px">Dt. Registro: '.$Localiza[15].'</td>
          </tr>
          <tr>
            <td class="camposcap1">Médico:</td><td class="camposcap3">  '.$Localiza[16].' (CRM: '.$Localiza[17].')</td>
            <td style="width:200px">Diagnóstico: '.$Localiza[18].'</td>
          </tr>
            <td class="camposcap1">Obs:</td><td class="obs">'.$Localiza[19].'</td> 
          </tr>
        </table>';
        
        echo '';
       
        echo '</br></br></br>';


        echo '<table class="topodescr">';
        echo '    <tr >';
        echo '        <td align="left" width="395px">Descrição</td>';
        echo '        <td align="center" width="96px">Qtde Uso</td>';
        echo '        <td align="right" width="96px">Valor Unitario</td>';
        echo '        <td align="right" width="98px">Valor Total</td>';
        echo '        <td align="right" width="96px">Valor Diário</td>';
        echo '      </tr>';
       
        echo '</table>';



        $pacreg = $Localiza[04];
        
      }
      

      if ($ctfnome != $Localiza[20])
		    {
          echo '</br>';
          echo '<table>';  
          echo '  <tr > ';
          echo '    <td class="grupo" >' .$Localiza[20]. '</td> ';
          echo '  </tr>'; 
          echo '</table>';
          echo '    <hr align="left" width="815px" size="1" >';
	  		  $ctfnome = $Localiza[20];
                        
			}
        
		echo '<table class="itens">';  
        echo '  <tr > ';
        echo '      <td  align="Left" width="395px" >'.$Localiza[21].' - '.$Localiza[22].'</td> '; 
        echo '      <td  align="Center" width="96px">'.trim($Localiza[23]).'</td> ';
        if (trim($Localiza[28]) == '0800') {
          echo '    <td  align="Right"  width="96px">'.$Localiza[24].'</td> ';
          echo '    <td  align="Right"  width="98px">'.$Localiza[25].'</td> ';
          echo '    <td  align="Right"  width="96px">'.$Localiza[26].'</td> ';          
        } else {
          echo '    <td  align="Right"  width="96px"></td> ';
          echo '    <td  align="Right"  width="98px"></td> ';
          echo '    <td  align="Right"  width="96px"></td> ';
        }        
        echo '  </tr> ';
        echo '</table>';
       
        
    }
    echo '</br>';

    /*echo '<div class="divFooter">Pagina: </div> <span class="totalpag"></span>';*/


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