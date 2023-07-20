<?php
/**
************************************************************************************************************************
Sistema: CIAC
Desenvolvimento:  João Daniel
Última Alteração: 21/10/2006
Página: ListaDescricao.php
Resumo: Tela que possibilita a verificação nomes no cadastro evitando cadastro repetido
************************************************************************************************************************
**/
/**
 Instruções:
 				O form da janela chamadora deverá ter o nome frmCadastro e o mesmo possuir a variavel hidden BuscaCodigo
				Passar as seguintes variaveis:
				
				Tabela: Tabela que sera consultada
				Campo: Campo que será realizada a busca
				Busca: Filtro que será aplicado na busca
				
				Exemplo: ListaDescricao.php?Tabela=Bairro&Campo=Descricao_Bairro&Busca=rio

**/

	
	//  Função para Conexão com o Banco
include_once("../conexao.php");				

$comando = "PR_Localizacao 'CamposTabela','$Tabela','0'";
$rsCampo = mssql_query($comando,$con);
$Retorno = mssql_fetch_row($rsCampo);

$num_rows = mysql_num_rows($rsCampo);

$Nome_Campo1 = $Retorno[0];
$TipoCampo = $Retorno[1];

	while (trim($TipoCampo) == 'int')
	  {
		$Retorno = mssql_fetch_row($rsCampo);
		$TipoCampo = $Retorno[1];
	  }

$Nome_Campo2 = $Retorno[0];


//$comando = "SELECT * FROM " .$Tabela. " WHERE " .$Campo. " like '" .substr($Busca,0,4). "%'";

$comando = "SELECT ".$Nome_Campo1.', '.$Nome_Campo2." FROM " .$Tabela. " WHERE " .$Campo. " like '" .substr($Busca,0,4). "%'";

?>

<html>
<head>
<title>Localizacao</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">

