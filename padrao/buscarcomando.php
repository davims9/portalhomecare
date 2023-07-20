<?php
/**
************************************************************************************************************************
Sistema: CIAC
Desenvolvimento:  João Daniel
Última Alteração: 01/04/2008  -  13/04/2009
Página: buscarcomando.php
Resumo: Tela que possibilita a verificação nomes no cadastro evitando cadastro repetido
************************************************************************************************************************
**/
/**
 Instruções:
 				O form da janela chamadora deverá ter o nome frmCadastro e o mesmo possuir a variavel hidden BuscaCodigo
				Passar as seguintes variaveis:
				


**/

$ComandoConsulta = $Proc." '".$opcao."', '".$busca."','".$busca2."'";

echo $ComandoConsulta;
?>

<html>
<head>
<title>Buscar Item</title>
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

function validarFormulario() 
{
	   //Variavel acao recebe o valor de 'INCLUIR' para executar o script PHP de inclusão
 	   window.top.frmCadastro.acao.value = 'ALERTAR';
	   window.top.frmCadastro.submit();
	   window.top.hidePopWin(); 
}
</script>

<?php
echo '<script>';
echo 'function retornar(codigo,descricao,Campo,Campo2) ';
echo '{';
echo "	   window.top.frmCadastro.acao.value = 'BuscarCampo';";
echo '     window.top.frmCadastro.'.$Campo.'.value = codigo;';
echo '     window.top.frmCadastro.'.$Campo2.'.value = descricao;';
echo '	   window.top.frmCadastro.RetornoCampo.value = codigo;';
echo '	   window.top.frmCadastro.submit();';

echo '	   window.top.hidePopWin(); ';
echo '}';
echo '</script>';

?>

<form name="frmLocalizacao" id="frmLocalizacao">

	<!-- Variacao de ação do formulário -->
    <input name="acao" type="hidden" value="teste">
    <input name="Tabela" type="hidden" value="<?php echo $Tabela;?>">
    <input name="VarBusca" type="hidden" value="<?php echo $VarBusca;?>">
    <input name="camposel" type="hidden" value="<?php echo $camposel;?>">
    <input name="Todos" type="hidden" value="<?php echo $Todos;?>">
    <input name="Campo" type="hidden" value="<?php echo $Campo;?>">
    <input name="Campo2" type="hidden" value="<?php echo $Campo2;?>">
    <input name="Cadastro" type="hidden" value="<?php echo $Tabela;?>">
    <input name="Diretorio" type="hidden" value="<?php echo $Diretorio;?>">
    <input name="Proximo" type="hidden" value="<?php echo $Proximo;?>">  
    <input name="Selecao" type="hidden" value="<?php echo $Selecao;?>">  
    <input name="Condicao" type="hidden" value="<?php echo $Condicao;?>">  
    <input name="Parametro" type="hidden" value="<?php echo $Parametro;?>">  
<?php 
	//  Função para Conexão com o Banco
     include_once("../conexao.php");


