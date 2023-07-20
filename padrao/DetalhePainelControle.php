<?php
/**
************************************************************************************************************************
Sistema: SGF
Desenvolvimento:  João Daniel
Última Alteração: 15/03/2011
Página: DetalhePainelControle.php
Resumo: Tela de detalhamento das informações do painel de controle
************************************************************************************************************************
**/
/**
 Instruções:
 				O form da janela chamadora deverá ter o nome frmCadastro e o mesmo possuir a variavel hidden BuscaCodigo
				Passar as seguintes variaveis:
				
				Tabela: Tabela que sera consultada.
				

**/

include_once("../conexao.php");
?>

<html>
<head>
<title>Detalhe Painel de Controle</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../css/style.css" rel="stylesheet" type="text/css">
<style type="text/css">

body 
{
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
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

function retornar(codigo) 
{
		window.top.frmCadastro.acao.value = 'LOCALIZAR';
	    window.top.frmCadastro.BuscaCodigo.value = codigo;
	    window.top.frmCadastro.submit();
		window.top.hidePopWin();
}

function retornar2(codigo1,codigo2) 
{
	    window.top.frmCadastro.acao.value = 'LOCALIZAR';
	    window.top.frmCadastro.BuscaCodigo.value = codigo1;
	    window.top.frmCadastro.BuscaCodigo2.value = codigo2;
	    window.top.frmCadastro.submit();
		window.top.hidePopWin();
}
</script>
<?php
    if (! isset($Proximo))
	  $Proximo = 2;
?>
<form name="frmLocalizacao" id="frmLocalizacao">

	<!-- Variacao de ação do formulário -->
    <input name="acao" type="hidden" value="teste">
    <input name="Tabela" type="hidden" value="<?php echo $Tabela;?>">
    <input name="VarBusca" type="hidden" value="<?php echo $VarBusca;?>">
    <input name="camposel" type="hidden" value="<?php echo $camposel;?>">
    <input name="Todos" type="hidden" value="<?php echo $Todos;?>">
    <input name="MaisCampos" type="hidden" value="<?php echo $MaisCampos;?>">
    <input name="Proximo" type="hidden" value="<?php echo $Proximo;?>">
    <input name="passo" type="hidden" value="<?php echo $passo;?>">
    
    

<table width="591" height="396" border="0" bordercolor="#000000" bgcolor="#000000">
  <tr>
    <td width="770" height="" bordercolor="#000000" bgcolor="#FFFFFF">
		<div id="Layer1" style="position:absolute; width:590px; height:45px; z-index:1; left: 1px; top: 1px;">
          <table width="589" border="0" bordercolor="#000000" bgcolor="#000000">
            <tr>
              <td width="575" height="20" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
              <table width="575" border="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
                  <tr>
                    <td width="535" bgcolor="#FFFFFF"><img src="../imagens/SGFSHORT.jpg" width="113" height="30"></td>
                    <td width="42" bgcolor="#FFFFFF">&nbsp;</td>
                  </tr>
              </table>
              </td>
            </tr>
          </table>
	<div id="Layer2" style="position:absolute; width:196px; height:35px; z-index:1; left: 346px; top: 355px;">
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
							//mainMenuItem("../layout/btlistadescricao_b1",".gif",20,85,"javascript:validarFormulario();","","Ignorar e Gravar",2,2,"btlistadescricao_plain");
							mainMenuItem("../layout/btlistadescricao_b2",".gif",20,85,"javascript:window.top.hidePopWin();","","Sair",2,2,"btlistadescricao_plain");
							endMainMenu("../layout/btlistadescricao_right.gif",20,13)
							
							loc="";
						</script>
					  </td>
                    </tr>
            </table>
		  </div>
		  <div id="Layer3" style="position:absolute; width:580px; height:288px; z-index:2; top: 47px; overflow: auto; left: 7px;">
		    <table width="530" height="5" border="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
			  <tr>
     			<td width="530" align="left">
                  <img src="../imagens/linha.gif" width="530" height="7" border="0" />
                </td>
			  </tr>
			</table>
			  <?php
				  if ($Painel == 'Garantias')
				    {
						  echo '<table width="532" border="0">';
						  echo '  <tr>';
						  echo '	<td class="letraResposta"><div align="left">Pe&ccedil;as:</div></td>';
						  echo '  </tr>';
						  echo '</table>';
						  
						  echo '<table width="532" border="0" bordercolor="#000000" bgcolor="#666666">';
						  echo '	  <tr>';
						  echo '		<td width="58" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Ve&iacute;culo</div></td>';
						  echo '		<td width="63" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Placa</div></td>';
						  echo '		<td width="246" bgcolor="#CCCCCC"><div align="center"><span class="letraResposta">Fornecedor</span></div></td>';
						  echo '		<td width="75" bgcolor="#CCCCCC"><div align="center"><span class="letraResposta">Data</span></div></td>';
						  echo '		<td width="46" bgcolor="#CCCCCC"><span class="letraResposta">Dias</span></td>';
						  echo '	  </tr>';
						  echo '</table>';
						  echo '<table width="532" border="0" bordercolor="#000000" bgcolor="#000000">';
							  
						$result = mssql_query("PPc_Painel_Controle 'GarantiaPecas'",$con);
						
						if  (mssql_num_rows($result) <> 0)
						{
							while ($Localiza = mssql_fetch_row($result))
							{
								 echo ' <tr bgcolor="#FFFFFF">';
								 echo '   <td width="58"><div align="center" class="letraCinza">'.$Localiza[0].'</div></td>';
								 echo '   <td width="63"><div align="left" class="letraCinza">'.$Localiza[4].'</div></td>';
								 echo '   <td width="246"><div align="left" class="letraCinza">'.$Localiza[2].'</div></td>';
								 echo '   <td width="75"><div align="left" class="letraCinza">'.$Localiza[1].'</div></td>';
								 echo '   <td width="46"><div align="left" class="letraCinza">'.$Localiza[3].'</div></td>';
								 echo ' </tr>';
							}
						}
  		   	            echo '</table>';

						  echo '<table width="532" border="0">';
						  echo '  <tr>';
						  echo '	<td class="letraResposta"><div align="left">Serviços:</div></td>';
						  echo '  </tr>';
						  echo '</table>';
						  
						  echo '<table width="532" border="0" bordercolor="#000000" bgcolor="#666666">';
						  echo '	  <tr>';
						  echo '		<td width="58" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Ve&iacute;culo</div></td>';
						  echo '		<td width="63" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Placa</div></td>';
						  echo '		<td width="246" bgcolor="#CCCCCC"><div align="center"><span class="letraResposta">Fornecedor</span></div></td>';
						  echo '		<td width="75" bgcolor="#CCCCCC"><div align="center"><span class="letraResposta">Data</span></div></td>';
						  echo '		<td width="46" bgcolor="#CCCCCC"><span class="letraResposta">Dias</span></td>';
						  echo '	  </tr>';
						  echo '</table>';
						  echo '<table width="532" border="0" bordercolor="#000000" bgcolor="#000000">';
							  
						$result = mssql_query("PPc_Painel_Controle 'GarantiaServico'",$con);
						
						if  (mssql_num_rows($result) <> 0)
						{
							while ($Localiza = mssql_fetch_row($result))
							{
								 echo ' <tr bgcolor="#FFFFFF">';
								 echo '   <td width="58"><div align="center" class="letraCinza">'.$Localiza[0].'</div></td>';
								 echo '   <td width="63"><div align="left" class="letraCinza">'.$Localiza[4].'</div></td>';
								 echo '   <td width="246"><div align="left" class="letraCinza">'.$Localiza[2].'</div></td>';
								 echo '   <td width="75"><div align="left" class="letraCinza">'.$Localiza[1].'</div></td>';
								 echo '   <td width="46"><div align="left" class="letraCinza">'.$Localiza[3].'</div></td>';
								 echo ' </tr>';
							}
						}
		   	            echo '</table>';
					}



				  if ($Painel == 'Licenciamento')
				    {
						  echo '<table width="532" border="0">';
						  echo '  <tr>';
						  echo '	<td class="letraResposta"><div align="left">LICENCIAMENTO</div></td>';
						  echo '  </tr>';
						  echo '</table>';

						  echo '<table width="532" border="0" bordercolor="#000000" bgcolor="#666666">';
						  echo '	  <tr>';
						  echo '		<td width="58" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Ve&iacute;culo</div></td>';
						  echo '		<td width="63" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Placa</div></td>';
						  echo '		<td width="75" bgcolor="#CCCCCC"><div align="center"><span class="letraResposta">Data</span></div></td>';
						  echo '		<td width="46" bgcolor="#CCCCCC"><span class="letraResposta">Dias</span></td>';
						  echo '	  </tr>';
						  echo '</table>';
						  echo '<table width="532" border="0" bordercolor="#000000" bgcolor="#000000">';
							  
						$result = mssql_query("PPc_Painel_Controle 'Licenciamento'",$con);
						
						if  (mssql_num_rows($result) <> 0)
						{
							while ($Localiza = mssql_fetch_row($result))
							{
								 echo ' <tr bgcolor="#FFFFFF">';
								 echo '   <td width="58"><div align="center" class="letraCinza">'.$Localiza[0].'</div></td>';
								 echo '   <td width="63"><div align="left" class="letraCinza">'.$Localiza[2].'</div></td>';
								 echo '   <td width="75"><div align="left" class="letraCinza">'.$Localiza[1].'</div></td>';
								 echo '   <td width="46"><div align="left" class="letraCinza">'.$Localiza[3].'</div></td>';
								 echo ' </tr>';
							}
						}
   		   	       		echo '</table>';
					}

				  if ($Painel == 'AspLegais')
				    {
						  echo '<table width="532" border="0">';
						  echo '  <tr>';
						  echo '	<td class="letraResposta"><div align="left">ASPECTOS LEGAIS</div></td>';
						  echo '  </tr>';
						  echo '</table>';

						echo '<table width="532" border="0" bordercolor="#000000" bgcolor="#666666">';
						echo '	  <tr>';
						echo '		<td width="58" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Ve&iacute;culo</div></td>';
						echo '		<td width="63" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Placa</div></td>';
						echo '		<td width="75" bgcolor="#CCCCCC"><div align="center"><span class="letraResposta">Data</span></div></td>';
						echo '		<td width="46" bgcolor="#CCCCCC"><span class="letraResposta">Dias</span></td>';
						echo '	  </tr>';
						echo '</table>';
						echo '<table width="532" border="0" bordercolor="#000000" bgcolor="#000000">';
							  
						$result = mssql_query("PPc_Painel_Controle 'AspecLegal'",$con);
						
						if  (mssql_num_rows($result) <> 0)
						{
							while ($Localiza = mssql_fetch_row($result))
							{
								 echo ' <tr bgcolor="#FFFFFF">';
								 echo '   <td width="58"><div align="center" class="letraCinza">'.$Localiza[0].'</div></td>';
								 echo '   <td width="63"><div align="left" class="letraCinza">'.$Localiza[2].'</div></td>';
								 echo '   <td width="75"><div align="left" class="letraCinza">'.$Localiza[1].'</div></td>';
								 echo '   <td width="46"><div align="left" class="letraCinza">'.$Localiza[3].'</div></td>';
								 echo ' </tr>';
							}
						}
   		   	       		echo '</table>';
					}

				  if ($Painel == 'Atendimento')
				    {
						  echo '<table width="532" border="0">';
						  echo '  <tr>';
						  echo '	<td class="letraResposta"><div align="left">VEÍCULOS EM ATENDIMENTO</div></td>';
						  echo '  </tr>';
						  echo '</table>';

						echo '<table width="532" border="0" bordercolor="#000000" bgcolor="#666666">';
						echo '	  <tr>';
						echo '		<td width="58" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Ve&iacute;culo</div></td>';
						echo '		<td width="63" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Placa</div></td>';
						echo '		<td width="75" bgcolor="#CCCCCC"><div align="center"><span class="letraResposta">Data</span></div></td>';
						echo '		<td width="46" bgcolor="#CCCCCC"><span class="letraResposta">Dias</span></td>';
						echo '	  </tr>';
						echo '</table>';
						echo '<table width="532" border="0" bordercolor="#000000" bgcolor="#000000">';
							  
						$result = mssql_query("PPc_Painel_Controle 'VeicAtendimento'",$con);
						
						if  (mssql_num_rows($result) <> 0)
						{
							while ($Localiza = mssql_fetch_row($result))
							{
								 echo ' <tr bgcolor="#FFFFFF">';
								 echo '   <td width="58"><div align="center" class="letraCinza">'.$Localiza[0].'</div></td>';
								 echo '   <td width="63"><div align="left" class="letraCinza">'.$Localiza[2].'</div></td>';
								 echo '   <td width="75"><div align="left" class="letraCinza">'.$Localiza[1].'</div></td>';
								 echo '   <td width="46"><div align="left" class="letraCinza">'.$Localiza[3].'</div></td>';
								 echo ' </tr>';
							}
						}
   		   	       		echo '</table>';
					}

				  if ($Painel == 'Multas')
				    {
						  echo '<table width="532" border="0">';
						  echo '  <tr>';
						  echo '	<td class="letraResposta"><div align="left">MULTAS NÃO PAGAS</div></td>';
						  echo '  </tr>';
						  echo '</table>';

						echo '<table width="532" border="0" bordercolor="#000000" bgcolor="#666666">';
						echo '	  <tr>';
						echo '		<td width="58" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Ve&iacute;culo</div></td>';
						echo '		<td width="63" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Placa</div></td>';
						echo '		<td width="75" bgcolor="#CCCCCC"><div align="center"><span class="letraResposta">Data</span></div></td>';
						echo '		<td width="46" bgcolor="#CCCCCC"><span class="letraResposta">Dias</span></td>';
						echo '	  </tr>';
						echo '</table>';
						echo '<table width="532" border="0" bordercolor="#000000" bgcolor="#000000">';
							  
						$result = mssql_query("PPc_Painel_Controle 'Multas'",$con);
						
						if  (mssql_num_rows($result) <> 0)
						{
							while ($Localiza = mssql_fetch_row($result))
							{
								 echo ' <tr bgcolor="#FFFFFF">';
								 echo '   <td width="58"><div align="center" class="letraCinza">'.$Localiza[0].'</div></td>';
								 echo '   <td width="63"><div align="left" class="letraCinza">'.$Localiza[2].'</div></td>';
								 echo '   <td width="75"><div align="left" class="letraCinza">'.$Localiza[1].'</div></td>';
								 echo '   <td width="46"><div align="left" class="letraCinza">'.$Localiza[3].'</div></td>';
								 echo ' </tr>';
							}
						}
   		   	       		echo '</table>';
					}

				  if ($Painel == 'Revisoes')
				    {
						echo '<table width="532" border="0">';
						echo '  <tr>';
						echo '	<td class="letraResposta"><div align="left">PRÓXIMAS REVISÕES</div></td>';
						echo '  </tr>';
						echo '</table>';

						echo '<table width="532" border="0" bordercolor="#000000" bgcolor="#666666">';
						echo '	  <tr>';
						echo '		<td width="58" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Ve&iacute;culo</div></td>';
						echo '		<td width="63" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Placa</div></td>';
						echo '		<td width="75" bgcolor="#CCCCCC"><div align="center"><span class="letraResposta">Data</span></div></td>';
						echo '		<td width="46" bgcolor="#CCCCCC"><span class="letraResposta">Dias</span></td>';
						echo '	  </tr>';
						echo '</table>';
						echo '<table width="532" border="0" bordercolor="#000000" bgcolor="#000000">';
							  
						$result = mssql_query("PPc_Painel_Controle 'Revisao'",$con);
						
						if  (mssql_num_rows($result) <> 0)
						{
							while ($Localiza = mssql_fetch_row($result))
							{
								 echo ' <tr bgcolor="#FFFFFF">';
								 echo '   <td width="58"><div align="center" class="letraCinza">'.$Localiza[0].'</div></td>';
								 echo '   <td width="63"><div align="left" class="letraCinza">'.$Localiza[2].'</div></td>';
								 echo '   <td width="75"><div align="left" class="letraCinza">'.$Localiza[1].'</div></td>';
								 echo '   <td width="46"><div align="left" class="letraCinza">'.$Localiza[3].'</div></td>';
								 echo ' </tr>';
							}
						}
   		   	       		echo '</table>';
					}

              ?>
		  </div>
		</div>
	</td>
  </tr>
</table>
</form>
</body>
</html>
<script>
function Confirmar(command)
{
		  document.frmLocalizacao.acao.value='Localizar';
		  document.frmLocalizacao.VarBusca.value=document.frmLocalizacao.edLocalizar.value;
		  document.frmLocalizacao.Tabela.value=command;
		  document.frmLocalizacao.camposel.value=document.frmLocalizacao.edCampos.value;
		  document.frmLocalizacao.Proximo.value=document.frmLocalizacao.Proximo.value;
		  document.frmLocalizacao.Todos.value='0';
		  document.frmLocalizacao.submit();
}

function checa_campo(campo,opc,command)
{
	switch (campo)
	{
		case "edLocalizar" : {
			if(window.event.keyCode == 13)
			{
 			  document.frmLocalizacao.acao.value='Localizar';
 			  document.frmLocalizacao.VarBusca.value=opc;
 			  document.frmLocalizacao.Tabela.value=command;
 			  document.frmLocalizacao.camposel.value=document.frmLocalizacao.edCampos.value;
			  document.frmLocalizacao.Proximo.value=document.frmLocalizacao.Proximo.value;			  
			  document.frmLocalizacao.Todos.value='0';
			  document.frmLocalizacao.submit();
			}
			break;
		}	
		case "box" : {
		  if (document.frmLocalizacao.box.checked) 
			{
 			  document.frmLocalizacao.acao.value='Localizar';
 			  document.frmLocalizacao.Tabela.value=command;
 			  document.frmLocalizacao.camposel.value=document.frmLocalizacao.edCampos.value;
		  	  document.frmLocalizacao.Proximo.value=document.frmLocalizacao.Proximo.value;
		  	  document.frmLocalizacao.Todos.value='1';
			  document.frmLocalizacao.submit();	
			}	
			break;
		}		
	}
}

</script>