body 
{
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

.style1 {color: #FFFFFF}
</style>
<script type='text/javascript' src='../functions/funcoes.js'> </script>
<script src="../layout/xaramenu.js"></script>
<script language="JavaScript" type="text/JavaScript">

<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<script>
function retornar(codigo) 
{
	   window.opener.document.frmCadastro.acao.value = 'LOCALIZAR';
	   window.opener.document.frmCadastro.BuscaCodigo.value = codigo;
	   window.opener.document.frmCadastro.submit();
	   window.close();
}

function validarFormulario() 
{
	   //Variavel acao recebe o valor de 'INCLUIR' para executar o script PHP de inclusão
 	   window.opener.document.frmCadastro.acao.value = 'INCLUIR';
	   window.opener.document.frmCadastro.submit();
	   window.close();
}
</script>

<form name="frmListaDescricao" id="frmListaDescricao">

	<!-- Variacao de ação do formulário -->
    <input name="acao" type="hidden" value="teste">

<table width="485" height="283" border="0" bordercolor="#000000" bgcolor="#000000">
  <tr>
    <td width="770" height="" bordercolor="#000000" bgcolor="#FFFFFF">
		<div id="Layer1" style="position:absolute; width:474px; height:238px; z-index:1; left: 4px; top: 16px;">
          <table width="477" border="0" bordercolor="#000000" bgcolor="#000000">
            <tr>
              <td width="471" height="20" bordercolor="#FFFFFF" bgcolor="#FFFFFF"><table width="472" border="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
                  <tr>
                    <td width="421" bgcolor="#FFFFFF"><img src="../imagens/SGFSHORT.jpg" width="113" height="30"></td>
                    <td width="34" bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
          </table>
	      <div id="Layer2" style="position:absolute; width:196px; height:35px; z-index:1; left: 268px; top: 239px;">
		         <table width="195" border="0">
                    <tr>
                      <td width="5">&nbsp;</td>
                      <td width="180">
						<script>
							if(typeof(loc)=="undefined"||loc==""){var loc="";if(document.body&&document.body.innerHTML){var tt=document.body.innerHTML;var ml=tt.match(/["']([^'"]*)btlistadescricao.js["']/i);if(ml && ml.length > 1) loc=ml[1];}}
	
							var bd=0
							document.write("<style type=\"text/css\">");
							document.write("\n<!--\n");
							document.write(".btlistadescricao_menu {z-index:999;border-color:#000000;border-style:solid;border-width:"+bd+"px 0px "+bd+"px 0px;background-color:#5a5a50;position:absolute;left:0px;top:0px;visibility:hidden;}");
							document.write(".btlistadescricao_plain, a.btlistadescricao_plain:link, a.btlistadescricao_plain:visited{text-align:left;background-color:#5a5a50;color:#ffffff;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:11pt;font-family:Arial, Helvetica, sans-serif;}");
							document.write("a.btlistadescricao_plain:hover, a.btlistadescricao_plain:active{background-color:#9c9c7d;color:#000000;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:11pt;font-family:Arial, Helvetica, sans-serif;}");
							document.write("\n-->\n");
							document.write("</style>");
							
							var fc=0x000000;
							var bc=0x9c9c7d;
							if(typeof(frames)=="undefined"){var frames=0;}
							
							startMainMenu("../layout/btlistadescricao_left.gif",20,13,2,0,0)
							mainMenuItem("../layout/btlistadescricao_b1",".gif",20,85,"javascript:validarFormulario();","","Ignorar e Gravar",2,2,"btlistadescricao_plain");
							mainMenuItem("../layout/btlistadescricao_b2",".gif",20,85,"javascript:window.close();","","Sair",2,2,"btlistadescricao_plain");
							endMainMenu("../layout/btlistadescricao_right.gif",20,13)
							
							loc="";
						</script>
					  </td>
                    </tr>
            </table>
		  </div>
		  <div id="Layer3" style="position:absolute; width:477px; height:189px; z-index:2; top: 42px; overflow: auto; left: 1px;">
			<table width="477" height="5" border="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
			  <tr>
     			<td width="482" align="left"><img src="../imagens/linha.gif" width="471" height="7"     border="0" /></td>

			  </tr>
			</table>
		  
		  <table width="470" border="0" bordercolor="#000000" bgcolor="#000000">
			  <tr>
				<td width="68" bgcolor="#CCCCCC"><div align="center" class="style5">Código</div></td>
				<td width="351" bgcolor="#CCCCCC"><div align="center" class="style5">Descrição</div></td>
				<td width="37" bgcolor="#CCCCCC"><div align="center" class="style5"></div></td>
			  </tr>
    	  </table>
	      <table width="470" border="0" bordercolor="#000000" bgcolor="#000000">
		  <?php


			$result = mssql_query($comando,$con);

			if  (mssql_num_rows($result) <> 0)
			{
				while ($Localiza = mssql_fetch_row($result))
				{
					 echo ' <tr bgcolor="#FFFFFF">';
					 echo '   <td width="68"><div align="center" class="letraCinza">' .$Localiza[0].'</div></td>';
					 echo '   <td width="351"><div align="left" class="letraCinza">' .$Localiza[1]. '</div></td>';
					 echo '   <td width="37"><div align="center" class="letraCinza">';
					 echo '<a href="javascript:retornar(';
					 echo $Localiza[0];
					 echo ")";
					 echo '">';
					 echo '<img src="../imagens/adicionar1.gif" alt="Editar" width="13" height="13" border="0">';
					 echo '</a>';
					 echo '</div></td>';
					 echo ' </tr>';
				}
			}
			else
			{
			  	echo '<script>';
				echo "    window.opener.document.frmCadastro.acao.value = 'INCLUIR';";
				echo '    window.opener.document.frmCadastro.submit();';
  	   			echo '	window.close();';
			  	echo '</script>';

			}
		  ?>
    	  </table>
		  </div>
		</div>
	</td>
  </tr>
</table>
</form>
</body>
</html>