//echo $ComandoConsulta;
?>

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
							if(typeof(loc)=="undefined"||loc==""){var loc="";if(document.body&&document.body.innerHTML){var tt=document.body.innerHTML;var ml=tt.match(/["']([^'"]*)btbuscaitens.js["']/i);if(ml && ml.length > 1) loc=ml[1];}}
							
							var bd=0
							document.write("<style type=\"text/css\">");
							document.write("\n<!--\n");
							document.write(".btbuscaitens_menu {z-index:999;border-color:#000000;border-style:solid;border-width:"+bd+"px 0px "+bd+"px 0px;background-color:#5a5a50;position:absolute;left:0px;top:0px;visibility:hidden;}");
							document.write(".btbuscaitens_plain, a.btbuscaitens_plain:link, a.btbuscaitens_plain:visited{text-align:left;background-color:#5a5a50;color:#ffffff;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:11pt;font-family:Arial, Helvetica, sans-serif;}");
							document.write("a.btbuscaitens_plain:hover, a.btbuscaitens_plain:active{background-color:#9c9c7d;color:#000000;text-decoration:none;border-color:#000000;border-style:solid;border-width:0px "+bd+"px 0px "+bd+"px;padding:2px 0px 2px 0px;cursor:hand;display:block;font-size:11pt;font-family:Arial, Helvetica, sans-serif;}");
							document.write("\n-->\n");
							document.write("</style>");
							
							var fc=0x000000;
							var bc=0x9c9c7d;
							if(typeof(frames)=="undefined"){var frames=0;}
							
							startMainMenu("../layout/btbuscaitens_left.gif",20,13,2,0,0)
							mainMenuItem("../layout/btbuscaitens_b2",".gif",20,85,"javascript:validarFormulario();","","Sair",2,2,"btbuscaitens_plain");
							endMainMenu("../layout/btbuscaitens_right.gif",20,13)
							
							loc="";							
						</script>
					  </td>
                    </tr>
            </table>
		  </div>
		  <div id="Layer3" style="position:absolute; width:580px; height:303px; z-index:2; top: 47px; overflow: auto; left: 5px;">
<table width="550" border="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
                  <tr>
                    
                  </tr>
            </table> 			
            
            
            
            <table width="530" height="5" border="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
			  <tr>
     			<td width="530" align="left">
                  <img src="../imagens/linha.gif" width="530" height="7" border="0" />
                </td>
			  </tr>
			</table>
		  
		  <table width="530" border="0" bordercolor="#000000" bgcolor="#666666">
			  <tr>
				<td width="68" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Código</div></td>
				<td width="425" bgcolor="#CCCCCC"><div align="center" class="letraResposta">Descrição</div></td>
				<td width="37" bgcolor="#CCCCCC"><div align="center" class="style5"></div></td>
			  </tr>
    	  </table>
	      <table width="530" border="0" bordercolor="#000000" bgcolor="#000000">
			  <?php
                $result = mssql_query($ComandoConsulta,$con);
                
                if  (mssql_num_rows($result) <> 0)
                {
                    while ($Localiza = mssql_fetch_row($result)){
                         echo ' <tr bgcolor="#FFFFFF">';
                         echo '   <td width="68"><div align="center" class="letraCinza">'.$Localiza[0].'</div></td>';
                         echo '   <td width="425"><div align="left" class="letraCinza">'.$Localiza[1].'</div></td>';
                         echo '   <td width="37"><div align="center" class="letraCinza">';
                         echo '<a href="javascript:retornar(';
						 echo "'";
                         echo $Localiza[0];
						 echo "',";
						 echo "'";
                         echo $Localiza[9];
						 echo "',";
						 echo "'";
                         echo $Campo;
						 echo "',";
						 echo "'";
                         echo $Campo2;
						 echo "'";
                         echo ")";
                         echo '">';
                         echo '<img src="../imagens/adicionar1.gif" alt="Editar" width="13" height="13" border="0">';
                         echo '</a>';
                         echo '</div></td>';
                         echo ' </tr>';
                    }
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


<script>
function Confirmar(command)
{
		  document.frmLocalizacao.acao.value='Localizar';
		  document.frmLocalizacao.VarBusca.value=document.frmLocalizacao.edLocalizar.value;
		  document.frmLocalizacao.Tabela.value=command;
		  document.frmLocalizacao.camposel.value=document.frmLocalizacao.edCampos.value;
		  document.frmLocalizacao.Proximo.value=document.frmLocalizacao.Proximo.value;
		  document.frmLocalizacao.Selecao.value=document.frmLocalizacao.Selecao.value;
		  document.frmLocalizacao.Condicao.value=document.frmLocalizacao.Condicao.value;
		  document.frmLocalizacao.Parametro.value=document.frmLocalizacao.Parametro.value;
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
			  document.frmLocalizacao.Selecao.value=document.frmLocalizacao.Selecao.value;
			  document.frmLocalizacao.Condicao.value=document.frmLocalizacao.Condicao.value;
			  document.frmLocalizacao.Parametro.value=document.frmLocalizacao.Parametro.value;
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
			  document.frmLocalizacao.Selecao.value=document.frmLocalizacao.Selecao.value;
			  document.frmLocalizacao.Condicao.value=document.frmLocalizacao.Condicao.value;
			  document.frmLocalizacao.Parametro.value=document.frmLocalizacao.Parametro.value;
			  document.frmLocalizacao.Todos.value='1';
			  document.frmLocalizacao.submit();	
			}	
			break;
		}		
	}
}

function novocadastro(Dir,Campo)
{
		   window.open("../"+Dir+"/"+Campo+"","Cadastro","left=260,top=177,width=740,height=465,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes"); 
}
</script>
